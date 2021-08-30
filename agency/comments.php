<?php $comments = get_comments( array('post_id'=>get_the_ID(),'status'=>'approve'));?>
<div class="comments">
	<h5><?php echo get_comments_number($post->ID); ?> Comments</h5>
	<div class="navigation">
	    <?php paginate_comments_links(); ?> 
	</div>
	<ul>
	    <?php 
        if(count($comments)): 
        echo '<ol class="comment">';
        $comments = get_comments(array('post_id'=>$post->ID,'status'=>'approve'));
        wp_list_comments(array('per_page' =>-1,'reverse_top_level'=>false), $comments);
        echo '</ol>';
        else:
        ?>
        <p>There are no responses to this article, why not be the first? </p>
        <?php endif; ?>
	</ul>
	<div class="navigation">
	    <?php paginate_comments_links(); ?> 
	</div>
	<div id="respond" class="comment-respond">
	    <div class="row">
	        <div class="col-md-8">
	            <?php 
				$commenter = wp_get_current_commenter();
				$comments_args = array(
					'label_submit'=>'Post Comment',
					'title_reply'=>'Leave a Reply',
					'comment_form_top' => 'ds',
			        'comment_notes_before' => '',
			        'comment_notes_after' => '',
			        'class_submit' => 'submit btn btn-default',
				    'fields' => apply_filters(
				        'comment_form_default_fields', array(
				            'author' =>'<div class="comment-form-author form-group mb-4">' . '<input id="author" placeholder="Name *" name="author" type="text" class="form-control" value="'.esc_attr($commenter['comment_author']) . '" required/>'.'</div>',
				            'email'=>'<div class="comment-form-email form-group">' . '<input id="email" placeholder="Email *" name="email" type="text" class="form-control" value="'.esc_attr($commenter['comment_author_email']) .'" required/>' .'</div>',)
				    ),
				    'comment_field' => '<div class="comment-form-comment form-group mb-4">' .
				        '<textarea class="form-control" id="comment" name="comment" placeholder="Comments *" required></textarea>' .
				        '</div>',
				    'comment_notes_after' => '',
				);
				comment_form($comments_args); ?>
	        </div>
	    </div>
	</div>
</div>
