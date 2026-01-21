<?php
/**
 * The template part for selected header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$options = modelicom_get_options();
$section = modelicom_get_section_options( $options, 'header_' );
$hide_search = $options['meta_search'];
$hide_login = $options['meta_login'];
$ogloszenie_page = get_page_by_title( 'Dodaj swoje ogłoszenie' );
$ogloszenie_url = $ogloszenie_page ? get_permalink( $ogloszenie_page ) : '#';

?>

<header class="page_header justify-nav-center <?php echo esc_attr( $section['section_class'] ); ?>"
	<?php echo ( !empty( $section['section_id'] ) ) ? 'id="'. esc_attr( $section['section_id'] ) . '"' : ''; ?>
	<?php echo ( !empty( $section['section_background_image'] ) ) ? 'style="'. esc_attr( $section['section_background_image'] ) . '"' : ''; ?>
>
    <div class="container<?php echo esc_attr( $section['section_container_class_suffix'] ); ?>">
        <div class="row align-items-center">
            <div class="col-xl-2 col-5">
				<?php get_template_part( 'template-parts/logo/header-logo' ); ?>
            </div>
            <div class="col-xl-8 col-1 order-3 order-lg-2">
                <!-- main nav start -->
                <nav class="top-nav">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_class'     => 'sf-menu nav',
						'container'      => 'ul'
					) );
					?>
                </nav>
            </div>
            <div class="col-5 col-lg-2 text-left text-lg-right top-includes-icon order-2 order-lg-3">
				
                <!-- Delete login and search -->

                <div class="header-cta mb-2 mb-lg-0">
                    <a class="btn btn-maincolor" href="<?php echo esc_url( $ogloszenie_url ); ?>">Dodaj swoje ogłoszenie</a>
                </div>

                <div class="drop-meta">
	                <?php if ( ! empty ( $options['meta_phone'] ) ) : ?>
                        <div class="dropdown">
                            <button class="dropdown-phone" type="button" id="dropdown-phone" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ico ico-phone-alt"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-phone">
                                <a class="fs-20 links-darkgrey" href="callto:<?php echo esc_attr( $options['meta_phone'] ); ?>">
                                    <?php echo esc_html( $options['meta_phone'] ); ?>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ( ! empty ( $options['meta_address'] ) ) : ?>
                        <div class="dropdown">
                            <button class="dropdown-address" type="button" id="dropdown-address" data-toggle="dropdown">
                                <i class="ico ico-map-marker-alt"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-address">
                                <p class="fs-20"><?php echo esc_html( $options['meta_address'] ); ?> </p>
                            </div>
                        </div>
                    <?php endif; ?>
	                <?php if ( ! empty ( $options['meta_email'] ) ) : ?>
                        <div class="dropdown">
                            <button class="dropdown-email" type="button" id="dropdown-email" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-email">
                                <a class="fs-20 links-darkgrey" href="mailto:<?php echo esc_attr( $options['meta_email'] ); ?>">
                                    <?php echo esc_html( $options['meta_email'] ); ?>
                                </a>
                            </div>
                        </div>
	                <?php endif; ?>
                </div>
            </div>

        </div>
        <!-- header toggler -->
        <span class="toggle_menu"><span></span></span>
    </div>
</header>
