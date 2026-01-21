<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'contacts_list' => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Contacts', 'modelicom' ),
		'popup-title'   => esc_html__( 'Add/Edit Contact', 'modelicom' ),
		'template'      => '{{=title}}',
		'popup-options' => array(
			'title'       => array(
				'type'  => 'text',
				'value'   => '',
				'label' => esc_html__( 'Title', 'modelicom' ),
			),
			'desc'       => array(
				'type'  => 'textarea',
				'value'   => '',
				'label' => esc_html__( 'Description', 'modelicom' ),
			),
		),
	),
);