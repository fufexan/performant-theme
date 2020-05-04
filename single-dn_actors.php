<?php get_header(); ?>

single-dn_actors

<h1 class="mb-3"><?php the_title(); ?></h1>
<?php if( $paged == 0 ) $paged = 1;

$connected = new WP_Query( [
	'relationship' => [
		'id'   => 'movies_to_actors',
		'to' => get_the_ID(),
	],
	'nopaging'     => true,
] );
while ( $connected->have_posts() ) : $connected->the_post();
	get_template_part( '/templates/template-parts/loop', 'movies' );
endwhile;
wp_reset_postdata(); ?>

<nav class="mt-3 justify-content-center d-flex">
	<?php wp_pagenavi(); ?>
</nav>

<?php get_footer(); ?>
