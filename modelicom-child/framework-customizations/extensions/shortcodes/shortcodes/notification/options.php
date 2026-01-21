<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'message' => array(
		'label' => esc_html__( 'Message', 'modelicom' ),
		'desc'  => esc_html__( 'Notification message', 'modelicom' ),
		'type'  => 'textarea',
		'value' => esc_html__( 'Message!', 'modelicom' ),
	),
	'type'    => array(
		'label'   => esc_html__( 'Type', 'modelicom' ),
		'desc'    => esc_html__( 'Notification type', 'modelicom' ),
		'type'    => 'select',
		'choices' => array(
			'success' => esc_html__( 'Congratulations', 'modelicom' ),
			'info'    => esc_html__( 'Information', 'modelicom' ),
			'warning' => esc_html__( 'Alert', 'modelicom' ),
			'danger'  => esc_html__( 'Error', 'modelicom' ),
		)
	),
);