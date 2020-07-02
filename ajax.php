<?php

function ajax_scripts () {
	wp_enqueue_script( 'ajaxjs', get_stylesheet_directory_uri() . '/inc/js/ajax.js', array( 'jquery' ), '', false );
	wp_enqueue_script( 'msgjs', get_stylesheet_directory_uri() . '/inc/js/msg.js', array( 'jquery' ), '', true );
	wp_localize_script( 'ajaxjs', 'favObj', [ 'favUrl' => admin_url('admin-ajax.php') ] );
}
add_action( 'wp_enqueue_scripts', 'ajax_scripts' );

// add our action to anonymous or logged in users
add_action( 'wp_ajax_fav_action', 'fav_action' );
add_action( 'wp_ajax_nopriv_fav_action', 'fav_action' );

add_action( 'wp_ajax_receive_message', 'receive_message' );
add_action( 'wp_ajax_nopriv_receive_message', 'receive_message' );

function fav_action () {
	$ids = json_decode( wp_unslash( $_POST['jsonData'] ), true);

	$query = new WP_Query( [
		'post_type'	=> 'dn_movies',
		'post__in'	=> $ids,
		'paged'		=> true
	] );

	if( $query->have_posts() ) {
		while( $query->have_posts() ) {
			$query->the_post();
			get_template_part( '/templates/template-parts/loop', 'movies' );
		} wp_reset_postdata(); ?>
		<nav class="mt-3 justify-content-center d-flex">
			<?php wp_pagenavi(); ?>
		</nav>
	<?php } else { ?>
		<h3 class="text-center">You have no favourite movies! <a href="<?php echo get_home_path() . 'movies'; ?>">Add some!</a></h3>
	<?php }

	wp_die();
}

function receive_message() {
	$msg = json_decode( wp_unslash( $_POST['jsonData'], true ) );

	print_r( $msg );

	wp_die();
}