<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package nek9sar
 */
?>
</div><!-- .row -->
</div><!-- .container -->
	</div><!-- #content -->
	
<div class="container-fluid">
<div class="row">
	<span class="scrollup-icon"><a href="#" class="scrollup"></a></span>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
		<div class="row">
		<?php if ( is_active_sidebar( 'footer-left' ) || is_active_sidebar( 'footer-mid' ) || is_active_sidebar( 'footer-right' ) ) : ?>
			<div class="footer-widget-area">
				<div class="col-md-4">
					<div class="left-footer">
						<?php get_sidebar( 'footer-left' ); ?>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="mid-footer">
						<?php get_sidebar( 'footer-mid' ); ?>					
					</div>
				</div>

				<div class="col-md-4">
					<div class="right-footer">
						<?php get_sidebar( 'footer-right' ); ?>					
					</div>
				</div>						
			</div><!-- .footer-widget-area -->
		<?php endif; ?>
	</div><!-- .row -->
</div><!-- .container -->		
	<div class="footer-site-info">
		<div class="container">
		<div class="row">
			<div class="footer-details-container">
				<div class="copyright-container">

					<div class="col-xs-12 col-md-6 col-sm-6">
						<?php 
							$footer_copyright_text = get_theme_mod( 'footer_copyright_text', '' );
							if( ! empty( $footer_copyright_text ) ) {
								echo wp_kses_post( $footer_copyright_text ); 
							} else {
								$site_link = '<a href="' . esc_url( home_url( '/' ) ) .'" title="' . esc_attr( get_bloginfo( 'name' ) ) . '" rel="home">' . esc_attr( get_bloginfo( 'name' ) ) . '</a>';
								printf( __( 'Copyright &copy; 2017 %1$s %2$s.', 'nek9sar' ), date( 'Y' ), $site_link );
							} ?>
					</div>
					<div class="col-xs-12 col-md-6 col-sm-6 fr">
						<div class="credit-container">
							
						</div>
					</div>
					
				</div><!-- .footer-details-container -->
			</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- .row -->
</div><!-- .container-fluid -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>