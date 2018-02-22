<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<?php $custom_values = get_post_meta($post->ID, 'class'); ?>
	<div class="parallax-section <?php echo implode(" ",$custom_values); ?>">
	    <div class="container fill-height">
	      <div class="row fill-height parallax-content-single">
			<?php the_content(); ?>
	      </div>
	    </div>
	  </div>	
<?php endwhile; ?>
<?php get_footer(); ?>

