<?php 
	if ( have_posts() ) : while ( have_posts() ) : the_post();
		
		/**
		 * Get blog posts by blog layout.
		 */
		get_template_part('loop/content', 'post');
	
	endwhile;	
	else : 
		
		/**
		 * Display no posts message if none are found.
		 */
		get_template_part('loop/content','none');
		
	endif;
	
	/**
	 * Post pagination, use ebor_pagination() first and fall back to default
	 */
	echo function_exists('somnus_pagination') ? somnus_pagination() : posts_nav_link();