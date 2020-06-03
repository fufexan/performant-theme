<?php get_header(); 
/* Template Name: History */
?>

<?php
	if( $paged == 0 ) $paged = 1;

	$ids = array_reverse( explode( ',', $_COOKIE['hist'] ) );
	$query = new WP_Query( [
		'post_type'	=> 'dn_movies',
		'post__in'	=> $ids,
		'paged'		=> true,
		'orderby'	=> 'post__in'
	] );
?>


<h1 class="mb-3"><?php the_title(); ?></h1>
<div class="d-flex flex-column" id="main">
<?php
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			get_template_part( '/templates/template-parts/loop', 'movies' );
		} ?>
		<nav class="mt-3 justify-conent-center d-flex">
			<?php wp_pagenavi(); ?>
		</nav>
	<?php } else { ?>
		<h3 class="text-center">You have no movie history. <a href="<?php echo get_home_path() . 'movies'; ?>">Look at some!</a></h3>
	<?php } ?>
</div>

<?php get_footer(); ?>