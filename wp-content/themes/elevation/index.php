<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elevation
 */

get_header(); 
// Get body classes as array
$body_classes = get_body_class();
// Check if "blog" class exists in the array
if(in_array("blog", $body_classes)) {
  echo elevation_blog_header_background();
} 
?>

    <!-- Main Content -->
    <section id="main-content" class="main-content">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="blog-posts">
      				<?php
      					if ( have_posts() ) { while ( have_posts() ) { the_post(); 
      							/* Include the Post-Format-specific template for the content.
      							 * If you want to override this in a child theme, then include a file
      							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
      							 */
      							get_template_part( 'template-parts/content', get_post_format() );
      						}

      					} else { 
      						get_template_part( 'template-parts/content', 'none' ); 
      					}
      				?>
            </div><!-- /.blog-posts -->

            <?php                     
              /**
              * Post pagination, use candor_framework_pagination() first and fall back to default
              */
              echo function_exists('candor_framework_pagination') ? candor_framework_pagination() : posts_nav_link();
            ?>
            
          </div>

          <?php echo elevation_sidebar();?>

        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.main-content -->        


<?php
get_footer();
