<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage NEK9
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

				<?php if ( is_home() && ! is_front_page() ) : ?>
					<header>
						<?php single_post_title(); ?>
					</header>
				<?php endif; ?>
			
			<?php 
				$args =  array( 
					'post_type' => 'post',
					'orderby' => 'date',
					'order' => 'ASC'
				);
				$custom_query = new WP_Query( $args );
            
            while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
				<?php get_template_part( 'content', get_post_format() );
			endwhile; ?>
		</main>
	</div>

<?php get_footer(); ?>
