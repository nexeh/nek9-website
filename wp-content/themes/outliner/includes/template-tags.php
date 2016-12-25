<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package outliner
 */

if ( ! function_exists( 'outliner_posts_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function outliner_posts_nav() {    
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}    
	?>
	<nav class="navigation paging-navigation clearfix" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'outliner' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&lsaquo;</span> Older posts', 'outliner' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rsaquo;</span>', 'outliner' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'outliner_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function outliner_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {     
		return;
	}
	?>
	<nav class="navigation paging-navigation clearfix" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'outliner' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&lsaquo;</span> Older posts', 'outliner' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rsaquo;</span>', 'outliner' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'outliner_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function outliner_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation clearfix" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'outliner' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&lsaquo;</span>&nbsp;%title', 'Previous post link', 'outliner' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title&nbsp;<span class="meta-nav">&rsaquo;</span>', 'Next post link',     'outliner' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'outliner_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function outliner_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date('') ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( '%s', 'post date', 'outliner' ),
		'<i class="fa fa-clock-o"></i> <a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		_x( '%s', 'post author', 'outliner' ),
		'<i class="fa fa-user"></i> <span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';
	edit_post_link( __( 'Edit', 'outliner' ), '<span class="edit-link"><i class="fa fa-pencil"></i> ', '</span>' );
}
endif;

if ( ! function_exists( 'outliner_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function outliner_entry_footer() {
	// Hide category and tag text for pages.
	
	if ( 'post' == get_post_type() ) {    
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'outliner' ) );
		if ( $categories_list ) {
			printf( '<span class="cat-links"><i class="fa fa-folder-open"></i> ' . __( '%1$s ', 'outliner' ) . '</span>', $categories_list );
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'outliner' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links"><i class="fa fa-tags"></i> ' . __( '%1$s ', 'outliner' ) . '</span>', $tags_list );
		}
	}


	//if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		//echo '<span class="comments-link"> ';
		//comments_popup_link( __( 'Leave a comment', 'outliner' ), __( '1 Comment', 'outliner' ), __( '% Comments', 'outliner' ) );
		//echo '</span>';
	//}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function outliner_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'outliner_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'outliner_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so outliner_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so outliner_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in outliner_categorized_blog.
 */
function outliner_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'outliner_categories' );
}
add_action( 'edit_category', 'outliner_category_transient_flusher' );
add_action( 'save_post',     'outliner_category_transient_flusher' );

// Recent Posts with featured Images to be displayed on home page
if( ! function_exists('outliner_recent_posts') ) {
	function outliner_recent_posts() {
		$output = '';
		$posts_per_page  = get_theme_mod('recent_posts_count', get_option('post_per_page') );
		// WP_Query arguments
		$args = array (
			'post_type'              => 'post',
			'post_status'            => 'publish',
			'posts_per_page'         => $posts_per_page,
			'ignore_sticky_posts'    => true,
			'order'                  => 'DESC',
		);

		// The Query
		$query = new WP_Query( $args );

		// The Loop
		if ( $query->have_posts() ) {
			$output .= '<div class="post-wrapper">';  
			//$output .= '<h3>' . __('Latest Posts','outliner') . '</h3>';
			$output .= '<div class="latest-posts">';
			while ( $query->have_posts() ) {
				$query->the_post();
				$output .= '<div class="latest-post eight columns">';
							
						$output .= '<h3><a href="'. get_permalink() . '">' . get_the_title() . '</a></h3>';
						$output .='<div class="entry-meta">';
							$output .='<span class="data-structure"><span class="dd">' . get_the_time('j').'</span><br><span class="mm-yy">'. get_the_time('M Y'). '</span></span>';
							$output .= outliner_get_author();
							$output .= outliner_get_comments_meta();
						$output .='</div><!-- entry-meta -->';
							$output .= '<div class="latest-post-thumb">'; 
								if ( has_post_thumbnail() ) {
									$output .= get_the_post_thumbnail($query->post->ID ,'recent_posts_img');
								}
								else {
									$output .= '<img src="' . get_template_directory_uri() . '/images/no-image-blog-large.png" alt="" >';
								}
							$output .= '</div><!-- .latest-post-thumb -->';
						$output .= '<div class="latest-post-content">';
						$output .= '<p>' . get_the_excerpt() . '</p>';
						$more_text = get_theme_mod('more_text');
						if( $more_text && !empty( $more_text ) ) {
							$more_link_text = sprintf(__( '%1$s', 'outliner' ), $more_text );
						}else{
							$more_link_text = __('Read More','outliner');
						}
										$output .= '<p><a href="' . get_permalink() . '" class="btn-readmore">' . $more_link_text .'</a></p>';
					$output .= '</div><!-- .latest-post-content -->';
				$output .= '</div><!-- .latest-post -->';
			}
			$output .= '<br class="clear"></div><!-- .latest-posts -->';
			$output .= '</div><!-- .post-wrapper -->';
		} 
		$query = null;
		// Restore original Post Data
		wp_reset_postdata();
		echo $output;
	}
}

/**
  * Generates Breadcrumb Navigation
  */
 
 if( ! function_exists( 'outliner_breadcrumbs' )) {
 
	function outliner_breadcrumbs() {
		/* === OPTIONS === */
		$text['home']     = __( '<i class="fa fa-home"></i>','outliner' ); // text for the 'Home' link
		$text['category'] = __( 'Archive by Category "%s"','outliner' ); // text for a category page
		$text['search']   = __( 'Search Results for "%s" Query','outliner' ); // text for a search results page
		$text['tag']      = __( 'Posts Tagged "%s"','outliner' ); // text for a tag page
		$text['author']   = __( 'Articles Posted by %s','outliner' ); // text for an author page
		$text['404']      = __( 'Error 404','outliner' ); // text for the 404 page

		$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
		$showOnHome  = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
		$breadcrumb_char = get_theme_mod( 'breadcrumb_char', 1);
		if ( $breadcrumb_char ) {
		 switch ( $breadcrumb_char ) {
		 	case '2' :
		 		$delimiter = ' / ';
		 		break;
		 	case '3':
		 		$delimiter = ' > ';
		 		break;
		 	case '1':
		 	default:
		 		$delimiter = ' &raquo; ';
		 		break;
		 }
		}

		$before      = '<span class="current">'; // tag before the current crumb
		$after       = '</span>'; // tag after the current crumb
		/* === END OF OPTIONS === */

		global $post;
		$homeLink = home_url() . '/';
		$linkBefore = '<span typeof="v:Breadcrumb">';
		$linkAfter = '</span>';
		$linkAttr = ' rel="v:url" property="v:title"';
		$link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;

		if (is_home() || is_front_page()) {

			if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $text['home'] . '</a></div>';

		} else {

			echo '<div id="crumbs" xmlns:v="http://rdf.data-vocabulary.org/#">' . sprintf($link, $homeLink, $text['home']) . $delimiter;

			if ( is_category() ) {
				$thisCat = get_category(get_query_var('cat'), false);
				if ($thisCat->parent != 0) {
					$cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
					$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
					$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
					echo $cats;
				}
				echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;

			} elseif ( is_search() ) {
				echo $before . sprintf($text['search'], get_search_query()) . $after;

			} elseif ( is_day() ) {
				echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
				echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
				echo $before . get_the_time('d') . $after;

			} elseif ( is_month() ) {
				echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
				echo $before . get_the_time('F') . $after;

			} elseif ( is_year() ) {
				echo $before . get_the_time('Y') . $after;

			} elseif ( is_single() && !is_attachment() ) {
				if ( get_post_type() != 'post' ) {
					$post_type = get_post_type_object(get_post_type());
					$slug = $post_type->rewrite;
					printf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
					if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
				} else {
					$cat = get_the_category(); $cat = $cat[0];
					$cats = get_category_parents($cat, TRUE, $delimiter);
					if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
					$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
					$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
					echo $cats;
					if ($showCurrent == 1) echo $before . get_the_title() . $after;
				}

			} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
				$post_type = get_post_type_object(get_post_type());
				echo $before . $post_type->labels->singular_name . $after;

			} elseif ( is_attachment() ) {
				$parent = get_post($post->post_parent);
				$cat = get_the_category($parent->ID); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $delimiter);
				$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
				$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
				echo $cats;
				printf($link, get_permalink($parent), $parent->post_title);
				if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;

			} elseif ( is_page() && !$post->post_parent ) {
				if ($showCurrent == 1) echo $before . get_the_title() . $after;

			} elseif ( is_page() && $post->post_parent ) {
				$parent_id  = $post->post_parent;
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
					$parent_id  = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo $breadcrumbs[$i];
					if ($i != count($breadcrumbs)-1) echo $delimiter;
				}
				if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;

			} elseif ( is_tag() ) {
				echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

			} elseif ( is_author() ) {
		 		global $author;
				$userdata = get_userdata($author);
				echo $before . sprintf($text['author'], $userdata->display_name) . $after;

			} elseif ( is_404() ) {
				echo $before . $text['404'] . $after;
			}

			if ( get_query_var('paged') ) {
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
				echo __('Page', 'outliner' ) . ' ' . get_query_var('paged');
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
			}

			echo '</div>';

		}
	} // end outliner_breadcrumbs()

}

function outliner_author() {
	$byline = sprintf(
		_x( '%s', 'post author', 'outliner' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fa fa-user"></i> ' . esc_html( get_the_author() ) . '</a></span>'
	);	

	echo $byline;
}
function outliner_get_author() {
	$byline = sprintf(
		_x( '%s', 'post author', 'outliner' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fa fa-user"></i> ' . esc_html( get_the_author() ) . '</a></span>'
	);	

	return $byline;
}
function outliner_comments_meta() {
	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo ' <span class="comments-link"><i class="fa fa-comments"></i>';
		comments_popup_link( __( 'Leave a comment', 'outliner' ), __( '1 Comment', 'outliner' ), __( '% Comments', 'outliner' ) );
		echo '</span>';

	}	
}

function outliner_get_comments_meta() {
	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		$comments_meta = '<span class="comments-link"><i class="fa fa-comments"></i>';
		$comments_meta .= get_comments_popup_link( __( 'Leave a comment', 'outliner' ), __( '1 Comment', 'outliner' ), __( '% Comments', 'outliner' ) );
		$comments_meta .=  '</span>';
		return $comments_meta;

	}	
}


function outliner_edit() {
	edit_post_link( __( 'Edit', 'outliner' ), '<span class="edit-link"><i class="fa fa-pencil"></i> ', '</span>' );
}


function get_comments_popup_link( $zero = false, $one = false, $more = false, $css_class = '', $none = false ) {
	global $wpcommentspopupfile, $wpcommentsjavascript;

	$id = get_the_ID();
	$title = get_the_title();
	$number = get_comments_number( $id );

	if ( false === $zero ) {
		/* translators: %s: post title */
		$zero = sprintf( __( 'No Comments<span class="screen-reader-text"> on %s</span>','outliner' ), $title );
	}

	if ( false === $one ) {
		/* translators: %s: post title */
		$one = sprintf( __( '1 Comment<span class="screen-reader-text"> on %s</span>','outliner' ), $title );
	}

	if ( false === $more ) {
		/* translators: 1: Number of comments 2: post title */
		$more = _n( '%1$s Comment<span class="screen-reader-text"> on %2$s</span>', '%1$s Comments<span class="screen-reader-text"> on %2$s</span>', $number, 'outliner' );
		$more = sprintf( $more, number_format_i18n( $number ), $title );
	}

	if ( false === $none ) {
		/* translators: %s: post title */
		$none = sprintf( __( 'Comments Off<span class="screen-reader-text"> on %s</span>','outliner' ), $title );
	}

	if ( 0 == $number && !comments_open() && !pings_open() ) {
		return '<span' . ((!empty($css_class)) ? ' class="' . esc_attr( $css_class ) . '"' : '') . '>' . $none . '</span>';
	}

	if ( post_password_required() ) {
		return __('Enter your password to view comments.','outliner');
	}

	$link_anchor =  '<a href="';
	if ( $wpcommentsjavascript ) {
		if ( empty( $wpcommentspopupfile ) )
			$home = home_url();
		else
			$home = get_option('siteurl');
		$link_anchor .= $home . '/' . $wpcommentspopupfile . '?comments_popup=' . $id;
		$link_anchor .= '" onclick="wpopen(this.href); return false"';
	} else { 
		if ( 0 == $number ){
			$link_anchor .= get_permalink() . '#respond';	
		} else {
			$link_anchor .= get_comments_link();
		}
		$link_anchor .= '"';
	}

	if ( !empty( $css_class ) ) {
		$link_anchor .= ' class="'.$css_class.'" ';
	}

	$attributes = '';
	$link_anchor .= apply_filters( 'comments_popup_link_attributes', $attributes );
	$link_anchor .= '>';
	$link_anchor .= get_comments_number_text( $zero, $one, $more );
	$link_anchor .= '</a>';
	return $link_anchor;
}




// free-extra functions //


	// Related Posts Function (call using outliner_related_posts(); ) /NecessarY/ May be write a shortcode?
	function outliner_related_posts() {
		echo '<ul id="webulous-related-posts">';
		global $post;
		$tags = wp_get_post_tags($post->ID);
		$tag_arr = '';
		if($tags) {
			foreach($tags as $tag) { $tag_arr .= $tag->slug . ','; }
	        $args = array(
	        	'tag' => $tag_arr,
	        	'numberposts' => 5, /* you can change this to show more */
	        	'post__not_in' => array($post->ID)
	     	);
	        $related_posts = get_posts($args);
	        if($related_posts) {
	        	foreach ($related_posts as $post) : setup_postdata($post); ?>
		           	<li class="related_post">
		           		<a class="entry-unrelated" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('recent-work'); ?></a>
		           		<a class="entry-unrelated" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		           	</li>
		        <?php endforeach; }
		    else {
	            echo '<li class="no_related_post">' . __( 'No Related Posts Yet!', 'outliner' ) . '</li>'; 
			 }
		}else{
			echo '<li class="no_related_post">' . __( 'No Related Posts Yet!', 'outliner' ) . '</li>';
		}
		wp_reset_query();
		
		echo '</ul>';
	}



/* wbls_pagination */

if( ! function_exists( 'outliner_pagination' )) {
	/**
	 * Generates Pagination without WP-PageNavi Plugin
	 */
	
	function outliner_pagination($before = '', $after = '') {
		global $wpdb, $wp_query;
		$request = $wp_query->request;
		$posts_per_page = intval(get_query_var('posts_per_page'));
		$paged = intval(get_query_var('paged'));
		$numposts = $wp_query->found_posts;
		$max_page = $wp_query->max_num_pages;
		if ( $numposts <= $posts_per_page ) { return; }
		if(empty($paged) || $paged == 0) {
			$paged = 1;
		}
		$pages_to_show = 7;
		$pages_to_show_minus_1 = $pages_to_show-1;
		$half_page_start = floor($pages_to_show_minus_1/2);
		$half_page_end = ceil($pages_to_show_minus_1/2);
		$start_page = $paged - $half_page_start;
		if($start_page <= 0) {
			$start_page = 1;
		}
		$end_page = $paged + $half_page_end;
		if(($end_page - $start_page) != $pages_to_show_minus_1) {
			$end_page = $start_page + $pages_to_show_minus_1;
		}
		if($end_page > $max_page) {
			$start_page = $max_page - $pages_to_show_minus_1;
			$end_page = $max_page;
		}
		if($start_page <= 0) {
			$start_page = 1;
		}
		echo $before.'<nav class="page-navigation navigation pagination"><ol class="webulous_page_navi clearfix">'."";
		if ($start_page >= 2 && $pages_to_show < $max_page) {
			$first_page_text = __( "First", 'outliner' );
			echo '<li class="bpn-first-page-link"><a href="'.get_pagenum_link().'" title="'.$first_page_text.'">'.$first_page_text.'</a></li>';
		}
		echo '<li class="bpn-prev-link">';
		previous_posts_link('&lsaquo;');
		echo '</li>';
		for($i = $start_page; $i  <= $end_page; $i++) {
			if($i == $paged) {
				echo '<li class="bpn-current">'.$i.'</li>';
			} else {
				echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
			}
		}
		echo '<li class="bpn-next-link">';
		next_posts_link('&rsaquo;');
		echo '</li>';
		if ($end_page < $max_page) {
			$last_page_text = __( "Last", 'outliner' );
			echo '<li class="bpn-last-page-link"><a href="'.get_pagenum_link($max_page).'" title="'.$last_page_text.'">'.$last_page_text.'</a></li>';
		}
		echo '</ol></nav>'.$after."";
	}
} /* wbls_pagination */

if( ! function_exists( 'outliner_before_content_free' )) :

	function outliner_before_content_free() {
		 get_header();	 
	}

	endif;

	add_action('outliner_before_content','outliner_before_content_free',10);


/* Outliner Custom Logo */

add_filter( 'get_custom_logo', 'outliner_custom_logo' );
if( !function_exists('outliner_custom_logo') ) { 
	function outliner_custom_logo($html) {
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$logo = get_theme_mod( 'logo', '' );
		echo '<h1 class="site-title img-logo">';
		if(!$custom_logo_id && $logo!= '') {	
		    echo '<img src="'.$logo.'">';
		}else{
			echo $html;
		}
		echo '<h1>';
	}
}


if ( ! function_exists( 'outliner_entry_top_meta' ) ) : 
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function outliner_entry_top_meta() {   
	// Post meta data 
	
	  $single_post_top_meta = get_theme_mod('single_post_top_meta', array(2,6) );
      // echo '<pre>',print_r($single_post_top_meta),'</pre>';
	
    if ( 'post' == get_post_type() ) {  
		foreach ($single_post_top_meta as $key => $value) {
		    if( $value == 1) {  ?>			
					<span class="dd"><a class="url fn n" href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'),get_the_time('d')); ?>"><i class="fa fa-clock-o"></i><?php the_time('j M Y'); ?></a></span>			  	  
	<?php   }elseif( $value == 2) {
				printf(
					_x( '%s', 'post author', 'outliner' ),
					'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fa fa-user"></i> ' . esc_html( get_the_author() ) . '</a></span>'
				);	
			}elseif( $value == 3)  {
				if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
					echo ' <span class="comments-link"><i class="fa fa-comments"></i>';
					comments_popup_link( __( 'Leave a comment', 'outliner' ), __( '1 Comment', 'outliner' ), __( '% Comments', 'outliner' ) );
					echo '</span>';
			    }
	        }elseif( $value == 4) {
				$categories_list = get_the_category_list( __( ', ', 'outliner' ) );
				if ( $categories_list ) {
					printf( '<span class="cat-links"><i class="fa fa-folder-open"></i> ' . __( '%1$s ', 'outliner' ) . '</span>', $categories_list );
				}	
		    }elseif( $value == 5)  {
	    		/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'outliner' ) );
				if ( $tags_list ) {
					printf( '<span class="tags-links"><i class="fa fa-tags"></i> ' . __( '%1$s ', 'outliner' ) . '</span>', $tags_list );
				}			
		    }elseif( $value == 6) {
		        edit_post_link( __( 'Edit', 'outliner' ), '<span class="edit-link"><i class="fa fa-pencil"></i> ', '</span>' );
		    }
	    }
	}
}

endif;
if ( ! function_exists( 'outliner_entry_bottom_meta' ) ) : 
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function outliner_entry_bottom_meta() {   
	// Post meta data 
	
	$single_post_bottom_meta = get_theme_mod('single_post_bottom_meta', array(3,4,5) );

	if ( 'post' == get_post_type() ) {  
		foreach ($single_post_bottom_meta as $key => $value) {
		    if( $value == 1 ) { ?>			
					<span class="dd"><a class="url fn n" href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'),get_the_time('d')); ?>"><i class="fa fa-clock-o"></i><?php the_time('j M Y'); ?></a></span>	
	<?php   }elseif( $value == 2) {
				printf(
					_x( '%s', 'post author', 'outliner' ),
					'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fa fa-user"></i> ' . esc_html( get_the_author() ) . '</a></span>'
				);	
			}elseif( $value == 3)  {
				if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
					echo ' <span class="comments-link"><i class="fa fa-comments"></i>';
					comments_popup_link( __( 'Leave a comment', 'outliner' ), __( '1 Comment', 'outliner' ), __( '% Comments', 'outliner' ) );
					echo '</span>';
			    }
	        }elseif( $value == 4) {
				$categories_list = get_the_category_list( __( ', ', 'outliner' ) );
				if ( $categories_list ) {
					printf( '<span class="cat-links"><i class="fa fa-folder-open"></i> ' . __( '%1$s ', 'outliner' ) . '</span>', $categories_list );
				}	
		    }elseif( $value == 5)  {
	    		/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'outliner' ) );
				if ( $tags_list ) {
					printf( '<span class="tags-links"><i class="fa fa-tags"></i> ' . __( '%1$s ', 'outliner' ) . '</span>', $tags_list );
				}			
		    }elseif( $value == 6) {
		        edit_post_link( __( 'Edit', 'outliner' ), '<span class="edit-link"><i class="fa fa-pencil"></i> ', '</span>' );
		    }
	    }
	}
}

endif;

/*  Site Layout Option  */
if( !function_exists('outliner_layout_class') ) {   
	function outliner_layout_class() {
		if( is_home() &&  ( get_theme_mod('blog_layout',1) == 3 ||  get_theme_mod('blog_layout',1) == 5) ) {
	       echo 'sixteen';
	       return;
		}
	     $sidebar_position = get_theme_mod( 'sidebar_position', 'right' ); 
		     if( 'fullwidth' == $sidebar_position ) {
		     	echo 'sixteen';
		     }elseif('two-sidebar' == $sidebar_position || 'two-sidebar-left' == $sidebar_position || 'two-sidebar-right' == $sidebar_position ) {
		     	echo 'eight';
		     }
		     else{
		     	echo 'eleven';
		     }
		     if ( 'no-sidebar' == $sidebar_position ) { 
		     	echo ' no-sidebar';
		     }
	}
}

/* Two Sidebar Left action */ 

add_action('outliner_two_sidebar_left','outliner_double_sidebar_left');   
if( !function_exists('outliner_double_sidebar_left') ) { 
 function outliner_double_sidebar_left() {
    $sidebar_position = get_theme_mod( 'sidebar_position', 'right' ); 
		if( 'two-sidebar' == $sidebar_position || 'two-sidebar-left' == $sidebar_position ) :
			 get_sidebar('left'); 
		endif; 
		if('two-sidebar-left' == $sidebar_position || 'left' == $sidebar_position ):
			get_sidebar(); 
		endif; 
 }	
}

/* Two Sidebar Right action */     

 add_action('outliner_two_sidebar_right','outliner_double_sidebar_right'); 	
if( !function_exists('outliner_double_sidebar_right') ) { 
  function outliner_double_sidebar_right() {
  	 $sidebar_position = get_theme_mod( 'sidebar_position', 'right' ); 
		 if( 'two-sidebar' == $sidebar_position || 'two-sidebar-right' == $sidebar_position || 'right' == $sidebar_position) :
			 get_sidebar(); 
		endif; 	
		if('two-sidebar-right' == $sidebar_position ):
			get_sidebar('left'); 
		endif; 
 }
}


add_action('outliner_single_flexslider_featured_image','outliner_single_flexslider_featured_image_top');
if( !function_exists('outliner_single_flexslider_featured_image_top') ) { 
	function outliner_single_flexslider_featured_image_top() {
		$single_featured_image = get_theme_mod( 'single_featured_image',true );
		$single_featured_image_size = get_theme_mod ('single_featured_image_size',1);
		if( $single_featured_image && $single_featured_image_size == 3 ) {
		    if( has_post_thumbnail() && ! post_password_required() ) :   
				the_post_thumbnail( 'post-thumbnail', array('class' => "single_page_flexslider_feature_image") ); 
			endif;
		}
	}
}


add_action('outliner_single_page_flexslider_featured_image','outliner_single_page_flexslider_featured_image_top');
if( !function_exists('outliner_single_page_flexslider_featured_image_top') ) { 
	function outliner_single_page_flexslider_featured_image_top() {
		$single_page_featured_image = get_theme_mod( 'single_page_featured_image',true );
		$single_page_featured_image_size = get_theme_mod ('single_page_featured_image_size',1);
		if( $single_page_featured_image && $single_page_featured_image_size == 2) {
		    if( has_post_thumbnail() && ! post_password_required() ) :   
				the_post_thumbnail( 'post-thumbnail', array('class' => "single_page_flexslider_feature_image") ); 
			endif;
		}
	}
}		



if( !function_exists('outliner_masonry_blog_layout_class') ) { 
	function outliner_masonry_blog_layout_class() {
		if( is_home() && get_theme_mod('blog_layout',1) == 4 ||  get_theme_mod('blog_layout',1) == 5 ) {
			echo 'masonry-blog-content';
		}
	}
}

if( ! function_exists( 'outliner_featured_image' ) ) {
	function outliner_featured_image() {
		$featured_image_size = get_theme_mod ('featured_image_size', 1);
		if ( has_post_thumbnail() && ! post_password_required() ) :
			if( $featured_image_size == 1 ) :
				the_post_thumbnail('outliner-blog-full-width');
			elseif( $featured_image_size == 2 ) :
				the_post_thumbnail('outliner-small-featured-image-width');
			elseif( $featured_image_size == 3 ) :
				the_post_thumbnail('full');
			elseif( $featured_image_size == 4 ) :
				the_post_thumbnail('medium');
			elseif( $featured_image_size == 5 ) :
				the_post_thumbnail('large');
			endif;
		endif;
	}
}

/* Page site style class ( layout )*/

if( !function_exists('outliner_site_style_class') ) { 
	function  outliner_site_style_class(){
       $site_style = get_theme_mod('site-style');
	    if( $site_style == 'boxed' )  { 
		  $site_style_class = 'container boxed-container';
		}elseif( $site_style == 'fluid' ){
	       $site_style_class = 'fluid-container';	 
		}
		else{
			 $site_style_class = '';
		} 
		return $site_style_class; 
	}
}

/* Page site style header class ( layout )*/

if( !function_exists('outliner_site_style_header_class') ) { 
	function  outliner_site_style_header_class(){
        $site_style = get_theme_mod('site-style');
	    if( $site_style == 'boxed' )  { 
		  $site_style_header_class = 'boxed-header';
		}elseif( $site_style == 'fluid' ){
	       $site_style_header_class = 'fluid-header';
		}
		else{
			 $site_style_header_class = '';
		} 
		return $site_style_header_class;
	}
}

add_action('outliner_sidebar_right_widget','outliner_sidebar_right_widget');
if( !function_exists('outliner_sidebar_right_widget') ) { 
	function outliner_sidebar_right_widget() {
		    if (  is_active_sidebar( 'sidebar-1' ) ) {
				 dynamic_sidebar('sidebar-1');
			}else { ?>
				<aside id="meta" class="widget">
					<h4 class="widget-title"><?php _e( 'Meta', 'outliner' ); ?></h4>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
		        </aside><?php 
		   }  
	}
}
