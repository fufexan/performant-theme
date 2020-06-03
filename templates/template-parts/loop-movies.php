<script>id = <?php echo get_the_ID(); ?>;</script>

<div class="row">
	<div class="col-lg-4 col-md-6 col-sm-12 order-last order-md-first">
		<?php if ( has_post_thumbnail() ) { ?>
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
		<?php } else { ?>
			<a href="<?php the_permalink(); ?>"><img src="<?php echo poster_placeholder(); ?>" alt="" width=300 height=500></a>
		<?php } ?>
	</div>
	<div class="col-lg-8 col-md-6 col-sm-auto align-self-center">
		<a href="<?php the_permalink(); ?>"><h1 class="font-weight-light text-danger d-inline"><?php the_title(); ?></h1></a>
		<i id="heart<?php echo $id; ?>" class="far fa-heart d-inline ml-3 text-danger" style="cursor: pointer; font-size: 2em;" onclick="favorite(<?php echo $id; ?>)" aria-hidden=true data-toggle="popover" data-content="Add to favourites" data-trigger="hover focus" data-placement="right"></i>
		<script>favstate(id);</script>
		<p><?php echo the_content(); ?></p>
		<p><?php echo get_the_term_list( '', 'dn_genres', 'Genres: ', ', ', '' ); ?></p>
		<p><?php echo get_the_term_list( '', 'dn_years', 'Year: ', ', ', '' ); ?></p>
		<p>Runtime: <?php echo movie_runtime( get_field( 'runtime', '' ) ); ?></p>
	</div>
</div>

