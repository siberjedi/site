<?php
/** @var BlogElement $this */
/** @var BlogElementOptions $options */
/** @var BlogPostData[] $items */
?>

	<?php foreach ($items as $item):
	?><a href="<?php echo htmlspecialchars($request->detailsUri($item, $category).$urlAnchor); ?>"
		 class="wb-blog-item<?php echo isset($itemsStyle[$item->id]['class']) ? $itemsStyle[$item->id]['class'] : '' ?>"
		<?php echo isset($itemsStyle[$item->id]['data-wb-anim-entry-time']) ? ('data-wb-anim-entry-time="' . $itemsStyle[$item->id]['data-wb-anim-entry-time'] . '"') : '' ?>
		<?php echo isset($itemsStyle[$item->id]['data-wb-anim-entry-delay']) ? ('data-wb-anim-entry-delay="' . $itemsStyle[$item->id]['data-wb-anim-entry-delay'] . '"') : '' ?>
		>
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
				<div class="title"><?php echo htmlspecialchars(tr_($item->title)); ?></div>
				<?php endif; ?>
				<?php if (isset($options->displayDate) && $options->displayDate && ($dateStr = $this->getPrettyDate($item))): ?>
				<span data-format="<?php echo $options->dateFormat; ?>" data-timestamp="<?php echo $this->getFullDateTime($item); ?>" class="date"><?php echo $dateStr; ?></span>
				<?php endif; ?>
				<?php if (isset($options->displayShortText) && $options->displayShortText && ($shortText = $this->getShortText($item))): ?>
				<span class="description"><?php echo $shortText; ?></span>
				<?php endif; ?>
			</div><?php endif;
		?></div>
	</a><?php
	endforeach; ?>
