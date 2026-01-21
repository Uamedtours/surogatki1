<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var $atts
 */

//1 - col-*-12
//2 - col-*-6
//3 - col-*-4
//4 - col-*-3
//6 - col-*-2

//bootstrap col-lg-* class
$lg_class = '';
switch ( $atts['responsive_lg'] ) :
    case ( 1 ) :
        $lg_class = 'col-lg-12';
        break;

    case ( 2 ) :
        $lg_class = 'col-lg-6';
        break;

    case ( 3 ) :
        $lg_class = 'col-lg-4';
        break;

    case ( 4 ) :
        $lg_class = 'col-lg-3';
        break;
    //6
    default:
        $lg_class = 'col-lg-2';
endswitch;

//bootstrap col-md-* class
$md_class = '';
switch ( $atts['responsive_md'] ) :
    case ( 1 ) :
        $md_class = 'col-md-12';
        break;

    case ( 2 ) :
        $md_class = 'col-md-6';
        break;

    case ( 3 ) :
        $md_class = 'col-md-4';
        break;

    case ( 4 ) :
        $md_class = 'col-md-3';
        break;
    //6
    default:
        $md_class = 'col-md-2';
endswitch;

//bootstrap col-xl-* class
$xl_class = '';
switch ( $atts['responsive_xl'] ) :
    case ( 1 ) :
        $xl_class = 'col-xl-12';
        break;

    case ( 2 ) :
        $xl_class = 'col-xl-6';
        break;

    case ( 3 ) :
        $xl_class = 'col-xl-4';
        break;

    case ( 4 ) :
        $xl_class = 'col-xl-3';
        break;
    //6
    default:
        $xl_class = 'col-xl-2';
endswitch;

//bootstrap col-xs-* class
$xs_class = '';
switch ( $atts['responsive_xs'] ) :
    case ( 1 ) :
        $xs_class = 'col-12';
        break;

    case ( 2 ) :
        $xs_class = 'col-6';
        break;

    case ( 3 ) :
        $xs_class = 'col-4';
        break;

    case ( 4 ) :
        $xs_class = 'col-3';
        break;
    //6
    default:
        $xs_class = 'col-2';
endswitch;

//column paddings class
//margin values:
//0
//1
//2
//10
//30
$margin_class = '';
switch ( $atts['margin'] ) :
    case ( 0 ) :
        $margin_class = 'c-gutter-0';
        break;

    case ( 10 ) :
        $margin_class = 'c-gutter-10';
        break;
    case ( 20 ) :
        $margin_class = 'c-gutter-20';
        break;
    case ( 40 ) :
        $margin_class = 'c-gutter-40';
        break;
    case ( 60 ) :
        $margin_class = 'c-gutter-60';
        break;
    case ( 80 ) :
        $margin_class = 'c-gutter-80';
        break;
    //6
    default:
        $margin_class = 'c-gutter-30';
endswitch;

?>

<div class="row steps text-center <?php echo esc_attr( $margin_class . ' ' . $atts['class'] ); ?>">
    <?php foreach ( $atts['steps'] as $step ) : ?>
        <div class="step <?php echo esc_attr( $xl_class . ' ' . $lg_class . ' ' . $md_class . ' ' .$xs_class ); ?>">
            <?php
                $link = $step['link'];
                $icon_array = modelicom_get_unyson_icon_type_v2_array( $step, 'icon' );
                $icon_styled_class = modelicom_get_unyson_icon_styled_class( $step );
            ?>
            <div class="icon-box">
                    <?php if( $link ) : ?>
                    <a href="<?php echo esc_url( $link ); ?>">
                        <?php endif; ?>
                            <div class="position-relative icon-styled <?php echo esc_attr( $icon_styled_class ); ?>">
                                <?php echo wp_kses_post( $icon_array['icon_html'] ); ?>
                            </div>
                        <?php if( $link ) : ?>
                    </a>
                    <?php endif; ?>
                <?php if ( !empty( $step['title'] ) ) : ?>
                    <h5>
                        <?php if( $link ) : ?>
                            <a href="<?php echo esc_url( $link ); ?>">
                        <?php endif; ?>
                        <?php echo wp_kses_post( $step['title'] ); ?>
                        <?php if( $link ) : ?>
                            </a>
                        <?php endif; ?>
                    </h5>
                <?php endif; ?>
                <?php if ( !empty( $step['content'] ) ) : ?>
                    <div class="icon-content"><?php echo wp_kses_post( $step['content'] ); ?></div>
                <?php endif; ?>
            </div><!-- .icon-box -->
      </div><!-- .col -->
    <?php endforeach; ?>
</div>



