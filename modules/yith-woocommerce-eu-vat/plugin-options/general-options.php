<?php
/**
 * This file belongs to the YIT Plugin Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly


$general_settings = array(
	array(
		'name' => __( 'General Settings', 'ywev' ),
		'type' => 'title',
		'desc' => '',
		'id'   => 'ywev_general'
	),
	array(
		'name'    => __( 'Forbid EU VAT checkout', 'ywev' ),
		'desc'    => __( 'Forbid EU VAT checkout.', 'ywev' ),
		'id'      => 'ywev_forbid_checkout',
		'std'     => 'no',
		'default' => 'no',
		'type'    => 'checkbox'
	),
	array(
		'name'    => __( 'Show EU VAT warning', 'ywev' ),
		'desc'    => __( 'If "Forbid EU VAT" checkout is selected, choose if a warning message should be shown during the checkout process.', 'ywev' ),
		'id'      => 'ywev_show_forbid_warning',
		'std'     => 'no',
		'default' => 'no',
		'type'    => 'checkbox'
	),
	array(
		'name'    => __( 'EU VAT warning message', 'ywev' ),
		'id'      => 'ywev_forbid_warning_message',
		'std'     => __( 'For EU area customers.<br>Due to EU VAT law terms, some product may be not purchasable.', 'ywev' ),
		'default' => __( 'For EU area customers.<br>Due to EU VAT law terms, some product may be not purchasable.', 'ywev' ),
		'css'     => 'width:80%; height: 90px;',
		'type'    => 'textarea',
	),
	array(
		'name'    => __( 'EU VAT error message', 'ywev' ),
		'id'      => 'ywev_forbid_error_message',
		'default'     => __( "This order can't be accepted due to EU VAT laws. This shop doesn't allow EU area customers to purchase.", 'ywev' ),
		'css'     => 'width:80%; height: 90px;',
		'type'    => 'textarea',
	),
	array( 'type' => 'sectionend', 'id' => 'ywev_general_end' )

);

$general_settings = apply_filters( 'yith_ywev_general_settings', $general_settings );

$options['general'] = array();

if ( ! defined( 'YITH_YWEV_PREMIUM' ) ) {
	$intro_tab = array(
		'section_general_settings_videobox' => array(
			'name'    => __( 'Upgrade to the PREMIUM VERSION', 'ywev' ),
			'type'    => 'videobox',
			'default' => array(
				'plugin_name'               => __( 'YITH WooCommerce EU VAT', 'ywev' ),
				'title_first_column'        => __( 'Discover The Advanced Features', 'ywev' ),
				'description_first_column'  => __( 'Upgrade to the PREMIUM VERSION of YITH WOOCOMMERCE EU VAT to benefit from all features!', 'ywev' ),
				'video'                     => array(
					'video_id'          => '125126673',
					'video_image_url'   => YITH_YWEV_ASSETS_IMAGES_URL . 'yith-woocommerce-eu-vat.jpg',
					'video_description' => __( 'See YITH WooCommerce EU VAT plugin with full premium features in action', 'ywev' ),
				),
				'title_second_column'       => __( 'Get Support and Pro Features', 'ywev' ),
				'description_second_column' => __( 'Purchasing the premium version of the plugin, you will take advantage of the advanced features of the product and you will get one year of free updates and support through our platform available 24h/24.', 'ywev' ),
				'button'                    => array(
					'href'  => YITH_YWEV_Plugin_FW_Loader::get_instance()->get_premium_landing_uri(),
					'title' => 'Get Support and Pro Features'
				)
			),
			'id'      => 'yith_wcas_general_videobox'
		)
	);

	$options['general'] = $intro_tab;
}

$options['general'] = array_merge( $options['general'], $general_settings );

return apply_filters( 'yith_ywev_tab_options', $options );

