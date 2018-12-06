<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elevation
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="leave-comment" class="leave-comment clearfix">

  	<div class="section-details media">
  		<?php if ( have_comments() ) { ?>
	  		<div class="title-icon media-left">
	  			<i class="fa fa-comments-o"></i>
	  		</div><!-- /.title-icon -->
	  	<?php } ?>
  		<div class="media-body">
		<?php
		// You can start editing here -- including this comment!
		if ( have_comments() ) : ?>
			<h3 class="title">
				<?php comments_number( esc_html('0 Comment' ,'elevation') , esc_html('1 Comment' ,'elevation'), esc_html('% Comments' ,'elevation') );?>
			</h3>


			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
				<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
					<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'elevation' ); ?></h2>
					<div class="nav-links">

						<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'elevation' ) ); ?></div>
						<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'elevation' ) ); ?></div>

					</div><!-- .nav-links -->
				</nav><!-- #comment-nav-above -->
			<?php endif; // Check for comment navigation. ?>

			<ul class="comments-list">
				<?php
	                wp_list_comments( array(
	                    'style'       => 'li',
	                    'short_ping'  => true,
	                    'callback' => 'candor_framework_elevation_comment',
	                    'avatar_size' => 172
	                ) );
	                paginate_comments_links();
	            ?>
			</ul><!-- .comment-list -->

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
				<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
					<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'elevation' ); ?></h2>
					<div class="nav-links">

						<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'elevation' ) ); ?></div>
						<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'elevation' ) ); ?></div>

					</div><!-- .nav-links -->
				</nav><!-- #comment-nav-below -->
			<?php
			endif; // Check for comment navigation.

		endif; // Check for have_comments().


		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'elevation' ); ?></p>
		<?php
		endif;
?>



	  </div><!-- /.section-padding -->
  	</div><!-- /.section-padding -->
</div><!-- /#leave-comment -->


<div class="post-comment">
  	<div class="media">
	    <div class="title-icon media-left">
	      <i class="fa fa-pencil-square-o"></i>
	    </div><!-- /.title-icon -->

    	<div class="media-body">
			<?php		
				$commenter = wp_get_current_commenter();
				$req = get_option( 'require_name_email' );
				$aria_req = ( $req ? " aria-required='true'" : '' );
				$fields =  array(
					'author' => '<div class="form-input"><i class="form-icon fa fa-user"></i><input id="author" class="form-control" name="author" type="text" placeholder="Name*" value="" size="30"' . $aria_req . '/></div>',
					'email'  => '<div class="form-input"><i class="form-icon fa fa-envelope"></i><input id="email" class="form-control" name="email" type="email" placeholder="Email Address*" value="" size="30"' . $aria_req . '/></div>',
					'url'  => '<div class="form-input"><i class="form-icon fa fa-link"></i><input id="url" class="form-control" name="url" type="url" placeholder="URL" value=""></div>'
					);

				$comments_args = array(
					'fields' =>  $fields,
					'id_form'          			=> 'commentform',
					'title_reply'       		=> esc_html__( 'Leave a Comment', 'elevation' ),
					'title_reply_to'    		=> esc_html__( 'Leave a Comment to %s', 'elevation' ),
					'cancel_reply_link' 		=> esc_html__( 'Cancel Comment', 'elevation' ),
					'label_submit'      		=> esc_html__( 'Submit', 'elevation' ),
					'class_submit'      		=> 'btn btn-sm',
					'comment_notes_before'      => '',
					'comment_notes_after' 		=> '',
					'id_submit'					=> 'submit',
					'comment_field'             => '<div class="form-input"><i class="form-icon fa fa-pencil"></i></i><textarea id="comment" class="form-control" name="comment" placeholder="Message*" cols="40" rows="10" required></textarea></div>',
					'label_submit'              => esc_html__( 'Submit' , 'elevation' )
					);


				ob_start();
				comment_form( $comments_args);
			?>
		</div>
	</div>                         
</div><!-- /.post-comment -->