<?php
/**
 * The template for displaying category-slider 
 *
 * display slider
 *
 * @package Outliner
 */

$outliner_slider_cat = get_theme_mod( 'slider_cat', '' );
$outliner_slider_count = get_theme_mod( 'slider_count', 5 );
$outliner_slider_posts = array(
	'cat' => absint($outliner_slider_cat),
	'posts_per_page' => absint($outliner_slider_count)
); 

	if ($outliner_slider_cat) {

		$outliner_query = new WP_Query($outliner_slider_posts);
			if( $outliner_query->have_posts()) : ?>
				<div class="flexslider">
					<ul class="slides"><?php 
					    while($outliner_query->have_posts()) :
								$outliner_query->the_post();
								if( has_post_thumbnail() ) : ?>
								    <li><?php 
								     $header_class = 'flex-header'; ?>
								    	<div class="flex-image">
								    		<?php the_post_thumbnail('full'); ?>
								    	</div>
								    	<div class="flex-caption">
								    		<?php the_content(); ?>
								    	</div>
								    </li>
								<?php else:
								     $header_class = 'default-header'; ?>
								<?php endif; 
					    endwhile; ?>
					</ul>
				</div><?php 
			endif; 
			$outliner_query = null;
			wp_reset_postdata();	
	}elseif( current_user_can('manage_options') ) {	?>	
		    <div class="flexslider">  
				<ul class="slides">	          
					<li>   	
					<?php  $header_class = 'flex-header';?>
						<div class="flex-image">
							<?php echo '<img src="' . get_template_directory_uri() . '/images/slider.png" alt="" >';?>	
						</div>
						<?php	$slide_description = sprintf( __('<h1> Slider Setting </h1><p>You haven\'t created any slider yet. Create a post, set your slider image as Post\'s featured image ( Recommended image size 1280*450 ) ). Go to Customizer and click Outliner Options => Home and select Slider Post Category and No.of Sliders.<p><a href="%1$s"target="_blank"> Customizer </a></p>', 'outliner'),  admin_url('customize.php') );?>
						<div class="flex-caption"> <?php echo $slide_description;?></div>
					</li>
				</ul>
			</div><!-- flex-slider end -->	<?php
	}