<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 *  Portfolio - regular item layout
 */
?>
<div class="vertical-item gallery-item content-absolute text-center cs">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="item-media">
			<?php
			the_post_thumbnail('modelicom-square');
			?>
			<div class="media-links">
                <a class="abs-link" href="<?php the_permalink(); ?>"></a>
			</div>
		</div>
	<?php endif; //has_post_thumbnail ?>
	<div class="item-content">
		<h6 class="item-meta">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h6>
	</div>
</div>