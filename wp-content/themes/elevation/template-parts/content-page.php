<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elevation
 */

global $elevation_options;

if( $elevation_options[ 'remove_page_meta_data'] == "show" ) 
  $class = "post-content";
else 
  $class = "post-content-no-meta";

?>

<article cid="page-<?php the_ID(); ?>" <?php post_class('media'); ?>>

	<?php if( $elevation_options[ 'remove_page_meta_data'] == "show" ) {
		elevation_post_date();
	}?>
	

	<div class="<?php echo esc_attr( $class );?>">

		<?php if ( has_post_thumbnail() ) { ?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail('elevation-blog-thumb'); ?>
			</div>
		<?php } ?>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		
		<?php //echo elevation_entry_post_meta();?>

		<p class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'elevation' ),
				'after'  => '</div>',
			) );
		?>
		</p><!-- /.entry-content -->

		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'elevation' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->

		<?php echo elevation_single_page_entry_footer(); ?>

	</div><!-- /.post-content -->
</article><!-- /.post -->
