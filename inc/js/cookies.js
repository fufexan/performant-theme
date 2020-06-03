function getCookie(cname) {
	// decode cookie and make it an array
	var cookie = decodeURIComponent(document.cookie).split(';');

	// check if a key matches cname
	for(var i = 0; i < cookie.length; i++) {
		var name = cname + '=';
		var c = cookie[i];
		while( c.charAt(0) == ' ' ) {
			c = c.substring(1);
		}
		if( c.indexOf(name) == 0 ) {
			return c.substring(name.length, c.length);
		}
	}
	return "";
}

function setCookie(cname, cvalue, exdays = 7) {
	var d = new Date();
	d.setTime( d.getTime() + (exdays*24*60*60*1000) );
	var expires = 'expires='+ d.toUTCString();
	document.cookie = cname + '=' + cvalue + '; ' + expires + '; path=/wordpress/;';
}

// technically adds a value to a cookie
function updateCookie(cname, cvalue, exdays = 7) {
	// make sure cvalue is a string so JS knows how to do `includes()`
	cvalue = cvalue.toString();
	let prevCookie = getCookie(cname).split(',');

	// change value's position if already in the cookie
	if ( prevCookie.includes(cvalue) ) {
		let i = prevCookie.indexOf(cvalue);
		prevCookie.splice(i, 1);
	}

	let newValue = '';	
	// check if cookie is empty (gotta keep it clean)
	if ( prevCookie.includes('') || prevCookie.length == 0 ) {
		newValue = cvalue;
	} else {
		newValue = prevCookie + ',' + cvalue;
	}
	setCookie(cname, newValue, exdays);
}

// 27 is the length of 'localhost/wordpress/movies/'
// TODO: find a better way of detecting a movie page
if ( document.URL.includes('movies') && document.URL.length > 27 ) {
	updateCookie('hist', id);
}