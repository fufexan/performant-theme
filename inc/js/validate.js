let submit = document.getElementById('submit');
submit.addEventListener('click', validate);

function validate() {
	let name    = true;
	let email   = true;
	let message = true;

	if (form[0].value == null) {
		name = false;
	}
	if (form[1].value != /\w+@\w+\.\w+/) {
		email = false;
	}
	if (form[3].value == null) {
		message = false;
	}
	if (name && email && message) {
		sendMessage();
		console.log('ok good');
	} else console.log('not good');
}