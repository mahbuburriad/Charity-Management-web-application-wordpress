<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Elevation
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

      <?php echo elevation_preloader();?>

        <!-- Header Section -->        
        <header id="header" class="header">
          <div class="header-top">
            <div class="container">
              <div class="row">

                <?php echo elevation_header_top_contact_info();?>

                <div class="col-sm-6 text-right">
                  <div class="top-right">

                    <?php echo elevation_header_top_social();?>

                    <?php echo elevation_header_search_form();?>

                  </div><!-- /.top-right -->
                </div>
              </div><!-- /.row -->
            </div><!-- /.container -->
          </div><!-- /.header-top -->

          <div class="main-menu-continer">
            <nav id="main-menu" class="navbar navbar-default">
              <div class="container">
              
                <?php echo elevation_header_logo_options();?>

                <div id="collapse-menu" class="collapse navbar-collapse pull-right">
                  <!-- Navigation -->
                  <?php 
                  wp_nav_menu( array(
                    'menu'              => 'standard',
                    'theme_location'    => 'standard',
                    'depth'             => 5,
                    'container'         => 'ul',
                    'container_class'   => 'nav navbar-nav',
                    'menu_class'        => 'nav navbar-nav',
                    'container_id'      => 'navs',
                    'menu_id'           => 'navs',
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'walker'            => new wp_bootstrap_navwalker()                 
                    )
                  );
                  ?>
                  <!-- Navigation End -->
                </div><!-- End .collapse -->
              </div><!-- End .container -->
            </nav><!-- End #main-menu -->
          </div><!-- /.main-menu-container -->
        </header><!-- /#header -->
     



