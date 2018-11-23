
    </div> <!-- /.container -->


    <footer id="" class="footer-container pad-section">
	    <div class="container">
	      <div class="row">
	        <div class="col-sm-4 contact">
				<span class="nek9">New England K-9 Search and Rescue</span><br/>
				P.O. BOX 407<br/>
				Grantham, NH 03753<br/>
				<a href="mailto:info@nek9sar.org">info@nek9sar.org</a><br/>

				<br>

				Phone: 603-526-6754<br/>
				Emergency Pager: 877-730-2769 <br/>
				<br>
				<a href="https://www.facebook.com/nek9sar/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-faceboook.gif" alt="Facebook" style="width:30px;height:30px;" ></a>
				<a href="https://www.youtube.com/channel/UC-pWNJnDTN3a3K8_4DPqm-w"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-you-tube.gif" alt="YouTube" style="width:30px;height:30px;" ></a>

			</div>
			<div class="col-sm-8 menu">
				<?php
				//for each category, show all posts
			    $cat_args=array(
			        'orderby' => 'name',
			        'order' => 'ASC'
			    );
			    $categories=get_categories($cat_args);

			    foreach($categories as $category) {

			        $args=array(
			            'category__in' => array($category->term_id),
			        );
			        $posts = get_posts($args);

			        if ($posts) {
			        	echo '<div class="col-sm-2">';
			            echo '<h4>' . $category->name . '</h4> ';
			            echo '<ul>';
			            foreach($posts as $post) {
			                setup_postdata($post); ?>
			                <li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
			                <?php
			            } // foreach($posts
			            echo '</ul>';
			            echo '</div>';
			        } // if ($posts
			    } // foreach($categories
			    ?>
			</div>

	        </div>
	        <div class="col-sm-12 text-center copyright">
	        	<hr/>
	        	&copy; <script>document.write(new Date().getFullYear());</script> New England K9 Search & Rescue.
	        </div>
	      </div>
	    </div>
	 </footer>
  </body>
</html>