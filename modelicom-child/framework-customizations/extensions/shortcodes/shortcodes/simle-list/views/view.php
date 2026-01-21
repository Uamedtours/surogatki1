<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$custom_class = !empty( $atts['custom_class'] ) ? $atts['custom_class'] : '';

?>

<div class="simple-list <?php echo esc_attr( $custom_class . ' ' . $atts['item_offset'] ); ?>">
	<ol class="<?php echo esc_attr( $atts['simple_list_type'] ); ?>">
		<?php foreach ( $atts['simple_list'] as $item ): ?>
			<li class="list-item">
				<span>
					<?php if ( !empty( $item['item_link'] ) ) : ?>
					<a href="<?php echo esc_url( $item['item_link'] ); ?>">
						<?php endif; ?>
						<?php if ( $item['list_item']  ): ?>
							<?php echo wp_kses_post( $item['list_item'] ); ?>
						<?php endif; ?>
						<?php if ( ! empty( $item['item_link'] ) ) : ?>
					</a>
					<?php endif; ?>
				</span>
			</li>
		<?php endforeach; ?>
	</ol>
</div>

