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

               $events = array (
                          'post_type'              => 'events',
                          'posts_per_page'         => -1,
                          'order'                  => 'ASC',                          
                          'meta_key'               => '_elevation_event_date',                          
                          'orderby'                => 'meta_value',
                        ); 
                        $events_query = new WP_Query( $events ); 

                         while ( $events_query->have_posts() ) { $events_query->the_post(); 
                            /**
                             * Template part for displaying posts.
                             *
                             * @link https://codex.wordpress.org/Template_Hierarchy
                             *
                             * @package Elevation
                             */
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
                              $event_date_formatss = date("F jS, Y g:ia", $event_date_formats);                             
                            ?>

                                <article cid="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                  
                                  <div class="post-date media-left">
                                    <time datetime="<?php the_time();?>"><span class="date media-left"><?php echo esc_html( $newdate['day'] ); ?></span> <span class="media-body"><?php echo esc_html( $dt->format('M')); ?> <?php echo esc_html( $newdate['year'] ); ?></span></time>
                                  </div><!-- /.post-date -->

                                  <div class="post-content media-body">
                                    <?php if ( has_post_thumbnail() ) { ?>
                                      <div class="post-thumbnail">
                                        <?php the_post_thumbnail('elevation-blog-single'); ?>
                                      </div>
                                    <?php } ?>

                                    <h3 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3><!-- /.entry-title -->
                                    <?php echo elevation_entry_post_meta();?>

                                    <div class="event-details">
                                      <?php if( $event_date ){ ?>
                                        <div class="event-date">
                                          <?php echo esc_html__("Event Date:", "elevation");?> <span> <?php echo esc_html( $event_date_formatss );?></span>
                                        </div>            
                                      <?php } if( $event_place ){ ?>
                                        <div class="event-place">
                                          <?php echo esc_html__("Event Place:", "elevation");?> <span> <?php echo esc_html( $event_place );?></span>
                                        </div>                                        
                                      <?php } if( $event_start ){ ?>
                                        <div class="event-start">
                                          <?php echo esc_html__("Event Start:", "elevation");?> <span> <?php echo esc_html( $event_start_time );?></span>
                                        </div>                                         
                                      <?php } if( $event_end ){ ?>
                                        <div class="event-end">
                                          <?php echo esc_html__("Event End:", "elevation");?> <span> <?php echo esc_html( $event_end_time );?></span>
                                        </div>
                                      <?php } ?>
                                    </div>

                                    <div class="entry-content">
                                      <?php the_excerpt();?>
                                    </div>

                                  </div><!-- /.post-content -->
                                </article><!-- /.post -->






              <?php 
              wp_reset_query();
            } ?>
          </div><!-- /.blog-posts -->
        </div>

        <?php echo elevation_sidebar();?>

        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.main-content -->        


<?php
get_footer();

