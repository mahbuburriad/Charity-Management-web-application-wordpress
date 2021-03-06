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

        <?php 
	        $status_url = candor_framework_meta( '_elevation_status_url' ); 
	        if($status_url != ''){ ?>
	        <div class="entry-status">
	        	<?php echo esc_attr( $status_url ); ?>
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
