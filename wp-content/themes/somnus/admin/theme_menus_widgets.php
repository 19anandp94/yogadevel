<?php 

/**
 * Register Menu Locations For The Theme
 * 
 * @since 1.0.0
 * @author tommusrhodus
 */
if(!( function_exists('somnus_register_nav_menus') )){
	function somnus_register_nav_menus() {
		register_nav_menus( 
			array(
				'primary-right'  => esc_html__('Standard Navigation Left', 'somnus' ),
				'primary'  => esc_html__('Standard Navigation Right', 'somnus' )
			) 
		);
	}
	add_action( 'init', 'somnus_register_nav_menus' );
}

if(!( function_exists('somnus_register_sidebars') )){
	function somnus_register_sidebars() {
	
		register_sidebar( 
			array(
				'id' => 'primary',
				'name' => esc_html__('Blog Sidebar', 'somnus' ),
				'description' => esc_html__('Widgets to be displayed in the blog sidebar.', 'somnus' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<div class="ribbon mb24"><h6 class="uppercase mb0">',
				'after_title' => '</h6></div>'
			) 
		);
		
	}
	add_action( 'widgets_init', 'somnus_register_sidebars' );
}