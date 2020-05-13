<!doctype html>
<html>
<head>
	<script>let movieID = <?php echo get_the_ID(); ?></script>
	<?php wp_head(); ?>
	<title><?php wp_title() ?></title>
</head>

<body>
	<header>
		<nav class="navbar navbar-expand-md navbar-light bg-light">
			<div class="container">
				<?php 
					if ( has_custom_logo() ) { ?>
						<a href="<?php get_home_path(); ?>" class="navbar-brand">
							<?php the_custom_logo() ?>
						</a>
				<?php }
				wp_nav_menu( array(
					'theme_location'	=> 'navbar',
					'depth'				=> 0,
					'container'			=> 'div',
					'container_class'	=> 'collapse navbar-collapse',
					'menu_class'		=> 'nav navbar-nav',
					'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
					'walker'			=> new WP_Bootstrap_Navwalker()
				) );
				?>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
		</nav>
		<hr class="mt-1">
	</header>
<div class="container d-flex flex-column justify-content-center md-justify-content-left">
