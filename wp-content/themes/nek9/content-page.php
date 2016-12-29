<?php
/**
 * The template used for displaying page content 
 *
 * @package WordPress
 * @subpackage NEK9
 */
?>

<div class="panel panel-default">
  <div class="panel-heading">
  	<h1 class="panel-title"><?php the_title(); ?></h1>
  </div>
  <div class="panel-body">
    <?php the_content(); ?>
  </div>
</div>
