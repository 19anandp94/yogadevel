<?php 

/**
 * Here is all the custom colours for the theme.
 * $handle is a reference to the handle used with wp_enqueue_style()
 */
if(!( function_exists('somnus_less_vars') )){ 
	function somnus_less_vars( $vars, $handle = 'ebor-theme-styles' ) {

	    return $vars;
	}
	add_filter( 'less_vars', 'somnus_less_vars', 10, 2 );
}

/**
 * Ebor Load Scripts
 * Properly Enqueues Scripts & Styles for the theme
 * @since version 1.0
 * @author TommusRhodus
 */ 
if(!( function_exists('somnus_load_scripts') )){
	function somnus_load_scripts() {

		$protocol = is_ssl() ? 'https' : 'http';
			
		//Enqueue Styles
		$extension = ( class_exists('WPLessPlugin') ) ? '.less' : '.css';
		wp_enqueue_style( 'ebor-lato', $protocol . '://fonts.googleapis.com/css?family=Lato:300,400' );
		wp_enqueue_style( 'ebor-oswald', $protocol . '://fonts.googleapis.com/css?family=Oswald:300,400,700' );
		wp_enqueue_style( 'ebor-bootstrap', EBOR_THEME_DIRECTORY . 'style/css/bootstrap.css' );
		wp_enqueue_style( 'ebor-fonts', EBOR_THEME_DIRECTORY . 'style/css/fonts.css' );	
		wp_enqueue_style( 'ebor-plugins', EBOR_THEME_DIRECTORY . 'style/css/plugins.css' );	
		wp_enqueue_style( 'ebor-theme-styles', EBOR_THEME_DIRECTORY . 'style/css/theme' . $extension );
		wp_enqueue_style( 'ebor-style', get_stylesheet_uri() );
		
		//Enqueue Scripts
		wp_enqueue_script( 'ebor-bootstrap', EBOR_THEME_DIRECTORY . 'style/js/bootstrap.min.js', array('jquery'), false, true  );
		wp_enqueue_script( 'ebor-plugins', EBOR_THEME_DIRECTORY . 'style/js/plugins.js', array('jquery'), false, true  );
		wp_enqueue_script( 'ebor-scripts', EBOR_THEME_DIRECTORY . 'style/js/scripts.js', array('jquery'), false, true  );
		
		//Enqueue Comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		$logo = get_option('logo_height','22');
		$logoPlus = $logo + 33;
		
		$custom_css = '
			.logo.image-xxs {
				max-height: '. $logo .'px;
			}
			.nav-bar {
			    height: '. $logoPlus .'px;
			    max-height: '. $logoPlus .'px;
			    line-height: '. $logoPlus .'px;
			}
			@media all and (max-width: 990px) {
				.nav-bar {
					height: auto;
					max-height: '. $logoPlus .'px;
				}
				.nav-bar.nav-open {
					max-height: none;
				}
			}
		';
		
		$custom_css .= get_option('custom_css');
		
		//Add custom CSS ability
		wp_add_inline_style( 'ebor-style', $custom_css );
		
		/**
		 * localize script
		 */
		$script_data = array( 
			'access_token'       => get_option('instagram_token', ''),
			'client_id'          => get_option('instagram_client', '')
		);
		wp_localize_script( 'ebor-scripts', 'wp_data', $script_data );
		
	}
	add_action('wp_enqueue_scripts', 'somnus_load_scripts', 110);
}

/**
 * Ebor Load Admin Scripts
 * Properly Enqueues Scripts & Styles for the theme
 * 
 * @since version 1.0
 * @author TommusRhodus
 */
if(!( function_exists('somnus_admin_load_scripts') )){
	function somnus_admin_load_scripts(){
		wp_enqueue_style( 'ebor-theme-admin-css', EBOR_THEME_DIRECTORY . 'admin/ebor-theme-admin.css' );
		wp_enqueue_style( 'ebor-fonts', EBOR_THEME_DIRECTORY . 'style/css/fonts.css' );	
	}
	add_action('admin_enqueue_scripts', 'somnus_admin_load_scripts', 200);
}