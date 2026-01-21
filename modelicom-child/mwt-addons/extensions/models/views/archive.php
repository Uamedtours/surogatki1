<?php
/**
 * The template for default displaying portfolio taxonomy
 */

//if our theme - using 'template-parts/models' layouts
//in other case using default layout
if( defined( 'MODELICOM_THEME_URI' ) ) :
	$layout = modelicom_get_option( 'models_layout', '1' );
	get_template_part( 'template-parts/models/archive/' . esc_attr( $layout ) );
else:

get_header();

//getting taxonomy name
$ext_models_settings = fw()->extensions->get( 'models' )->get_settings();
$taxonomy_name = $ext_models_settings['taxonomy_name'];

$categories = fw_ext_extension_get_listing_categories( array(), 'models' );
$sort_classes = fw_ext_extension_get_sort_classes( $wp_query->posts, $categories, '', 'models' );

$unique_id = uniqid();
?>
	<div id="content" class="col-12 col-xs-12 models-list">
		<?php
		// set count to 100000 to never show filters
		if ( count( $categories ) > 100000 ) : ?>
			<div class="filters isotope_filters-<?php echo esc_attr( $unique_id ); ?> text-center">
				<a href="#" data-filter="*" class="selected"><?php esc_html_e( 'All', 'mwt' ); ?></a>
				<?php foreach ( $categories as $category ) : ?>
					<a href="#"
					   data-filter=".<?php echo esc_attr( $category->slug ); ?>"><?php echo esc_html( $category->name ); ?></a>
				<?php endforeach; ?>
			</div><!-- eof isotope_filters -->
		<?php endif; //count subcategories check ?>
		<?php if ( have_posts() ) :
			fw_ext_models_print_filter_form();
			?>
			<div class="isotope-wrapper isotope row masonry-layout"
				<?php if ( count( $categories ) > 1 ) { ?>
					data-filters=".isotope_filters-<?php echo esc_attr( $unique_id ); ?>"
				<?php } ?>
			>
				<?php
				while ( have_posts() ) : the_post();
					?>
					<div
						class="isotope-item col-lg-4 col-md-6 col-sm-6 col-xs-12 col-12 <?php echo esc_attr( $sort_classes[get_the_ID()] ); ?>">
						<?php
						    include( fw()->extensions->get( 'models' )->locate_view_path( 'loop-item' ) );
						?>
					</div>
				<?php endwhile; ?>
			</div><!-- eof isotope-wrapper -->
			<?php
		else :
			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content', 'none' );
		endif; ?>
		<?php // Pagination.
			$pagination = paginate_links( array(
				'prev_text' => esc_html__( 'Prev', 'mwt' ),
				'next_text' => esc_html__( 'Next', 'mwt' ),
				'type'      => 'list',
			));
			if ($pagination) {
				echo '<nav class="pagination-nav">' . wp_kses_post( str_replace( 'page-numbers', 'page-numbers pagination', $pagination ) ) . '</nav>';
			}
		?>
	</div><!--eof #content -->
<?php

get_footer();

endif; //MODELICOM_THEME_URI
