<?php 
	get_header(); 
	$thumbnail = ( get_option('timetable_header_image') ) ? '<img src="'. get_option('timetable_header_image') .'" alt="Timetable Header" class="background-image" />' : false;
?>

<?php if( $thumbnail ) : ?>
	<section class="pt160 pb160 pt-xs-80 pb-xs-80 image-bg overlay">
	
		<div class="background-image-holder">
			<?php echo htmlspecialchars_decode($thumbnail); ?>
		</div>
		
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h1 class="uppercase mb0"><?php echo esc_html(get_option('timetable_title','Timetable')); ?></h1>
				</div>
			</div><!--end of row-->
		</div>
		
	</section>
<?php endif; ?>

<section>
	<div class="container">	
		<?php get_template_part('loop/loop','class'); ?>
	</div><!--end of container-->
</section>

<?php get_footer(); ?>