<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="New England K9 Search and Rescue">
	<meta name="author" content="New England K9 Search and Rescue">

	<title>
		<?php wp_title( '|', true, 'right' ); ?>
	</title>
	<?php wp_head();?>
</head>

<body>
	<div class="site-container">
		<div class="header-container row">
			<div class="header-content">
				<div class="name">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/NEK9_logo_red.png"/>
				</div>
				<span class="visible-xs name" >NEK9</span>
				<button type="button" class="btn btn-default btn-lg visible-xs">
				  Menu
				</button>
				<span class="hidden-xs name" >New England K9 Search and Rescue</span>
				<div class="navButtons hidden-xs">
					<?php wp_nav_menu( array( 
						'theme_location' => 'primary', 
						'menu_class'=> '' 
					) ); ?>

				</div>
			</div>
		</div>







		


