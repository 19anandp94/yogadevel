<?php
	$title = get_option('footer_newsletter_title', 'Newsletter');
	$subtitle = get_option('footer_newsletter_subtitle', 'Studio Updates &amp; New Timetables Weekly');
	$shortcode = get_option('footer_newsletter_shortcode');
	
	if(!( $title && $subtitle && $shortcode ))
		return false;
?>

<div class="row mb64 mt0 mb-xs-32">
	<div class="col-sm-12 text-center">
		<div class="bg-secondary pt64 pb64">
			<h4 class="uppercase mb16"><?php echo esc_html($title); ?></h4>
			<p><?php echo esc_html($subtitle); ?></p>
			<?php echo do_shortcode($shortcode); ?>
		</div>
	</div>
</div><!--end of row-->