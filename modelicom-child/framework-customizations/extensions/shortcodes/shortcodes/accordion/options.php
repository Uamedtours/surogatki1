<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'tabs' => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Panels', 'modelicom' ),
		'popup-title'   => esc_html__( 'Add/Edit Accordion Panels', 'modelicom' ),
		'desc'          => esc_html__( 'Create your accordion panels', 'modelicom' ),
		'template'      => '{{=tab_title}}',
		'popup-options' => array(
			'tab_title'          => array(
				'type'  => 'text',
				'label' => esc_html__( 'Title', 'modelicom' )
			),
			'title_size' => array(
				'type'    => 'select',
				'label'   => esc_html__('Title Font Size', 'modelicom'),
				'value'   => 'fs-20',
				'choices' => array(
					//12 14 16 18 20 24 28 32 36 40 56 68
					'' => esc_html__('Inherit', 'modelicom'),
					'fs-16' => esc_html__('16px', 'modelicom'),
					'fs-20' => esc_html__('20px', 'modelicom'),
					'fs-24' => esc_html__('24px', 'modelicom'),
					'fs-30' => esc_html__('36px', 'modelicom'),
					'fs-40' => esc_html__('40px', 'modelicom'),
					'fs-50' => esc_html__('48px', 'modelicom'),
					'fs-60' => esc_html__('56px', 'modelicom'),
				),
			),
			'title_weight'    => array(
				'type'    => 'select',
				'value'   => 'fw-300',
				'label'   => esc_html__( 'Title text weight', 'modelicom' ),
				'desc'    => esc_html__( 'Select a weight for your title', 'modelicom' ),
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
			'tab_content'        => array(
				'type'  => 'textarea',
				'label' => esc_html__( 'Content', 'modelicom' )
			),
			'tab_featured_image' => array(
				'type'        => 'upload',
				'value'       => '',
				'label'       => esc_html__( 'Panel Featured Image', 'modelicom' ),
				'image'       => esc_html__( 'Image for your panel.', 'modelicom' ),
				'help'        => esc_html__( 'It appears to the left from your content', 'modelicom' ),
				'images_only' => true,
			),
			'tab_icon'           => array(
				'type'  => 'icon',
				'label' => esc_html__( 'Icon in panel title', 'modelicom' ),
				'set'   => 'theme-fa-icons',
			),
		)
	),
	'small_accordion' => array(
		'type'         => 'switch',
		'value'        => '',
		'label'        => esc_html__( 'Small Accordion', 'modelicom' ),
		'desc'         => esc_html__( 'Decrease Accordion size', 'modelicom' ),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No', 'modelicom' ),
		),
		'right-choice' => array(
			'value' => 'small-accordion',
			'label' => esc_html__( 'Yes', 'modelicom' ),
		),
	),
	'with_line' => array(
		'type'         => 'switch',
		'value'        => '',
		'label'        => esc_html__( 'Big Line', 'modelicom' ),
		'desc'         => esc_html__( 'Increase the size of the line', 'modelicom' ),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No', 'modelicom' ),
		),
		'right-choice' => array(
			'value' => 'big-line',
			'label' => esc_html__( 'Yes', 'modelicom' ),
		),
	),
	'id'   => array( 'type' => 'unique' ),
);