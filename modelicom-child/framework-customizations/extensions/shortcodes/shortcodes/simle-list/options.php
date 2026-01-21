<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

	$options = array(
		'simple_list' => array(
			'type'          => 'addable-popup',
			'label'         => esc_html__( 'List items', 'modelicom' ),
			'popup-title'   => esc_html__( 'Add/Edit item', 'modelicom' ),
			'template'      => '{{=list_item}}',
			'popup-options' => array(
				'list_item'       => array(
					'type'  => 'text',
					'value'   => '',
					'label' => esc_html__( 'List item', 'modelicom' ),
				),
				'item_link' => array(
					'type'  => 'text',
					'value' => '',
					'label' => esc_html__( 'Item link', 'modelicom' ),
				),
			),
		),
		'simple_list_type'    => array(
			'type'    => 'select',
			'value'   => 'list1',
			'label'   => esc_html__( 'List type', 'modelicom' ),
			'desc'    => esc_html__( 'Select a style for list', 'modelicom' ),
			'choices' => array(
				'list-styled' => esc_html__( 'Style 1', 'modelicom' ),
				'list-styled2' => esc_html__( 'Style 2', 'modelicom' ),
			),
		),
		'item_offset' => array(
			'label'   => esc_html__( 'Item Offset', 'modelicom' ),
			'type'    => 'select',
			'inline'  => true,
			'value'   => '',
			'choices' => array(
				''  => 'Default',
				'offset-left' => 'Left Offset',
				'offset-right' => 'Right Offset'
			)
		),
		'custom_class' => array(
			'type'  => 'text',
			'value' => '',
			'label' => esc_html__( 'Custom class', 'modelicom' ),
			'desc'  => esc_html__( 'Add custom css class', 'modelicom' ),
		),
	);