<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head();?>
</head>

<body>	
	<div class="container-fluid">
		<div class="row">
			<div class="top-bar">
				<div class="col-xs-12">
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
