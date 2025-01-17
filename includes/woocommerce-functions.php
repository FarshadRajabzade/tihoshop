<?php
//check theme setting for run functions
add_action('init' , 'check_ts_options' , 160);
function check_ts_options() {
    if (class_exists('Redux')) {
        $showMinVariableProductPrice = ts_option('ts_show_min_variable_price');
        $showInStockProductsFirst = ts_option('ts_order_by_stock_status');
    }
    if ($showMinVariableProductPrice) {
        add_filter('woocommerce_variable_sale_price_html', 'ts_variable_price_format', 10, 2);
        add_filter('woocommerce_variable_price_html', 'ts_variable_price_format', 10, 2);
    }

    if ($showInStockProductsFirst) {
        add_filter('posts_clauses', 'ts_order_by_stock_status');
    }
}


//show in stock products first
function ts_order_by_stock_status($posts_clauses) {
    global $wpdb;
    // only change query on WooCommerce loops
    if (is_woocommerce() && (is_shop() || is_product_category() || is_product_tag() || is_product_taxonomy())) {
        $posts_clauses['join'] .= " INNER JOIN $wpdb->postmeta istockstatus ON ($wpdb->posts.ID = istockstatus.post_id) ";
        $posts_clauses['orderby'] = " istockstatus.meta_value ASC, " . $posts_clauses['orderby'];
        $posts_clauses['where'] = " AND istockstatus.meta_key = '_stock_status' AND istockstatus.meta_value <> '' " . $posts_clauses['where'];
    }
    return $posts_clauses;
}

//add percentage badge
function ts_get_percentage_to_sale_badge($product)
{
    if ($product->is_type('variable')) {
        $percentages = array();

        // Get all variation prices
        $prices = $product->get_variation_prices();

        // Loop through variation prices
        foreach ($prices['price'] as $key => $price) {
            // Only on sale variations
            if ($prices['regular_price'][$key] !== $price) {
                // Calculate and set in the array the percentage for each variation on sale
                $percentages[] = round(100 - ($prices['sale_price'][$key] / $prices['regular_price'][$key] * 100));
            }
        }
        $percentage = max($percentages) . '%';
    } else {
        $regular_price = (float)$product->get_regular_price();
        $sale_price = (float)$product->get_sale_price();

        $percentage = round(100 - ($sale_price / $regular_price * 100)) . '%';
    }
    return $percentage;
}

//get price
function ts_get_regular_price($product)
{
    if ($product->is_type('simple')) {
        echo wc_price(wc_get_price_to_display($product, array('price' => $product->get_regular_price())));
    } elseif ($product->is_type('variable')) {
        echo wc_price(wc_get_price_to_display($product, array('price' => $product->get_variation_regular_price())));
    }
}


add_filter('woocommerce_product_description_tab_title', 'ts_rename_description_product_tab_label');

function ts_rename_description_product_tab_label()
{
    return '<i class="fi fi-rr-document-signed align-middle line-height-1"></i> معرفی محصول';
}

add_filter('woocommerce_product_additional_information_tab_title', 'ts_rename_additional_information_product_tab_label');

function ts_rename_additional_information_product_tab_label()
{
    return '<i class="fi fi-rr-settings-sliders align-middle line-height-1"></i> مشخصات';
}

add_filter('woocommerce_product_reviews_tab_title', 'ts_rename_reviews_product_tab_label');

function ts_rename_reviews_product_tab_label()
{
    return '<i class="fi fi-rr-comment align-middle line-height-1"></i> نظرات';
}

// Change price format from range to "From:"

function ts_variable_price_format($price, $product)
{
    $min_price_regular = $product->get_variation_regular_price('min', true);
    $min_price_sale = $product->get_variation_sale_price('min', true);
    $max_price = $product->get_variation_price('max', true);
    $min_price = $product->get_variation_price('min', true);

    $price = ($min_price_sale == $min_price_regular) ?
        wc_price($min_price_regular) :
        '<del>' . wc_price($min_price_regular) . '</del>' . '<ins>' . wc_price($min_price_sale) . '</ins>';

    return ($min_price == $max_price) ?
        $price :
        sprintf('%s', $price);

}



//tihoshop custom function for import product details in content-single-product

if (!function_exists('ts_single_product_details')) {
    function ts_single_product_details() {
        get_template_part('template-parts/woocommerce/single-product/single-product-details');
    }
}

//ajax add to cart
function ts_woocommerce_ajax_add_to_cart_js()
{
    if (function_exists('is_product') && is_product()) {
        wp_enqueue_script('custom_script', get_bloginfo('stylesheet_directory') . '/assets/js/single-product.js', array('jquery'), '1.0');
    }
}

add_action('wp_enqueue_scripts', 'ts_woocommerce_ajax_add_to_cart_js');


//product loop labels
if (!function_exists('tihoshop_woocommerce_loop_product_labels')) {
    function tihoshop_woocommerce_loop_product_labels()
    {
        wc_get_template('template-parts/woocommerce/loop/content-product/default/labels.php');
    }
}


//product loop hover buttons
if (!function_exists('tihoshop_woocommerce_loop_product_extra_buttons')) {
    function tihoshop_woocommerce_loop_product_extra_buttons()
    {
        wc_get_template('template-parts/woocommerce/loop/content-product/default/extra-buttons.php');
    }
}

//content product style 1
if (!function_exists('tihoshop_woocommerce_loop_product_extra_buttons_style_1')) {
    function tihoshop_woocommerce_loop_product_extra_buttons_style_1()
    {
        wc_get_template('template-parts/woocommerce/loop/content-product/style-1/extra-buttons.php');
    }
}

//add to cart style 3
if (!function_exists('woocommerce_template_loop_add_to_cart_style_2')) {

    /**
     * Get the add to cart template for the loop.
     *
     * @param array $args Arguments.
     */
    function woocommerce_template_loop_add_to_cart_style_2($args = array())
    {
        global $product;

        if ($product) {
            $defaults = array(
                'quantity' => 1,
                'class' => implode(
                    ' ',
                    array_filter(
                        array(
                            'button',
                            wc_wp_theme_get_element_class_name('button'), // escaped in the template.
                            'product_type_' . $product->get_type(),
                            $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                            $product->supports('ajax_add_to_cart') && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
                        )
                    )
                ),
                'attributes' => array(
                    'data-product_id' => $product->get_id(),
                    'data-product_sku' => $product->get_sku(),
                    'aria-label' => $product->add_to_cart_description(),
                    'aria-describedby' => $product->add_to_cart_aria_describedby(),
                    'rel' => 'nofollow',
                ),
            );

            $args = apply_filters('woocommerce_loop_add_to_cart_args', wp_parse_args($args, $defaults), $product);

            if (!empty($args['attributes']['aria-describedby'])) {
                $args['attributes']['aria-describedby'] = wp_strip_all_tags($args['attributes']['aria-describedby']);
            }

            if (isset($args['attributes']['aria-label'])) {
                $args['attributes']['aria-label'] = wp_strip_all_tags($args['attributes']['aria-label']);
            }

            wc_get_template('loop/add-to-cart-style-2.php', $args);
        }
    }
}


//ajax add to cart

add_action('wp_ajax_ql_woocommerce_ajax_add_to_cart', 'ql_woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_ql_woocommerce_ajax_add_to_cart', 'ql_woocommerce_ajax_add_to_cart');
function ql_woocommerce_ajax_add_to_cart()
{
    $product_id = apply_filters('ql_woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
    $variation_id = absint($_POST['variation_id']);
    $passed_validation = apply_filters('ql_woocommerce_add_to_cart_validation', true, $product_id, $quantity);
    $product_status = get_post_status($product_id);
    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {
        do_action('ql_woocommerce_ajax_added_to_cart', $product_id);
        if ('yes' === get_option('ql_woocommerce_cart_redirect_after_add')) {
            wc_add_to_cart_message(array($product_id => $quantity), true);
        }
        WC_AJAX:: get_refreshed_fragments();
    } else {
        $data = array(
            'error' => true,
            'product_url' => apply_filters('ql_woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));
        echo wp_send_json($data);
    }
    wp_die();
}

if (!function_exists('ts_get_woo_account_menus')) {
    function ts_get_woo_account_menus()
    {

        foreach (wc_get_account_menu_items() as $item => $index) {
            if (($item != 'compare') && ($item != 'wishlist')) {
                $url = wc_get_account_endpoint_url($item);
                echo "<li><a href='$url'>$index</a></li>";
            }
        }
    }
}
