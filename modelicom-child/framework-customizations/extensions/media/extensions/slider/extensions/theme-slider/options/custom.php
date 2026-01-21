<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$button         = fw_ext( 'shortcodes' )->get_shortcode( 'button' );
$button_options = $button->get_options();
$button_options['button_animation'] = array(
	'type'    => 'select',
	'value'   => 'fadeIn',
	'label'   => esc_html__( 'Animation type', 'modelicom' ),
	'desc'    => esc_html__( 'Select one of predefined animations', 'modelicom' ),
	'choices' => modelicom_unyson_option_animations(),
);

$events_box_options_event_options = array();
//if events extension is active and if our custom events extension class exists
if( class_exists( 'Modelicom_Unyson_Events_Extends' ) && ( ! empty( fw_ext( 'events' ) ) ) ) {
	$events_box_options_event_options['next_event'] = array(
		'type'  => 'switch',
		'value' => false,
		'label' => esc_html__('Add next event counter below layer', 'modelicom'),
		'left-choice' => array(
			'value' => false,
			'label' => esc_html__(' No', 'modelicom'),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__(' Yes', 'modelicom'),
		),
	);
}

$options = array(
	'slide_background' => array(
		'type'        => 'select',
		'value'       => 'ls',
		'label'       => esc_html__( 'Slide background', 'modelicom' ),
		'desc'        => esc_html__( 'Select slide background color', 'modelicom' ),
		'choices'     => array(
			'ls'    => esc_html__( 'Light', 'modelicom' ),
			'ls ms' => esc_html__( 'Light Muted', 'modelicom' ),
			'ds'    => esc_html__( 'Dark', 'modelicom' ),
			'ds ms' => esc_html__( 'Dark Muted', 'modelicom' ),
			'cs'    => esc_html__( 'Color', 'modelicom' ),
		),
		/**
		 * Allow save not existing choices
		 * Useful when you use the select to populate it dynamically from js
		 */
		'no-validate' => false,
	),
	'slide_align'      => array(
		'type'        => 'select',
		'value'       => 'text-left',
		'label'       => esc_html__( 'Slide text alignment', 'modelicom' ),
		'desc'        => esc_html__( 'Select slide text alignment', 'modelicom' ),
		'choices'     => array(
			'text-left'   => esc_html__( 'Left', 'modelicom' ),
			'text-center' => esc_html__( 'Center', 'modelicom' ),
			'text-right'  => esc_html__( 'Right', 'modelicom' ),
		),
		/**
		 * Allow save not existing choices
		 * Useful when you use the select to populate it dynamically from js
		 */
		'no-validate' => false,
	),
	'slide_vertical_align'      => array(
		'type'        => 'select',
		'value'       => '',
		'label'       => esc_html__( 'Slide vertical alignment', 'modelicom' ),
		'desc'        => esc_html__( 'Select vertcial alignment for slider layers', 'modelicom' ),
		'choices'     => array(
			''   => esc_html__( 'Middle (default)', 'modelicom' ),
			'intro_text_top' => esc_html__( 'Top', 'modelicom' ),
			'intro_text_bottom'  => esc_html__( 'Bottom', 'modelicom' ),
		),
		/**
		 * Allow save not existing choices
		 * Useful when you use the select to populate it dynamically from js
		 */
		'no-validate' => false,
	),
	'slide_layers'     => array(
		'type'        => 'addable-box',
		'value'       => '',
		'label'       => esc_html__( 'Slide Layers', 'modelicom' ),
		'desc'        => esc_html__( 'Choose a tag and text inside it', 'modelicom' ),

		'box-options' => array_merge( array(
			'layer_tag'            => array(
				'type'    => 'select',
				'value'   => 'h3',
				'label'   => esc_html__( 'Layer tag', 'modelicom' ),
				'desc'    => esc_html__( 'Select a tag for your ', 'modelicom' ),
				'choices' => array(
					'h3' => esc_html__( 'H3 tag', 'modelicom' ),
					'h2' => esc_html__( 'H2 tag', 'modelicom' ),
					'h4' => esc_html__( 'H4 tag', 'modelicom' ),
					'p'  => esc_html__( 'P tag', 'modelicom' ),

				),
			),
			'layer_animation'      => array(
				'type'    => 'select',
				'value'   => 'fadeIn',
				'label'   => esc_html__( 'Animation type', 'modelicom' ),
				'desc'    => esc_html__( 'Select one of predefined animations', 'modelicom' ),
				'choices' => modelicom_unyson_option_animations(),
			),
			'layer_text'           => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Layer text', 'modelicom' ),
				'desc'  => esc_html__( 'Text to appear in slide layer', 'modelicom' ),
			),
			'layer_text_color'     => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Layer text color', 'modelicom' ),
				'desc'    => esc_html__( 'Select a color for your text in layer', 'modelicom' ),
				'choices' => array(
					''           => esc_html__( 'Inherited', 'modelicom' ),
					'color-main'  => esc_html__( 'First theme main color', 'modelicom' ),
					'color-main2' => esc_html__( 'Second theme main color', 'modelicom' ),
					'color-darkgrey'       => esc_html__( 'Dark grey theme color', 'modelicom' ),
					'color-dark'      => esc_html__( 'Dark theme color', 'modelicom' ),

				),
			),
			'layer_text_weight'    => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Layer text weight', 'modelicom' ),
				'desc'    => esc_html__( 'Select a weight for your text in layer', 'modelicom' ),
				'choices' => array(
					''     => esc_html__( 'Normal', 'modelicom' ),
					'bold' => esc_html__( 'Bold', 'modelicom' ),
					'thin' => esc_html__( 'Thin', 'modelicom' ),

				),
			),
			'layer_text_transform' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Layer text transform', 'modelicom' ),
				'desc'    => esc_html__( 'Select a text transformation for your layer', 'modelicom' ),
				'choices' => array(
					''                => esc_html__( 'None', 'modelicom' ),
					'text-lowercase'  => esc_html__( 'Lowercase', 'modelicom' ),
					'text-uppercase'  => esc_html__( 'Uppercase', 'modelicom' ),
					'text-capitalize' => esc_html__( 'Capitalize', 'modelicom' ),

				),
			),
			'class' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Additional Layer CSS class', 'modelicom' ),
			), $events_box_options_event_options )
		),
		'template'    => esc_html__( 'Slider Layer', 'modelicom' ),
		'limit'           => 5, // limit the number of boxes that can be added
		'add-button-text' => esc_html__( 'Add', 'modelicom' ),
	),
	'class'           => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Additional Slide CSS class', 'modelicom' ),
	),
	'button' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'value'   => false,
		'picker'  => array(
			'show_button' => array(
				'type'         => 'switch',
				'label'        => esc_html__( 'Show button', 'modelicom' ),
				'left-choice'  => array(
					'value' => '',
					'label' => esc_html__( 'No', 'modelicom' ),
				),
				'right-choice' => array(
					'value' => 'button',
					'label' => esc_html__( 'Yes', 'modelicom' ),
				),
			),
		),
		'choices' => array(
			''       => array(),
			'button' => $button_options,
		),
	),
);