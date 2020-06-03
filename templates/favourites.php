<?php get_header(); 
/* Template Name: Favourites */
?>

<?php
	if($paged == 0) $paged = 1;
?>

<div id="loader" class="text-center spinner-border inactive" role="status">
	<span class="sr-only">Loading...</span>
</div>

<h1 class="mb-3"><?php the_title(); ?></h1>
<div class="d-flex flex-column" id="main">
</div>

<?php get_footer(); ?>

