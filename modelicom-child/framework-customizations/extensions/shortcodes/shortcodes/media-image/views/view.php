<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

if ( empty( $atts['image'] ) ) {
	return;
}

$width  = ( is_numeric( $atts['width'] ) && ( $atts['width'] > 0 ) ) ? $atts['width'] : '';
$height = ( is_numeric( $atts['height'] ) && ( $atts['height'] > 0 ) ) ? $atts['height'] : '';
$class  = ( ! empty( $atts['image_animation'] ) && $atts['image_animation'] ) ? ' animate' : '';
$image_animation = ( ! empty( $atts['image_animation'] ) && $atts['image_animation'] ) ?  'data-delay="400"' . 'data-animation="' . esc_attr( $atts['image_animation'] ) . '"' : '';

if ( ! empty( $width ) && ! empty( $height ) ) {
	$image = fw_resize( $atts['image']['attachment_id'], $width, $height, true );
} else {
	$image = $atts['image']['url'];
}

$alt = get_post_meta($atts['image']['attachment_id'], '_wp_attachment_image_alt', true);

$img_attributes = array(
	'src' => $image,
	'alt' => $alt ? $alt : $image
);

if(!empty($width)){
	$img_attributes['width'] = $width;
}

if(!empty($height)){
	$img_attributes['height'] = $height;
}

if ( empty( $atts['link'] ) ) {
	echo '<div class="img-wrap '. $atts['with_bg'] .'">';
	echo '<div class="animations '. $class .'" ' . wp_kses_post( $image_animation) . '>';
	echo fw_html_tag('img', $img_attributes);
	echo '</div>';
	echo '</div>';
} else {
	echo '<div class="img-wrap">';
	echo '<div class="animations '. $class .'" ' . wp_kses_post( $image_animation) . '>';
	echo fw_html_tag('a', array(
		'href' => $atts['link'],
		'target' => $atts['target'],
	), fw_html_tag('img',$img_attributes));
	echo '</div>';
	echo '</div>';
}
