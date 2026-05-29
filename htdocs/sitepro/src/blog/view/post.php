<?php
/** @var BlogElement $this */
/** @var BlogNavigation $request */
/** @var BlogElementOptions $options */
/** @var BlogPostData $item */
?>
<div style="margin-bottom: 15px;">
	<a class="btn btn-default" href="<?php echo htmlspecialchars($backUrl); ?>">‹ <?php echo $this->__('Back'); ?></a>
</div>
<?php if (isset($buildMicroData)) echo $buildMicroData(); ?>
<div style="overflow: hidden;">
	<?php echo tr_($item->text); ?>
</div>
<?php if ($item->fbComments): ?>
<div style="margin-top: 25px; text-align: center;">
	<a name="<?php echo $urlCommentsAnchor; ?>" class="wb_anchor"></a>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/<?php echo $locale; ?>/sdk.js#xfbml=1&version=v6.0&autoLogAppEvents=1"></script>
	<div class="fb-comments" data-href="<?php echo htmlspecialchars($itemUrl); ?>" data-width="100%" data-numposts="5" style="max-width: 550px;"></div>
</div>
<?php endif;
