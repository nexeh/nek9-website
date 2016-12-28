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
	<div class="container-fluid">
		<header id="site-header">
			<div class="row">
				<div class="top-bar">
					<div class="col-xs-12 text-right">
						<p>Facebook Link</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="header">
						<h1 class="title"><a href="<?php bloginfo( 'wpurl' );?>"><?php echo get_bloginfo( 'name' ); ?></a></h1>
						<p class="description"><?php echo get_bloginfo( 'description' ); ?></p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 text-right">
					<div class="main-navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
					</div>
				</div>
			</div>
		</header>
		<div class="row">
			<div class="header-image">
				<div class="col-xs-12">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
					</a>
				</div>
			</div>
		</div>

