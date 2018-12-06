<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elevation
 */

get_header('page'); ?>


    <!-- Main Content -->
    <section id="main-content" class="main-content">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="blog-posts">
      				
              <?php
      					while ( have_posts() ) { the_post(); 
      						/* Include the Post-Format-specific template for the content.
      						 * If you want to override this in a child theme, then include a file
      						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
      						 */
      						get_template_part( 'template-parts/content', 'page' );
                
    						
                  // If comments are open or we have at least one comment, load up the comment template.
                  if ( comments_open() || get_comments_number() ) {
                    comments_template();
                  }
    					  }                
      				?>

          </div><!-- /.blog-posts -->
        </div>

        <?php echo elevation_sidebar();?>

        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.main-content -->        


<?php
get_footer();

