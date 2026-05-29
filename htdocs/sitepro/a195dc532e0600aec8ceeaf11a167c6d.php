<!DOCTYPE html>
<html lang="en">
<head>
	<script type="text/javascript">
			</script>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title><?php echo htmlspecialchars((isset($seoTitle) && $seoTitle !== "") ? $seoTitle : "Privacy Policy"); ?></title>
	<base href="{{base_url}}" />
	<?php echo isset($sitemapUrls) ? (generateCanonicalUrl($sitemapUrls)."\n") : ""; ?>	
	
						<meta name="viewport" content="width=device-width, initial-scale=1" />
					<meta name="description" content="<?php echo htmlspecialchars((isset($seoDescription) && $seoDescription !== "") ? $seoDescription : "Privacy Policy"); ?>" />
			<meta name="keywords" content="<?php echo htmlspecialchars((isset($seoKeywords) && $seoKeywords !== "") ? $seoKeywords : "Privacy Policy"); ?>" />
			
	<!-- Facebook Open Graph -->
		<meta property="og:title" content="<?php echo htmlspecialchars((isset($seoTitle) && $seoTitle !== "") ? $seoTitle : "Privacy Policy"); ?>" />
			<meta property="og:description" content="<?php echo htmlspecialchars((isset($seoDescription) && $seoDescription !== "") ? $seoDescription : "Privacy Policy"); ?>" />
			<meta property="og:image" content="<?php echo htmlspecialchars((isset($seoImage) && $seoImage !== "") ? "{{base_url}}".$seoImage : ""); ?>" />
			<meta property="og:type" content="article" />
			<meta property="og:url" content="{{curr_url}}" />
		<!-- Facebook Open Graph end -->

		<meta name="generator" content="Site.pro Website builder" />
			<script src="js/common-bundle.js?ts=20260128120820" type="text/javascript"></script>
	<script src="js/a195dc532e0600aec8ceeaf11a167c6d-bundle.js?ts=20260128120820" type="text/javascript"></script>
	<link href="css/common-bundle.css?ts=20260128120820" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Audiowide:400&amp;subset=latin" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin,latin-ext,vietnamese" rel="stylesheet" type="text/css" />
	<link href="css/a195dc532e0600aec8ceeaf11a167c6d-bundle.css?ts=20260128120820" rel="stylesheet" type="text/css" id="wb-page-stylesheet" />
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


<body class="site site-lang-en<?php if (isset($wbPopupMode) && $wbPopupMode) echo ' popup-mode'; ?> " <?php ?>><?php wbspadtopFunc(\SiteModule::getInjectAdsData()); ?><div id="wb_root" class="root wb-layout-vertical"><div class="wb_sbg"></div><div id="wb_header_a195dc532e0600aec8ceeaf11a167c6d" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-vertical"><div id="a188dd94be463a75dba900fbd0353b25" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-horizontal"><div id="a188dd94be463b87532ca69dec671e45" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-horizontal"><div id="a188dd94be463cfe7d798be625e59bfb" class="wb_element wb_element_picture" data-plugin="Picture" title=""><div class="wb_picture_wrap"><div class="wb-picture-wrapper"><a href="{{base_url}}"><img loading="lazy" alt="" src="gallery_gen/91650508d0f64b9d11e349cd8a12c56f_80x80_fit.png?ts=1769594900"></a></div></div></div><div id="a188dd94be463d8a6ce051b205764565" class="wb_element wb_text_element" data-plugin="TextArea" style=" line-height: normal;"><h5 class="wb-stl-subtitle" style="text-align: center;">SiberJedi</h5>
</div></div></div><div id="a18b6731543300ec4908218a4e94c51f" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-horizontal"><div id="a188dd94be463f094e15f4bb63aa5685" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-horizontal"><div id="a188dd94be46406d239a78d32acc37a2" class="wb_element wb_element_picture" data-plugin="Picture" title=""><div class="wb_picture_wrap" style="height: 100%"><div class="wb-picture-wrapper" style="overflow: visible; display: flex"><a href="https://www.instagram.com/siberjedi/"><svg xmlns="http://www.w3.org/2000/svg" width="25" viewBox="0 0 1793.982 1793.982" style="direction: ltr; color:#ffffff"><text x="129.501415" y="1537.02" font-size="1792" fill="currentColor" style='font-family: "FontAwesome"'></text></svg></a></div></div></div><div id="a188dd94be4641bdb8744d1c11db0d1f" class="wb_element wb_element_picture" data-plugin="Picture" title=""><div class="wb_picture_wrap" style="height: 100%"><div class="wb-picture-wrapper" style="overflow: visible; display: flex"><a href="https://www.twitch.tv/siberjedi"><svg xmlns="http://www.w3.org/2000/svg" width="25" viewBox="0 0 1793.982 1793.982" style="direction: ltr; color:#ffffff"><text x="1.501415" y="1537.02" font-size="1792" fill="currentColor" style='font-family: "FontAwesome"'></text></svg></a></div></div></div><div id="a188dd94be464213c9058d2ac34834c4" class="wb_element wb_element_picture" data-plugin="Picture" title=""><div class="wb_picture_wrap" style="height: 100%"><div class="wb-picture-wrapper" style="overflow: visible; display: flex"><a href="https://x.com/SiberJedi"><svg xmlns="http://www.w3.org/2000/svg" width="25" viewBox="0 0 1024 1024" style="direction: ltr; color:#ffffff"><text x="64" y="960" font-size="1024" fill="currentColor" style='font-family: "builder-ui-icons-plugins"'></text></svg></a></div></div></div><div id="a188dd94be46433c59ec9d4797930ff0" class="wb_element wb_element_picture" data-plugin="Picture" title=""><div class="wb_picture_wrap" style="height: 100%"><div class="wb-picture-wrapper" style="overflow: visible; display: flex"><a href="https://www.youtube.com/@siberjedi"><svg xmlns="http://www.w3.org/2000/svg" width="25" viewBox="0 0 1793.982 1793.982" style="direction: ltr; color:#ffffff"><text x="1.501415" y="1537.02" font-size="1792" fill="currentColor" style='font-family: "FontAwesome"'></text></svg></a></div></div></div></div></div></div></div></div></div></div></div><div id="wb_main_a195dc532e0600aec8ceeaf11a167c6d" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-vertical"><div id="a195dc5554b900dbddc1b5c53e8f655d" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-horizontal"><div id="a195dc5554410020d5aee17a905927fc" class="wb_element wb_text_element" data-plugin="TextArea" style=" line-height: normal;"><p class="wb-stl-normal">Privacy Policy</p>

<p> </p>

<p>This application is provided by Alpi Games at no cost and is intended for use as is.</p>

<p>This page is used to inform users regarding our policies with the collection, use, and disclosure of information when using our application.</p>

<p>Information Collection and Use</p>

<p>The application may collect and share device identifiers, specifically the Advertising ID, for advertising purposes. This data is used solely to display ads and measure ad performance.</p>

<p>The Advertising ID is collected and processed by third-party advertising services in accordance with their own privacy policies. The developer does not store or manage this data on their own servers.</p>

<p> </p>

<p class="wb-stl-normal">Advertising</p>

<p class="wb-stl-normal"> </p>

<p>This application displays advertisements. Advertising ID may be used to support advertising and marketing purposes. Users are presented with a consent option regarding the use of advertising-related data, and they may choose whether to allow or restrict such data usage. If consent is not given, non-personalized ads may be shown.</p>

<p> </p>

<p class="wb-stl-normal">Third-Party Services</p>

<p> </p>

<p>The app uses third-party services that may collect information used for advertising purposes:</p>

<p>• Google Play Services  <br>
• AdMob  <br>
• Unity Technologies  </p>

<p>These services have their own privacy policies governing how data is handled.</p>

<p> </p>

<p class="wb-stl-normal">Data Sharing</p>

<p> </p>

<p>The Advertising ID may be shared with third-party advertising partners for the purpose of displaying ads and measuring their effectiveness. No other personal or sensitive user data is collected or shared.</p>

<p> </p>

<p class="wb-stl-normal">Data Security</p>

<p> </p>

<p>All data transmissions are encrypted using secure protocols such as HTTPS. Reasonable measures are taken to protect data during transfer.</p>

<p> </p>

<p class="wb-stl-normal">Data Retention and Deletion</p>

<p> </p>

<p>The developer does not store personal user data. Advertising-related data is handled by third-party services according to their own data retention and deletion policies.</p>

<p> </p>

<p class="wb-stl-normal">Children’s Privacy</p>

<p> </p>

<p>This application does not knowingly collect personal information from children. Advertising services are configured to comply with applicable child protection and advertising policies.</p>

<p> </p>

<p class="wb-stl-normal">User Rights</p>

<p> </p>

<p>Users can manage their advertising preferences and consent through the options provided within the application or through their device settings.</p>

<p> </p>

<p class="wb-stl-normal">Contact Us</p>

<p> </p>

<p>If you have any questions or suggestions about this Privacy Policy, you may contact us at: Email: <strong>siberjedi@hotmail.com</strong></p>

<p> </p>

<p>This Privacy Policy is effective as of 19.11.2024 and may be updated if required to reflect changes in the application or legal requirements.<br>
 </p>
</div></div></div></div></div><div id="wb_footer_a195dc532e0600aec8ceeaf11a167c6d" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-vertical"><div id="a188dd94be464dd3128ad232275a309d" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-vertical"><div id="a188dd94be46587af80a98de3b2ac70e" class="wb_element wb-prevent-layout-click" data-plugin="LinkExchangeBadge"><div class="wb-stl-footer">Powered by <i class="icon-wb-logo"></i><a href="https://site.pro/" target="_blank" title="Site.pro Website builder">Site.pro</a></div></div></div></div><div id="wb_footer_c" class="wb_element" data-plugin="WB_Footer" style="text-align: center; width: 100%;"><div class="wb_footer"></div><script type="text/javascript">
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
