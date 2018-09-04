<?php

/**
 * Load Theme Support on Init
 */
if(!( function_exists('somnus_add_editor_styles') )){
	function somnus_add_editor_styles() {
		
		/**
		 * Add WP Editor Styling
		 */
	    add_editor_style( 'admin/editor-style.css' );
	    
	    /**
	     * Set Content Width
	     */
	    global $content_width;
	    if ( ! isset( $content_width ) ) $content_width = 1170;
	    
	}
	add_action( 'init', 'somnus_add_editor_styles', 10 );
}

/**
 * Load Theme Support after_theme_setup
 */
if(!( function_exists('somnus_add_theme_support') )){
	function somnus_add_theme_support() {
		
		/**
		 * Add post thumbnail (featured image) support
		 */
		add_theme_support( 'post-thumbnails' );
		
		/**
		 * Image Sizes used in the theme
		 */
		add_image_size( 'admin-list-thumb', 60, 60, true );

		/**
		 * Add Custom Background Support and Set Default
		 */
		add_theme_support( 'custom-background', array( 'default-color' => '#f9fafb' ) );
		
		/**
		 * Add feed link support
		 */
		add_theme_support( 'automatic-feed-links' );
		
		/**
		 * Add html5 support
		 */
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form' ) );
		
		/**
		 * Load Translation Files
		 */
		load_theme_textdomain('somnus', trailingslashit(get_template_directory()) . 'languages');
		
		add_theme_support( 'title-tag' );
		
	}
	add_action('after_setup_theme', 'somnus_add_theme_support', 10 );
}