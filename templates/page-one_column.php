<?php /* Template Name: One Column */ ?>
<?php get_header(); ?>

<div class="container">
	<?php // The Loop
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post(); ?>
			<h1 class="font-weight-light text-danger"><?php the_title(); ?></h1>
			<div>
				<?php the_content(); ?>
			</div>
		<?php }
	} else {
		echo '<h3>Nothing found</h3>';
	} ?>
</div>
<?php get_footer(); ?>
