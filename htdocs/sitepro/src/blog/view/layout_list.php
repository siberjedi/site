<?php
/** @var BlogElement $this */
/** @var BlogElementOptions $options */
/** @var BlogPostData[] $items */
/** @var BlogNavigation $request */
?>

	<?php foreach ($items as $item):
	?><a href="<?php echo htmlspecialchars($request->detailsUri($item, $category).$urlAnchor); ?>"
		 class="wb-blog-item<?php echo isset($itemsStyle[$item->id]['class']) ? $itemsStyle[$item->id]['class'] : '' ?>"
		<?php echo isset($itemsStyle[$item->id]['data-wb-anim-entry-time']) ? ('data-wb-anim-entry-time="' . $itemsStyle[$item->id]['data-wb-anim-entry-time'] . '"') : '' ?>
		<?php echo isset($itemsStyle[$item->id]['data-wb-anim-entry-delay']) ? ('data-wb-anim-entry-delay="' . $itemsStyle[$item->id]['data-wb-anim-entry-delay'] . '"') : '' ?>
		><?php
		if ($options->useThumbnails || $isPostWithoutContent):
			if ($options->useThumbnails && $item->thumbnail):
				?><div class="blog-item-thumbnail" style="background-image: url('<?php echo str_replace("'", "\'", $item->thumbnail); ?>');"></div><?php
			elseif (($options->useThumbnails && !$item->thumbnail) || $isPostWithoutContent):
				?><div class="blog-item-thumbnail no-thumbnail"><span class="glyphicon glyphicon-picture"></span></div><?php
			endif;
		endif;
		if (!$isPostWithoutContent):
		?><div class="caption">
			<div class="caption-wrapper">
				<div>
					<?php if (isset($options->displayTitle) && $options->displayTitle): ?>
					<div class="title"><?php echo htmlspecialchars(tr_($item->title)); ?></div>
					<?php endif; ?>
					<?php if (isset($options->displayDate) && $options->displayDate && ($dateStr = $this->getPrettyDate($item))): ?>
					<span data-format="<?php echo $options->dateFormat; ?>" data-timestamp="<?php echo $this->getFullDateTime($item); ?>" class="date"><?php echo $dateStr; ?></span>
					<?php endif; ?>
					<?php if (isset($options->displayShortText) && $options->displayShortText && ($shortText = $this->getShortText($item))): ?>
					<span class="description"><?php echo $shortText; ?></span>
					<?php endif; ?>
				</div>
			</div>
		</div><?php endif;
	?></a><?php
	endforeach; ?>

<script type="text/javascript">
	(function() {
		var options = <?php echo json_encode($options); ?>;
		var elem = $('#' + options.id);
		var blogElem = elem.children('.wb-blog');
		var thumbWidth = options.thumbWidth;
		var thumbHeight = options.thumbHeight;
		
		var maxCaptionWidth = 200;
		var maxWidth = thumbWidth + maxCaptionWidth;
		var thumbnails = blogElem.find('.blog-item-thumbnail');
		var resizeCallback = function(width, height) {
			if (width <= maxWidth) {
				blogElem.addClass('mobile');
				thumbnails.css('height', (Math.min(thumbHeight, (thumbHeight / thumbWidth * width))) + 'px');
			} else {
				blogElem.removeClass('mobile');
				thumbnails.css('height', '');
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