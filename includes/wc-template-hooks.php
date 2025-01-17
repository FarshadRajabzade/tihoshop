<?php

//Tiho Shop Custom Woocommerce Hooks
/**
 * Product Add to cart.
 *
 * @see woocommerce_template_single_add_to_cart()
 * @see woocommerce_simple_add_to_cart()
 * @see woocommerce_grouped_add_to_cart()
 * @see woocommerce_variable_add_to_cart()
 * @see woocommerce_external_add_to_cart()
 * @see woocommerce_single_variation()
 * @see woocommerce_single_variation_add_to_cart_button()
 * @see woocommerce_template_single_meta()
 */
add_action( 'tihoshop_woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
add_action( 'tihoshop_woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30 );
add_action( 'tihoshop_woocommerce_grouped_add_to_cart', 'woocommerce_grouped_add_to_cart', 30 );
add_action( 'tihoshop_woocommerce_variable_add_to_cart', 'woocommerce_variable_add_to_cart', 30 );
add_action( 'tihoshop_woocommerce_external_add_to_cart', 'woocommerce_external_add_to_cart', 30 );
add_action( 'tihoshop_woocommerce_single_variation', 'woocommerce_single_variation', 10 );
add_action( 'tihoshop_woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20 );
add_action( 'tihoshop_woocommerce_single_product_meta', 'woocommerce_template_single_meta', 40 );


/**
 * After Single Products Summary Div.
 *
 * @see woocommerce_output_product_data_tabs()
 * @see woocommerce_output_related_products()

 */
add_action( 'tihoshop_woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
add_action( 'tihoshop_woocommerce_after_single_product_related', 'woocommerce_output_related_products', 20 );


remove_action('woocommerce_single_product_summary' , 'woocommerce_template_single_price' , 10);
remove_action('woocommerce_single_product_summary' , 'woocommerce_template_single_meta' , 40);
remove_action('woocommerce_single_product_summary' , 'woocommerce_template_single_title' , 5);


remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );


add_action( 'tihoshop_woocommerce_after_shop_loop_item_price', 'woocommerce_template_loop_price', 10 );
add_action( 'tihoshop_woocommerce_after_shop_loop_item_rating', 'woocommerce_template_loop_rating', 5 );

add_action('tihoshop_woocommerce_product_labels' , 'tihoshop_woocommerce_loop_product_labels' , 10);
add_action('tihoshop_woocommerce_product_extra_buttons' , 'tihoshop_woocommerce_loop_product_extra_buttons' , 5);

add_action('tihoshop_woocommerce_product_extra_buttons_style_1' , 'tihoshop_woocommerce_loop_product_extra_buttons_style_1');


add_action('tihoshop_woocommerce_add_to_cart_style_2' , 'woocommerce_template_loop_product_link_close');
add_action('tihoshop_woocommerce_add_to_cart_style_2' , 'woocommerce_template_loop_add_to_cart_style_2');


add_action('tihoshop_woocommerce_result_count' , 'woocommerce_result_count');
add_action('tihoshop_woocommerce_output_all_notices' , 'woocommerce_output_all_notices');
add_action('tihoshop_woocommerce_catalog_ordering' , 'woocommerce_catalog_ordering');



add_action('tihoshop_woocommerce_single_product_details' , 'ts_single_product_details');