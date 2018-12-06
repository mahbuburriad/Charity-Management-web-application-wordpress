<?php
/*
* Global Section
*/
$sections[] = array(
    'title' => esc_html__('General Settings', 'elevation'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-globe',
    'fields' => array(

        $fields = array(
                'id'       => 'logo_type',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Logo Type', 'elevation' ),
                'subtitle' => esc_html__( 'Select Logo Type Options e.g Text or Image', 'elevation' ),
                'desc'     => esc_html__( 'Default Design Layout Options "Image Logo".', 'elevation' ),
                'options'  => array(
                    'logo_text'     => 'Text',
                    'logo_image'    => 'Image'
                ),
                'default'  => 'logo_image'
            ),
        array(
                'id' => 'elevation_logo_text',
                'type' => 'text',
                'title' => esc_html__('Logo Text', 'elevation'),
                'default' => "<span>E</span>levation",  
                'required' => array('logo_type', '=', 'logo_text')       
            ),
        array(
                'id' => 'elevation_logo_image',
                'type' => 'media',
                'title' => esc_html__('Logo Image', 'elevation'),
                'default' => array( "url" => esc_url( get_template_directory_uri() . "/images/logo.png" )),
                'desc'     => esc_html__( 'Select Logo Image if you want to set your Logo Image', 'elevation' ),
                'required' => array('logo_type', '=', 'logo_image'),       
                'preview' => true,
                "url" => true
            ), 

        array(
                'id' => 'logo_width',
                'type' => 'slider',
                'title' => __('Logo Width', 'elevation'),
                'subtitle' => __('Slide in Pixels of your Logo Width', 'elevation'),
                'desc' => __('Width Range. Min: 0, max: 500, step: 5, default value: 145', 'elevation'),
                "default" => 145,
                "min" => 0,
                "step" => 5,
                "max" => 500,
                'display_value' => 'text',
                'required' => array('logo_type', '=', 'logo_image'),       
            ),   
        array(
                'id' => 'logo_height',
                'type' => 'slider',
                'title' => __('Logo Height', 'elevation'),
                'subtitle' => __('Slide in Pixels of your Logo Height', 'elevation'),
                'desc' => __('Height Range. Min: 0, max: 200, step: 2, default value: 26', 'elevation'),
                "default" => 26,
                "min" => 0,
                "step" => 2,
                "max" => 200,
                'display_value' => 'text',
                'required' => array('logo_type', '=', 'logo_image'),       
            ),   
        array(
                'id' => 'google_maps_api_key',
                'type' => 'text',
                'title' => esc_html__('Google Maps API key', 'elevation'),
                'desc'    => sprintf(
                    '<p>%s </p> <a href="//developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key" target="_blank">%s</a>',
                    esc_html__( 'To use the Google Maps library you must authenticate your application with an API key.', 'elevation' ),
                    esc_html__( 'Get a Key', 'elevation' )
                    )
            
            ),
          array(
                'id' => 'enable_fancybox',
                'type' => 'switch',
                'title' => esc_html__('Enable Fancybox', 'elevation'),
                'default' => 1,
            ),
          array(
                'id' => 'page_comments',
                'type' => 'switch',
                'title' => esc_html__('Comments on Page', 'elevation'),
                'default' => 1,
            ),
          array(
                'id' => 'custom_css',
                'type' => 'ace_editor',
                'title' => esc_html__('Custom CSS', 'elevation'),
                'description' => esc_html__('Write your custom CSS code without &lt;style> &lt;/style> block', 'elevation'),
            ), 

        )
); //global