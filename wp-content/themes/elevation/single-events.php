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

      <?php //echo elevation_causes_entry_header();?>

      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="single-post">

              <?php while ( have_posts() ) { the_post(); 

        			
                $event_date         = get_post_meta( $post->ID, '_elevation_event_date',true );
                $event_place        = get_post_meta( $post->ID, '_elevation_event_place',true );
                $event_start        = get_post_meta( $post->ID, '_elevation_event_start',true );
                $event_end          = get_post_meta( $post->ID, '_elevation_event_end',true );

                $newdate = date_parse($event_date); 

                $dt = DateTime::createFromFormat('!m', $newdate['month']);


                $old_event_start_timestamp = strtotime($event_start);
                $old_event_end_timestamp = strtotime($event_end);

                $event_start_time = date('ga', $old_event_start_timestamp);
                $event_end_time = date('ga', $old_event_end_timestamp);


                $event_date_format = $event_date ;
                $event_date_formats = strtotime($event_date_format);
                $event_date_formated = date("M d, Y", $event_date_formats);  
                ?>

                <article <?php post_class('media');?>>

                  <div class="post-content media-body">
                    <?php if ( has_post_thumbnail() ) { ?>
                      <div class="post-thumbnail">
                        <?php the_post_thumbnail('elevation-blog-single'); ?>

                      </div>
                    <?php } ?>
                    
                   

                    <?php echo elevation_entry_post_meta();?>

          					<h3 class="entry-title event"><?php the_title();?></h3><!-- /.entry-title --> 

                                       
                    <div class="event-details">
                      <?php if( $event_date ){ ?>
                        <div class="event-date">
                          <?php echo esc_html__("Event Date:", "elevation");?> <span> <?php echo esc_html( $event_date_formated );?></span>
                        </div>            
                      <?php } if( $event_place ){ ?>
                        <div class="event-place">
                          <?php echo esc_html__("Event Place:", "elevation");?> <span> <?php echo esc_html( $event_place );?></span>
                        </div>                                        
                      <?php } if( $event_start_time ){ ?>
                        <div class="event-start">
                          <?php echo esc_html__("Event Start:", "elevation");?> <span> <?php echo esc_html( $event_start_time );?></span>
                        </div>                                         
                      <?php } if( $event_end_time ){ ?>
                        <div class="event-end">
                          <?php echo esc_html__("Event End:", "elevation");?> <span> <?php echo esc_html( $event_end_time );?></span>
                        </div>
                      <?php } ?>
                    </div>

          	  				<div class="entry-content">
          	  					<?php 

                          the_content();

                          $address            = get_post_meta( $post->ID, '_elevation_event_place',true );

                          $coordinates        = '';      
                          $zoom               = '15';
                          $height             = '300px';
                          $hue                = '';
                          $scrollwheel        = 'disabled';


                          $out = '';

                          if(!$address && !$coordinates) {
                            $out .= __('Address was not specified', 'elevation');
                            return $out;
                          }

                          if(!$coordinates) {
                            $coordinates = elevation_get_map_coordinates($address);
                            if (is_array($coordinates)) {
                              $coordinates = $coordinates['lat'] . ',' . $coordinates['lng'];
                            } else {
                              $out .= __('Wrong coordinates', 'elevation');
                              return $out;
                            }
                          }

                          $height = 'height:'.preg_replace("/[^0-9]*/","",$height).'px';

                          $data = '';

                          $data .= ($hue) ? ' data-hue="'.esc_attr($hue).'"' : '';
                          $data .= (in_array($scrollwheel, array('enabled','yes','1','true','on'))) ? ' data-scrollwheel="enabled"' : '';

                          $out .= '<div id="map_canvas_' . rand(1, 100) . '" class="flexible-map pwpt-shortcode-block" style="'.esc_attr($height). '" '.$data.'>';
                          $out .= '<input class="location" type="hidden" value="' . esc_attr($address) . '" />';
                          $out .= '<input class="coordinates" type="hidden" value="' . esc_attr($coordinates) . '" />';
                          $out .= '<input class="zoom" type="hidden" value="' . esc_attr($zoom) . '" />';
                          $out .= '<div class="map_canvas"></div>';
                          $out .= '</div>';

                          echo   $out;
                        ?>
                        
          	  				</div>

                  </div><!-- /.post-content -->
                </article><!-- /.post -->

              <?php } // End of the loop. ?>  
              
            </div><!-- /.blog-posts -->
          </div>

        <?php echo elevation_sidebar();?>

        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.main-content -->       


<?php get_footer();



