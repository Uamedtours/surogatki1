<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

global $wp_embed;

$width  = ( is_numeric( $atts['width'] ) && ( $atts['width'] > 0 ) ) ? $atts['width'] : '300';
$height = ( is_numeric( $atts['height'] ) && ( $atts['height'] > 0 ) ) ? $atts['height'] : '200';
$iframe = $wp_embed->run_shortcode( '[embed  width="' . $width . '" height="' . $height . '"]' . trim( $atts['url'] ) . '[/embed]' );
?>


<div class="video-wrapper shortcode-container <?php echo esc_attr( $atts['show_pattern'] . ' ' . $atts['background_overlay'] ); ?> ">
	<?php if ( empty($atts['image'] ) ) : ?>
		<?php echo do_shortcode( $iframe ); ?>
	<?php else: ?>
		<div class="embed-responsive embed-responsive-16by9">
			<a href="" data-iframe="<?php echo esc_attr( $iframe ) ?>" class="photoswipe-link embed-placeholder">
				<?php if (!empty($atts['image'])) : ?>
					<img src="<?php echo  esc_attr($atts['image']['url']) ?>" alt="background" class="embed-responsive-item wp-post-image">
				<?php endif;?>
			</a>
		</div>
	<?php endif; ?>
</div>
