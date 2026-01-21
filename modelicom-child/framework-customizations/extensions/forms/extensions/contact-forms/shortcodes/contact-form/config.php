<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Contact form', 'modelicom' ),
	'description' => esc_html__( 'Build contact forms', 'modelicom' ),
	'tab'         => esc_html__( 'Content Elements', 'modelicom' ),
	'popup_size'  => 'large',
	'type'        => 'special'
);