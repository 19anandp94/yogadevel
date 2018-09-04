<?php 
	get_header();
	
	$sidebar = ( is_active_sidebar('primary') ) ? 'post-sidebar' : 'post';
	get_template_part('loop/loop', $sidebar);
	
	get_footer();