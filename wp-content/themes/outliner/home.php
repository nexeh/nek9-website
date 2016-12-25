<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package outliner
 */

if( get_theme_mod('blog-slider',false) ) { 
	get_header('blank');
	$header_class = 'flex-header';
	get_template_part('category-slider'); ?>
		<header id="masthead" class="site-header <?php echo $header_class; ?>" role="banner">
			<div class="branding">
				<div class="container">
				<div class="five columns"> 
					<div class="site-branding">
					<?php 
						$logo_title = get_theme_mod( 'logo_title' );
						$logo = get_theme_mod( 'logo', '' );
						$tagline = get_theme_mod( 'tagline',true);
						if( $logo_title && function_exists( 'the_custom_logo' ) ) {
                                the_custom_logo();     
					        }elseif( $logo != '' && $logo_title ) { ?>
							   <h1 class="site-title img-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url($logo) ?>"></a></h1>
					<?php	}else { ?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						    <?php } ?>
					<?php if( $tagline ) : ?>
							<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					<?php endif; ?>
					</div><!-- .site-branding -->
					</div>
					<div class="eleven columns">
						<nav id="site-navigation" class="main-navigation clearfix" role="navigation">
							<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( 'Primary Menu', 'outliner' ); ?></button>
							<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
						</nav><!-- #site-navigation -->
					</div>
					</div>
				</div><!-- .branding -->
	    </header><!-- #masthead --><?php
} else{
   get_header();
}
?>

	<div id="content" class="site-content ">
		<div class="container">
		
	<?php if( get_theme_mod('blog_layout',1) != 3 && get_theme_mod('blog_layout',1) != 5 ) {
	   	   do_action('outliner_two_sidebar_left');
	   } ?>  

	<div id="primary" class="content-area <?php outliner_layout_class();?> columns">
		<main id="main" class="site-main blog-content <?php outliner_masonry_blog_layout_class();?>" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content-blog', get_post_format() );
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
	</div><!-- #primary -->

	<?php if( get_theme_mod('blog_layout',1) != 3 && get_theme_mod('blog_layout',1) != 5 ) {
	   	   do_action('outliner_two_sidebar_right');
	   } ?>	

<?php get_footer(); ?>
