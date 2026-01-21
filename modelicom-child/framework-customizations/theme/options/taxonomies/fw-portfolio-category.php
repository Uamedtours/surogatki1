<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'box_id' => array(
		'type'    => 'box',
		'title'   => esc_html__( 'Options for child categories', 'modelicom' ),
		'options' => array(
			'layout'        => array(
				'label'   => esc_html__( 'Portfolio Layout', 'modelicom' ),
				'desc'    => esc_html__( 'Choose projects layout', 'modelicom' ),
				'value'   => 'isotope',
				'type'    => 'select',
				'choices' => array(
					'carousel' => esc_html__( 'Carousel', 'modelicom' ),
					'isotope'  => esc_html__( 'Masonry Grid', 'modelicom' ),
				)
			),
			'item_layout'   => array(
				'label'   => esc_html__( 'Item layout', 'modelicom' ),
				'desc'    => esc_html__( 'Choose Item layout', 'modelicom' ),
				'value'   => 'item-regular',
				'type'    => 'select',
				'choices' => array(
					'item-regular'  => esc_html__( 'Regular (just image)', 'modelicom' ),
					'item-title'    => esc_html__( 'Image with title', 'modelicom' ),
					'item-extended' => esc_html__( 'Image with title and excerpt', 'modelicom' ),
				)
			),
			'full_width'    => array(
				'type'         => 'switch',
				'value'        => false,
				'label'        => esc_html__( 'Full width gallery', 'modelicom' ),
				'desc'         => esc_html__( 'Enable full width container for gallery', 'modelicom' ),
				'left-choice'  => array(
					'value' => false,
					'label' => esc_html__( 'No', 'modelicom' ),
				),
				'right-choice' => array(
					'value' => true,
					'label' => esc_html__( 'Yes', 'modelicom' ),
				),
			),
			'margin'        => array(
				'label'   => esc_html__( 'Horizontal item margin (px)', 'modelicom' ),
				'desc'    => esc_html__( 'Select horizontal item margin', 'modelicom' ),
				'value'   => '30',
				'type'    => 'select',
				'choices' => array(
					'0'  => esc_html__( '0', 'modelicom' ),
					'1'  => esc_html__( '1px', 'modelicom' ),
					'2'  => esc_html__( '2px', 'modelicom' ),
					'10' => esc_html__( '10px', 'modelicom' ),
					'30' => esc_html__( '30px', 'modelicom' ),
				)
			),
			'responsive_lg' => array(
				'label'   => esc_html__( 'Columns on large screens', 'modelicom' ),
				'desc'    => esc_html__( 'Select items number on wide screens (>1200px)', 'modelicom' ),
				'value'   => '4',
				'type'    => 'select',
				'choices' => array(
					'1' => esc_html__( '1', 'modelicom' ),
					'2' => esc_html__( '2', 'modelicom' ),
					'3' => esc_html__( '3', 'modelicom' ),
					'4' => esc_html__( '4', 'modelicom' ),
					'6' => esc_html__( '6', 'modelicom' ),
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
					'4' => esc_html__( '4', 'modelicom' ),
					'6' => esc_html__( '6', 'modelicom' ),
				)
			),
			'responsive_sm' => array(
				'label'   => esc_html__( 'Columns on small screens', 'modelicom' ),
				'desc'    => esc_html__( 'Select items number on small screens (>768px)', 'modelicom' ),
				'value'   => '2',
				'type'    => 'select',
				'choices' => array(
					'1' => esc_html__( '1', 'modelicom' ),
					'2' => esc_html__( '2', 'modelicom' ),
					'3' => esc_html__( '3', 'modelicom' ),
					'4' => esc_html__( '4', 'modelicom' ),
					'6' => esc_html__( '6', 'modelicom' ),
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
					'4' => esc_html__( '4', 'modelicom' ),
					'6' => esc_html__( '6', 'modelicom' ),
				)
			),
			'show_filters'  => array(
				'type'         => 'switch',
				'value'        => false,
				'label'        => esc_html__( 'Show filters', 'modelicom' ),
				'desc'         => esc_html__( 'Hide or show categories filters', 'modelicom' ),
				'left-choice'  => array(
					'value' => false,
					'label' => esc_html__( 'No', 'modelicom' ),
				),
				'right-choice' => array(
					'value' => true,
					'label' => esc_html__( 'Yes', 'modelicom' ),
				),
			),
			'items_per_page' => array(
				'type'  => 'select',
				'value' => '12',
				'label' => esc_html__( 'Items Per Page', 'modelicom' ),
				'choices' => array(
					'2' =>  esc_html__('2 Items', 'modelicom'),
					'3' =>  esc_html__('3 Items', 'modelicom'),
					'4' =>  esc_html__('4 Items', 'modelicom'),
					'6' =>  esc_html__('6 Items', 'modelicom'),
					'8' =>  esc_html__('8 Items', 'modelicom'),
					'9' =>  esc_html__('9 Items', 'modelicom'),
					'12' =>  esc_html__('12 Items', 'modelicom'),
					'16' =>  esc_html__('16 Items', 'modelicom'),
				),
			)

		)
	)
);