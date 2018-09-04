<div class="row">
	<div class="col-md-10 col-md-offset-1 overflow-hidden p0">
		<?php 
			if ( have_posts() ) : while ( have_posts() ) : the_post();
				
				/**
				 * Get blog posts by blog layout.
				 */
				get_template_part('loop/content', 'team');
			
			endwhile;	
			else : 
				
				/**
				 * Display no posts message if none are found.
				 */
				get_template_part('loop/content','none');
				
			endif;
		?>
	</div><!--end 10 col-->
</div><!--end of row-->