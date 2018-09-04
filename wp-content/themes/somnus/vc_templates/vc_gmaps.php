<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $link
 * @var $size
 * @var $el_class
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Gmaps
 */
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$zoom = 14; // deprecated 4.0.2. In 4.6 was moved outside from shortcode_atts
$type = 'm'; // deprecated 4.0.2
$bubble = ''; // deprecated 4.0.2

if ( '' === $link ) {
	return null;
}
$link = trim( vc_value_from_safe( $link ) );
$bubble = ( $bubble !== '' && $bubble !== '0' ) ? '&amp;iwloc=near' : '';

preg_match_all('#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#', $css, $image);
?>

<section class="p0 fullwidth-map">
	<div class="map-holder pt240 pb240 pt-xs-120 pb-xs-120">
		<?php
			if ( preg_match( '/^\<iframe/', $link ) ) {
				echo htmlspecialchars_decode($link);
			}
		?>
	</div>
</section>

<section class="top-layer">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="pt64 pb64 bg-secondary relative overflow-hidden">
				
					<div class="col-md-5 col-md-push-1 col-sm-6 col-sm-push-1">
						<?php echo wpautop(do_shortcode(htmlspecialchars_decode($content))); ?>
					</div>
					
					<?php if($form) : ?>
						<div class="col-sm-6 height-100 bg-dark right">
							<div class="pt64 p32 pb-xs-64">
								<?php echo do_shortcode('[contact-form-7 id="'. $form .'"]'); ?>
							</div>
						</div>
					<?php elseif( $image[0][0] ) : ?>
						<div class="col-sm-6 height-100 right hidden-xs">
							<div class="background-image-holder">
								<img alt="Pic" class="background-image" src="<?php echo esc_url($image[0][0]); ?>" />
							</div>
						</div>
					<?php endif; ?>
					
				</div>
			</div>
		</div><!--end of row-->
	</div><!--end of container-->
</section>