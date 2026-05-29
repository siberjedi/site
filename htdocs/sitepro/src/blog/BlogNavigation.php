<?php

class BlogNavigation {
	
	/** @var string */
	public $basePath;
	/** @var string */
	public $baseUrl;
	/** @var string */
	public $defaultBlogPageRoute;
	/** @var string */
	public $pageBaseUrl;
	/** @var int */
	public $pageId;
	/** @var string */
	public $lang;
	/** @var string */
	public $defLang;
	/** @var string */
	public $baseLang;
	/** @var string */
	public $categoryKey;
	/** @var string */
	public $itemKey;
	/** @var BlogCategoryData */
	public $category;
	/** @var BlogCategoryData */
	public $lastSelectedCategory;
	/** @var BlogPostData */
	public $item;
	/**
	 * URL arguments.
	 * @var string[]
	 */
	public $args = array();
	/** @var string */
	private $protocol;
	/** @var string */
	private $host;
	
	public function __construct() {
		if (!isset($_SERVER['HTTPS'])) $_SERVER['HTTPS'] = null;
		$this->protocol = $this->isHttps() ? 'https' : 'http';
		$this->host = (isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '127.0.0.1';
	}
	
	/**
	 * Determines whether request protocol is HTTPS.
	 * @return boolean
	 */
	private function isHttps() {
		return isHttps();
	}
	
	/**
	 * Get parameter from global GET array
	 * @param string $key
	 * @param mixed $default
	 * @return mixed
	 */
	public function getQueryParam($key, $default = null) {
		if (!is_null(_get($key))) {
			return _get($key);
		}
		return $default;
	}
	
	/**
	 * Get parameter from global POST array
	 * @param string $key
	 * @param mixed $default
	 * @return mixed
	 */
	public function getFormParam($key, $default = null) {
		if (isset($_POST[$key])) {
			return $_POST[$key];
		}
		return $default;
	}
	
	public function getCurrUrl($noQueryString = false) {
		return getCurrUrl($noQueryString);
	}
	
	/**
	 * Gets currently used language on site.
	 * @return string
	 */
	public function getCurrLang() {
		return ($this->lang ? $this->lang : ($this->defLang ? $this->defLang : $this->baseLang));
	}
	
	/**
	 * @param string $fileUri
	 * @return string
	 */
	public function fullFileUrl($fileUri) {
		return $this->protocol.'://'.$this->host.'/'.ltrim($fileUri, '/');
	}

	/**
	 * Build blog URI
	 * @param BlogPostData $item
	 * @param BlogCategoryData|string $category
	 * @return string
	 */
	public function detailsUri($item = null, $category = null, $noCurrent = false, $params = null, $qsa = false) {
		$catPart = ($category
				? (is_string($category) ? $category : ((tr_($category->alias) ? tr_($category->alias) : 'blog-cat-'.$category->id)))
				: (($this->category && !$noCurrent && $this->categoryKey) ? $this->categoryKey : '')
			 );

		$url = $this->pageBaseUrl . (($catPart && !$item && mb_strpos($this->pageBaseUrl, "/{$catPart}") === false) ? "{$catPart}/" : '')
		.($item ? (tr_($item->alias) ? tr_($item->alias) : ('blog-item-'.$item->id)) : '');

		$hasTrailingSlash = (substr(ltrim($url, '/'), -1) == '/') || $url === '/';
		if (!$hasTrailingSlash && !!SiteModule::$siteInfo->useTrailingSlashes) {
			$url .= '/';
		}
		$paramsArray = array();
		if ($qsa) $paramsArray = array_merge($paramsArray, _get());
		if (is_array($params)) $paramsArray = array_merge($paramsArray, $params);
		$queryStr = http_build_query($paramsArray);
		if (!empty($paramsArray) && !empty($queryStr)) $url .= (preg_match('#\?#', $url) ? '&' : '?') . http_build_query($paramsArray);
		return $url;
	}
	
	/**
	 * Build blog URL
	 * @param BlogPostData $item
	 * @param BlogCategoryData|string $category
	 * @return string
	 */
	public function detailsUrl($item = null, $category = null, $noCurrent = false, $params = null, $qsa = false) {
		return $this->protocol.'://'.$this->host . $this->detailsUri($item, $category, $noCurrent, $params, $qsa);
	}
	
}
