<?php get_header(); ?>

archive.php
<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
	if( $term )
		$title = 'Movies from ' . $term->name;
?>
<h1 class="mb-3"><?php echo post_type_archive_title( '', false ); ?></h1>
	<h1 class="mb-3"><?php if( $title != 'Movies from ') echo $title; ?></h1>
	<?php	if( have_posts() ) {
		while( have_posts() ) {
			the_post();
			get_template_part( '/templates/template-parts/loop', 'movies' );
		} wp_reset_postdata(); ?>
		<nav class="mt-3 justify-content-center d-flex">
			<?php wp_pagenavi(); ?>
		</nav>
<?php } else { ?>
	<h3 class="text-center">Nothing found</h3>
<?php } ?>

<?php get_footer(); ?>

