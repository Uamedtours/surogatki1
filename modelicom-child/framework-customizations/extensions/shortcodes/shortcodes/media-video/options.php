<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'url'    => array(
		'type'  => 'text',
		'label' => __( 'Insert Video URL', 'modelicom' ),
		'desc'  => __( 'Insert Video URL to embed this video', 'modelicom' )
	),
	'width'  => array(
		'type'  => 'text',
		'label' => __( 'Video Width', 'modelicom' ),
		'desc'  => __( 'Enter a value for the width', 'modelicom' ),
		'value' => 300
	),
	'height' => array(
		'type'  => 'text',
		'label' => __( 'Video Height', 'modelicom' ),
		'desc'  => __( 'Enter a value for the height', 'modelicom' ),
		'value' => 200
	),
	'image'            => array(
		'type'  => 'upload',
		'label' => __( 'Background Image', 'modelicom' ),
		'desc'  => __( 'Either upload a new, or choose an existing image from your media library', 'modelicom' )
	),
	'background_overlay' => array(
		'type'  => 'switch',
		'value'        => 'v-overlay',
		'label' => esc_html__( 'Background Color Overlay', 'modelicom' ),
		'help'    => esc_html__( 'Adds semitransparent color overlay on video', 'modelicom' ),
		'left-choice'  => array(
			'value' => 'v-overlay',
			'label' => esc_html__( 'Yes', 'modelicom' ),
		),
		'right-choice' => array(
			'value' => '',
			'label' => esc_html__( 'No', 'modelicom' ),
		),
	),
	'show_pattern'  => array(
		'type'         => 'switch',
		'value'        => 'v-pattern',
		'label'        => esc_html__( 'Show Pattern', 'modelicom' ),
		'desc'         => esc_html__( 'Hide or show background items on video', 'modelicom' ),
		'left-choice'  => array(
			'value' => 'v-pattern',
			'label' => esc_html__( 'Yes', 'modelicom' ),

		),
		'right-choice' => array(
			'value' => '',
			'label' => esc_html__( 'No', 'modelicom' ),
		),
	),
);
