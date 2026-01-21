<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * The template for displaying Reviews
 *
 * The area of the page that contains reviews and the review form.
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the reviews.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<ul class="nav nav-tabs" role="tablist">
		<li class="nav-item">
			<a href="#tab-comments" id="tab-comments-link" role="tab" data-toggle="tab" class="nav-link active">
				<?php
					esc_html_e( 'Reviews ', 'modelicom' );
					echo wp_kses_post( '<span class="comments-count">(' . get_comments_number() . ')</span>' );
				?>
			</a>
		</li>
		<li class="nav-item">
			<a href="#tab-comment-form" id="tab-comment-form-link" role="tab" data-toggle="tab" class="nav-link">
				<?php esc_html_e( 'Leave feedback', 'modelicom' ); ?>
			</a>
		</li>
	</ul>
	<div class="tab-content small-tabs">
			<div class="tab-pane active" id="tab-comments" role="tabpanel" aria-labelledby="tab-comments-link">
				<?php if ( have_comments() ) : ?>

				<h2 class="comments-title">
					<?php
					printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'modelicom' ),
						number_format_i18n( get_comments_number() ), get_the_title() );
					?>
				</h2>

				<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
					<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
						<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'modelicom' ); ?></h1>

						<div
								class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'modelicom' ) ); ?></div>
						<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'modelicom' ) ); ?></div>
					</nav><!-- #comment-nav-above -->
				<?php endif; // Check for comment navigation. ?>

				<ol class="comment-list">
					<?php
					wp_list_comments( array(
						'walker'      => fw_ext_feedback_get_listing_walker(),
						'style'       => 'ol',
						'short_ping'  => true,
						'avatar_size' => 34,
					) );
					?>
				</ol><!-- .comment-list -->

				<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
					<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
						<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'modelicom' ); ?></h1>

						<div
								class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'modelicom' ) ); ?></div>
						<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'modelicom' ) ); ?></div>
					</nav><!-- #comment-nav-below -->
				<?php endif; // Check for comment navigation. ?>

				<?php if ( ! comments_open() ) : ?>
					<p class="no-comments"><?php _e( 'Comments are closed.', 'modelicom' ); ?></p>
				<?php endif; ?>
			<?php
				else: // have_comments()
				esc_html_e( 'No reviews yet', 'modelicom' );
			endif; // have_comments()
			?>
		</div><!-- .eof tab-pane -->
		<div class="tab-pane fade" role="tabpanel" aria-labelledby="tab-comment-form-link" id="tab-comment-form">
			<?php
			global $user_identity;
			$form_class = is_user_logged_in() ? ' logged-in' : ' not-logged-in';

			$args = array(
				'comment_field'        => '<div class="form-group comment-form-comment"><label for="comment">' . esc_html_x( 'Comment', 'noun', 'modelicom' ) . '</label> <textarea id="comment"  class="form-control" name="comment" cols="45" rows="6"  aria-required="true" required="required"  placeholder="' . esc_attr__( 'Message', 'modelicom' ) . '"></textarea></div>',

				'logged_in_as'         => '<p class="logged-in-as">' .
										  sprintf(
										  /* translators: 1: edit user link, 2: accessibility text, 3: user name, 4: logout URL */
											  '<a href="%1$s" aria-label="%2$s">' . esc_html__( 'Logged in as %3$s', 'modelicom' ) . '</a>. <a href="%4$s">' . esc_html__( 'Log out?', 'modelicom' ) . '</a>',
											  get_edit_user_link(),
											  /* translators: %s: user name */
											  esc_attr( sprintf( esc_html__( 'Logged in as %s. Edit your profile.', 'modelicom' ), $user_identity ) ),
											  $user_identity,
											  wp_logout_url( apply_filters( 'the_permalink', get_permalink( get_the_ID() ) ) )
										  ) . '</p>',
				'comment_notes_before' => '',
				'class_form'           => 'comment-form form-wrapper feedback-form' . $form_class,
				'cancel_reply_link'    => esc_html__( 'Cancel reply', 'modelicom' ),
				'label_submit'         => esc_html__( 'Send', 'modelicom' ),
				'title_reply'          => '',
				'title_reply_before'   => '',
				'title_reply_after'    => '',
				'submit_button'        => '<input name="%1$s" type="submit" id="%2$s"  class="btn btn-maincolor small_button %3$s" value="%4$s" />',
				'submit_field'         => '<div class="wrap-forms wrap-forms-buttons mt-10 mt-lg-35 mb-1"><div class="form-group">%1$s %2$s</div></div>',
				'format'               => 'html5',
				'fields'               =>  array(
					'author'  => '<p class="comment-form-author">' . '<label for="author">' . esc_html__( 'Name', 'modelicom' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
					             '<input id="author" name="author" type="text"  class="form-control" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245"  placeholder="' . esc_html__( 'Name', 'modelicom' ) . '"/></p>',
					'email'   => '',
					),
			);
			comment_form( $args );
			?>
		</div>
	</div>
</div><!-- #comments -->
