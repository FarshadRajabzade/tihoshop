<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
if (class_exists('Redux')) {
    $showMinVariableProductPrice = ts_option('ts_show_min_variable_price');
}

global $product;

?>

<?php if($showMinVariableProductPrice) : ?>
    <div class="d-flex justify-content-center align-items-center">
        <?php if ($product->is_on_sale()) :?>
            <p class="old-price">
                <?php echo ts_get_regular_price($product);  ?>
            </p>
            <span class="discount"><?php echo ts_get_percentage_to_sale_badge($product) ?></span>
        <?php endif; ?>
    </div>
    <?php if ($product->is_in_stock()) : ?>
        <p class="new-price"><?php echo wc_price($product->get_price()); ?>
    <?php else : ?>
        <p class="new-price">ناموجود</p>
    <?php endif; ?>

<?php else: ?>
    <p class="new-price <?php echo esc_attr(apply_filters('woocommerce_product_price_class', 'price')); ?>"><?php echo $product->get_price_html(); ?></p>
<?php endif; ?>
