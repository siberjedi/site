<?php
/** @var BlogElement $this */
/** @var BlogElementOptions $options */
/** @var BlogPostData[] $items */
?>

	<?php foreach ($items as $idx => $item): ?>
	<a href="<?php echo htmlspecialchars($request->detailsUri($item, $category).$urlAnchor); ?>"
	   class="wb-blog-item<?php if ($idx % 4 === 0) echo ' big'; ?><?php echo isset($itemsStyle[$item->id]['class']) ? $itemsStyle[$item->id]['class'] : '' ?>"
		<?php echo isset($itemsStyle[$item->id]['data-wb-anim-entry-time']) ? ('data-wb-anim-entry-time="' . $itemsStyle[$item->id]['data-wb-anim-entry-time'] . '"') : '' ?>
		<?php echo isset($itemsStyle[$item->id]['data-wb-anim-entry-delay']) ? ('data-wb-anim-entry-delay="' . $itemsStyle[$item->id]['data-wb-anim-entry-delay'] . '"') : '' ?>>
		<div class="wrapper"><?php
			if ($options->useThumbnails || $isPostWithoutContent):
				if ($options->useThumbnails && $item->thumbnail):
					?><div class="blog-item-thumbnail" style="background-image: url('<?php echo str_replace("'", "\'", $item->thumbnail); ?>');"></div><?php
				elseif (($options->useThumbnails && !$item->thumbnail) || $isPostWithoutContent):
					?><div class="blog-item-thumbnail no-thumbnail"><span class="glyphicon glyphicon-picture"></span></div><?php
				endif;
			endif;
			if (!$isPostWithoutContent):
			?><div class="caption">
				<?php if (isset($options->displayTitle) && $options->displayTitle): ?>
				<div class="title"><?php echo htmlspecialchars(tr_($item->title) ?: ''); ?></div>
				<?php endif; ?>
				<?php if (isset($options->displayDate) && $options->displayDate && ($dateStr = $this->getPrettyDate($item))): ?>
				<span data-format="<?php echo $options->dateFormat; ?>" data-timestamp="<?php echo $this->getFullDateTime($item); ?>" class="date"><?php echo $dateStr; ?></span>
				<?php endif; ?>
				<?php if (isset($options->displayShortText) && $options->displayShortText && ($shortText = $this->getShortText($item))): ?>
				<span class="description"><?php echo $shortText; ?></span>
				<?php endif; ?>
			</div><?php endif;
		?></div>
	</a><?php endforeach; ?>

<script type="text/javascript">
	(function() {
		var options = <?php echo json_encode($options); ?>;
		var elem = $('#' + options.id);
		var blogElem = elem.children('.wb-blog');
		var thumbPadding = options.thumbPadding;
		
		var maxColWidth = 200;
		var maxWidth = maxColWidth * 3 + thumbPadding * 2;
		var resizeCallback = function(width, height) {
			if (width <= maxWidth) {
				blogElem.addClass('mobile');
			} else {
				blogElem.removeClass('mobile');
			}
		};
		
		var lastWidth, lastHeight;
		$(window).on('resize', function() {
			var currWidth = elem.outerWidth(), currHeight = elem.outerHeight();
			if (!lastWidth || !lastHeight || lastWidth !== currWidth || lastHeight !== currHeight) {
				resizeCallback(currWidth, currHeight);
				lastWidth = currWidth;
				lastHeight = currHeight;
			}
		});
		setTimeout(function() {
			resizeCallback(elem.outerWidth(), elem.outerHeight());
		}, 100);
	})();
</script>