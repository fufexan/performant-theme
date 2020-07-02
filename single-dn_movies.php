<?php get_header();
$id = get_the_ID(); ?>
<script>let id = <?php echo $id; ?></script>

<?php // The Loop
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); ?>
		<div class="row">

			<?php // featured image ?>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<?php if ( has_post_thumbnail() ) {
					the_post_thumbnail();
				} else { ?>
					<img src="<?php echo poster_placeholder(); ?>" alt="" width=300 height=500>
				<?php } ?>
			</div>

			<div class="col-lg-8 col-md-6 col-sm-auto">
				<h1 class="font-weight-light text-danger d-inline"><?php echo get_the_title(); ?></h1>
				<i id="heart<?php echo $id; ?>" class="far fa-heart d-inline ml-3 text-danger" style="cursor: pointer; font-size: 2em;" onclick="favorite(<?php echo $id; ?>)" aria-hidden=true data-toggle="popover" data-content="Add to favourites" data-trigger="hover focus"></i>
				<script>favstate(movieID);</script>
				<p><?php echo get_the_content(); ?></p>
				<p><?php echo get_the_term_list( $post->ID, 'dn_genres', 'Genres: ', ', ', '' ); ?></p>
				<p><?php echo get_the_term_list( $post->ID, 'dn_years', 'Year: ', ', ', '' ); ?></p>
				<p>Runtime: <?php echo movie_runtime( get_field( 'runtime' ) ); ?></p>
				
				<?php // Actors
				$actors = array();
				$connected = new WP_Query( [
					'relationship' => [
						'id'   => 'movies_to_actors',
						'from' => get_the_ID(),
					],
					'nopaging'     => true,
				] );
				while ( $connected->have_posts() ) : $connected->the_post();
					$actor = '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
					$actors[] = $actor;
				endwhile;
				wp_reset_postdata(); ?>

				<?php // Directors
				$directors = array();
				$connected = new WP_Query( [
					'relationship' => [
						'id'   => 'movies_to_directors',
						'from' => get_the_ID(),
					],
					'nopaging'     => true,
				] );
				while ( $connected->have_posts() ) : $connected->the_post();
					$director = '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
					$directors[] = $director;
				endwhile;
				wp_reset_postdata(); ?>

				<p>Actors:
					<?php echo implode( ', ', $actors ) ?>
				</p>
				<p>Directors:
					<?php echo implode( ', ', $directors ) ?>
				</p>
			</div>
			<form id="form" class="mt-5 ml-3 container justify-content-center" novalidate>
				<div class="row">
					<div class="form-group col">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" placeholder="Your Name" required>
						<div class="invalid-feedback">Please enter your name.</div>
					</div>
					<div class="form-group col">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" placeholder="you@example.com" required>
						<div class="invalid-feedback">Please enter your email.</div>
					</div>
				</div>
				<div class="form-group">
					<label for="message">Message</label>
					<textarea type="text" class="form-control" id="message" placeholder="A few words from you" required></textarea>
					<div class="invalid-feedback">Please enter your message.</div>
				</div>
				<div class="d-flex align-items-center">
					<button id="submit" type="submit" class="btn btn-primary mr-2">Submit</button>
					<div id="loader" class="spinner-border inactive" role="status">
						<span class="sr-only">Loading...</span>
					</div>
				</div>
			</form>
			<div id="success" class="alert-success inactive">Successfully sent the message.</div>
			<div id="fail" class="alert-danger inactive">There was an error sending the message.</div>
		</div>
	<?php }
} else {
	echo '<h3>Nothing found</h3>';
} ?>

<?php get_footer(); ?>
