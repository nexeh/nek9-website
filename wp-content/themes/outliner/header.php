<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package outliner
 */
get_header('blank');?>

<?php $breadcrumb = get_theme_mod( 'breadcrumb',true ); ?>    

<div class="container breadcrumb">
	<?php if( $breadcrumb ) : ?>
		<div class="breadcrumb-left eight columns">
				<?php outliner_breadcrumbs(); ?>
		</div>
	<?php endif; ?> 
	<div class="breadcrumb-right eight columns">
		<?php the_title('<h4>','</h4>');?>
	</div>
</div>	
 
<?php do_action('outliner_before_header'); ?>
	<header id="masthead" class="site-header header-image header-wrap <?php echo outliner_site_style_header_class(); ?>" role="banner">
		<div class="branding ">
		 <?php if ( get_theme_mod ('header_overlay',false ) ) { 
				   echo '<div class="overlay overlay-header"></div>';     
				} ?>
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
	</header><!-- #masthead -->
	

