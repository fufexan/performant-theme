if ( !!id ) {
	window.jQuery( function ($) {
		function sleep(duration) {
			return new Promise(resolve => {
				setTimeout(() => {
					resolve()
				}, duration * 1000)
			})
		}

		let messageContent = {
			'message': $('#message').val(),
			'sender':  $('#name').val(),
			'email':   $('#email').val()
		};

		function setLoading(status) {
			if (status) {
				$('#loader').removeClass('inactive');
				$('#name').attr('disabled');
				$('#email').attr('disabled');
				$('#message').attr('disabled');
				sleep(2);
			} else {
				$('#loader').addClass('inactive');
				$('form').addClass('inactive');
			}
		}

		function handleDone() {
			$('#success').removeClass('inactive');
		}

		function handleFail() {
			$('#fail').removeClass('inactive');
		}

		function handleAlways() {
			setLoading(false);
		}

		function sendMessage() {
			setLoading(true);
			$.post(window.favObj.favUrl, {
				action: 'receive_message',
				jsonData: messageContent
			})
				.done(handleDone)
				.fail(handleFail)
				.always(handleAlways);
		}
	});
}