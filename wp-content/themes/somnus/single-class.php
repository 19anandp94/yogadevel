<?php 
	get_header();
	the_post();
?>

<?php if( has_post_thumbnail() ) : ?>
	<section class="pt240 pb160 pt-xs-80 pb-xs-80 image-bg page-title">
		<div class="background-image-holder">
			<?php the_post_thumbnail('full', array('class' => 'background-image')); ?>
		</div>
	</section>
<?php endif; ?>

<section id="class-<?php the_ID(); ?>" <?php post_class('contained-page p0'); ?>>
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 pt64 pb64 bg-secondary">
			
				<?php the_title('<h2 class="uppercase text-center mb64 mb-xs-24">', '</h2>'); ?>
				
				<div class="col-md-8 col-md-offset-2">
					<div class="mb40 mb-xs-24 post-content">
						<?php  
							the_content();
							wp_link_pages();
						?>
					</div>
				</div>
				
			</div>
		</div><!--end of row-->
	</div><!--end of container-->	
</section>

<?php 
	get_template_part('inc/content','footer-cta');
	get_footer();