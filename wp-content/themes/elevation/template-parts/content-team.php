<?php 
  global $post;
	$team_member_name = get_post_meta( $post->ID,'_elevation_team_member_name',true );
	$team_member_designation = get_post_meta( $post->ID,'_elevation_team_member_designation',true );
	$team_desc = get_post_meta( $post->ID,'_elevation_team_desc',true );
	$social_twitter = get_post_meta( $post->ID,'_elevation_social_twitter',true );
	$social_facebook = get_post_meta( $post->ID,'_elevation_social_facebook',true );
	$social_dribbble = get_post_meta( $post->ID,'_elevation_social_dribbble',true );
	$social_google_plus = get_post_meta( $post->ID,'_elevation_social_google_plus',true );
	$social_linkedin = get_post_meta( $post->ID,'_elevation_social_linkedin',true );
	$social_instagram = get_post_meta( $post->ID,'_elevation_social_instagram',true );

  $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'elevation-team-thumbs' );
?>
  <div class="volunteer">
  	<div class="volunteer-avatar">
      <img src="<?php echo esc_url_raw( $image_url[0] ); ?>" alt="<?php the_title_attribute();?>">
  	</div><!-- /.volunteer-avatar -->
  	<div class="volunteer-details">
  		<a href="<?php the_permalink();?>">
        <h4 class="volunteer-name"><?php echo esc_attr( $team_member_name );?></h4><!-- /.volunteer-name -->
      </a>
      <span class="position">
        <?php echo esc_attr( $team_member_designation );?>
      </span><!-- /.position -->
  		<span class="desc">
  			<?php echo esc_attr( $team_desc );?>
  		</span><!-- /.position -->

  		<div class="volunteer-social">
  			<ul class="social-list text-center">
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