/*
 * main.js
 */

// enable popovers globally
jQuery(function ($) {
  jQuery('[data-toggle="popover"]').popover()
})

// reload history page if accessed via back btn
if ( document.URL.includes('history') ) {
	// supposedly doesn't work in safari (can't test)
	// window...type === 2 means the page was accessed from history
	if ( !!window.performance && window.performance.navigation.type === 2) {
		window.location.reload();
	}
}