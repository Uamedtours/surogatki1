<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'icon'       => array(
		'type'  => 'icon',
		'label' => esc_html__( 'Icon', 'modelicom' ),
		'set'   => 'theme-fa-icons',
	),
	'icon_style' => array(
		'type'    => 'image-picker',
		'value'   => '',
		'label'   => esc_html__( 'Icon Style', 'modelicom' ),
		'desc'    => esc_html__( 'Select one of predefined icon styles.', 'modelicom' ),
		'help'    => esc_html__( 'If not set - no icon will appear.', 'modelicom' ),
		'choices' => array(
			'' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon/static/img/icon_teaser_01.png',
			'color-darkgrey' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon/static/img/icon_teaser_02.png',
			'color-main' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon/static/img/icon_teaser_03.png',
			'color-main2' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon/static/img/icon_teaser_04.png',
		),

		'blank' => false,
	),
	'title'      => array(
		'type'  => 'text',
		'label' => esc_html__( 'Title', 'modelicom' ),
		'desc'  => esc_html__( 'Title near icon', 'modelicom' ),
	),
	'text'       => array(
		'type'  => 'text',
		'label' => esc_html__( 'Text', 'modelicom' ),
		'desc'  => esc_html__( 'Text near title', 'modelicom' ),
	)
);