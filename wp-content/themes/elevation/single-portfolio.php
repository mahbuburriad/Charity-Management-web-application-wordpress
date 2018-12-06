<?php
/**
 * The template for displaying all single Portfolio
 *
 * @package A-Team
 */
global $elevation_options, $post;

get_header('page'); 
?>
<div class="container">
        <div class="row">
		<section id="main-content" class="main-content">
			
		<?php if ( have_posts() ) { while ( have_posts() ) { the_post(); 

					$portfolio_cat = get_the_term_list( $post->ID, 'portfolio_category', ' ', ', ' ); 

					$portfolio_portfolio_author_name 	= candor_framework_meta( '_elevation_portfolio_client_name');
					$portfolio_date 					= candor_framework_meta( '_elevation_portfolio_date' );
					$portfolio_url 						= candor_framework_meta( '_elevation_portfolio_url' );							
					$portfolio_project_button 			= candor_framework_meta( '_elevation_portfolio_project_button' );
					$portfolio_project_url 				= candor_framework_meta( '_elevation_portfolio_project_url' );

					$portfolio 							= rwmb_meta( '_elevation_portfolio_images','type=image_advanced');

				?>


			
			<div class="project-details">
				<div class="row">
					<div class="col-md-8">

						<?php 
						$count = count($portfolio);

						if($count > 0){ ?>

						<div id="single-slide" class="single-slider carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<?php 
								$portfolio_no = 0;
								foreach( $portfolio as $pp ){ ?>

								<div class="item <?php if($portfolio_no == 0){ echo 'active'; }; ?>">

									<?php $images = wp_get_attachment_image_src( $pp['ID'], 'elevation-blog-single' ); ?>
									<img src="<?php echo esc_attr( $images[0] ); ?>" alt="">
								</div>

								<?php 
								$portfolio_no++;
							}
							?>
						</div>
						<!-- Controls -->
						<a class="left carousel-control" href="#single-slide" role="button" data-slide="prev">
							<span><i class="fa fa-angle-left"></i></span>
						</a>
						<a class="right carousel-control" href="#single-slide" role="button" data-slide="next">
							<span><i class="fa fa-angle-right"></i></span>
						</a>
					</div>
					<?php } else{
						the_post_thumbnail('elevation-blog-single');
					} ?>

						<h3 class="entry-title">
							<?php the_title();?>
						</h3>
						<div class="entry-text">
							<p><?php the_content(); ?></p>
						</div><!-- /.entry-text -->					
					</div>

					<div class="col-md-4">
						<h3 class="project-title">					
							<?php //echo esc_attr( $elevation_options['section_portfolio_project_details'] );?>
								PROJECT DETAILS
						</h3>
						<ul>
							<?php if( $portfolio_portfolio_author_name ) { ?>	
								<li class="fa fa-user"> <a href="<?php echo esc_url( $portfolio_url );?>"><?php echo esc_attr( $portfolio_portfolio_author_name );?> </a></li>

							<?php } if( $portfolio_date ) { ?>
								<li class="fa fa-clock-o"> <time datetime="2015-04-12"><?php echo esc_attr( $portfolio_date );?></time> </li>

							<?php } if( $portfolio_cat ) { ?>
								<li class="fa fa-tags">						
									<?php echo strip_tags( $portfolio_cat ); ?>
								</li>
							<?php } ?>					

						</ul>						
						<?php if ( $portfolio_project_button && $portfolio_project_url ) { ?>
							<div class="btn-container default">
								<a class="btn btn-md" href="<?php echo esc_attr( $portfolio_project_url); ?>" target="_blank">
									<?php echo esc_attr( $portfolio_project_button );?>
								</a>
							</div><!-- /.btn-container -->
						<?php } ?>		

					</div>
				</div><!-- /.row -->
			</div><!-- /.project-details -->

		<?php } } ?>	





			<div class="works">

				<h2 class="section-title"><span></span>
					<?php // echo esc_attr( $elevation_options['section_portfolio_similar_project'] );?>	
					Similar Projects
				</h2>

				<div id="works-slider"  class="works-slider text-center owl-carousel owl-theme">

					<?php 
					$similar_portfolio = candor_get_custom_posts("portfolio", 20); 
					foreach ($similar_portfolio as $post) {
						setup_postdata($post);
						?>

						<div class="item">

							<?php $url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID(), 'elevation-home-gallery' ) ); ?>

							<a href="<?php echo esc_attr( $url ); ?>">

								<img class="img-responsive" src="<?php echo esc_attr( $url ); ?>" alt="<?php echo get_the_title();?>"/>

								<div class="item-details">

									<span class="item-title"><?php the_title();?></span>

								</div>

							</a>
						</div><!-- /.item -->

					<?php  } ?>

				</div><!-- /#works-slider -->
			</div><!-- /.works -->

		</section><!-- /#our-works -->

	</div>
</div>
<?php get_footer(); ?>