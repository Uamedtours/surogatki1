<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'title' => array(
		'type'       => 'text',
		'value'      => '',
		'label'      => esc_html__( 'Progress Bar title', 'modelicom' ),
	),
	'percent' => array(
		'type'       => 'slider',
		'value'      => 80,
		'properties' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
		'label'      => esc_html__( 'Count To', 'modelicom' ),
		'desc'       => esc_html__( 'Choose percent to count to', 'modelicom' ),
	),
	'background_class' => array(
		'type'    => 'select',
		'value'   => 'progress-bar-success',
		'label'   => esc_html__( 'Context background color', 'modelicom' ),
		'desc'    => esc_html__( 'Select one of predefined background colors', 'modelicom' ),
		'choices' => array(
			'bg-maincolor' => esc_html__( 'Accent color', 'modelicom' ),
			'bg-maincolor2' => esc_html__( 'Accent color 2', 'modelicom' ),
			'bg-maincolor3' => esc_html__( 'Accent color 3', 'modelicom' ),
			'bg-maincolor4' => esc_html__( 'Accent color 4', 'modelicom' ),
			'bg-success' => esc_html__( 'Success', 'modelicom' ),
			'bg-info'    => esc_html__( 'Info', 'modelicom' ),
			'bg-warning' => esc_html__( 'Warning', 'modelicom' ),
			'bg-danger'  => esc_html__( 'Danger', 'modelicom' ),

		),
	),
);