<?php
/**
 * This file belongs to the YIT Plugin Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if ( !defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

global $YITH_WC_Catalog_Mode;

$videobox = defined( 'YWCTM_PREMIUM' ) ? '' : array(
    'name'    => __( 'Upgrade to the PREMIUM VERSION', 'yith-woocommerce-catalog-mode' ),
    'type'    => 'videobox',
    'default' => array(
        'plugin_name'               => __( 'YITH WooCommerce Catalog Mode', 'yith-woocommerce-catalog-mode' ),
        'title_first_column'        => __( 'Discover the Advanced Features', 'yith-woocommerce-catalog-mode' ),
        'description_first_column'  => __( 'Upgrade to the PREMIUM VERSION of YITH WooCommerce Catalog Mode to benefit from all features!', 'yith-woocommerce-catalog-mode' ),
        'video'                     => array(
            'video_id'          => '120697979',
            'video_image_url'   => YWCTM_ASSETS_URL . '/images/yith-woocommerce-catalog-mode.jpg',
            'video_description' => __( 'YITH WooCommerce Catalog Mode', 'yith-woocommerce-catalog-mode' ),
        ),
        'title_second_column'       => __( 'Get Support and Pro Features', 'yith-woocommerce-catalog-mode' ),
        'description_second_column' => __( 'By purchasing the premium version of the plugin, you will take advantage of the advanced features of the product and you will get one year of free updates and support through our platform available 24h/24.', 'yith-woocommerce-catalog-mode' ),
        'button'                    => array(
            'href'  => $YITH_WC_Catalog_Mode->get_premium_landing_uri(),
            'title' => 'Get Support and Pro Features'
        )
    ),
    'id'      => 'ywctm_general_videobox'
);

$exclusion = !defined( 'YWCTM_PREMIUM' ) ? '' : array(
    'name'          => __( '"Add to cart" button', 'yith-woocommerce-catalog-mode' ),
    'type'          => 'checkbox',
    'desc'          => __( 'Exclude selected products (See "Exclusions" tab)', 'yith-woocommerce-catalog-mode' ),
    'id'            => 'ywctm_exclude_hide_add_to_cart',
    'default'       => 'no',
    'checkboxgroup' => ''
);

$reverse_exclusion = !defined( 'YWCTM_PREMIUM' ) ? '' : array(
    'name'          => __( '"Add to cart" button', 'yith-woocommerce-catalog-mode' ),
    'type'          => 'checkbox',
    'desc'          => __( 'Reverse Exclusion List (Restrict Catalog Mode to selected items only)', 'yith-woocommerce-catalog-mode' ),
    'id'            => 'ywctm_exclude_hide_add_to_cart_reverse',
    'default'       => 'no',
    'checkboxgroup' => ''
);

$product_variations = !defined( 'YWCTM_PREMIUM' ) ? '' : array(
    'name'          => __( 'Variable products', 'yith-woocommerce-catalog-mode' ),
    'type'          => 'checkbox',
    'desc'          => __( 'Hide product variations', 'yith-woocommerce-catalog-mode' ),
    'id'            => 'ywctm_hide_variations',
    'default'       => 'no',
    'checkboxgroup' => 'end'
);

return array(
    'settings' => array(
        'section_general_settings_videobox'                => $videobox,

        'catalog_mode_general_title'                       => array(
            'name' => __( 'General Settings', 'yith-woocommerce-catalog-mode' ),
            'type' => 'title',
            'desc' => '',
        ),
        'catalog_mode_general_enable_plugin'               => array(
            'name'    => __( 'Enable YITH Woocommerce Catalog Mode', 'yith-woocommerce-catalog-mode' ),
            'type'    => 'checkbox',
            'desc'    => '',
            'id'      => 'ywctm_enable_plugin',
            'default' => 'yes',
        ),
        'catalog_mode_general_admin_view'                  => array(
            'name'    => __( 'Admin View', 'yith-woocommerce-catalog-mode' ),
            'type'    => 'checkbox',
            'desc'    => __( 'Enable Catalog Mode also for administrators', 'yith-woocommerce-catalog-mode' ),
            'id'      => 'ywctm_admin_view',
            'default' => 'yes',
        ),
        'catalog_mode_general_end'                         => array(
            'type' => 'sectionend',
        ),

        'catalog_mode_section_title'                       => array(
            'name' => __( 'Catalog Mode Settings', 'yith-woocommerce-catalog-mode' ),
            'type' => 'title',
            'desc' => '',
        ),
        'catalog_mode_settings_disable_add_to_cart_single' => array(
            'name'          => __( '"Add to cart" button', 'yith-woocommerce-catalog-mode' ),
            'type'          => 'checkbox',
            'desc'          => __( 'Hide in product details page', 'yith-woocommerce-catalog-mode' ),
            'id'            => 'ywctm_hide_add_to_cart_single',
            'default'       => 'no',
            'checkboxgroup' => 'start'
        ),
        'catalog_mode_settings_disable_add_to_cart_loop'   => array(
            'name'          => __( '"Add to cart" button', 'yith-woocommerce-catalog-mode' ),
            'type'          => 'checkbox',
            'desc'          => __( 'Hide in other pages', 'yith-woocommerce-catalog-mode' ),
            'id'            => 'ywctm_hide_add_to_cart_loop',
            'default'       => 'no',
            'checkboxgroup' => !defined( 'YWCTM_PREMIUM' ) ? 'end' : ''
        ),
        'catalog_mode_settings_exclude_products'           => $exclusion,
        'catalog_mode_settings_exclude_products_reverse'   => $reverse_exclusion,
        'catalog_mode_settings_variable_products'          => $product_variations,
        'catalog_mode_settings_disable_cart_in_header'     => array(
            'name'    => __( '"Cart" and "Checkout" pages', 'yith-woocommerce-catalog-mode' ),
            'type'    => 'checkbox',
            'desc'    => __( 'Hide and disable all shop features', 'yith-woocommerce-catalog-mode' ),
            'id'      => 'ywctm_hide_cart_header',
            'default' => 'no',
        ),
        'catalog_mode_section_end'                         => array(
            'type' => 'sectionend',
        )
    )

);