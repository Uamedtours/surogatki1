<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Portfolio - extended item layout
 */

//wrapping in div for carousel layout
?>
<div class="vertical-item content-padding padding-small hero-bg text-center">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="item-media">
			<?php
			$full_image_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
			the_post_thumbnail('modelicom-full-width');
			?>
			<div class="media-links">
				<a class="abs-link" href="<?php the_permalink(); ?>"></a>
			</div>
		</div>
	<?php endif; //has_post_thumbnail ?>
	<div class="item-content">
		<h6 class="item-title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h6>
		<?php
		modelicom_the_categories( array(
			'items_separator' => ' ',
		) );
		modelicom_the_excerpt( array(
			'length' => 15,
			'before' => '<div class="portfolio-excerpt my-30">',
			'after'  => '</div>',
			'more'  => '',
		) );
		?>
		<div class="item-button">
			<a href="<?php the_permalink(); ?>" class="btn btn-outline-darkgrey">
				<?php esc_html_e( 'Learn More', 'modelicom' ); ?>
			</a>
		</div>
	</div>
</div><!-- eof vertical-item -->
