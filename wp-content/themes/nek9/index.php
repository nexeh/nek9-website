<?php get_header(); ?>
<div class="row">
	<div class="col-sm-8">
		<?php 
		if ( have_posts() ) : while ( have_posts() ) : the_post();
			get_template_part( 'content', get_post_format() );
		endwhile; ?>
		<?php endif; ?>
	</div>
	<div class="col-sm-4">
		<?php get_sidebar(); ?>
	</div>
</div> 
<?php get_footer(); ?>