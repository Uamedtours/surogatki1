<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$button         = fw_ext( 'shortcodes' )->get_shortcode( 'button' );
$button_options = $button->get_options();

$options = array(
	'tab_main' => array(
		'type' => 'tab',
		'title' => esc_html__('Info', 'modelicom'),
		'options' => array(
			'title'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Pricing plan title', 'modelicom' ),
			),
			'description'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Plan description', 'modelicom' ),
			),
			'currency'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Currency Sign', 'modelicom' ),
			),
			'price'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Whole price', 'modelicom' ),
				'desc' => esc_html__( 'Price before decimal divider', 'modelicom' ),
			),
			'price_after'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Text after price', 'modelicom' ),
				'desc' => esc_html__( 'Price after decimal divider, including divider (dot, coma etc.), for example ".99", or text "per month"', 'modelicom' ),
			),
			'features'         => array(
				'type'            => 'addable-box',
				'value'           => '',
				'label'           => esc_html__( 'Pricing plan features', 'modelicom' ),
				'box-options'     => array(
					'feature_name'   => array(
						'type'  => 'text',
						'value' => '',
						'label' => esc_html__( 'Feature name', 'modelicom' ),
					),
					'feature_checked' => array(
						'type'        => 'select',
						'value'       => '',
						'label'       => esc_html__( 'Default, checked or unchecked', 'modelicom' ),
						'choices'     => array(
							'default' => esc_html__( 'Default', 'modelicom' ),
							'enabled' => esc_html__( 'Enabled', 'modelicom' ),
							'disabled' => esc_html__( 'Disabled', 'modelicom'),
						),
						'no-validate' => false,
					),
				),
				'template'        => '{{=feature_name}}',
				'limit'           => 0, // limit the number of boxes that can be added
				'add-button-text' => esc_html__( 'Add', 'modelicom' ),
				'sortable'        => true,
			),
			'featured' => array(
				'type'  => 'switch',
				'value' => '',
				'label' => esc_html__('Default or featured plan', 'modelicom'),
				'left-choice' => array(
					'value' => '',
					'label' => esc_html__(' Default', 'modelicom'),
				),
				'right-choice' => array(
					'value' => 'plan-featured',
					'label' => esc_html__(' Featured', 'modelicom'),
				),
			),
			'layout' => array(
				'label'   => esc_html__('Choose layout', 'modelicom'),
				'type'    => 'select',
				'value'   => '1',
				'choices' => array(
					'1'  => esc_html__('Default', 'modelicom'),
					'2' => esc_html__('Second', 'modelicom'),
					'3' => esc_html__('Third', 'modelicom'),
				),
			)
		),
	),
	'tab_button' => array(
		'type' => 'tab',
		'options' => array(
			'price_buttons'     => array(
				'type'        => 'addable-box',
				'value'       => '',
				'label'       => esc_html__( 'Price Buttons', 'modelicom' ),
				'desc'        => esc_html__( 'Add a button, to price table', 'modelicom' ),
				'template'    => 'Button',
				'box-options' => array(
					$button_options
				),
				'limit'           => 1, // limit the number of boxes that can be added
				'add-button-text' => esc_html__( 'Add', 'modelicom' ),
			),
		),
		'title' => esc_html__('Button', 'modelicom'),
	),


);