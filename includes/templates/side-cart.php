
<!--Side Cart-->
<div class="side-cart">
    <div class="canvas-overlay"></div>
    <div class="side-cart-header">
        <div class="cart-icon-box">
            <div class="icon">
                <i class="bi bi-handbag"></i>
            </div>
            <div class="details me-2">
                <h4 class="side-cart-title">سبد خرید</h4>
                <p class="side-cart-items-count">
                    <?php echo WC()->cart->get_cart_contents_count(); ?>
                    محصول
                </p>
            </div>
        </div>
        <div class="close-cart">
            <i class="bi bi-x-lg"></i>
        </div>
    </div>
    <div class="side-cart-content">
        <ul>
            <?php
            foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

                if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
                    $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                    ?>
                    <li>
                        <div class="ts-cart-item">
                            <figure class="product-main">
                                <?php
                                $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);

                                if (!$product_permalink) {
                                    echo $thumbnail; // PHPCS: XSS ok.
                                } else {
                                    printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail); // PHPCS: XSS ok.
                                }
                                ?>

                            </figure>
                            <div class="product-details">
                                <div class="product-title">
                                    <h3>
                                        <?php
                                        if (!$product_permalink) {
                                            echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;');
                                        } else {
                                            echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
                                        }
                                        ?>
                                    </h3>
                                </div>
                                <div class="cart-item-price">
                                    <ins class="new-price">
                                        <?php
                                        echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                                        ?>
                                    </ins>
                                    <p>
                                        تعداد:
                                        <?php echo $cart_item['quantity'] ?>
                                        عدد
                                    </p>
                                </div>
                            </div>
                            <div class="delete-item">
                                <?php
                                echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                    'woocommerce_cart_item_remove_link',
                                    sprintf(
                                        '<a href="%s" class="" aria-label="%s" data-product_id="%s" data-product_sku="%s">
                                                    <i class="bi bi-x-square"></i>
                                                </a>',
                                        esc_url(wc_get_cart_remove_url($cart_item_key)),
                                        esc_html__('Remove this item', 'woocommerce'),
                                        esc_attr($product_id),
                                        esc_attr($_product->get_sku())
                                    ),
                                    $cart_item_key
                                );
                                ?>
                            </div>
                        </div>
                    </li>
                    <?php
                }
            }
            ?>

        </ul>
    </div>
    <div class="side-cart-footer">
        <div class="subtotal">
            <p>مجموع</p>
            <p class="color-default"><?php wc_cart_totals_subtotal_html(); ?></p>
        </div>
        <div class="side-cart-actions">
            <a class="btn btn-default-outline" href="<?php echo wc_get_cart_url() ?>">سبد خرید</a>
            <a class="btn btn-default-outline" href="<?php echo wc_get_checkout_url() ?>">تسویه حساب</a>
        </div>
    </div>
</div>
<!--Side Cart End-->
