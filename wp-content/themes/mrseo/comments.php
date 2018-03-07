<?php if ( post_password_required() ) { ?>
	<p class="eltdf-no-password"><?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'mrseo' ); ?></p>
<?php 
return;
} ?>
<?php if ( comments_open() || get_comments_number()) { ?>
	<div class="eltdf-comment-holder clearfix" id="comments">
		<div class="eltdf-comment-holder-inner">
			<div class="eltdf-comments-title">
				<h5><?php comments_number( esc_html__('No Comments','mrseo'), '1 '.esc_html__('Comment','mrseo'), '% '.esc_html__('Comments','mrseo')); ?></h5>
			</div>
			<div class="eltdf-comments">
				<?php if ( have_comments() ) : ?>
					<ul class="eltdf-comment-list">
						<?php wp_list_comments(array( 'callback' => 'mrseo_elated_comment')); ?>
					</ul>
				<?php endif; ?>

				<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
					<p class="eltdf-comment-form-closed"><?php esc_html_e('Sorry, the comment form is closed at this time.', 'mrseo'); ?></p>
				<?php endif; ?>	
			</div>
		</div>
	</div>
	<?php
	$eltdf_commenter = wp_get_current_commenter();
	$eltdf_req = get_option( 'require_name_email' );
	$eltdf_aria_req = ( $eltdf_req ? " aria-required='true'" : '' );

	$eltdf_args = array(
		'id_form' => 'commentform',
		'id_submit' => 'submit_comment',
		'title_reply'=> esc_html__( 'Post a comment','mrseo' ),
		'title_reply_before' => '<h5 id="reply-title" class="comment-reply-title">',
		'title_reply_after' => '</h5>',
		'title_reply_to' => esc_html__( 'Post a Reply to %s','mrseo' ),
		'cancel_reply_link' => esc_html__( 'cancel reply','mrseo' ),
		'label_submit' => esc_html__( 'SUBMIT','mrseo' ),
		'comment_field' => '<textarea id="comment" placeholder="'.esc_html__( 'Your comment','mrseo' ).'" name="comment" cols="45" rows="6" aria-required="true"></textarea>',
		'comment_notes_before' => '',
		'comment_notes_after' => '',
		'fields' => apply_filters( 'comment_form_default_fields', array(
			'author' => '<div class="eltdf-grid-row eltdf-grid-tiny-gutter"><div class="eltdf-grid-col-6"><input id="author" name="author" placeholder="'. esc_html__( 'Your Name','mrseo' ) .'" type="text" value="' . esc_attr( $eltdf_commenter['comment_author'] ) . '"' . $eltdf_aria_req . ' /></div>',
			'email' => '<div class="eltdf-grid-col-6"><input id="email" name="email" placeholder="'. esc_html__( 'Your Email','mrseo' ) .'" type="text" value="' . esc_attr(  $eltdf_commenter['comment_author_email'] ) . '"' . $eltdf_aria_req . ' /></div></div>'
			 ) ) );
	 ?>
	<?php if(get_comment_pages_count() > 1){ ?>
		<div class="eltdf-comment-pager">
			<p><?php paginate_comments_links(); ?></p>
		</div>
	<?php } ?>
	<div class="eltdf-comment-form">
		<div class="eltdf-comment-form-inner">
			<?php comment_form($eltdf_args); ?>
		</div>
	</div>
<?php } ?>	