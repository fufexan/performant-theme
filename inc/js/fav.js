/* 
 * favourite movies
 */

// add to favourites behaviour
function fav(movieID) {
	let elem = document.getElementById('heart' + movieID);

	elem.classList.add('fas');
	elem.classList.remove('far');

	elem.removeAttribute('data-content');
	elem.setAttribute('data-content', 'Added to favourites!');
}

// remove from favourites behaviour
function unfav(movieID) {
	let elem = document.getElementById('heart' + movieID);

	elem.classList.add('far');
	elem.classList.remove('fas');

	elem.removeAttribute('data-content');
	elem.setAttribute('data-content', 'Add to favourites');
}

// check if movie is favourite
function favstate(movieID) {
	let storage = [];
	storage = storage.concat( JSON.parse( window.localStorage.getItem('favmovies') ) );

	if ( storage.includes(movieID) )
		fav(movieID);
}

// add or remove movie from favourites
function favorite(movieID) {
	let storage = [];
	storage = storage.concat( JSON.parse( window.localStorage.getItem('favmovies') ) );

	if ( storage.includes(movieID) ) {
		storage.splice( storage.indexOf(movieID), 1 );
		unfav(movieID);
		jQuery('#heart' + movieID).popover('hide').popover('show');
	} else {
		storage.push(movieID);
		fav(movieID);
		jQuery('#heart' + movieID).popover('hide').popover('show');
	}
	
	storage = JSON.stringify(storage);
	window.localStorage.clear();
	window.localStorage.setItem('favmovies', storage);
}