<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Single service loop item layout
 * also using as a default service view in a shortcode
 */

$ext_models_settings = fw()->extensions->get( 'models' )->get_settings();
$taxonomy_name = $ext_models_settings['taxonomy_name'];

$pID = get_the_ID();
$post_atts = fw_get_db_post_option($pID);

//Model parameters
$model_parameters = ! empty( $post_atts['params'] ) ? array_filter( $post_atts['params'] ) :  '';
$model_parameters = ! empty( $model_parameters ) ? $model_parameters :  fw_ext_models_get_model_params($pID);

$model_prices = array(
	'price_per_hour' => get_post_meta( $pID, 'price_per_hour', true ),
);
$model_prices = array_filter( $model_prices );

$absolute_css_class = has_post_thumbnail( $pID ) ? 'content-absolute' : '';

?>
<div class="vertical-item model-item overflow-hidden <?php echo esc_attr( $absolute_css_class ); ?>">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="item-media">
			<?php
			$full_image_src = wp_get_attachment_url( get_post_thumbnail_id( $pID ) );
			the_post_thumbnail('modelicom-model-width');
			?>
			<div class="media-links">
				<a class="abs-link" href="<?php the_permalink(); ?>"></a>
			</div>
		</div>
	<?php endif; //has_post_thumbnail ?>
	<div class="item-content hero-bg text-left">
		<?php if ( ! empty( $model_prices['price_per_hour'] ) || ! empty( $post_atts['currency'] ) ) : ?>
			<span class="price-per-hour color-main"><?php echo esc_html( $model_prices['price_per_hour'] ); ?>
				<span class="price-time"> <?php echo esc_html__( '/1h','mwt' ); ?></span>
				<span class="currency-symbol fw-800"><?php echo esc_html(  $post_atts['currency'] ) ; ?></span>
			</span>
		<?php endif; ?>
		<h6 class="model-name">
			<a href="<?php the_permalink(); ?>">
				<?php the_title('',','); ?>
				<?php if ( !empty( $model_parameters['age'] ) ) : ?>
					<span><?php echo esc_html( $model_parameters['age'] ); ?></span>
				<?php endif; ?>
			</a>
		</h6>
		<?php if ( ! empty( $post_atts['location'] ) ) : ?>
			<div class="model-location">
				<span><?php echo esc_html( $post_atts['location'] ); ?></span>
			</div>
		<?php endif; ?>
		<?php if( function_exists( 'fw_ext_feedback' ) ) { ?>
			<div class="model-rating text-center">
				<?php fw_ext_feedback(); ?>
			</div>
		<?php } ?>
			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .model-content  -->
		<?php if ( ! empty( $model_parameters ) ) : ?>
			<div class="model-parameters">
				<ul class="no-bullets mt-0">
					<?php foreach ( $model_parameters as $parameter_title => $parameter_value ) : ?>
						<?php if ( !empty( $parameter_title ) && ! empty( $parameter_value ) && empty( $atts['hide_' . $parameter_title] ) ) : ?>
							<li class="parameter">
								<span class="parameter-title"><?php echo esc_html( ucfirst( str_replace( array( '-', '_' ), ' ', $parameter_title ) ) ); ?>:</span>
								<span class="parameter-value color-grey"><?php echo esc_html( $parameter_value ); ?></span>
							</li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>
		<div class="model-footer">
			<a class="btn-link2" href="<?php the_permalink(); ?>"><span><?php esc_html_e('View profile', 'modelicom') ?></span></a>
			<?php if ( ! empty( $post_atts['phone'] ) ) : ?>
				<h6 class="model-phone mt-0 fw-300"><i class="fa fa-phone fs-18 mr-2"></i><?php echo esc_html( $post_atts['phone'] ); ?></h6>
			<?php endif; ?>
 		</div>
	</div>
</div><!-- eof .vertical-item -->