<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
//Theme Version
define( 'TIHOSHOP_VERSION', '1.0.0' );
define( 'TIHOSHOP_TEXT_DOMAIN', 'tihoshop' );

function ts_setup_theme() {
    /**
     * Set up theme support.
     *
     * @return void
     */
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_image_size('post', '267', '267');
    add_theme_support(
        'html5',
        [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ]
    );
    /*
 * Editor Style.
 */
    add_editor_style( 'classic-editor.css' );

    /*
     * Gutenberg wide images.
     */
    add_theme_support( 'align-wide' );

    // WooCommerce in general.
    add_theme_support( 'woocommerce' );
    // Enabling WooCommerce product gallery features (are off by default since WC 3.0.0).
    // zoom.
    add_theme_support( 'wc-product-gallery-zoom' );
    // swipe.
    add_theme_support( 'wc-product-gallery-slider' );

}

add_action('after_setup_theme', 'ts_setup_theme');

function ts_register_theme_styles() {
    //Register Css Files
    wp_enqueue_style('ts-style', get_stylesheet_uri(), array(), TIHOSHOP_VERSION, 'all');
    wp_enqueue_style('ts-owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), TIHOSHOP_VERSION, 'all');
    wp_enqueue_style('flat-icon-ui' , get_template_directory_uri() . '/assets/css/uicons-regular-rounded/css/uicons-regular-rounded.css' , array() , TIHOSHOP_VERSION , 'all');
}

//admin styles
add_action( 'admin_enqueue_scripts', 'load_admin_style' );
function load_admin_style() {
    wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/includes/admin-style/admin-style.css', false, TIHOSHOP_VERSION , 'all' );
    wp_enqueue_style( 'admin_font_icons', get_template_directory_uri() . '/includes/admin-style/fonawesomeall.css', false, TIHOSHOP_VERSION , 'all' );
}

add_action('wp_enqueue_scripts', 'ts_register_theme_styles');

function ts_register_theme_scripts() {
    //Adding JS Files
    wp_enqueue_script('ts-jquery', get_template_directory_uri() . '/assets/js/jquery-3.7.0.min.js', array(), TIHOSHOP_VERSION);
    wp_enqueue_script('ts-bootstrap-bundle', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('ts-jquery'), TIHOSHOP_VERSION, true);
    wp_enqueue_script('ts-owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('ts-jquery'), TIHOSHOP_VERSION, true);
    wp_enqueue_script('ts-sweet-alert', get_template_directory_uri() . '/assets/js/sweetalert.min.js', array('ts-jquery'), TIHOSHOP_VERSION, true);
    wp_enqueue_script('ts-jquery-ui', get_template_directory_uri() . '/assets/js/jquery-ui.min.js', array('ts-jquery'), TIHOSHOP_VERSION, true);
    wp_enqueue_script('ts-main-js', get_template_directory_uri() . '/assets/js/theme.js', array('ts-jquery'), TIHOSHOP_VERSION, true);
}

add_action('wp_enqueue_scripts', 'ts_register_theme_scripts');

//Register Nav Menus
function tihoshop_register_menus() {
    register_nav_menus(
        array(
            'main-menu' => __('منوی اصلی وب سایت'),
            'categories-menu' => __('منوی دسته بندی ها')
        )
    );
}

add_action( 'admin_menu', 'remove_redux_menu',50 );
function remove_redux_menu() {
    remove_submenu_page('options-general.php','redux-framework');
}

add_action('init', 'tihoshop_register_menus');

//Custom Post Types
require_once 'includes/ts-custom-post-types.php';

//Custom Post Types Taxonomy
require_once 'includes/ts-custom-post-types-tax.php';

//Custom Meta Boxes
require_once 'includes/ts-custom-metabox.php';


//Register Widgets
function tihoshop_register_widgets() {
    register_sidebar( array(
        'name'          => __( 'سایدبار وبلاگ'),
        'id'            => 'ts-blog-sidebar',
        'description'   => __( 'ابزارک هایی که در این ناحیه قرار میگیرند در صفحه ی وبلاگ به نمایش در می آیند.'),
        'before_widget' => '<div class="br-1 box-shadowed mb-3">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="title-box"><div class="title-wrapper"><h3 class="title title-line">',
        'after_title'   => '</h3></div></div>',
    ) );
}
add_action('widgets_init' , 'tihoshop_register_widgets');


//shop sidebar

/**
 * Add a sidebar.
 */
function ts_shop_sidebar() {
    register_sidebar( array(
        'name'          => __( 'سایدبار فروشگاه', 'tihoshop' ),
        'id'            => 'ts-shop-sidebar',
        'before_widget' => '<div class="sidebar-widget mb-3">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'ts_shop_sidebar' );

/**
 * Add a parent CSS class for nav menu items.
 *
 * @param array $items The menu items, sorted by each menu item's menu order.
 * @return array (maybe) modified parent CSS class.
 */
function tihoshop_add_menu_parent_class($items) {
    $parents = array();

    // Collect menu items with parents.
    foreach ($items as $item) {
        if ($item->menu_item_parent && $item->menu_item_parent > 0) {
            $parents[] = $item->menu_item_parent;
        }
    }

    // Add class.
    foreach ($items as $item) {
        if (in_array($item->ID, $parents)) {
            $item->classes[] = 'item-with-submenu';
        }
    }
    return $items;
}

add_filter('wp_nav_menu_objects', 'tihoshop_add_menu_parent_class');

//custom functions
require_once 'includes/ts-custom-functions.php';

//customize woocommerce hooks
require_once 'includes/wc-template-hooks.php';

//theme settings
require_once 'includes/ts-options.php';

//custom style
require_once 'includes/ts-custom-style.php';

//custom js
require_once 'includes/ts-custom-js.php';

//settings
require_once 'includes/ts-settings.php';

//woocommerce tihoshop functions
require_once 'includes/woocommerce-functions.php';


