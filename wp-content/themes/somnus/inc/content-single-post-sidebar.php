<div class="col-sm-12 pt64 pb64 bg-secondary">
		
		<div class="col-sm-8  col-md-offset-2">
			
			<?php the_title('<h2 class="uppercase text-center mb64 mb-xs-24">', '</h2>'); ?>
			
			<div class="mb40 mb-xs-24">
			
				<div class="post-content">
					<?php  
						the_content();
						wp_link_pages();
					?>
				</div>
				
				<?php
					the_tags('<div class="tags">',' ','</div>');
					
					if( comments_open() )
						comments_template();
				?>
				
			</div>
			
		</div>
		
		<?php get_sidebar('single'); ?>
	
</div>