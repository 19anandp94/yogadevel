<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="nav-container">
	<nav>
		<?php
			get_template_part('inc/content-nav', 'utility');
			get_template_part('inc/content-nav', 'menu');
		?>
	</nav>
</div>

<div class="main-container">