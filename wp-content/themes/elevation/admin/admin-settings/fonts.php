<?php
/*
* Fonts
*/
$sections[] = array(
    'title' => esc_html__('Fonts Section', 'elevation'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-hand-down icon-small',
    'fields' => array(

            array(
                    'id'       => 'body_font',
                    'type'     => 'typography',
                    'title'    => esc_html__( 'Body Font', 'elevation' ),
                    'subtitle' => esc_html__( 'Specify the body font properties.', 'elevation' ),
                    'google'   => true,
                    'text-align'  =>false,
                    'font-style'=>false,
                    'font-weight'=>false,
                    'font-size'=>true,
                    'color'=>false,
                    'line-height'=>false,
                    'default'  => array(
                        'font-size'   => '16px',
                        'font-family' => 'Open Sans,Roboto,sans-serif',
                    ),
                ),     

            array(
                'id'          => 'paragraph_typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'Paragraph Typography ( p )', 'elevation' ),
                'font-backup' => false,
                'all_styles'  => true,
                'output'      => array( 'p' ),
                'units'       => 'px',
                'subsets'     =>false,
                'text-align'  =>false,
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'elevation' ),
                'default'     => array(
                    'color'       => '#666666',
                    'font-weight'  => '400',
                    'font-family' => 'Roboto',
                    'google'      => true,
                    'font-size'   => '15px',
                    'line-height' => '23px'
                    ),
                ),


            array(
                'id' => 'heading_google_font',
                'type' => 'typography',
                'title' => esc_html__('Heading Google Font', 'elevation'),
                'desc' => esc_html__('Heading Google Web Fonts Url (Titles)', 'elevation'),
                'google'      => true,
                'color' => false,
                'word-spacing'=>false,
                'text-align'=>false,
                'update-weekly'=>false,
                'line-height'=>false,
                'subsets'=>false,
                'letter-spacing'=>false,
                'font-style'=>false,
                'font-backup' => false,
                'font-size'=>false,
                'font-weight'=>false,
                'output'      => array('h1, h2, h3, h4, h5, h6'),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Open Sans',
                    'google'      => true,
                    ),
                ), 


        ) 
); //Fonts
