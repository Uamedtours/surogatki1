<?php
if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$wide_button = ( ! empty( $atts['wide_button'] ) ? 'wide_button' : '' );
$small_button = ( ! empty( $atts['small_button'] ) ? 'small_button' : '' );
$custom_class = ( ! empty( $atts['custom_class'] ) ? $atts['custom_class'] : '' );
?>
<div class="button-wrap d-inline-block <?php echo esc_attr( $atts['item_offset'] ); ?>">
	<a href="<?php echo esc_attr( $atts['link'] ) ?>"
		target="<?php echo esc_attr( $atts['target'] ) ?>"
	   class="<?php echo esc_attr( $atts['color'] . ' ' . $wide_button . ' ' . $small_button . ' ' . $custom_class ); ?>">
		<span><?php echo esc_html( $atts['label'] ); ?></span>
	</a>
</div>
