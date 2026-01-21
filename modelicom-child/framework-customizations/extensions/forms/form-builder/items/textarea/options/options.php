<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'rows_number' => array(
		'type' => 'short-text',
		'value' => '7',
		'label' => esc_html__( 'Number of rows', 'modelicom' ),
		'desc' => esc_html__( 'Select number of rows for textarea', 'modelicom' ),
	),
	'icon'       => array(
		'type'  => 'icon',
		'label' => esc_html__( 'Icon', 'modelicom' ),
		'set'   => 'theme-fa-icons',
	),
);