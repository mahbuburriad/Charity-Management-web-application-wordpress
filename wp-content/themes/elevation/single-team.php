<?php
/**
 * The template for displaying all single team
 *
 * @package Elevation
 */
global $elevation_options, $post;

get_header('page'); 
?>
<div class="container">
	<div class="row">
		<section class="main-content team-single">
			<div class="member-area">
				<?php if ( have_posts() ) { while ( have_posts() ) { the_post(); 

					$team_cat = get_the_term_list( $post->ID, 'team_category', ' ', ', ' ); 

					$team_member_name 	= candor_framework_meta( '_elevation_team_member_name');
					$team_member_designation = candor_framework_meta( '_elevation_team_member_designation' );
					$team_desc 						= candor_framework_meta( '_elevation_team_desc' );		

					$social_twitter 			= candor_framework_meta( '_elevation_social_twitter' );
					$social_facebook 				= candor_framework_meta( '_elevation_social_facebook' );
					$social_dribbble 				= candor_framework_meta( '_elevation_social_dribbble' );
					$social_google_plus 				= candor_framework_meta( '_elevation_social_google_plus' );
					$social_linkedin 				= candor_framework_meta( '_elevation_social_linkedin' );
					$social_instagram 				= candor_framework_meta( '_elevation_social_instagram' );
					?>



					<div class="col-sm-4 member-single">
						<div class="volunteer">
							<div class="volunteer-avatar">
								<?php the_post_thumbnail('elevation-team-thumbs'); ?>
							</div><!-- /.volunteer-avatar -->
							<div class="volunteer-details text-center">
								<a href="<?php the_permalink();?>">
									<h4 class="volunteer-name"><?php echo esc_attr( $team_member_name );?></h4><!-- /.volunteer-name -->
								</a>
								<span class="position">
									<?php echo esc_attr( $team_member_designation );?>
								</span><!-- /.position -->

								<div class="volunteer-social">
									<ul class="social-list">
										<?php if( $social_facebook ){ ?>
										<li><a href="<?php echo esc_url($social_facebook);?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
										<?php } if( $social_twitter ){ ?>
										<li><a class="twitter" href="<?php echo esc_url($social_twitter);?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
										<?php } if( $social_linkedin ){ ?>
										<li><a class="linkedin" href="<?php echo esc_url($social_linkedin);?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
										<?php } if( $social_google_plus ){ ?>
										<li><a class="google-plus" href="<?php echo esc_url($social_google_plus);?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
										<?php } if( $social_dribbble ){ ?>
										<li><a class="google-plus" href="<?php echo esc_url($social_dribbble);?>" target="_blank"><i class="fa fa-dribbble"></i></a></li>
										<?php } if( $social_instagram ){ ?>
										<li><a class="google-plus" href="<?php echo esc_url($social_instagram);?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
										<?php } ?>
									</ul><!-- /.social-list -->
								</div><!-- /.volunteer-social -->
							</div><!-- /.volunteer-details -->
						</div><!-- /.volunteer -->
					</div><!-- /.col-sm-4 -->

					<div class="col-sm-8 member-single">
						<div class="item-top">
							<span class="member-name">
								<h2><?php echo esc_attr($team_member_name);?></h2>
							</span><!-- /.member-name -->
							<span>
								<?php echo esc_attr($team_member_designation);?>
							</span>
						</div>
						<div class="member-details">
							<?php the_content();?>
						</div>
					</div>

					<?php } } ?>	

				</div>
			</section><!-- /#our-works -->

		</div>
	</div>
	<?php get_footer(); ?>