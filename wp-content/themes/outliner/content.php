<?php
/**
 * @package outliner
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">  	
    <?php if ( get_theme_mod('enable_single_post_top_meta', true ) ): ?>
	    <?php if ( 'post' == get_post_type() ) : ?>	
			<span class="date-structure">				
				<span class="dd"><?php the_time('j '); ?></span>
				<span class="mm"><?php the_time('m'); ?> </span>
				<span class="yy"><?php the_time('y'); ?> </span>
			</span>
			<footer class="entry-meta">
				<?php if(function_exists('outliner_entry_top_meta') ) {
				    outliner_entry_top_meta(); 
				} ?> 
			</footer><!-- .entry-footer -->
		<?php endif;?>  
    <?php endif;?>  
	   <br class="clear">
    </header><!-- .entry-header -->
 
    <div class="entry-content">
	<?php 
		$featured_image = get_theme_mod( 'featured_image',true );
	  
	if( $featured_image ) : ?>
		<div class="thumb blog-thumb">
			<?php
			if( function_exists( 'outliner_featured_image' ) ) :
				outliner_featured_image();
			endif;
			?>
	    </div>
	<?php endif; ?> 
		      <div class="entry-body-wrapper">
				<div class="entry-body">		
				    <div class="title-meta">
					     <?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
					</div>
					<?php 
							the_content();
					?>
				</div>

					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'outliner' ),
							'after'  => '</div>',
						) );
					?>
	
			<?php if ( get_theme_mod('enable_single_post_bottom_meta', true ) ): ?>
		<footer class="entry-footer">
			<?php if(function_exists('outliner_entry_bottom_meta') ) {
			     outliner_entry_bottom_meta();
			} ?>
		</footer><!-- .entry-footer -->
	<?php endif;?>

    </div><!-- .entry-content -->


</article><!-- #post-## -->