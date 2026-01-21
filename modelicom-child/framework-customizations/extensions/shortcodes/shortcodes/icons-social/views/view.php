<?php if (!defined('FW')) {
	die('Forbidden');
}

/**
 * @var array $atts
 */
?>
<span class="social-icons">
	<?php

	foreach ($atts['social_icons'] as $icon) :

	?>
		<a href="<?php echo esc_url($icon['icon_url']) ?>" class="<?php echo esc_attr($icon['icon'] . ' ' . $icon['show_icon']); ?> <?php echo esc_attr($icon['icon_class']); ?>">
			<?php if (!empty($icon['icon_title'])) : ?>
				<span><?php echo esc_html($icon['icon_title']); ?></span>
			<?php endif; ?>
		</a>
	<?php
	endforeach;
	?>
</span>