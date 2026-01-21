<?php if (!defined('FW')) {
	die('Forbidden');
}

$options = array(
	'number'        => array(
		'type'       => 'slider',
		'value'      => 6,
		'properties' => array(
			'min'  => 1,
			'max'  => 48,
			'step' => 1,

		),
		'label'      => esc_html__('Items number', 'modelicom'),
		'desc'       => esc_html__('Number of posts to display', 'modelicom'),
	),
	'cat' => array(
		'type'  => 'multi-select',
		'label' => esc_html__('Select categories', 'modelicom'),
		'desc'  => esc_html__('You can select one or more categories', 'modelicom'),
		'population' => 'taxonomy',
		'source' => 'category',
		'prepopulate' => 10,
		'limit' => 100,
	)
);
