<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */

$icon_array = modelicom_get_unyson_icon_type_v2_array( $atts, 'icon' );
$icon_styled_class = modelicom_get_unyson_icon_styled_class( $atts );

//for counter
$number                  = isset( $atts['number'] ) ? ( int ) $atts['number'] : false;
$counter_additional_text = isset( $atts['counter_additional_text'] ) ? $atts['counter_additional_text'] : false;
$speed                   = isset( $atts['speed'] ) ? $atts['speed'] : false;

$title = $atts['title'];
$content = $atts['content'];
$link = $atts['link'];
$button = $atts['button']['button'];
$show_button = ( ! empty( $link ) && ! empty( $atts['button']['show_button'] ) && ! empty( $button['label'] ) ) ? true : false;
$wide_button = ( ! empty( $button['wide_button'] ) ? 'wide_button' : '' );
$button_class = !empty( $button['custom_class'] ) ? $button['custom_class'] : '';
switch ($atts['style']) :
    case 'top':
?>
<div class="icon-box <?php echo esc_attr( trim( $atts['background_color'] . ' ' . $atts['text_align'] . ' ' . $atts['class'] ) ); ?>">
<?php if( $link ) : ?>
    <a href="<?php echo esc_url( $link ); ?>">
<?php endif; ?>
    <div class="icon-styled <?php echo esc_attr( $icon_styled_class ); ?>">
        <?php echo wp_kses_post( $icon_array['icon_html'] ); ?>
    </div>
<?php if( $link ) : ?>
    </a>
<?php endif; ?>
	<?php if ( $counter_additional_text ) : ?>
	<h3 class="counter-wrap highlight">
		<span class="counter" data-from="0" data-to="<?php echo esc_attr( $number ); ?>"
			  data-speed="<?php echo esc_attr( $speed ); ?>">0</span>
		<span class="counter-add"><?php echo esc_html( $counter_additional_text ); ?></span>
	</h3>
	<?php else : //no counter adds ?>
	<h3 class="counter highlight" data-from="0" data-to="<?php echo esc_attr( $number ); ?>"
		data-speed="<?php echo esc_attr( $speed ); ?>">
		0
	</h3>
	<?php endif; //$counter_additional_text
if( $title ) : ?>
    <h3>
    <?php if( $link ) : ?>
        <a href="<?php echo esc_url( $link ); ?>">
    <?php endif; ?>
        <?php echo wp_kses_post( $atts['title'] ); ?>
    <?php if( $link ) : ?>
        </a>
    <?php endif; ?>
    </h3>
<?php endif; ?>
<?php if( $content ) : ?>
    <p><?php echo wp_kses_post( $atts['content'] ); ?></p>
<?php endif; ?>
<?php if ( $show_button ) : ?>
	<a href="<?php echo esc_url( $link ); ?>"
	   class="mt-30 <?php echo esc_attr( $button['color'] . ' ' . $wide_button . ' ' . $button_class ); ?>"><?php echo esc_html( $button['label'] ); ?></a>
<?php endif; ?>
</div><!-- .icon-box -->
<?php
    break;
    case 'left':
?>
<div class="media <?php echo esc_attr( trim( $atts['background_color'] . ' ' . $atts['text_align'] . ' ' . $atts['class'] ) ); ?>">
    <?php if( $link ) : ?>
    <a href="<?php echo esc_url( $link ); ?>">
        <?php endif; ?>
        <div class="icon-styled <?php echo esc_attr( $icon_styled_class ); ?>">
            <?php echo wp_kses_post( $icon_array['icon_html'] ); ?>
        </div>
        <?php if( $link ) : ?>
    </a>
<?php endif; ?>
    <div class="media-body">
	    <?php if ( $counter_additional_text ) : ?>
		<h3 class="counter-wrap highlight">
					<span class="counter" data-from="0" data-to="<?php echo esc_attr( $number ); ?>"
						  data-speed="<?php echo esc_attr( $speed ); ?>">0</span>
					<span class="counter-add"><?php echo esc_html( $counter_additional_text ); ?></span>
		</h3>
	    <?php else : //no counter adds ?>
		<h3 class="counter highlight" data-from="0" data-to="<?php echo esc_attr( $number ); ?>"
			data-speed="<?php echo esc_attr( $speed ); ?>">
			0
		</h3>
		<?php endif; //$counter_additional_text
    if( $title ) : ?>
        <h3>
        <?php if( $link ) : ?>
            <a href="<?php echo esc_url( $link ); ?>">
        <?php endif; ?>
                <?php echo wp_kses_post( $atts['title'] ); ?>
        <?php if( $link ) : ?>
            </a>
        <?php endif; ?>
        </h3>
    <?php endif; ?>
    <?php if( $content ) : ?>
        <p><?php echo wp_kses_post( $atts['content'] ); ?></p>
    <?php endif; ?>
    <?php if ( $show_button ) : ?>
	    <a href="<?php echo esc_url( $link ); ?>"
	       class="mt-30 <?php echo esc_attr( $button['color'] . ' ' . $wide_button . ' ' . $button_class ); ?>"><?php echo esc_html( $button['label'] ); ?></a>
    <?php endif; ?>
    </div>
</div><!-- .media -->
<?php
    //left
    break;
	case 'right':
?>
<div class="media <?php echo esc_attr( trim( $atts['background_color'] . ' ' . $atts['text_align'] . ' ' . $atts['class'] ) ); ?>">
    <div class="media-body">
	    <?php if ( $counter_additional_text ) : ?>
		<h3 class="counter-wrap highlight">
					<span class="counter" data-from="0" data-to="<?php echo esc_attr( $number ); ?>"
						  data-speed="<?php echo esc_attr( $speed ); ?>">0</span>
					<span class="counter-add"><?php echo esc_html( $counter_additional_text ); ?></span>
		</h3>
	    <?php else : //no counter adds ?>
		<h3 class="counter highlight" data-from="0" data-to="<?php echo esc_attr( $number ); ?>"
			data-speed="<?php echo esc_attr( $speed ); ?>">
			0
		</h3>
		<?php endif; //$counter_additional_text
		if( $title ) : ?>
            <h3>
                <?php if( $link ) : ?>
                <a href="<?php echo esc_url( $link ); ?>">
                    <?php endif; ?>
                    <?php echo wp_kses_post( $atts['title'] ); ?>
                    <?php if( $link ) : ?>
                </a>
            <?php endif; ?>
            </h3>
        <?php endif; ?>
        <?php if( $content ) : ?>
            <p><?php echo wp_kses_post( $atts['content'] ); ?></p>
        <?php endif; ?>
        <?php if ( $show_button ) : ?>
	        <a href="<?php echo esc_url( $link ); ?>"
	           class="mt-30 <?php echo esc_attr( $button['color'] . ' ' . $wide_button . ' ' . $button_class ); ?>"><?php echo esc_html( $button['label'] ); ?></a>
        <?php endif; ?>
    </div>
<?php if( $link ) : ?>
    <a href="<?php echo esc_url( $link ); ?>">
<?php endif; ?>
    <div class="icon-styled <?php echo esc_attr( $icon_styled_class ); ?>">
        <?php echo wp_kses_post( $icon_array['icon_html'] ); ?>
    </div>
<?php if( $link ) : ?>
    </a>
<?php endif; ?>
</div><!-- .media -->
<?php
    //right
    break;
    endswitch;