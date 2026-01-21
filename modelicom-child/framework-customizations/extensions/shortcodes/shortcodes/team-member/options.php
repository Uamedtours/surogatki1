<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
//get social icons to add in member item:
$icons_social = fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' );

$options = array(
	'image' => array(
		'label' => esc_html__( 'Team Member Image', 'modelicom' ),
		'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'modelicom' ),
		'type'  => 'upload'
	),
	'name'  => array(
		'label' => esc_html__( 'Team Member Name', 'modelicom' ),
		'desc'  => esc_html__( 'Name of the person', 'modelicom' ),
		'type'  => 'text',
		'value' => ''
	),
	'job'   => array(
		'label' => esc_html__( 'Team Member Job Title', 'modelicom' ),
		'desc'  => esc_html__( 'Job title of the person.', 'modelicom' ),
		'type'  => 'text',
		'value' => ''
	),
	'desc'  => array(
		'label' => esc_html__( 'Team Member Description', 'modelicom' ),
		'desc'  => esc_html__( 'Enter a few words that describe the person', 'modelicom' ),
		'type'  => 'textarea',
		'value' => ''
	),
	$icons_social->get_options(),
);