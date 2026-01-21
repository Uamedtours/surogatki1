<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'tab_main_options' => array(
		'type' => 'tab',
		'title' => esc_html__('Main Options', 'modelicom'),
		'options' => array(
			'column_align'     => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Text alignment in column', 'modelicom' ),
				'desc'    => esc_html__( 'Select text alignment inside your column', 'modelicom' ),
				'choices' => array(
					''            => esc_html__( 'Inherit', 'modelicom' ),
					'text-left'   => esc_html__( 'Left', 'modelicom' ),
					'text-center' => esc_html__( 'Center', 'modelicom' ),
					'text-right'  => esc_html__( 'Right', 'modelicom' ),
				),
			),
			'column_padding'   => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Column padding', 'modelicom' ),
				'desc'    => esc_html__( 'Select optional internal column paddings', 'modelicom' ),
				'choices' => array(
					''     => esc_html__( 'No padding', 'modelicom' ),
					'p-10' => esc_html__( '10px', 'modelicom' ),
					'p-15' => esc_html__( '15px', 'modelicom' ),
					'p-20' => esc_html__( '20px', 'modelicom' ),
					'p-30' => esc_html__( '30px', 'modelicom' ),
					'p-40' => esc_html__( '40px', 'modelicom' ),
					'p-50' => esc_html__( '50px', 'modelicom' ),
					'p-60' => esc_html__( '60px', 'modelicom' ),

				),
			),
			'column_height' => array(
				'type'         => 'switch',
				'value'        => '',
				'label'        => esc_html__( 'Column Height', 'modelicom' ),
				'desc'    => esc_html__( 'Makes a column with height 100%', 'modelicom' ),
				'right-choice'  => array(
					'value' => '',
					'label' => esc_html__( 'no', 'modelicom' ),
				),
				'left-choice' => array(
					'value' => 'h-100',
					'label' => esc_html__( 'yes', 'modelicom' ),
				),
			),
			'background_color' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Background color', 'modelicom' ),
				'desc'    => esc_html__( 'Select background color', 'modelicom' ),
				'help'    => esc_html__( 'Select one of predefined background types', 'modelicom' ),
				'choices' => modelicom_unyson_option_get_backgrounds_array(),
			),
			'column_animation' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Animation type', 'modelicom' ),
				'desc'    => esc_html__( 'Select one of predefined animations', 'modelicom' ),
				'choices' => modelicom_unyson_option_animations(),
			),
			'column_additional_class' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Additional CSS class', 'modelicom' ),
				'desc'  => esc_html__( 'Add your custom CSS class to column. Useful for Customization', 'modelicom' ),
			),
		),
	),
	'tab_responsive' => array(
		'type' => 'tab',
		'title' => esc_html__('Responsive', 'modelicom'),
		'options' => array(
			'responsive_alignment' => array(
				'type' => 'tab',
				'title' => esc_html__('Alignment', 'modelicom'),
				'options' => array(
					'text_align_sm' => array(
						'type'    => 'select',
						'value'   => '',
						'label'   => esc_html__( 'Text align above 576px screen', 'modelicom' ),
						'choices' => array(
							''   => esc_html__( 'Inherit', 'modelicom' ),
							'text-sm-left'   => esc_html__( 'Left', 'modelicom' ),
							'text-sm-center' => esc_html__( 'Center', 'modelicom' ),
							'text-sm-right'  => esc_html__( 'Right', 'modelicom' ),
						),
					),
					'text_align_md' => array(
						'type'    => 'select',
						'value'   => '',
						'label'   => esc_html__( 'Text align above 768px screen', 'modelicom' ),
						'choices' => array(
							''   => esc_html__( 'Inherit', 'modelicom' ),
							'text-md-left'   => esc_html__( 'Left', 'modelicom' ),
							'text-md-center' => esc_html__( 'Center', 'modelicom' ),
							'text-md-right'  => esc_html__( 'Right', 'modelicom' ),
						),
					),
					'text_align_lg' => array(
						'type'    => 'select',
						'value'   => '',
						'label'   => esc_html__( 'Text align above 992px screen', 'modelicom' ),
						'choices' => array(
							''   => esc_html__( 'Inherit', 'modelicom' ),
							'text-lg-left'   => esc_html__( 'Left', 'modelicom' ),
							'text-lg-center' => esc_html__( 'Center', 'modelicom' ),
							'text-lg-right'  => esc_html__( 'Right', 'modelicom' ),
						),
					),
					'text_align_xl' => array(
						'type'    => 'select',
						'value'   => '',
						'label'   => esc_html__( 'Text align above 1200px screen', 'modelicom' ),
						'choices' => array(
							''   => esc_html__( 'Inherit', 'modelicom' ),
							'text-xl-left'   => esc_html__( 'Left', 'modelicom' ),
							'text-xl-center' => esc_html__( 'Center', 'modelicom' ),
							'text-xl-right'  => esc_html__( 'Right', 'modelicom' ),
						),
					),
				),
			),
			'responsive_visibility' => array(
				'type' => 'tab',
				'title' => esc_html__('Visibility', 'modelicom'),
				'options' => modelicom_unyson_option_responsive_options_array(),
			),
		),
	),
);
