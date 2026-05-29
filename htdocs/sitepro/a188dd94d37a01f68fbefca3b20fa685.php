<!DOCTYPE html>
<html lang="en">
<head>
	<script type="text/javascript">
			</script>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title><?php echo htmlspecialchars((isset($seoTitle) && $seoTitle !== "") ? $seoTitle : "Services"); ?></title>
	<base href="{{base_url}}" />
	<?php echo isset($sitemapUrls) ? (generateCanonicalUrl($sitemapUrls)."\n") : ""; ?>	
	
						<meta name="viewport" content="width=device-width, initial-scale=1" />
					<meta name="description" content="<?php echo htmlspecialchars((isset($seoDescription) && $seoDescription !== "") ? $seoDescription : "About"); ?>" />
			<meta name="keywords" content="<?php echo htmlspecialchars((isset($seoKeywords) && $seoKeywords !== "") ? $seoKeywords : "About"); ?>" />
			
	<!-- Facebook Open Graph -->
		<meta property="og:title" content="<?php echo htmlspecialchars((isset($seoTitle) && $seoTitle !== "") ? $seoTitle : "Services"); ?>" />
			<meta property="og:description" content="<?php echo htmlspecialchars((isset($seoDescription) && $seoDescription !== "") ? $seoDescription : "About"); ?>" />
			<meta property="og:image" content="<?php echo htmlspecialchars((isset($seoImage) && $seoImage !== "") ? "{{base_url}}".$seoImage : ""); ?>" />
			<meta property="og:type" content="article" />
			<meta property="og:url" content="{{curr_url}}" />
		<!-- Facebook Open Graph end -->

		<meta name="generator" content="Site.pro Website builder" />
			<script src="js/common-bundle.js?ts=20260128120820" type="text/javascript"></script>
	<script src="js/a188dd94d37a01f68fbefca3b20fa685-bundle.js?ts=20260128120820" type="text/javascript"></script>
	<link href="css/common-bundle.css?ts=20260128120820" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Audiowide:400&amp;subset=latin" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin,latin-ext,vietnamese" rel="stylesheet" type="text/css" />
	<link href="css/a188dd94d37a01f68fbefca3b20fa685-bundle.css?ts=20260128120820" rel="stylesheet" type="text/css" id="wb-page-stylesheet" />
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


<body class="site site-lang-en<?php if (isset($wbPopupMode) && $wbPopupMode) echo ' popup-mode'; ?> " <?php ?>><?php wbspadtopFunc(\SiteModule::getInjectAdsData()); ?><div id="wb_root" class="root wb-layout-vertical"><div class="wb_sbg"></div><div id="wb_header_a188dd94d37a01f68fbefca3b20fa685" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-vertical"><div id="a188dd94be463a75dba900fbd0353b25" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-horizontal"><div id="a188dd94be463b87532ca69dec671e45" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-horizontal"><div id="a188dd94be463cfe7d798be625e59bfb" class="wb_element wb_element_picture" data-plugin="Picture" title=""><div class="wb_picture_wrap"><div class="wb-picture-wrapper"><a href="{{base_url}}"><img loading="lazy" alt="" src="gallery_gen/91650508d0f64b9d11e349cd8a12c56f_80x80_fit.png?ts=1769594900"></a></div></div></div><div id="a188dd94be463d8a6ce051b205764565" class="wb_element wb_text_element" data-plugin="TextArea" style=" line-height: normal;"><h5 class="wb-stl-subtitle" style="text-align: center;">SiberJedi</h5>
</div></div></div><div id="a18b6731543300ec4908218a4e94c51f" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-horizontal"><div id="a188dd94be463f094e15f4bb63aa5685" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-horizontal"><div id="a188dd94be46406d239a78d32acc37a2" class="wb_element wb_element_picture" data-plugin="Picture" title=""><div class="wb_picture_wrap" style="height: 100%"><div class="wb-picture-wrapper" style="overflow: visible; display: flex"><a href="https://www.instagram.com/siberjedi/"><svg xmlns="http://www.w3.org/2000/svg" width="25" viewBox="0 0 1793.982 1793.982" style="direction: ltr; color:#ffffff"><text x="129.501415" y="1537.02" font-size="1792" fill="currentColor" style='font-family: "FontAwesome"'></text></svg></a></div></div></div><div id="a188dd94be4641bdb8744d1c11db0d1f" class="wb_element wb_element_picture" data-plugin="Picture" title=""><div class="wb_picture_wrap" style="height: 100%"><div class="wb-picture-wrapper" style="overflow: visible; display: flex"><a href="https://www.twitch.tv/siberjedi"><svg xmlns="http://www.w3.org/2000/svg" width="25" viewBox="0 0 1793.982 1793.982" style="direction: ltr; color:#ffffff"><text x="1.501415" y="1537.02" font-size="1792" fill="currentColor" style='font-family: "FontAwesome"'></text></svg></a></div></div></div><div id="a188dd94be464213c9058d2ac34834c4" class="wb_element wb_element_picture" data-plugin="Picture" title=""><div class="wb_picture_wrap" style="height: 100%"><div class="wb-picture-wrapper" style="overflow: visible; display: flex"><a href="https://x.com/SiberJedi"><svg xmlns="http://www.w3.org/2000/svg" width="25" viewBox="0 0 1024 1024" style="direction: ltr; color:#ffffff"><text x="64" y="960" font-size="1024" fill="currentColor" style='font-family: "builder-ui-icons-plugins"'></text></svg></a></div></div></div><div id="a188dd94be46433c59ec9d4797930ff0" class="wb_element wb_element_picture" data-plugin="Picture" title=""><div class="wb_picture_wrap" style="height: 100%"><div class="wb-picture-wrapper" style="overflow: visible; display: flex"><a href="https://www.youtube.com/@siberjedi"><svg xmlns="http://www.w3.org/2000/svg" width="25" viewBox="0 0 1793.982 1793.982" style="direction: ltr; color:#ffffff"><text x="1.501415" y="1537.02" font-size="1792" fill="currentColor" style='font-family: "FontAwesome"'></text></svg></a></div></div></div></div></div></div></div></div></div></div></div><div id="wb_main_a188dd94d37a01f68fbefca3b20fa685" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-vertical"><div id="a188dd94be4602a8e754f4fda8e8d231" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-vertical"><div id="a188dd94be4603a0bda550e989289629" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-horizontal"><div id="a188dd94be46048e03b7f64b90a99883" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-vertical"></div></div><div id="a188dd94be46056b6cc74b3c9c3b89cf" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-vertical"><div id="a188dd94be4606a756a6769f652c7609" class="wb_element wb_text_element" data-plugin="TextArea" style=" line-height: normal;"><h5 class="wb-stl-subtitle" style="text-align: center;"><span style="color:rgba(56,56,56,1);">About us</span></h5>
</div><div id="a188dd94be460779a701dd0de2111ed3" class="wb_element wb_text_element" data-plugin="TextArea" style=" line-height: normal;"><p><span class="wb-stl-special">You will find the latest...</span></p>
</div><div id="a188dd94be4608239442235bc361d20d" class="wb_element wb-elm-orient-horizontal" data-plugin="Line"><div class="wb-elm-line"></div></div><div id="a188dd94be4609a2c422dc265859973d" class="wb_element wb_text_element" data-plugin="TextArea" style=" line-height: normal;"><p class="wb-stl-normal">You will find the latest information about our company here. You will find the latest information about our company here. You will find the latest information about our company here. You will find the...</p>
</div></div></div></div></div></div></div><div id="a188dd94be460a0af30a48b9e0090347" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-vertical"><div id="a188dd94be460b39d4940a488bc41541" class="wb_element wb-prevent-layout-click wb_gallery" data-plugin="Gallery"><script type="text/javascript">
			$(function() {
				(function(GalleryLib) {
					var el = document.getElementById("a188dd94be460b39d4940a488bc41541");
					var lib = new GalleryLib({"id":"a188dd94be460b39d4940a488bc41541","height":"auto","type":"thumbs","trackResize":true,"interval":10,"speed":400,"images":[{"thumb":"gallery_gen\/cb564dd96c363764c892123c4d7c7e8a_fill.jpg","src":"gallery_gen\/12aa96760754d741b6030d5a801b123f_fit.jpg?ts=1769594900","width":700,"height":394,"title":"","link":null,"description":"","address":{"latLng":{"lat":40.97989806962,"lng":25.3125},"text":"40.979898069620134, 25.3125"}},{"thumb":"gallery_gen\/82b126b4760ff1b272bfb6526f593e04_675x450_fill.jpg","src":"gallery_gen\/a137d226151f910e2f6da4833953231a_fit.jpg?ts=1769594900","width":1200,"height":800,"title":"","link":null,"description":"","address":{"latLng":{"lat":25.799891182088,"lng":98.4375},"text":"25.799891182088334, 98.4375"}},{"thumb":"gallery_gen\/65a9ff88709e00cfd0bf3368c8c38693_716.77282377919x422_fill.jpg","src":"gallery_gen\/f38e5b5a4833e76ec18d0ef31119d294_fit.jpg?ts=1769594900","width":800,"height":471,"title":"","link":null,"description":"","address":{"latLng":{"lat":35.460669951495,"lng":-102.65625},"text":"35.460669951495305, -102.65625"}},{"thumb":"gallery_gen\/d852a89a14ae12d048a7d7d932c4c75c_672.42026266417x448_fill.jpg","src":"gallery_gen\/83cdc0b2d8d3e7afe840e3f4eadf92cd_fit.jpg?ts=1769594900","width":800,"height":533,"title":"","link":null,"description":"","address":{"latLng":{"lat":9.7956775828297,"lng":-67.5},"text":"9.795677582829745, -67.5"}},{"thumb":"gallery_gen\/05c01b8bd4518890dba125f77f1bd64f_634.83368421053x476_fill.jpg","src":"gallery_gen\/b7894d5686ec005808bc25ce9b824130_fit.jpg?ts=1769594900","width":1267,"height":950,"title":"","link":null,"description":"","address":{"latLng":{"lat":4.2149431413907,"lng":-46.40625},"text":"4.214943141390651, -46.40625"}},{"thumb":"gallery_gen\/e95e32c2151a46ae74d56ffba77eeb36_fill.jpg","src":"gallery_gen\/ad516c56d6852369b030b4a8f9ea2002_fit.jpg?ts=1769594900","width":700,"height":394,"title":"","link":null,"description":"","address":{"latLng":{"lat":-9.7956775828297,"lng":-39.375},"text":"-9.795677582829732, -39.375"}},{"thumb":"gallery_gen\/03fa9270443345855e7cac4b95794d40_674.5182012848x450_fill.jpg","src":"gallery_gen\/603183e37e2eda0411cdf7ccce980817_fit.jpg?ts=1769594900","width":700,"height":467,"title":"","link":null,"description":"","address":{"latLng":{"lat":-15.284185114076,"lng":12.65625},"text":"-15.284185114076422, 12.65625"}},{"thumb":"gallery_gen\/50520810c873d63c40462dbabf8ced04_634.66666666667x476_fill.jpg","src":"gallery_gen\/ba458e5273121bd58e3a16325544ca15_fit.jpg?ts=1769594900","width":1000,"height":750,"title":"","link":null,"description":"","address":{"latLng":{"lat":-8.4071681636011,"lng":11.25},"text":"-8.407168163601074, 11.25"}}],"border":{"border":"5px none #00008c"},"padding":0,"thumbWidth":275,"thumbHeight":275,"thumbAlign":"center","thumbPadding":20,"thumbAnim":"","thumbShadow":"","imageCover":false,"disablePopup":false,"controlsArrow":"chevron","controlsArrowSize":14,"controlsArrowStyle":{"normal":{"color":"#FFFFFF","shadow":{"angle":135,"distance":0,"size":0,"blur":1,"color":"#000000","forText":true,"css":{"text-shadow":"0px 0px 1px #000000"}}},"hover":{"color":"#DDDDDD","shadow":{"angle":135,"distance":0,"size":0,"blur":1,"color":"#222222","forText":true,"css":{"text-shadow":"0px 0px 1px #222222"}}},"active":{"color":"#FFFFFF","shadow":{"angle":135,"distance":0,"size":0,"blur":1,"color":"#000000","forText":true,"css":{"text-shadow":"0px 0px 1px #000000"}}}},"slideOpacity":100,"showPictureCaption":"always","captionIncludeDescription":false,"captionPosition":"center bottom","mapTypeId":"roadmap","markerIconTypeId":"","zoom":16,"mapCenter":"","key":"AIzaSyChpsOrBxEG_GeV-KIABgsxtIZ-IXneudg","theme":"default","color":"#eeeeee","showSatellite":true,"showZoom":true,"showStreetView":true,"showFullscreen":true,"allowDragging":true,"showRoads":true,"showLandmarks":true,"showLabels":true,"locale":"en_US","pauseOnHover":false});
					lib.appendTo(el);
				})(window.wbmodGalleryLib);
			});
		</script></div></div></div></div></div><div id="wb_footer_a188dd94d37a01f68fbefca3b20fa685" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-vertical"><div id="a188dd94be464dd3128ad232275a309d" class="wb_element wb-layout-element" data-plugin="LayoutElement"><div class="wb_content wb-layout-vertical"><div id="a188dd94be46587af80a98de3b2ac70e" class="wb_element wb-prevent-layout-click" data-plugin="LinkExchangeBadge"><div class="wb-stl-footer">Powered by <i class="icon-wb-logo"></i><a href="https://site.pro/" target="_blank" title="Site.pro Website builder">Site.pro</a></div></div></div></div><div id="wb_footer_c" class="wb_element" data-plugin="WB_Footer" style="text-align: center; width: 100%;"><div class="wb_footer"></div><script type="text/javascript">
			$(function() {
				var footer = $(".wb_footer");
				var html = (footer.html() + "").replace(/^\s+|\s+$/g, "");
				if (!html) {
					footer.parent().remove();
					footer = $("#footer, #footer .wb_cont_inner");
					footer.css({height: ""});
				}
			});
			</script></div></div></div>
<div class="wb_pswp" tabindex="-1" role="dialog" aria-hidden="true">
</div>
</div>{{hr_out}}</body>
</html>
