<?php
	/**
	 * This loop is used to create items for the portfolio archives and also the homepage template.
	 * Any custom functions prefaced with candor_ are found in /inc/theme_functions.php
	 * First let's declare $post so that we can easily grab everthing needed.
	 */
	 global $post;
	 
	 /**
	  * Next, we need to grab the featured image URL of this post, so that we can trim it to the correct size for the chosen size of this post.
	  */
	 $url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');

	 if(!( $url[0] ))
	 	$url[0] = false;
?>

<div class="elevation-creative-blog-items elevation-blog-items" style="background-image: url(<?php echo esc_url($url[0]); ?>)">
    <div class="elevation-blog-content">
    
        <div <?php post_class();?>>
            <div class="elevation-blog-date-wrapper col-md-1 col-sm-2 col-xs-2">
                <span class="elevation-date">
                    <span class="elevation-day"><?php echo get_the_time('d'); ?></span>
                    <span class="elevation-mon"><?php echo get_the_time('M'); ?></span>
                </span>
            </div>

            <div class="elevation-blog-title-author col-md-10 col-sm-8 col-xs-8">
                <?php 
                	the_title('<h3><a href="'. get_permalink() .'">', '</a></h3>'); 
                	the_author_posts_link();	
                ?>
            </div>
        </div>
        
    </div>
</div>