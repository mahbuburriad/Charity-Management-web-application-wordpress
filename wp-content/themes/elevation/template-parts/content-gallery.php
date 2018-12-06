<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elevation
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php echo elevation_post_date();?>

	<div class="post-content media-body">

		<?php $slides = rwmb_meta('_elevation_gallery_images','type=image_advanced'); ?>
		<?php $count = count($slides); ?>
		<?php if($count > 0){ ?>
			<div class="post-thumbnail">
				<div id="post-slider" class="post-slider carousel slide" data-ride="carousel">

					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
						<?php $slide_no = 0; ?>
						<?php foreach( $slides as $slide ): ?>
							<div class="item <?php if($slide_no == 0){ echo 'active'; }; ?>">
								<?php $images = wp_get_attachment_image_src( $slide['ID'], 'elevation-blog-single' ); ?>
								<img src="<?php echo  esc_url( $images[0] ); ?>" alt="">
							</div>
							<?php $slide_no++ ?>
						<?php endforeach; ?>
					</div><!-- /.carousel-inner -->

					<!-- Controls -->
					<div class="carousel-controls">
						<a class="left carousel-control" href="#post-slider" role="button" data-slide="prev">
							<span><i class="fa fa-angle-left"></i></span>
						</a>
						<a class="right carousel-control" href="#post-slider" role="button" data-slide="next">
							<span><i class="fa fa-angle-right"></i></span>
						</a>
					</div><!-- /.carousel-controls -->

				</div>
			</div>
		<?php } ?>


		<h3 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3><!-- /.entry-title -->
		
		<?php echo elevation_entry_post_meta();?>

		<p class="entry-content">

			<?php echo wp_trim_words( get_the_content(), 52, ' '  ); ?>
			<?php 
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'elevation' ),
				'after'  => '</div>',
				) );
			?>
		</p><!-- /.entry-content -->

		<div class="btn-container">
			<a href="<?php the_permalink();?>" class="btn btn-xsm"><?php echo esc_html__('Read More','elevation');?></a>
		</div><!-- /.btn-container -->
	</div><!-- /.post-content -->
</article><!-- /.post -->
