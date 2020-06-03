if (document.URL.includes('favourites')) {
	window.jQuery(function ($) {

		let favMovies = window.localStorage.getItem('favmovies');

		function setLoading(status) {
			if (status) {
				$('#loader')
					.removeClass('inactive')
					.addClass('active');
			} else {
				$('#loader')
					.removeClass('active')
					.addClass('inactive');
			}
		}

		function handleDone(response) {
			$('#main').html(response);
		}

		function handleFail() {
			$('#fail').addClass('active');
			console.log('fail');
			$('#main').html(`<h3>Failed to load. <a href=".">Try again</a>.</h3>`);
		}

		function handleAlways() {
			setLoading(false);
		}

		setLoading(true);
		$.post(window.favObj.favUrl, {
			action: 'fav_action',
			jsonData: favMovies
		})
			.done(handleDone)
			.fail(handleFail)
			.always(handleAlways);
	});
}