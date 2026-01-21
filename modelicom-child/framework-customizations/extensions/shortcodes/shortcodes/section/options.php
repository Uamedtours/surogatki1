<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$main_options = modelicom_get_section_options_array();
//adding overflow_visible for section
$main_options['overflow_visible'] = array(
	'type'  => 'switch',
	'value' => false,
	'label' => esc_html__('Overflow visible', 'modelicom'),
	'desc'  => esc_html__('Show content that do not fit in section', 'modelicom'),
	'left-choice' => array(
		'value' => false,
		'label' => esc_html__('No', 'modelicom'),
	),
	'right-choice' => array(
		'value' => true,
		'label' => esc_html__('Yes', 'modelicom'),
	)
);
//adding section name for builder backend view
$main_options['section_name'] = array(
	'type'  => 'text',
	'value' => '',
	'label' => esc_html__('Optional section name', 'modelicom'),
);

$options = array(
	'unique_id' => array(
		'type' => 'unique',
		'length' => 7
	),
	'tab_main_options' => array(
		'type' => 'tab',
		'title' => esc_html__('Main Options', 'modelicom'),
		'options' => $main_options,
	),
	'tab_padding_options' => array(
		'type' => 'tab',
		'title' => esc_html__('Section Padding', 'modelicom'),
		'options' => modelicom_unyson_option_get_section_padding_array(),
	),
	'tab_onehalf_media_options' => array(
		'type' => 'tab',
		'title' => esc_html__('Side Media', 'modelicom'),
		'options' => array(
			'side_media_image' => array(
				'type'  => 'upload',
				'value' => array(),
				'label' => esc_html__('Side media image', 'modelicom'),
				'desc'  => esc_html__('Select image that you want to appear as one half side image', 'modelicom'),
				'images_only' => true,
			),
			'side_media_link' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__('Link to your side media', 'modelicom'),
				'desc'  => esc_html__('You can add a link to your side media. If YouTube link will be provided, video will play in LightBox', 'modelicom'),
			),
			'side_media_video' => array(
				'type'    => 'oembed',
				'value'   => '',
				'label'   => esc_html__( 'Video', 'modelicom' ),
				'desc'    => esc_html__( 'Adds video player. Works only when side media image is set', 'modelicom' ),
				'help'    => esc_html__( 'Leave blank if no needed', 'modelicom' ),
				'preview' => array(
					'width'      => 278, // optional, if you want to set the fixed width to iframe
					'height'     => 185, // optional, if you want to set the fixed height to iframe
					/**
					 * if is set to false it will force to fit the dimensions,
					 * because some widgets return iframe with aspect ratio and ignore applied dimensions
					 */
					'keep_ratio' => true
				),
			),
			'side_media_position'  => array(
				'type'  => 'switch',
				'value' => 'left',
				'label' => esc_html__('Media position', 'modelicom'),
				'desc'  => esc_html__('Left or right media position', 'modelicom'),
				'left-choice' => array(
					'value' => 'left',
					'label' => esc_html__('Left', 'modelicom'),
				),
				'right-choice' => array(
					'value' => 'right',
					'label' => esc_html__('Right', 'modelicom'),
				),
			),
		),
	),
	'tab_responsive' => array(
		'type' => 'tab',
		'title' => esc_html__('Responsive', 'modelicom'),
		'options' => array(
			'responsive_visibility' => array(
				'type' => 'tab',
				'title' => esc_html__('Visibility', 'modelicom'),
				'options' => modelicom_unyson_option_responsive_options_array(),
			),
		),
	),
	'tab_background_extended' => array(
		'type' => 'tab',
		'title' => esc_html__('Background Video', 'modelicom'),
		'options' => array(
			'background_video' => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'type' => array(
						'type'    => 'select',
						'label'   => esc_html__( 'Background Type', 'modelicom' ),
						'desc'    => esc_html__( 'Here you can choose section background type', 'modelicom' ),
						'value'   => '',
						'choices' => array(
							'' => esc_html__( 'None', 'modelicom' ),
							'video_oembed'    => esc_html__( 'Video OEmbed', 'modelicom' ),
							'video_upload'    => esc_html__( 'Video Upload', 'modelicom' ),
						)
					)
				),
				'choices' => array(
					'video_oembed'    => array(
						'video' => array(
							'desc'  => esc_html__( 'Insert your video URL', 'modelicom' ),
							'type'  => 'text',
						),
						'poster' => array(
							'label'   => esc_html__( 'Replacement Image', 'modelicom' ),
							'type'    => 'background-image',
							'help'    => esc_html__('This image will replace the video on mobile devices that disable background videos', 'modelicom'),
						),
						'loop_video'      => array(
							'label'        => esc_html__( 'Loop Video', 'modelicom' ),
							'desc'         => esc_html__( 'Enable loop video?', 'modelicom' ),
							'type'         => 'switch',
							'right-choice' => array(
								'value' => 'yes',
								'label' => esc_html__( 'Yes', 'modelicom' )
							),
							'left-choice'  => array(
								'value' => 'no',
								'label' => esc_html__( 'No', 'modelicom' )
							),
							'value'        => 'yes',
						),
					),
					'video_upload' => array(
						'video'  => array(
							'desc'        => esc_html__( 'Upload a video', 'modelicom' ),
							'images_only' => false,
							'type'        => 'upload',
						),
						'poster' => array(
							'label'   => esc_html__( 'Replacement Image', 'modelicom' ),
							'type'    => 'background-image',
							'help'    => esc_html__('This image will replace the video on mobile devices that disable background videos', 'modelicom'),
						),
						'loop_video'      => array(
							'label'        => esc_html__( 'Loop Video', 'modelicom' ),
							'desc'         => esc_html__( 'Enable loop video?', 'modelicom' ),
							'type'         => 'switch',
							'right-choice' => array(
								'value' => 'yes',
								'label' => esc_html__( 'Yes', 'modelicom' )
							),
							'left-choice'  => array(
								'value' => 'no',
								'label' => esc_html__( 'No', 'modelicom' )
							),
							'value'        => 'yes',
						),
					),
				)
			),
		),

	),
);
