<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Display the stars in the form of introduction of review.
 * @var int $stars_number
 * @var string $input_name
 */
?>
<!--Rating-->
<div class="clearfix wrap-rating in-post">
    <div class="rating">
		<?php
		for ( $i = 1; $i <= $stars_number; $i ++ ) {
			echo '<span class="fa fa-star" data-vote="' . $i . '"></span>';
		}
		?>
	</div>
	<input type="hidden" name="<?php echo esc_attr($input_name); ?>" id="rate" value="">
</div>
<div class="rate-error"><?php echo esc_html__('Please rate the post.','modelicom') ?></div>

<!--/Rating-->