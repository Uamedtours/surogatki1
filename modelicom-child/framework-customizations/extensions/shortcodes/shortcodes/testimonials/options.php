<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title'               => array(
		'label' => esc_html__( 'Title', 'modelicom' ),
		'desc'  => esc_html__( 'Optional Testimonials Title', 'modelicom' ),
		'type'  => 'text',
	),
	'testimonials'        => array(
		'label'         => esc_html__( 'Testimonials', 'modelicom' ),
		'popup-title'   => esc_html__( 'Add/Edit Testimonial', 'modelicom' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your Testimonials.', 'modelicom' ),
		'type'          => 'addable-popup',
		'template'      => '{{=author_name}}',
		'popup-options' => array(

			'author_avatar' => array(
				'label' => esc_html__( 'Author Image', 'modelicom' ),
				'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'modelicom' ),
				'type'  => 'upload',
			),
			'author_name'   => array(
				'label' => esc_html__( 'Author Name', 'modelicom' ),
				'desc'  => esc_html__( 'Enter the Name of the Author', 'modelicom' ),
				'type'  => 'text'
			),

			'author_url'      => array(
				'label' => esc_html__( 'Author Link', 'modelicom' ),
				'desc'  => esc_html__( 'Link to the Author', 'modelicom' ),
				'type'  => 'text'
			),
			'content'       => array(
				'label' => esc_html__( 'Quote', 'modelicom' ),
				'desc'  => esc_html__( 'Enter the testimonial here', 'modelicom' ),
				'type'  => 'textarea',
			),
			'author_signature' => array(
				'label' => esc_html__( 'Author Signature', 'modelicom' ),
				'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'modelicom' ),
				'type'  => 'upload',
			),
			'author_rating' => array(
				'type'       => 'slider',
				'value'      => 85,
				'properties' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
				'label'      => esc_html__( 'Rating', 'modelicom' ),
				'desc'       => esc_html__( 'Choose percent to rating', 'modelicom' ),
			),
		),
	),
);