<?php
/**
 * The template for displaying search results pages.
 *
 * @package outliner
 */

get_header(); ?>
<div id="content" class="site-content">
		<div class="container">

		<?php do_action('outliner_two_sidebar_left'); ?>	
		
	<section id="primary" class="content-area <?php outliner_layout_class();?> columns">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'outliner' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );
				?>

			<?php endwhile; ?>

		
	<?php 
		if(  get_theme_mod ('numeric_pagination',true) && function_exists( 'outliner_pagination' ) ) : 
				outliner_pagination();
			else :
				outliner_post_nav();     
			endif; 
	?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

      <?php do_action('outliner_two_sidebar_right'); ?>
<?php get_footer(); ?>
