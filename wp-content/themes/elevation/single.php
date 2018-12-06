<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Elevation
 */

get_header('page'); ?>


    <!-- Main Content -->
    <section id="main-content" class="main-content">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="single-post">
            
        				<?php while ( have_posts() ) : the_post();

                  get_template_part( 'template-parts/single', get_post_format() ); 

                  // If comments are open or we have at least one comment, load up the comment template.
                  if ( comments_open() || get_comments_number() ) {
                    comments_template();
                  }
                endwhile; // End of the loop. 
                ?>	

            </div><!-- /.blog-posts -->
          </div>
          
          <?php echo elevation_sidebar();?>

        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.main-content -->        


<?php
get_footer();
