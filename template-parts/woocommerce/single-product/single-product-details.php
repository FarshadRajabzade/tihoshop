<?php
if (class_exists('redux')) {
    $tsSingleProductCustomBlockSideBar = ts_option('ts_single_product_custom_blocks_in_sidebar_status');
    $tsSingleProductCustomBlockUnderDesc = ts_option('ts_single_product_custom_blocks_under_short_desc_status');
}
?>

<div class="col-md-12 col-xl-8">
    <?php the_title( '<h1 class="product_title entry-title">', '</h1>' ); ?>
    <div class="row">
        <div class="col-md-12 col-xl-7">
            <div class="single-product-details">
                <?php do_action('woocommerce_single_product_summary'); ?>
            </div>


        </div>
        <div class="col-xl-5">
            <div class="product-info br-1 mb-3 d-flex align-items-center justify-content-center">
                <div class="product-price">
                    <?php
                    get_template_part('woocommerce/single-product/price')
                    ?>
                </div>

            </div>

            <?php if ($tsSingleProductCustomBlockSideBar == true): ?>
            <?php
            get_template_part('/includes/elementor/ts_single_product_sidebar_custom_block')
            ?>
            <?php endif; ?>

            <?php
            get_template_part('template-parts/woocommerce/ts-custom-garanty-sidebar-field')
            ?>

            <?php
            get_template_part('template-parts/woocommerce/ts-custom-sidebar-field')
            ?>

            <?php do_action('tihoshop_woocommerce_single_product_meta'); ?>

            <span class="best-price-question">
                    <a href="#">
                        آیا قیمت مناسب تری سراغ دارید؟
                    <i class="fi fi-rr-bell-ring align-middle color-default"></i>
                    </a>
                </span>
        </div>
    </div>
</div>


