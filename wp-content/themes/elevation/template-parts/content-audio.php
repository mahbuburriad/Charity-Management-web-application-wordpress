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
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail('elevation-blog-thumb'); ?>
			</div>
		<?php } ?>

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
