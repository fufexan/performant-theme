$(function () {
  $('[data-toggle="popover"]').popover()
})

function favstate(movieID) {
	let storage = [];
	storage = storage.concat(JSON.parse(window.localStorage.getItem('favmovies')));

	if(storage.includes(movieID)) {
		document.getElementById('heart' + movieID).classList.add('fas');
		document.getElementById('heart' + movieID).classList.remove('far');
	}
}

function favorite(movieID) {
	let storage = [];
	storage = storage.concat(JSON.parse(window.localStorage.getItem('favmovies')));

	if(storage.includes(movieID)) {
		storage.splice(storage.indexOf(movieID), 1);
		document.getElementById('heart' + movieID).classList.remove('fas');
		document.getElementById('heart' + movieID).classList.add('far');
		console.log(movieID + ' removed');
	} else {
		storage.push(movieID);
		document.getElementById('heart' + movieID).classList.remove('far');
		document.getElementById('heart' + movieID).classList.add('fas');
		console.log(movieID + ' added');
	}
	
	storage = JSON.stringify(storage);
	window.localStorage.clear();
	window.localStorage.setItem('favmovies', storage);
}

//document.addEventListener('DOMContentLoaded', favstate)
