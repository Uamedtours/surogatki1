<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$id = uniqid( 'testimonials-' );

?>

<?php if ( ! empty( $atts['title'] ) ): ?>
	<h3 class="fw-testimonials-title text-center"><?php echo esc_html( $atts['title'] ); ?></h3>
<?php endif; ?>
<div class="testimonials-slider owl-carousel text-center text-lg-left"
	 data-autoplay="true"
	 data-loop="true"
	 data-responsive-lg="1"
	 data-responsive-md="1"
	 data-responsive-sm="1"
	 data-nav="false"
	 data-dots="true"
>
	<?php foreach ( $atts['testimonials'] as $testimonial ): ?>
	<div class="quote-item">
		<div class="quote-image">
			<?php
			$author_image_url = ! empty( $testimonial['author_avatar']['url'] )
				? $testimonial['author_avatar']['url']
				: fw_get_framework_directory_uri( '/static/img/no-image.png' );
			?>
			<img src="<?php echo esc_attr( $author_image_url ); ?>"
				 alt="<?php echo esc_attr( $testimonial['author_name'] ); ?>"/>
		</div>
		<div class="quote-content">
			<p class="author-name small-text">
				<?php
				if ( $testimonial['author_url'] ) : ?>
				<a href="<?php echo esc_attr( $testimonial['author_url'] ); ?>">
					<?php endif; //site_url ?>
					<?php echo esc_html( $testimonial['author_name'] ); ?>
					<?php if ( $testimonial['author_url'] ) : ?>
				</a>
			<?php endif; //site_url ?>
			</p>
			<div class="author-rating">
				<div class="star-rating">
					<span style="width: <?php echo esc_attr( $testimonial['author_rating'] ); ?>%"></span>
				</div>
			</div>
			<p class="with-mark font-italic position-relative mt-20 mt-lg-30 mb-20">
				<?php echo esc_html( $testimonial['content'] ); ?>
			</p>

			<?php if ( ! empty( $testimonial['author_signature'] ) ) : ?>
				<img src="<?php echo esc_url( $testimonial['author_signature']['url'] ); ?>"
					 alt="<?php echo esc_attr( $testimonial['author_signature']['url'] ); ?>">
			<?php endif; ?>
		</div>
	</div>
	<?php endforeach; ?>
</div> <!-- .testimonials-slider.owl-carousel -->
