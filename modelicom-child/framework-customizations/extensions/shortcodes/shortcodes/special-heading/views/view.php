<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var $atts
 */

if ( ! $atts['headings'] ) {
	return;
}

foreach ( $atts['headings'] as $key => $heading ) :
	$heading_text_color = !empty($heading['heading_text_color']) ? $heading['heading_text_color'] : '';
	$heading_text_weight = !empty($heading['heading_text_weight']) ? $heading['heading_text_weight'] : '';
	$heading_text_transform = !empty($heading['heading_text_transform']) ? $heading['heading_text_transform'] : '';
	$heading_custom_class = !empty($heading['heading_custom_class']) ? $heading['heading_custom_class'] : '';
	$item_offset = !empty($heading['item_offset']) ? $heading['item_offset'] : '';
	$heading_text_style = !empty($heading['heading_text_style']) ? $heading['heading_text_style'] : '';
	$heading_bottom_margin = !empty($heading['heading_bottom_margin']) ? $heading['heading_bottom_margin'] : '';
	$rotate_heading = !empty($heading['rotate_heading']) ? $heading['rotate_heading'] : '';
	$class = '';
	//for headings
	if ( $heading['heading_tag'] !== 'p' ) :
		$class .= 'special-heading';
	else:
		$class .= 'special-heading fs-12';
	endif;

	?>
	<<?php echo esc_html( $heading['heading_tag'] ); ?> class="<?php echo esc_attr( $class . ' ' . $atts['heading_align'] . ' ' .$heading_custom_class . ' ' . $item_offset  . ' ' . $heading_bottom_margin   . ' ' . 			$rotate_heading); ?>">
	<span class="d-inline-block <?php echo esc_attr( trim (
			$heading_text_color
			. ' ' .
			$heading_text_weight
			. ' ' .
			$heading_text_transform
			. ' ' .
			$heading_text_style

		)
	);
	?>">
		<?php echo wp_kses_post( $heading['heading_text'] ) ?>
	</span>
	</<?php echo esc_html( $heading['heading_tag'] ); ?>>
<?php endforeach; ?>