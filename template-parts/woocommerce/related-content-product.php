<?php

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
return;
}
?>

<div <?php wc_product_class('ts-product product-default item', $product); ?>>
    <?php
    /**
     * Hook: woocommerce_before_shop_loop_item.
     *
     * @hooked woocommerce_template_loop_product_link_open - 10
     */
    do_action('woocommerce_before_shop_loop_item');

    /**
     * Hook: woocommerce_before_shop_loop_item_title.
     *
     * @hooked woocommerce_show_product_loop_sale_flash - 10
     * @hooked tihoshop_woocommerce_after_shop_loop_item_rating - 10
     */

    do_action('woocommerce_before_shop_loop_item_title');

    do_action('tihoshop_woocommerce_after_shop_loop_item_rating');


    /**
     * Hook: woocommerce_shop_loop_item_title.
     *
     * @hooked woocommerce_template_loop_product_title - 10
     */
    do_action('woocommerce_shop_loop_item_title');

    ?>
    <div class="product-loop-footer">
        <?php
        /**
         * Hook: woocommerce_after_shop_loop_item_title.
         *
         * @hooked woocommerce_template_loop_price - 10
         */
        do_action('tihoshop_woocommerce_after_shop_loop_item_price');

        /**
         * Hook: woocommerce_after_shop_loop_item.
         *
         * @hooked woocommerce_template_loop_product_link_close - 5
         * @hooked woocommerce_template_loop_add_to_cart - 10
         */
        do_action('woocommerce_after_shop_loop_item');
        ?>
    </div>

    <?php
    /**
     * Hook: tihoshop_woocommerce_product_labels.
     *
     * @hooked tihoshop_woocommerce_loop_product_labels - 5
     * @hooked tihoshop_woocommerce_loop_product_hover_buttons - 10
     */
    do_action('tihoshop_woocommerce_product_labels');

    do_action('tihoshop_woocommerce_product_hover_buttons');
    ?>

</div>
