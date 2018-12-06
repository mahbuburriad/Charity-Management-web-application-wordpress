<?php
/*
* Causes Section
*/
$sections[] = array(
    'title' => esc_html__('Causes Section', 'elevation'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-magic',
    'fields' => array(

          array(
                'id' => 'cause-donation-form',
                'type' => 'textarea',
                'title' => esc_html__('Default Donation Form', 'elevation'),
                'default' => '[elevation_paypal user="youruser@domain.com"]',
                'desc'=> esc_html__('You may put the recipient\'s paypal account here.', 'elevation')
            ),
            array(
                'id' => 'cause_recipient_name',
                'type' => 'text',
                'title' => esc_html__('Recipient ', 'elevation'),
                'subtitle' => esc_html__('Recipient Name (Appear in sending mail)', 'elevation'),
                'default' => esc_html__('ORGANIZATION NAME', 'elevation')
            ),

    )
);
