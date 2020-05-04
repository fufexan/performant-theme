<?php /* Template Name: Home */ ?>
<?php get_header(); ?>

templates/home

<?php $colors = [ 'primary', 'secondary', 'success', 'danger', 'warning', 'info' ]; ?>
<?php	if( have_posts() ) {
			while( have_posts() ) { the_post(); ?>
				<h1 class="text-danger font-weight-light"><?php the_title(); ?></h1>
				<p><?php the_content(); ?></p>
				<div class="row">
					<div class="">
						<h1 class="text-danger font-weight-light">Top 10 Shortest Movies</h1>
						<?php
							$args = [
								'posts_per_page'	=> '10',
								'post_type' => 'dn_movies',
								'meta_key'	=> 'runtime',
								'orderby'	=> 'meta_value_num',
								'order' 	=> 'ASC',
							];
							$query = new WP_Query( $args );
							if( $query->have_posts() ) {
								while( $query->have_posts() ) {
									$query->the_post();
									get_template_part( '/templates/template-parts/loop', 'movies' );
								}
							} else {
								
							}
						?>
					</div>
					<div class="">
						<h1 class="text-danger font-weight-light">Top 10 Longest Movies</h1>
						<?php	
							$args = [
								'posts_per_page'	=> '10',
								'post_type' => 'dn_movies',
								'meta_key'	=> 'runtime',
								'orderby'	=> 'meta_value_num',
								'order' 	=> 'DESC',
							];
							$query = new WP_Query( $args );
							if( $query->have_posts() ) {
								while( $query->have_posts() ) {
									$query->the_post();
									get_template_part( '/templates/template-parts/loop', 'movies' );
								}
							} else {
								
							}
						?>
					</div>
				</div>
			<?php } wp_reset_postdata(); ?>
<?php } else { ?>
	<h3 class="text-center">Nothing found</h3>
<?php } ?>

<?php get_footer(); ?>

