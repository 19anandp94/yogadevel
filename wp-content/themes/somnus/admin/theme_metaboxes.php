<?php 

/**
 * Build theme metaboxes
 * Uses the cmb metaboxes class found in the ebor framework plugin
 * More details here: https://github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress
 * 
 * @since 1.0.0
 * @author tommusrhodus
 */
if(!( function_exists('somnus_custom_metaboxes') )){
	function somnus_custom_metaboxes( $meta_boxes ) {
		
		/**
		 * Setup variables
		 */
		$prefix = '_ebor_';
		
		$meta_boxes[] = array(
			'id' => 'timetable_metabox',
			'title' => esc_html__('Timetable View Details', 'somnus'),
			'object_types' => array('class'), // post type
			'context' => 'normal',
			'priority' => 'high',
			'show_names' => true, // Show field names on the left
			'fields' => array(
				array(
					'name' => esc_html__('Column 1 Details', 'somnus'),
					'desc' => esc_html__('Enter detail for column 1 of timetable (default is time)', 'somnus'),
					'id'   => $prefix . 'class_col_1',
					'type' => 'text',
				),
				array(
					'name' => esc_html__('Column 3 Details', 'somnus'),
					'desc' => esc_html__('Enter detail for column 3 of timetable (default is teacher name)(Column 2 is post title)', 'somnus'),
					'id'   => $prefix . 'class_col_3',
					'type' => 'text',
				),
				array(
					'name' => esc_html__('Tooltip Details', 'somnus'),
					'desc' => esc_html__('(Optional) Enter tooltip details for hover', 'somnus'),
					'id'   => $prefix . 'class_tooltip',
					'type' => 'text',
				),
			)
		);
		
		$meta_boxes[] = array(
			'id' => 'social_metabox',
			'title' => __('Team Member Details', 'somnus'),
			'object_types' => array('team'), // post type
			'context' => 'normal',
			'priority' => 'high',
			'show_names' => true, // Show field names on the left
			'fields' => array(
				array(
					'name' => esc_html__('Job Title', 'somnus'),
					'desc' => esc_html__('(Optional) Enter a Job Title for this Team Member', 'somnus'),
					'id'   => $prefix . 'the_job_title',
					'type' => 'text',
				),
				array(
					'name' => esc_html__('Team Email', 'somnus'),
					'desc' => esc_html__('(Optional) Enter an email address for this Team Member', 'somnus'),
					'id'   => $prefix . 'the_email',
					'type' => 'text',
				),
			)
		);
		
		return $meta_boxes;
	}
	add_filter( 'cmb2_meta_boxes', 'somnus_custom_metaboxes' );
}