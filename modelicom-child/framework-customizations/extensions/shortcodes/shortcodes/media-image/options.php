<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'image'            => array(
		'type'  => 'upload',
		'label' => esc_html__( 'Choose Image', 'modelicom' ),
		'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'modelicom' )
	),
	'size'             => array(
		'type'    => 'group',
		'options' => array(
			'width'  => array(
				'type'  => 'text',
				'label' => esc_html__( 'Width', 'modelicom' ),
				'desc'  => esc_html__( 'Set image width', 'modelicom' ),
				'value' => 300
			),
			'height' => array(
				'type'  => 'text',
				'label' => esc_html__( 'Height', 'modelicom' ),
				'desc'  => esc_html__( 'Set image height', 'modelicom' ),
				'value' => 200
			)
		)
	),
	'image_animation' => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Animation type', 'modelicom' ),
		'desc'    => esc_html__( 'Select one of predefined animations', 'modelicom' ),
		'choices' => modelicom_unyson_option_animations(),
	),
	'with_bg' => array(
		'type'         => 'switch',
		'value'        => '',
		'label'        => esc_html__( 'Show background color', 'modelicom' ),
		'desc'         => esc_html__( 'Show or hide gre background on image', 'modelicom' ),
		'right-choice' => array(
			'value' => '',
			'label' => esc_html__( 'no', 'modelicom' ),
		),
		'left-choice'  => array(
			'value' => 'with-bg',
			'label' => esc_html__( 'Yes', 'modelicom' ),
		),
	),
	'image-link-group' => array(
		'type'    => 'group',
		'options' => array(
			'link'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Image Link', 'modelicom' ),
				'desc'  => esc_html__( 'Where should your image link to?', 'modelicom' )
			),
			'target' => array(
				'type'         => 'switch',
				'label'        => esc_html__( 'Open Link in New Window', 'modelicom' ),
				'desc'         => esc_html__( 'Select here if you want to open the linked page in a new window', 'modelicom' ),
				'right-choice' => array(
					'value' => '_blank',
					'label' => esc_html__( 'Yes', 'modelicom' ),
				),
				'left-choice'  => array(
					'value' => '_self',
					'label' => esc_html__( 'No', 'modelicom' ),
				),
			),
		)
	)
);

