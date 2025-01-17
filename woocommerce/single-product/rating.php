<?php
/**
 * Single Product Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/rating.php.
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

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

global $product;

if (!wc_review_ratings_enabled()) {
    return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average = $product->get_average_rating();

if (class_exists('redux')) {
    $tsSingleProductCommentCounter = ts_option('ts_single_product_show_comments_counter_status');
    $tsSingleProductStarReviews = ts_option('ts_single_product_show_star_reviews');
}

?>
<div class="product_rating">
    <?php if ($tsSingleProductStarReviews == true): ?>
        <?php if ($rating_count > 0) : ?>
            <a href="#tab-title-reviews" class="d-flex align-content-center" data-bs-toggle="tooltip"
               data-bs-placement="top" title="امتیاز این محصول">
                <i class="fi fi-rr-star align-middle line-height-1 review"></i>
                <?php echo $product->get_average_rating();; // WPCS: XSS ok. ?>
            </a>
        <?php endif; ?>
    <?php endif; ?>


    <?php if ($tsSingleProductCommentCounter == true): ?>
        <?php if (comments_open()) : ?>
            <?php //phpcs:disable ?>
            <a href="#tab-title-reviews" class="d-flex align-content-center" data-bs-toggle="tooltip"
               data-bs-placement="top" title="نظرات">
                <i class="fi fi-rr-comment align-middle line-height-1"></i>
                <?php echo get_comments_number(get_the_ID()); ?>
                دیدگاه
            </a>
            <?php // phpcs:enable ?>
        <?php endif ?>
    <?php endif ?>
</div>
