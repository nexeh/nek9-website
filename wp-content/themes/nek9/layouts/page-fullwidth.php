<?php
/**
 * Template Name: Full Width Page
 *
 * Displays a full width page.  
 *
 * @package nek9sar
 */

get_header(); ?>
<div class="col-xs-12 col-sm-12 col-md-12">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

</div><!-- .col-xs-12 col-sm-12 col-md-12 -->
<?php get_footer(); ?>