<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
if (class_exists('redux')) {
    $tsSingleProductBreadCrumb = ts_option('ts_single_product_show_breadcrumb_status');
    $tsSingleProductIconSection = ts_option('ts_single_product_show_icons_status');
    $tsSingleProductRelated = ts_option('ts_single_product_show_related');
}
?>


<!--single product-->
<section class="my-3 single-product">
    <?php if ($tsSingleProductBreadCrumb == true): ?>
    <!--single product nav-->
    <section class="single-product-header my-3">
        <?php
        //breadcrumb section
        woocommerce_breadcrumb();
        ?>
    </section>
    <!--single product nav end-->
    <?php endif; ?>
    <div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
        <div class="row">
            <!--product photos-->
            <div class="col-md-12 col-xl-4">
                    <?php
                    /**
                     * Hook: woocommerce_before_single_product_summary.
                     *
                     * @hooked woocommerce_show_product_sale_flash - 10
                     * @hooked woocommerce_show_product_images - 20
                     */
                    do_action('woocommerce_before_single_product_summary');

                    ?>
            </div>
            <!--product photos end-->

            <!--product details-->
            <?php
            /**
             * @hooked ts_single_product_details
             */
            do_action('tihoshop_woocommerce_single_product_details');

            ?>
            <!--product details end-->

        </div>
    </div>
</section>
<!--single product end-->

<!--<section class="single-product">-->
<!--    <div class="icon-box mt-3 mb-3">-->
<!--        <div class="owl-carousel owl-theme" data-owl-options='{-->
<!--                            "nav": false,-->
<!--                            "dots": false,-->
<!--                            "margin": 20,-->
<!--                            "loop": true,-->
<!--                            "rtl": true,-->
<!--                            "responsive": {-->
<!--                                "0": {-->
<!--                                    "items": 1-->
<!--                                },-->
<!--                                "480": {-->
<!--                                    "items": 1-->
<!--                                },-->
<!--                                "576": {-->
<!--                                    "items": 3-->
<!--                                },-->
<!--                                "768": {-->
<!--                                    "items": 3-->
<!--                                },-->
<!--                                "992": {-->
<!--                                    "items": 3-->
<!--                                },-->
<!--                                "1200": {-->
<!--                                    "items": 4-->
<!--                                }-->
<!--                            }-->
<!--                        }'>-->
<!--            <div class="item">-->
<!--                <div class="icon-box icon-left">-->
<!--                    <div class="icon">-->
<!--                        <i class="fi fi-rr-truck-loading color-gray"></i>-->
<!--                    </div>-->
<!--                    <div class="icon-box-details">-->
<!--                        <h4 class="icon-box-title color-gray"><a href="#">امکان تحویل اکسپرس</a></h4>-->
<!--                        <p class="icon-box-subtitle">برای تمامی سفارش ها</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="item">-->
<!--                <div class="icon-box icon-left">-->
<!--                    <div class="icon">-->
<!--                        <i class="fi fi-rr-time-twenty-four color-gray"></i>-->
<!--                    </div>-->
<!--                    <div class="icon-box-details">-->
<!--                        <h4 class="icon-box-title color-gray"><a href="#">پشتیبانی 24 ساعته</a></h4>-->
<!--                        <p class="icon-box-subtitle">سرویس آنلاین برای مشتریان</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="item">-->
<!--                <div class="icon-box icon-left">-->
<!--                    <div class="icon">-->
<!--                        <i class="fi fi-rr-credit-card color-gray"></i>-->
<!--                    </div>-->
<!--                    <div class="icon-box-details">-->
<!--                        <h4 class="icon-box-title color-gray"><a href="#">امکان پرداخت در محل</a></h4>-->
<!--                        <p class="icon-box-subtitle">امکان پرداخت درب در منزل</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="item">-->
<!--                <div class="icon-box icon-left">-->
<!--                    <div class="icon">-->
<!--                        <i class="fi fi-rr-shield-check color-gray"></i>-->
<!--                    </div>-->
<!--                    <div class="icon-box-details">-->
<!--                        <h4 class="icon-box-title color-gray"><a href="#">ضمانت اصالت کالا</a></h4>-->
<!--                        <p class="icon-box-subtitle">ما اصلات کالا ها را تضمین میکنیم</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->


<?php

if ($tsSingleProductIconSection == true) {
    get_template_part('includes/elementor/ts_single_product_icons');
}

?>


<!--product tabs-->
<section class="my-3">
    <div class="row">
        <div class="col-lg-12">

            <?php do_action('tihoshop_woocommerce_after_single_product_summary'); ?>

        </div>
    </div>
</section>
<!--product tabs end-->

<?php if ($tsSingleProductRelated == true): ?>
<!--related products-->
<section class="my-3 single-product">
    <div class="title-box">
        <div class="title-wrapper">
            <h3 class="title title-line">
                <i class="fi fi-rr-layout-fluid align-middle line-height-0"></i>
                محصولات مشابه
            </h3>
        </div>
    </div>
    <?php do_action('tihoshop_woocommerce_after_single_product_related'); ?>
</section>
<!--related products end-->

<?php endif; ?>


