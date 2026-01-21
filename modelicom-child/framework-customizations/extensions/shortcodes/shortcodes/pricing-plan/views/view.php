<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var $atts The shortcode attributes
 */

switch ( $atts['layout'] ) :
	case '2':
		?>
		<div class="pricing-plan hero-bg <?php echo esc_attr( $atts['featured'] ); ?>">
			<?php if( ! empty( $atts['title'] ) ) : ?>
				<div class="plan-name">
					<h5>
						<?php echo wp_kses_post( $atts['title'] ); ?>
					</h5>
				</div>
			<?php endif; ?>
			<div class="price-wrap">
				<h6>
					<?php if( ! empty( $atts['currency'] ) ) : ?>
						<span class="plan-sign"><?php echo wp_kses_post( $atts['currency'] ); ?></span>
					<?php endif;
					if( ! empty( $atts['price'] ) ) : ?>
						<span class="plan-price"><?php echo wp_kses_post( $atts['price'] ); ?></span>
					<?php endif; ?>
				</h6>
				<?php if( ! empty( $atts['price_after'] ) ) : ?>
					<div class="plan-decimals color-darkgrey"><?php echo wp_kses_post( $atts['price_after'] ); ?></div>
				<?php endif; ?>
			</div>
			<?php if( ! empty( $atts['description'] ) ) : ?>
				<div class="plan-description fs-24 color-darkgrey">
					<?php echo wp_kses_post( $atts['description'] ); ?>
				</div>
			<?php endif;
			if( ! empty( $atts['features'] ) ) : ?>
				<div class="plan-features">
					<ul class="list-bordered">
						<?php foreach( ( $atts['features'] ) as $feature ) : ?>
							<li class="<?php echo esc_attr( $feature['feature_checked'] ); ?>">
								<?php echo wp_kses_post( $feature['feature_name'] ); ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>
			<div class="plan-button">
				<?php if ( !empty( $atts['price_buttons'] ) ) : ?>
					<?php foreach( $atts['price_buttons'] as $button ) : ?>
						<?php echo fw()->extensions->get('shortcodes')->get_shortcode('button')->render($button); ?>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
		<?php
		//2
		break;
	case '3':
		?>
		<div class="pricing-plan bordered <?php echo esc_attr( $atts['featured'] ); ?>">
			<?php if( ! empty( $atts['title'] ) ) : ?>
				<div class="plan-name bg-maincolor">
					<h6>
						<?php echo wp_kses_post( $atts['title'] ); ?>
					</h6>
				</div>
			<?php endif; ?>
			<div class="price-wrap">
				<h6>
					<?php if( ! empty( $atts['currency'] ) ) : ?>
						<span class="plan-sign"><?php echo wp_kses_post( $atts['currency'] ); ?></span>
					<?php endif;
					if( ! empty( $atts['price'] ) ) : ?>
						<span class="plan-price"><?php echo wp_kses_post( $atts['price'] ); ?></span>
					<?php endif; ?>
				</h6>
				<?php if( ! empty( $atts['price_after'] ) ) : ?>
					<div class="plan-decimals color-darkgrey"><?php echo wp_kses_post( $atts['price_after'] ); ?></div>
				<?php endif; ?>
			</div>
			<?php if( ! empty( $atts['description'] ) ) : ?>
				<div class="plan-description fs-24 color-darkgrey">
					<?php echo wp_kses_post( $atts['description'] ); ?>
				</div>
			<?php endif;
			if( ! empty( $atts['features'] ) ) : ?>
				<div class="plan-features">
					<ul class="list-bordered">
						<?php foreach( ( $atts['features'] ) as $feature ) : ?>
							<li class="<?php echo esc_attr( $feature['feature_checked'] ); ?>">
								<?php echo wp_kses_post( $feature['feature_name'] ); ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>
			<div class="plan-button">
				<?php if ( !empty( $atts['price_buttons'] ) ) : ?>
					<?php foreach( $atts['price_buttons'] as $button ) : ?>
						<?php echo fw()->extensions->get('shortcodes')->get_shortcode('button')->render($button); ?>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
		<?php
		//3
		break;
	default:
		?>
		<div class="pricing-plan bordered <?php echo esc_attr( $atts['featured'] ); ?>">
			<?php if( ! empty( $atts['title'] ) ) : ?>
				<div class="plan-name">
					<h5>
						<?php echo wp_kses_post( $atts['title'] ); ?>
					</h5>
				</div>
			<?php endif; ?>
			<div class="price-wrap color-darkgrey">
				<h6>
					<?php if( ! empty( $atts['currency'] ) ) : ?>
						<span class="plan-sign"><?php echo wp_kses_post( $atts['currency'] ); ?></span>
					<?php endif; ?>
					<?php if( ! empty( $atts['price'] ) ) : ?>
						<span class="plan-price"><?php echo wp_kses_post( $atts['price'] ); ?></span>
					<?php endif; ?>
				</h6>
				<?php if( ! empty( $atts['price_after'] ) ) : ?>
					<div class="plan-decimals color-darkgrey"><?php echo wp_kses_post( $atts['price_after'] ); ?></div>
				<?php endif; ?>
			</div>
			<?php if( ! empty( $atts['description'] ) ) : ?>
				<div class="plan-description fs-24 color-darkgrey">
					<?php echo wp_kses_post( $atts['description'] ); ?>
				</div>
			<?php endif;
			if( ! empty( $atts['features'] ) ) : ?>
				<div class="plan-features">
					<ul class="list-bordered">
						<?php foreach( ( $atts['features'] ) as $feature ) : ?>
							<li class="<?php echo esc_attr( $feature['feature_checked'] ); ?>">
								<?php echo wp_kses_post( $feature['feature_name'] ); ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>
			<div class="plan-button">
				<?php if ( !empty( $atts['price_buttons'] ) ) : ?>
					<?php foreach( $atts['price_buttons'] as $button ) : ?>
						<?php echo fw()->extensions->get('shortcodes')->get_shortcode('button')->render($button); ?>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	<?php endswitch;