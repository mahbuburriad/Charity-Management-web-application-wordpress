<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Elevation
 */

if ( ! function_exists( 'elevation_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function elevation_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'elevation' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'elevation' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'elevation_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function elevation_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'elevation' ) );
		if ( $categories_list && elevation_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'elevation' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'elevation' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'elevation' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'elevation' ), esc_html__( '1 Comment', 'elevation' ), esc_html__( '% Comments', 'elevation' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'elevation' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function elevation_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'elevation_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'elevation_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so elevation_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so elevation_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in elevation_categorized_blog.
 */
function elevation_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'elevation_categories' );
}
add_action( 'edit_category', 'elevation_category_transient_flusher' );
add_action( 'save_post',     'elevation_category_transient_flusher' );




// Post meta
function elevation_entry_post_meta(){
	global $elevation_options;
	if( isset( $elevation_options['remove_meta_data'] ) == "show" ){?>

	<div class="post-meta">
		<span class="author"><?php echo esc_html__('Posted by','elevation');?> <?php printf('<a class="post-meta-element author vcard url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"> ' . esc_html( get_the_author_meta('display_name') ) . '</a>' ); ?></span>
		<span class="comments"><?php echo esc_html__('With','elevation');?> <?php comments_number( '0 Comment', '1 Comment', '% Comments' );?></span>
		<?php
			$categories_list = get_the_category_list( esc_html__( ', ', 'elevation' ) );
			if ( $categories_list && elevation_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'In %1$s', 'elevation' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		} ?>
	</div><!-- /.post-meta -->
<?php } }


// Post Date
function elevation_post_date(){ ?>
	<div class="post-date media-left">
		<time datetime="<?php the_time();?>"><span class="date media-left"><?php echo get_the_date('d'); ?></span> <span class="media-body"><?php echo get_the_date('M Y'); ?></span></time>
	</div><!-- /.post-date -->
<?php }

// Featured Image Placeholder
function elevation_featured_image_placeholder(){
	global $elevation_options;
	echo '<div class="post-thumbnail"><img src="'. esc_url( $elevation_options['featured_image']['url'] ) .  '"></div>';
}

/**
 * Returns Custom Blog Posts Pagination
 * @author Jewel Theme
 * @since v1.0.0
 */

if(!( function_exists('candor_framework_pagination') )){
	function candor_framework_pagination($pages = '', $range = 2){
		$showitems = ($range * 1)+1;

		global $paged;
		if(empty($paged)) $paged = 1;

		if($pages == ''){
			global $wp_query;
			$pages = $wp_query->max_num_pages;
				if(!$pages) {
					$pages = 1;
				}
		}

		if(1 != $pages){
			echo '<nav><ul class="pagination">';

			if($paged > 1 && $paged > $range+1 && $showitems < $pages){
				echo '<li><a href="'.get_pagenum_link(1).'" aria-label="Previous" class="previous"><i class="fa fa-angle-double-left"></i><span>'. esc_html__('Start','elevation').'</span></a></li>';
			}

			for ($i=1; $i <= $pages; $i++)
			{
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
				{
					echo ($paged == $i)? "<li><a href='#' class='active'>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>";
				}
			}

			if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages){
				echo '<li><a href="'.get_pagenum_link($pages).'" aria-label="Next" class="next"><span>'. esc_html__('End','elevation').'</span><i class="fa fa-angle-double-right"></i></a></li>';
			}


			echo "</ul></nav>";
		}
	}
}



// Elevation Sidebar
function elevation_sidebar(){ ?>

	<div class="col-md-3">
		<?php
		if ( is_active_sidebar( 'blog-sidebar' ) ) {
			dynamic_sidebar('blog-sidebar');
		} else{
			get_sidebar();
		}
		?>
	</div>

<?php }


// Elevation WooCommerce Sidebar
function elevation_woo_sidebar(){ ?>

	<div class="col-md-3">
		<?php
		if ( is_active_sidebar( 'woo-sidebar' ) ) {
			dynamic_sidebar('woo-sidebar');
		} else{
			get_sidebar();
		}
		?>
	</div>

<?php }


// Elevation Footer Sidebar
function elevation_footer_sidebar(){
	if ( is_active_sidebar( 'footer-sidebar' ) ) {
		dynamic_sidebar('footer-sidebar');
	}
}



// Elevation Single post footer
function elevation_single_post_entry_footer(){
	global $elevation_options;
	if( $elevation_options['remove_meta_data'] == "show" ){
	 ?>
	<div class="post-bottom">
        <div class="post-tag">
          <span><?php echo esc_html__('Tags:','elevation');?></span>
          <ul class="meta-tag">
            <li><?php echo get_the_tag_list( '', esc_html__( ', ', 'elevation' ));?></li>
          </ul><!-- /.tag-list -->
        </div><!-- /.post-tag -->

        <div class="post-social pull-right">
          <span><?php echo esc_html__('Share:','elevation');?></span>
          <ul class="social-share">
            <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>" target="_blank"><i class="fa fa-facebook-official"></i></a></li>
            <li><a href="https://twitter.com/home?status=<?php the_permalink();?>" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
            <li><a href="https://pinterest.com/pin/create/button/?url=&amp;media=&amp;description=<?php the_permalink();?>" target="_blank"><i class="fa fa-pinterest-square"></i></a></li>
            <li><a href="https://plus.google.com/share?url=<?php the_permalink();?>" target="_blank"><i class="fa fa-share-alt-square"></i></a></li>
          </ul><!-- /.social-share -->
        </div><!-- /.post-social -->
    </div><!-- /.post-bottom -->
<?php } }

// Elevation Single Page
function elevation_single_page_entry_footer(){
	global $elevation_options;
	if( $elevation_options['remove_meta_data'] == "show" ){
	?>
	<div class="post-bottom">
        <div class="post-tag">
          <span><?php echo esc_html__('Author:','elevation');?></span>

          <a class="url fn n" href="<?php echo get_the_author_link(); ?>"><?php the_author(); ?></a>
        </div><!-- /.post-tag -->

        <div class="post-social pull-right">
          <span><?php echo esc_html__('Share:','elevation');?></span>
          <ul class="social-share">
            <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>" target="_blank"><i class="fa fa-facebook-official"></i></a></li>
            <li><a href="https://twitter.com/home?status=<?php the_permalink();?>" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
            <li><a href="https://pinterest.com/pin/create/button/?url=&amp;media=&amp;description=<?php the_permalink();?>" target="_blank"><i class="fa fa-pinterest-square"></i></a></li>
            <li><a href="https://plus.google.com/share?url=<?php the_permalink();?>" target="_blank"><i class="fa fa-share-alt-square"></i></a></li>
          </ul><!-- /.social-share -->
        </div><!-- /.post-social -->
    </div><!-- /.post-bottom -->
<?php } }



/*===================================================================================
 * Search Form
 * =================================================================================*/
add_filter('get_search_form', 'elevation_search_form');

function elevation_search_form($form) {
	$form = '<form action="' . esc_url( home_url( '/' ) ) . '" method="get" class="search-form">
		<input type="text" name="s" id="s" class="search" placeholder="Search for.." value="' . esc_attr( get_search_query() ) . '" required>
		<button type="submit" id="search-submit" class="search-submit"><i class="fa fa-search"></i></button>
		</form>';
return $form;
}


function elevation_header_search_form() { ?>
	<div id="sb-search" class="sb-search">
		<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="sb-search-form" accept-charset="utf-8">
			<input class="sb-search-input" placeholder="Search Here" type="text" value="<?php echo esc_attr( get_search_query() ); ?>" name="search" id="search">
			<input class="sb-search-submit" type="submit" value="">
			<i class="fa fa-search search-icon"></i>
		</form>
	</div>
<?php }
/*===================================================================================
 * Elevation Comments
 * =================================================================================*/

if(!function_exists('candor_framework_elevation_comment')){

    function candor_framework_elevation_comment($comment, $args, $depth){

        $GLOBALS['comment'] = $comment;
        switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
    ?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">

        <p><?php esc_html('Pingback:','elevation');?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( '(Edit)', 'elevation' ), '<span class="edit-link">', '</span>' ); ?></p>
        <?php
        break;
        default :

        global $post;
        ?>

        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        	<article class="comment-body media">
        		<div class="author-avatar media-left">
        			<?php echo get_avatar( $comment, 100 ); ?>
        		</div><!-- /.author-avatar -->

        		<div class="comment-details media-body">
        			<h5 class="comment-author"><a href="<?php comment_author_link(); ?>"><?php comment_author(); ?></a></h5>
        			<p class="comment-content">
        				<?php comment_text(); ?>
        			</p><!-- .comment-content -->
        			<div class="comment-meta">
        				<time datetime="<?php the_time();?>">
        					<?php echo esc_html__('on','elevation');?> <span><?php echo get_the_date('j-m-Y'); ?></span> <?php echo esc_html__('at','elevation');?> <span><?php echo get_the_date('g:i a'); ?></span>
        				</time>
        			</div>
        			<?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'elevation' ), 'after' => '<i class="fa fa-mail-forward"></i>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
        		</div><!-- /.media-body -->
        	</article><!-- /.comment-body -->


            <?php
            break;
            endswitch;
        }

}


// Replate Comment Reply Button Class
add_filter('comment_reply_link', 'candor_framework_elevation_comment_reply_link_filter');
function candor_framework_elevation_comment_reply_link_filter($class){
    $class = str_replace("class='comment-reply-link", "class='btn reply-btn", $class);
    return $class;
}



/* Plugin Activation Notice Allignment */
add_action('admin_head', 'elevation_search_form_custom_admin_notice_css');
function elevation_search_form_custom_admin_notice_css() {
  echo '<style>
    .themes-php div.notice {
    	float: left;
    }
  </style>';
}



// Header Top Social
function elevation_header_top_social(){
    global $elevation_options;

    echo '<ul class="top-social">';

    if(isset($elevation_options['section_social_facebook']) && trim($elevation_options['section_social_facebook'])!="") echo "<li><a class='social' href='{$elevation_options['section_social_facebook']}' target='_blank' ><i class='fa fa-facebook'></i></a></li>";
    ?><?php
    if(isset($elevation_options['section_social_linkedin'])  && trim($elevation_options['section_social_linkedin'])!="") echo "<li><a class='social' href='{$elevation_options['section_social_linkedin']}' target='_blank' ><i class='fa fa-linkedin'></i></a></li>";
    ?><?php
    if(isset($elevation_options['section_social_github'])  && trim($elevation_options['section_social_github'])!="") echo "<li><a class='social' href='{$elevation_options['section_social_github']}' target='_blank' ><i class='fa fa-github'></i></a></li>";
    ?><?php
    if(isset($elevation_options['section_social_twitter']) && trim($elevation_options['section_social_twitter'])!="") echo "<li><a class='social' href='{$elevation_options['section_social_twitter']}' target='_blank' ><i class='fa fa-twitter'></i></a></li>";
    ?><?php
    if(isset($elevation_options['section_social_pinterest'])  && trim($elevation_options['section_social_pinterest'])!="") echo "<li><a class='social' href='{$elevation_options['section_social_pinterest']}' target='_blank' ><i class='fa fa-pinterest'></i></a></li>";
    ?><?php
    if(isset($elevation_options['section_social_google']) && trim($elevation_options['section_social_google'])!="") echo "<li><a class='social' href='{$elevation_options['section_social_google']}' target='_blank' ><i class='fa fa-google-plus'></i></a></li>";
    ?><?php
    if(isset($elevation_options['section_social_dribbble']) && trim($elevation_options['section_social_dribbble'])!="") echo "<li><a class='social' href='{$elevation_options['section_social_dribbble']}' target='_blank' ><i class='fa fa-dribbble'></i></a></li>";
    ?><?php
    if(isset($elevation_options['section_social_flickr']) && trim($elevation_options['section_social_flickr'])!="") echo "<li><a class='social' href='{$elevation_options['section_social_flickr']}' target='_blank' ><i class='fa fa-flickr'></i></a></li>";
    ?><?php
    if(isset($elevation_options['section_social_instagram']) && trim($elevation_options['section_social_instagram'])!="") echo "<li><a class='social' href='{$elevation_options['section_social_instagram']}' target='_blank' ><i class='fa fa-instagram'></i></a></li>";
    ?><?php
    if(isset($elevation_options['section_social_vimeo']) && trim($elevation_options['section_social_vimeo'])!="") echo "<li><a href='{$elevation_options['section_social_vimeo']}' target='_blank' ><i class='fa fa-vimeo-square'></i></a></li>";
    ?><?php
    if(isset($elevation_options['section_social_youtube']) && trim($elevation_options['section_social_youtube'])!="") echo "<li><a class='social' href='{$elevation_options['section_social_youtube']}' target='_blank' ><i class='fa fa-youtube'></i></a></li>";
    ?><?php
    if(isset($elevation_options['section_social_rss']) && trim($elevation_options['section_social_rss'])!="") echo "<li><a class='social' href='{$elevation_options['section_social_rss']}' target='_blank' ><i class='fa fa-rss'></i></a></li>";

	echo '</ul>';
}

// Footer Right Bottom Social
function elevation_footer_bottom_social(){
    global $elevation_options;

    echo '<ul class="social-list">';

    if(isset($elevation_options['section_social_facebook']) && trim($elevation_options['section_social_facebook'])!="") echo "<li><a href='{$elevation_options['section_social_facebook']}' target='_blank' ><i class='fa fa-facebook-square'></i></a></li>";
    ?><?php
    if(isset($elevation_options['section_social_linkedin'])  && trim($elevation_options['section_social_linkedin'])!="") echo "<li><a href='{$elevation_options['section_social_linkedin']}' target='_blank' ><i class='fa fa-linkedin-square'></i></a></li>";
    ?><?php
    if(isset($elevation_options['section_social_github'])  && trim($elevation_options['section_social_github'])!="") echo "<li><a href='{$elevation_options['section_social_github']}' target='_blank' ><i class='fa fa-github-square'></i></a></li>";
    ?><?php
    if(isset($elevation_options['section_social_twitter']) && trim($elevation_options['section_social_twitter'])!="") echo "<li><a href='{$elevation_options['section_social_twitter']}' target='_blank' ><i class='fa fa-twitter-square'></i></a></li>";
    ?><?php
    if(isset($elevation_options['section_social_pinterest'])  && trim($elevation_options['section_social_pinterest'])!="") echo "<li><a href='{$elevation_options['section_social_pinterest']}' target='_blank' ><i class='fa fa-pinterest-square'></i></a></li>";
    ?><?php
    if(isset($elevation_options['section_social_google']) && trim($elevation_options['section_social_google'])!="") echo "<li><a href='{$elevation_options['section_social_google']}' target='_blank' ><i class='fa fa-google-plus-square'></i></a></li>";
    ?><?php
    if(isset($elevation_options['section_social_dribbble']) && trim($elevation_options['section_social_dribbble'])!="") echo "<li><a href='{$elevation_options['section_social_dribbble']}' target='_blank' ><i class='fa fa-dribbble-square'></i></a></li>";
    ?><?php
    if(isset($elevation_options['section_social_flickr']) && trim($elevation_options['section_social_flickr'])!="") echo "<li><a href='{$elevation_options['section_social_flickr']}' target='_blank' ><i class='fa fa-flickr-square'></i></a></li>";
    ?><?php
    if(isset($elevation_options['section_social_instagram']) && trim($elevation_options['section_social_instagram'])!="") echo "<li><a href='{$elevation_options['section_social_instagram']}' target='_blank' ><i class='fa fa-instagram-square'></i></a></li>";
    ?><?php
    if(isset($elevation_options['section_social_vimeo']) && trim($elevation_options['section_social_vimeo'])!="") echo "<li><a href='{$elevation_options['section_social_vimeo']}' target='_blank' ><i class='fa fa-vimeo-square'></i></a></li>";
    ?><?php
    if(isset($elevation_options['section_social_youtube']) && trim($elevation_options['section_social_youtube'])!="") echo "<li><a href='{$elevation_options['section_social_youtube']}' target='_blank' ><i class='fa fa-youtube-square'></i></a></li>";
    ?><?php
    if(isset($elevation_options['section_social_rss']) && trim($elevation_options['section_social_rss'])!="") echo "<li><a href='{$elevation_options['section_social_rss']}' target='_blank' ><i class='fa fa-rss-square'></i></a></li>";

	echo '</ul>';
}




// Copyrights
function elevation_copyrights_text(){
	global $elevation_options;
	if( isset( $elevation_options['copyright_text'] )){
		echo htmlspecialchars_decode( esc_attr($elevation_options['copyright_text']));	
	} else {
		echo '<li> &copy; <a href="' . esc_url( esc_html__('https://elevation.jeweltheme.com', 'elevation')) . '">' . esc_html__('elevation','elevation').'</a> ' . esc_html__('2018-2019 -','elevation').'</li>
<li>' . esc_html__('Designed by','elevation').' <a href="' . esc_url( esc_html__('http://themeforest.net/user/bigpsfan', 'elevation')) . '"> ' . esc_html__('bigpsfan -','elevation').' </a></li>
<li>' . esc_html__('Developed by','elevation').' <a href="' . esc_url( esc_html__('http://jeweltheme.com', 'elevation')) . '">' . esc_html__('Jewel Theme','elevation').'</a></li>';
	}
	
}

// Header Top Contact Info
function elevation_header_top_contact_info(){
	global $elevation_options;
	?>
	<div class="col-sm-6 pull-left">
		<div class="top-left">
			<ul class="contact-list">

				<?php if( isset( $elevation_options['top_email'] )){ ?>
					<li>
						<a class="info" href="mailto:<?php echo esc_attr($elevation_options['top_email']);?>">
							<span class="top-icon"><i class="fa fa-envelope"></i></span>
							<?php echo esc_attr($elevation_options['top_email']);?>
						</a>
					</li>
				<?php } ?>

				<?php if( isset( $elevation_options['top_phone'] )){ ?>
					<li>
						<span class="phone-no">
							<span class="top-icon"><i class="fa fa-phone"></i></span>
							<?php echo esc_attr($elevation_options['top_phone']);?>
						</span>
					</li>
				<?php } ?>

			</ul><!-- /.contact-list -->
		</div><!-- /.top-left -->
	</div>
<?php }



// Header Logo
function elevation_header_logo_options(){
	global $elevation_options;
	?>

      <div class="navbar-header">
	        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse-menu">
	          <i class="fa fa-bars"></i>
	        </button>

	        <?php
	         if( isset( $elevation_options[ 'logo_type' ] ) == "logo_text" ){ ?>
	        	<a class="navbar-brand" href="<?php echo site_url(); ?>"><?php echo htmlspecialchars_decode(esc_html( $elevation_options[ 'elevation_logo_text' ] ));?></a>
	        <?php } else {

	        	if( isset( $elevation_options[ 'logo_type' ] ) == "logo_image" ){
	        		echo '<a class="navbar-brand" href="' . esc_url(site_url()) .'"><img class="logo-image" src="'. esc_url( isset( $elevation_options[ 'elevation_logo_image' ]['url'] )) . '"></a>';	
	        	} else {
	        		echo '<a class="navbar-brand" href="' . esc_url(site_url()) .'"><img class="logo-image" src="'. get_template_directory_uri() . "/images/logo.png" . '"></a>';
	        	}
	        	
	        }?>
	      	<!-- Logo -->
    	</div><!-- End .navbar-header -->
<?php }


/**
 * Candor Framework Load Admin Scripts
 * Properly Enqueues Scripts & Styles for the theme
 *
 * @since version 1.0.0
 * @author Jewel Theme
 */
if(!( function_exists('elevation_admin_load_scripts') )){
	function elevation_admin_load_scripts(){
		wp_enqueue_style( 'elevation-theme-admin-css', ELEVATION_PATH . '/inc/candor-theme-admin.css' );
	}
	add_action('admin_enqueue_scripts', 'elevation_admin_load_scripts', 200);
}


// Get Blog Posts Link
function elevation_get_blog_link(){
    $blog_post = get_option("page_for_posts");
    if($blog_post){
        $permalink = get_permalink($blog_post);
    }
    else
        $permalink = site_url();
    return $permalink;
}



// Preloader
function elevation_preloader(){
	global $elevation_options;

	if( isset( $elevation_options['show_preloader'] )){
		get_template_part('template-parts/content', 'preloader');
	}
}



// Custom Admin Logo Login
if(!function_exists('elevation_admin_logo_login')){
    function elevation_admin_logo_login(){
	    global $elevation_options;
	    if( $elevation_options[ 'admin_logo' ]['url'] ){
	        ?>
	        <style type="text/css">
	           .login h1 a {
	                background-image: url("<?php echo esc_url( $elevation_options[ 'admin_logo' ]['url'] );?>") !important;
	                background-position: center center !important;
	            }
	        </style>

	        <?php } else { ?>

	        <style type="text/css">
	            .login h1 a {
	                background-image: url('<?php echo admin_url('/images/wordpress-logo.png');?>');
	            }
	        </style>

	        <?php }
	    }
	    add_action( 'login_enqueue_scripts', 'elevation_admin_logo_login' );
	}





	if( !function_exists('elevation_decode_preventslashes') ){
		function elevation_decode_preventslashes($value){
			$value = str_replace('|gq6|', '\\\\\\"', $value);
			$value = str_replace('|gq5|', '\\\\\"', $value);
			$value = str_replace('|gq4|', '\\\\"', $value);
			$value = str_replace('|gq3|', '\\\"', $value);
			$value = str_replace('|gq2|', '\\"', $value);
			$value = str_replace('|gq"|', '\"', $value);
			$value = str_replace('|g2t|', '\\\t', $value);
			$value = str_replace('|g1t|', '\t', $value);
			$value = str_replace('|g2n|', '\\\n', $value);
			$value = str_replace('|g1n|', '\n', $value);
			return $value;
		}
	}




	if( !function_exists('elevation_cause_donation_button') ){
		function elevation_cause_donation_button($cause_option = array()){
			// if( intval($cause_option['goal-of-donation']) <= intval($cause_option['current-funding']) ) return;

			global $elevation_options, $elevation_donation_id; $button = '';
			$elevation_donation_id = empty($elevation_donation_id)? 1: $elevation_donation_id + 1;

			$donation_form = trim($elevation_options['cause-donation-form']);
			if( !empty($cause_option['_elevation_donation_form']) ){
				$donation_form = trim($cause_option['_elevation_donation_form']);
			}

			if( !empty($donation_form) && strpos($donation_form, 'http') === 0 ){
				$button  = '<div class="btn-container"><a class="btn btn-xsm donate-btn" ';
				$button .= 'href="' . $donation_form . '">';
				$button .= __('Donate Now', 'elevation') . '</a></div>';
			}else if( !empty($donation_form) ){
				$button  = '<div class="btn-container"><a class="btn btn-xsm donate-btn" data-rel="fancybox" ';
				$button .= 'href="#donate-button-' . $elevation_donation_id . '">';
				$button .= __('Donate Now', 'elevation') . '</a></div>';
				$button .= '<div id="donate-button-' . $elevation_donation_id . '" style="display: none;">';
				$button .= do_shortcode($donation_form) . '</div>';
			}
			return $button;
		}
	}



	// if( !function_exists('elevation_cause_donation_button') ){
	// 	function elevation_cause_donation_button($cause_option = array()){
	// 		// if( intval($cause_option['goal-of-donation']) <= intval($cause_option['current-funding']) ) return;

	// 		global $elevation_options, $elevation_donation_id; $button = '';
	// 		$elevation_donation_id = empty($elevation_donation_id)? 1: $elevation_donation_id + 1;

	// 		$donation_form = trim($elevation_options['cause-donation-form']);
	// 		if( !empty(candor_framework_meta('_elevation_donation_form')) ){
	// 			$donation_form = trim(candor_framework_meta('_elevation_donation_form'));
	// 		}

	// 		if( !empty($donation_form) && strpos($donation_form, 'http') === 0 ){
	// 			$button  = '<div class="btn-container"><a class="btn btn-xsm donate-btn" ';
	// 			$button .= 'href="' . $donation_form . '">';
	// 			$button .= esc_html__('Donate Now', 'nord') . '</a></div>';
	// 		}else if( !empty($donation_form) ){
	// 			$button  = '<div class="btn-container"><a class="btn btn-xsm donate-btn" data-rel="fancybox" ';
	// 			$button .= 'href="#donate-button-' . $elevation_donation_id . '">';
	// 			$button .= esc_html__('Donate Now', 'nord') . '</a></div>';
	// 			$button .= '<div id="donate-button-' . $elevation_donation_id . '" style="display: none;">';
	// 			$button .= do_shortcode($donation_form) . '</div>';
	// 		}
	// 		return $button;
	// 	}
	// }




	// Paypal Money Format
	if( !function_exists('elevation_cause_money_format') ){
		function elevation_cause_money_format($number, $decimal = 0, $format = ''){

			$cause_option = get_post_meta(get_the_ID(), '_elevation_causes_currency', true);
			if( !empty($cause_option) ){
				$cause_option = json_decode(elevation_decode_preventslashes($cause_option), true);
				if( !empty($cause_option) ){
					$format = $cause_option;
				}
			}
			return str_replace('NUMBER', number_format_i18n($number, $decimal), $format);
		}
	}


	// Download PDF File
	if( !function_exists('elevation_pdf_download') ){
		function elevation_pdf_download(){ ?>
			<?php
		        $pdf_id = get_post_meta( get_the_ID(), '_elevation_pdf_file','type=file_advanced', true);
		        $pdf_file = wp_get_attachment_url( $pdf_id , false );
		    ?>
		      	<a class="cause-info cause-pdf" href="<?php echo esc_url( $pdf_file ); ?>"><?php echo esc_html__('Download PDF','elevation'); ?></a>

			<?php
		}
	}


if( !function_exists('elevation_causes_entry_header') ){
		function elevation_causes_entry_header(){
			global $elevation_options;
			$header_bg = $cause_option = get_post_meta(get_the_ID(), '_elevation_header_bg', true);
			$image_src = wp_get_attachment_image_src( $header_bg , 'full' );
			?>

		  	<div class="entry-header" style="background: url(<?php echo esc_url_raw($image_src[0]);?>); background-size:cover;" data-stellar-background-ratio="0.1" data-stellar-vertical-offset="0">
		  		<div class="parallax-style">
			        <div class="container">
			          <h3 class="entry-title"><?php the_title();?></h3><!-- /.entry-title -->
			        </div>
			    </div>
		    </div>

	<?php }
}



// Elevation Blog Header Background
function elevation_blog_header_background(){
	global $elevation_options;
	?>

    <section id="page-head" class="page-head text-center" data-stellar-background-ratio="0.1" data-stellar-vertical-offset="0">
      <div class="section-padding">
        <div class="container">
          <div class="section-top">
            <h2 class="page-title">
            	<?php if (isset($elevation_options['blog_title'])) {
            			echo esc_html( $elevation_options['blog_title'] );
            		} else {
            			echo esc_html__('Blog', 'elevation');
            		} ?>
            </h2><!-- /.page-title -->
            <p class="page-description">
              <?php if (isset($elevation_options['blog_subtitle'])) echo esc_html( $elevation_options['blog_subtitle'] ); ?>
            </p><!-- /.page-description -->
          </div><!-- /.section-top -->

          <div class="section-border">
            <div class="border-style">
              <span></span>
            </div><!-- /.border-style -->
          </div><!-- /.section-border -->

        </div><!-- /.container -->
      </div><!-- /.section-padding -->
    </section><!-- /#page-head -->

<?php }


// 404 Page
function elevation_404_page(){
	global $elevation_options;
	?>
        <section id="error-banner" class="error-banner text-center" data-stellar-background-ratio="0.1" data-stellar-vertical-offset="0">
          <div class="parallax-style">
            <div class="section-padding">
              <div class="container">
                <div class="banner-text">
                  <div class="section-top">
                    <h3 class="error-title">
                      <?php if (isset($elevation_options['settings_404_title'])) echo esc_html( $elevation_options['settings_404_title'] ); ?>
                    </h3><!-- /.error-title -->
                  </div><!-- /.section-top -->

                  <div class="section-border">
                    <div class="border-style">
                      <span></span>
                    </div><!-- /.border-style -->
                  </div><!-- /.section-border -->

                  <h1 class="error-main-title">
                    <?php if (isset($elevation_options['settings_404_heading'])) echo esc_html( $elevation_options['settings_404_heading'] ); ?>
                  </h1><!-- /.main-title -->
                  <h2 class="error-sub-title">
                    <?php if (isset($elevation_options['settings_404_subheading'])) echo esc_html( $elevation_options['settings_404_subheading'] ); ?>
                  </h2><!-- /.sub-title -->
                  <div class="btn-container">
                    <a href="<?php echo esc_url( home_url( '/' ));?>" class="btn btn-lg">
                    	<?php if (isset($elevation_options['settings_404_return_home'])) echo esc_html( $elevation_options['settings_404_return_home'] ); ?>
                    </a>
                  </div><!-- /.btn-container -->
                </div><!-- /.banner-text -->
              </div><!-- /.container -->
            </div><!-- /.section-padding -->
          </div><!-- /.parallax-style -->
        </section><!-- /#error-banner -->

<?php }







/*===================================================================================
 * Change Meta Box visibility according to Coming Soon Page Template
 * =================================================================================*/

add_action('admin_head', 'elevation_coming_soon_page_meta_box_script');

function elevation_coming_soon_page_meta_box_script() {
    global $current_screen;
    if('page' != $current_screen->id) return;

    echo <<<HTML
        <script type="text/javascript">
        jQuery(document).ready( function($) {

            /**
             * Adjust visibility of the meta box at startup
            */
            if($('#page_template').val() == 'coming-soon-template.php') {
                // show the meta box
                $('#coming-soon-template').show();
                //$('#section-short-description').show();
                $('#postdivrich').css('display','none');
            } else {
                // hide your meta box
                $('#coming-soon-template').hide();
                //$('#section-short-description').hide();
                $('#postdivrich').css('display','block');
            }

            // Debug only
            // - outputs the template filename
            // - checking for console existance to avoid js errors in non-compliant browsers
            if (typeof console == "object")
                console.log ('default value = ' + $('#page_template').val());

            /**
             * Live adjustment of the meta box visibility
            */
            $('#page_template').live('change', function(){
                    if($(this).val() == 'coming-soon-template.php') {
                    // show the meta box
                    $('#coming-soon-template').show();
                  //  $('#section-short-description').show();
                    $('#postdivrich').css('display','none');

                } else {
                    // hide your meta box
                    $('#coming-soon-template').hide();
                   // $('#section-short-description').hide();
                    $('#postdivrich').css('display','block');
                }

                // Debug only
                if (typeof console == "object")
                    console.log ('live change value = ' + $(this).val());
            });
        });
        </script>
HTML;
}




// Coming Soon Template Title
function elevation_coming_soon_title_subtitle(){
	global $elevation_options;

	$coming_soon_title = $elevation_options['coming_soon_title'];
	$coming_soon_sub_title = $elevation_options['coming_soon_sub_title'];


	?>
		<div class="section-top">
			<h2 class="landing-title">
				<?php if (isset($coming_soon_title)) echo esc_html( $coming_soon_title ); ?>
			</h2><!-- /.landing-title -->
			<p class="section-description">
				<?php if (isset($coming_soon_sub_title)) echo esc_html( $coming_soon_sub_title ); ?>
			</p><!-- /.section-description -->
		</div><!-- /.section-top -->

<?php }








add_action("wp_ajax_elevation_causes_donation_button", "elevation_causes_donation_button");
add_action("wp_ajax_nopriv_elevation_causes_donation_button", "elevation_causes_donation_button");
function elevation_causes_donation_button(){

	$post_id = (isset($_REQUEST["post_id"]) && $_REQUEST["post_id"]>0) ? $_REQUEST["post_id"] : 0;

	$query_args = array(
		'post_type'	=> 'caueses',
		'p'			=> $post_id
	);
	$outputraw = $output = '';
	$r = new WP_Query($query_args);
	if($r->have_posts()){

		while ($r->have_posts()){ $r->the_post(); setup_postdata($r->post);
			global $product;
			ob_start();
			//get_template_part( 'inc/portfolio', 'popup' );
			CANDOR_FRAMEWORK_PATH . 'lib/paypal.php';

			$outputraw = ob_get_contents();
			ob_end_clean();
		}
	}
	$output = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $outputraw);
	echo      $output;exit();
}




function is_post_type($type){
    global $wp_query;
    if($type == get_post_type($wp_query->post->ID)) return true;
    return false;
}



function elevation_get_map_coordinates($address, $force_refresh = false ) {

    $address_hash = md5( $address );
    $coordinates = get_transient( $address_hash );

    if ($force_refresh || $coordinates === false) {

        $args       = array('address' => urlencode( $address ), 'sensor' => 'false');
        $url        = add_query_arg( $args, 'https://maps.googleapis.com/maps/api/geocode/json' );
        $response   = wp_remote_get( esc_url($url) );

        if( is_wp_error( $response ) )
            return;

        $data = wp_remote_retrieve_body( $response );

        if( is_wp_error( $data ) )
            return;

        if ( $response['response']['code'] == 200 ) {

            $data = json_decode( $data );

            if ( $data->status === 'OK' ) {

                $coordinates = $data->results[0]->geometry->location;

                $cache_value['lat']     = $coordinates->lat;
                $cache_value['lng']     = $coordinates->lng;
                $cache_value['address'] = (string) $data->results[0]->formatted_address;

                // cache coordinates for 3 months
                set_transient($address_hash, $cache_value, 3600*24*30*3);
                $data = $cache_value;

            } elseif ( $data->status === 'ZERO_RESULTS' ) {
                return __( 'No location found for the entered address.', 'elevation' );
            } elseif( $data->status === 'INVALID_REQUEST' ) {
                return __( 'Invalid request. Did you enter an address?', 'elevation' );
            } else {
                return __( 'Something went wrong while retrieving your map, please ensure you have entered the shortcode correctly.', 'elevation' );
            }

        } else {
            return __( 'Unable to contact Google API service.', 'elevation' );
        }

    } else {
       // return cached results
       $data = $coordinates;
    }

    return $data;
}






/* Coming Soon Block */
function elevation_define_public_hooks_display(){
	global $elevation_options;
	if( $elevation_options['coming_soon'] == "on" ){
		add_action('template_redirect', 'elevation_coming_soon_template_redirect');
	}
}
add_action('wp', 'elevation_define_public_hooks_display');


function elevation_coming_soon_check_valid_page() {
     return in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php') );
}

function elevation_coming_soon_template_redirect(){
    if(is_user_logged_in()){
        //if user logged in then Webpage will show in normal web mode
    }
    else
    {
        if( !is_admin() && !elevation_coming_soon_check_valid_page()){  //show maintenance page
            elevation_load_coming_soon_template();
        }
    }
}

function elevation_load_coming_soon_template(){
    header('HTTP/1.0 503 Service Unavailable');
    	include_once get_template_directory() . '/coming-soon-template.php';
    exit();
}


function elevation_home_donation_button(){
    global $elevation_options;
    if($elevation_options['home_donate_button'] == 'show'){
    $donation_form = trim($elevation_options['cause-donation-form']);
    ?>
    <a class="btn btn-xsm donate-btn" href="#donate-button" data-rel="fancybox" >
        <?php echo esc_html( $elevation_options['home_donate_title'] );?>
    </a>
    <div id="donate-button" style="display: none;">
        <?php echo do_shortcode($donation_form); ?>
    </div>
<?php }
}








// Demo Import Options
function elevation_import_files() {
    return array(

        array(
            'import_file_name'           => 'Homepage',
            'categories'                 => array( 'Home Variations' ),
            'import_file_url'            => ELEVATION_PATH . '/inc/demo-importer/contents/demo-content.xml',
            'import_widget_file_url'     => ELEVATION_PATH . '/inc/demo-importer/contents/widgets.json',
            'import_redux'               => array(
                array(
                    'file_url'    => ELEVATION_PATH . '/inc/demo-importer/contents/theme_options.json',
                    'option_name' => 'elevation_options',
                ),
            ),
            'import_preview_image_url'   => ELEVATION_PATH . '/inc/demo-importer/images/home-1.png',
            'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'elevation' ),
        ),

        // array(
        //     'import_file_name'           => 'Homepage Two',
        //     'categories'                 => array( 'Home Variations' ),
        //     'import_file_url'            => ELEVATION_PATH . '/inc/demo-importer/contents/demo-content.xml',
        //     'import_widget_file_url'     => ELEVATION_PATH . '/inc/demo-importer/contents/widgets.json',
        //     'import_redux'               => array(
        //         array(
        //             'file_url'    => ELEVATION_PATH . '/inc/demo-importer/contents/theme_options.json',
        //             'option_name' => 'elevation_options',
        //         ),
        //         // array(
        //         //     'file_url'    => 'http://www.your_domain.com/ocdi/redux2.json',
        //         //     'option_name' => 'redux_option_name_2',
        //         // ),
        //     ),
        //     'import_preview_image_url'   => ELEVATION_PATH . '/inc/demo-importer/images/home-2.png',
        //     'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'elevation' ),
        // ),






    );
}
add_filter( 'pt-ocdi/import_files', 'elevation_import_files' );


function elevation_after_import_setup( $selected_import ) {

	if ( 'Homepage' === $selected_import['import_file_name'] ) {

	    // Assign menus to their locations.
	    $top_menu     = get_term_by( 'name', 'One Page Menu', 'nav_menu' );
	    $sidebar_menu = get_term_by( 'name', 'Standard Menu', 'nav_menu' );


	    set_theme_mod( 'nav_menu_locations', array(
	            'home-menu' => $top_menu->term_id,
	            'standard' => $sidebar_menu->term_id,
	        )
	    );


	    // Assign front page and posts page (blog page).
	    $front_page_id = get_page_by_title( 'Homepage' );
	    $blog_page_id  = get_page_by_title( 'Blog' );

	    update_option( 'show_on_front', 'page' );
	    update_option( 'page_on_front', $front_page_id->ID );
	    update_option( 'page_for_posts', $blog_page_id->ID );


		//Set Front page
        // $page = get_page_by_title( 'Homepage');
        // if ( isset( $page->ID ) ) {
        //     update_option( 'page_on_front', $page->ID );
        //     update_option( 'show_on_front', 'page' );
        //     update_option( 'page_for_posts', $blog_page_id->ID );
        // }


        //Import Revolution Slider
        //https://www.themevan.com/a-simple-guide-to-provide-one-click-demo-import-feature-in-wordpress/
        if ( class_exists( 'RevSlider' ) ) {
           $slider_array = array(
                get_template_directory() . '/inc/demo-importer/contents/revslider/homepage.zip'
            );

           $slider = new RevSlider();

           foreach($slider_array as $filepath){
             $slider->importSliderFromPost(true,true,$filepath);
           }
        }

	}
	// elseif ( 'Homepage Two' === $selected_import['import_file_name'] ) {}


}
add_action( 'pt-ocdi/after_import', 'elevation_after_import_setup' );



function elevation_before_widgets_import( $selected_import ) {
    echo esc_html__("Add your code here that will be executed before the widgets get imported!","elevation");
}
add_action( 'pt-ocdi/before_widgets_import', 'elevation_before_widgets_import' );


function elevation_plugin_intro_text( $default_text ) {
    $default_text .= '<div class="ocdi__intro-text"><strong>'. esc_html('Demo Importing will take few minutes depending on your Hosting Server.','elevation') . '</strong></div><br>';

    return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'elevation_plugin_intro_text' );


add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );


function elevation_plugin_page_setup( $default_settings ) {
    $default_settings['parent_slug'] = 'themes.php';
    $default_settings['page_title']  = esc_html__( 'One Click Demo Import' , 'elevation' );
    $default_settings['menu_title']  = esc_html__( 'Import Demo Data' , 'elevation' );
    $default_settings['capability']  = 'import';
    $default_settings['menu_slug']   = 'pt-one-click-demo-import';

    return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'elevation_plugin_page_setup' );


function elevation_confirmation_dialog_options ( $options ) {
    return array_merge( $options, array(
        'width'       => 300,
        'dialogClass' => 'wp-dialog',
        'resizable'   => false,
        'height'      => 'auto',
        'modal'       => true,
    ) );
}
add_filter( 'pt-ocdi/confirmation_dialog_options', 'elevation_confirmation_dialog_options', 10, 1 );