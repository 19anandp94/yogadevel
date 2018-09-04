<?php 
	get_header();
	the_post();
?>

<section id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
			
				<?php the_title('<h4 class="uppercase text-center mb64 mb-xs-24">', '</h4>'); ?>
				
				<div class="post-content">
					<?php
						the_content();
						wp_link_pages();
					?>
				</div>
				
				<?php	
					if( comments_open() )
						comments_template();
				?>
				
			</div>
		</div><!--end of row-->
	</div><!--end of container-->
</section>

<?php get_footer();