<?php
/** @var BlogElement $this */
/** @var BlogElementOptions $options */
/** @var BlogPostData[] $posts */
/** @var BlogElementPaging $paging */
/** @var string $css */

$pageProp = BlogElementPaging::PAGE_PROP;
$cppProp = BlogElementPaging::CPP_PROP;
?>

<?php if ($options->showTextFilter): ?>
	<div class="wb-blog-filters">
		<div style="display: flex;">
		<?php if (isset($showCats) && $showCats): ?>
		<select class="wb-blog-cat-select form-control cat-control">
			<option value="-1"
					data-blog-url="<?php echo htmlspecialchars($request->detailsUri(null, null, true)); ?>">
				<?php echo $this->__('All'); ?>
			</option>
			<?php foreach ($categories as $item): ?>
			<option value="<?php echo htmlspecialchars($item->id); ?>"
					<?php if ($category && $category->id == $item->id) echo ' selected="selected" '; ?>
					data-blog-url="<?php echo htmlspecialchars($request->detailsUri(null, $item, true)); ?>">
				<?php echo str_repeat('&nbsp;', $item->indent * 3); ?>
				<?php echo $this->noPhp(tr_($item->name)); ?>
			</option>
			<?php endforeach; ?>
		</select>
		<?php endif; ?>
		<input type="text" class="wb-blog-cat-select form-control search-control" style="margin-left: 10px;" placeholder="<?php echo $this->__('Search'); ?>" value="<?php echo $q ? $q : ''; ?>" />
		</div>
	</div>
<?php endif; ?>
<div class="<?php if ($layoutClass) echo ' '.$layoutClass; ?>" id="blog-data">

	<div class="wb-blog-wrapper">
		<div class="wb-blog-list"<?php echo !count($items) ? ' style="margin: 0px;"' : '' ?>>
			<?php if (count($items)): ?>
			<?php include $layoutFile; ?>
			<?php else: ?>
			<div style="text-align: left;">
				<p class="wb-store-sys-text"><?php echo $this->__('No items found'); ?>.</p>
			</div>
			<?php endif; ?>
		</div>
	</div>
	<?php if (isset($paging) && $paging && $paging->pageCount > 1): ?>
	<?php
		$queryArray = array_merge(array(), _get());
		unset($queryArray[$pageProp]);
		unset($queryArray[$cppProp]);
		$qs = (count($queryArray)) ? '&'.http_build_query($queryArray) : '';
		$pagingCurrUrl = $currUrl . (preg_match('#\?#', $currUrl) ? '&' : '?');
	?>
	<div class="wb-blog-paging">
		<ul class="pagination">
			<li<?php if ($paging->pageIndex == 0) echo ' class="disabled"'; ?>><a href="<?php echo $pagingCurrUrl; ?><?php echo $pageProp; ?>=<?php echo max($paging->pageIndex, 1); ?>&amp;<?php echo $cppProp; ?>=<?php echo $paging->itemsPerPage; ?><?php echo $qs.$urlAnchor; ?>">&laquo;</a></li>
			<?php if ($paging->startPageIndex > 0): ?>
			<li><a href="<?php echo $pagingCurrUrl; ?><?php echo $pageProp; ?>=1&amp;<?php echo $cppProp; ?>=<?php echo $paging->itemsPerPage; ?><?php echo $qs.$urlAnchor; ?>">1</a></li>
				<?php if ($paging->startPageIndex > 1): ?>
			<li class="disabled"><a href="javascript:void(0)">...</a></li>
				<?php endif; ?>
			<?php endif; ?>
			<?php for ($i = $paging->startPageIndex; $i <= $paging->endPageIndex; $i++): ?>
			<li<?php if ($paging->pageIndex == $i) { echo ' class="active"'; } ?>><a href="<?php echo $pagingCurrUrl; ?><?php echo $pageProp; ?>=<?php echo $i + 1; ?>&amp;<?php echo $cppProp; ?>=<?php echo $paging->itemsPerPage; ?><?php echo $qs.$urlAnchor; ?>"><?php echo $i + 1; ?></a></li>
			<?php endfor; ?>
			<?php if ($paging->endPageIndex < ($paging->pageCount - 1)): ?>
				<?php if ($paging->endPageIndex < ($paging->pageCount - 2)): ?>
			<li class="disabled"><a href="javascript:void(0)">...</a></li>
				<?php endif; ?>
			<li><a href="<?php echo $pagingCurrUrl; ?><?php echo $pageProp; ?>=<?php echo $paging->pageCount; ?>&amp;<?php echo $cppProp; ?>=<?php echo $paging->itemsPerPage; ?><?php echo $qs.$urlAnchor; ?>"><?php echo $paging->pageCount; ?></a></li>
			<?php endif; ?>
			<li<?php if ($paging->pageIndex == ($paging->pageCount - 1)) { echo ' class="disabled"'; } ?>><a href="<?php echo $pagingCurrUrl; ?><?php echo $pageProp; ?>=<?php echo min($paging->pageCount, ($paging->pageIndex + 2)); ?>&amp;<?php echo $cppProp; ?>=<?php echo $paging->itemsPerPage; ?><?php echo $qs.$urlAnchor; ?>">&raquo;</a></li>
		</ul>
	</div>
	<?php endif; ?>
</div>
<script type="text/javascript">
	$(function() {
		var elem = $('#<?php echo $elemId; ?>');
		var blogUrl = '<?php echo htmlspecialchars($request->detailsUri(null, null, true)); ?>';
		var blogAnchor = '<?php echo $urlAnchor ?>';
		var filterCategory = elem.find('.cat-control');
		var filterSearch = elem.find('.search-control');

		filterCategory.on('change', function() {
			var $option = $(this.options[this.selectedIndex]);
			var url = $option.attr('data-blog-url') + location.search + blogAnchor;
			if (url) {
				location.href = url;
				return false;
			}
		});

		filterSearch.on('keyup', function(e) {
			if (e.keyCode != 13) {
				return;
			}

			let url = blogUrl

			let search = $(this).val();
			if (!search) {
				location.href = url;
				return;
			}

			url += '?q=' + encodeURIComponent(search) + location.hash;
			location.href = url;
		});
	});
</script>
<style><?php echo $css ?></style>
