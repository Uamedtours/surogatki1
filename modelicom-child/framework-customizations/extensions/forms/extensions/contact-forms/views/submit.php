<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var int $form_id
 * @var string $submit_button_text
 * @var array $extra_data
 */

$submit_margin =  ( !empty ( $extra_data['submit_button_margin'] ) ) ? $extra_data['submit_button_margin'] : '';
?>
<div class="wrap-forms wrap-submit">
	<div class="row">
		<div class="col-12 col-sm-12 mt-20 mb-0 <?php echo esc_attr( $submit_margin ) ?>">
			<input class="<?php echo esc_attr( $extra_data['submit_button_color'] ) ?> wide_button" type="submit"
			       value="<?php echo esc_attr( $submit_button_text ) ?>"/>
			<?php if ( $extra_data['reset_button_text'] ) : ?>
				<input class="btn btn-maincolor" type="reset"
				       value="<?php echo esc_attr( $extra_data['reset_button_text'] ); ?>"/>
			<?php endif; ?>
			<?php if ( defined( 'FW' ) ) : ?>
				<?php FW_Flash_Messages::_print_frontend(); ?>
			<?php endif; ?>
		</div>
	</div>
</div>


