<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
	'steps'      => array(
		'type'        => 'addable-popup',
		'value'       => '',
		'label'       => esc_html__( 'Steps', 'modelicom' ),
		'popup-options' => array(
			'icon'    => array(
				'type'  => 'icon-v2',
				'label' => esc_html__('Choose an Icon', 'modelicom'),
			),
			'icon_style' => array(
				'type'    => 'image-picker',
				'value'   => '',
				'label'   => esc_html__( 'Icon Style', 'modelicom' ),
				'desc'    => esc_html__( 'Select one of predefined icon styles.', 'modelicom' ),
				'choices' => array(
					'' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon-box/static/img/1.png',
					'bordered' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon-box/static/img/2.png',
					'rounded bordered' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon-box/static/img/3.png',
					'round bordered' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon-box/static/img/4.png',
					'bg-' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon-box/static/img/5.png',
					'rounded bg-' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon-box/static/img/6.png',
					'round bg-' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon-box/static/img/7.png',
				),
				'blank' => false, // (optional) if true, images can be deselected
			),
			'icon_color' => array(
				'type'    => 'select',
				'label'   => esc_html__('Icon color', 'modelicom'),
				'value' => 'color-main',
				'choices' => array(
					'color-darkgrey' => esc_html__('Darkgrey', 'modelicom'),
					'color-main'  => esc_html__('Accent', 'modelicom'),
					'color-main2' => esc_html__('Accent 2', 'modelicom'),
					'color-main3' => esc_html__('Accent 3', 'modelicom'),
					'color-main4' => esc_html__('Accent 4', 'modelicom'),
				),
			),
			'icon_font_size' => array(
				'type'    => 'select',
				'label'   => esc_html__('Icon Font Size', 'modelicom'),
				'value'   => 'fs-20',
				'choices' => array(
					//12 14 16 18 20 24 28 32 36 40 56 68
					''      => esc_html__('Inherit', 'modelicom'),
					'fs-12' => esc_html__('12px', 'modelicom'),
					'fs-14' => esc_html__('14px', 'modelicom'),
					'fs-16' => esc_html__('16px', 'modelicom'),
					'fs-18' => esc_html__('18px', 'modelicom'),
					'fs-20' => esc_html__('20px', 'modelicom'),
					'fs-24' => esc_html__('24px', 'modelicom'),
					'fs-28' => esc_html__('28px', 'modelicom'),
					'fs-32' => esc_html__('32px', 'modelicom'),
					'fs-36' => esc_html__('36px', 'modelicom'),
					'fs-40' => esc_html__('40px', 'modelicom'),
					'fs-48' => esc_html__('48px', 'modelicom'),
					'fs-56' => esc_html__('56px', 'modelicom'),
					'fs-68' => esc_html__('68px', 'modelicom'),
				),
			),
			'title'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Title of the Box', 'modelicom' ),
			),
			'content' => array(
				'type'  => 'textarea',
				'label' => esc_html__( 'Content', 'modelicom' ),
				'desc'  => esc_html__( 'Enter the desired content', 'modelicom' ),
			),
			'link'      => array(
				'type'  => 'text',
				'label' => esc_html__( 'Optional teaser link', 'modelicom' ),
			),
		),
		'template'        => '{{- title }}',
		'limit'           => 3, // limit the number of boxes that can be added
		'add-button-text' => esc_html__( 'Add', 'modelicom' ),
	),
    'margin'        => array(
        'label'   => esc_html__( 'Horizontal item margin (px)', 'modelicom' ),
        'desc'    => esc_html__( 'Select horizontal item margin', 'modelicom' ),
        'value'   => '30',
        'type'    => 'select',
        'choices' => array(
            '0'  => esc_html__( '0', 'modelicom' ),
            '10' => esc_html__( '10px', 'modelicom' ),
            '20' => esc_html__( '20px', 'modelicom' ),
            '30' => esc_html__( '30px', 'modelicom' ),
            '40' => esc_html__( '40px', 'modelicom' ),
            '60' => esc_html__( '60px', 'modelicom' ),
            '80' => esc_html__( '80px', 'modelicom' ),
        )
    ),
	'responsive_xl' => array(
		'label'   => esc_html__( 'Columns on extra wide screens', 'modelicom' ),
		'desc'    => esc_html__( 'Select items number on extra wide screens (<1200px)', 'modelicom' ),
		'value'   => '2',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'modelicom' ),
			'2' => esc_html__( '2', 'modelicom' ),
			'3' => esc_html__( '3', 'modelicom' ),
		)
	),
    'responsive_lg' => array(
        'label'   => esc_html__( 'Columns on wide screens', 'modelicom' ),
        'desc'    => esc_html__( 'Select items number on wide screens (>1200px)', 'modelicom' ),
        'value'   => '4',
        'type'    => 'select',
        'choices' => array(
            '1' => esc_html__( '1', 'modelicom' ),
            '2' => esc_html__( '2', 'modelicom' ),
            '3' => esc_html__( '3', 'modelicom' ),
        )
    ),
    'responsive_md' => array(
        'label'   => esc_html__( 'Columns on middle screens', 'modelicom' ),
        'desc'    => esc_html__( 'Select items number on middle screens (>992px)', 'modelicom' ),
        'value'   => '3',
        'type'    => 'select',
        'choices' => array(
            '1' => esc_html__( '1', 'modelicom' ),
            '2' => esc_html__( '2', 'modelicom' ),
            '3' => esc_html__( '3', 'modelicom' ),
        )
    ),
    'responsive_xs' => array(
        'label'   => esc_html__( 'Columns on extra small screens', 'modelicom' ),
        'desc'    => esc_html__( 'Select items number on extra small screens (<767px)', 'modelicom' ),
        'value'   => '1',
        'type'    => 'select',
        'choices' => array(
            '1' => esc_html__( '1', 'modelicom' ),
            '2' => esc_html__( '2', 'modelicom' ),
            '3' => esc_html__( '3', 'modelicom' ),
        )
    ),
	'class'     => array(
		'type'  => 'text',
		'label' => esc_html__( 'Optional additional CSS class', 'modelicom' ),
	),
);