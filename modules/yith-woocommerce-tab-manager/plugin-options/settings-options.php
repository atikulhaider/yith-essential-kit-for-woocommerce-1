<?php
/**
 * Created by PhpStorm.
 * User: Your Inspiration
 * Date: 18/03/2015
 * Time: 14:44
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly


return array(

    'settings' => array(

        'section_general_settings_videobox'         => array(
            'name' => __( 'Upgrade to the PREMIUM VERSION', 'yith_wc_tab_manager' ),
            'type' => 'videobox',
            'default' => array(
                'plugin_name'        => __( 'YITH WooCommerce Tab Manager', 'yith_wc_tab_manager' ),
                'title_first_column' => __( 'Discover the Advanced Features', 'yith_wc_tab_manager' ),
                'description_first_column' => __('Upgrade to the PREMIUM VERSION
of YITH WooCommerce Tab Manager to benefit from all features!', 'yith_wc_tab_manager'),

                'video' => array(
                    'video_id'           => '126788273',
                    'video_image_url'    =>  YWTM_ASSETS_URL.'/images/yith-woocommerce-tab-manager.jpg',
                    'video_description'  => __( 'YITH WooCommerce Tab Manager', 'yith_wc_tab_manager' ),
                ),
                'title_second_column' => __( 'Get Support and Pro Features', 'yith_wc_tab_manager' ),
                'description_second_column' => __('By purchasing the premium version of the plugin, you will take advantage of the advanced features of the product and you will get one year of free updates and support through our platform available 24h/24.', 'yith_wc_tab_manager'),
                'button' => array(
                    'href' => 'http://yithemes.com/themes/plugins/yith-woocommerce-tab-manager/',
                    'title' => 'Get Support and Pro Features'
                )
            ),
            'id'   => 'yith_wctm_general_videobox'
        ),

        'section_general_settings'     => array(
            'name' => __( 'General settings', 'yith_wc_tab_manager' ),
            'type' => 'title',
            'id'   => 'ywtm_section_general'
        ),

        'enable_plugin' => array(
            'name'    => __( 'Enable plugin', 'yith_wc_tab_manager' ),
            'desc'    => '',
            'id'      => 'ywtm_enable_plugin',
            'default' => 'no',
            'type'    => 'checkbox'
        ),

         'section_general_settings_end' => array(
            'type' => 'sectionend',
            'id'   => 'ywtm_section_general_end'
        )
    )
);