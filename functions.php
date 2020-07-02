<?php

// Support for featured image
add_theme_support( 'post-thumbnails' );

// Enqueues
function my_enqueues() {
	wp_enqueue_style( 'fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css', 1.0, '' );
	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/inc/bootstrap/css/bootstrap.css', 1.0, '' );
	wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/style.css', 1.0, '' );
	wp_enqueue_script( 'bootstrapjs', get_stylesheet_directory_uri() . '/inc/bootstrap/js/bootstrap.bundle.min.js', array( 'jquery' ), '', false );
	wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.5.1.min.js', array( 'jquery' ), '', false );
	wp_enqueue_script( 'popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array( 'jquery' ), '', false );
	wp_enqueue_script( 'mainjs', get_stylesheet_directory_uri() . '/inc/js/main.js', array( 'jquery' ), '', false );
	wp_enqueue_script( 'cookiejs', get_stylesheet_directory_uri() . '/inc/js/cookies.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'favjs', get_stylesheet_directory_uri() . '/inc/js/fav.js', array( 'jquery' ), '', false );
	wp_enqueue_script( 'validatejs', get_stylesheet_directory_uri() . '/inc/js/validate.js', array( 'jquery' ), '', true );
}
add_action( 'wp_enqueue_scripts', 'my_enqueues' );


// Register navbars
function wpb_custom_menu() {
	register_nav_menu( 'navbar', __( 'Navigation Bar' ) );
}
add_action( 'init', 'wpb_custom_menu' );

// Register Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

// Logo setup
function themename_custom_logo_setup() {
 $defaults = array(
 'height'      => 30,
 'width'       => 30,
 'flex-height' => false,
 'flex-width'  => false,
 'header-text' => array( 'site-title', 'site-description' )
 );
 add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

// Widget areas
function register_widget_areas() {
	register_sidebar( array(
		'name'          => 'Footer area',
		'id'            => 'footer_area',
		'description'   => 'Footer widget area',
		'before_widget' => '<section class="col-md-4 mb-4">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	));
}
add_action( 'widgets_init', 'register_widget_areas' );

// Custom post types and taxonomies
function my_custom_post_type () {
	register_post_type( 'dn_movies', array(
		'labels'		=> array( 'name' => 'Movies' ),
		'description'	=> 'Holds movies and movie specific data',
		'public'		=> true,
		'supports'		=> array( 'title', 'editor', 'thumbnail', 'excerpt', 'author', 'revisions', 'custom-fields', 'runtime' ),
		'has_archive'	=> true,
		'rewrite'		=> array( 'slug' => 'movies' )
		)
	);
	register_post_type( 'dn_actors', array(
		'labels'		=> array( 'name' => 'Actors' ),
		'description'	=> 'Holds actors and actor specific data',
		'public'		=> true,
		'supports'		=> array( 'title', 'editor', 'thumbnail', 'excerpt', 'author', 'revisions', 'custom-fields', 'runtime' ),
		'has_archive'	=> true,
		'rewrite'		=> array( 'slug' => 'actors' )
		)
	);
	register_post_type( 'dn_directors', array(
		'labels'		=> array( 'name' => 'Directors' ),
		'description'	=> 'Holds directors and director specific data',
		'public'		=> true,
		'supports'		=> array( 'title', 'editor', 'thumbnail', 'excerpt', 'author', 'revisions', 'custom-fields', 'runtime' ),
		'has_archive'	=> true,
		'rewrite'		=> array( 'slug' => 'directors' )
		)
	);

	register_taxonomy( 'dn_genres', array( 'dn_movies', 'dn_actors', 'dn_directors' ), array( 
		'labels'			=> array( 'name' => 'Genres' ),
		'show_ui'			=> true,
		'show_admin_column'	=> true,
		'public'			=> true,
		'query_var'			=> true,
		'hierarchical'		=> true,
		'has_archive'		=> true,
		'rewrite'			=> array( 'slug' => 'genres' ),
		)
	);

	register_taxonomy( 'dn_years', 'dn_movies', array( 
		'labels'			=> array( 'name' => 'Years' ),
		'show_ui'			=> true,
		'show_admin_column'	=> true,
		'public'			=> true,
		'query_var'			=> true,
		'hierarchical'		=> true,
		'has_archive'		=> true,
		'rewrite'			=> array( 'slug' => 'years' ),
		)
	);

	register_taxonomy( 'dn_messages', 'dn_movies', array( 
		'labels'			=> array( 'name' => 'Messages' ),
		'show_ui'			=> true,
		'show_admin_column'	=> true,
		'public'			=> false,
		'query_var'			=> true,
		'hierarchical'		=> true,
		'has_archive'		=> true,
		'rewrite'			=> array( 'slug' => 'messages' ),
		)
	);
}
add_action( 'init', 'my_custom_post_type' );

// Meta Box + MB Relationships
add_action( 'mb_relationships_init', function() {
	MB_Relationships_API::register( [
		'id'   => 'movies_to_actors',
		'from' => [
			'post_type' => 'dn_movies',
			'meta_box'	=> [
				'title' => 'Actors',
			],
		],
		'to'   => [
			'post_type'   => 'dn_actors',
			'meta_box'	=> [
				'title' => 'Movies',
			],
		],
	] );

	MB_Relationships_API::register( [
		'id'   => 'movies_to_directors',
		'from' => [
			'post_type' => 'dn_movies',
			'meta_box'	=> [
				'title' => 'Directors',
			],
		],
		'to'   => [
			'post_type'   => 'dn_directors',
			'meta_box'	=> [
				'title' => 'Movies',
			],
		],
	] );
} );


// WP-PageNavi customisation
add_filter('wp_pagenavi_class_previouspostslink', 'theme_pagination_class');
add_filter('wp_pagenavi_class_nextpostslink', 'theme_pagination_class');
add_filter('wp_pagenavi_class_page', 'theme_pagination_class');
add_filter('wp_pagenavi_class_pages', 'theme_pagination_class');
add_filter('wp_pagenavi_class_last', 'theme_pagination_class');
add_filter('wp_pagenavi_class_extend', 'theme_pagination_class');
add_filter('wp_pagenavi_class_current', 'theme_pagination_class');

function theme_pagination_class($class_name) {
  switch($class_name) {
    case 'previouspostslink':
      $class_name = 'btn btn-outline-primary';
      break;
    case 'nextpostslink':
      $class_name = 'btn btn-outline-primary';
      break;
    case 'page':
      $class_name = 'btn btn-outline-primary';
	  break;
    case 'pages':
      $class_name = 'btn';
	  break;
    case 'extend':
      $class_name = 'btn';
	  break;
    case 'last':
      $class_name = 'btn btn-outline-primary';
	  break;
	case 'current':
	  $class_name = 'btn btn-primary';
	  break;
  }
  return $class_name;
}

// Custom functions

function movie_runtime( $minutes ) {
	$hours = (int) ( $minutes / 60 );
	$minutes = $minutes % 60;
	$disp = "";

	if( $hours > 0 ) {
		$disp = $hours . ' hour';
		if( $hours != 1 )
			$disp .= 's';
		$disp .= ' ';
	}
	if( $minutes > 0 ) {
		$disp .= $minutes . ' minute';
		if( $minutes > 1 )
			$disp .= 's';
	}

	return $disp;
}

function poster_placeholder() {
	return get_stylesheet_directory_uri() . '/inc/img/placeholder.png';
}

require_once( wp_normalize_path( get_template_directory() . '/ajax.php' ) );