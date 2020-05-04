<div class="row">
	<div class="col-lg-4 col-md-6 col-sm-12 order-last order-md-first">
		<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail();
		} else { ?>
			<img src="<?php echo poster_placeholder(); ?>" alt="" width=300 height=500>
		<?php } ?>
	</div>
	<div class="col-lg-8 col-md-6 col-sm-auto">
		<a href="<?php the_permalink(); ?>"><h1 class="font-weight-light text-danger"><?php the_title(); ?></h1></a>
		<p><?php echo the_content(); ?></p>
		<p><?php echo get_the_term_list( '', 'dn_genres', 'Genres: ', ', ', '' ); ?></p>
		<p><?php echo get_the_term_list( '', 'dn_years', 'Year: ', ', ', '' ); ?></p>
		<p>Runtime: <?php echo movie_runtime( get_field( 'runtime', '' ) ); ?></p>
	</div>
</div>

