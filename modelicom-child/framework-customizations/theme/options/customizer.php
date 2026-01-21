<?php if (!defined('FW')) {
	die('Forbidden');
}
/**
 * Framework options
 *
 * @var array $options Fill this array with options to generate framework settings form in WordPress customizer
 */

if (!function_exists('modelicom_show_modelicom_options_in_customizer')) :
	function modelicom_show_modelicom_options_in_customizer()
	{
		$modelicom_extension = fw()->extensions->get('modelicom');
		return !empty($modelicom_extension);
	}
endif;

//theme defaults
$options_class = new Modelicom_Options();
$defaults = $options_class->get_default_options_array();

//find fw_ext
$shortcodes_extension = fw()->extensions->get('shortcodes');

$meta_social_icons  = array();
if (!empty($shortcodes_extension)) {
	$meta_social_icons = $shortcodes_extension->get_shortcode('icons_social')->get_options();
}

$header_buttons  = array();
if (!empty($shortcodes_extension)) {
	$header_buttons = $shortcodes_extension->get_shortcode('button')->get_options();
}

$slider_extension = fw()->extensions->get('slider');
$choices_blog_slider          = array();
if (!empty($slider_extension)) {
	$choices_blog_slider = $slider_extension->get_populated_sliders_choices();
}
//adding empty value to disable slider
$choices_blog_slider[0] = esc_html__('No Slider', 'modelicom');

$options = array(
	'meta_section' => array(
		'title'   => esc_html__('Theme Meta', 'modelicom'),
		'options' => array(
			'meta_phone' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__('Phone number', 'modelicom'),
				'desc'  => esc_html__('Number to appear in header', 'modelicom'),
				'help'  => esc_html__('Not all headers display this info', 'modelicom'),
			),
			'meta_email' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__('Email', 'modelicom'),
				'desc'  => esc_html__('Email to appear in header', 'modelicom'),
				'help'  => esc_html__('Not all headers display this info', 'modelicom'),
			),
			'meta_address' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__('Address', 'modelicom'),
				'desc'  => esc_html__('Address to appear in header', 'modelicom'),
				'help'  => esc_html__('Not all headers display this info', 'modelicom'),
			),
			//'social_icons'
			$meta_social_icons,
			'meta_image_login' => array(
				'label' => esc_html__('Image for login form', 'modelicom'),
				'desc'  => esc_html__('Either upload a new, or choose an existing image from your media library', 'modelicom'),
				'type'  => 'upload'
			),
			'meta_image_register' => array(
				'label' => esc_html__('Image for Registration', 'modelicom'),
				'desc'  => esc_html__('Either upload a new, or choose an existing image from your media library', 'modelicom'),
				'type'  => 'upload'
			),
			'meta_search' => array(
				'type'  => 'switch',
				'value' => false,
				'label' => esc_html__('Hide search', 'modelicom'),
				'desc'  => esc_html__('Show or hide search in header', 'modelicom'),
				'left-choice' => array(
					'value' => false,
					'label' => esc_html__(' Hide', 'modelicom'),
				),
				'right-choice' => array(
					'value' => true,
					'label' => esc_html__(' Show', 'modelicom'),
				),
			),
			'meta_login' => array(
				'type'  => 'switch',
				'value' => false,
				'label' => esc_html__('Hide login', 'modelicom'),
				'desc'  => esc_html__('Show or hide login in header', 'modelicom'),
				'left-choice' => array(
					'value' => false,
					'label' => esc_html__(' Hide', 'modelicom'),
				),
				'right-choice' => array(
					'value' => true,
					'label' => esc_html__(' Show', 'modelicom'),
				),
			),
			'header_buttons'        => array(
				'label'         => esc_html__('Buttons', 'modelicom'),
				'popup-title'   => esc_html__('Add/Edit Buttons', 'modelicom'),
				'desc'          => esc_html__('Add button for header', 'modelicom'),
				'help'          => esc_html__('Buttons Limit 2 used in header 4', 'modelicom'),
				'type'          => 'addable-popup',
				'limit'         => 2, // limit the number of boxes that can be added
				'template'      => '{{=label}}',
				'popup-options' => array(
					$header_buttons,
				),
			),
		),
		'wp-customizer-args' => array(
			'active_callback' => '__return_true',
			'priority'        => 150,
		),
	),
	'header_section'       => array(
		'title'   => esc_html__('Theme Header Section', 'modelicom'),
		'options' => array(
			'logo_section'         => array(
				'title'   => esc_html__('Logo', 'modelicom'),
				'options' => array(
					'logo_image'             => array(
						'type'        => 'upload',
						'value'       => array(),
						'attr'        => array('class' => 'logo_image-class', 'data-logo_image' => 'logo_image'),
						'label'       => esc_html__('Main logo image that appears in header', 'modelicom'),
						'desc'        => esc_html__('Select your logo', 'modelicom'),
						'help'        => esc_html__('Choose image to display as a site logo', 'modelicom'),
						'images_only' => true,
						'files_ext'   => array('png', 'jpg', 'jpeg', 'gif'),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'logo_image_inverse'             => array(
						'type'        => 'upload',
						'value'       => array(),
						'attr'        => array('class' => 'logo_image-class', 'data-logo_image' => 'logo_image'),
						'label'       => esc_html__('Main inverse logo image that appears in dark header', 'modelicom'),
						'desc'        => esc_html__('Select your inverse logo', 'modelicom'),
						'help'        => esc_html__('Choose image to display as a site inverse logo', 'modelicom'),
						'images_only' => true,
						'files_ext'   => array('png', 'jpg', 'jpeg', 'gif'),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'logo_text'              => array(
						'type'  => 'text',
						'value' => 'Modelicom',
						'attr'  => array('class' => 'logo_text-class', 'data-logo_text' => 'logo_text'),
						'label' => esc_html__('Logo Text', 'modelicom'),
						'desc'  => esc_html__('Text that appears near logo image', 'modelicom'),
						'help'  => esc_html__('Type your text to show it in logo', 'modelicom'),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),

				),
			),
			modelicom_get_header_options_array_for_customizer_and_page($defaults),
			'topline_section_options' => array(
				'title'              => esc_html__('Topline Section Options', 'modelicom'),
				'options'            => modelicom_get_section_options_array('topline_', array(
					'top_padding',
					'bottom_padding',
					'top_padding_sm',
					'bottom_padding_sm',
					'top_padding_md',
					'bottom_padding_md',
					'top_padding_lg',
					'bottom_padding_lg',
					'top_padding_xl',
					'bottom_padding_xl',
					'columns_padding',
					'columns_vertical_margins',
					'is_align_vertical',

				)),
				//show topline options only when header layout with topline chosen
				'wp-customizer-args' => array(
					'active_callback' => 'modelicom_topline_is_visible',
				),
			),
			'toplogo_section_options' => array(
				'title'              => esc_html__('Toplogo Section Options', 'modelicom'),
				'options'            => modelicom_get_section_options_array('toplogo_', array(
					'top_padding',
					'bottom_padding',
					'top_padding_sm',
					'bottom_padding_sm',
					'top_padding_md',
					'bottom_padding_md',
					'top_padding_lg',
					'bottom_padding_lg',
					'top_padding_xl',
					'bottom_padding_xl',
					'columns_padding',
					'columns_vertical_margins',
					'is_align_vertical',

				)),
				'wp-customizer-args' => array(
					'active_callback' => 'modelicom_toplogo_is_visible',
				),
			),
		),
	),
	'title_section'        => array(
		'title'   => esc_html__('Theme Title Section', 'modelicom'),
		'options' => array(
			'title_layout'          => array(
				'title'   => esc_html__('Title Section Layout', 'modelicom'),
				'options' => array(
					'page_title'      => array(
						'type'    => 'select',
						'value'   => $defaults['page_title'],
						'attr'    => array(
							'class'    => 'breadcrumbs-thumbnail',
						),
						'label'   => esc_html__('Page title sections with optional breadcrumbs', 'modelicom'),
						'desc'    => esc_html__('Select one of predefined page title sections. Install Unyson Breadcrumbs extension to display breadcrumbs', 'modelicom'),
						'help'    => esc_html__('You can select one of predefined theme title sections', 'modelicom'),
						'choices' => array(
							'1' => esc_html__('Default - title above breadcrumbs', 'modelicom'),
							'2' => esc_html__('Left title with right breadcrumbs', 'modelicom'),
							'3' => esc_html__('Left title with inline breadcrumbs', 'modelicom'),
							'4' => esc_html__('Centered title with bottom right breadcrumbs', 'modelicom'),
							'5' => esc_html__('Left small title with bottom small breadcrumbs', 'modelicom'),
							'6' => esc_html__('Centered title with centered breadcrumbs', 'modelicom'),

						),
						'blank'   => false, // (optional) if true, image can be deselected
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'hide_term_title' => array(
						'type'         => 'switch',
						'value'        => true,
						'label'        => esc_html__('Hide Term Name', 'modelicom'),
						'desc'         => esc_html__('May to hide Archive or Taxonomy Name, such as \'Archives: \', \'Category: \', \'Tag: \', etc. ', 'modelicom'),
						'right-choice' => array(
							'value' => false,
							'label' => esc_html__('Show', 'modelicom')
						),
						'left-choice'  => array(
							'value' => true,
							'label' => esc_html__('Hide', 'modelicom')
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
				),
			),
			'title_section_options' => array(
				'title'   => esc_html__('Title Section Options', 'modelicom'),
				'options' => modelicom_get_section_options_array('title_', array(
					'columns_padding',
					'columns_vertical_margins',
					'is_align_vertical',
				)),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),
			'title_section_padding' => array(
				'title'   => esc_html__('Title Section Padding', 'modelicom'),
				'options' => modelicom_unyson_option_get_section_padding_array('title_'),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),
		),
	),
	'footer_section'       => array(
		'title'   => esc_html__('Theme Footer Section', 'modelicom'),
		'options' => array(
			modelicom_get_footer_options_array_for_customizer_and_page($defaults)
		),
	),
	'copyright_section'    => array(
		'title'   => esc_html__('Theme Copyright Section', 'modelicom'),
		'options' => array(
			'copyright_layout'          => array(
				'title'   => esc_html__('Copyright Section Layout', 'modelicom'),
				'options' => array(
					'page_copyright' => array(
						'type'    => 'select',
						'value'   => $defaults['page_copyright'],
						'label'   => esc_html__('Page copyright', 'modelicom'),
						'desc'    => esc_html__('Select one of predefined page copyright sections.', 'modelicom'),
						'help'    => esc_html__('You can select one of predefined theme copyright section', 'modelicom'),
						'choices' => array(
							'1' => esc_html__('One centered column', 'modelicom'),
							'2' => esc_html__('Two columns with menu', 'modelicom'),
							'3' => esc_html__('Three columns with logo and menu', 'modelicom'),
						),
						'blank'   => false, // (optional) if true, image can be deselected
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'copyright_text' => array(
						'type'  => 'textarea',
						'value' => '&copy; Copyright  <span class="copyright_year">' . date("Y") . '</span> All Rights Reserved',
						'label' => esc_html__('Copyright text', 'modelicom'),
						'desc'  => esc_html__('Please type your copyright text', 'modelicom'),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'copyright_logo' => array(
						'type'  => 'upload',
						'value' => '',
						'label' => esc_html__('Copyright logo', 'modelicom'),
						'desc'  => esc_html__('Appears in certain copyright layouts', 'modelicom'),
						'wp-customizer-args' => array(
							'active_callback' => 'modelicom_copyright_logo_is_visible',
						),
					),
				),
			),
			'copyright_section_options' => array(
				'title'   => esc_html__('Copyright Section Options', 'modelicom'),
				'options' => modelicom_get_section_options_array('copyright_'),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),
			'copyright_section_padding' => array(
				'title'   => esc_html__('Copyright Section Padding', 'modelicom'),
				'options' => modelicom_unyson_option_get_section_padding_array('copyright_'),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),
		),
	),
	'404_panel'      => array(
		'title' => esc_html__('Theme 404 page', 'modelicom'),
		'options' => array(
			'404_section_options' => array(
				'title'   => esc_html__('404 Section Options', 'modelicom'),
				'options' => modelicom_get_section_options_array('404_', array(
					'columns_padding',
					'columns_vertical_margins',
					'is_align_vertical',
				)),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),

			),
			'404_section_padding' => array(
				'title'   => esc_html__('404 Section Padding', 'modelicom'),
				'options' => modelicom_unyson_option_get_section_padding_array('404_'),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),

		)
	),
	'fonts_section'        => array(
		'title'   => esc_html__('Theme Fonts', 'modelicom'),
		'options' => array(
			'body_fonts_section' => array(
				'title'   => esc_html__('Font for body', 'modelicom'),
				'options' => array(
					'body_font_picker_switch' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'main_font_enabled' => array(
								'type'         => 'switch',
								'value'        => '',
								'label'        => esc_html__('Enable', 'modelicom'),
								'desc'         => esc_html__('Enable custom body font', 'modelicom'),
								'left-choice'  => array(
									'value' => '',
									'label' => esc_html__('Disabled', 'modelicom'),
								),
								'right-choice' => array(
									'value' => 'main_font_options',
									'label' => esc_html__('Enabled', 'modelicom'),
								),
							),
						),
						'choices' => array(
							'main_font_options' => array(
								'main_font' => array(
									'type'       => 'typography-v2',
									'value'      => array(
										'family'         => 'Roboto',
										// For standard fonts, instead of subset and variation you should set 'style' and 'weight' like so:
										'subset'         => 'latin-ext',
										'variation'      => 'regular',
										'size'           => 14,
										'line-height'    => 24,
										'letter-spacing' => 0,
										'color'          => '#0000ff'
									),
									'components' => array(
										'family'         => true,
										'size'           => true,
										'line-height'    => true,
										'letter-spacing' => true,
										'color'          => false
									),
									'label'      => esc_html__('Custom font', 'modelicom'),
									'desc'       => esc_html__('Select custom font for headings', 'modelicom'),
									'help'       => esc_html__('You should enable using custom heading fonts above at first', 'modelicom'),
								),
							),
						),
					),
				),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),

			'headings_fonts_section' => array(
				'title'   => esc_html__('Font for headings', 'modelicom'),
				'options' => array(
					'h_font_picker_switch' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'h_font_enabled' => array(
								'type'         => 'switch',
								'value'        => '',
								'label'        => esc_html__('Enable', 'modelicom'),
								'desc'         => esc_html__('Enable custom heading font', 'modelicom'),
								'left-choice'  => array(
									'value' => '',
									'label' => esc_html__('Disabled', 'modelicom'),
								),
								'right-choice' => array(
									'value' => 'h_font_options',
									'label' => esc_html__('Enabled', 'modelicom'),
								),
							),
						),
						'choices' => array(
							'h_font_options' => array(
								'h_font' => array(
									'type'       => 'typography-v2',
									'value'      => array(
										'family'         => 'Roboto',
										'subset'         => 'latin-ext',
										'variation'      => 'regular',
										'size'           => 28,
										'line-height'    => '100%',
										'letter-spacing' => 0,
										'color'          => '#0000ff'
									),
									'components' => array(
										'family'         => true,
										'size'           => false,
										'line-height'    => false,
										'letter-spacing' => true,
										'color'          => false
									),
									'label'      => esc_html__('Custom font', 'modelicom'),
									'desc'       => esc_html__('Select custom font for headings', 'modelicom'),
									'help'       => esc_html__('You should enable using custom heading fonts above at first', 'modelicom'),
								),
							),
						),
					),
				),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),

		),
	),
	'theme_options_section' => array(
		'title'   => esc_html__('Theme Options', 'modelicom'),
		'options' => array(
			'layout_section'       => array(
				'title'   => esc_html__('Theme Layout', 'modelicom'),
				'options' => array(
					'layout' => array(
						'type'    => 'multi-picker',
						'value'   => 'wide',
						'attr'    => array('class' => 'theme-layout-class', 'data-theme-layout' => 'layout'),
						'label'   => esc_html__('Theme layout', 'modelicom'),
						'desc'    => esc_html__('Wide or Boxed layout', 'modelicom'),
						'picker'  => array(
							'boxed' => array(
								'type'         => 'switch',
								'value'        => '',
								'label'        => false,
								'desc'         => false,
								'left-choice'  => array(
									'value' => '',
									'label' => esc_html__('Wide', 'modelicom'),
								),
								'right-choice' => array(
									'value' => 'boxed_options',
									'label' => esc_html__('Boxed', 'modelicom'),
								),
							),
						),
						'choices' => array(
							'boxed_options' => array(
								'body_background_image' => array(
									'type'        => 'upload',
									'value'       => '',
									'label'       => esc_html__('Body background image', 'modelicom'),
									'help'        => esc_html__('Choose body background image if needed.', 'modelicom'),
									'images_only' => true,
								),
								'body_cover'            => array(
									'type'         => 'switch',
									'value'        => '',
									'label'        => esc_html__('Parallax background', 'modelicom'),
									'desc'         => esc_html__('Enable full width background for body', 'modelicom'),
									'left-choice'  => array(
										'value' => '',
										'label' => esc_html__('No', 'modelicom'),
									),
									'right-choice' => array(
										'value' => 'yes',
										'label' => esc_html__('Yes', 'modelicom'),
									),
								),
								'boxed_extra_margins'            => array(
									'type'         => 'switch',
									'value'        => '',
									'label'        => esc_html__('Additional margins', 'modelicom'),
									'desc'         => esc_html__('Enable additional margins for boxed container', 'modelicom'),
									'left-choice'  => array(
										'value' => '',
										'label' => esc_html__('No', 'modelicom'),
									),
									'right-choice' => array(
										'value' => 'yes',
										'label' => esc_html__('Yes', 'modelicom'),
									),
								),
							),
						),

					),
				),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),
			'color_scheme_section' => array(
				'title'   => esc_html__('Theme Color Scheme', 'modelicom'),
				'options' => array(
					'color_scheme_number' => array(
						'type'    => 'select',
						'value'   => '',
						'label'   => esc_html__('Predefined Color scheme', 'modelicom'),
						'desc'    => esc_html__('Select one of predefined color schemes number', 'modelicom'),
						'choices' => array(
							''  => '1',
							'2' => '2',
							'3' => '3',
						),
						'blank'   => false, // (optional) if true, image can be deselected
						'wp-customizer-args' => array(
							'active_callback' => '__return_false',
						),
					),
					'color_main' => array(
						'label' => esc_html__('Override accent colors', 'modelicom'),
						'desc' => esc_html__('Accent Color 1', 'modelicom'),
						'help' => esc_html__('This colors are used for regenerate predefined "css/main.css" file with first color scheme. Remove custom color values for reset first color scheme to defaults.', 'modelicom'),
						'type' => 'color-picker',
						'value' => '#e3366e',
					),
					'color_main2' => array(
						'label' => false,
						'desc' => esc_html__('Accent Color 2', 'modelicom'),
						'type' => 'color-picker',
						'value' => '#f89ec9',
					),
					'color_main3' => array(
						'label' => false,
						'desc' => esc_html__('Accent Color 3', 'modelicom'),
						'type' => 'color-picker',
						'value' => '#f6cdd7',
					),
					'color_main4' => array(
						'label' => false,
						'desc' => esc_html__('Accent Color 4', 'modelicom'),
						'type' => 'color-picker',
						'value' => '#28edfd',
					),

				),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),
			'blog_section'         => array(
				'title'   => esc_html__('Theme Blog Options', 'modelicom'),
				'options' => array(
					'blog_layout' => array(
						'type'    => 'select',
						'value'   => '1',
						'label'   => esc_html__('Blog layout', 'modelicom'),
						'desc'    => esc_html__('Select one of predefined blog layouts', 'modelicom'),
						'choices' => array(
							'1' => '1',
							'2' => '2',
							'3' => '3',
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'blog_hide_categories' => array(
						'type'  => 'switch',
						'value' => false,
						'label' => esc_html__('Hide categories in blog feed', 'modelicom'),
						'left-choice' => array(
							'value' => false,
							'label' => esc_html__(' Show', 'modelicom'),
						),
						'right-choice' => array(
							'value' => true,
							'label' => esc_html__(' Hide', 'modelicom'),
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'blog_hide_tags' => array(
						'type'  => 'switch',
						'value' => false,
						'label' => esc_html__('Hide tags in blog feed', 'modelicom'),
						'left-choice' => array(
							'value' => false,
							'label' => esc_html__(' Show', 'modelicom'),
						),
						'right-choice' => array(
							'value' => true,
							'label' => esc_html__(' Hide', 'modelicom'),
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'blog_hide_author' => array(
						'type'  => 'switch',
						'value' => false,
						'label' => esc_html__('Hide author in blog feed', 'modelicom'),
						'left-choice' => array(
							'value' => false,
							'label' => esc_html__(' Show', 'modelicom'),
						),
						'right-choice' => array(
							'value' => true,
							'label' => esc_html__(' Hide', 'modelicom'),
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'blog_hide_date' => array(
						'type'  => 'switch',
						'value' => false,
						'label' => esc_html__('Hide date in blog feed', 'modelicom'),
						'left-choice' => array(
							'value' => false,
							'label' => esc_html__(' Show', 'modelicom'),
						),
						'right-choice' => array(
							'value' => true,
							'label' => esc_html__(' Hide', 'modelicom'),
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'blog_hide_comments_link' => array(
						'type'  => 'switch',
						'value' => false,
						'label' => esc_html__('Hide comments link in blog feed', 'modelicom'),
						'left-choice' => array(
							'value' => false,
							'label' => esc_html__(' Show', 'modelicom'),
						),
						'right-choice' => array(
							'value' => true,
							'label' => esc_html__(' Hide', 'modelicom'),
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'blog_hide_view_count' => array(
						'type'  => 'switch',
						'value' => false,
						'label' => esc_html__('Hide view count in single post', 'modelicom'),
						'left-choice' => array(
							'value' => false,
							'label' => esc_html__(' Show', 'modelicom'),
						),
						'right-choice' => array(
							'value' => true,
							'label' => esc_html__(' Hide', 'modelicom'),
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'post_hide_categories' => array(
						'type'  => 'switch',
						'value' => false,
						'label' => esc_html__('Hide categories in single post', 'modelicom'),
						'left-choice' => array(
							'value' => false,
							'label' => esc_html__(' Show', 'modelicom'),
						),
						'right-choice' => array(
							'value' => true,
							'label' => esc_html__(' Hide', 'modelicom'),
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'post_hide_author' => array(
						'type'  => 'switch',
						'value' => false,
						'label' => esc_html__('Hide author in single post', 'modelicom'),
						'left-choice' => array(
							'value' => false,
							'label' => esc_html__(' Show', 'modelicom'),
						),
						'right-choice' => array(
							'value' => true,
							'label' => esc_html__(' Hide', 'modelicom'),
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'blog_slider_switch'       => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'blog_slider_enabled' => array(
								'type'         => 'switch',
								'value'        => '',
								'label'        => esc_html__('Blog slider', 'modelicom'),
								'desc'         => esc_html__('Enable slider on blog page', 'modelicom'),
								'left-choice'  => array(
									'value' => '',
									'label' => esc_html__('No', 'modelicom'),
								),
								'right-choice' => array(
									'value' => 'yes',
									'label' => esc_html__('Yes', 'modelicom'),
								),
							),
						),
						'choices' => array(
							'yes' => array(
								'slider_id' => array(
									'type'    => 'select',
									'value'   => '',
									'label'   => esc_html__('Select Slider', 'modelicom'),
									'choices' => $choices_blog_slider
								),
							),
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'blog_posts_widget_switch' => array(
						'type'         => 'switch',
						'value'        => '',
						'label'        => esc_html__('Post widget', 'modelicom'),
						'desc'         => esc_html__('Enable posts widget on blog page', 'modelicom'),
						'left-choice'  => array(
							'value' => '',
							'label' => esc_html__('No', 'modelicom'),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__('Yes', 'modelicom'),
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
				),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),
			'models_section'         => array(
				'title'   => esc_html__('Models Options', 'modelicom'),
				'options' => array(
					'models_layout' => array(
						'type'    => 'select',
						'value'   => '1',
						'label'   => esc_html__('Models feed layout', 'modelicom'),
						'desc'    => esc_html__('Select one of predefined models feed layouts', 'modelicom'),
						'choices' => array(
							'1' => '1',
							'2' => '2',
							'3' => '3',
							'4' => '4',
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'models_banner' => array(
						'label' => esc_html__('Models Banner', 'modelicom'),
						'desc'  => esc_html__('Either upload a new, or choose an existing image from your media library', 'modelicom'),
						'type'  => 'upload'
					),
					'url_banner' => array(
						'type' => 'text',
						'label' => esc_html__('Banner Link', 'modelicom'),
					),
					'archive_model_title' => array(
						'type' => 'text',
						'label' => esc_html__('Models Title', 'modelicom'),
						'desc'  => esc_html__('Add title that appear in models page', 'modelicom'),
					),
				),
			),
			'preloader_panel'      => array(
				'title' => esc_html__('Theme Preloader', 'modelicom'),
				'options' => array(
					'preloader' => array(
						'type'  => 'multi-picker',
						'label' => false,
						'desc'  => false,
						'value' => array(
							'css' => 'css',
						),
						'picker' => array(
							'preloader_type' => array(
								'label'   => esc_html__('Choose preloader type', 'modelicom'),
								'type'    => 'select',
								'value'   => 'css',
								'choices' => array(
									'css'  => esc_html__('Default', 'modelicom'),
									'image' => esc_html__('Default Image', 'modelicom'),
									'image_custom' => esc_html__('Custom Image', 'modelicom'),
									'disabled' => esc_html__('Disabled', 'modelicom'),
								),
								'help'    => esc_html__('You can use default CSS or Image preloader, use your own image or disable preloader', 'modelicom'),
							)
						),
						'choices' => array(
							'css'  => array(
								'options' => array(
									'type'  => 'hidden',
									'value' => 'css',
								)
							),
							'image'  => array(
								'options' => array(
									'type'  => 'hidden',
									'value' => 'image',
								),
							),
							'image_custom' => array(
								'options' => array(
									'type'        => 'upload',
									'value'       => '',
									'label'       => esc_html__('Custom preloader image', 'modelicom'),
									'help'        => esc_html__('GIF image recommended. Recommended maximum preloader width 150px, maximum preloader height 150px.', 'modelicom'),
									'images_only' => true,
								),
							),
							'disabled' => array(
								'options' => array(
									'type'  => 'hidden',
									'value' => false,
								),
							),
						),
						/**
						 * (optional) if is true, the borders between choice options will be shown
						 */
						'show_borders' => false,
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'preloader_custom_class' => array(
						'type' => 'text',
						'label' => esc_html__('Additional CSS class', 'modelicom'),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					)
				),
			),
			'share_buttons'   => array(
				'title' => esc_html__('Theme Share Buttons', 'modelicom'),

				'options' => array(
					'share_title' => array(
						'type' => 'text',
						'label' => esc_html__('Share Buttons Title', 'modelicom'),
					),
					'share_facebook'    => array(
						'type'         => 'switch',
						'value'        => '1',
						'label'        => esc_html__('Enable Facebook Share Button', 'modelicom'),
						'left-choice'  => array(
							'value' => '1',
							'label' => esc_html__('Enabled', 'modelicom'),
						),
						'right-choice' => array(
							'value' => '0',
							'label' => esc_html__('Disabled', 'modelicom'),
						),
					),
					'share_twitter'     => array(
						'type'         => 'switch',
						'value'        => '1',
						'label'        => esc_html__('Enable Twitter Share Button', 'modelicom'),
						'left-choice'  => array(
							'value' => '1',
							'label' => esc_html__('Enabled', 'modelicom'),
						),
						'right-choice' => array(
							'value' => '0',
							'label' => esc_html__('Disabled', 'modelicom'),
						),
					),
					'share_telegram' => array(
						'type'         => 'switch',
						'value'        => '1',
						'label'        => esc_html__('Enable Telegram Share Button', 'modelicom'),
						'left-choice'  => array(
							'value' => '1',
							'label' => esc_html__('Enabled', 'modelicom'),
						),
						'right-choice' => array(
							'value' => '0',
							'label' => esc_html__('Disabled', 'modelicom'),
						),
					),
					'share_pinterest'   => array(
						'type'         => 'switch',
						'value'        => '1',
						'label'        => esc_html__('Enable Pinterest Share Button', 'modelicom'),
						'left-choice'  => array(
							'value' => '1',
							'label' => esc_html__('Enabled', 'modelicom'),
						),
						'right-choice' => array(
							'value' => '0',
							'label' => esc_html__('Disabled', 'modelicom'),
						),
					),
					'share_linkedin'    => array(
						'type'         => 'switch',
						'value'        => '1',
						'label'        => esc_html__('Enable LinkedIn Share Button', 'modelicom'),
						'left-choice'  => array(
							'value' => '1',
							'label' => esc_html__('Enabled', 'modelicom'),
						),
						'right-choice' => array(
							'value' => '0',
							'label' => esc_html__('Disabled', 'modelicom'),
						),
					),
					'share_tumblr'      => array(
						'type'         => 'switch',
						'value'        => '1',
						'label'        => esc_html__('Enable Tumblr Share Button', 'modelicom'),
						'left-choice'  => array(
							'value' => '1',
							'label' => esc_html__('Enabled', 'modelicom'),
						),
						'right-choice' => array(
							'value' => '0',
							'label' => esc_html__('Disabled', 'modelicom'),
						),
					),
				),
				'wp-customizer-args' => array(
					'active_callback' => 'modelicom_shared_buttons_options_is_visible',
				),
			),
		),
	),
);
