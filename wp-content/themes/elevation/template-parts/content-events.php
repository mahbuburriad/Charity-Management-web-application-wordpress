<?php
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
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post-date media-left">
		<time datetime="<?php the_time();?>"><span class="date media-left"><?php echo esc_attr( $newdate['day'] ); ?></span> <span class="media-body"><?php echo esc_attr( $dt->format('M')); ?> <?php echo esc_attr( $newdate['year']); ?></span></time>
	</div><!-- /.post-date -->

	<div class="post-content media-body">
		
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail('elevation-blog-single'); ?>
			</div>
		<?php } ?>

		<h3 class="entry-title">
			<a href="<?php the_permalink();?>">
				<?php the_title();?>		
			</a>
		</h3><!-- /.entry-title -->

		<?php echo elevation_entry_post_meta();?>

		<div class="event-details">
			<div class="event-date">
				<?php echo esc_html__("Event Date:", "elevation");?> <span> <?php echo esc_attr( $event_date );?></span>
			</div>  					
			<div class="event-place">
				<?php echo esc_html__("Event Place:", "elevation");?> <span> <?php echo esc_attr( $event_place );?></span>
			</div>  					
			<div class="event-start">
				<?php echo esc_html__("Event Start:", "elevation");?> <span> <?php echo esc_attr( $event_start );?></span>
			</div>  					
			<div class="event-end">
				<?php echo esc_html__("Event End:", "elevation");?> <span> <?php echo esc_attr( $event_end );?></span>
			</div>
		</div>

		<div class="entry-content">
			<?php the_excerpt();?>
		</div>

	</div><!-- /.post-content -->
</article><!-- /.post -->
