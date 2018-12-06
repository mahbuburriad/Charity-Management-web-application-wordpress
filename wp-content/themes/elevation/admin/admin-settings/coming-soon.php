<?php
/*
* Coming Soon Section
*/
$sections[] = array(
    'title' => esc_html__('Coming Soon Section', 'elevation'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-globe',
    'fields' => array(

        $fields =  array(
                'id' => 'coming_soon',
                'type' => 'button_set',
                'title' => esc_html__('Coming Soon /Maintenance Mode', 'elevation'),
                'subtitle' => esc_html__( 'Coming Soon/Maintenance Mode On/Off', 'elevation' ),
                'options'  => array(
                    'on'       => 'On',
                    'off'       => 'Off'
                    ),
                'default'  => 'off'
            ),          


        array(
                'id' => 'coming_soon_bg_image',
                'type' => 'media',
                'title' => esc_html__('Background Image', 'elevation'),
                'default' => array("url" => esc_url( esc_html__( get_template_directory_uri() . "/images/banner.jpg", 'elevation' ))),
                'desc'     => esc_html__( 'Select Logo Image if you want to set your Logo Image', 'elevation' ),
                'preview' => true,
                "url" => true
            ),    
        array(
                'id' => 'coming_soon_title',
                'type' => 'text',
                'title' => esc_html__('Title', 'elevation'),
                'default' => "WE WILL BE LIVE IN",  
                ),        
        array(
                'id' => 'coming_soon_sub_title',
                'type' => 'textarea',
                'title' => esc_html__('Sub Title', 'elevation'),
                'default' => "Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus",  
            ),
        array (
                'id'            => 'coming_soon_time',
                'type'          => 'date',
                'title'         => 'Coming Soon Date',
                'subtitle'      => 'Coming Soon Date',
            ),

           array(
                'id' => 'coming_soon_subscribe_text',
                'type' => 'text',
                'title' => esc_html__('Subscribe Text', 'elevation'),
                'default' => "Subscribe Now",  
            ),

           array(
                'id' => 'coming_soon_subscribe_link',
                'type' => 'text',
                'title' => esc_html__('Subscribe Link', 'elevation'),
                'default' => "#",  
            ),

        )
); //global