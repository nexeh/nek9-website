
    </div> <!-- /.container -->


    <footer id="" class="footer-container pad-section">
	    <div class="container">
	      <div class="row">
	        <div class="col-sm-4">
				<span class="nek9">New England K-9 Search & Rescue</span><br/>
				P.O. BOX 407<br/>
				Grantham, NH 03753<br/>
				<a href="mailto:info@nek9sar.org">info@nek9sar.org</a><br/>

				<br>

				Phone: 603-526-6754<br/>
				Pager: 877-730-2769 <br/>
				<br>
				<a href="https://www.facebook.com/nek9sar/"><img src="http://jeremycorson.com/nek9development/wp-content/themes/nek9/images/icon-faceboook.gif" alt="Facebook" style="width:30px;height:30px;" ></a>
				<a href="https://www.youtube.com/channel/UC-pWNJnDTN3a3K8_4DPqm-w"><img src="http://jeremycorson.com/nek9development/wp-content/themes/nek9/images/icon-you-tube.gif" alt="YouTube" style="width:30px;height:30px;" ></a>

			</div>
			<div class="col-sm-8">
				<?php
				//for each category, show all posts
			    $cat_args=array(
			        'orderby' => 'name',
			        'order' => 'DESC'
			    );
			    $categories=get_categories($cat_args);

			    foreach($categories as $category) {
			    	if ($category->name != 'Uncategorized') {
				        $args=array(
				            'category__in' => array($category->term_id),
				        );
				        $posts = get_posts($args);

				        if ($posts) {
				        	echo '<div class="col-sm-2 col-xs-12 pull-right">';
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
				    }// if ($category
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