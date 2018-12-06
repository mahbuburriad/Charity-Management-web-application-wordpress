<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */

add_filter( 'rwmb_meta_boxes', 'elevation_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * @return void
 */
function elevation_register_meta_boxes( $meta_boxes ){
	global $animation;
	global $linecons;
	global $fontawesome_icons;
	global $candor_icons;
	//$icons = array_flip( candor_get_ti_icons() );

	/**
	 * Prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = '_elevation_';

		// 1st meta box
	$meta_boxes[] = array(
		'id' => 'post-meta-quote',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => esc_html__( 'Post Format Quote Settings', 'elevation' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Qoute Text', 'elevation' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}qoute",
				'desc'  => esc_html__( 'Write Your Qoute Here', 'elevation' ),
				'type'  => 'textarea',
				// Default value (optional)
				'std'   => ''
			),
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Qoute Author', 'elevation' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}qoute_author",
				'desc'  => esc_html__( 'Write Qoute Author or Source', 'elevation' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => ''
			)
			
		)
	);

	$meta_boxes[] = array(
		'id' => 'post-meta-chat',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => esc_html__( 'Post Format Chat Settings', 'elevation' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Chat Message', 'elevation' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}chat_text",
				'type' => 'wysiwyg',
				'raw'  => false,
				'options' => array(
					'textarea_rows' => 4,
					'teeny'         => false,
					'media_buttons' => false,
				)
			)
			
		)
	);


	$meta_boxes[] = array(
		'id' => 'post-meta-link',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => esc_html__( 'Post Format Link Settings', 'elevation' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Link Text', 'elevation' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}link_text",
				'desc'  => esc_html__( 'Link Text', 'elevation' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => ''
			),
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Link URL', 'elevation' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}link",
				'desc'  => esc_html__( 'Write Your Link', 'elevation' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => ''
			)
			
		)
	);


	$meta_boxes[] = array(
		'id' => 'post-meta-audio',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => esc_html__( 'Post Format Audio Settings', 'elevation' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Audio Embed Code', 'elevation' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}audio_code",
				'desc'  => esc_html__( 'Write Your Audio Embed Code Here', 'elevation' ),
				'type'  => 'textarea',
				// Default value (optional)
				'std'   => ''
			)
			
		)
	);

	$meta_boxes[] = array(
		'id' => 'post-meta-status',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => esc_html__( 'Post Format Status Settings', 'elevation' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Status URL', 'elevation' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}status_url",
				'desc'  => esc_html__( 'Write Facebook, Twitter etc status link', 'elevation' ),
				'type'  => 'textarea',
				// Default value (optional)
				'std'   => ''
			)
			
		)
	);


	$meta_boxes[] = array(
		'id' => 'post-meta-video',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => esc_html__( 'Post Format Video Settings', 'elevation' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Video ID', 'elevation' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}video",
				'desc'  => esc_html__( 'Write Your Vedio ID Only', 'elevation' ),
				'type'  => 'textarea',
				// Default value (optional)
				'std'   => ''
			),
			array(
				'name'     => esc_html__( 'Select Vedio Type/Source', 'elevation' ),
				'id'       => "{$prefix}video_source",
				'type'     => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'  => array(
					'1' => esc_html__( 'Embed Code', 'elevation' ),
					'2' => esc_html__( 'YouTube', 'elevation' ),
					'3' => esc_html__( 'Vimeo', 'elevation' ),
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'std'         => '1'
			),
			
		)
	);


	$meta_boxes[] = array(
		'id' => 'post-meta-gallery',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => esc_html__( 'Post Format Gallery Settings', 'elevation' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			array(
				'name'             => esc_html__( 'Gallery Image Upload', 'elevation' ),
				'id'               => "{$prefix}gallery_images",
				'type'             => 'image_advanced',
				'max_file_uploads' => 5,
			)			
		)
	);


	$meta_boxes[] = array(
		'id' => 'slider-post-meta',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => esc_html__( 'Slider Settings', 'elevation' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'slider'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			array(
				'name'             => esc_html__( 'Heading 1', 'elevation' ),
				'id'               => "{$prefix}heading1",
				'type'             => 'text',
				'desc'  		   => esc_html__( 'Use <span> tag for Text Color.', 'elevation' ),
			),
			array(
				'name'             => esc_html__( 'Heading 1 Animation', 'elevation' ),
				'id'               => "{$prefix}heading1_anim",
				'type'             => 'select',
				'desc'  		   => esc_html__( 'Select Animation Type.', 'elevation' ),
				'options'  		   => 	$animation,
				'multiple'    	   => false,
				'std'              => ''
			),


			array(
				'name'             => esc_html__( 'Heading 2', 'elevation' ),
				'id'               => "{$prefix}heading2",
				'type'             => 'text',
			),
			array(
				'name'             => esc_html__( 'Heading 2 Animation', 'elevation' ),
				'id'               => "{$prefix}heading2_anim",
				'type'             => 'select',
				'desc'  		   => esc_html__( 'Select Animation Type.', 'elevation' ),
				'options'  		   => 	$animation,
				'multiple'         => false,
				'std'              => ''
			),


			array(
				'name'             => esc_html__( 'Heading 3', 'elevation' ),
				'id'               => "{$prefix}heading3",
				'type'             => 'text',
			),
			array(
				'name'             => esc_html__( 'Heading 3 Animation', 'elevation' ),
				'id'               => "{$prefix}heading3_anim",
				'type'             => 'select',
				'desc'  		   => esc_html__( 'Select Animation Type.', 'elevation' ),
				'options'  		   => 	$animation,
				'multiple'         => false,
				'std'              => ''
			),

			array(
				'name'             => esc_html__( 'Slider Text', 'elevation' ),
				'id'               => "{$prefix}slider_more_text",
				'type'             => 'text',
				'desc'  		   => esc_html__( 'Slider Button More Text.', 'elevation' ),
				'std'              => 'Get Started'
			),
			array(
				'name'             => esc_html__( 'Slider More URL', 'elevation' ),
				'id'               => "{$prefix}slider_text_url",
				'type'             => 'text',
				'desc'  		   => esc_html__( 'URl of Slider More Button.', 'elevation' ),
				'std'   => '#'
			),
		)
	);


	$meta_boxes[] = array(
		'id' => 'team-post-meta',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => esc_html__( 'Team Settings', 'elevation' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'team'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			array(
				'name' 		=> esc_html__( 'Name', 'elevation' ),
				'id' 		=> "{$prefix}team_member_name",
				'type' 		=> 'text',
				), 
			array(
				'name' 		=> esc_html__( 'Designation', 'elevation' ),
				'id' 		=> "{$prefix}team_member_designation",
				'type' 		=> 'text'
				),  
			array(
				'name' 		=> esc_html__( 'Short Description', 'elevation' ),
				'id' 		=> "{$prefix}team_desc",
				'type' 		=> 'textarea',
				),            
			array(
				'name' 		=> esc_html__('Twitter URL','elevation'),
				'id' 		=> "{$prefix}social_twitter",
				'type'      => 'text',
				'std'       =>''
				),
			array(
				'name'      => esc_html__('Facebook URL','elevation'),
				'id'        => "{$prefix}social_facebook",
				'type'      => 'text',
				'std'       =>''
				),
			array(
				'name'      => esc_html__('Dribbble URL','elevation'),
				'id'        => "{$prefix}social_dribbble",
				'type'      => 'text',
				'std'       =>''
				),
			array(
				'name'      => esc_html__('Google Plus URL','elevation'),
				'id'        => "{$prefix}social_google_plus",
				'type'      => 'text',
				'std'       =>''
				),
			array(
				'name'      => esc_html__('Linkedin URL','elevation'),
				'id'        => "{$prefix}social_linkedin",
				'type'      => 'text',
				'std'       =>''
				),			
			array(
				'name'      => esc_html__('Instagram URL','elevation'),
				'id'        => "{$prefix}social_instagram",
				'type'      => 'text',
				'std'       =>''
				)

		)
	);


    $meta_boxes[] = array(
    	'id' => 'pricing-post-meta',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
    	'title' => esc_html__( 'Pricing Table', 'elevation' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
    	'pages' => array( 'pricing'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
    	'context' => 'advanced',

		// Order of meta box: high (default), low. Optional.
    	'priority' => 'high',

		// Auto save: true, false (default). Optional.
    	'autosave' => true,

        'fields' => array(
            array(
                'name' => esc_html__('Currency','elevation'),
                'id' => "{$prefix}pricing_currency",
                'type' => 'text',
                'std'=>"$"
            ),

            array(
                'name' => esc_html__('Currency','elevation'),
                'name' => 'Price',
                'id' => "{$prefix}pricing_price",
                'type' => 'text',
                'std'=>"335"
            ),            

            // array(
            //     'name' => esc_html__('Fraction Price','elevation'),
            //     'id' => "{$prefix}pricing_price_fraction",
            //     'type' => 'text',
            //     'std'=>".00"
            // ),


            array(
            	'name' => esc_html__('Price Duration','elevation'),
            	'id' => "{$prefix}pricing_duration",
            	'type' => 'select',
            	'options'  		   	=> array(
            		'None' 			=> esc_html__( '', 'elevation' ),
            		'Day' 			=> esc_html__( 'Day', 'elevation' ),
            		'Week' 			=> esc_html__( 'Week', 'elevation' ),
            		'Month' 		=> esc_html__( 'Month', 'elevation' ),
            		'Quarter' 		=> esc_html__( 'Quarter', 'elevation' ),
					'Year' 			=> esc_html__( 'Year', 'elevation' ),
            		),
            	),

            array(
                'name' => esc_html__( 'Table Elements (One in each line)', 'elevation' ),
                'id' => "{$prefix}pricing_elements",
                'type' => 'textarea',
            ),
            array(
                'name' => esc_html__( 'Button text', 'elevation' ),
                'id' => "{$prefix}pricing_button",
                'type' => 'text',
                'std'=> esc_html__( 'Order Now', 'elevation' )
            ),

            array(
                'name' => esc_html__('Button link','elevation'),
                'id' => "{$prefix}pricing_button_link",
                'type' => 'url',
                'std'=>"#"
            ),

            array(
                'name' => esc_html__('Highlighted Table','elevation'),
                'id' => "{$prefix}pricing_active",
                'type' => 'checkbox',             
            ),
        )
	);



// Service
	$meta_boxes[] = array(
		'id' => 'service-post-meta',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => esc_html__( 'Service Settings', 'elevation' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'service'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
 
			array(
				'name' 		=> esc_html__( 'Service Title', 'elevation' ),
				'id' 		=> "{$prefix}service_title",
				'type' 		=> 'text'
				),  
			array(
				'name' 		=> esc_html__('Service Description','elevation'),
				'id' 		=> "{$prefix}service_desc",
				'type'      => 'textarea',
				'std'       =>''
				),          
			array(
				'name' 		=> esc_html__( 'Service Icon', 'elevation' ),
				'id' 		=> "{$prefix}service_icon",
				'type' 		=> 'select',
				//'std'       => 'fa-check-circle',
				'options' 	=> $candor_icons,
				'desc'  	=> wp_kses( "Select Icons. <a href='http://fortawesome.github.io/Font-Awesome/cheatsheet' target='_blank'>Font Awesome Icons</a>", 'elevation' ),
				), 


		)
	);


//Causes
	$meta_boxes[] = array(
		'id' => 'causes-post-meta',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => esc_html__( 'Causes Settings', 'elevation' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'causes'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			array(
				'name' 		=> esc_html__( 'Header Background Image', 'elevation' ),
				'id' 		=> "{$prefix}header_bg",
				'type' 		=> 'plupload_image',
				'max_file_uploads' => 1,
				),  			
			array(
				'name' 		=> esc_html__( 'Raised/Current Money', 'elevation' ),
				'id' 		=> "{$prefix}causes_raised",
				'type' 		=> 'number'
				),  			
			array(
				'name' 		=> esc_html__('Goal of Donation','elevation'),
				'id' 		=> "{$prefix}causes_goal",
				'type'      => 'number'
				),          
			array(
				'name' 		=> esc_html__( 'Currency(Money Format)', 'elevation' ),
				'id' 		=> "{$prefix}causes_currency",
				'type' 		=> 'text'
				),   
			array(
				'name' 		=> esc_html__( 'PDF File(Downloaded)', 'elevation' ),
				'id' 		=> "{$prefix}pdf_file",
				'type' 		=> 'file_advanced',
				'mime_type' => 'application,pdf', // Leave blank for all file types
				'max_file_uploads' => 1,
				),   			
			array(
				'name' 		=> esc_html__( 'Donation Form', 'elevation' ),
				'id' 		=> "{$prefix}donation_form",
				'type' 		=> 'textarea'
				),   

		)
	);

	//Events
	$meta_boxes[] = array(
		'id' => 'events-post-meta',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => esc_html__( 'Events Settings', 'elevation' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'events'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			array(
				'name' 		=> esc_html__( 'Event Date', 'elevation' ),
				'id' 		=> "{$prefix}event_date",
				'type' 		=> 'date',
				'js_options' => array(
					'showSecond' => false
					),
				),   
			array(
				'name'             => esc_html__( 'Hover Background Image', 'elevation' ),
				'id'               => "{$prefix}events_bg_images",
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
				),	

			// Map requires at least one address field (with type = text)
			array(
				'name' 		=> esc_html__( 'Address', 'elevation' ),
				'id'   		=> '_elevation_event_place',				
				'type' 		=> 'text',
				'std'  		=> esc_html__( 'Bronx NY, United States', 'elevation' ),
			),
			array(
				'name'      => esc_html__( 'Location', 'elevation' ),
				'id'        => 'map',				
				'type'      => 'map',
				'std'           => '40.9895223, -74.2645167',
				'address_field' => '_elevation_event_place',
			),

			array(
				'name' 		=> esc_html__( 'Start Time', 'elevation' ),
				'id' 		=> "{$prefix}event_start",
				'type' 		=> 'time'
				),  			
			array(
				'name' 		=> esc_html__('End Time','elevation'),
				'id' 		=> "{$prefix}event_end",
				'type'      => 'time'
				),          

		)
	);



// Portfolio
	$meta_boxes[] = array(
		'id' => 'post-type-portfolio',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => esc_html__( 'Portfolio Details', 'elevation' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'portfolio'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			array(
				'name'             => esc_html__( 'Portfolio Gallery', 'elevation' ),
				'id'               => "{$prefix}portfolio_images",
				'type'             => 'image_advanced',
				'max_file_uploads' => 5,
			),			
			array(
				'name'             => esc_html__( 'Client Name', 'elevation' ),
				'id'               => "{$prefix}portfolio_client_name",
				'type'             => 'text',
			),
			array(
				'name'             => esc_html__( 'Project End Date', 'elevation' ),
				'id'               => "{$prefix}portfolio_date",
				'type'             => 'date',
			),
			array(
				'name'             => esc_html__( 'Client URL', 'elevation' ),
				'id'               => "{$prefix}portfolio_url",
				'type'             => 'text',
			),
			array(
				'name'             => esc_html__( 'Portfolio Style', 'elevation' ),
				'id'               => "{$prefix}portfolio_style",
				'type'             => 'select',
				'options'  		   => array(
										'' 			=> esc_html__( 'Default', 'elevation' ),
										'item-w2' 	=> esc_html__( 'Large Width', 'elevation' ),
										'item-h2' 	=> esc_html__( 'Large Height', 'elevation' ),
										'item-h2 item-w2' 	=> esc_html__( 'Large Height & Width', 'elevation' ),
										//'item-h2' 	=> esc_html__( 'Large Height', 'elevation' ),
									),
			),
			array(
				'name'             => esc_html__( 'Call to Action Button Text', 'elevation' ),
				'id'               => "{$prefix}portfolio_project_button",
				'type'             => 'text',
				'std'			   => 'Project Link',
				'desc' 			   => 'Launch Project.'
				),
			array(
				'name'             => esc_html__( 'Call to Action URL', 'elevation' ),
				'id'               => "{$prefix}portfolio_project_url",
				'type'             => 'text',
				'std'			   => '#'
				),
			

		)
	);


	$meta_boxes[] = array(
		'id' => 'post-type-client',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => esc_html__( 'Client Details', 'elevation' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'client'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,


		// List of meta fields
		'fields' => array(
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Client Name', 'elevation' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}client_name",
				'desc'  => esc_html__( 'Write Client Name Here', 'elevation' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => ''
			),
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Designation', 'elevation' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}client_designation",
				'desc'  => esc_html__( 'Write Client Designation Here', 'elevation' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => 'C.E.O'
			),			
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Company', 'elevation' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}client_company",
				'desc'  => esc_html__( 'Write Client Company Here', 'elevation' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => 'Google'
			),			

			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Client Website', 'elevation' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}client_url",
				'desc'  => esc_html__( 'Write Client Website/URL Here', 'elevation' ),
				'type'  => 'url',
				// Default value (optional)
				'std'   => ''
			),
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Client Comments', 'elevation' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}client_comments",
				'desc'  => esc_html__( 'Write Client Comments Here', 'elevation' ),
				'type'  => 'textarea',
				// Default value (optional)
				'std'   => ''
			)
			
		)
	);

	$meta_boxes[] = array(
		'id' => 'post-type-testimonial',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => esc_html__( 'Testimonial Details', 'elevation' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'testimonial'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,


		// List of meta fields
		'fields' => array(
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Client Name', 'elevation' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}testimonial_client_name",
				'desc'  => esc_html__( 'Write Client Name Here', 'elevation' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => ''
			),
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Designation', 'elevation' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}testimonial_client_designation",
				'desc'  => esc_html__( 'Write Testimonial Client Designation Here', 'elevation' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => 'C.E.O'
			),			
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Company', 'elevation' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}testimonial_client_company",
				'desc'  => esc_html__( 'Write Client Company Here', 'elevation' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => 'Google'
			),			

			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Client Website', 'elevation' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}testimonial_client_url",
				'desc'  => esc_html__( 'Write Client Website/URL Here', 'elevation' ),
				'type'  => 'url',
				// Default value (optional)
				'std'   => ''
			),
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Testimonial Comments', 'elevation' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}testimonial_comments",
				'desc'  => esc_html__( 'Write Testimonial Comments Here', 'elevation' ),
				'type'  => 'textarea',
				// Default value (optional)
				'std'   => ''
			)
			
		)
	);

	return $meta_boxes;
}

