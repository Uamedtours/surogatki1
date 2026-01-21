<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>
<div class="contacts-list">
    <ul class="no-bullets">
		<?php foreach ( $atts['contacts_list'] as $item ): ?>
            <li class="contact-item">
				<?php if ( $item['title'] ): ?>
                    <span class="title">
                        <?php echo wp_kses_post( $item['title'] ); ?>
                    </span>
                    <span class="desc">
                        <?php echo wp_kses_post( $item['desc'] ); ?>
                    </span>
				<?php endif; ?>
            </li>
		<?php endforeach; ?>
    </ul>
</div>