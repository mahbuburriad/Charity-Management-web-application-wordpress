<div class="elevation-blog-masonry-items elevation-blog-items">
    <div class="elevation-blog-item-wrapper">
    	
    	<?php if( has_post_thumbnail() ) : ?>
	        <div class="elevation-blog-img-wrapper">
	        
	            <?php the_post_thumbnail('grid'); ?>
	            
	            <div class="elevation-blog-post-date">
	                <p>
	                	<?php echo get_the_time('d'); ?> 
	                	<span><?php echo get_the_time('M'); ?></span>
	                </p>
	            </div>
	            
	        </div>
        <?php endif; ?>
        
        <div class="elevation-blog-title-excerpt">
            <?php 
            	the_title('<h3><a href="'. get_permalink() .'">', '</a></h3>');
            	echo '<p>'. wp_trim_words( get_the_content(), 10, ' '  ) . '</p>';
            ?>
        </div>
        
    </div>
</div>

