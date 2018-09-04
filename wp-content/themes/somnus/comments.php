<?php
	/**
	 * comments.php
	 * @author TommusRhodus
	 * @since 1.0.0
	 */
	$custom_comment_form = array(
		'fields' => apply_filters( 'comment_form_default_fields', array(
		    'author' => '<input type="text" id="author" name="author" placeholder="' . esc_attr__('Name *','somnus') . '" value="' . esc_attr( $commenter['comment_author'] ) . '" />',
		    'email'  => '<input name="email" type="text" id="email" placeholder="' . esc_attr__('Email *','somnus') . '" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" />',
		    'url'    => '<input name="url" type="text" id="url" placeholder="' . esc_attr__('Website','somnus') . '" value="' . esc_attr(  $commenter['comment_author_url'] ) . '" />')
		),
		'comment_field' => '<textarea name="comment" placeholder="' . esc_attr__('Your Comment Here','somnus') . '" id="comment" aria-required="true" rows="3"></textarea>',
		'cancel_reply_link' => esc_html__( 'Cancel' , 'somnus' ),
		'comment_notes_before' => '',
		'comment_notes_after' => '',
		'label_submit' => esc_html__( 'Submit' , 'somnus' )
	);

	if( have_comments() ){
		echo '<hr /><ul id="singlecomments" class="comments-list">';
		wp_list_comments('type=comment&callback=somnus_custom_comment');
		echo '</ul>';
	}
	paginate_comments_links();
?>

<hr>

<?php comment_form($custom_comment_form); ?>
