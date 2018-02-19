
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

			</div>

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
	        <div class="col-sm-12 text-center copyright">
	        	<hr/>
	        	&copy; <script>document.write(new Date().getFullYear());</script> New England K9 Search & Rescue.
	        </div>
	      </div>
	    </div>
	 </footer>
	
	<script type="text/javascript"></script> 
  </body>
</html>