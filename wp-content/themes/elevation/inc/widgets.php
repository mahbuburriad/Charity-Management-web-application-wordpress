<?php
if(!( class_exists('elevation_about_us_widget') )){
	class elevation_about_us_widget extends WP_Widget {
		
		public function __construct(){
			parent::__construct(
				'elevation_about-us-widget', // Base ID
				esc_html__('Elevation: About Us', 'elevation'), // Name
				array( 'description' => esc_html__( 'Add a simple About Us widget', 'elevation' ), ) // Args
			);
		}
		
		function widget($args, $instance)
		{
			extract($args);
			$title = apply_filters('widget_title', $instance['title']);

			$description = empty($instance['description']) ? 'Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Aenean sollicitudin, lorem quis bibendum auctor' : $instance['description'];
			$address = empty($instance['address']) ? '121 King Street, Melbourne VIC 3000, Australia' : $instance['address'];
			$phone = empty($instance['phone']) ? '088 12345 67890' : $instance['phone'];
			$email = empty($instance['email']) ? 'info@example.com' : $instance['email'];
			$website = empty($instance['website']) ? 'http://www.companyname.com' : $instance['website'];
	
			echo   $before_widget;
	
			if($title) {
				echo  $before_title.$title.$after_title;
			} 

			$website_url = $website;
			$website_url = preg_replace('#^https?://#', '', $website_url);
			?>

		    	<div class="widget-details">
		    		<p class="about-widget">
						<?php echo esc_attr($instance['description']);?>
		    		</p>

		    		<div class="widget-contact">
		    			<ul>
		    				<li class="fa-map-marker"><span> <?php echo esc_attr($instance['address']);?></span></li>
		    				<li class="fa-phone"><span><?php echo esc_attr($instance['phone']);?></span></li>
		    				<li class="fa-envelope"><span><a href="mailto:<?php echo esc_attr($instance['email']);?>"> <?php echo esc_attr($instance['email']);?></a></span></li>
		    				<li class="fa-globe"><span><a href="<?php echo esc_attr($instance['website']);?>" target="_blank"><?php echo esc_attr($website_url);?></a></span></li>
		    			</ul>
		    		</div><!-- /.widget-contact -->
		    	</div><!-- /.widget-details -->
			
			<?php echo    $after_widget;
		}
		
		function update($new_instance, $old_instance){

			$instance = $old_instance;

			$instance['title'] = strip_tags($new_instance['title']);
			$instance['description'] = strip_tags($new_instance['description']);
			$instance['address'] = strip_tags($new_instance['address']);
			$instance['phone'] = strip_tags($new_instance['phone']);
			$instance['email'] = strip_tags($new_instance['email']);
			$instance['website'] = strip_tags($new_instance['website']);

	
			return $instance;
		}
	
		function form($instance)
		{
			$defaults = array(
						'title' 		=> 'Elevation', 						
						'description' 	=> 'Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Aenean sollicitudin, lorem quis bibendum auctor',
						'address' 		=> '121 King Street, Melbourne VIC 3000, Australia', 
						'phone' 		=> '088 12345 67890', 
						'email' 		=> 'info@example.com', 
						'website' 		=> 'http://www.companyname.com'
					);
			$instance = wp_parse_args((array) $instance, $defaults); 
			?>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('title')); ?>"><?php echo esc_html__( 'Title:', 'elevation' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title')); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('description')); ?>">
					<?php echo esc_html__( 'Description:', 'elevation' ); ?>		
				</label>
				<textarea class="widefat" rows="5" cols="20" id="<?php echo esc_attr( $this->get_field_id('description')); ?>" name="<?php echo esc_attr( $this->get_field_name('description')); ?>" ><?php echo esc_attr( $instance['description']); ?></textarea>
			</p>	
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('address')); ?>"><?php echo esc_html__( 'Address:', 'elevation' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('address')); ?>" name="<?php echo esc_attr( $this->get_field_name('address')); ?>" value="<?php echo esc_attr( $instance['address']); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('phone')); ?>"><?php echo esc_html__( 'Phone:', 'elevation' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('phone')); ?>" name="<?php echo esc_attr( $this->get_field_name('phone')); ?>" value="<?php echo esc_attr( $instance['phone']); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('email')); ?>"><?php echo esc_html__( 'Email:', 'elevation' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('email')); ?>" name="<?php echo esc_attr( $this->get_field_name('email')); ?>" value="<?php echo esc_attr( $instance['email']); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('website')); ?>"><?php echo esc_html__( 'Website:', 'elevation' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('website')); ?>" name="<?php echo esc_attr( $this->get_field_name('website')); ?>" value="<?php echo esc_attr( $instance['website']); ?>" />
			</p>

		<?php
		}
	}
	function elevation_register_about_us(){
	     register_widget( 'elevation_about_us_widget' );
	}
	add_action( 'widgets_init', 'elevation_register_about_us');
}
