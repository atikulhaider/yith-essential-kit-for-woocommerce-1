<?php
/**
 * Main admin class
 *
 * @author Your Inspiration Themes
 * @package YITH Woocommerce Compare
 * @version 1.1.1
 */

if ( ! defined( 'YITH_WOOCOMPARE' ) ) {
	exit;
} // Exit if accessed directly

$options = array(
    'general' => array(
        array(
            'name' => __( 'General Settings', 'yith-wcmp' ),
            'type' => 'title',
            'desc' => '',
            'id' => 'yith_woocompare_general'
        ),

        array(
            'name' => __( 'Link or Button', 'yith-wcmp' ),
            'desc' => __( 'Choose if you want to use a link or a button for the action button.', 'yith-wcmp' ),
            'id'   => 'yith_woocompare_is_button',
            'std'  => 'button',
            'default' => 'button',
            'type' => 'select',
            'options' => array(
                'link' => __( 'Link', 'yith-wcmp' ),
                'button' => __( 'Button', 'yith-wcmp' )
            )
        ),

        array(
            'name' => __( 'Link/Button text', 'yith-wcmp' ),
            'desc' => __( 'Type the text to use for the button or the link of the compare.', 'yith-wcmp' ),
            'id'   => 'yith_woocompare_button_text',
            'std'  => __( 'Compare', 'yith-wcmp' ),
            'type' => 'text'
        ),

        array(
            'name' => __( 'Show button in single product page', 'yith-wcmp' ),
            'desc' => __( 'Say if you want to show the button in the single product page.', 'yith-wcmp' ),
            'id'   => 'yith_woocompare_compare_button_in_product_page',
            'std'  => 'yes',
            'default' => 'yes',
            'type' => 'checkbox'
        ),

        array(
            'name' => __( 'Show button in products list', 'yith-wcmp' ),
            'desc' => __( 'Say if you want to show the button in the products list.', 'yith-wcmp' ),
            'id'   => 'yith_woocompare_compare_button_in_products_list',
            'std'  => 'no',
            'default' => 'no',
            'type' => 'checkbox'
        ),

        array(
            'name' => __( 'Open automatically lightbox', 'yith-wcmp' ),
            'desc' => __( 'Open link after click into "Compare" button".', 'yith-wcmp' ),
            'id'   => 'yith_woocompare_auto_open',
            'std'  => 'yes',
            'default' => 'yes',
            'type' => 'checkbox'
        ),

        array(
	        'type' => 'sectionend',
	        'id' => 'yith_woocompare_general_end'
        ),

	    array(
		    'name' => __( 'Table Settings', 'yith-wcmp' ),
		    'type' => 'title',
		    'desc' => '',
		    'id' => 'yith_woocompare_table'
	    ),

	    array(
		    'name' => __( 'Table title', 'yith-wcmp' ),
		    'desc' => __( 'Type the text to use for the table title.', 'yith-wcmp' ),
		    'id'   => 'yith_woocompare_table_text',
		    'std'  => __( 'Compare products', 'yith-wcmp' ),
		    'type' => 'text'
	    ),

	    array(
		    'name' => __( 'Fields to show', 'yith-wcmp' ),
		    'desc' => __( 'Select the fields to show in the comparison table and order them by drag&drop (are included also the woocommerce attributes)', 'yith-wcmp' ),
		    'id'   => 'yith_woocompare_fields_attrs',
		    'std'  => 'all',
		    'default' => 'all',
		    'type' => 'woocompare_attributes'
	    ),

	    array(
		    'name' => __( 'Repeat "Price" field', 'yith-wcmp' ),
		    'desc' => __( 'Repeat the "Price" field at the end of the table', 'yith-wcmp' ),
		    'id'   => 'yith_woocompare_price_end',
		    'std'  => 'yes',
		    'default' => 'yes',
		    'type' => 'checkbox'
	    ),

	    array(
		    'name' => __( 'Repeat "Add to cart" field', 'yith-wcmp' ),
		    'desc' => __( 'Repeat the "Add to cart" field at the end of the table', 'yith-wcmp' ),
		    'id'   => 'yith_woocompare_add_to_cart_end',
		    'std'  => 'no',
		    'default' => 'no',
		    'type' => 'checkbox'
	    ),

	    array(
		    'name' => __( 'Image size', 'yith-wcmp' ),
		    'desc' => __( 'Set the size for the images', 'yith-wcmp' ),
		    'id'   => 'yith_woocompare_image_size',
		    'type' 		=> 'woocompare_image_width',
		    'default'	=> array(
			    'width' 	=> 220,
			    'height'	=> 154,
			    'crop'		=> 1
		    ),
		    'std'	=> array(
			    'width' 	=> 220,
			    'height'	=> 154,
			    'crop'		=> 1
		    )
	    ),

	    array(
		    'type' => 'sectionend',
		    'id' => 'yith_woocompare_table_end'
	    )
    )
);

return $options;
