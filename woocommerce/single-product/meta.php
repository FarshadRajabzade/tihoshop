<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}
if (class_exists('redux')) {
    $tsSingleProductCat = ts_option('ts_single_product_show_cat_status');
    $tsSingleProductTags = ts_option('ts_single_product_show_tags_status');
    $tsSingleProductSKU = ts_option('ts_single_product_show_sku_status');
}

global $product;
?>
<div class="product_meta">
    <?php do_action('woocommerce_product_meta_start'); ?>

    <?php if ($tsSingleProductSKU == true): ?>
        <?php if (wc_product_sku_enabled() && ($product->get_sku() || $product->is_type('variable'))) : ?>

            <span class="sku_wrapper"><i
                        class="fi fi-rr-box-alt align-middle line-height-1"></i> <?php esc_html_e('SKU:', 'woocommerce'); ?> <span
                        class="sku"><?php echo ($sku = $product->get_sku()) ? $sku : esc_html__('N/A', 'woocommerce'); ?></span></span>

        <?php endif; ?>
    <?php endif; ?>

    <?php if ($tsSingleProductCat == true): ?>
    <span>
            <?php echo wc_get_product_category_list($product->get_id(), ', ', '<span class="posted_in">' . '<i class="fi fi-rr-folder align-middle line-height-1"></i> ' . _n('دسته بندی:', 'دسته بندی ها:', count($product->get_category_ids()), 'woocommerce') . ' ', '</span>'); ?>
        </span>
    <?php endif; ?>

    <?php if ($tsSingleProductTags == true): ?>
    <span>
            <?php echo wc_get_product_tag_list($product->get_id(), ', ', '<span class="tagged_as">' . '<i class="fi fi-rr-label align-middle line-height-1"></i> ' . _n('Tag:', 'Tags:', count($product->get_tag_ids()), 'woocommerce') . ' ', '</span>'); ?>
        </span>

    <?php endif; ?>

    <?php do_action('woocommerce_product_meta_end'); ?>
</div>
