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
	<script type="text/javascript">
		if(navigator.userAgent.match(/Trident\/7\./) || navigator.userAgent.match(/Trident\/6\./)) { // if IE
	        jQuery('body').on("mousewheel", function () {
	            // remove default behavior
	            event.preventDefault(); 

	            //scroll without smoothing
	            var wheelDelta = event.wheelDelta;
	            var currentScrollPosition = window.pageYOffset;
	            window.scrollTo(0, currentScrollPosition - wheelDelta);
	        });
		}
	</script>
	<nav class="navbar navbar-default header-container">
	  <div class="container-fluid">
	    <div class="navbar-header header-content">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <div class="name hidden-xs"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/NEK9_logo_red.png"/>New England K9 Search and Rescue</div>
		  <div class="name visible-xs"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/NEK9_logo_red.png"/>NEK9</div>
	    </div>

	    <div class="collapse navbar-collapse navButtons" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
	        <?php wp_nav_menu( array( 
						'theme_location' => 'primary', 
						'menu_class'=> 'nav navbar-nav navbar-right' 
					) ); ?>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div class="site-container">