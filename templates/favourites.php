<?php get_header(); 
/* Template Name: Favourites */
?>

<?php
	if($paged == 0) $paged = 1;
?>

<h1 class="mb-3"><?php the_title(); ?></h1>

<div id="loader" class="spinner-border inactive" role="status">
	<span class="sr-only">Loading...</span>
</div>

<div class="d-flex flex-column" id="main">
</div>

<?php get_footer(); ?>

