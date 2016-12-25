<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package nek9sar
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">
	<div class="container-fluid">
	<div class="row">
	
	<header id="masthead" class="site-header" role="banner">
		<?php if( get_theme_mod( 'display_topbar', '1' ) == '1' ) { 
			get_template_part('inc/topbar');
		} ?>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-xs-12 col-lg-12">
					<div class="site-branding">
							<div class="site-logo-image">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" 
									<img src="<?php echo esc_url($site_logo); ?>" 
									alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"/>
								</a>
							</div>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					</div> <!-- .site-branding -->
				</div><!-- .col-md-6 .col-xs-12 .col-lg-6 -->
			</div><!-- .row -->
			<div class="row">
				<div class="col-md-12 col-xs-12 col-lg-12">
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
					</nav><!-- #site-navigation -->
					<a href="#" class="navbutton" id="main-nav-button">Main Menu</a>
					<div class="responsive-mainnav"></div>
				</div><!-- .col-md-6 .col-xs-12 .col-lg-6 -->
			</div><!-- .row -->
		</div><!-- container -->
	</header><!-- #masthead -->
	
	<?php if ( get_header_image() ) : ?>
		<figure class="nek9sar-header-image">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
			</a>
		</figure>
	<?php endif; // End header image check. ?>
	

	</div><!-- .row -->
	</div><!-- .container-fluid -->

	<div id="content" class="site-content">
<div class="container">
	<div class="row">