<?php

class BlogElement {
	
	const LAYOUT_THUMBS = 'thumbs';
	const LAYOUT_LIST = 'list';
	const LAYOUT_ONETHREE = 'onethree'; // spell-checker: ignore onethree
	
	/** @var BlogElementOptions */
	private $options;
	/** @var string */
	private $viewPath;
	
	public function __construct($options) {
		$this->options = $options;
		$this->viewPath = dirname(__FILE__).'/view';
	}
	
	/** @param BlogElementOptions $options */
	public static function render(BlogNavigation $request, $options) {
		$reqCat = BlogModule::resolveCategoryByRequest($request);
		$reqItem = BlogModule::resolveItemByRequest($request, $reqCat);
		
		$cat = $options->category ? BlogData::getCategory($options->category) : $reqCat;
		$request->category = $cat ? $cat : null;
		$request->categoryKey = null;
		
		$item = ($request->item && $options->category && !BlogData::categoryHasItem($options->category, $request->item->id)) ? null : $reqItem;
		if ($item && $options->category && !BlogData::categoryHasItem($options->category, $item->id)) {
			$item = null;
		}
		$request->item = $item ? $item : null;
		$request->itemKey = null;
		
		if (!BlogModule::$blogAnchor && self::isAnchorNavAvailable($options)) {
			BlogModule::$blogAnchor = $options->anchor;
		}
		
		$elem = new BlogElement($options);
		if ($request->item) {
			$elem->renderPostAction($request);
		} else {
			$elem->renderListAction($request, $options->id);
		}
	}
	
	private function renderPostAction(BlogNavigation $request) {
		$blogLocale = BlogLocale::findByCode($request->getCurrLang());
		$locale = $blogLocale ? $blogLocale->locale : 'en_US';
		$filterQs = BlogData::loadFilters($request->pageId);
		$this->renderView($this->viewPath.'/post.php', array(
			'request' => $request,
			'options' => $this->options,
			'elemId' => $this->options->id,
			'item' => $request->item,
			'locale' => $locale,
			'buildMicroData' => function() use ($request) {
				return self::buildMicroData($request);
			},
			'urlCommentsAnchor' => $this->options->anchor.'comments',
			'itemUrl' => self::applyAnchor($request->detailsUrl($request->item), $this->options),
			'backUrl' => self::applyAnchor($request->detailsUri(null, $request->lastSelectedCategory, false, $filterQs), $this->options)
		));
	}

	private static function buildMicroData(BlogNavigation $request) {
		$item = $request->item;

		$headline = tr_($item->title) ?: '';
		$image = $item->thumbnail;
		if ($image) $image = $request->fullFileUrl($image);
		$url = $request->detailsUrl($item);
		$dateTimePublished = new DateTime(trim($item->dateDate.' '.$item->dateTime));
		$dateTimeModified = new DateTime($item->updatedDate ? $item->updatedDate : $item->createdDate);

		return '<div itemscope itemtype="https://schema.org/BlogPosting">'
			.'<meta itemprop="dateModified" content="'.htmlspecialchars($dateTimeModified->format('c')).'" />'
			.'<meta itemprop="datePublished" content="'.htmlspecialchars($dateTimePublished->format('c')).'" />'
			.'<meta itemprop="headline" content="'.htmlspecialchars($headline).'" />'
			.($image
				? ('<link itemprop="image" href="'.htmlspecialchars($image).'" />')
				: '')
			.'<link itemprop="mainEntityOfPage" href="'.htmlspecialchars($url).'" />'
			.trim(implode("\n", array_map(function($categoryId) use ($request) {
				$category = BlogData::getCategory($categoryId);
				if (!$category) return '';
				return (
					'<div itemprop="keywords" itemscope itemtype="https://schema.org/DefinedTerm">'
						.'<meta itemprop="termCode" content="'.htmlspecialchars(tr_($category->name)).'" />'
						.'<link itemprop="inDefinedTermSet" href="'.htmlspecialchars($request->detailsUrl(null, $category)).'" />'
					.'</div>'
				);
			}, $item->categories)))
		.'</div>';
	}
	
	/**
	 * @param BlogPostData[] $items
	 * @param string $elemId
	 * @param string $layout
	 * @return BlogPostData[]
	 */
	private static function applyThumbnail(array $items, $elemId, $layout) {
		for ($i = 0, $c = count($items); $i < $c; $i++) {
			$item = $items[$i];
			if (isset($item->thumbnailAlt)) {
				if (!isset($item->thumbnailAlt->{'original'})) {
					// Note: save original
					$item->thumbnailAlt->{'original'} = $item->thumbnail;
				}
				if ($layout == self::LAYOUT_ONETHREE && $i == 0) {
					// Note: items are cached into BlogModule's static field,
					// so we need to make sure we reset to original value.
					$item->thumbnail = $item->thumbnailAlt->{'original'};
				} else {
					if (isset($item->thumbnailAlt->{$elemId}) && $item->thumbnailAlt->{$elemId}) {
						$item->thumbnail = $item->thumbnailAlt->{$elemId};
					}
				}
			}
		}
		return $items;
	}

	/**
	 * @param BlogCategoryData|null $category
	 * string|null $q
	 * @param BlogElementPaging|null $paging
	 * @return BlogPostData[]
	 */
	private function getFilteredItems($category, $q, $paging) {
		$list = array();
		$items = BlogData::getItems();

		foreach ($items as $item) {
			if ($category && !in_array($category->id, $item->categories)) continue;
			if (is_string($q)) {
				$data = simplifyText(strip_tags(tr_($item->title).'; '.tr_($item->text)));
				$sdata = simplifyText($q);
				if ($sdata && (function_exists('mb_strpos') && mb_strpos($data, $sdata) === false || strpos($data, $sdata) === false)) {
					continue;
				}
			}

			$list[] = $item;
		}
		if ($paging) {
			$paging->update(count($list));
			return array_slice($list, $paging->pageIndex * $paging->itemsPerPage, $paging->itemsPerPage);
		} else {
			return $list;
		}
	}
	
	private function __($msg) {
		return BlogModule::__($msg);
	}
	
	/**
	 * Note: this is used inside view file
	 * @param BlogPostData $post
	 */
	protected function getPrettyDate($post) {
		$m = null;
		$prettyDate = ($post->dateDate && $post->dateTime) ? ($post->dateDate.' '.$post->dateTime)
				: (preg_match('#(\d{4}\-\d{2}\-\d{2}\ \d{2}:\d{2}):\d{2}#', $post->createdDate, $m) ? $m[1] : '');

		if ($prettyDate) {
			$format = $this->options->dateFormat;

			$timestamp = strtotime($prettyDate);

			$prettyDate = str_replace("{YYYY}", date("Y", $timestamp), $format);
			$prettyDate = str_replace("{YY}", date("y", $timestamp), $prettyDate);
			$prettyDate = str_replace("{MM}", date("m", $timestamp), $prettyDate);
			$prettyDate = str_replace("{M}", date("n", $timestamp), $prettyDate);
			$prettyDate = str_replace("{DD}", date("d", $timestamp), $prettyDate);
			$prettyDate = str_replace("{D}", date("j", $timestamp), $prettyDate);
			$prettyDate = str_replace("{G}", date("G", $timestamp), $prettyDate);
			$prettyDate = str_replace("{H}", date("H", $timestamp), $prettyDate);
			$prettyDate = str_replace("{h}", date("g", $timestamp), $prettyDate);
			$prettyDate = str_replace("{m}", date("i", $timestamp), $prettyDate);
			$prettyDate = str_replace("{A}", date("A", $timestamp), $prettyDate);
			$prettyDate = str_replace("{a}", date("a", $timestamp), $prettyDate);

			$prettyDate = $prettyDate;
		}

		return $prettyDate;
	}

	/**
	 * @param mixed $post
	 * 
	 * @return string
	 */
	protected function getFullDateTime($post) {
		$prettyDate = ($post->dateDate && $post->dateTime) ? ($post->dateDate.' '.$post->dateTime) : ($post->createdDate ? $post->createdDate : '');
		return $prettyDate ? date('c', strtotime($prettyDate)) : '';
	}

	/**
	 * Note: this is used inside view file
	 * @param BlogPostData $post
	 */
	protected function getShortText($post) {
		$text = html_entity_decode(strip_tags(tr_($post->shortText) ?: ''));
		if (empty($text)) {
			$text = html_entity_decode(strip_tags(tr_($post->text) ?: ''));
		}
		return $text ? (function_exists('mb_substr') ? mb_substr($text, 0, $this->options->shortTextLength) : substr($text, 0, $this->options->shortTextLength)).
				((function_exists('mb_strlen') ? mb_strlen($text) : strlen($text)) > $this->options->shortTextLength ? '...' : '') : '';
	}
	
	private function getLayoutClass() {
		$classPrefix = 'wb-blog-type-';
		$layout = $this->options->layout;
		return $layout === self::LAYOUT_ONETHREE ? $classPrefix.'thumbs '.$classPrefix.'onethree' : $classPrefix.$layout;
	}
	
	/** @param string $elemId */
	private function renderListAction(BlogNavigation $request, $elemId) {
		$pageQs = $request->getQueryParam(BlogElementPaging::PAGE_PROP);
		$cppQs = $request->getQueryParam(BlogElementPaging::CPP_PROP);
		$paging = ($this->options->itemsPerPage > 0) ? new BlogElementPaging(
				($pageQs ? intval($pageQs) - 1 : 0),
				($cppQs ? intval($cppQs) : $this->options->itemsPerPage)
			) : null;

		$q = $request->getQueryParam('q', null);

		BlogData::storeFilters($request->pageId, array(
			BlogElementPaging::PAGE_PROP => $pageQs,
			BlogElementPaging::CPP_PROP => $cppQs
		));

		$items = self::applyThumbnail(
			$this->getFilteredItems($request->category, $q, $paging),
			$elemId, $this->options->layout);

		$entryAnim = null;
		$hoverAnim = null;
		$css = '';
		if (isset($this->options->animationThumbnail) && is_object($this->options->animationThumbnail)) {
			$anim = $this->options->animationThumbnail;
			if (isset($anim->normal) && is_object($anim->normal)) {
				$entryAnim = (object) array(
					'anim' => $anim->normal,
					'styleClass' => 'wb-anim wb-anim-entry '.self::buildAnimName($anim->normal),
					'time' => self::timeAnim($anim->normal),
					'delay' => self::timeAnimDelay($anim->normal),
				);
				$anim->normal->delay = 0;
				$css .= "#{$this->options->id} .wb-blog-list .wb-blog-item.wb-anim-entry-on {" . self::buildAnimCssString($anim->normal) . '}';
			}
			if (isset($anim->hover) && is_object($anim->hover)) {
				$hoverAnim = (object) array(
					'styleClass' => 'wb-anim '
						.((isset($anim->hover->loop) && $anim->hover->loop)
							? ' loop'
							: '')
						.self::buildAnimName($anim->hover),
				);
				$css .= "#{$this->options->id} .wb-blog-list .wb-blog-item:hover {" . self::buildAnimCssString($anim->hover) . '}';
			}
		}
		$i = 0;
		$itemsStyle = array();
		foreach ($items as $item) {
			$itemsStyle[$item->id] = [];
			$cls = '';
			if ($entryAnim) {
				$itemsStyle[$item->id]['data-wb-anim-entry-time'] = $entryAnim->time;
				$itemsStyle[$item->id]['data-wb-anim-entry-delay'] = $entryAnim->delay * $i;
				$cls .= " {$entryAnim->styleClass}";
			}
			if ($hoverAnim) {
				$cls .= " {$hoverAnim->styleClass}";
			}
			$itemsStyle[$item->id]['class'] = $cls;
			$i++;
		}
		
		$categories = BlogData::getCategories(true);
		$this->renderView($this->viewPath.'/list.php', array(
			'request' => $request,
			'options' => $this->options,
			'css' => $css,
			'itemsStyle' => $itemsStyle,
			'isPostWithoutContent' => (!$this->options->displayTitle && !$this->options->displayDate && !$this->options->displayShortText),
			'category' => $request->category,
			'categories' => $categories,
			'elemId' => $this->options->id,
			'items' => $items,
			'paging' => $paging,
			'layoutClass' => $this->getLayoutClass(),
			'urlAnchor' => self::applyAnchor('', $this->options),
			'urlCommentsAnchor' => '#'.$this->options->anchor.'comments',
			'layoutFile' => 'layout_'.$this->options->layout.'.php',
			'currUrl' => $request->getCurrUrl(true, $request->category),
			'showCats' => !empty($categories) && count($categories) > 1 && (!$request->category || !$this->options->category || $request->category->id != $this->options->category),
			'q' => isset($q) ? $q : null
		));
	}
	
	/**
	 * Escape PHP in content.
	 * @param string $content content to escape.
	 * @return string
	 */
	protected function noPhp($content) {
		return str_replace(array('<?', '?>'), array('&lt;?', '?&gt;'), $content);
	}
	
	/**
	 * Render template.
	 * @param string $templatePath path to template file.
	 * @param array $vars associative array with template variable values.
	 */
	private function renderView($templatePath, $vars) {
		extract($vars);
		require $templatePath;
	}
	
	/**
 	 * @param BlogElementOptions $options
	 * @return bool
	 */
	private static function isAnchorNavAvailable($options) {
		return isset($options->anchor) && $options->anchor
			&& (!isset($options->disableAnchorNav) || !$options->disableAnchorNav);
	}

	/**
	 * @param string $url
	 * @param BlogElementOptions $options
	 * @return string
	 */
	private static function applyAnchor($url, $options) {
		return $url.(self::isAnchorNavAvailable($options) ? ('#'.$options->anchor) : '');
	}

	/** @return bool */
	private static function isAnimValid(stdClass $val) {
		return ($val && isset($val->effect) && is_string($val->effect) && $val->effect);
	}

	protected static function timeAnimDelay(stdClass $val) {
		if (!self::isAnimValid($val)) return 0;
		return (isset($val->delay) && is_numeric($val->delay))
			? floatval($val->delay)
			: 0;
	}

	protected static function timeAnim(stdClass $val) {
		if (!self::isAnimValid($val)) return 0;
		$time = 0;
		$time += (isset($val->duration) && is_numeric($val->duration))
			? floatval($val->duration)
			: 0.6;
		if (isset($val->delay) && is_numeric($val->delay)) {
			$time += floatval($val->delay);
		}
		return $time;
	}

	protected static function buildAnimName(stdClass $val) {
		if (!self::isAnimValid($val)) return '';
		return 'wb-anim-'.$val->effect
			. ((isset($val->direction) && $val->direction) ? ('-'.$val->direction) : '');
	}

	protected static function buildAnimCss(stdClass $val, $useDelay = true) {
		if (!self::isAnimValid($val)) {
			return array('animation' => 'none');
		}
		return array(
			'animation' => self::buildAnimName($val)
				.' '.(isset($val->duration) ? $val->duration : '0.6').'s'
				.' '.(isset($val->timing) ? $val->timing : 'linear')
				. ($useDelay ? (' '.(isset($val->delay) ? $val->delay : '0').'s') : ''),
			'animation-iteration-count' => ($val->loop ? 'infinite' : 1),
		);
	}

	protected static function buildAnimCssString(stdClass $val, $useDelay = true) {
		$css = self::buildAnimCss($val, $useDelay);

		$r = '';
		foreach ($css as $key => $value) {
			$r .= $key . ': ' . $value . ';';
		}
		return $r;
	}
}

class BlogElementPaging {
	
	const PAGE_PROP = 'bpage';
	const CPP_PROP = 'bcpp';
	
	/** @var int */
	public $itemsPerPage;
	/** @var int */
	public $pageIndex = 0;
	/** @var int */
	public $pageCount;
	/** @var int */
	public $pagesInPager = 5;
	/** @var int */
	public $startPageIndex;
	/** @var int */
	public $endPageIndex;
	
	public function __construct($pageIndex, $itemsPerPage) {
		$this->pageIndex = intval($pageIndex);
		$this->itemsPerPage = intval($itemsPerPage);
	}
	
	public function update($itemCount) {
		$this->itemsPerPage = ($this->itemsPerPage > 0) ? $this->itemsPerPage : 20;
		$this->pageCount = ceil($itemCount / $this->itemsPerPage);
		if ($this->pageCount > 0) {
			$this->pageIndex = ($this->pageIndex >= 0 && $this->pageIndex < $this->pageCount) ? $this->pageIndex : 0;
		}
		$this->pagesInPager = ($this->pagesInPager > 1) ? $this->pagesInPager : 5;
		
		if ($this->pageCount > 0) {
			$this->startPageIndex = $this->pageIndex - floor($this->pagesInPager / 2);
			if ($this->startPageIndex < 0) $this->startPageIndex = 0;
			$this->endPageIndex = $this->startPageIndex + $this->pagesInPager - 1;
			if ($this->endPageIndex >= $this->pageCount) {
				$this->endPageIndex = $this->pageCount - 1;
				$iip = max($this->pagesInPager - ($this->endPageIndex - $this->startPageIndex), 0);
				$this->startPageIndex -= min($this->startPageIndex, $iip);
			}
		} else {
			$this->startPageIndex = $this->endPageIndex = 0;
		}
	}
	
}

/**
 * @property string $id
 * @property string $anchor
 * @property bool $disableAnchorNav
 * @property int $category
 * @property string $layout
 * @property int $itemsPerPage
 * @property bool $displayTitle
 * @property bool $displayDate
 * @property bool $displayShortText
 * @property bool $useThumbnails
 * @property int $shortTextLength
 * @property int $thumbWidth
 * @property int $thumbHeight
 * @property int $thumbPadding
 * @property bool $showTextFilter
 * @property string $dateFormat
 */
class BlogElementOptions {}
