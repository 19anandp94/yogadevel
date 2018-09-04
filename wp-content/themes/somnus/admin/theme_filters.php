<?php 

//Remove title filters
remove_filter( 'wp_title', 'ebor_framework_wp_title', 10, 2 );

//Remove old favicon controls
remove_action('wp_head', 'ebor_framework_load_favicons');

/**
 * Force easy google fonts plugin styles
 */
if(!( function_exists('somnus_egf_force_styles') )){ 
	function somnus_egf_force_styles( $force_styles ) {
	    return true;
	}
	add_filter( 'tt_font_force_styles', 'somnus_egf_force_styles' );
}

/**
 * Add a clearfix to the end of the_content()
 */
if(!( function_exists('somnus_add_clearfix') )){ 
	function somnus_add_clearfix( $content ) { 
		if( is_single() )
	   		$content = $content .= '<div class="clearfix"></div>';
	    return $content;
	}
	add_filter( 'the_content', 'somnus_add_clearfix' ); 
}

/**
 * Add additional settings to gallery shortcode
 */
if(!( function_exists('somnus_add_gallery_settings') )){ 
	function somnus_add_gallery_settings(){
	?>
	
		<script type="text/html" id="tmpl-somnus-gallery-setting">
			<h3>Somnus Theme Gallery Settings</h3>
			<label class="setting">
				<span><?php esc_html_e('Gallery Layout', 'somnus'); ?></span>
				<select data-setting="layout">
					<option value="default">Default Layout</option>
					<option value="slider">Somnus Slider</option>
				</select>
			</label>
		</script>
	
		<script>
			jQuery(document).ready(function(){
				jQuery.extend(wp.media.gallery.defaults, { layout: 'default' });
				
				wp.media.view.Settings.Gallery = wp.media.view.Settings.Gallery.extend({
					template: function(view){
					  return wp.media.template('gallery-settings')(view)
					       + wp.media.template('somnus-gallery-setting')(view);
					}
				});
			});
		</script>
	  
	<?php
	}
	add_action('print_media_templates', 'somnus_add_gallery_settings');
}


/**
 * Custom gallery shortcode
 *
 * Filters the standard WordPress gallery shortcode.
 *
 * @since 1.0.0
 */
if(!( function_exists('somnus_post_gallery') )){
	function somnus_post_gallery( $output, $attr) {
		
		global $post, $wp_locale;
	
	    static $instance = 0;
	    $instance++;
	
	    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	    if ( isset( $attr['orderby'] ) ) {
	        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
	        if ( !$attr['orderby'] )
	            unset( $attr['orderby'] );
	    }
	
	    extract(shortcode_atts(array(
	        'order'      => 'ASC',
	        'orderby'    => 'menu_order ID',
	        'id'         => $post->ID,
	        'itemtag'    => 'div',
	        'icontag'    => 'dt',
	        'captiontag' => 'dd',
	        'columns'    => 3,
	        'size'       => 'large',
	        'include'    => '',
	        'exclude'    => '',
	        'layout'     => ''
	    ), $attr));
	
	    $id = intval($id);
	    if ( 'RAND' == $order )
	        $orderby = 'none';
	
	    if ( !empty($include) ) {
	        $include = preg_replace( '/[^0-9,]+/', '', $include );
	        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	
	        $attachments = array();
	        foreach ( $_attachments as $key => $val ) {
	            $attachments[$val->ID] = $_attachments[$key];
	        }
	    } elseif ( !empty($exclude) ) {
	        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
	        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	    } else {
	        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	    }
	
	    if ( empty($attachments) )
	        return '';
	
	    if ( is_feed() ) {
	        $output = "\n";
	        foreach ( $attachments as $att_id => $attachment )
	            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
	        return $output;
	    }
	    
	    /**
	     * Return Slider Layout
	     */
	    if( $layout == 'slider' ){
	    	$output = '<div class="image-slider slider-all-controls controls-inside"><ul class="slides">';
	    		foreach ( $attachments as $id => $attachment ) {
	    		    $output .= '<li><div class="background-image-holder">'. wp_get_attachment_image($id, 'full') .'</div></li>';
	    		} 
	    	$output .= '</ul></div>';
	    	return $output;
	    }
	    
	}
	add_filter( 'post_gallery', 'somnus_post_gallery', 10, 2 );
}