<!--Custom Page for the list of NEK9 Members -->
<?php get_header(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="panel panel-default">
	  <div class="panel-heading">
	  	<h1 class="panel-title"><?php the_title(); ?></h1>
	  </div>
	  <div class="panel-body">

		<?php 
			$args =  array( 
				'post_type' => 'members',
				'orderby' => 'menu_order',
				'order' => 'ASC'
			);
			 $custom_query = new WP_Query( $args );
            
            while ($custom_query->have_posts()) : $custom_query->the_post(); ?>

						<div class="row">
							<div class="col-sm-2">
								<?php if ( has_post_thumbnail() ) {
									the_post_thumbnail();	
								} ?>
							</div>
							<div class="col-sm-10">
								<div class="row">
									<div class="col-sm-12">
										<?php the_title(); ?>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="entry-content">
											<?php
												the_content();
											?>
										</div>
									</div>
								</div>
							</div>
						</div>

			<?php endwhile; ?>
	</div>
</article>


	<?php get_footer(); ?>
