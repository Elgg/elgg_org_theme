//<script>

elgg.provide('elgg.elgg_org');


elgg.elgg_org.init = function() {
	//banner slider
	$('#slider').codaSlider({
		autoHeight: false,
		autoSlide: false,
		autoSlideStopWhenClicked: true,
		dynamicArrows: false,
		dynamicTabs: false
	});
}

elgg.register_hook_handler('init', 'system', elgg.elgg_org.init)