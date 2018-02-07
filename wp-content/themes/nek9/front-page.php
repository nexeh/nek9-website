<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage NEK9
 */

get_header(); ?>

<?php $my_query = new WP_Query( 'category_name=about' );
	while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
	<?php $custom_values = get_post_meta($post->ID, 'class'); ?>
	<div class="pad-section parallax-section <?php echo implode(" ",$custom_values); ?>">
	    <div class="container">
	      <div class="row">
	        <?php the_content(); ?>
	      </div>
	    </div>
	</div>			   
<?php endwhile; ?>

<?php get_footer(); ?>
