<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Shortcode Posts - title item layout
 */

$terms          = get_the_terms( get_the_ID(), 'category' );
$filter_classes = '';
foreach ( $terms as $term ) {
	$filter_classes .= ' filter-' . $term->slug;
}

//wrapping in div for carousel layout
?>
<article class="widget_blog-post-item <?php echo esc_attr( $filter_classes ); ?>">
	<div <?php post_class( "vertical-item gallery-title-item" ); ?>>
		<?php if ( get_the_post_thumbnail() ) : ?>
			<div class="item-media">
				<?php
				$full_image_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
				echo get_the_post_thumbnail('','modelicom-small-width',''); ?>
				<div class="media-links">
						<a class="abs-link" href="<?php the_permalink(); ?>"></a>
				</div>
			</div>
		<?php endif; //eof thumbnail check ?>
		<div class="item-content">
			<div class="item-title text-center">
				<div class="entry-date">
					<span class="bg-maincolor small-text"><?php echo get_the_date(); ?></span>
				</div>
				<h5 class="mt-15 lh-1">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h5>
			</div>
		</div><!-- eof item-content -->
	</div>
</article><!-- eof blog-post-item -->