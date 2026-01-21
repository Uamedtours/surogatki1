<?php if (!defined('FW')) {
	die('Forbidden');
}

$events = fw()->extensions->get('events');
if (empty($events)) {
	return;
}

$options = array(
	'number'        => array(
		'type'       => 'slider',
		'value'      => 6,
		'properties' => array(
			'min'  => 1,
			'max'  => 48,
			'step' => 1, // Set slider step. Always > 0. Could be fractional.

		),
		'label'      => esc_html__('Items number', 'modelicom'),
		'desc'       => esc_html__('Number of events to display', 'modelicom'),
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
	)
);
