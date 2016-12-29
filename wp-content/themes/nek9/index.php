<?php get_header(); ?>
		
<header class="page-header">
	<h1 class="page-title"><?php single_post_title(); ?></h1>
</header>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					get_template_part( 'content', get_post_format());
				endwhile;
			endif;
			?>
	</main>
</div>

<?php get_footer();
