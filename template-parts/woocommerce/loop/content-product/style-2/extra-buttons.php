<?php
global $product;
if (class_exists('redux')) {
    $tsCompareStatus = ts_option('ts_shop_product_compare_status');
    $tsWishlistStatus = ts_option('ts_shop_product_wishlist_status');
    $tsQuickViewStatus = ts_option('ts_shop_product_quick_view_status');
}
?>

<div class="product-buttons">

    <?php if ($tsCompareStatus == true): ?>
        <div class="compare-btn-box">
            <?php echo do_shortcode('[woosc id=' . get_the_ID() . ']'); ?>
        </div>
    <?php endif; ?>

    <?php if ($tsWishlistStatus == true): ?>
        <div class="wishlist-btn-box">
            <?php echo do_shortcode('[woosw id=' . get_the_ID() . ']'); ?>
        </div>
    <?php endif; ?>

    <?php if ($tsQuickViewStatus == true): ?>
        <div class="quick-view-btn-box">
            <?php echo do_shortcode('[woosq id=' . get_the_ID() . ']'); ?>
        </div>
    <?php endif; ?>

</div>
