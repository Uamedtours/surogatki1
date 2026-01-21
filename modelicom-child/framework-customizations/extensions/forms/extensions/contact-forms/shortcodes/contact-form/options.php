<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'main' => array(
		'type'    => 'box',
		'title'   => '',
		'options' => array(
			'id'       => array(
				'type' => 'unique',
			),
			'builder'  => array(
				'type'    => 'tab',
				'title'   => esc_html__( 'Form Fields', 'modelicom' ),
				'options' => array(
					'form' => array(
						'label'        => false,
						'type'         => 'form-builder',
						'value'        => array(
							'json' => apply_filters( 'fw:ext:forms:builder:load-item:form-header-title', true )
								? json_encode( array(
									array(
										'type'      => 'form-header-title',
										'shortcode' => 'form_header_title',
										'width'     => '',
										'options'   => array(
											'title'    => '',
											'subtitle' => '',
										)
									)
								) )
								: '[]'
						),
						'fixed_header' => true,
					),
				),
			),
			'settings' => array(
				'type'    => 'tab',
				'title'   => esc_html__( 'Settings', 'modelicom' ),
				'options' => array(
					'settings-options' => array(
						'title'   => esc_html__( 'Contact Form Options', 'modelicom' ),
						'type'    => 'tab',
						'options' => array(
							'background_color'    => array(
								'type'    => 'select',
								'value'   => 'ls',
								'label'   => esc_html__( 'Form Background color', 'modelicom' ),
								'desc'    => esc_html__( 'Select background color', 'modelicom' ),
								'help'    => esc_html__( 'Select one of predefined background colors', 'modelicom' ),
								'choices' => array(
									''                              => esc_html__( 'No background', 'modelicom' ),
									'p-40 muted-bg' => esc_html__( 'Muted', 'modelicom' ),
									'p-40 bordered'      => esc_html__( 'With Border', 'modelicom' ),
									'p-40 ls'               => esc_html__( 'Light', 'modelicom' ),
									'p-40 ls ms'            => esc_html__( 'Light Grey', 'modelicom' ),
									'p-40 ds'               => esc_html__( 'Dark Grey', 'modelicom' ),
									'p-40 ds ms'            => esc_html__( 'Dark', 'modelicom' ),
									'p-40 cs'               => esc_html__( 'Main color', 'modelicom' ),
									'p-40 cs cs2'   => esc_html__( 'Second Main color', 'modelicom' ),
								),
							),
							'form_width' => array(
								'type'  => 'switch',
								'value'        => '',
								'label' => esc_html__( 'Increase Form Width', 'modelicom' ),
								'desc'    => esc_html__( 'Increase contact form width on 15%', 'modelicom' ),
								'left-choice'  => array(
									'value' => 'big-form',
									'label' => esc_html__( 'Yes', 'modelicom' ),
								),
								'right-choice' => array(
									'value' => '',
									'label' => esc_html__( 'No', 'modelicom' ),
								),
							),
							'columns_padding'     => array(
								'type'    => 'select',
								'value'   => 'c-gutter-30',
								'label'   => esc_html__( 'Columns gutter', 'modelicom' ),
								'desc'    => esc_html__( 'Choose columns horizontal padding (gutter) value inside form', 'modelicom' ),
								'choices' => array(
									'c-gutter-30' => esc_html__( '30px - default', 'modelicom' ),
									'c-gutter-10'  => esc_html__( '10px', 'modelicom' ),
									'c-gutter-20'  => esc_html__( '20px', 'modelicom' ),
									'c-gutter-40'  => esc_html__( '40px', 'modelicom' ),
									'c-gutter-50'  => esc_html__( '50px', 'modelicom' ),
									'c-gutter-60'  => esc_html__( '60px', 'modelicom' ),
								),
							),
							'columns_margin_bottom'     => array(
								'type'    => 'select',
								'value'   => 'c-mb-15',
								'label'   => esc_html__( 'Columns bottom margins', 'modelicom' ),
								'desc'    => esc_html__( 'Choose columns bottom margin value inside form', 'modelicom' ),
								'choices' => array(
									'c-mb-15' => esc_html__( '15px - default', 'modelicom' ),
									'c-mb-5'  => esc_html__( '5px', 'modelicom' ),
									'c-mb-10'  => esc_html__( '10px', 'modelicom' ),
									'c-mb-20'  => esc_html__( '20px', 'modelicom' ),
									'c-mb-25'  => esc_html__( '25px', 'modelicom' ),
									'c-mb-30'  => esc_html__( '30px', 'modelicom' ),
								),
							),
							'form_email_settings' => array(
								'type'    => 'group',
								'options' => array(
									'email_to' => array(
										'type'  => 'text',
										'label' => esc_html__( 'Email To', 'modelicom' ),
										'help'  => esc_html__( 'We recommend you to use an email that you verify often', 'modelicom' ),
										'desc'  => esc_html__( 'The form will be sent to this email address.', 'modelicom' ),
									),
								),
							),
							'form_text_settings'  => array(
								'type'    => 'group',
								'options' => array(
									'subject-group'       => array(
										'type'    => 'group',
										'options' => array(
											'subject_message' => array(
												'type'  => 'text',
												'label' => esc_html__( 'Subject Message', 'modelicom' ),
												'desc'  => esc_html__( 'This text will be used as subject message for the email', 'modelicom' ),
												'value' => esc_html__( 'Contact Form', 'modelicom' ),
											),
										)
									),
									'submit-button-group' => array(
										'type'    => 'group',
										'options' => array(
											'submit_button_text' => array(
												'type'  => 'text',
												'label' => esc_html__( 'Submit Button', 'modelicom' ),
												'desc'  => esc_html__( 'This text will appear in submit button', 'modelicom' ),
												'value' => esc_html__( 'Send', 'modelicom' ),
											),
											'submit_button_color'       => array(
												'label'   => esc_html__( 'Submit Button Color', 'modelicom' ),
												'desc'    => esc_html__( 'Choose a type for your button', 'modelicom' ),
												'value'   => 'btn btn-outline-maincolor',
												'type'    => 'select',
												'choices' => array(
													'btn btn-maincolor'           => esc_html__( 'Color 1', 'modelicom' ),
													'btn btn-maincolor2'          => esc_html__( 'Color 2', 'modelicom' ),
													'btn btn-darkgrey'            => esc_html__( 'Dark Color', 'modelicom' ),
													'btn btn-outline-maincolor'   => esc_html__( 'Outline Color 1', 'modelicom' ),
													'btn btn-outline-maincolor2'  => esc_html__( 'Outline Color 2', 'modelicom' ),
													'btn btn-outline-darkgrey'    => esc_html__( 'Outline Dark Color', 'modelicom' ),
													'btn-link'                    => esc_html__( 'Color link', 'modelicom' ),
													'btn-link2'                   => esc_html__( 'Color link 2', 'modelicom' ),
													'btn-link-dark'               => esc_html__( 'Dark link', 'modelicom' ),
												)
											),
											'submit_button_margin'       => array(
												'label'   => esc_html__( 'Button Top Margin', 'modelicom' ),
												'desc'    => esc_html__( 'Choose a margin for submit button', 'modelicom' ),
												'value'   => 'mt-40',
												'type'    => 'select',
												'choices' => array(
													'mt-lg-10'               => esc_html__( '10px', 'modelicom' ),
													'mt-lg-20'               => esc_html__( '20px', 'modelicom' ),
													'mt-lg-30'               => esc_html__( '30px', 'modelicom' ),
													'mt-lg-40'               => esc_html__( '40px', 'modelicom' ),
													'mt-lg-50'               => esc_html__( '50px', 'modelicom' ),
													'mt-lg-60'               => esc_html__( '60px', 'modelicom' ),
													'mt-lg-70'               => esc_html__( '70px', 'modelicom' ),
													'mt-lg-80'               => esc_html__( '80px', 'modelicom' ),
												)
											),
											'reset_button_text'  => array(
												'type'  => 'text',
												'label' => esc_html__( 'Reset Button', 'modelicom' ),
												'desc'  => esc_html__( 'This text will appear in reset button. Leave blank if reset button not needed', 'modelicom' ),
												'value' => esc_html__( 'Clear', 'modelicom' ),
											),
										)
									),
									'success-group'       => array(
										'type'    => 'group',
										'options' => array(
											'success_message' => array(
												'type'  => 'text',
												'label' => esc_html__( 'Success Message', 'modelicom' ),
												'desc'  => esc_html__( 'This text will be displayed when the form will successfully send', 'modelicom' ),
												'value' => esc_html__( 'Message sent!', 'modelicom' ),
											),
										)
									),
									'failure_message'     => array(
										'type'  => 'text',
										'label' => esc_html__( 'Failure Message', 'modelicom' ),
										'desc'  => esc_html__( 'This text will be displayed when the form will fail to be sent', 'modelicom' ),
										'value' => esc_html__( 'Oops something went wrong.', 'modelicom' ),
									),
								),
							),
						)
					),
					'mailer-options'   => array(
						'title'   => esc_html__( 'Mailer Options', 'modelicom' ),
						'type'    => 'tab',
						'options' => array(
							'mailer' => array(
								'label' => false,
								'type'  => 'mailer'
							)
						)
					)
				),
			),
		),
	)
);