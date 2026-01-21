<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'heading_align' => array(
		'type'    => 'select',
		'value'   => 'text-left',
		'label'   => esc_html__( 'Text alignment', 'modelicom' ),
		'desc'    => esc_html__( 'Select heading text alignment', 'modelicom' ),
		'choices' => array(
			'text-left'    => esc_html__( 'Left', 'modelicom' ),
			'text-center'  => esc_html__( 'Center', 'modelicom' ),
			'text-right'   => esc_html__( 'Right', 'modelicom' ),
			'text-inherit' => esc_html__( 'Default', 'modelicom' ),
		),
	),
	'headings'      => array(
		'type'        => 'addable-box',
		'value'       => '',
		'label'       => esc_html__( 'Headings', 'modelicom' ),
		'desc'        => esc_html__( 'Choose a tag and text inside it', 'modelicom' ),
		'box-options' => array(
			'heading_tag'            => array(
				'type'    => 'select',
				'value'   => 'h3',
				'label'   => esc_html__( 'Heading tag', 'modelicom' ),
				'desc'    => esc_html__( 'Select a tag for your ', 'modelicom' ),
				'choices' => array(
					'h1' => esc_html__( 'H1 tag', 'modelicom' ),
					'h2' => esc_html__( 'H2 tag', 'modelicom' ),
					'h3' => esc_html__( 'H3 tag', 'modelicom' ),
					'h4' => esc_html__( 'H4 tag', 'modelicom' ),
					'h5' => esc_html__( 'H5 tag', 'modelicom' ),
					'h6' => esc_html__( 'H6 tag', 'modelicom' ),
					'p'  => esc_html__( 'P(small) tag', 'modelicom' ),
				),
			),
			'heading_text'           => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Heading text', 'modelicom' ),
				'desc'  => esc_html__( 'Text to appear in slide layer', 'modelicom' ),
			),
			'heading_text_color'     => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Heading text color', 'modelicom' ),
				'desc'    => esc_html__( 'Select a color for your text in layer', 'modelicom' ),
				'choices' => array(
					''           => esc_html__( 'Inherited', 'modelicom' ),
					'color-main'  => esc_html__( 'Accent color', 'modelicom' ),
					'color-main2' => esc_html__( 'Accent color 2', 'modelicom' ),
					'color-main3' => esc_html__( 'Accent color 3', 'modelicom' ),
					'color-main4' => esc_html__( 'Accent color 4', 'modelicom' ),
					'color-darkgrey'       => esc_html__( 'Dark grey color', 'modelicom' ),
					'color-light'      => esc_html__( 'Light color', 'modelicom' ),
					'color-dark'      => esc_html__( 'Dark color', 'modelicom' ),
				),
			),
			'heading_text_weight'    => array(
				'type'    => 'select',
				'value'   => 'fw-400',
				'label'   => esc_html__( 'Heading text weight', 'modelicom' ),
				'desc'    => esc_html__( 'Select a weight for your text in layer', 'modelicom' ),
				'choices' => array(
					'fw-100' => esc_html__( 'Extra Thin', 'modelicom' ),
					'fw-200' => esc_html__( 'Thin', 'modelicom' ),
					'fw-300' => esc_html__( 'Light', 'modelicom' ),
					'fw-400' => esc_html__( 'Regular', 'modelicom' ),
					'fw-500' => esc_html__( 'Medium', 'modelicom' ),
					'fw-700' => esc_html__( 'Semi Bold', 'modelicom' ),
					'bold'   => esc_html__( ' Bold', 'modelicom' ),

				),
			),
			'heading_text_transform' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Heading text transform', 'modelicom' ),
				'desc'    => esc_html__( 'Select a weight for your text in layer', 'modelicom' ),
				'choices' => array(
					''                => esc_html__( 'None', 'modelicom' ),
					'text-lowercase'  => esc_html__( 'Lowercase', 'modelicom' ),
					'text-uppercase'  => esc_html__( 'Uppercase', 'modelicom' ),
					'text-capitalize' => esc_html__( 'Capitalize', 'modelicom' ),
				),
			),
			'heading_text_style' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Heading text style', 'modelicom' ),
				'desc'    => esc_html__( 'Select a style for your text in layer', 'modelicom' ),
				'choices' => array(
					''                => esc_html__( 'Normal', 'modelicom' ),
					'font-italic'  => esc_html__( 'Italic', 'modelicom' ),
				),
			),
			'heading_bottom_margin' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Heading Bottom Margin', 'modelicom' ),
				'desc'    => esc_html__( 'Select a heading bottom margin', 'modelicom' ),
				'choices' => array(
					''          => esc_html__( 'default', 'modelicom' ),
					'mb-0'      => esc_html__( '0px', 'modelicom' ),
					'mb-10'     => esc_html__( '10px', 'modelicom' ),
					'mb-20'     => esc_html__( '20px', 'modelicom' ),
					'mb-30'     => esc_html__( '30px', 'modelicom' ),
					'mb-40'     => esc_html__( '40px', 'modelicom' ),
					'mb-50'     => esc_html__( '50px', 'modelicom' ),
					'mb-60'     => esc_html__( '60px', 'modelicom' ),
				),
			),
			'item_offset' => array(
				'label'   => esc_html__( 'Item Offset', 'modelicom' ),
				'type'    => 'select',
				'value'   => '',
				'choices' => array(
					''  => 'Default',
					'offset-left' => 'Left Offset',
					'offset-right' => 'Right Offset'
				)
			),
			'rotate_heading'  => array(
				'type'         => 'switch',
				'value'        => '',
				'label'        => esc_html__( 'Rotate Heading', 'modelicom' ),
				'desc'         => esc_html__( 'Transform heading to left', 'modelicom' ),
				'left-choice'  => array(
					'value' => '',
					'label' => esc_html__( 'No', 'modelicom' ),
				),
				'right-choice' => array(
					'value' => 'rotate-heading',
					'label' => esc_html__( 'Yes', 'modelicom' ),
				),
			),
			'heading_custom_class' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Heading custom class', 'modelicom' ),
				'desc'  => esc_html__( 'Add heading custom css class', 'modelicom' ),
			),
		),
		'template'    => '{{- heading_text }}',
	)
);
