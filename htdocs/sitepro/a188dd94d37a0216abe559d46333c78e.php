<!DOCTYPE html>
<html lang="en">
<head>
	<script type="text/javascript">
			</script>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title><?php echo htmlspecialchars((isset($seoTitle) && $seoTitle !== "") ? $seoTitle : "Gallery"); ?></title>
	<base href="{{base_url}}" />
	<?php echo isset($sitemapUrls) ? (generateCanonicalUrl($sitemapUrls)."\n") : ""; ?>	
	
						<meta name="viewport" content="width=device-width, initial-scale=1" />
					<meta name="description" content="<?php echo htmlspecialchars((isset($seoDescription) && $seoDescription !== "") ? $seoDescription : "Contacts"); ?>" />
			<meta name="keywords" content="<?php echo htmlspecialchars((isset($seoKeywords) && $seoKeywords !== "") ? $seoKeywords : "Contacts"); ?>" />
			
	<!-- Facebook Open Graph -->
		<meta property="og:title" content="<?php echo htmlspecialchars((isset($seoTitle) && $seoTitle !== "") ? $seoTitle : "Gallery"); ?>" />
			<meta property="og:description" content="<?php echo htmlspecialchars((isset($seoDescription) && $seoDescription !== "") ? $seoDescription : "Contacts"); ?>" />
			<meta property="og:image" content="<?php echo htmlspecialchars((isset($seoImage) && $seoImage !== "") ? "{{base_url}}".$seoImage : ""); ?>" />
			<meta property="og:type" content="article" />
			<meta property="og:url" content="{{curr_url}}" />
		<!-- Facebook Open Graph end -->

		<meta name="generator" content="Site.pro Website builder" />
			<script src="js/common-bundle.js?ts=20260128120820" type="text/javascript"></script>
	<script src="js/a188dd94d37a0216abe559d46333c78e-bundle.js?ts=20260128120820" type="text/javascript"></script>
	<link href="css/common-bundle.css?ts=20260128120820" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Audiowide:400&amp;subset=latin" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin,latin-ext,vietnamese" rel="stylesheet" type="text/css" />
	<link href="css/a188dd94d37a0216abe559d46333c78e-bundle.css?ts=20260128120820" rel="stylesheet" type="text/css" id="wb-page-stylesheet" />
	<ga-code/>
	<script type="text/javascript">
	window.useTrailingSlashes = true;
	window.disableRightClick = false;
	window.currLang = 'en';
</script>
		
	<!--[if lt IE 9]>
	<script src="js/html5shiv.min.js"></script>
	<![endif]-->

		<script type="text/javascript">
		$(function () {
<?php $wb_form_send_success = popSessionOrGlobalVar("wb_form_send_success"); ?>
<?php if (($wb_form_send_state = popSessionOrGlobalVar("wb_form_send_state"))) { ?>
	<?php if (($wb_form_popup_mode = popSessionOrGlobalVar("wb_form_popup_mode")) && (isset($wbPopupMode) && $wbPopupMode)) { ?>
		if (window !== window.parent && window.parent.postMessage) {
			var data = {
				event: "wb_contact_form_sent",
				data: {
					state: "<?php echo str_replace('"', '\"', $wb_form_send_state); ?>",
					type: "<?php echo $wb_form_send_success ? "success" : "danger"; ?>"
				}
			};
			window.parent.postMessage(data, "<?php echo str_replace('"', '\"', popSessionOrGlobalVar("wb_target_origin")); ?>");
		}
	<?php $wb_form_send_success = false; $wb_form_send_state = null; $wb_form_popup_mode = false; ?>
	<?php } else { ?>
		wb_show_alert("<?php echo str_replace(array('"', "\r", "\n"), array('\"', "", "<br/>"), $wb_form_send_state); ?>", "<?php echo $wb_form_send_success ? "success" : "danger"; ?>");
	<?php } ?>
<?php } ?>
});    </script>
</head>


<body class="site site-lang-en<?php if (isset($wbPopupMode) && $wbPopupMode) echo ' popup-mode'; ?> " <?php ?>><?php wbspadtopFunc(\SiteModule::getInjectAdsData()); ?><div id="wb_root" class="root wb-layout-vertical"><div class="wb_sbg"></div><div id="wb_header_a188dd94d37a0216abe559d46333c78e" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-vertical"><div id="a188dd94be463a75dba900fbd0353b25" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-horizontal"><div id="a188dd94be463b87532ca69dec671e45" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-horizontal"><div id="a188dd94be463cfe7d798be625e59bfb" class="wb_element wb_element_picture" data-plugin="Picture" title=""><div class="wb_picture_wrap"><div class="wb-picture-wrapper"><a href="{{base_url}}"><img loading="lazy" alt="" src="gallery_gen/91650508d0f64b9d11e349cd8a12c56f_80x80_fit.png?ts=1769594900"></a></div></div></div><div id="a188dd94be463d8a6ce051b205764565" class="wb_element wb_text_element" data-plugin="TextArea" style=" line-height: normal;"><h5 class="wb-stl-subtitle" style="text-align: center;">SiberJedi</h5>
</div></div></div><div id="a18b6731543300ec4908218a4e94c51f" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-horizontal"><div id="a188dd94be463f094e15f4bb63aa5685" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-horizontal"><div id="a188dd94be46406d239a78d32acc37a2" class="wb_element wb_element_picture" data-plugin="Picture" title=""><div class="wb_picture_wrap" style="height: 100%"><div class="wb-picture-wrapper" style="overflow: visible; display: flex"><a href="https://www.instagram.com/siberjedi/"><svg xmlns="http://www.w3.org/2000/svg" width="25" viewBox="0 0 1793.982 1793.982" style="direction: ltr; color:#ffffff"><text x="129.501415" y="1537.02" font-size="1792" fill="currentColor" style='font-family: "FontAwesome"'></text></svg></a></div></div></div><div id="a188dd94be4641bdb8744d1c11db0d1f" class="wb_element wb_element_picture" data-plugin="Picture" title=""><div class="wb_picture_wrap" style="height: 100%"><div class="wb-picture-wrapper" style="overflow: visible; display: flex"><a href="https://www.twitch.tv/siberjedi"><svg xmlns="http://www.w3.org/2000/svg" width="25" viewBox="0 0 1793.982 1793.982" style="direction: ltr; color:#ffffff"><text x="1.501415" y="1537.02" font-size="1792" fill="currentColor" style='font-family: "FontAwesome"'></text></svg></a></div></div></div><div id="a188dd94be464213c9058d2ac34834c4" class="wb_element wb_element_picture" data-plugin="Picture" title=""><div class="wb_picture_wrap" style="height: 100%"><div class="wb-picture-wrapper" style="overflow: visible; display: flex"><a href="https://x.com/SiberJedi"><svg xmlns="http://www.w3.org/2000/svg" width="25" viewBox="0 0 1024 1024" style="direction: ltr; color:#ffffff"><text x="64" y="960" font-size="1024" fill="currentColor" style='font-family: "builder-ui-icons-plugins"'></text></svg></a></div></div></div><div id="a188dd94be46433c59ec9d4797930ff0" class="wb_element wb_element_picture" data-plugin="Picture" title=""><div class="wb_picture_wrap" style="height: 100%"><div class="wb-picture-wrapper" style="overflow: visible; display: flex"><a href="https://www.youtube.com/@siberjedi"><svg xmlns="http://www.w3.org/2000/svg" width="25" viewBox="0 0 1793.982 1793.982" style="direction: ltr; color:#ffffff"><text x="1.501415" y="1537.02" font-size="1792" fill="currentColor" style='font-family: "FontAwesome"'></text></svg></a></div></div></div></div></div></div></div></div></div></div></div><div id="wb_main_a188dd94d37a0216abe559d46333c78e" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-vertical"><div id="a188dd94be460f66a3a4d6c7f78650c7" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-vertical"><div id="a188dd94be4610bcc5239b9a8c89abfa" class="wb_element wb_text_element" data-plugin="TextArea" style=" line-height: normal;"><h1 class="wb-stl-heading1"><span style="color:#333333;">Contact us</span></h1>
</div><div id="a188dd94be46116e4d2dc425bdd32e86" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-horizontal"><div id="a188dd94be461242bb04bb7e8a226284" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-vertical"><div id="a188dd94be4613c1f011279caa126226" class="wb_element wb_text_element" data-plugin="TextArea" style=" line-height: normal;"><h3 class="wb-stl-heading3">Address:</h3>
</div><div id="a188dd94be46145c9d8704470cfb158c" class="wb_element wb_text_element" data-plugin="TextArea" style=" line-height: normal;"><p><span class="wb-stl-special">350 5th Ave</span></p>

<p class="wb-stl-normal"><span class="wb-stl-special">Empire State Building</span></p>

<p class="wb-stl-normal"><span class="wb-stl-special">USA</span></p>
</div><div id="a188dd94be461596cf89661925eeac05" class="wb_element wb-map wb-prevent-layout-click" data-plugin="GoogleMaps"><div class="wb_google_maps_overlay"><div>Get <a target="_blank" href="https://developers.google.com/maps/documentation/javascript/get-api-key">API key from Google</a> and insert it to plugin properties to enable maps on your website.</div></div><script type="text/javascript">
				(function() {
					var resizeFunc = function() {
						var elem = $("#a188dd94be461596cf89661925eeac05");
						var w = elem.width(), h = elem.height();
						elem.find("div > div:first").css("zoom", Math.max(0.5, Math.min(1, ((w * h) / 120000))));
					};
					$(window).on("resize", resizeFunc);
					resizeFunc();
				})();
			</script></div></div></div><div id="a188dd94be461651f566eb7912592987" class="wb_element" data-plugin="Form"><form id="a188dd94be461651f566eb7912592987_form" class="wb_form wb_mob_form wb_form_ltr wb_form_vertical" method="post" enctype="multipart/form-data" action="__wb_curr_url__"><input type="hidden" name="wb_form_id" value="e859ceaf"><input type="hidden" name="wb_form_uuid" value="79715203"><input type="hidden" name="secure_token" value="<?php echo session_id() ? ('a188dd94be461651f566eb7912592987:' . ($_SESSION['wb_form_secure_token_a188dd94be461651f566eb7912592987'] = md5(microtime()."a188dd94d37a0216abe559d46333c78e"))) : ''?>"><textarea name="message" rows="3" cols="20" class="hpc" autocomplete="off"></textarea><table><tr><th>Name<span class="text-danger">&nbsp;*</span></th><td><input type="hidden" name="wb_input_0" value="Name"><div><input class="form-control form-field" type="text" value="" placeholder="" maxlength="255" name="wb_input_0" required="required"></div></td></tr><tr><th>Email<span class="text-danger">&nbsp;*</span></th><td><input type="hidden" name="wb_input_1" value="Email"><div><input class="form-control form-field" type="text" value="" placeholder="" maxlength="255" name="wb_input_1" required="required"></div></td></tr><tr><th>Address<span class="text-danger">&nbsp;*</span></th><td><input type="hidden" name="wb_input_2" value="Address"><div><input class="form-control form-field" type="text" value="" placeholder="" maxlength="255" name="wb_input_2" required="required"></div></td></tr><tr><th>How did you find us?<span class="text-danger">&nbsp;*</span></th><td><input type="hidden" name="wb_input_3" value="How did you find us?"><div><select class="form-control form-field" name="wb_input_3" required="required"><option disabled selected></option><option value="Found on google">Found on google</option><option value="Followed link from other site">Followed link from other site</option><option value="Friend told me">Friend told me</option></select></div></td></tr><tr class="area-row"><th>Message<span class="text-danger">&nbsp;*</span></th><td><input type="hidden" name="wb_input_4" value="Message"><div><textarea class="form-control form-field form-area-field" rows="4" placeholder="" name="wb_input_4" required="required"></textarea></div></td></tr><tr><th></th><td><div><label class="checkbox-label"><input class="form-control form-field" type="checkbox" value="1" name="wb_input_5"> I want to receive newsletters</label></div></td></tr><tr><th></th><td><div><label class="checkbox-label"><input class="form-control form-field" type="checkbox" value="1" name="wb_input_6" required="required"> I agree to the Terms and Conditions<span class="text-danger">&nbsp;*</span></label></div></td></tr><tr class="form-footer"><td colspan="2" class="text-right"><button type="submit" class="btn btn-default"><span>Submit</span></button></td></tr></table><?php if (isset($wbPopupMode) && $wbPopupMode): ?><input type="hidden" name="wb_popup_mode" value="1" /><?php endif; ?></form><script type="text/javascript">
			<?php $wb_form_id = sessionOrGlobalVar("wb_form_id"); if ($wb_form_id == "e859ceaf") { ?>
				<?php popSessionOrGlobalVar("wb_form_id"); ?>
				var formValues = <?php echo json_encode(popSessionOrGlobalVar("post")); ?>;
				var formErrors = <?php echo json_encode(popSessionOrGlobalVar("formErrors")); ?>;
				wb_form_validateForm("e859ceaf", formValues, formErrors);
			<?php } ?>
			</script><script>$(function () {
	$('#a188dd94be461651f566eb7912592987 form').on('submit', function (e) {
		if (document.cookieIsAllowed && !document.cookieIsAllowed("_GRECAPTCHA")) {
			e.stopPropagation();
			$(this).find('button[type=submit]').append($('<input>').attr('type', 'hidden').attr('name', 'cookieDontAllow').val('1'));
			return true;
		}		;return true;
	});
});
</script></div></div></div></div></div></div></div><div id="wb_footer_a188dd94d37a0216abe559d46333c78e" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-vertical"><div id="a188dd94be464dd3128ad232275a309d" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-vertical"><div id="a188dd94be46587af80a98de3b2ac70e" class="wb_element wb-prevent-layout-click" data-plugin="LinkExchangeBadge"><div class="wb-stl-footer">Powered by <i class="icon-wb-logo"></i><a href="https://site.pro/" target="_blank" title="Site.pro Website builder">Site.pro</a></div></div></div></div><div id="wb_footer_c" class="wb_element" data-plugin="WB_Footer" style="text-align: center; width: 100%;"><div class="wb_footer"></div><script type="text/javascript">
			$(function() {
				var footer = $(".wb_footer");
				var html = (footer.html() + "").replace(/^\s+|\s+$/g, "");
				if (!html) {
					footer.parent().remove();
					footer = $("#footer, #footer .wb_cont_inner");
					footer.css({height: ""});
				}
			});
			</script></div></div></div></div>{{hr_out}}</body>
</html>
