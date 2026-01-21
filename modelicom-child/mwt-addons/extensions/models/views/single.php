<?php
if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * The template for displaying single service
 *
 */

get_header();
$pID       = get_the_ID();
$unique_id = uniqid();
$show_post_thumbnail = ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) ? false : true;
$shortcodes_extension = fw()->extensions->get( 'shortcodes' );

$fw_ext_models_gallery_image     = fw()->extensions->get( 'models' )->get_config( 'image_sizes' );
$fw_ext_models_gallery_large_img = $fw_ext_models_gallery_image['large-image'];
$fw_ext_models_gallery_main_img  = $fw_ext_models_gallery_image['main-image'];
$fw_ext_models_gallery_thumbs    = $fw_ext_models_gallery_image['gallery-thumb'];

//Get images
$thumbnails = fw_ext_models_get_model_images();

//Getting taxonomy name
$ext_models_settings = fw()->extensions->get( 'models' )->get_settings();
$taxonomy_name       = $ext_models_settings['taxonomy_name'];

$atts = fw_get_db_post_option( get_the_ID() );

//Model parameters
$model_parameters = ! empty( $atts['params'] ) ? array_filter( $atts['params'] ) :  '';
$model_parameters = ! empty( $model_parameters ) ? $model_parameters :  fw_ext_models_get_model_params(get_the_ID());

$model_prices = array(
	'price_per_hour' => get_post_meta( $pID, 'price_per_hour', true ),
	'price_per_two_hours' => get_post_meta( $pID, 'price_per_two_hours', true ),
	'price_per_night' => get_post_meta( $pID, 'price_per_night', true  )
);
$model_prices = array_filter( $model_prices );
?>
	<div id="content" class="col-12 content">
		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="row">
					<div class="col-md-12">
						<div class="text-center d-flex align-items-center justify-content-md-between model-header mb-55">
							<?php
							the_title( '<h2 class="model-name m-0">', '</h2>' );
							if( function_exists( 'fw_ext_feedback' ) ) {
								?>
								<div class="ml-md-4 mr-md-auto">
									<?php fw_ext_feedback(); ?>
								</div>
								<?php
							}
							if ( ! empty( $atts['phone'] ) ) : ?>
								<div class="model-phone-top"><h5><i class="fa fa-phone color-main fs-32 mr-2"></i><?php echo esc_html( $atts['phone'] ); ?></h5></div>
							<?php
							endif;
							if ( ! empty( json_decode( $atts['form']['json'] )[1] ) ) : ?>
								<!-- Modal -->
								<div class="modal fade" id="model-modal-contact-form" tabindex="-1" role="dialog">
									<div class="modal-dialog " role="document">
										<div class="modal-content ls">
											<div class="modal-body">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<?php echo '<h4 class="modal-title">' . esc_html__( 'Contact Model', 'mwt' ) . ' </h4>'; ?>
												<?php echo fw_ext( 'shortcodes' )->get_shortcode( 'contact_form' )->render( $atts ); ?>
											</div>
										</div>
									</div>
								</div>
								<!-- Button trigger modal -->
								<button type="button" class="pull-lg-right btn btn-outline-maincolor wide_button ml-md-auto mr-md-auto mr-lg-0 mt-md-20 mt-xl-0" data-toggle="modal" data-target="#model-modal-contact-form">
									<?php esc_html_e( 'Zamów konsultację', 'mwt' ); ?>
								</button>
							<?php endif; //form ?>
						</div><!-- .d-flex -->
					</div><!-- .col- -->
					<div class="col-md-6">
						<div class="model-meta">
							<!-- Model media -->
							<?php if ( ! empty( $atts['model-video']['url'] ) ) : ?>
								<div class="video-wrap mb-30 mb-lg-50">
									<video id="myVideo" width="720" controls>
										<source src="<?php echo esc_url( $atts['model-video']['url'] ); ?>" type="<?php echo esc_attr( get_post_mime_type( $atts['model-video']['attachment_id'] ) ); ?>">
									</video>
								</div><!-- .video-wrap -->
							<?php endif; ?>

							<!-- Model media -->
							<?php if ( ! empty( $thumbnails ) ) : ?>
								<div class="model-images">
									<div class="model-figure">
										<?php foreach ( $thumbnails as $key => $thumbnail ) :
											$attachment = get_post( $thumbnail['attachment_id'] );
											$image = fw_resize( $thumbnail['attachment_id'], $fw_ext_models_gallery_main_img['width'], $fw_ext_models_gallery_main_img['height'], $fw_ext_models_gallery_main_img['crop'] );
											?>
											<div data-thumb="<?php echo esc_attr( $image ) ?>"
											>
												<a href="<?php echo esc_url( $image ) ?>" data-index="<?php echo esc_attr( $key ) ?>">
													<img src="<?php echo esc_url( $image ) ?>"
														 alt="<?php echo esc_attr( $attachment->post_title ) ?>"
														 data-caption="caption-<?php echo esc_attr( $attachment->ID ) ?>"
														 data-src="<?php echo esc_attr( $image ) ?>"
														 data-large_image="<?php echo esc_attr( $image ) ?>"
														 data-large_image_width="<?php echo esc_attr( $fw_ext_models_gallery_large_img['width'] ) ?>"
														 data-large_image_height="<?php echo esc_attr( $fw_ext_models_gallery_large_img['height'] ) ?>"
													>
												</a>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
							<?php else : ?>
								<!-- Feature image (if gallery is empty) -->
								<?php the_post_thumbnail( 'modelicom-model-width' ); ?>
							<?php endif; ?>

							<!-- Gallery thumbnails -->
							<?php if ( ! empty( $thumbnails ) ) : ?>
								<div class="model-slider-thumbs">
									<ul class="slides">
										<?php foreach ( $thumbnails as $thumbnail ) :
											$attachment = get_post( $thumbnail['attachment_id'] );
											$image = fw_resize( $thumbnail['attachment_id'], $fw_ext_models_gallery_thumbs['width'], $fw_ext_models_gallery_thumbs['height'], $fw_ext_models_gallery_thumbs['crop'] );
											?>
											<li>
												<img src="<?php echo esc_url( $image ) ?>"
													 alt="<?php echo esc_attr( $attachment->post_title ) ?>"
													 title="thumb-<?php echo esc_attr( $attachment->ID ) ?>"
													 width="<?php echo esc_attr( $fw_ext_models_gallery_thumbs['width'] ) ?>"
													 height="<?php echo esc_attr( $fw_ext_models_gallery_thumbs['height'] ) ?>"
												/>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							<?php endif; ?>

							<!-- Model contacts -->
							<?php if ( ! empty( $atts['icons'] ) ) : ?>
								<div class="model-info">
									<?php
									if ( ! empty( $shortcodes_extension ) ) {
										echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_list' )->render( array( 'icons' => $atts['icons'] ) );
									}
									?>
								</div><!-- eof contacts -->
							<?php endif; //contacts ?>

							<!-- Model contacts -->
							<?php if ( ! empty( $atts['phone'] ) || ! empty( $atts['location'] ) || ! empty( $atts['email'] ) ) : ?>
								<ul class="model-info list-bordered my-60">
									<?php if ( ! empty( $atts['location'] ) ) : ?>
										<li class="model-location"><h6 class="mb-0"><?php esc_html_e( 'Location', 'mwt' ); ?>:</h6> <span><?php echo esc_html( $atts['location'] ); ?></span></li>
									<?php endif; ?>
									<?php if ( ! empty( $atts['phone'] ) ) : ?>
										<li class="model-phone"><h6 class="mb-0"><?php esc_html_e( 'Phone', 'mwt' ); ?>:</h6> <span><?php echo esc_html( $atts['phone'] ); ?></span></li>
									<?php endif; ?>
									<?php if ( ! empty( $atts['email'] ) ) : ?>
										<li class="model-email links-maincolor">
											<h6 class="mb-0"><?php esc_html_e( 'Email', 'mwt' ); ?>:</h6>
											<a href="mailto:<?php echo esc_html( $atts['email'] ); ?>">
												<?php echo esc_html( $atts['email'] ); ?>
											</a>
										</li>
									<?php endif; ?>
								</ul>
								<!-- eof .model-info -->
							<?php endif; //contacts ?>

							<!-- Social icons -->
							<?php if ( ! empty( $atts['social_icons'] ) ) : ?>
								<div class="models-social-icons mb-55 mb-md-0">
									<?php
									if ( ! empty( $shortcodes_extension ) ) {
										echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $atts['social_icons'] ) );
									}
									?>
								</div><!-- eof social icons -->
							<?php endif; //social icons ?>
						</div>
					</div>
					<!-- .col-md-6 -->
					<div class="col-md-6">
						<div class="model-content">
							<?php if ( ! empty( $model_parameters ) ) : ?>
								<div class="model-parameters pb-30 pb-lg-45 box-shadow">
									<h6 class="mb-20"><?php esc_html_e( 'Parameters:', 'mwt' ); ?></h6>
									<ul class="d-grid-2-cols">
										<?php foreach ( $model_parameters as $parameter_title => $parameter_value ) : ?>
											<?php if ( !empty( $parameter_title ) && ! empty( $parameter_value ) ) : ?>
												<li class="parameter">
													<span class="parameter-title"><?php echo esc_html( ucfirst( str_replace( array( '-', '_' ), ' ', $parameter_title ) ) ); ?>:</span>
													<span class="parameter-value color-darkgrey fw-600"><?php echo esc_html( $parameter_value ); ?></span>
												</li>
											<?php endif; ?>
										<?php endforeach; ?>
									</ul>
								</div>
							<?php endif;

							$content = get_the_content();
							if( ! empty( $content ) ) : ?>
								<div class="model-text pb-30 pb-lg-55 box-shadow">
									<?php the_content(); ?>
								</div><!-- .model-content  -->
							<?php
							endif; //$content

							if ( ! empty( $atts['skills'] ) ) : ?>
								<div class="model-skills pb-15 pb-lg-35 box-shadow">
									<h6 class="mb-25"><?php esc_html_e( 'Languages:', 'mwt' ); ?></h6>
									<div class="model-lang">
										<?php foreach ( $atts['skills'] as $skill ) :
											echo fw_ext( 'shortcodes' )->get_shortcode( 'progress_bar' )->render( $skill );
										endforeach; ?>
									</div>
								</div>
							<?php endif; //skills check

							$services = wp_tag_cloud( array(
								'taxonomy' => 'fw-models-service',
								'smallest'   => '14',
								'largest'    => '14',
								'unit'       => 'px',
								'format'     => 'array',
								'echo'       => false,

							) );

							if( ! empty( $services ) ) : ?>
								<div class="model-services pb-25 pb-lg-45 box-shadow">
									<h6 class="mb-20"><?php esc_html_e( 'Services', 'mwt' ); ?></h6>
									<div class="services-items links-grey">
										<?php echo get_the_term_list( $pID, 'fw-models-service' ); ?>
									</div>
								</div><!-- .model-services -->

							<?php endif; //tags

							if ( ! empty( $model_prices ) ) : ?>
								<div class="model-prices pb-35 pb-lg-53 box-shadow">
									<h6 class="mb-25"><?php esc_html_e( 'Prices:', 'mwt' ); ?></h6>
									<ul class="price-list">
										<?php if ( !empty( $model_prices['price_per_hour'] ) ) : ?>
											<li>
												<span class="price-title"><?php echo esc_html__('1 Hour', 'mwt' ); ?></span>
												<span class="price-value color-darkgrey fw-600">
													<?php if ( !empty( $atts['currency'] ) ) : ?>
														<span class="currency-symbol"><?php echo esc_html(  $atts['currency'] ) ; ?></span>
													<?php endif; ?>
													<?php echo esc_html( $model_prices['price_per_hour'] ) ; ?>
												</span>
												<?php if ( !empty(  $atts['price_label_button'] ) ) : ?>
													<span class="price-button text-right mr-0">
														<a href="<?php echo esc_attr( $atts['price_link_button'] ) ?>" class="pull-right btn-link2">
															<?php echo esc_html( $atts['price_label_button'] ); ?>
														</a>
													</span>
												<?php endif; ?>
											</li>
										<?php endif; ?>
										<?php if ( !empty( $model_prices['price_per_two_hours'] ) ) : ?>
											<li>
												<span class="price-title"><?php echo esc_html__('2 Hours', 'mwt' ); ?></span>
												<span class="price-value color-darkgrey fw-600">
													<?php if ( !empty( $atts['currency'] ) ) : ?>
														<span class="currency-symbol"><?php echo esc_html(  $atts['currency'] ) ; ?></span>
													<?php endif; ?>
													<?php echo esc_html( $model_prices['price_per_two_hours'] ); ?>
												</span>
												<?php if ( !empty(  $atts['price_label_button'] ) ) : ?>
													<span class="price-button text-right mr-0">
														<a href="<?php echo esc_attr( $atts['price_link_button'] ) ?>" class="pull-right btn-link2">
															<?php echo esc_html( $atts['price_label_button'] ); ?>
														</a>
													</span>
												<?php endif; ?>
											</li>
										<?php endif; ?>
										<?php if ( !empty( $model_prices['price_per_night'] ) ) : ?>
											<li>
												<span class="price-title"><?php echo esc_html__('Night', 'mwt' ); ?></span>
												<span class="price-value color-darkgrey fw-600">
													<?php if ( !empty( $atts['currency'] ) ) : ?>
														<span class="currency-symbol"><?php echo esc_html(  $atts['currency'] ) ; ?></span>
													<?php endif; ?>
													<?php echo esc_html( $model_prices['price_per_night'] ); ?>
												</span>
												<?php if ( !empty(  $atts['price_label_button'] ) ) : ?>
													<span class="price-button text-right mr-0">
														<a href="<?php echo esc_attr( $atts['price_link_button'] ) ?>" class="pull-right btn-link2">
															<?php echo esc_html( $atts['price_label_button'] ); ?>
														</a>
													</span>
												<?php endif; ?>
											</li>
										<?php endif; ?>
									</ul>
								</div>
							<?php endif;

							if( ! empty( get_the_term_list( $pID, 'fw-models-tag') ) ) : ?>
								<div class="model-tags pb-30 pb-lg-50 box-shadow">
									<h6 class="mb-28"><?php esc_html_e( 'Tags:', 'mwt' ); ?></h6>
									<div class="widget_tag_cloud">
										<?php echo get_the_term_list( $pID, 'fw-models-tag' ); ?>
									</div>
								</div><!-- .model-tags -->
							<?php endif;

							?>

							<!-- Delete comments -->
							<div class="comments-area-feedback HUYIO">
								<?php
								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) {
									comments_template();
								}
								?>
							</div>

						</div>
					</div>
				</div><!-- .row -->

			</div><!-- #post-## -->

		<?php endwhile; ?>

	</div><!--eof #content -->
<?php
get_footer();