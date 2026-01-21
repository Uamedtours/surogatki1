<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'social_icons' => array(
		'type'            => 'addable-popup',
		'value'           => '',
		'label'           => esc_html__( 'Social Buttons', 'modelicom' ),
		'desc'            => esc_html__( 'Optional social buttons', 'modelicom' ),
		'template'        => '{{=icon}}',
		'popup-options'     => array(
			'icon'       => array(
				'type'  => 'icon',
				'label' => esc_html__( 'Social Icon', 'modelicom' ),
				'set'   => 'social-icons',
			),
			'icon_class' => array(
				'type'        => 'select',
				'value'       => '',
				'label'       => esc_html__( 'Icon type', 'modelicom' ),
				'desc'        => esc_html__( 'Select one of predefined social button types', 'modelicom' ),
				'choices'     => array(
					''                                    => esc_html__( 'Default', 'modelicom' ),
					'border-icon'                         => esc_html__( 'Simple Bordered Icon', 'modelicom' ),
					'border-icon rounded-icon'            => esc_html__( 'Rounded Bordered Icon', 'modelicom' ),
					'bg-icon'                             => esc_html__( 'Simple Background Icon', 'modelicom' ),
					'bg-icon rounded-icon'                => esc_html__( 'Rounded Background Icon', 'modelicom' ),
					'color-icon bg-icon'                  => esc_html__( 'Color Light Background Icon', 'modelicom' ),
					'color-icon bg-icon rounded-icon'     => esc_html__( 'Color Light Background Rounded Icon', 'modelicom' ),
					'dark-icon bg-icon rounded-icon'      => esc_html__( 'Light Background Rounded Dark Icon', 'modelicom' ),
					'color-icon'                          => esc_html__( 'Color Icon', 'modelicom' ),
					'color-icon border-icon'              => esc_html__( 'Color Bordered Icon', 'modelicom' ),
					'color-icon border-icon rounded-icon' => esc_html__( 'Rounded Color Bordered Icon', 'modelicom' ),
					'color-bg-icon'                       => esc_html__( 'Color Background Icon', 'modelicom' ),
					'color-bg-icon rounded-icon'          => esc_html__( 'Rounded Color Background Icon', 'modelicom' ),

				),
				/**
				 * Allow save not existing choices
				 * Useful when you use the select to populate it dynamically from js
				 */
				'no-validate' => false,
			),
			'show_icon' => array(
				'type'         => 'switch',
				'value'        => '',
				'label'        => esc_html__( 'Hide Icon', 'modelicom' ),
				'desc'         => esc_html__( 'Show or hide icon', 'modelicom' ),
				'left-choice'  => array(
					'value' => '',
					'label' => esc_html__( 'No', 'modelicom' ),
				),
				'right-choice' => array(
					'value' => 'hide-icon',
					'label' => esc_html__( 'Yes', 'modelicom' ),
				),
			),
			'icon_title'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Icon Title', 'modelicom' ),
				'desc'  => esc_html__( 'Provide a Title to your icon', 'modelicom' ),
			),
			'icon_url'   => array(
				'type'  => 'text',
				'value' => '#',
				'label' => esc_html__( 'Icon Link', 'modelicom' ),
				'desc'  => esc_html__( 'Provide a URL to your icon', 'modelicom' ),
			)
		),
		'limit'           => 0, // limit the number of boxes that can be added
		'add-button-text' => esc_html__( 'Add', 'modelicom' ),
		'sortable'        => true,
	)
);