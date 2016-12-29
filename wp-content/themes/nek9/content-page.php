<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage NEK9
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<?php the_title(); ?>
	</header>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<footer></footer>
</article>
