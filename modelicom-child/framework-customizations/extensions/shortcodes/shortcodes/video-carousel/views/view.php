<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var $atts
 */

$items         = $atts['items'];
$loop          = $atts['loop'];
$nav           = $atts['nav'];
$dots          = $atts['dots'];
$center        = $atts['center'];
$autoplay      = $atts['autoplay'];
$responsive_lg = $atts['responsive_lg'];
$responsive_md = $atts['responsive_md'];
$responsive_sm = $atts['responsive_sm'];
$responsive_xs = $atts['responsive_xs'];
$margin        = $atts['margin'];

?>

<div class="video-carousel-wrap">

	<?php if ( !empty( wp_kses_post( $atts['title'] ) ) ) : ?>
		<h2><?php echo wp_kses_post( $atts['title'] ); ?></h2>
	<?php endif; ?>

	<div class="owl-carousel"
		 data-items="<?php echo esc_attr( $responsive_lg ); ?>"
		 data-loop="false"
		 data-nav="<?php echo esc_attr( $nav ); ?>"
		 data-dots="<?php echo esc_attr( $dots ); ?>"
		 data-center="<?php echo esc_attr( $center ); ?>"
		 data-autoplay="<?php echo esc_attr( $autoplay ); ?>"
		 data-responsive-lg="<?php echo esc_attr( $responsive_lg ); ?>"
		 data-responsive-md="<?php echo esc_attr( $responsive_md ); ?>"
		 data-responsive-sm="<?php echo esc_attr( $responsive_sm ); ?>"
		 data-responsive-xs="<?php echo esc_attr( $responsive_xs ); ?>"
		 data-margin="<?php echo esc_attr( $margin ); ?>"
	>
		<?php foreach ( $items as $item ) :

			$poster        = !empty( $item['image']['url'] ) ? esc_attr( $item['image']['url'] ) : '';
			$video_width   = !empty( $item['video_width'] ) ? esc_attr( $item['video_width'] ) : '100%';
			$video_height  = !empty( $item['video_height'] ) ? esc_attr( $item['video_height'] ) : '100%';

			if ( $item['video']['url'] ): ?>
				<div class="fw-video-wrap">
					<?php if ( !empty( $poster ) ) : ?>
						<img class="video-poster" src="<?php echo esc_url( $poster ); ?>" alt="<?php esc_html__('poster', 'modelicom' ); ?>">
					<?php endif; //image ?>
					<video class="item-video" controls width="<?php echo esc_attr( $video_width ); ?>" height="<?php echo esc_attr( $video_height ); ?>">
						<source src="<?php echo esc_url( $item['video']['url'] ); ?>" type="<?php echo esc_attr( get_post_mime_type( $item['video']['attachment_id'] ) ); ?>">
					</video>
					<div class="play-button"></div>
				</div>
			<?php endif; //url
		endforeach; ?>
	</div>

</div>
