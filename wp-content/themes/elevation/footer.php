<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Elevation
 */

?>


        <!-- Footer Section --> 

        <footer id="colophon" class="footer site-footer">
          <div class="footer-top">
            <div class="section-padding">
              <div class="container">
                <div class="row">
                  <?php echo elevation_footer_sidebar();?>
                </div><!-- /.row -->
              </div><!-- /.container -->
            </div><!-- /.section-padding -->
          </div><!-- /.footer-top -->



          <div class="footer-bottom">
            <div class="container">
              <div class="copy-right">
                <ul>
                  <?php echo elevation_copyrights_text();?>
                </ul>
              </div><!-- /.copy-right -->

              <div class="footer-social pull-right">
                <?php echo elevation_footer_bottom_social();?>
              </div><!-- /.footer-social -->
            </div><!-- /.container -->
          </div><!-- /.footer-bottom -->
        </footer><!-- /#colophon -->


        <div id="scroll-to-top" class="scroll-to-top">
          <span>
            <i class="fa fa-chevron-up"></i>    
          </span>
        </div><!-- /#scroll-to-top -->


    <?php wp_footer(); ?>

</body>
</html>
