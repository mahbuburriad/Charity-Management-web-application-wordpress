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
          <div class="col-md-12">
            <div class="blog-posts">

            <?php  woocommerce_content(); ?>

          </div><!-- /.blog-posts -->
        </div>

        <?php// echo elevation_sidebar();?>

        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.main-content -->


<?php
get_footer();

