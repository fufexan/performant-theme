<?php /* Template Name: Home */ ?>
<?php get_header(); ?>

<?php $colors = [ 'primary', 'secondary', 'success', 'danger', 'warning', 'info' ];
	$moviesc = wp_count_posts( 'dn_movies' )->publish;
	$actorsc = wp_count_posts( 'dn_actors' )->publish;
	$directorsc = wp_count_posts( 'dn_directors' )->publish;
	$genresc = wp_count_terms( 'dn_genres' );
	$yearsc  = wp_count_terms( 'dn_years' );
?>

<?php	if( have_posts() ) {
			while( have_posts() ) { the_post(); ?>
				<h1 class="text-danger font-weight-light justify-self-center md-justify-self-left"><?php the_title(); ?></h1>
				<p><?php the_content(); ?></p>
				<p>Our site contains a list of <?php echo $moviesc; ?> movies spread across <?php echo $genresc; ?> genres and <?php echo $yearsc; ?> years. You can also see the filmography of <?php echo $actorsc; ?> actors or <?php echo $directorsc; ?> directors.</p>
				<div class="row">
					<div class="">
						<h3 class="text-danger font-weight-light">Top 10 Shortest Movies</h3>
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
						<h3 class="text-danger font-weight-light">Top 10 Longest Movies</h3>
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

