<?php
/**
 * Template part for displaying posts.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Outliner
 */
?>
<?php do_action('outliner_blog_layout_class_wrapper_before'); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php do_action('outliner_before_entry_header'); ?>

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
		endif; ?>
	
		<br class="clear">
	</header><!-- .entry-header -->
	
	<?php do_action('outliner_after_entry_header'); ?>
	<div class="entry-content">
	<?php 
		$featured_image = get_theme_mod( 'featured_image',true );
	  
	if( $featured_image ) : ?>
		<div class="post-thumb blog-thumb">
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
			/* translators: %s: Name of current post */
			the_content();
		?>
</div>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'outliner' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

<?php do_action('outliner_before_entry_footer'); ?>
	<?php if ( get_theme_mod('enable_single_post_bottom_meta', true ) ): ?>
		<footer class="entry-footer">
			<?php if(function_exists('outliner_entry_bottom_meta') ) {
			     outliner_entry_bottom_meta();
			} ?>
		</footer><!-- .entry-footer -->
	<?php endif;?>
<?php do_action('outliner_after_entry_footer'); ?>

</article><!-- #post-## -->

<?php do_action('outliner_blog_layout_class_wrapper_after'); ?>