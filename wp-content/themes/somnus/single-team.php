<?php 
	get_header();
	the_post();
	
	$sidebar = ( is_active_sidebar('primary') ) ? 'post-sidebar' : 'post';
?>

<!-- <?php if( has_post_thumbnail() ) : ?>        
	<section class="pt240 pb160 pt-xs-80 pb-xs-80 image-bg page-title">
		<div class="background-image-holder">
			<?php the_post_thumbnail('full', array('class' => 'background-image')); ?>
		</div>
	</section>
<?php endif; ?> -->

<section id="post-<?php the_ID(); ?>" <?php post_class('contained-page p0'); ?>>
	<div class="container">
		<div class="row">
			<?php get_template_part('inc/content-single', $sidebar); ?>
		</div><!--end of row-->
	</div><!--end of container-->	
</section>

<?php 
	get_footer();