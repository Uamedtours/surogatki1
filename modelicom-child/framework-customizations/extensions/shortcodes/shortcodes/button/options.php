<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'label'       => array(
		'label' => esc_html__( 'Button Label', 'modelicom' ),
		'desc'  => esc_html__( 'This is the text that appears on your button', 'modelicom' ),
		'type'  => 'text',
		'value' => esc_html__('Submit', 'modelicom' ),
	),
	'link'        => array(
		'label' => esc_html__( 'Button Link', 'modelicom' ),
		'desc'  => esc_html__( 'Where should your button link to', 'modelicom' ),
		'type'  => 'text',
		'value' => '#'
	),
	'target'      => array(
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
	'color'       => array(
		'label'   => esc_html__( 'Button Color', 'modelicom' ),
		'desc'    => esc_html__( 'Choose a type for your button', 'modelicom' ),
		'value'   => 'btn btn-maincolor',
		'type'    => 'select',
		'choices' => array(
			'btn btn-maincolor'                  => esc_html__( 'Main Color', 'modelicom' ),
			'btn btn-maincolor2'                 => esc_html__( 'Main Color 2', 'modelicom' ),
			'btn btn-darkgrey'                   => esc_html__( 'Dark Color', 'modelicom' ),
			'btn btn-outline-maincolor'          => esc_html__( 'Outline Main Color', 'modelicom' ),
			'btn btn-outline-maincolor2'         => esc_html__( 'Outline Main Color 2', 'modelicom' ),
			'btn btn-outline-pink'               => esc_html__( 'Outline Pink Color', 'modelicom' ),
			'btn btn-outline-darkgrey'           => esc_html__( 'Outline Dark Color', 'modelicom' ),
			'btn-link'                           => esc_html__( 'Pink link', 'modelicom' ),
			'btn-link2'                          => esc_html__( 'Pink link 2', 'modelicom' ),
			'btn-link-dark'                      => esc_html__( 'Dark link', 'modelicom' ),

		)
	),
	'wide_button' => array(
		'type'  => 'switch',
		'label' => esc_html__( 'Wide Button', 'modelicom' ),
		'desc'  => esc_html__( 'Switch to create wider button', 'modelicom' ),
	),
	'small_button' => array(
		'type'  => 'switch',
		'label' => esc_html__( 'Small Button', 'modelicom' ),
		'desc'  => esc_html__( 'Switch to create small button', 'modelicom' ),
	),
	'item_offset' => array(
		'label'   => esc_html__( 'Item Offset', 'modelicom' ),
		'type'    => 'select',
		'inline'  => true,
		'value'   => 'default',
		'choices' => array(
			'default'  => 'Default',
			'offset-left' => 'Left Offset',
			'offset-right' => 'Right Offset'
		),
	),
	'custom_class' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Button custom class', 'modelicom' ),
		'desc'  => esc_html__( 'Add button custom css class', 'modelicom' ),
	),
);