<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'items'         => array(
		'type'            => 'addable-popup',
		'value'           => '',
		'label'           => esc_html__( 'Carousel items', 'modelicom' ),
		'popup-options'     => array(
			'video' => array(
				'type'        => 'upload',
				'value'       => '',
				'label'       => esc_html__( 'Video', 'modelicom' ),
				'images_only' => false,
			),
			'image' => array(
				'type'        => 'upload',
				'value'       => '',
				'label'       => esc_html__( 'Poster Image', 'modelicom' ),
				'images_only' => true,
			),
			'video_width' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Video Width on large screens', 'modelicom' ),
			),
			'video_height' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Video Height on large screens', 'modelicom' ),
			),
		),
		'template'        => '{{=video.url}}',
		'limit'           => 0, // limit the number of boxes that can be added
		'add-button-text' => esc_html__( 'Add', 'modelicom' ),
		'sortable'        => true,
	),
	'title' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Title', 'modelicom' ),
	),
	'loop'          => array(
		'type'         => 'switch',
		'value'        => 'false',
		'label'        => esc_html__( 'Loop carousel', 'modelicom' ),
		'left-choice'  => array(
			'value' => 'false',
			'label' => esc_html__( 'No', 'modelicom' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Yes', 'modelicom' ),
		),
	),
	'nav'           => array(
		'type'         => 'switch',
		'value'        => 'false',
		'label'        => esc_html__( 'Show Nav', 'modelicom' ),
		'left-choice'  => array(
			'value' => 'false',
			'label' => esc_html__( 'No', 'modelicom' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Yes', 'modelicom' ),
		),
	),
	'dots'          => array(
		'type'         => 'switch',
		'value'        => 'false',
		'label'        => esc_html__( 'Show Dots', 'modelicom' ),
		'left-choice'  => array(
			'value' => 'false',
			'label' => esc_html__( 'No', 'modelicom' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Yes', 'modelicom' ),
		),
	),
	'center'        => array(
		'type'         => 'switch',
		'value'        => 'false',
		'label'        => esc_html__( 'Center carousel', 'modelicom' ),
		'left-choice'  => array(
			'value' => 'false',
			'label' => esc_html__( 'No', 'modelicom' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Yes', 'modelicom' ),
		),
	),
	'autoplay'      => array(
		'type'         => 'switch',
		'value'        => 'false',
		'label'        => esc_html__( 'Autoplay', 'modelicom' ),
		'left-choice'  => array(
			'value' => 'false',
			'label' => esc_html__( 'No', 'modelicom' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Yes', 'modelicom' ),
		),
	),
	'responsive_lg' => array(
		'type'        => 'select',
		'value'       => '4',
		'label'       => esc_html__( 'Items count on ', 'modelicom' ) . '<' . esc_html__( '1200px', 'modelicom' ),
		'choices'     => array(
			'4' => '4',
			'3' => '3',
			'2' => '2',
			'5' => '5',
			'6' => '6',
			'7' => '7',
			'8' => '8',
			'9' => '9',
			'1' => '1',

		),
		'no-validate' => false,
	),
	'responsive_md' => array(
		'type'        => 'select',
		'value'       => '4',
		'label'       => esc_html__( 'Items count on 992px-1200px', 'modelicom' ),
		'choices'     => array(
			'3' => '3',
			'4' => '4',
			'2' => '2',
			'5' => '5',
			'6' => '6',
			'1' => '1',

		),
		'no-validate' => false,
	),
	'responsive_sm' => array(
		'type'        => 'select',
		'value'       => '3',
		'label'       => esc_html__( 'Items count on 768px-992px', 'modelicom' ),
		'choices'     => array(
			'3' => '3',
			'2' => '2',
			'1' => '1',
			'4' => '4',
			'5' => '5',
			'6' => '6',

		),
		'no-validate' => false,
	),
	'responsive_xs' => array(
		'type'        => 'select',
		'value'       => '2',
		'label'       => esc_html__( 'Items count on ', 'modelicom' ) . '>' . esc_html__( '768px', 'modelicom' ),
		'choices'     => array(
			'2' => '2',
			'1' => '1',
			'3' => '3',
			'4' => '4',
			'5' => '5',
			'6' => '6',

		),
		'no-validate' => false,
	),
	'margin'        => array(
		'type'        => 'select',
		'value'       => '30',
		'label'       => esc_html__( 'Margin between items', 'modelicom' ),
		'choices'     => array(
			'30' => '30px',
			'0'  => '0px',
			'5'  => '5px',
			'10' => '10px',
			'15' => '15px',
			'20' => '20px',

		),
		'no-validate' => false,
	),

);