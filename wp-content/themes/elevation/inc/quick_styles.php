<?php
function elevation_theme_custom_styles(){ 
  global $elevation_options;
  global $post_id;
  $page_thumbnail_image = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID(), 'full' ) );

    switch( isset( $elevation_options['elevation_preset_colors'] ) ){
                    case 1: 
                    $elevation_color = "#ff5722";
                    break;
                    case 2: 
                    $elevation_color = "#ff7302";
                    break;
                    case 3: 
                    $elevation_color = "#40d47e";
                    break;
                    case 4: 
                    $elevation_color = "#16a085";
                    break;
                    case 5: 
                    $elevation_color = "#f1c311";
                    break;
                    case 6: 
                    $elevation_color = "#9b59b6";
                    break;
                    case 7: 
                    $elevation_color = "#34495e";
                    break;
                    case 8: 
                    $elevation_color = "#d35400";
                    break;
                    case 9: 
                    $elevation_color = "#795548";
                    break;
                    case 10: 
                    $elevation_color = "#9b59b6";
                    break;

                    case 11: 
                    $elevation_color = $elevation_options['elevation_presets_custom_color'];
                    break;
                    default:
                    $elevation_color = "#ff5722";
                    break;
                }
?>
  <style type="text/css">
          <?php if( isset( $elevation_options['body_font']['font-family']) && isset( $elevation_options['body_font']['font-size'] ) ) { ?>
            body {
                 font-family:   <?php echo esc_attr( $elevation_options['body_font']['font-family'] );?>;
                 font-size:     <?php echo esc_attr( $elevation_options['body_font']['font-size'] );?>;
            }
          <?php } ?>

          <?php if( isset( $elevation_options[ 'preloader' ]['url'] ) ) { ?>
            #preloader{
                 background: #333 url('<?php echo esc_html( $elevation_options[ 'preloader' ]['url']);?>') no-repeat center center !important;
            }
          <?php } ?>

          <?php if( isset( $elevation_options[ 'blog_header_image' ]['url'] ) ) { ?>
            #page-head {
                  background: url('<?php echo esc_html( $elevation_options[ 'blog_header_image' ]['url']);?>') no-repeat fixed center top !important;
                  background-size: cover !important;
            }          
          <?php } else { ?>
            #page-head {
                  background: url('<?php echo esc_url( get_template_directory_uri() . "/images/8.jpg" );?>') no-repeat fixed center top !important;
                  background-size: cover !important;
            }
          <?php } ?>


          <?php if( isset( $elevation_options[ 'events_left_image' ]['url'] ) ) { ?>
            .events-banner{
              background: url('<?php echo esc_html( $elevation_options[ 'events_left_image' ]['url']);?>');
            }
          <?php } ?>

          <?php if( isset( $elevation_options[ 'settings_404_parallax_image' ]['url'] ) ) { ?>
            #error-banner {
                  background: url('<?php echo esc_url_raw( $elevation_options[ 'settings_404_parallax_image' ]['url']);?>') no-repeat fixed center top !important;
                  background-size: cover !important;
            }
          <?php } ?>


            <?php if( 
                      isset( $elevation_options['paragraph_typography']['font-family']) && 
                      isset( $elevation_options['paragraph_typography']['color'] ) &&
                      isset( $elevation_options['paragraph_typography']['font-size'] ) &&
                      isset( $elevation_options['paragraph_typography']['font-weight'] ) &&
                      isset( $elevation_options['paragraph_typography']['line-height'] )
              ) { ?>

                p{
                     font-family: <?php echo esc_attr( $elevation_options['paragraph_typography']['font-family'] );?>;
                     color: <?php echo esc_attr( $elevation_options['paragraph_typography']['color'] );?>;
                     font-size: <?php echo esc_attr( $elevation_options['paragraph_typography']['font-size'] );?>;
                     font-weight: <?php echo esc_attr( $elevation_options['paragraph_typography']['font-weight'] );?>;
                     line-height: <?php echo esc_attr( $elevation_options['paragraph_typography']['line-height'] );?>;
                }
          <?php } ?>


          <?php if( isset( $elevation_options[ 'heading_google_font' ]['font-family'] ) ) { ?>
            h1, h2, h3, h4, h5, h6 {
                 font-family: <?php echo esc_attr( $elevation_options['heading_google_font']['font-family'] );?>;
            }
          <?php } ?>

          /* Navbar Color Presets*/    

          <?php if( isset( $elevation_options[ 'navbar_bg_color' ] ) ) { ?>      
            .navbar{
              background-color: <?php
                  $hex = $elevation_options['navbar_bg_color'];
                  list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                  echo "rgba($r, $g, $b, 0.75) ";
                ?>;
            }
          <?php } ?>

          <?php if( isset( $elevation_options[ 'top_header_bg' ] ) ) { ?>
            .header-top{
              background-color: <?php
                  $hex = $elevation_options['top_header_bg'];
                  list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                  echo "rgba($r, $g, $b, 0.65) ";
                  ?> !important;
            }
          <?php } ?>

          <?php if( isset( $elevation_options[ 'top_header_bg' ] ) ) { ?>
            .navbar-default .navbar-nav li a{
              color: <?php echo esc_attr( $elevation_options['top_header_bg'] ); ?> !important;
            }
          <?php } ?>

          <?php if( isset( $elevation_options[ 'navbar_link_hover_color' ] ) ) { ?>
            .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-  default .navbar-nav>.active>a:hover, .navbar-default .navbar-nav>li>a:focus, .navbar-default .navbar-nav>li>a:hover, .events-slider .event-item time, .entry-title a:hover, .designation a, .widget-contact li:before, .post-meta a, .entry-footer .edit-link a, .post-tag a, .logged-in-as a:last-child{
              color: <?php echo esc_attr( $elevation_options['navbar_link_hover_color'] ); ?> !important;
            }
            .navbar-default .navbar-nav li a:hover{
              color: <?php echo esc_attr( $elevation_options['navbar_link_hover_color'] ); ?> !important;
            }

          <?php } ?>


            <?php if( 
                      isset( $elevation_options['navbar_dropdown_bg_color'] ) && 
                      isset( $elevation_options['navbar_dropdown_text_color'] ) &&
                      isset( $elevation_options['navbar_dropdown_hover_color'] )
              ) { ?>
                .navbar-nav li .sub-menu>li>a{
                  background: <?php echo esc_attr( $elevation_options['navbar_dropdown_bg_color'] ); ?> !important;
                  color: <?php echo esc_attr( $elevation_options['navbar_dropdown_text_color'] ); ?> !important;
                }          
                .navbar-nav li .sub-menu>li>a:hover{
                  color: <?php echo esc_attr( $elevation_options['navbar_dropdown_hover_color'] ); ?> !important;
                }
            <?php } ?>


          /*End of Navigation Color*/

          a:hover, .action .btn:hover {
            color: <?php echo esc_attr( $elevation_color );?> !important;
          }
          .btn, .causes-slider .progress-bar, .target:before, .target:after, .events .section-sub-title:before, .events .section-sub-title:after, .causes-slider .owl-page.active, .section-border:before, .section-border:after, .section-border span:before, .section-border span:after, .target:before, .target:after, .events .section-sub-title:before, .events .section-sub-title:after, .events-slider .event-title:before, .events-slider .event-title:after, .widget-title:before, .widget-title:after, .post-meta:before, .post-meta:after, .leave-comment #reply-title:before, .post-comment #reply-title:before, .leave-comment #reply-title:after, .post-comment #reply-title:after, .scroll-to-top, .elevation-button, .elevation-amount-button, 
            input[type="button"], 
            input[type="submit"], 
          .elevation-amount-button.active, .elevation-amount-button:hover {
            background-color: <?php echo esc_attr( $elevation_color );?> !important;
          }
          .section-border {
            border-left: 1px solid <?php echo esc_attr( $elevation_color );?>;
            border-right: 1px solid <?php echo esc_attr( $elevation_color );?>;
          }
          .itemFilter .current {
            border-color: <?php echo esc_attr( $elevation_color );?>;
          }
          .donate-count .btn:hover,
          .wpcf7-form .submit-btn input {
           background-color: <?php echo esc_attr( $elevation_color );?>; 
         }
         .border-style {
           border-left: 1px solid <?php echo esc_attr( $elevation_color );?>;
           border-right: 1px solid <?php echo esc_attr( $elevation_color );?>;
         }
        .wpcf7-form .wpcf7-form-control:focus,
        .search-form input:focus {
          border-color: <?php echo esc_attr( $elevation_color );?>;
        }         

        <?php if( isset( $elevation_options['logo_width'] ) && isset( $elevation_options['logo_height'] ) ) { ?>
          .navbar-default .navbar-brand>img{
            width: <?php echo esc_attr( $elevation_options['logo_width'] ); ?>px !important;
            height: <?php echo esc_attr( $elevation_options['logo_height'] ); ?>px !important;
          }
        <?php } ?>

        /* Custom CSS */
        <?php if (isset($elevation_options['custom_css'])){
             echo esc_attr( $elevation_options['custom_css'] );
        }?>

  </style>
<?php 

}
add_action( 'wp_head', 'elevation_theme_custom_styles');
