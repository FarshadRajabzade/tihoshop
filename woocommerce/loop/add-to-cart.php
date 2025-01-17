<?php
/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if (class_exists('redux')) {
    $tsIsCatalogueMode = ts_option('ts_shop_catalogue_mode');
}
global $product;
$title = esc_html( $product->add_to_cart_text() );


if ($tsIsCatalogueMode == false) {
    if ($product->is_in_stock()) {
        echo apply_filters(
            'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
            sprintf(
                "<a href='%s' data-quantity='%s' class='%s' %s data-bs-toggle='tooltip'
           data-bs-placement='top'
           title='$title'>%s</a>",
                esc_url( $product->add_to_cart_url() ),
                esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
                esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
                isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
                '<i class="fi fi-rr-shopping-cart-add add-to-cart-footer-btn ml-3"></i>'

            ),
            $product,
            $args
        );
    }else {
        echo apply_filters(
            'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
            sprintf(
                "<a href='%s' data-quantity='%s' class='%s' %s data-bs-toggle='tooltip'
           data-bs-placement='top'
           title='$title'>%s</a>",
                esc_url( $product->add_to_cart_url() ),
                esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
                esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
                isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
                '<i class="fi fi-rr-info add-to-cart-footer-btn"></i>'

            ),
            $product,
            $args
        );
    }
}else {
    ?>
    <a href="<?php echo $product->get_permalink();  ?>" class="button wp-element-button product_type_variable add_to_cart_button" aria-label="مشاهده محصول" rel="nofollow" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title=" مشاهده محصول">
        <i class="fi fi-rr-shopping-cart-add add-to-cart-footer-btn ml-3"></i>
    </a>
<?php
}

