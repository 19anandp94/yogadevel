<?php
	$title = get_option('footer_cta_title', 'Ready to find your center?');
	$subtitle = get_option('footer_cta_subtitle', 'Or Contact Us for more info');
	$subtitle_url = get_option('footer_cta_subtitle_url');
	$button = get_option('footer_cta_button', 'Become A Member');
	$button_url = get_option('footer_cta_button_url');
	
	if(!( $title && $button_url & $subtitle_url ))
?>

<section class="cta bg-white pt180">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<?php
					if($title)
						echo '<p class="lead mb48 mb-xs-24">'. esc_html($title) .'</p>';
						
					if($button_url)
						echo '<a class="btn btn-lg block-xs" href="'. esc_url($button_url) .'">'. esc_html($button) .'</a><br />';
						
					if($subtitle_url)
						echo '<a class="fade-half" href="'. esc_url($subtitle_url) .'">'. esc_html($subtitle) .'</a>';
				?>
			</div>
		</div><!--end of row-->
	</div><!--end of container-->
</section>