<?php
	$colors = [ 'primary', 'secondary', 'success', 'danger', 'warning', 'info' ];
?>
<div class="d-flex flex-wrap justify-content-center">
	<a href="<?php the_permalink(); ?>" class="d-flex w-25 p-4 btn btn-<?php echo $colors[ rand( 0, 5 ) ]; ?> align-items-center justify-content-center m-1"><?php the_title(); ?></a>
</div>
