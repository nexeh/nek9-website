
<!--Layout for the Default Page-->

<?php get_header(); ?>
<div class="col-xs-12 col-sm-12 col-md-12">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'page' ); ?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

</div><!-- .col-xs-12 col-sm-6 col-md-8 -->
<?php get_footer(); ?>