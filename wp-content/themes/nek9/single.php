<?php get_header(); ?>		
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-8">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'single' ); ?>
			<?php endwhile; ?>
		</main>
	</div>
</div>
<?php get_footer(); ?>