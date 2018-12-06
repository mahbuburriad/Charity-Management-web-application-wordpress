<?php
/*
* Header Section
*/
$sections[] = array(
    'title' => esc_html__('Header Section', 'elevation'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-edit',
    'fields' => array(
        array(
            'id' => 'top_email',
            'type' => 'text',
            'title' => esc_html__('Email Text', 'elevation'),
            'default' => "info@example.com"
            ),
        array(
            'id' => 'top_phone',
            'type' => 'text',
            'title' => esc_html__('Phone', 'elevation'),
            'default' => "+61 4414 45390"
            ),
        array(
            'id' => 'home_donate_button',
            'type' => 'button_set',
            'title' => esc_html__('Menu Donate Button', 'elevation'),
            'desc'=> esc_html__('Show Donation Button on Home Menu', 'elevation'),
            'options'  => array(
                'show'      => 'Show',
                'hide'       => 'Hide'
            ),
            'default'  => 'show'
        ),
        array(
            'id' => 'home_donate_title',
            'type' => 'text',
            'title' => esc_html__('Menu Donate Title', 'elevation'),
            'default' => esc_html__('Donate Now', 'elevation'),
            'required' => array("home_donate_button", "=", "show")
        ),
        array(
            'id' => 'blog_header_image',
            'type' => 'media',
            'title' => esc_html__('Blog Header Background Image', 'elevation'),
            'default' => array("url" => esc_url( esc_html__( get_template_directory_uri() . "/images/8.jpg", 'elevation' ))),
            'desc'     => esc_html__( 'Select Blog Header Background Image', 'elevation' ),
            'preview' => true,
            "url" => true
            ),
        array(
            'id' => 'blog_title',
            'type' => 'text',
            'title' => esc_html__('Blog Title', 'elevation'),
            'default' => "Our Blog"
            ),
        array(
            'id' => 'blog_subtitle',
            'type' => 'text',
            'title' => esc_html__('Blog Sub Title', 'elevation'),
            'default' => "Latin poetry begins where all poetry begins in the rude ceremonial of a primitive people placating and dreaded spiritual world."
            ),



        //  Header Color Options
        array(
            'id'       => 'header_color_scheme',
            'type'     => 'info',
            'title'    => esc_html__( 'Header Color Scheme', 'elevation' ),
            ),
        array(
            'id'       => 'header_color',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Header Color Scheme', 'elevation' ),
            'subtitle' => esc_html__( 'Custom Topbar and Main menu color scheme .', 'elevation' ),
            'options'  => array(
                'defualt'      => 'Default',
                'custom'       => 'Custom'
                ),
            'default'  => 'defualt'
            ),

        // Top Header
        array(
            'id' => 'top_header_bg',
            'type' => 'color',
            'title' => esc_html__('Top Header Background', 'elevation'),
            'subtitle' => esc_html__('Pick a Top Header Background color', 'elevation'),
            'validate' => 'color',
            'required' => array("header_color", "=", "custom")
            ),
        // Navbar
        array(
            'id' => 'navbar_bg_color',
            'type' => 'color',
            'title' => esc_html__('Navbar Background', 'elevation'),
            'subtitle' => esc_html__('Pick a Navbar Background color', 'elevation'),
            'validate' => 'color',
            'required' => array("header_color", "=", "custom")
            ),
        array(
            'id' => 'navbar_text_color',
            'type' => 'color',
            'title' => esc_html__('Navbar Text Color', 'elevation'),
            'subtitle' => esc_html__('Pick a Navbar Text Color', 'elevation'),
            'validate' => 'color',
            'required' => array("header_color", "=", "custom")
            ),
        array(
            'id' => 'navbar_link_hover_color',
            'type' => 'color',
            'title' => esc_html__('Navbar Text Hover Color', 'elevation'),
            'subtitle' => esc_html__('Pick a Navbar Text Hover Color', 'elevation'),
            'validate' => 'color',
            'required' => array("header_color", "=", "custom")
            ),


    // Navbar Dropdown
        array(
            'id' => 'navbar_dropdown_bg_color',
            'type' => 'color',
            'title' => esc_html__('Navbar Dropdown Background', 'elevation'),
            'subtitle' => esc_html__('Pick a Navbar Dropdown Background color', 'elevation'),
            'validate' => 'color',
            'required' => array("header_color", "=", "custom")
            ),
        array(
            'id' => 'navbar_dropdown_text_color',
            'type' => 'color',
            'title' => esc_html__('Navbar Dropdown Text Color', 'elevation'),
            'subtitle' => esc_html__('Pick a Navbar Dropdown Text Color', 'elevation'),
            'validate' => 'color',
            'required' => array("header_color", "=", "custom")
            ),
        array(
            'id' => 'navbar_dropdown_hover_color',
            'type' => 'color',
            'title' => esc_html__('Navbar Dropdown Hover Color', 'elevation'),
            'subtitle' => esc_html__('Pick a Navbar Dropdown Hover Color', 'elevation'),
            'validate' => 'color',
            'required' => array("header_color", "=", "custom")
            ),


        )
); //Header
