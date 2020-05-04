<?php get_header(); ?>

index.php

<?php // The Loop
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); ?>


		<div class="row">
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="col-lg-4 col-md-6 col-sm-12 order-last order-md-first">
					<div class="featured-image">
						<?php the_post_thumbnail(); ?>
					</div>
				</div>
				<div class="col-lg-8 col-md-6 col-sm-auto">
			<?php } else {
				echo '<div>';
			} ?>

			<h1 class="font-weight-light text-danger"><?php the_title(); ?></h1>
			<?php the_content(); ?>
			</div>
		</div>
	<?php }
} else {
	echo '<h3>Nothing found</h3>';
} ?>

<?php get_footer(); ?>
