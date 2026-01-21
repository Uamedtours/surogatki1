<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 */

get_header();
$pID = get_the_ID();

$fw_ext_projects_gallery_image = fw()->extensions->get( 'portfolio' )->get_config( 'image_sizes' );
$fw_ext_projects_gallery_image = $fw_ext_projects_gallery_image['gallery-image'];
//no columns on single gallery page
$column_classes = modelicom_get_columns_classes();
$options = modelicom_get_options();
$hide_date = $options['blog_hide_date'];

?>
    <div id="content" class="<?php echo esc_attr( $column_classes['main_column_class'] ); ?>">
        <?php
        // Start the Loop.
        while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class( 'item-gallery vertical-item content-padding' ); ?>>
                    <div class="item-media">
                        <?php
                        $thumbnails = fw_ext_portfolio_get_gallery_images();
                        $captions   = array();
                        if ( ! empty( $thumbnails ) ) :
                            $loop = ( count( $thumbnails ) > 1 ) ? "true" : "false";
                            ?>
                            <div id="owl-carousel-<?php echo esc_attr( $pID ); ?>" class="owl-carousel"
                                 data-loop="<?php echo esc_attr( $loop ); ?>"
                                 data-margin="0"
                                 data-nav="false"
                                 data-dots="<?php echo esc_attr( $loop ); ?>"
                                 data-themeclass="owl-theme entry-thumbnail-carousel"
                                 data-center="false"
                                 data-items="1"
                                 data-autoplay="true"
                                 data-responsive-xs="1"
                                 data-responsive-sm="1"
                                 data-responsive-md="1"
                                 data-responsive-lg="1"
                            >
                                <?php foreach ( $thumbnails as $thumbnail ) :
                                    $attachment = get_post( $thumbnail['attachment_id'] );
                                    $captions[ $thumbnail['attachment_id'] ] = $attachment->post_title;
                                    $image = fw_resize( $thumbnail['attachment_id'], $fw_ext_projects_gallery_image['width'], $fw_ext_projects_gallery_image['height'], $fw_ext_projects_gallery_image['crop'] );
                                    ?>
                                    <div class="item">
                                        <img src="<?php echo esc_attr( $image ); ?>"
                                             class="portfolio-gallery-image"
                                             alt="<?php echo esc_attr( $attachment->post_title ); ?>"
                                             title="portfolio-gallery-image-<?php echo esc_attr( $attachment->ID ); ?>"
                                             width="<?php echo esc_attr( $fw_ext_projects_gallery_image['width'] ); ?>"
                                             height="<?php echo esc_attr( $fw_ext_projects_gallery_image['height'] ); ?>"
                                        >
                                    </div>
                                <?php endforeach ?>
                            </div>
                            <?php
                        else:
                            the_post_thumbnail( 'modelicom-full-width' );
                        endif; //more than one thumbnail check
                        ?>
                    </div><!-- .item-media -->
                    <div class="item-content entry-content box-shadow ls">
                        <div class="entry-meta d-lg-flex align-items-center justify-content-between">
                            <div class="inline-content mb-15 mb-lg-30">
                                <?php if ( 'fw-portfolio' == get_post_type() ) :
                                    modelicom_the_author( array(
                                        'before' => '<span class="links-darkgrey"><span class="author vcard"><i class="ico ico-user"></i>',
                                        'after' => '</span></span>',
                                        'link_class' => 'url fn n',
                                        'link_attributes' => 'rel="author"',
                                    ) );
                                    if ( ! $hide_date ) :
                                        modelicom_the_date( array(
                                            'before' => '<span class="links-darkgrey">',
                                            'after' => '</span>',
                                            'link_attributes' => 'rel="bookmark"',
                                            'time_tag_class' => 'entry-date'
                                        ) );
                                    endif; //!hide_date
                                endif; //'post' == get_post_type()?>
                            </div>

                        </div><!-- .entry-meta -->
                        <div class="entry-content">
                            <?php
                            the_content();
                            ?>
                        </div><!-- .entry-content -->
                        <div class="entry-footer d-md-flex align-items-center justify-content-between mt-30 mt-lg-53">
                            <?php modelicom_the_categories( array(
                                'items_separator' => ' ',
                            ) ); ?>
                            <span class="views-count">
                        <?php if ( !modelicom_get_option( 'blog_hide_view_count' ) ) :
                            modelicom_show_post_views_count();
                        endif; ?>
                        </span>
                        </div>
                    </div>
            </article><!-- #post-## -->

        <?php endwhile;
        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) {
            comments_template();
        }
        ?>
    </div><!--eof #content -->

<?php if ( $column_classes['sidebar_class'] ): ?>
	<!-- main aside sidebar -->
	<aside class="<?php echo esc_attr( $column_classes['sidebar_class'] ); ?>">
		<?php get_sidebar(); ?>
	</aside>
	<!-- eof main aside sidebar -->
	<?php
endif;
get_footer();