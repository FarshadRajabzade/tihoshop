<?php
/**
 * Plugin Name: WooCommerce
 * Plugin URI: https://woocommerce.com/
 * Description: An ecommerce toolkit that helps you sell anything. Beautifully.
 * Version: 8.9.1
 * Author: Automattic
 * Author URI: https://woocommerce.com
 * Text Domain: woocommerce
 * Domain Path: /i18n/languages/
 * Requires at least: 6.4
 * Requires PHP: 7.4
 *
 * @package WooCommerce
 */

if (is_singular('product')){
        get_template_part('template-parts/woocommerce/single-product');
}else {
        get_template_part('woocommerce/archive-product');
}





