<?php
/*
* Footer Section
*/
$sections[] = array(
    'title' => esc_html__('Footer Section', 'elevation'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-edit',
    'fields' => array(
        array(
                'id' => 'copyright_text',
                'type' => 'textarea',
                'title' => esc_html__('Copyright Text', 'elevation'),
                'default' =>'<li> &copy; <a href="' . esc_url( esc_html__('https://elevation.jeweltheme.com', 'elevation')) . '">' . esc_html__('elevation','elevation').'</a> ' . esc_html__('2018-2019 -','elevation').'</li>
<li>' . esc_html__('Designed by','elevation').' <a href="' . esc_url( esc_html__('http://themeforest.net/user/bigpsfan', 'elevation')) . '"> ' . esc_html__('bigpsfan -','elevation').' </a></li>
<li>' . esc_html__('Developed by','elevation').' <a href="' . esc_url( esc_html__('http://jeweltheme.com', 'elevation')) . '">' . esc_html__('Jewel Theme','elevation').'</a></li>'
            )
    )
); //footer
