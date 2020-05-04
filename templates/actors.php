<?php /* Template Name: Actors */ ?>
<?php get_header(); ?>

templates/genres

<?php $colors = [ 'primary', 'secondary', 'success', 'danger', 'warning', 'info' ]; ?>
<?php	if( have_posts() ) {
			while( have_posts() ) { the_post(); ?>
				<h1 class="text-danger font-weight-light"><?php the_title(); ?></h1>
				<p><?php the_content(); ?></p>
				<div class="d-flex flex-wrap justify-content-center">
					<?php $terms = get_terms( [ 'post_type' => 'dn_actors' ] ); 
					foreach( $terms as $actor ) { ?>
						<a href="<?php echo $actor->slug; ?>" class="d-flex w-25 p-5 btn btn-<?php echo $colors[ rand( 0, 5 ) ]; ?> align-items-center justify-content-center m-1"><?php echo $actor->name; ?></a>
					<?php } ?>
				</div>
			<?php } wp_reset_postdata(); ?>
<?php } else { ?>
	<h3 class="text-center">Nothing found</h3>
<?php } ?>

<?php get_footer(); ?>

