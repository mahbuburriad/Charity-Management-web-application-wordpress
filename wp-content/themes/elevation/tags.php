<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elevation
 */

get_header(); ?>

    <!-- Main Content -->
    <section id="main-content" class="main-content">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="blog-posts">
				<?php
					if ( have_posts() ) {
						if ( is_home() && ! is_front_page() ) { ?>		
            					
						<header class="page-header">
							<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="taxonomy-description">', '</div>' );
							?>
						</header><!-- .page-header -->

						<?php } while ( have_posts() ) { the_post(); 
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

          <div class="col-md-3">
          	<?php 
          	if ( is_active_sidebar( 'blog-sidebar' ) ) { 
          		dynamic_sidebar('blog-sidebar'); 
          	} else{
          		get_sidebar();
          	}
          	?>
          </div>

        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.main-content -->        


<?php
get_footer();