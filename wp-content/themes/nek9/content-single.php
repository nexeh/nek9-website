<?php
/**
 * The template used for displaying post content in single.php
 *
 * @package nek9sar
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php nek9sar_posted_on(); 
			if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'nek9sar' ), __( '1 Comment', 'nek9sar' ), __( '% Comments', 'nek9sar' ) ); ?></span>
			<?php endif; ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<?php nek9sar_featured_image(); ?>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'nek9sar' ),
				'after'  => '</div>',
				'link_before' => '<span>',
				'link_after' => '</span>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer-insinglepost">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'nek9sar' ) );

			if ( nek9sar_categorized_blog() ) {
				echo '<span class="cat-links">' . $category_list . '</span>';
			} 

			echo get_the_tag_list('<span class="tags-links">',', ','</span>');
		?>

		<?php edit_post_link( __( 'Edit', 'nek9sar' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->