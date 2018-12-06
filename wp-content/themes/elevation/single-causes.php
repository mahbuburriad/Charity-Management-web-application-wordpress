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

      <?php echo elevation_causes_entry_header();?>

      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="single-post">

              <?php while ( have_posts() ) { the_post(); 
                $main_causes_currency       = get_post_meta( get_the_ID(), '_elevation_causes_currency',true );
                $main_causes_raised       = get_post_meta( get_the_ID(), '_elevation_causes_raised',true );
                $main_causes_goal       = get_post_meta( get_the_ID(), '_elevation_causes_goal',true );


                $main_causes_image        = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID(), 'elevation-home-causes') );  


                if( $main_causes_raised !="" &&  $main_causes_goal !=""){
                  $percentage = intval( ( $main_causes_raised / $main_causes_goal ) * 100 ); 
                  $donation_to_go = $main_causes_goal - $main_causes_raised;

                  $round_percentage = round($percentage);
                }

                ?>

                <article <?php post_class('media');?>>
                  

                  <?php echo elevation_post_date();?>

                  <div class="post-content media-body">
                    <?php if ( has_post_thumbnail() ) { ?>
                      <div class="post-thumbnail">
                        <?php the_post_thumbnail('elevation-blog-single'); ?>

                      </div>
                    <?php } ?>
                    
                    
                    <div class="pull-right"><?php echo elevation_cause_donation_button( get_the_ID());?></div>

                    <?php echo elevation_entry_post_meta();?>

                    <div class="goal"><?php echo esc_html__('Donation Goal For This Project is', 'elevation');?> <?php echo esc_attr( $main_causes_currency ); ?><?php echo esc_attr( $main_causes_goal ); ?></div>

                    <div class="item-progress">
                      <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo esc_attr( $percentage );?>%;">
                          <div class="sr-only">
                            <div class="reach"><?php echo esc_html__('Raised', 'elevation');?> <span class="currency"><?php echo esc_attr( $main_causes_currency ); ?></span><span class="amount"><?php echo esc_attr( $main_causes_raised ); ?></span></div>
                            <div class="complete"><?php echo esc_attr( $percentage );?>%</div>
                          </div>
                        </div><!-- /.progress-bar -->
                      </div><!-- /.progress -->
                    </div><!-- /.item-progress -->

                    <?php if( $round_percentage ){ ?>
                      <div class="in-percent"> <?php echo esc_attr( $round_percentage ); ?><?php echo esc_html__('% Donated', 'elevation');?></div>
                    <?php } ?>
                    
                    <?php if( $donation_to_go ){ ?>                    
                      <div class="to-go"><?php echo esc_attr( $main_causes_currency ); ?><?php echo esc_attr( $donation_to_go ); ?> <?php echo esc_html__('To Go', 'elevation');?></div>
                    <?php } ?>
                    
                    
                    <div class="pull-right"><?php echo elevation_pdf_download();?></div>
                    
                    
                    <div class="entry-content">
                      <?php the_content();?>
                    </div><!-- /.entry-content -->



                    <?php //echo elevation_single_post_entry_footer();?>

                  </div><!-- /.post-content -->
                </article><!-- /.post -->

              <?php } // End of the loop. ?>  
              
            </div><!-- /.blog-posts -->
          </div>

        <?php echo elevation_sidebar();?>

        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.main-content -->       
<?php
get_footer();



