<?php 
	get_header(); 
	$term = get_queried_object();
?>

<section class="text-center pb0">
	<h1 class="fade-1-4 uppercase"><?php echo esc_html__('Posts In: ','somnus') . $term->name; ?></h1>
	<p class="mb0"><?php echo esc_html(strip_tags($term->description)); ?></p>
</section>
		
<?php
	get_template_part('loop/loop','post');
	get_footer();