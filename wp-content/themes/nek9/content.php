<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage NEK9
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<?php
			if ( is_single() ) :
				the_title( );
			else :
				the_title();
			endif;
		?>
	</header>
	<div class="entry-content">
		<?php the_content();
		?>
	</div>
	<footer></footer>
</article>
