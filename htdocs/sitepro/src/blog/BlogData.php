<?php

class BlogData {
	
	/** @var BlogModuleData */
	private static $data;
	/** @var BlogCategoryData[] */
	private static $categoryIdx;
	
	private static function getDataFile() {
		return dirname(__FILE__).'/blog.dat';
	}
	
	/** @return BlogModuleData */
	private static function getData() {
		if (!self::$data) {
			$dataFile = self::getDataFile();
			if (is_file($dataFile)) {
				self::$data = json_decode(file_get_contents($dataFile));
			}
		}
		return self::$data;
	}
	
	/** @return BlogCategoryData */
	public static function getCategory($id) {
		if (!self::$categoryIdx) {
			self::$categoryIdx = array();
			$list = self::getCategories();
			for ($i = 0, $c = count($list); $i < $c; $i++) {
				self::$categoryIdx[$list[$i]->id] = $list[$i];
			}
		}
		return ($id && isset(self::$categoryIdx[$id])) ? self::$categoryIdx[$id] : null;
	}
	
	/**
	 * Get category indent from depth in category tree.
	 * @param BlogCategoryData $category
	 * @param int $lvl indent of parent item.
	 * @return int
	 */
	private static function getCategoryIndent($category, $lvl = 0) {
		if (!$category || !isset($category->parentId) || !$category->parentId) return $lvl;
		$parent = self::getCategory($category->parentId);
		if (!$parent) return $lvl;
		return self::getCategoryIndent($parent, $lvl + 1);
	}
	
	/**
	 * @param bool $indent return indented category list.
	 * @return BlogCategoryData[]
	 */
	public static function getCategories($indent = false) {
		if (($data = self::getData()) && isset($data->categories) && is_array($data->categories)) {
			if ($indent) {
				for ($i = 0, $c = count($data->categories); $i < $c; $i++) {
					$data->categories[$i]->indent = self::getCategoryIndent($data->categories[$i]);
				}
			}
			return $data->categories;
		}
		return array();
	}
	
	/** @return BlogPostData[] */
	public static function getItems() {
		if (($data = self::getData()) && isset($data->posts) && is_array($data->posts)) {
			return $data->posts;
		}
		return array();
	}
	
	/**
	 * @param int $categoryId
	 * @return BlogPostData[]
	 */
	public static function getCategoryItems($categoryId) {
		$catItems = array();
		$items = self::getItems();
		foreach ($items as $item) {
			if (in_array($categoryId, $item->categories)) {
				$catItems[] = $item;
			}
		}
		return $catItems;
	}
	
	/**
	 * Checks if category contains item.
	 * @param int $categoryId
	 * @param int $itemId
	 * @return bool
	 */
	public static function categoryHasItem($categoryId, $itemId) {
		$categories = self::getCategories();
		foreach ($categories as $category) {
			if ($category->id == $categoryId) {
				$items = self::getCategoryItems($categoryId);
				foreach ($items as $item) {
					if ($item->id == $itemId) {
						return true;
					}
				}
			}
		}
		return false;
	}
	
	public static function storeFilters($pageId, $filters) {
		if (!session_id()) @session_start();
		$_SESSION[BlogModule::$sessionKey.'_filters_'.$pageId] = $filters;
	}
	
	public static function loadFilters($pageId) {
		if (!session_id()) @session_start();
		$key = BlogModule::$sessionKey.'_filters_'.$pageId;
		$filters = isset($_SESSION[$key]) ? $_SESSION[$key] : null;
		if (!is_array($filters)) $filters = array();
		return $filters;
	}
	
}

/**
 * @property BlogPostData[] $posts
 * @property string $layout
 * @property BlogCategoryData[] $categories
 */
class BlogModuleData {}

/**
 * @property int $id
 * @property string $layout
 * @property string|object $title
 * @property string|object $text
 * @property string $shortText
 * @property string $thumbnail
 * @property object $thumbnailAlt
 * @property string $date
 * @property string $dateDate
 * @property string $dateTime
 * @property string $createdDate
 * @property string $updatedDate
 * @property string $state
 * @property int[] $categories
 * @property bool $fbComments
 * @property string $seoTitle
 * @property string $seoDescription
 * @property string $seoAlias
 */
class BlogPostData {}

/**
 * @property int $id
 * @property int $parentId
 * @property string $name
 * @property string $alias
 * @property int $indent
 */
class BlogCategoryData {}
