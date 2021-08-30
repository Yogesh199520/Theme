<div class="col-md-6" id="comments">
	<?php if (post_password_required()) : ?>
	<p><?php _e( 'Post is password protected. Enter the password to view any comments.', 'slicemytheme' ); ?></p>
	<?php return; endif; ?>
	
	<?php if (have_comments()) : ?>
	<h4 class="no-mar"><?php comments_number(); ?></h4>
	<ul class="comments">
		<?php wp_list_comments('type=comment&callback=slicemythemecomments'); // Custom callback in functions.php ?>
	</ul>
	<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
	<p><?php _e( 'Comments are closed here.', 'slicemytheme' ); ?></p>
	<?php endif; the_comments_navigation(); ?>
</div>
<div class="col-md-6">
<?php $args = array(
		'fields' => apply_filters(
			'comment_form_default_fields', array(
				'author' =>'<p class="comment-form-author form-group">' . '<label>Name*</label>' . '<input id="author" placeholder="" name="author" type="text" required="required" class="form-control" value="' .
					esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />'.'</p>'
					,
				'email'  => '<p class="comment-form-email  form-group">' .  '<label>Email*</label>' .'<input id="email" placeholder="" name="email"  class="form-control" type="email" required="required" value="' . esc_attr(  $commenter['comment_author_email'] ) .
					'" size="30"' . $aria_req . ' />' . '</p>',
				'url'    => '<p class="comment-form-url form-group">' .'<label>Website</label>' .
				 '<input id="url" name="url" placeholder="" type="text"  class="form-control" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /> ' .  '</p>'
			)
		),
		'comment_field' => '<p class="comment-form-comment form-group">' .'<label>Message*</label>' .
			'<textarea id="comment" name="comment" required="required" placeholder="" class="form-control" aria-required="true"></textarea>' .
			'</p>',
	    'comment_notes_after' => '',
	    'class_submit' => 'btn btn-default' ,
		'title_reply'          => __( 'Leave your Comments','slicemytheme' ),
			'title_reply_to'       => __( 'Leave a Reply to %s','slicemytheme' ),
			'cancel_reply_link'    => __( 'Cancel reply','slicemytheme' ),
	);  	
comment_form($args, $post_id); ?>
</div>