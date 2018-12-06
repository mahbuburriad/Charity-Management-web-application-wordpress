<?php
/*
* 404 Section
*/ 
$sections[] = array(
    'icon' => 'el-icon-cogs',
    'icon_class' => 'icon-large',
    'title' => esc_html__('404 Settings', 'elevation'),
    'fields' => array(
        array(
            'id' => 'settings_404_parallax_image',
            'type' => 'media',
            'title' => esc_html__('404 Parallax Image', 'elevation'),
            'default' => array("url" => get_template_directory_uri() . "/images/background/7.jpg")
            ),    

        array(
            'id'=>'settings_404_title',
            'type' => 'text',
            'title' => esc_html__('404 Title', 'elevation'),
            'default'=> esc_html__( 'Sorry!! 404 Error!', 'elevation'),
            ),        
        array(
            'id'=>'settings_404_heading',
            'type' => 'text',
            'title' => esc_html__('404 Main Heading Title', 'elevation'),
            'default'=>esc_html__('Page Not Found', 'elevation'),
            ),
        array(
            'id'=>'settings_404_subheading',
            'type' => 'text',
            'title' => esc_html__('404 Sub Title', 'elevation'),
            'default'=> esc_html__('There was Some Problem Finding the page You Requested', 'elevation'),
            ),
        array(
            'id'=>'settings_404_return_home',
            'type' => 'text',
            'title' => esc_html__('Return Home', 'elevation'),
            'default'=> esc_html__('Return Home', 'elevation'),
            )

        )
); //404