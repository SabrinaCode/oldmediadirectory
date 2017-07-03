(function($) {

	jQuery(document).ready(function($) {
		Economist.init.__d();
	});

	jQuery(window).load(function($) {
		Economist.init.__w();
	});

	jQuery(window).resize(function($) {
		Economist.init.__r();
	});

})( jQuery );