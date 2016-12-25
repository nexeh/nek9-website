<?php
/**
 * The front page template file.
 *
 *
 * @package outliner
 */	
if ( 'posts' == get_option( 'show_on_front' ) ) { 
	    include( get_home_template() );
	} else {

get_header('blank');     

    if ( get_theme_mod('page-builder',false ) && get_theme_mod('flexslider')  ) {  
        $header_class ='flex-header';
	    echo do_shortcode( get_theme_mod('flexslider'));
    }elseif( get_theme_mod('enable_slider',true) ) { 
			$header_class = 'flex-header';
			get_template_part('category-slider',true);
	}else {
		$header_class = 'default-header';
	}?>
		<header id="masthead" class="site-header <?php echo $header_class; ?>" role="banner">
			<div class="branding">
				<div class="container">
				<div class="five columns"> 
					<div class="site-branding">
					<?php 
						$logo_title = get_theme_mod( 'logo_title' );
						$logo = get_theme_mod( 'logo', '' );
						$tagline = get_theme_mod( 'tagline',true);
						if( $logo_title && function_exists( 'the_custom_logo' ) ) {
                                the_custom_logo();     
					        }elseif( $logo != '' && $logo_title ) { ?>
							   <h1 class="site-title img-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url($logo) ?>"></a></h1>
					<?php	}else { ?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						    <?php } ?>
					<?php if( $tagline ) : ?>
							<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					<?php endif; ?>
					</div><!-- .site-branding -->
					</div>
					<div class="eleven columns">
						<nav id="site-navigation" class="main-navigation clearfix" role="navigation">
							<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( 'Primary Menu', 'outliner' ); ?></button>
							<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
						</nav><!-- #site-navigation -->
					</div>
					</div>
				</div><!-- .branding -->

	   </header><!-- #masthead -->
<?php if ( get_theme_mod('page-builder',false ) ) { ?>
		<div id="content" class="site-content">
		<div class="container">
			<?php  if( get_theme_mod('home_sidebar',false ) ) { ?>
				<div id="primary" class="content-area eleven columns">
			<?php }else { ?>
			    <div id="primary" class="content-area sixteen columns">
			<?php } ?>  
				<main id="main" class="site-main" role="main"><?php
						while ( have_posts() ) : the_post();     
							the_content();
						endwhile; ?>
			     </main><!-- #main -->
		     </div><!-- #primary -->
<?php	} else{ ?>

	<div id="content" class="site-content free-home">
			<div class="container">	
     	<?php  if( get_theme_mod('home_sidebar',false ) ) { ?>
				<div id="primary" class="content-area eleven columns">
			<?php }else { ?>
			    <div id="primary" class="content-area sixteen columns">
			<?php } ?>  
		<main id="main" class="site-main" role="main">
		<?php 
			$service_top_page = get_theme_mod('service_top_page');
				// WP_Query arguments
		if( get_theme_mod('enable_top_service',true ) ) {
			if ( $service_top_page ) {
				$args = array(
					'post_type' => 'page',
					'page_id' => $service_top_page,		
				);	
				if( isset($args) ) :
					// The Query
					$query = new WP_Query( $args );
					if( $query->have_posts()) : ?>
						<div class="services-top-wrapper row"><?php 
						    while($query->have_posts()) :
								$query->the_post(); ?>
							    <div class="service-top"><?php 
							        the_content(); 
							    	if( has_post_thumbnail() ) : ?>
							    		<span>
							    		<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php the_post_thumbnail(); ?></a>
							    		</span><?php
							        endif; ?>  	
							    </div><?php 
							endwhile; ?>
						</div><?php 
					endif; 
					$query = null;
					$args = null;
					wp_reset_postdata();
				endif; 
			}else { ?>
			    <div class="services-top-wrapper row">
				    <div class="service-top">
				    	<h1><?php _e('Service Top Wrapper','outliner');?></h1>
			            <p><?php printf( __('You haven\'t created any service page yet. Create Page. Go to <a href="%1$s">Customizer</a> and click Outliner Options => Home => Service Top Page and select page from  dropdown page list.','outliner'),  admin_url('customize.php') );?></p>
				    	<span>
				    		<?php echo '<img src="' . get_template_directory_uri() . '/images/home-screen.png" alt="" >';?>
				    	</span>
				    </div>
				</div><?php 
			}
	    }

		    do_action('outliner_service_content_before'); 

			if(get_theme_mod('enable_service',true) ) { 
			    $service = get_theme_mod('service_count',4 );
			    $service_pages = array();
			    for ( $i = 1 ; $i <= $service ; $i++ ) {
					$service_page = absint(get_theme_mod('service_'.$i));
					if( $service_page ){
                        $service_pages[] = $service_page;
					}
			    }
			    if( $service_pages && !empty( $service_pages ) ) {
					$args = array(
						'post_type' => 'page',
						'post__in' => $service_pages,
						'posts_per_page' => -1 ,
						'orderby' => 'post__in'
					);
			    }elseif( current_user_can('manage_options') ) { ?>
	                 <div class="services-wrapper row">
						 <div class="one-fourth service column">
						 	<span class="demo-thumb">
						 		<i class="fa fa-flag fa-4x"></i>	
						 	</span>
						 	<h2><?php _e('Service Section #1','outliner');?></h2>
				 	        <p><?php printf( __('You haven\'t created any service page yet. Create Page. Go to <a href="%1$s">Customizer</a> and click Outliner Options => Home => Service Section #1 and select page from  dropdown page list.','outliner'), admin_url('customize.php'));?></p>
						 </div>
						 <div class="one-fourth service column">
						 	<span class="demo-thumb">
						 		<i class="fa fa-random fa-4x"></i>	
						 	</span>
						 	<h2><?php _e('Service Section #2','outliner');?></h2>
				 	        <p><?php printf( __('You haven\'t created any service page yet. Create Page. Go to <a href="%1$s">Customizer</a> and click Outliner Options => Home => Service Section #2 and select page from  dropdown page list.','outliner'), admin_url('customize.php') );?></p>
						</div>
						 <div class="one-fourth service column">
						 	<span class="demo-thumb">
						 		<i class="fa fa-mobile fa-4x"></i>	
						 	</span>
						 	<h2><?php _e('Service Section #3','outliner');?></h2>
				 	        <p><?php printf( __('You haven\'t created any service page yet. Create Page. Go to <a href="%1$s">Customizer</a> and click Outliner Options => Home => Service Section #3 and select page from  dropdown page list.','outliner'), admin_url('customize.php') );?></p>
						 </div>
						 <div class="one-fourth service column">
						 	<span class="demo-thumb">
						 		<i class="fa fa-thumb-tack fa-4x"></i>	
						 	</span>
						 	<h2><?php _e('Service Section #4','outliner');?></h2>
				 	        <p><?php printf( __('You haven\'t created any service page yet. Create Page. Go to <a href="%1$s">Customizer</a> and click Outliner Options => Home => Service Section #4 and select page from  dropdown page list.','outliner'), admin_url('customize.php') );?></p>
						 </div>
				    </div><?php 
				}

				if( isset($args) ) :
					$query = new WP_Query($args);
					if( $query->have_posts()) : ?>
						<div class="services-wrapper row"><?php
					        while($query->have_posts()) :
								$query->the_post(); ?>
							    <div class="one-fourth service column">
							    	<?php if( has_post_thumbnail() ) : ?>
							    		<span>
							    		    <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php the_post_thumbnail('recent_page_img'); ?></a>
							    		</span>
							    	<?php endif; 
							    	the_content(); ?>
							    </div><?php 
							endwhile; ?>
						</div><?php 
					endif; 
					$query = null;
					$args = null;
					wp_reset_postdata();
			    endif;
		    }
		
		
			do_action('outliner_service_content_after');

			if(get_theme_mod('enable_recent_post_service',true) ) { 
				outliner_recent_posts(); 
			} 	

	    if( get_theme_mod('enable_home_default_content',false ) ) {  ?>
			<div class="container default-home-page"><?php
				while ( have_posts() ) : the_post();       
					the_content();
				endwhile; ?>
	         </div><?php 
	    } ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
}
if( get_theme_mod('home_sidebar',false ) ) { 
   get_sidebar();
}
 get_footer(); 
} ?>