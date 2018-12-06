<?php
function elevation_page_title($title = false, $subtitle = false){
	$output = '<section id="page-head" class="page-head text-center" data-stellar-background-ratio="0.1" data-stellar-vertical-offset="0">
          <div class="section-padding">
            <div class="container">
              <div class="section-top">
                <h2 class="page-title">'. $title .'</h2><!-- /.page-title -->
                <p class="page-description">'. $subtitle .'</p><!-- /.page-description -->
              </div><!-- /.section-top -->

              <div class="section-border">
                <div class="border-style">
                  <span></span>
                </div><!-- /.border-style -->
              </div><!-- /.section-border -->

            </div><!-- /.container -->
          </div><!-- /.section-padding -->
        </section><!-- /#page-head -->';	
	
	if( false == $title )
		$output = false;
	
	return $output;
}