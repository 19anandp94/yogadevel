<?php 

if( ! function_exists( '_wp_render_title_tag' ) ){
    function somnus_render_title() {
        echo '<title>' . wp_title( '|', false, 'right' ) . '</title>';
    }
    add_action( 'wp_head', 'somnus_render_title' );
}

/**
 * Init theme options
 * Certain theme options need to be written to the database as soon as the theme is installed.
 * This is either for the enqueues in ebor-framework, or to override the default image sizes in WooCommerce.
 * Either way this function is only called when the theme is first activated, de-activating and re-activating the theme will result in these options returning to defaults.
 * 
 * @since 1.0.0
 * @author tommusrhodus
 */
if(!( function_exists('somnus_init_theme_options') )){
	/**
	 * Hook in on activation
	 */
	global $pagenow;
	
	/**
	 * Define image sizes
	 */
	function somnus_init_theme_options() {
		//Ebor Framework
		$framework_args = array(
			'options'               => '1',
			'metaboxes'             => '1',
			'menu_post_type'        => '0',
			'team_post_type'        => '1',
			'class_post_type'       => '1'
		);
		update_option('ebor_framework_options', $framework_args);
	}
	
	/**
	 * Only call this action when we first activate the theme.
	 */
	if ( 
		is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ||
		is_admin() && isset( $_GET['theme'] ) && $pagenow == 'customize.php'
	){
		add_action( 'init', 'somnus_init_theme_options', 1 );
	}
}

/**
 * Register the required plugins for this theme.
 * 
 * @since 1.0.0
 * @author tommusrhodus
 */
if(!( function_exists('somnus_register_required_plugins') )){
	function somnus_register_required_plugins() {
		$plugins = array(
			array(
			    'name'      => 'Contact Form 7',
			    'slug'      => 'contact-form-7',
			    'required'  => false,
			    'version' 	=> '3.7.2'
			),
			array(
			    'name'      => 'WP Less',
			    'slug'      => 'wp-less',
			    'required'  => true,
			    'version' 	=> '1.0.0'
			),
			array(
				'name'     				=> 'Ebor Framework',
				'slug'     				=> 'Ebor-Framework-master',
				'source'   				=> 'https://github.com/tommusrhodus/ebor-framework/archive/master.zip',
				'required' 				=> true,
				'version' 				=> '1.2.4',
				'external_url' 			=> 'https://github.com/tommusrhodus/ebor-framework/archive/master.zip',
			),
			array(
				'name'     				=> 'Visual Composer',
				'slug'     				=> 'js_composer',
				'source'   				=> 'http://www.madeinebor.com/plugin-downloads/js_composer-latest.zip',
				'required' 				=> true,
				'external_url' 			=> 'http://www.madeinebor.com/plugin-downloads/js_composer-latest.zip',
				'version' 				=> '5.1',
			)
		);
		$config = array(
			'is_automatic' => true,
		);
		tgmpa( $plugins, $config );
	}
	add_action( 'tgmpa_register', 'somnus_register_required_plugins' );
}

if(!( function_exists('somnus_pagination') )){
	function somnus_pagination($pages = '', $range = 2){
		$showitems = ($range * 2)+1;
		
		global $paged;
		if(empty($paged)) $paged = 1;
		
		if($pages == ''){
			global $wp_query;
			$pages = $wp_query->max_num_pages;
				if(!$pages) {
					$pages = 1;
				}
		}
		
		$output = '';
			
		if(1 != $pages){
			$output .= "<div class='text-center mb64'><ul class='pagination pt64'>";
			if($paged > 2 && $paged > $range+1 && $showitems < $pages) $output .= "<li><a class='btn' href='".get_pagenum_link(1)."' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a></li> ";
			
			for ($i=1; $i <= $pages; $i++){
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
					$output .= ($paged == $i)? "<li class='active'><a class='btn' href='".get_pagenum_link($i)."'>".$i."</a></li> ":"<li><a class='btn' href='".get_pagenum_link($i)."'>".$i."</a></li> ";
				}
			}
		
			if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) $output .= "<li><a class='btn' href='".get_pagenum_link($pages)."' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li> ";
			$output.= "</ul></div>";
		}
		
		return $output;
	}
}

/**
 * Add additional styling options to TinyMCE
 * 
 * @since 1.0.0
 * @author tommusrhodus
 */
if(!( function_exists('somnus_mce_buttons_2') )){
	function somnus_mce_buttons_2( $buttons ) {
	    array_unshift( $buttons, 'styleselect' );
	    return $buttons;
	}
	add_filter( 'mce_buttons_2', 'somnus_mce_buttons_2' );
}

/**
 * Add additional styling options to TinyMCE
 * 
 * @since 1.0.0
 * @author tommusrhodus
 */
if(!( function_exists('somnus_mce_before_init') )){
	function somnus_mce_before_init( $settings ) {
	    $style_formats = array(
	    	array(
				'title'	=> 'Button Styles',
				'items'	=> array(
			    	array(
			    		'title' => 'Button',
			    		'selector' => 'a',
			    		'classes' => 'btn',
			    	),
				)
	    	),
	    	array(
	    		'title'	=> 'Text Styles',
	    		'items'	=> array(
	    	    	array(
	    	    		'title' => 'UPPERCASE',
	    	    		'selector' => '*',
	    	    		'classes' => 'uppercase',
	    	    	),
	    	    	array(
	    	    		'title' => 'Lead Paragraph',
	    	    		'selector' => 'p',
	    	    		'classes' => 'lead',
	    	    	),
	    	    	array(
	    	    		'title' => 'Fade Text',
	    	    		'selector' => '*',
	    	    		'classes' => 'fade-half',
	    	    	),
	    		)
	    	),
	    	array(
	    		'title'	=> 'Margins',
	    		'items'	=> array(
	    			array(
	    				'title' => 'Margin Bottom 0px',
	    				'selector' => '*',
	    				'classes' => 'mb0',
	    			),
	    			array(
	    				'title' => 'Margin Bottom 8px',
	    				'selector' => '*',
	    				'classes' => 'mb8',
	    			),
	    	    	array(
	    	    		'title' => 'Margin Bottom 16px',
	    	    		'selector' => '*',
	    	    		'classes' => 'mb16',
	    	    	),
	    	    	array(
	    	    		'title' => 'Margin Bottom 24px',
	    	    		'selector' => '*',
	    	    		'classes' => 'mb24',
	    	    	),
	    	    	array(
	    	    		'title' => 'Margin Bottom 32px',
	    	    		'selector' => '*',
	    	    		'classes' => 'mb24',
	    	    	),
	    	    	array(
	    	    		'title' => 'Margin Bottom 48px',
	    	    		'selector' => '*',
	    	    		'classes' => 'mb48',
	    	    	),
	    	    	array(
	    	    		'title' => 'Margin Bottom 64px',
	    	    		'selector' => '*',
	    	    		'classes' => 'mb64',
	    	    	),
	    	    	array(
	    	    		'title' => 'Margin Bottom 80px',
	    	    		'selector' => '*',
	    	    		'classes' => 'mb80',
	    	    	),
	    	    	array(
	    	    		'title' => 'Margin Bottom 104px',
	    	    		'selector' => '*',
	    	    		'classes' => 'mb104',
	    	    	),
	    	    	array(
	    	    		'title' => 'Margin Bottom 120px',
	    	    		'selector' => '*',
	    	    		'classes' => 'mb120',
	    	    	),
	    		)
	    	)
	    );
	    $settings['style_formats'] = json_encode( $style_formats );
	    return $settings;
	}
	add_filter( 'tiny_mce_before_init', 'somnus_mce_before_init' );
}


if(!( function_exists('somnus_get_icons') )){
	function somnus_get_icons(){
		$icons = array("none","ti-wand","ti-volume","ti-user","ti-unlock","ti-unlink","ti-trash","ti-thought","ti-target","ti-tag","ti-tablet","ti-star","ti-spray","ti-signal","ti-shopping-cart","ti-shopping-cart-full","ti-settings","ti-search","ti-zoom-in","ti-zoom-out","ti-cut","ti-ruler","ti-ruler-pencil","ti-ruler-alt","ti-bookmark","ti-bookmark-alt","ti-reload","ti-plus","ti-pin","ti-pencil","ti-pencil-alt","ti-paint-roller","ti-paint-bucket","ti-na","ti-mobile","ti-minus","ti-medall","ti-medall-alt","ti-marker","ti-marker-alt","ti-arrow-up","ti-arrow-right","ti-arrow-left","ti-arrow-down","ti-lock","ti-location-arrow","ti-link","ti-layout","ti-layers","ti-layers-alt","ti-key","ti-import","ti-image","ti-heart","ti-heart-broken","ti-hand-stop","ti-hand-open","ti-hand-drag","ti-folder","ti-flag","ti-flag-alt","ti-flag-alt-2","ti-eye","ti-export","ti-exchange-vertical","ti-desktop","ti-cup","ti-crown","ti-comments","ti-comment","ti-comment-alt","ti-close","ti-clip","ti-angle-up","ti-angle-right","ti-angle-left","ti-angle-down","ti-check","ti-check-box","ti-camera","ti-announcement","ti-brush","ti-briefcase","ti-bolt","ti-bolt-alt","ti-blackboard","ti-bag","ti-move","ti-arrows-vertical","ti-arrows-horizontal","ti-fullscreen","ti-arrow-top-right","ti-arrow-top-left","ti-arrow-circle-up","ti-arrow-circle-right","ti-arrow-circle-left","ti-arrow-circle-down","ti-angle-double-up","ti-angle-double-right","ti-angle-double-left","ti-angle-double-down","ti-zip","ti-world","ti-wheelchair","ti-view-list","ti-view-list-alt","ti-view-grid","ti-uppercase","ti-upload","ti-underline","ti-truck","ti-timer","ti-ticket","ti-thumb-up","ti-thumb-down","ti-text","ti-stats-up","ti-stats-down","ti-split-v","ti-split-h","ti-smallcap","ti-shine","ti-shift-right","ti-shift-left","ti-shield","ti-notepad","ti-server","ti-quote-right","ti-quote-left","ti-pulse","ti-printer","ti-power-off","ti-plug","ti-pie-chart","ti-paragraph","ti-panel","ti-package","ti-music","ti-music-alt","ti-mouse","ti-mouse-alt","ti-money","ti-microphone","ti-menu","ti-menu-alt","ti-map","ti-map-alt","ti-loop","ti-location-pin","ti-list","ti-light-bulb","ti-Italic","ti-info","ti-infinite","ti-id-badge","ti-hummer","ti-home","ti-help","ti-headphone","ti-harddrives","ti-harddrive","ti-gift","ti-game","ti-filter","ti-files","ti-file","ti-eraser","ti-envelope","ti-download","ti-direction","ti-direction-alt","ti-dashboard","ti-control-stop","ti-control-shuffle","ti-control-play","ti-control-pause","ti-control-forward","ti-control-backward","ti-cloud","ti-cloud-up","ti-cloud-down","ti-clipboard","ti-car","ti-calendar","ti-book","ti-bell","ti-basketball","ti-bar-chart","ti-bar-chart-alt","ti-back-right","ti-back-left","ti-arrows-corner","ti-archive","ti-anchor","ti-align-right","ti-align-left","ti-align-justify","ti-align-center","ti-alert","ti-alarm-clock","ti-agenda","ti-write","ti-window","ti-widgetized","ti-widget","ti-widget-alt","ti-wallet","ti-video-clapper","ti-video-camera","ti-vector","ti-themify-logo","ti-themify-favicon","ti-themify-favicon-alt","ti-support","ti-stamp","ti-split-v-alt","ti-slice","ti-shortcode","ti-shift-right-alt","ti-shift-left-alt","ti-ruler-alt-2","ti-receipt","ti-pin2","ti-pin-alt","ti-pencil-alt2","ti-palette","ti-more","ti-more-alt","ti-microphone-alt","ti-magnet","ti-line-double","ti-line-dotted","ti-line-dashed","ti-layout-width-full","ti-layout-width-default","ti-layout-width-default-alt","ti-layout-tab","ti-layout-tab-window","ti-layout-tab-v","ti-layout-tab-min","ti-layout-slider","ti-layout-slider-alt","ti-layout-sidebar-right","ti-layout-sidebar-none","ti-layout-sidebar-left","ti-layout-placeholder","ti-layout-menu","ti-layout-menu-v","ti-layout-menu-separated","ti-layout-menu-full","ti-layout-media-right-alt","ti-layout-media-right","ti-layout-media-overlay","ti-layout-media-overlay-alt","ti-layout-media-overlay-alt-2","ti-layout-media-left-alt","ti-layout-media-left","ti-layout-media-center-alt","ti-layout-media-center","ti-layout-list-thumb","ti-layout-list-thumb-alt","ti-layout-list-post","ti-layout-list-large-image","ti-layout-line-solid","ti-layout-grid4","ti-layout-grid3","ti-layout-grid2","ti-layout-grid2-thumb","ti-layout-cta-right","ti-layout-cta-left","ti-layout-cta-center","ti-layout-cta-btn-right","ti-layout-cta-btn-left","ti-layout-column4","ti-layout-column3","ti-layout-column2","ti-layout-accordion-separated","ti-layout-accordion-merged","ti-layout-accordion-list","ti-ink-pen","ti-info-alt","ti-help-alt","ti-headphone-alt","ti-hand-point-up","ti-hand-point-right","ti-hand-point-left","ti-hand-point-down","ti-gallery","ti-face-smile","ti-face-sad","ti-credit-card","ti-control-skip-forward","ti-control-skip-backward","ti-control-record","ti-control-eject","ti-comments-smiley","ti-brush-alt","ti-youtube","ti-vimeo","ti-twitter","ti-time","ti-tumblr","ti-skype","ti-share","ti-share-alt","ti-rocket","ti-pinterest","ti-new-window","ti-microsoft","ti-list-ol","ti-linkedin","ti-layout-sidebar-2","ti-layout-grid4-alt","ti-layout-grid3-alt","ti-layout-grid2-alt","ti-layout-column4-alt","ti-layout-column3-alt","ti-layout-column2-alt","ti-instagram","ti-google","ti-github","ti-flickr","ti-facebook","ti-dropbox","ti-dribbble","ti-apple","ti-android","ti-save","ti-save-alt","ti-yahoo","ti-wordpress","ti-vimeo-alt","ti-twitter-alt","ti-tumblr-alt","ti-trello","ti-stack-overflow","ti-soundcloud","ti-sharethis","ti-sharethis-alt","ti-reddit","ti-pinterest-alt","ti-microsoft-alt","ti-linux","ti-jsfiddle","ti-joomla","ti-html5","ti-flickr-alt","ti-email","ti-drupal","ti-dropbox-alt","ti-css3","ti-rss","ti-rss-alt");
		return $icons;	
	}
}

/**
 * Custom Comment Markup for Somnus
 * 
 * @since 1.0.0
 * @author tommusrhodus
 */
if(!( function_exists('somnus_custom_comment') )){
	function somnus_custom_comment($comment, $args, $depth) { 
		$GLOBALS['comment'] = $comment; 
	?>

		<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
			<div class="avatar">
				<?php echo get_avatar( $comment->comment_author_email, 75 ); ?>
			</div>
			<div class="comment">
				<?php printf('<span class="uppercase author">%s, %s</span>', get_comment_author_link(), get_comment_date()); ?>
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
				<?php echo wpautop( htmlspecialchars_decode( get_comment_text() ) ); ?>
				<?php if ($comment->comment_approved == '0') : ?>
				<p><em><?php esc_html_e('Your comment is awaiting moderation.', 'somnus') ?></em></p>
				<?php endif; ?>	
			</div>
	
	<?php }
}

/* 
* SOMNUS CLASS TIME DISPLAY IN ADMIN VIEW
*/
add_action('manage_class_posts_custom_column', 'ebor_display_classes_time_column', 5, 2);
add_filter('manage_class_posts_columns', 'ebor_add_classes_time_column', 5);

if(!( function_exists('ebor_add_classes_time_column') )){
	function ebor_add_classes_time_column($cols){
	  $cols['ebor_class_time'] = __('Time','ebor');
	  return $cols;
	}
}

if(!( function_exists('ebor_display_classes_time_column') )){
	function ebor_display_classes_time_column($col, $id){
	  switch($col){
	    case 'ebor_class_time':
 			echo get_post_meta( $id, '_ebor_class_col_1', true ); 
      	break;
	  }
	}
}
