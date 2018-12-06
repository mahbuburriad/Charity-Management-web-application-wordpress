<?php
	get_header();
	the_post();
	
	echo elevation_page_title( get_the_title() );
?>

<section class="do-portfolio-single-page-wrapper">

	<div class="container">
		<div class="row">

            <div class="do-portfolio-single-page-content">
				<?php
					the_content();
					wp_link_pages();
				?>
            </div>

            <?php get_template_part('loop/loop-portfolio','related'); ?>
            
		</div>
	</div>

	<?php get_template_part('inc/content-portfolio','nav'); ?>

</section>

<?php get_footer();