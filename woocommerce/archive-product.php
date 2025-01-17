<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */
defined('ABSPATH') || exit;

get_header('shop');

if (class_exists('Redux')) {
    $shopPageBreadCrumbStatus = ts_option('ts_page_breadcrumb_status');
    $shopPageCatDescLoc = ts_option('ts_shop_category_desc_location');
    $shopPageColumnSelection = ts_option('ts_shop_page_column_selection');
}

?>


    <div class="shop woocommerce my-3">


            <?php if ($shopPageBreadCrumbStatus == true): ?>
                <div class="page-title shop-title d-flex flex-column mb-3">
                    <?php
                        ts_the_breadcrumb();
                    ?>
                </div>
            <?php endif; ?>
            <div class="row">
                <?php do_action('tihoshop_woocommerce_output_all_notices'); ?>
                <?php if ($shopPageCatDescLoc == 'before' && is_product_category()): ?>
                    <!--Cat Desc-->
                    <div class=" my-3">
                        <?php
                        /**
                         * Hook: woocommerce_archive_description.
                         *
                         * @hooked woocommerce_taxonomy_archive_description - 10
                         * @hooked woocommerce_product_archive_description - 10
                         */
                        do_action('woocommerce_archive_description');
                        ?>
                    </div>
                    <!--Cat Desc End-->
                <?php endif; ?>

                <?php

                /**
                 * Hook: woocommerce_sidebar.
                 *
                 * @hooked woocommerce_get_sidebar - 10
                 */
                do_action('woocommerce_sidebar');

                ?>
                <div class="canvas-overlay"></div>
                <?php
                if (is_active_sidebar('ts-shop-sidebar')) { ?>

                <div class="col-lg-9">

                    <?php
                    }
                    ?>
                    <nav class="shop-nav">
                        <div class="shop-nav-left show-in-mobile">
                            <div class="shop-filter-btn ">
                                <i class="bi bi-funnel"></i>
                                فیلتر ها
                            </div>
                        </div>
                        <header class="woocommerce-products-header">

                            <?php if ($shopPageColumnSelection == true): ?>
                                <!--Columns-->
                                <div class="d-flex align-items-center justify-content-between">

                                    <a id="ts-4-columns" class="ts-columns active" role="button" rel="nofollow">
                                        <svg version="1.1" id="shop-view-column-4"
                                             xmlns="http://www.w3.org/2000/svg"
                                             x="0px" y="0px" width="19px" height="19px" viewBox="0 0 19 19"
                                             enable-background="new 0 0 19 19" xml:space="preserve">
                                            <rect width="4" height="4"></rect>
                                            <rect x="5" width="4" height="4"></rect>
                                            <rect x="10" width="4" height="4"></rect>
                                            <rect x="15" width="4" height="4"></rect>
                                            <rect y="5" width="4" height="4"></rect>
                                            <rect x="5" y="5" width="4" height="4"></rect>
                                            <rect x="10" y="5" width="4" height="4"></rect>
                                            <rect x="15" y="5" width="4" height="4"></rect>
                                            <rect y="15" width="4" height="4"></rect>
                                            <rect x="5" y="15" width="4" height="4"></rect>
                                            <rect x="10" y="15" width="4" height="4"></rect>
                                            <rect x="15" y="15" width="4" height="4"></rect>
                                            <rect y="10" width="4" height="4"></rect>
                                            <rect x="5" y="10" width="4" height="4"></rect>
                                            <rect x="10" y="10" width="4" height="4"></rect>
                                            <rect x="15" y="10" width="4" height="4"></rect>
</svg>
                                    </a>

                                    <a id="ts-3-columns" class="ts-columns me-2 ms-2" role="button" rel="nofollow">
                                        <svg version="1.1" id="shop-view-column-3"
                                             xmlns="http://www.w3.org/2000/svg"
                                             x="0px" y="0px" width="19px" height="19px" viewBox="0 0 19 19"
                                             enable-background="new 0 0 19 19" xml:space="preserve">
<rect width="5" height="5"></rect>
                                            <rect x="7" width="5" height="5"></rect>
                                            <rect x="14" width="5" height="5"></rect>
                                            <rect y="7" width="5" height="5"></rect>
                                            <rect x="7" y="7" width="5" height="5"></rect>
                                            <rect x="14" y="7" width="5" height="5"></rect>
                                            <rect y="14" width="5" height="5"></rect>
                                            <rect x="7" y="14" width="5" height="5"></rect>
                                            <rect x="14" y="14" width="5" height="5"></rect>
</svg>
                                    </a>

                                    <a id="ts-2-columns" class="ts-columns" role="button" rel="nofollow">
                                        <svg version="1.1" id="shop-view-column-2"
                                             xmlns="http://www.w3.org/2000/svg"
                                             x="0px" y="0px" width="19px" height="19px" viewBox="0 0 19 19"
                                             enable-background="new 0 0 19 19" xml:space="preserve">
	<path d="M7,2v5H2V2H7 M9,0H0v9h9V0L9,0z"></path>
                                            <path d="M17,2v5h-5V2H17 M19,0h-9v9h9V0L19,0z"></path>
                                            <path d="M7,12v5H2v-5H7 M9,10H0v9h9V10L9,10z"></path>
                                            <path d="M17,12v5h-5v-5H17 M19,10h-9v9h9V10L19,10z"></path>
</svg>
                                    </a>


                                </div>
                                <!--Columns End-->
                            <?php endif; ?>

                        </header>

                        <?php if (woocommerce_product_loop()) {
                            /**
                             * Hook: woocommerce_before_shop_loop.
                             *
                             * @hooked woocommerce_output_all_notices - 10
                             * @hooked woocommerce_result_count - 20
                             * @hooked woocommerce_catalog_ordering - 30
                             */
                            do_action('tihoshop_woocommerce_result_count');
                            do_action('tihoshop_woocommerce_catalog_ordering');

                        }
                        ?>

                    </nav>
                    <?php
                    if (woocommerce_product_loop()) {
                        woocommerce_product_loop_start();

                        if (wc_get_loop_prop('total')) {
                            while (have_posts()) {
                                the_post();

                                /**
                                 * Hook: woocommerce_shop_loop.
                                 */
                                do_action('woocommerce_shop_loop');

                                wc_get_template_part('content', 'product');
                            }
                        }

                        woocommerce_product_loop_end();

                        /**
                         * Hook: woocommerce_after_shop_loop.
                         *
                         * @hooked woocommerce_pagination - 10
                         */
                        do_action('woocommerce_after_shop_loop');
                    } else {
                        /**
                         * Hook: woocommerce_no_products_found.
                         *
                         * @hooked wc_no_products_found - 10
                         */
                        do_action('woocommerce_no_products_found');
                    }

                    /**
                     * Hook: woocommerce_after_main_content.
                     *
                     * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                     */
                    do_action('woocommerce_after_main_content');
                    ?>

                    <?php
                    if (is_active_sidebar('ts-shop-sidebar')) { ?>

                </div>
            <?php if ($shopPageCatDescLoc == 'after' && is_product_category()): ?>
                <!--Cat Desc-->
                <div class=" my-3">
                    <?php
                    /**
                     * Hook: woocommerce_archive_description.
                     *
                     * @hooked woocommerce_taxonomy_archive_description - 10
                     * @hooked woocommerce_product_archive_description - 10
                     */
                    do_action('woocommerce_archive_description');
                    ?>
                </div>
                <!--Cat Desc End-->
            <?php endif; ?>
            <?php
            }
            ?>
            </div>

    </div>
<?php
get_footer('shop');
