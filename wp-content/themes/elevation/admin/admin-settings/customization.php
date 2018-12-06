<?php
/*
* Customization Section
*/ 
$sections[] = array(
    'title' => esc_html__('Customization Section', 'elevation'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-magic',
    'fields' => array(

        array(
                'id' => 'elevation_preset_colors',
                'type' => 'image_select',
                'title' => esc_html__('Color Scheme', 'elevation'),
                'subtitle' => esc_html__('Select Predefined Color Schemes or your Own', 'elevation'),
                'options' => array(
                    '1' => array( 'img' => get_template_directory_uri() . '/images/presets/preset1.png' ),
                    '2' => array( 'img' => get_template_directory_uri() . '/images/presets/preset2.png' ),
                    '3' => array( 'img' => get_template_directory_uri() . '/images/presets/preset3.png' ),
                    '4' => array( 'img' => get_template_directory_uri() . '/images/presets/preset4.png' ),
                    '5' => array( 'img' => get_template_directory_uri() . '/images/presets/preset5.png' ),
                    '6' => array( 'img' => get_template_directory_uri() . '/images/presets/preset6.png' ),
                    '7' => array( 'img' => get_template_directory_uri() . '/images/presets/preset7.png' ),
                    '8' => array( 'img' => get_template_directory_uri() . '/images/presets/preset8.png' ),
                    '9' => array( 'img' => get_template_directory_uri() . '/images/presets/preset9.png' ),
                    '10' => array( 'img' => get_template_directory_uri() . '/images/presets/preset10.png' ),
                    '11' => array( 'img' => get_template_directory_uri() . '/images/presets/preset0.png' )
                    ),
                'default' => '1'
            ),    
        array(
                'id' => 'elevation_presets_custom_color',
                'type' => 'color',
                'title' => esc_html__('Your Own Theme Color', 'elevation'),
                'subtitle' => esc_html__('Pick a custom color', 'elevation'),
                'default' => '#3498db',
                'validate' => 'color',
                'required' => array("elevation_preset_colors", "=", "11")
            ),           
        array(
                'id' => 'show_preloader',
                'type' => 'switch',
                'title' => esc_html__('Show Preloader Image', 'elevation'),
                'default' => 1,
            ),   
        array(
                'id' => 'preloader',
                'type' => 'media',
                'title' => esc_html__('Preloader Image', 'elevation'),
                'default' => array("url" => esc_url( esc_html__( get_template_directory_uri() . "/images/loading.gif", 'elevation' ))),
                'preview' => true,
                "url" => true,
                'required' => array('show_preloader', '=', '1')
            ),
        array(
                'id' => 'featured_image',
                'type' => 'media',
                'title' => esc_html__('Page Featured Image', 'elevation'),
                'default' => array("url" => esc_url( esc_html__( get_template_directory_uri() . "/images/placeholder.jpg", 'elevation' ))),
                'desc'     => esc_html__( ' If you don\'t add a featured image to a post/page, following image will be displayed', 'elevation' ),
                'preview' => true,
                "url" => true
            ),        
        array(
                'id' => 'events_left_image',
                'type' => 'media',
                'title' => esc_html__('Events Section Background Image', 'elevation'),
                'default' => array("url" => esc_url( esc_html__( get_template_directory_uri() . "/images/event/bg.jpg", 'elevation' ))),
                'desc'     => esc_html__( 'Add Events Section Background Image', 'elevation' ),
                'preview' => true,
                "url" => true
            ),

        array(
                'id' => 'admin_logo',
                'type' => 'media',
                'title' => esc_html__('Admin Logo', 'elevation'),
                'default' => array("url" => esc_url( esc_html__( get_template_directory_uri() . "/images/logo.png", 'elevation' ))),
                'preview' => true,
                "url" => true
            ),
          array(
                'id' => 'remove_meta_data',
                'type' => 'button_set',
                'title' => esc_html__('Remove Post Meta Data', 'elevation'),
                'subtitle' => esc_html__( 'Show or Hide Author Meta, Tags, Categories, Socials etc.', 'elevation' ),
                'options'  => array(
                    'show'       => 'Show',
                    'hide'       => 'Hide'
                    ),
                'default'  => 'show'
            ),          
          array(
                'id' => 'remove_page_meta_data',
                'type' => 'button_set',
                'title' => esc_html__('Remove Page Meta Data', 'elevation'),
                'subtitle' => esc_html__( 'Show or Hide Date, Author Meta from  Page', 'elevation' ),
                'options'  => array(
                    'show'       => 'Show',
                    'hide'       => 'Hide'
                    ),
                'default'  => 'show'
            ),          


    )
); 
