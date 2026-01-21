<?php if (!defined('FW')) {
	die('Forbidden');
}

$portfolio = fw()->extensions->get('portfolio');
if (empty($portfolio)) {
	return;
}

$ext_portfolio_settings = fw()->extensions->get('portfolio')->get_settings();
$taxonomy = $ext_portfolio_settings['taxonomy_name'];

$options = array(
	'layout'        => array(
		'label'   => esc_html__('Portfolio Layout', 'modelicom'),
		'desc'    => esc_html__('Choose projects layout', 'modelicom'),
		'value'   => 'isotope',
		'type'    => 'select',
		'choices' => array(
			'carousel' => esc_html__('Carousel', 'modelicom'),
			'isotope'  => esc_html__('Masonry Grid', 'modelicom'),
		)
	),
	'item_layout'   => array(
		'label'   => esc_html__('Item layout', 'modelicom'),
		'desc'    => esc_html__('Choose Item layout', 'modelicom'),
		'value'   => 'item-regular',
		'type'    => 'select',
		'choices' => array(
			'item-regular'  => esc_html__('Regular (just image)', 'modelicom'),
			'item-title'    => esc_html__('Image with title', 'modelicom'),
			'item-extended' => esc_html__('Image with title and excerpt', 'modelicom'),
		)
	),
	'number'        => array(
		'type'       => 'slider',
		'value'      => 6,
		'properties' => array(
			'min'  => 1,
			'max'  => 48,
			'step' => 1, // Set slider step. Always > 0. Could be fractional.

		),
		'label'      => esc_html__('Items number', 'modelicom'),
		'desc'       => esc_html__('Number of portfolio projects tu display', 'modelicom'),
	),
	'margin'        => array(
		'label'   => esc_html__('Horizontal item margin (px)', 'modelicom'),
		'desc'    => esc_html__('Select horizontal item margin', 'modelicom'),
		'value'   => '30',
		'type'    => 'select',
		'choices' => array(
			'0'  => esc_html__('0', 'modelicom'),
			'1'  => esc_html__('1px', 'modelicom'),
			'2'  => esc_html__('2px', 'modelicom'),
			'10' => esc_html__('10px', 'modelicom'),
			'30' => esc_html__('30px', 'modelicom'),
		)
	),
	'responsive_lg' => array(
		'label'   => esc_html__('Columns on wide screens', 'modelicom'),
		'desc'    => esc_html__('Select items number on wide screens (>1200px)', 'modelicom'),
		'value'   => '4',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__('1', 'modelicom'),
			'2' => esc_html__('2', 'modelicom'),
			'3' => esc_html__('3', 'modelicom'),
			'4' => esc_html__('4', 'modelicom'),
			'6' => esc_html__('6', 'modelicom'),
		)
	),
	'responsive_md' => array(
		'label'   => esc_html__('Columns on middle screens', 'modelicom'),
		'desc'    => esc_html__('Select items number on middle screens (>992px)', 'modelicom'),
		'value'   => '3',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__('1', 'modelicom'),
			'2' => esc_html__('2', 'modelicom'),
			'3' => esc_html__('3', 'modelicom'),
			'4' => esc_html__('4', 'modelicom'),
			'6' => esc_html__('6', 'modelicom'),
		)
	),
	'responsive_sm' => array(
		'label'   => esc_html__('Columns on small screens', 'modelicom'),
		'desc'    => esc_html__('Select items number on small screens (>768px)', 'modelicom'),
		'value'   => '2',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__('1', 'modelicom'),
			'2' => esc_html__('2', 'modelicom'),
			'3' => esc_html__('3', 'modelicom'),
			'4' => esc_html__('4', 'modelicom'),
			'6' => esc_html__('6', 'modelicom'),
		)
	),
	'responsive_xs' => array(
		'label'   => esc_html__('Columns on extra small screens', 'modelicom'),
		'desc'    => esc_html__('Select items number on extra small screens (<767px)', 'modelicom'),
		'value'   => '1',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__('1', 'modelicom'),
			'2' => esc_html__('2', 'modelicom'),
			'3' => esc_html__('3', 'modelicom'),
			'4' => esc_html__('4', 'modelicom'),
			'6' => esc_html__('6', 'modelicom'),
		)
	),
	'show_filters'  => array(
		'type'         => 'switch',
		'value'        => false,
		'label'        => esc_html__('Show filters', 'modelicom'),
		'desc'         => esc_html__('Hide or show categories filters', 'modelicom'),
		'left-choice'  => array(
			'value' => false,
			'label' => esc_html__('No', 'modelicom'),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__('Yes', 'modelicom'),
		),
	),
	'cat' => array(
		'type'  => 'multi-select',
		'label' => esc_html__('Select categories', 'modelicom'),
		'desc'  => esc_html__('You can select one or more categories', 'modelicom'),
		'population' => 'taxonomy',
		'source' => $taxonomy,
		'prepopulate' => 100,
		'limit' => 100,
	)
);
