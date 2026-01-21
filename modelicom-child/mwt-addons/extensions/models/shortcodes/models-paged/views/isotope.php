<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $paged
 * @var array $atts
 * @var array $posts
 */

//1 - col-*-12
//2 - col-*-6
//3 - col-*-4
//4 - col-*-3
//6 - col-*-2

//bootstrap col-lg-* class
$exl_class = '';
switch ( $atts['responsive_exl'] ) :
	case ( 1 ) :
		$exl_class = 'col-exl-12';
		break;

	case ( 2 ) :
		$exl_class = 'col-exl-6';
		break;

	case ( 3 ) :
		$exl_class = 'col-exl-4';
		break;

	case ( 4 ) :
		$exl_class = 'col-exl-3';
		break;
	//6
	default:
		$exl_class = 'col-exl-2';
endswitch;

$lg_class = '';
switch ( $atts['responsive_lg'] ) :
	case ( 1 ) :
		$lg_class = 'col-xl-12';
		break;

	case ( 2 ) :
		$lg_class = 'col-xl-6';
		break;

	case ( 3 ) :
		$lg_class = 'col-xl-4';
		break;

	case ( 4 ) :
		$lg_class = 'col-xl-3';
		break;
	//6
	default:
		$lg_class = 'col-xl-2';
endswitch;

//bootstrap col-md-* class
$md_class = '';
switch ( $atts['responsive_md'] ) :
	case ( 1 ) :
		$md_class = 'col-lg-12';
		break;

	case ( 2 ) :
		$md_class = 'col-lg-6';
		break;

	case ( 3 ) :
		$md_class = 'col-lg-4';
		break;

	case ( 4 ) :
		$md_class = 'col-lg-3';
		break;
	//6
	default:
		$md_class = 'col-lg-2';
endswitch;

//bootstrap col-sm-* class
$sm_class = '';
switch ( $atts['responsive_sm'] ) :
	case ( 1 ) :
		$sm_class = 'col-md-12';
		break;

	case ( 2 ) :
		$sm_class = 'col-md-6';
		break;

	case ( 3 ) :
		$sm_class = 'col-md-4';
		break;

	case ( 4 ) :
		$sm_class = 'col-md-3';
		break;
	//6
	default:
		$sm_class = 'col-md-2';
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
switch ( $atts['margin'] ) :
	case ( 0 ) :
		$columns_class = 'c-mb-0';
		break;

	case ( 1 ) :
		$columns_class = 'c-mb-1';
		break;

	case ( 2 ) :
		$columns_class = 'c-mb-2';
		break;

	case ( 10 ) :
		$columns_class = 'c-mb-5';
		break;

	case ( 40 ) :
		$columns_class = 'c-mb-40';
		break;

	case ( 50 ) :
		$columns_class = 'c-mb-50';
		break;

	case ( 60 ) :
		$columns_class = 'c-mb-60';
		break;
	//6
	default:
		$columns_class = 'c-mb-30';
endswitch;


$unique_id = uniqid();
$categories = fw_ext_extension_get_listing_categories( $atts['cat'], 'models' );
$sort_classes = fw_ext_extension_get_sort_classes( $posts->posts, $categories, '', 'models' );
$margin_class = $atts['gutter'];
$link = $atts['link_banner'];

if ( $atts['show_sort_form'] ) :
	fw_ext_models_print_filter_form();
endif;
?>

<div class="models-paged-shortcode models-grid-view <?php echo esc_attr( $margin_class . ' ' . $columns_class . ' ' . $atts['list_columns'] ); ?>
	items-xs-<?php echo esc_attr( $atts['responsive_xs'] ); ?>
	items-sm-<?php echo esc_attr( $atts['responsive_sm'] ); ?>
	items-md-<?php echo esc_attr( $atts['responsive_md'] ); ?>
	items-lg-<?php echo esc_attr( $atts['responsive_lg'] ); ?> list-view
">
    <div class="row">
        <?php
            $counter = 1;
            while ( $posts->have_posts() ) :
                if( $counter !== 2 ) :
                $posts->the_post(); ?>
            <div
                    class=" <?php echo esc_attr( 'item-layout-' . $atts['item_layout'] . ' ' . $exl_class . ' ' . $lg_class . ' ' . $md_class . ' ' . $sm_class . ' ' . $xs_class . ' ' . $sort_classes[get_the_ID()] ); ?>">
                <?php
                include( fw()->extensions->get( 'models' )->locate_view_path( esc_attr( $atts['item_layout'] ) ) );
                ?>
            </div>
        <?php
            else : ?>
                <?php if ( ! empty( $atts['image_banner'] ) ) : ?>
                    <div class="model-banner <?php echo esc_attr( $exl_class . ' ' . $lg_class . ' ' . $md_class . ' ' . $sm_class . ' ' . $xs_class . ' ' . $sort_classes[get_the_ID()] ); ?>">
                        <?php if( $link ) : ?>
                        <a href="<?php echo esc_url( $link ); ?>">
                            <div class="ls item-media">
                                <?php endif; ?>
                                <img src="<?php echo esc_url( $atts['image_banner']['url'] ); ?>"
                                    alt="<?php echo esc_html__('banner', 'mwt'); ?>">
                                <?php if( $link ) : ?>
                            </div>
                        </a>
                        <?php endif; ?>
                    </div>
                <?php endif;
            endif;
            $counter++;
        endwhile; ?>
    </div><!-- eof .isotope-wrapper -->
</div><!-- eof .columns_padding_* -->
<?php

$pagination = paginate_links(
	array(
		'current' => $paged,
		'total' => $posts->max_num_pages
	)
);

if ( $atts['show_pagination'] ) :
	if( $pagination ) :
		?>
		<nav class="pagination model-pagination">
			<div class="nav-links">
				<?php echo wp_kses_post( $pagination ); ?>
			</div>
		</nav>
	<?php
	endif;
endif;
wp_reset_postdata(); // reset the query
