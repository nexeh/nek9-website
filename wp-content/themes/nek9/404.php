<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package nek9sar
 */

get_header(); ?>
<div class="col-xs-12 col-sm-12 col-md-12">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'nek9sar' ); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location.', 'nek9sar' ); ?></p>
				</div>
			</section>
		</main>
	</div>
</div>
<?php get_footer(); ?>