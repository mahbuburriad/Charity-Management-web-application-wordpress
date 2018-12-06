<?php
get_header('page'); 
global $elevation_options;
$bg_image = $elevation_options['coming_soon_bg_image']['url'];

$coming_soon_subscribe_text = $elevation_options['coming_soon_subscribe_text'];
$coming_soon_subscribe_link = $elevation_options['coming_soon_subscribe_link'];
?>

        <section id="landing-banner" class="landing-banner text-center" style="background: url('<?php echo esc_url_raw( $bg_image );?>') no-repeat fixed center top;" data-stellar-background-ratio="0.1" data-stellar-vertical-offset="0">
        	<div class="section-padding">
        		<div class="container">

        		<?php echo elevation_coming_soon_title_subtitle();?>

        			<div class="section-border">
        				<div class="border-style">
        					<span></span>
        				</div><!-- /.border-style -->
        			</div><!-- /.section-border -->

        			<div class="section-details">
        				<div id="time_countdown_coming_soon" class="time-count-container">
        					<div class="time-box">
        						<div class="time-box-inner dash days_dash">
        							<span class="time-number">
        								<span class="digit">0</span>
        								<span class="digit">0</span>
        								<span class="digit">0</span>
        							</span><!-- /.time-number -->
        							<span class="time-name">Days</span>
        						</div><!-- /.time-box-inner -->
        					</div><!-- /.time-box -->
        					<div class="time-box">
        						<div class="time-box-inner dash hours_dash">
        							<span class="time-number">
        								<span class="digit">0</span>
        								<span class="digit">0</span>
        								<span class="digit">0</span>
        							</span><!-- /.time-number -->
        							<span class="time-name">Hours</span>
        						</div><!-- /.time-box-inner -->
        					</div><!-- /.time-box -->
        					<div class="time-box">
        						<div class="time-box-inner dash minutes_dash">
        							<span class="time-number">
        								<span class="digit">0</span>
        								<span class="digit">0</span>
        								<span class="digit">0</span>
        							</span><!-- /.time-number -->
        							<span class="time-name">Mins</span>
        						</div><!-- /.time-box-inner -->
        					</div><!-- /.time-box -->
        					<div class="time-box">
        						<div class="time-box-inner dash seconds_dash">
        							<span class="time-number">
        								<span class="digit">0</span>
        								<span class="digit">0</span>
        								<span class="digit">0</span>
        							</span><!-- /.time-number -->
        							<span class="time-name">Sec</span>
        						</div><!-- /.time-box-inner -->
        					</div><!-- /.time-box -->
        				</div><!-- /#time_countdown -->

        				<div class="btn-container">
        					<a href="<?php echo esc_url_raw($coming_soon_subscribe_link);?>" class="btn btn-lg"><?php echo esc_attr($coming_soon_subscribe_text);?></a>
        				</div><!-- /.btn-container -->
        			</div><!-- /.section-details -->
        		</div><!-- /.container -->
        	</div><!-- /.section-paddng -->
        </section><!-- /#landing-banner -->

        <script type="text/javascript">
                var elv = jQuery;
                elv.noConflict();

                elv(document).ready(function($) {
                "use strict";

                        <?php 
                          $coming_soon_date = $elevation_options['coming_soon_time'];
                          //print_r($coming_soon_date);

                          $newdates = date_parse($coming_soon_date); 
                          ?>
                            elv("#time_countdown_coming_soon").countDown({
                              targetDate: {
                                'day':    <?php echo esc_html( $newdates['day'] ); ?>,
                                'month':  <?php echo esc_html( $newdates['month'] ); ?>,
                                'year':   <?php echo esc_html( $newdates['year'] ); ?>,
                                'hour':   0,
                                'min':    0,
                                'sec':    0
                             },
                                 omitWeeks: true
                           });


                });
        </script>   
<?php 
get_footer('coming-soon');