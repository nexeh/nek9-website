<?php
/**
 * @package outliner
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
	<header class="entry-header ">  	
	    <?php if ( get_theme_mod('enable_single_post_top_meta', true ) ): ?>			
		    <?php if ( 'post' == get_post_type() ) : ?>
				<span class="date-structure">				
					<span class="dd"><?php the_time('j '); ?></span>
					<span class="mm"><?php the_time('m'); ?> </span>
					<span class="yy"><?php the_time('y'); ?> </span>
				</span>
			    <div class="entry-meta">
				    <?php if(function_exists('outliner_entry_top_meta') ) {
				         outliner_entry_top_meta();
				     } ?>
				</div><!-- .entry-meta -->
			<?php endif; 
		endif;?>
	
		<br class="clear">
	</header><!-- .entry-header -->



	<div class="entry-content">
	 <?php
			$single_featured_image = get_theme_mod( 'single_featured_image',true );
			$single_featured_image_size = get_theme_mod ('single_featured_image_size',1);
			if ($single_featured_image_size != 3 ) {
			if ( $single_featured_image ) :
	 		if ( $single_featured_image_size == 1 ) :?>
	 			<div class="post-thumb blog-thumb">
	 				<?php  if( has_post_thumbnail() && ! post_password_required() ) :   
					the_post_thumbnail('outliner-blog-large-width');  
			
					endif;?>
				</div><?php
		 		else: ?>
		 		<div class="post-thumb blog-thumb"><?php
		 			if( has_post_thumbnail() && ! post_password_required() ) :   
					the_post_thumbnail('outliner-small-featured-image-width');		
					endif;?>
				</div><?php
			endif; 
			endif;
} ?>
	     <div class="entry-body">
			<div class="title-meta">
				<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
			</div>
		    <?php the_content(); ?>
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

	<?php outliner_post_nav(); ?>
	
</article><!-- #post-## -->
