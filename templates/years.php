<?php /* Template Name: Years */ ?>
<?php get_header(); ?>

templates/years

<?php $colors = [ 'primary', 'secondary', 'success', 'danger', 'warning', 'info' ]; ?>
<?php	if( have_posts() ) {
			while( have_posts() ) { the_post(); ?>
				<h1 class="text-danger font-weight-light"><?php the_title(); ?></h1>
				<p><?php the_content(); ?></p>
				<div class="d-flex flex-wrap justify-content-center">
					<?php $terms = get_terms( [ 'taxonomy' => 'dn_years' ] ); 
					foreach( $terms as $genre ) { ?>
						<a href="<?php echo $genre->slug; ?>" class="d-flex w-25 p-4 btn btn-<?php echo $colors[ rand( 0, 5 ) ]; ?> align-items-center justify-content-center m-1"><?php echo $genre->name; ?></a>
					<?php } ?>
				</div>
			<?php } wp_reset_postdata(); ?>
<?php } else { ?>
	<h3 class="text-center">Nothing found</h3>
<?php } ?>

<?php get_footer(); ?>

