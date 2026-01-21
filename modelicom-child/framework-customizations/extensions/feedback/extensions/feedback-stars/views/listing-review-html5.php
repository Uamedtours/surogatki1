<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * Output a review in the HTML5 format.
 *
 * @var object $comment Comment to display.
 * @var int $depth Depth of comment.
 * @var array $args An array of arguments.
 * @var bool $has_children
 * @var int $stars_number
 * @var int $rate
 */
$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
?>
<<?php echo esc_attr( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $has_children ? 'parent' : '' ); ?>>
<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
	<div class="comment-text">
		<div class="comment-metadata">
			<?php if(!empty($rate)) : ?>
				<span class="wrap-rating">
						<span class="rating">
							<?php
							for ( $i = 1; $i <= $stars_number; $i ++ ) {
								$voted = ( $i <= round( $rate ) ) ? ' voted' : '';
								echo '<span class="fa fa-star' . $voted . '" data-vote="' . $i . '"></span>';
							}
							?>
						</span>
					</span>
			<?php endif; ?>
			<!--/Rating-->
			<div class="comment-meta">
				<span class="author_url">
					<?php echo '<span class="fn color-main small-text">' . get_comment_author_link() . '</span>'; ?>
				</span>
				<span class="comment-date">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php printf( __( '%1$s', 'modelicom'), get_comment_date('d.m.Y'), get_comment_time() );
							?>
						</time>
					</a>
				</span>
				<!--Rating-->
			</div>
		</div>
		<!-- .comment-metadata -->

		<?php if ( '0' == $comment->comment_approved ) : ?>
			<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'modelicom' ); ?></p>
		<?php endif; ?>
		<!--	</footer>-->
		<!-- .comment-meta -->

		<div class="comment-content">
			<?php comment_text(); ?>
		</div>
		<!-- .comment-content -->

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array(
				'add_below' => 'div-comment',
				'depth'     => $depth,
				'max_depth' => $args['max_depth']
			) ) ); ?>
			<?php
			$edit_add_text = comments_open() ? ' | ' : '';
			edit_comment_link( esc_html__( $edit_add_text . 'Edit', 'modelicom' ), '<span class="edit-link">', '</span>' ); ?>
		</div>
		<!-- .reply -->
	</div> <!--comment-text -->
</article><!-- .comment-body -->