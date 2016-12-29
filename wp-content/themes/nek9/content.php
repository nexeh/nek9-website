<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage NEK9
 */
?>
<div class="container-fluid">
	<div class="panel panel-default">
	  <div class="panel-heading">
			<?php
				if ( is_single() ) :
					the_title( );
				else :
					the_title();
				endif;
			?>
		</div>
	  <div class="panel-body">
	    <?php the_content(); ?>
	  </div>
	 </div>
 </div>


