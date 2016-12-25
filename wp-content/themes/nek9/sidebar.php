<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package nek9sar
 */
?>
	<div id="secondary" class="widget-area" role="complementary">
		<?php if ( ! dynamic_sidebar( 'nek9sar-main-sidebar' ) ) : ?>
			<?php get_search_form(); ?>
		<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary -->
