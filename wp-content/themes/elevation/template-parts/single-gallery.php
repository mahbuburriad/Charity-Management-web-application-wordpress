<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Elevation
 */
?>
  <article <?php post_class();?>>
    <?php echo elevation_post_date();?>

    <div class="post-content media-body">
    
      <?php $slides = rwmb_meta('_elevation_gallery_images','type=image_advanced'); ?>
      <?php $count = count($slides); ?>
      <?php if($count > 0){ ?>
        <div class="post-thumbnail">
          <div id="post-slider" class="post-slider carousel slide" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <?php $slide_no = 0; ?>
              <?php foreach( $slides as $slide ): ?>
                <div class="item <?php if($slide_no == 0){ echo 'active'; }; ?>">
                  <?php $images = wp_get_attachment_image_src( $slide['ID'], 'elevation-blog-single' ); ?>
                  <img src="<?php echo  esc_url( $images[0] ); ?>" alt="">
                </div>
                <?php $slide_no++ ?>
              <?php endforeach; ?>
            </div><!-- /.carousel-inner -->

            <!-- Controls -->
            <div class="carousel-controls">
              <a class="left carousel-control" href="#post-slider" role="button" data-slide="prev">
                <span><i class="fa fa-angle-left"></i></span>
              </a>
              <a class="right carousel-control" href="#post-slider" role="button" data-slide="next">
                <span><i class="fa fa-angle-right"></i></span>
              </a>
            </div><!-- /.carousel-controls -->

          </div>
        </div>
      <?php } ?>
      
      <h3 class="entry-title"><?php the_title();?></h3><!-- /.entry-title -->
      
      <?php echo elevation_entry_post_meta();?>

      <div class="entry-content">
        <?php the_content();?>
      </div><!-- /.entry-content -->
     
      <?php echo elevation_single_post_entry_footer();?>

    </div><!-- /.post-content -->
  </article><!-- /.post -->
