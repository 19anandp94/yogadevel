<?php
	$col_1 = get_post_meta($post->ID, '_ebor_class_col_1', 1);
	$col_3 = get_post_meta($post->ID, '_ebor_class_col_3', 1);
	$tooltip = get_post_meta($post->ID, '_ebor_class_tooltip', 1);
	
	$tooltip = ( $tooltip ) ? htmlspecialchars('data-toggle="tooltip" data-placement="top" title="'. esc_attr($tooltip) .'"') : false;
?>

<tr id="class-<?php the_ID(); ?>" <?php echo htmlspecialchars_decode($tooltip); ?>>
	<td><?php echo esc_html($col_1); ?></td>
	<?php the_title('<td>', '</td>'); ?>
	<td><?php echo esc_html($col_3); ?></td>
	<td><a class="btn btn-white btn-filled mb0" href="<?php the_permalink(); ?>"><?php esc_html_e('View Details', 'somnus'); ?></a></td>
</tr>