<?php
/*
Template Name: Homepage
*/
get_header('home'); ?>

	<section id="main-content" class="main-content">
		<div class="container">
			<div class="row">

				<?php
				the_post();
				the_content();
				?>

			</div>
		</div>
	</section>

<?php
get_footer();