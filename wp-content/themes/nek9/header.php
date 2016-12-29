<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="New England K9 Search & Rescue">
	<meta name="author" content="New England K9 Search & Rescue">

	<title>
		<?php wp_title( '|', true, 'right' ); ?>
	</title>
	<?php wp_head();?>
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
      <div class="row">
      		          <div class="col-xs-1">
		          	<div class="site-logo"><?php the_custom_logo(); ?></div>
		          </div>
		          <div class="col-xs-11">
			          <h1 class="site-title">
			          	<a href="<?php bloginfo( 'wpurl' );?>"><?php echo get_bloginfo( 'name' ); ?></a></h1>
			          </a>
		          </div>


	
	<div class="row">
	        <div id="navbar" class="collapse navbar-collapse">
				
					<div class="col-xs-12 text-right">
						<div class="main-navigation">
							<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
						</div>
					</div>
				</div>
	        </div>
		</div>
	

	</nav>

 <div class="container">



		


