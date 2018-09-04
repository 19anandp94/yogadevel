<?php 
	get_header(); 
	$author = get_user_by( 'slug', get_query_var( 'author_name' ) );
?>

<section class="text-center pb0">
	<h1 class="fade-1-4 uppercase"><?php echo esc_html__('Posts By: ','somnus') . $author->display_name; ?></h1>
</section>
		
<?php
	get_template_part('loop/loop','post');
	get_footer();