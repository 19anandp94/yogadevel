<div class="col-md-10 col-md-offset-1 pt64 pb64 bg-secondary">
	
	<div class="tags text-center"><?php the_category(' '); ?></div>
	<?php the_title('<h2 class="uppercase text-center mb64 mb-xs-24">', '</h2>'); ?>
	
	<div class="col-md-8 col-md-offset-2">
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
	
</div>