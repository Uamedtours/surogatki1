<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

//get button to add in a teaser:
$button         = fw_ext( 'shortcodes' )->get_shortcode( 'button' );
$button_options = $button->get_options();
unset( $button_options['link'] );
unset( $button_options['target'] );

$options = array(
	'style'   => array(
		'type'    => 'select',
		'label'   => esc_html__('Box Style', 'modelicom'),
		'choices' => array(
			'top' => esc_html__('Icon above title', 'modelicom'),
			'left' => esc_html__('Icon to the left of title', 'modelicom'),
			'right' => esc_html__('Icon to the right of title', 'modelicom')
		)
	),
	'background_color' => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Background color', 'modelicom' ),
		'desc'    => esc_html__( 'Select background color', 'modelicom' ),
		'help'    => esc_html__( 'Select one of predefined background types', 'modelicom' ),
		'choices' => modelicom_unyson_option_get_backgrounds_array(),
	),
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

	'pattern_img' => array(
		'label'   => esc_html__( 'Background Image', 'modelicom' ),
		'desc'         => esc_html__( 'Choose background Image', 'modelicom' ),
		'type'    => 'select',
		'inline'  => true,
		'value'   => '',
		'choices' => array(
			''  => 'Default',
			'pattern-img pattern1' => 'Featured image 1',
			'pattern-img pattern2' => 'Featured image 2',
			'pattern-img pattern3' => 'Featured image 3',
		)
	),
	'icon_color' => array(
		'type'    => 'select',
		'label'   => esc_html__('Icon color', 'modelicom'),
		'value' => 'color-main',
		'choices' => array(
			'color-darkgrey' => esc_html__('Darkgrey', 'modelicom'),
			'color-main' => esc_html__('Accent', 'modelicom'),
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
			'' => esc_html__('Inherit', 'modelicom'),
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
	'title_size' => array(
		'type'    => 'select',
		'label'   => esc_html__('Title Font Size', 'modelicom'),
		'value'   => 'fs-20',
		'choices' => array(
			'' => esc_html__('Inherit', 'modelicom'),
			'fs-14' => esc_html__('14px', 'modelicom'),
			'fs-18' => esc_html__('18px', 'modelicom'),
			'fs-20' => esc_html__('20px', 'modelicom'),
			'fs-24' => esc_html__('24px', 'modelicom'),
			'fs-30' => esc_html__('30px', 'modelicom'),
			'fs-40' => esc_html__('40px', 'modelicom'),
			'fs-50' => esc_html__('50px', 'modelicom'),
			'fs-60' => esc_html__('60px', 'modelicom'),
			'fs-80' => esc_html__('80px', 'modelicom'),
		),
	),
	'content' => array(
		'type'  => 'textarea',
		'label' => esc_html__( 'Content', 'modelicom' ),
		'desc'  => esc_html__( 'Enter the desired content', 'modelicom' ),
	),
	'content_size' => array(
		'type'    => 'select',
		'label'   => esc_html__('Content Font Size', 'modelicom'),
		'value'   => 'fs-16',
		'choices' => array(
			'fs-14' => esc_html__('14px', 'modelicom'),
			'fs-16' => esc_html__('16px', 'modelicom'),
			'fs-18' => esc_html__('18px', 'modelicom'),
			'fs-20' => esc_html__('20px', 'modelicom'),
			'fs-24' => esc_html__('24px', 'modelicom'),
			'fs-30' => esc_html__('30px', 'modelicom'),
		),
	),
	'content_text_style' => array(
		'type'    => 'select',
		'label'   => esc_html__('Content Font Style', 'modelicom'),
		'value'   => '',
		'choices' => array(
			'' => esc_html__('Inherit', 'modelicom'),
			'font-italic' => esc_html__('Italic', 'modelicom'),
		),
	),
	'text_align' => array(
		'type'    => 'select',
		'label'   => esc_html__('Text alignment', 'modelicom'),
		'value'   => 'text-left',
		'choices' => array(
			'text-left' => esc_html__('Left', 'modelicom'),
			'text-center' => esc_html__('Center', 'modelicom'),
			'text-right' => esc_html__('Right', 'modelicom'),
		),
	),
	'link'   => array(
		'type'  => 'text',
		'label' => esc_html__( 'Optional teaser link', 'modelicom' ),
	),
	'class'   => array(
		'type'  => 'text',
		'label' => esc_html__( 'Optional additional CSS class', 'modelicom' ),
	),
	'button' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'value'   => false,
		'picker'  => array(
			'show_button' => array(
				'type'         => 'switch',
				'label'        => esc_html__( 'Show button', 'modelicom' ),
				'left-choice'  => array(
					'value' => '',
					'label' => esc_html__( 'No', 'modelicom' ),
				),
				'right-choice' => array(
					'value' => 'button',
					'label' => esc_html__( 'Yes', 'modelicom' ),
				),
			),
		),
		'choices' => array(
			''       => array(),
			'button' => $button_options,
		),
	)
);