<?php 
	get_header(); 
	
	global $wp_query;
	$total_results = $wp_query->found_posts;
	$items = ( $total_results == '1' ) ? esc_html__(' Item','somnus') : esc_html__(' Items','somnus'); 
?>

<section class="text-center pb0">
	<h1 class="fade-1-4 uppercase"><?php echo get_search_query(); ?></h1>
	<p class="mb0"><?php echo esc_html__('Found ' ,'somnus') . $total_results . $items; ?></p>
</section>
		
<?php
	get_template_part('loop/loop','post');
	get_footer();