<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}
?>

<?php if (is_shop() || is_product_category()): ?>
<div class="col-6 col-md-4 col-lg-3">
    <?php endif; ?>
    <div <?php wc_product_class('ts-product border-none shadow-product ts-card product-default item', $product); ?>>
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

        if (ts_option('ts_shop_product_card_discount_label_status')) {
            do_action('tihoshop_woocommerce_product_labels');
        }

        do_action('tihoshop_woocommerce_product_extra_buttons');
        ?>
    </div>


    <?php if (is_shop() || is_product_category()): ?>
</div>
<?php endif; ?>
