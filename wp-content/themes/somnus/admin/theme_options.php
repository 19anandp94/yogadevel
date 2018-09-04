<?php 

/**
 * Build theme options
 * Uses the Ebor_Options class found in the ebor-framework plugin
 * Panels are WP 4.0+!!!
 * 
 * @since 1.0.0
 * @author tommusrhodus
 */
if( class_exists('Ebor_Options') ){
	$ebor_options = new Ebor_Options;
	
	/**
	 * Variables
	 */
	$theme = wp_get_theme();
	$theme_name = $theme->get( 'Name' );
	$footer_default = '<a href="http://www.tommusrhodus.com">Somnus Premium WordPress Theme by TommusRhodus</a>';
	
	$social_options = somnus_get_icons();
	foreach( $social_options as $social ){
		$new_social_options[$social] = ucfirst(str_replace('ti-', '', $social));	
	}

	/**
	 * Default stuff
	 * 
	 * Each of these is a default option that appears in each theme, demo data, favicons and a custom css input
	 * 
	 * @since 1.0.0
	 * @author tommusrhodus
	 */
	$ebor_options->add_panel( $theme_name . ': Demo Data', 5, '');
	$ebor_options->add_panel( $theme_name . ': Styling Settings', 205, 'All of the controls in this section directly relate to the styling page of ' . $theme_name);
	$ebor_options->add_section('demo_data_section', 'Import Demo Data', 10, $theme_name . ': Demo Data', '<strong>Please read this before importing demo data via this control:</strong><br /><br />The demo data this will install includes images from my demo site with <strong>heavy blurring applied</strong> this is due to licensing restrictions. Simply replace these images with your own.<br /><br />Note that this process can take up to 15mins on slower servers, go make a cup of tea. If you havn\'t had a notification in 30mins, use the fallback method outlined in the written documentation.<br /><br />');
	$ebor_options->add_section('custom_css_section', 'Custom CSS', 40, $theme_name . ': Styling Settings');
	$ebor_options->add_setting('demo_import', 'demo_import', 'Import Demo Data', 'demo_data_section', '', 10);
	$ebor_options->add_setting('textarea', 'custom_css', 'Custom CSS', 'custom_css_section', '', 30);
	
	
	$ebor_options->add_panel( $theme_name . ': Header Settings', 215, 'All of the controls in this section directly relate to the header and logos of ' . $theme_name);
	$ebor_options->add_section('logo_settings_section', 'Logo Settings', 10, $theme_name . ': Header Settings');
	$ebor_options->add_section('sub_header_layout_section', 'Sub Header Settings', 10, $theme_name . ': Header Settings', 'This setting controls the theme header site-wide. If you need to you can override this setting on specific posts and pages from within that posts edit screen.');
	$ebor_options->add_setting('image', 'custom_logo', 'Logo', 'logo_settings_section', EBOR_THEME_DIRECTORY . 'style/img/logo-dark.png', 5);
	$ebor_options->add_setting('range', 'logo_height', 'Logo Height (22 Default)(in pixels)', 'logo_settings_section', '22', 15, array('min' => '0', 'max' => '100', 'step' => '1'));
	
	//Header Texts
	$ebor_options->add_setting('input', 'header_address', 'Utility Header Address', 'sub_header_layout_section', '68 Cardamon Place, Melbourne Vic 3000', 20);
	$ebor_options->add_setting('input', 'header_email', 'Utility Header Email', 'sub_header_layout_section', 'hello@somnus.net', 25);
	
	$ebor_options->add_panel( $theme_name . ': Footer Settings', 290, 'All of the controls in this section directly relate to the control of the footer within ' . $theme_name);
	$ebor_options->add_section('subfooter_settings_section', 'Sub-Footer Settings', 30, $theme_name . ': Footer Settings');
	$ebor_options->add_section('footer_social_settings_section', 'Footer Icons Settings', 40, $theme_name . ': Footer Settings', 'These social icons are only shown in certain footer layouts.');
	$ebor_options->add_setting('textarea', 'copyright', 'Copyright Message', 'subfooter_settings_section', $footer_default, 20);
	
	$ebor_options->add_section('classes_section', $theme_name . ': Class Settings', 10, false);
	$ebor_options->add_setting('input', 'timetable_title', 'Timetable Subtitle', 'classes_section', 'Timetable', 15);
	$ebor_options->add_setting('image', 'timetable_header_image', 'Timetable Header Background', 'classes_section', '', 20);
	
	$ebor_options->add_section('footer_newsletter_section', 'Newsletter Settings', 10, $theme_name . ': Footer Settings');
	$ebor_options->add_setting('input', 'footer_newsletter_title', 'Footer Newsletter Area Title', 'footer_newsletter_section', 'Newsletter', 15);
	$ebor_options->add_setting('input', 'footer_newsletter_subtitle', 'Footer Newsletter Area Subtitle', 'footer_newsletter_section', 'Studio Updates & New Timetables Weekly', 20);
	$ebor_options->add_setting('input', 'footer_newsletter_shortcode', 'Contact Form 7 Shortcode', 'footer_newsletter_section', '', 25);
	
	$ebor_options->add_section('footer_cta_section', 'CTA Settings', 15, $theme_name . ': Footer Settings');
	$ebor_options->add_setting('input', 'footer_cta_title', 'Footer CTA Title', 'footer_cta_section', 'Ready to find your center?', 15);
	$ebor_options->add_setting('input', 'footer_cta_subtitle', 'Footer CTA Subtitle', 'footer_cta_section', 'Or Contact Us for more info', 20);
	$ebor_options->add_setting('input', 'footer_cta_subtitle_url', 'Footer CTA Subtitle URL', 'footer_cta_section', '', 25);
	$ebor_options->add_setting('input', 'footer_cta_button', 'Footer CTA Button Text', 'footer_cta_section', 'Become A Member', 30);
	$ebor_options->add_setting('input', 'footer_cta_button_url', 'Footer CTA Button URL', 'footer_cta_section', '', 35);
	
	/**
	 * Instagram API Stuff
	 */
	$ebor_options->add_section('instagram_api_section', $theme_name . ': Instagram Settings', 340, false, '<code>IMPORTANT NOTE:</code> This is the Instagram setup section for the theme, it requires an Access Token and Client ID.<br /><br />Due to how Instagram have set their API you have to register as a developer with Instagram for this to work.<br /><br />For setup details, <a href="https://tommusrhodus.ticksy.com/article/7566" target="_blank">please read this</a>');
	$ebor_options->add_setting('input', 'instagram_token', 'Instagram Access Token', 'instagram_api_section', '', 5);
	$ebor_options->add_setting('input', 'instagram_client', 'Instagram Client ID', 'instagram_api_section', '', 10);
	
	//Footer Icons
	for( $i = 1; $i < 5; $i++ ){
		$ebor_options->add_setting('select', 'footer_social_icon_' . $i, 'Footer Social Icon ' . $i, 'footer_social_settings_section', 'none', 20 + $i + $i, $new_social_options);
		$ebor_options->add_setting('input', 'footer_social_url_' . $i, 'Footer Social URL ' . $i, 'footer_social_settings_section', '', 21 + $i + $i);
	}
	
	//Header icons
	for( $i = 1; $i < 5; $i++ ){
		$ebor_options->add_setting('select', 'header_social_icon_' . $i, 'Header Social Icon ' . $i, 'sub_header_layout_section', 'none', 30 + $i + $i, $new_social_options);
		$ebor_options->add_setting('input', 'header_social_url_' . $i, 'Header Social URL ' . $i, 'sub_header_layout_section', '', 31 + $i + $i);
	}

}