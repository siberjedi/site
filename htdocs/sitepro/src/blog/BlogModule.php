<?php

class BlogModule {
	
	/** @var stdClass */
	public static $initData;
	/** @var SiteInfo */
	public static $siteInfo;
	/** @var BlogNavigation */
	public static $blogNav;
	/** @var string */
	public static $blogAnchor;
	/** @var string */
	public static $sessionKey;

	/**
	 * @param SiteRequestInfo $requestInfo
	 * @return array{hr_out: string|null, requestHandled: bool}
	 */
	public static function parseRequest($requestInfo) {
		list($request, $requestHandled) = self::handleBlogNav($requestInfo);
		return array('', $requestHandled);
	}
	
	public static function init($data, SiteInfo $siteInfo) {
		@setlocale(LC_CTYPE, 'C.UTF-8');
		self::$initData = $data;
		self::$siteInfo = $siteInfo;
		self::$sessionKey = '__BLOG_DATA_'.$siteInfo->siteId.'__';
	}

	/**
	 * @param $reqInf
	 * @return array{request: BlogNavigation, requestHandled: bool}
	 */
	private static function handleBlogNav($reqInf) {
		$requestHandled = false;
		$forcedHome = false;
		if (!$reqInf->page) {
			foreach (self::$siteInfo->pages as $li) {
				if ($li['id'] != self::$siteInfo->homePageId) continue;
				$reqInf->page = $li;
				$forcedHome = true;
				break;
			}
		}
		
		self::$blogNav = new BlogNavigation();
		self::$blogNav->args = $reqInf->urlArgs;
		self::$blogNav->lang = $reqInf->lang;
		self::$blogNav->defLang = self::$siteInfo->defLang;
		self::$blogNav->baseLang = self::$siteInfo->baseLang;
		self::$blogNav->basePath = self::$siteInfo->baseDir;
		self::$blogNav->baseUrl = preg_replace('#^[^\:]+\:\/\/[^\/]+(?:\/|$)#', '/', self::$siteInfo->baseUrl)
				.((!self::$siteInfo->modRewrite && !preg_match('#\?route=#', self::$siteInfo->baseUrl)) ? '?route=' : '');
		if (isset(self::$initData->defaultBlogPageId)) {
			$defBlogPageId = is_array(self::$initData->defaultBlogPageId) ? (isset(self::$initData->defaultBlogPageId[self::$blogNav->lang]) ? self::$initData->defaultBlogPageId[self::$blogNav->lang] : self::$initData->defaultBlogPageId[""]) : self::$initData->defaultBlogPageId;
			foreach (self::$siteInfo->pages as $li) {
				if ($li['id'] != $defBlogPageId) continue;
				self::$blogNav->defaultBlogPageRoute = ($li['id'] != self::$siteInfo->homePageId) ? tr_($li['alias']) : '';
				break;
			}
		}
		self::$blogNav->pageId = isset($reqInf->page['id']) ? $reqInf->page['id'] : null;
		$defLang = self::$siteInfo->defLang ? self::$siteInfo->defLang : self::$siteInfo->baseLang;
		self::$blogNav->pageBaseUrl = self::$blogNav->baseUrl
				.(($reqInf->lang == $defLang || !$reqInf->lang) ? '' : ($reqInf->lang.'/'))
				.(($reqInf->page && $reqInf->page['id'] != self::$siteInfo->homePageId) ? (tr_($reqInf->page['alias']).'/') : '');
		$pageCtrls = (isset($reqInf->page['controllers']) && is_array($reqInf->page['controllers'])) ? $reqInf->page['controllers'] : array();
		$categoryKey = (isset($reqInf->urlArgs[0]) && $reqInf->urlArgs[0]) ? $reqInf->urlArgs[0] : null;
		if (in_array('wb_blog', $pageCtrls)) {
			// If current page is blog page use it as default blog page for current page.
			if( isset(self::$initData->blogElementsLangsAndPages[self::$blogNav->getCurrLang()]) && in_array($reqInf->page['id'], self::$initData->blogElementsLangsAndPages[self::$blogNav->getCurrLang()]) )
				self::$blogNav->defaultBlogPageRoute = ($reqInf->page['id'] != self::$siteInfo->homePageId) ? tr_($reqInf->page['alias']) : '';
			$itemKey = (isset($reqInf->urlArgs[1]) && $reqInf->urlArgs[1]) ? $reqInf->urlArgs[1] : null;
			self::$blogNav->category = self::resolveCategoryByRequest(self::$blogNav);
			if (self::$blogNav->category) {
				$forcedHome = false;
				$requestHandled = true;
			} else {
				$categoryKey = null;
				$itemKey = (isset($reqInf->urlArgs[0]) && $reqInf->urlArgs[0]) ? $reqInf->urlArgs[0] : null;
			}
			self::$blogNav->lastSelectedCategory = self::resolveLastSelectedCategory();
			self::$blogNav->item = self::resolveItemByRequest(self::$blogNav);
			if (self::$blogNav->item) {
				if( !empty(self::$blogNav->item->seoTitle) )
					$reqInf->title = (string)tr_(self::$blogNav->item->seoTitle);
				if( !empty(self::$blogNav->item->seoDescription) )
					$reqInf->description = (string)tr_(self::$blogNav->item->seoDescription);
				if( !empty(self::$blogNav->item->seoKeywords) )
					$reqInf->keywords = (string)tr_(self::$blogNav->item->seoKeywords);
				if( !empty(self::$blogNav->item->thumbnail) ) {
					if( is_string(self::$blogNav->item->thumbnail) )
						$reqInf->image = self::$blogNav->item->thumbnail;
				}
				$forcedHome = false;
				$requestHandled = true;
			}
			self::$blogNav->categoryKey = $categoryKey;
			self::$blogNav->itemKey = $itemKey;
		}
		if ($forcedHome) $reqInf->page = null;
		return array(self::$blogNav, $requestHandled);
	}
	
	/**
	 * Translate blog module variable.
	 * @param string $key
	 * @return string
	 */
	public static function __($key) {
		$langKey = (self::$blogNav && self::$blogNav->lang) ? self::$blogNav->lang : '-';
		return SiteModule::__($key, $langKey);
	}
	
	/**
	 * Resolve last selected category.
	 * @return \Profis\SitePro\controller\BlogDataCategory|null
	 */
	private static function resolveLastSelectedCategory() {
		if (isset($_SERVER['HTTP_REFERER'])) {
			if (preg_match('#\/blog\-cat\-(\d+)#', $_SERVER['HTTP_REFERER'], $m)) {
				return BlogData::getCategory($m[1]);
			} else {
				$refUrl = $_SERVER['HTTP_REFERER'];
				$refDecUrl = urldecode($refUrl);
				$categories = BlogData::getCategories();
				for ($i = 0, $c = count($categories); $i < $c; $i++) {
					$category = $categories[$i];
					$lnAlias = tr_($categories[$i]->alias);
					if ($lnAlias && (preg_match('/\/' . $lnAlias . '($|\-|\/)/', $refUrl) || preg_match('/\/' . $lnAlias . '($|\-|\/)/', $refDecUrl))) {
						return $category;
					}
				}
			}
		}
		return null;
	}
	
	/**
	 * Resolve category by request.
	 * @param BlogNavigation $request
	 * @return \Profis\SitePro\controller\BlogDataCategory|null
	 */
	public static function resolveCategoryByRequest(BlogNavigation $request) {
		$categoryKey = (isset($request->args[0]) && $request->args[0]) ? $request->args[0] : null;
		if ($categoryKey != 'all') {
			$categories = BlogData::getCategories();
			for ($i = 0, $c = count($categories); $i < $c; $i++) {
				if ('blog-cat-'.$categories[$i]->id != $categoryKey
						&& (!trim(tr_($categories[$i]->alias), '/') || trim(tr_($categories[$i]->alias), '/') != $categoryKey)) continue;
				return $categories[$i];
			}
		}
		return null;
	}
	
	/**
	 * Resolve item by request.
	 * @param BlogNavigation $request
	 * @return \Profis\SitePro\controller\BlogDataItem|null
	 */
	public static function resolveItemByRequest(BlogNavigation $request) {
		if (count($request->args) > 1) 
			return null;
		$itemKey = end($request->args);
		$items = BlogData::getItems();
		$langCode = $request->getCurrLang();
		for ($i = 0, $c = count($items); $i < $c; $i++) {
			$item = $items[$i];
			$alias = is_string($item->alias) ? $item->alias : (isset($item->alias->{$langCode}) ? $item->alias->{$langCode} : null);
			if ('blog-item-'.$item->id != $itemKey && (!$alias || $alias !== $itemKey)) continue;
			return $item;
		}
		return null;
	}
	
}
