<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


// add paypal menu under contact form 7 menu
add_action( 'admin_menu', 'cf7pp_admin_menu', 20 );
function cf7pp_admin_menu() {
	add_submenu_page('wpcf7',__( 'PayPal & Stripe Settings', 'contact-form-7' ),__( 'PayPal & Stripe Settings', 'contact-form-7' ),'wpcf7_edit_contact_forms', 'cf7pp_admin_table','cf7pp_admin_table');
}


// plugin page links
add_filter('plugin_action_links', 'cf7pp_plugin_settings_link', 10, 2 );
function cf7pp_plugin_settings_link($links,$file) {
	
	if ($file == 'contact-form-7-paypal-add-on/paypal.php') {
		
		$settings_link = 	'<a href="admin.php?page=cf7pp_admin_table">' . __('Settings', 'PTP_LOC') . '</a>';
		$premium_link = 	'<a target="_blank" href="https://wpplugin.org/downloads/contact-form-7-paypal-add-on/">' . __('Pro Version', 'PTP_LOC') . '</a>';
		
		array_unshift($links, $settings_link);
		array_push($links, $premium_link);
	}
	
	return $links; 
}