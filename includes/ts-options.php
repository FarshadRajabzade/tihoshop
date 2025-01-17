<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

defined('ABSPATH') || exit;

if (!class_exists('Redux')) {
    return;
}

// This is your option name where all the Redux data is stored.
$opt_name = 'ts_opt';  // YOU MUST CHANGE THIS.  DO NOT USE 'redux_demo' IN YOUR PROJECT!!!

// Uncomment to disable demo mode.
// Redux::disable_demo();   // phpcs:ignore Squiz.PHP.CommentedOutCode

$dir = dirname(__FILE__) . DIRECTORY_SEPARATOR;

/*
 * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
 */


// Background Patterns Reader.
$sample_patterns_path = Redux_Core::$dir . '../sample/patterns/';
$sample_patterns_url = Redux_Core::$url . '../sample/patterns/';
$sample_patterns = array();

if (is_dir($sample_patterns_path)) {
    $sample_patterns_dir = opendir($sample_patterns_path);

    if ($sample_patterns_dir) {

        // phpcs:ignore WordPress.CodeAnalysis.AssignmentInCondition
        while (false !== ($sample_patterns_file = readdir($sample_patterns_dir))) {
            if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                $name = explode('.', $sample_patterns_file);
                $name = str_replace('.' . end($name), '', $sample_patterns_file);
                $sample_patterns[] = array(
                    'alt' => $name,
                    'img' => $sample_patterns_url . $sample_patterns_file,
                );
            }
        }
    }
}

// Used to except HTML tags in description arguments where esc_html would remove.
$kses_exceptions = array(
    'a' => array(
        'href' => array(),
    ),
    'strong' => array(),
    'br' => array(),
    'code' => array(),
);

/*
 * ---> BEGIN ARGUMENTS
 */

/**
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://devs.redux.io/core/arguments/
 */
$theme = wp_get_theme(); // For use with some settings. Not necessary.

// TYPICAL -> Change these values as you need/desire.
$args = array(
    'opt_name' => $opt_name,
    'display_name' => $theme->get('Name'),
    'display_version' => $theme->get('Version'),
    'menu_type' => 'menu',
    'allow_sub_menu' => true,
    'menu_title' => esc_html__('تیهو شاپ', TIHOSHOP_TEXT_DOMAIN),
    'page_title' => esc_html__('تیهو شاپ', TIHOSHOP_TEXT_DOMAIN),
    'disable_google_fonts_link' => false,
    'admin_bar' => true,
    'admin_bar_icon' => 'dashicons-portfolio',
    'admin_bar_priority' => 50,
    'global_variable' => $opt_name,
    'dev_mode' => false,
    'customizer' => true,
    'open_expanded' => false,
    'disable_save_warn' => false,
    'page_priority' => 90,
    'page_parent' => 'themes.php',
    'page_permissions' => 'manage_options',
    'menu_icon' => '',
    'last_tab' => '',
    'page_icon' => 'icon-themes',
    'page_slug' => $opt_name,
    'save_defaults' => true,
    'default_show' => false,
    'default_mark' => '*',
    'show_import_export' => true,
    'transient_time' => 60 * MINUTE_IN_SECONDS,
    'output' => true,
    'output_tag' => true,
    'footer_credit' => '',
    'use_cdn' => true,
    'admin_theme' => 'wp',
    'flyout_submenus' => true,
    'font_display' => 'swap',
    'hints' => array(
        'icon' => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color' => 'lightgray',
        'icon_size' => 'normal',
        'tip_style' => array(
            'color' => 'red',
            'shadow' => true,
            'rounded' => false,
            'style' => '',
        ),
        'tip_position' => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect' => array(
            'show' => array(
                'effect' => 'slide',
                'duration' => '500',
                'event' => 'mouseover',
            ),
            'hide' => array(
                'effect' => 'slide',
                'duration' => '500',
                'event' => 'click mouseleave',
            ),
        ),
    ),
    'database' => '',
    'network_admin' => true,
    'search' => false,
);

/*adding persian fonts array*/
$ts_fonts = array(
    'iranYekanXFaNum' => 'IRANYekanXFaNum',
);

// Panel Intro text -> before the form.
if (!isset($args['global_variable']) || false !== $args['global_variable']) {
    if (!empty($args['global_variable'])) {
        $v = $args['global_variable'];
    } else {
        $v = str_replace('-', '_', $args['opt_name']);
    }
}


Redux::set_args($opt_name, $args);

/*
 * ---> END ARGUMENTS
 */

/*
 * ---> START SECTIONS
 */


// -> START Basic Fields

# Header Settings
Redux::setSection($opt_name, array(
    'title' => esc_html__('سربرگ', TIHOSHOP_TEXT_DOMAIN),
    'id' => 'header',
    'icon' => 'fal fa-file-alt'
));

// header general
Redux::setSection($opt_name, array(
    'title' => esc_html__('طرح بندی سربرگ', TIHOSHOP_TEXT_DOMAIN),
    'id' => 'branding',
    'subsection' => true,
    'fields' => array(

        /* elementor header start */
        array(
            'id' => 'ts_header_type',
            'type' => 'select',
            'title' => esc_html__('نوع هدر', TIHOSHOP_TEXT_DOMAIN),
            'subtitle' => esc_html__('نوع هدر میتواند پیشفرض قالب یا هدر طراحی شده با المنتور باشد', TIHOSHOP_TEXT_DOMAIN),
            'default' => 'default',
            'options' => array(
                'default' => esc_html__('پیشفرض', TIHOSHOP_TEXT_DOMAIN),
                'elementor' => esc_html__('صفحه ساز (المنتور)', TIHOSHOP_TEXT_DOMAIN)
            ),
            'select2' => array('allowClear' => false)
        ),
        array(
            'id' => 'header_page_id',
            'type' => 'select',
            'multi' => false,
            'data' => 'posts',
            'args' => array('post_type' => array('ts_header'), 'numberposts' => -1),
            'title' => esc_html__('هدر', TIHOSHOP_TEXT_DOMAIN),
            'subtitle' => esc_html__('برای افزودن هدر به منوی "پنل تنظیمات ==> هدر ساز" مراجعه کنید', TIHOSHOP_TEXT_DOMAIN),
            'required' => array('ts_header_type', '=', 'elementor'),
        ),
        /* elementor header end */

        array(
            'id' => 'custom_logo_image',
            'type' => 'media',
            'desc' => esc_html__('بارگذاری تصویر: png, jpg or gif file', TIHOSHOP_TEXT_DOMAIN),
            'operator' => 'and',
            'required' => array('ts_header_type', '=', 'default'),
            'title' => esc_html__('تصویر لوگو', TIHOSHOP_TEXT_DOMAIN),
        ),
        array(
            'id' => 'logo_img_width',
            'type' => 'slider',
            'title' => esc_html__('حداکثر عرض لوگو (px)', TIHOSHOP_TEXT_DOMAIN),
            'desc' => esc_html__('حداکثر عرض لوگو در سربرگ را برحسب پیکسل انتخاب کنید.', TIHOSHOP_TEXT_DOMAIN),
            "default" => 200,
            "min" => 50,
            "step" => 1,
            "max" => 600,
            'display_value' => 'label',
            'required' => array('ts_header_type', '=', 'default'),
            'tags' => 'logo width logo size'
        ),
        array(
            'id' => 'show_categories_menu',
            'type' => 'switch',
            'title' => esc_html__('نمایش منوی دسته بندی', TIHOSHOP_TEXT_DOMAIN),
            'default' => true,
            'required' => array('ts_header_type', '=', 'default')

        ),
        array(
            'id' => 'show_profile_icon',
            'type' => 'switch',
            'title' => esc_html__('نمایش دکمه عضویت / ورود', TIHOSHOP_TEXT_DOMAIN),
            'subtitle' => esc_html__('این دکمه زمانی که کاربر وارد وب سایت شود به پروفایل تغییر میکند', TIHOSHOP_TEXT_DOMAIN),
            'default' => true,
            'required' => array('ts_header_type', '=', 'default')

        ),
        array(
            'id' => 'show_cart_icon',
            'type' => 'switch',
            'title' => esc_html__('نمایش دکمه سبد خرید در سربرگ', TIHOSHOP_TEXT_DOMAIN),
            'default' => true,
            'required' => array('ts_header_type', '=', 'default')
        ),
        array(
            'id' => 'fixed_header',
            'type' => 'switch',
            'title' => esc_html__('سربرگ چسبان', TIHOSHOP_TEXT_DOMAIN),
            'default' => false,
        ),

    ),
));

// top nav
Redux::setSection($opt_name, array(
    'title' => esc_html__('نوار بالا', TIHOSHOP_TEXT_DOMAIN),
    'id' => 'top_bar_nav',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'ts_top_bar',
            'type' => 'switch',
            'title' => esc_html__('نمایش نوار بالا', TIHOSHOP_TEXT_DOMAIN),
            'default' => true,
        ),
        array(
            'id' => 'header_top_right_text',
            'type' => 'editor',
            'title' => esc_html__('متن نوار بالا (سمت راست)', TIHOSHOP_TEXT_DOMAIN),
            'default' => 'به فروشگاه آنلاین تیهو شاپ خوش آمدید',
            'required' => array('ts_top_bar', '=', true),
            'args' => array(
                'wpautop' => false,
                'media_buttons' => false,
                'textarea_rows' => 5,
                'teeny' => false,
                'quicktags' => false,
            ),
        ),
        array(
            'id' => 'header_top_left_text',
            'type' => 'editor',
            'title' => esc_html__('متن نوار بالا (سمت چپ)', TIHOSHOP_TEXT_DOMAIN),
            'default' => 'info@tihoshop.com',
            'required' => array('ts_top_bar', '=', true),
            'args' => array(
                'wpautop' => false,
                'media_buttons' => false,
                'textarea_rows' => 5,
                'teeny' => false,
                'quicktags' => false,
            ),
        ),
    )
));

// top info bar
Redux::setSection($opt_name, array(
    'title' => esc_html__('نوار اطلاعیه بالای سایت', TIHOSHOP_TEXT_DOMAIN),
    'id' => 'top_info_bar',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'ts_top_info_bar',
            'type' => 'switch',
            'title' => esc_html__('نمایش اطلاعیه', TIHOSHOP_TEXT_DOMAIN),
            'default' => false,
        ),
        array(
            'id' => 'ts_top_info_content',
            'type' => 'select',
            'data' => 'posts',
            'multi' => false,
            'args' => array('post_type' => array('ts_info_bar'), 'numberposts' => -1),
            'title' => esc_html__('اطلاعیه', TIHOSHOP_TEXT_DOMAIN),
            'subtitle' => esc_html__('برای افزودن اطلاعیه جدید به منوی "پنل تنظیمات ==> اطلاعیه ساز" مراجعه کنید', TIHOSHOP_TEXT_DOMAIN),
            'required' => array('ts_top_info_bar', '=', true),
        )
    )
));

// mobile bottom navbar
Redux::setSection($opt_name, array(
    'title' => esc_html('ناوبری پایین موبایل', TIHOSHOP_TEXT_DOMAIN),
    'id' => 'mobile_navbar',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'ts_mobile_navbar_status',
            'title' => esc_html('وضعیت نوار ناوبری', TIHOSHOP_TEXT_DOMAIN),
            'subtitle' => esc_html('نوار ابزار ناوبری ثابت در پایین دستگاه های تلفن همراه نشان داده می شود.', TIHOSHOP_TEXT_DOMAIN),
            'type' => 'switch',
            'default' => true
        ),

        array(
            'id' => 'ts_mobile_navbar_section_1',
            'type' => 'section',
            'title' => esc_html__('دکمه 1', TIHOSHOP_TEXT_DOMAIN),
            'indent' => true,
            'required' => array('ts_mobile_navbar_status', '=', true),
            'default' => false
        ),
        array(
            'id' => 'ts_mobile_navbar_btn_1_status',
            'title' => esc_html('وضعیت دکمه', TIHOSHOP_TEXT_DOMAIN),
            'type' => 'switch',
            'default' => false,

        ),
        array(
            'id' => 'ts_mobile_navbar_btn_1_text',
            'type' => 'text',
            'title' => esc_html__('عنوان دکمه', TIHOSHOP_TEXT_DOMAIN),
            'required' => array('ts_mobile_navbar_btn_1_status', '=', true)
        ),

        array(
            'id' => 'ts_mobile_navbar_btn_1_link',
            'type' => 'text',
            'title' => esc_html__('لینک دکمه', TIHOSHOP_TEXT_DOMAIN),
            'required' => array('ts_mobile_navbar_btn_1_status', '=', true)

        ),

        array(
            'id' => 'ts_mobile_navbar_btn_1_icon',
            'type' => 'media',
            'title' => esc_html__('آپلود آیکون', TIHOSHOP_TEXT_DOMAIN),
            'url' => false,
            'preview' => true,
            'subtitle' => esc_html('پیشنهاد میشود از سایز 50x50 استفاده کنید'),
            'required' => array('ts_mobile_navbar_btn_1_status', '=', true)

        ),

        array(
            'id' => 'ts_mobile_navbar_section_end',
            'type' => 'section',
            'indent' => false,
        ),

        array(
            'id' => 'ts_mobile_navbar_section_2',
            'type' => 'section',
            'title' => esc_html__('دکمه 2', TIHOSHOP_TEXT_DOMAIN),
            'indent' => true,
            'required' => array('ts_mobile_navbar_status', '=', true)

        ),

        array(
            'id' => 'ts_mobile_navbar_btn_2_status',
            'title' => esc_html('وضعیت دکمه', TIHOSHOP_TEXT_DOMAIN),
            'type' => 'switch',
            'default' => false,
        ),

        array(
            'id' => 'ts_mobile_navbar_btn_2_text',
            'type' => 'text',
            'title' => esc_html__('عنوان دکمه', TIHOSHOP_TEXT_DOMAIN),
            'required' => array('ts_mobile_navbar_btn_2_status', '=', true)

        ),

        array(
            'id' => 'ts_mobile_navbar_btn_2_link',
            'type' => 'text',
            'title' => esc_html__('لینک دکمه', TIHOSHOP_TEXT_DOMAIN),
            'required' => array('ts_mobile_navbar_btn_2_status', '=', true)

        ),

        array(
            'id' => 'ts_mobile_navbar_btn_2_icon',
            'type' => 'media',
            'title' => esc_html__('آپلود آیکون', TIHOSHOP_TEXT_DOMAIN),
            'url' => false,
            'subtitle' => esc_html('پیشنهاد میشود از سایز 50x50 استفاده کنید'),
            'preview' => true,
            'required' => array('ts_mobile_navbar_btn_2_status', '=', true)

        ),

        array(
            'id' => 'ts_mobile_navbar_section_2_end',
            'type' => 'section',
            'indent' => false,
        ),

        array(
            'id' => 'ts_mobile_navbar_section_3',
            'type' => 'section',
            'title' => esc_html__('دکمه 3', TIHOSHOP_TEXT_DOMAIN),
            'indent' => true,
            'required' => array('ts_mobile_navbar_status', '=', true)

        ),

        array(
            'id' => 'ts_mobile_navbar_btn_3_status',
            'title' => esc_html('وضعیت دکمه', TIHOSHOP_TEXT_DOMAIN),
            'type' => 'switch',
            'default' => false,
        ),

        array(
            'id' => 'ts_mobile_navbar_btn_3_text',
            'type' => 'text',
            'title' => esc_html__('عنوان دکمه', TIHOSHOP_TEXT_DOMAIN),
            'required' => array('ts_mobile_navbar_btn_3_status', '=', true)

        ),

        array(
            'id' => 'ts_mobile_navbar_btn_3_link',
            'type' => 'text',
            'title' => esc_html__('لینک دکمه', TIHOSHOP_TEXT_DOMAIN),
            'required' => array('ts_mobile_navbar_btn_3_status', '=', true)

        ),

        array(
            'id' => 'ts_mobile_navbar_btn_3_icon',
            'type' => 'media',
            'title' => esc_html__('آپلود آیکون', TIHOSHOP_TEXT_DOMAIN),
            'subtitle' => esc_html('پیشنهاد میشود از سایز 50x50 استفاده کنید'),
            'url' => false,
            'preview' => true,
            'required' => array('ts_mobile_navbar_btn_3_status', '=', true)
        ),

        array(
            'id' => 'ts_mobile_navbar_section_3_end',
            'type' => 'section',
            'indent' => false,
        ),

        array(
            'id' => 'ts_mobile_navbar_section_4',
            'type' => 'section',
            'title' => esc_html__('دکمه 4', TIHOSHOP_TEXT_DOMAIN),
            'indent' => true,
            'required' => array('ts_mobile_navbar_status', '=', true)

        ),

        array(
            'id' => 'ts_mobile_navbar_btn_4_status',
            'title' => esc_html('وضعیت دکمه', TIHOSHOP_TEXT_DOMAIN),
            'type' => 'switch',
            'default' => false,
        ),

        array(
            'id' => 'ts_mobile_navbar_btn_4_text',
            'type' => 'text',
            'title' => esc_html__('عنوان دکمه', TIHOSHOP_TEXT_DOMAIN),
            'required' => array('ts_mobile_navbar_btn_4_status', '=', true)

        ),

        array(
            'id' => 'ts_mobile_navbar_btn_4_link',
            'type' => 'text',
            'title' => esc_html__('لینک دکمه', TIHOSHOP_TEXT_DOMAIN),
            'required' => array('ts_mobile_navbar_btn_4_status', '=', true)

        ),

        array(
            'id' => 'ts_mobile_navbar_btn_4_icon',
            'type' => 'media',
            'title' => esc_html__('آپلود آیکون', TIHOSHOP_TEXT_DOMAIN),
            'subtitle' => esc_html('پیشنهاد میشود از سایز 50x50 استفاده کنید'),
            'url' => false,
            'preview' => true,
            'required' => array('ts_mobile_navbar_btn_4_status', '=', true)

        ),

        array(
            'id' => 'ts_mobile_navbar_section_4_end',
            'type' => 'section',
            'indent' => false,
        ),


    )
));

// pages title
Redux::setSection($opt_name, array(
    'title' => esc_html__('عنوان صفحات (مسیر پیمایش)', TIHOSHOP_TEXT_DOMAIN),
    'id' => 'ts_page_breadcrumb',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'ts_page_breadcrumb_status',
            'type' => 'switch',
            'title' => esc_html__('مسیر پیمایش', TIHOSHOP_TEXT_DOMAIN),
            'default' => true,
        )
    )
));

// General Styles Settings
Redux::setSection($opt_name, array(
    'title' => esc_html__('سبک', TIHOSHOP_TEXT_DOMAIN),
    'id' => 'style',
    'icon' => 'fal fa-pencil-alt',
    'fields' => array(
        array(
            'id' => 'ts_body_bg',
            'title' => esc_html('پس زمینه کل سایت'),
            'type' => 'background',
            'output' => '.ts-body',
            'transparent' => false,
            'default' => array(
                'background-color' => '#f8f8f8'
            )
        ),
        array(
            'id' => 'ts_default_color',
            'title' => esc_html('رنگ اصلی'),
            'type' => 'color',
            'transparent' => false,
            'validate' => 'color',
            'default' => '#0d6efd'
        ),
        array(
            'id' => 'ts_default_link_color',
            'title' => esc_html('رنگ هاور لینک ها'),
            'type' => 'color',
            'output' => array(
                'color' => 'a:hover',
                'important' => true
            ),
            'transparent' => false,
            'validate' => 'color',
            'default' => '#0d6efd'
        )
    )
));

// Floating Buttons
Redux::setSection($opt_name, array(
    'title' => esc_html__('دکمه شناور', TIHOSHOP_TEXT_DOMAIN),
    'id' => 'float_btn',
    'icon' => 'fal fa-info-circle',
    'fields' => array(
        array(
            'id' => 'ts_float_btn_status',
            'title' => esc_html('وضعیت دکمه شناور'),
            'type' => 'switch',
            'default' => false
        ),
        array(
            'id' => 'ts_float_btn_icon',
            'type' => 'media',
            'title' => esc_html__('تصویر', TIHOSHOP_TEXT_DOMAIN),
            'url' => false,
            'preview' => true,
            'required' => array('ts_float_btn_status', '=', true)
        ),
        array(
            'id' => 'ts_float_btn_bg',
            'title' => esc_html('رنگ پس زمینه'),
            'type' => 'background',
            'transparent' => false,
            'background-image' => false,
            'background-position' => false,
            'background-attachment' => false,
            'background-size' => false,
            'background-repeat' => false,
            'preview' => false,
            'output' => '.float-btn',
            'default' => '#0d6efd',
            'required' => array('ts_float_btn_status', '=', true)
        ),

        array(
            'id' => 'ts_float_btn_url',
            'title' => esc_html('لینک سفارشی'),
            'type' => 'text',
            'required' => array('ts_float_btn_status', '=', true)
        ),
    )
));

// Typography
Redux::setSection($opt_name, array(
    'title' => esc_html__('تایپوگرافی', TIHOSHOP_TEXT_DOMAIN),
    'id' => 'typography',
    'icon' => 'fal fa-font-case',
    'fields' => array(
        array(
            'id' => 'ts_font_body',
            'type' => 'typography',
            'title' => esc_html__('فونت کلی سایت', TIHOSHOP_TEXT_DOMAIN),
            'compiler' => true,
            'google' => false,
            'font-backup' => false,
            'font-weight' => false,
            'all_styles' => true,
            'text-align' => false,
            //'font-style'     => false,
            'subsets' => false,
            'font-size' => true,
            'line-height' => false,
            'word-spacing' => false,
            'letter-spacing' => false,
            'color' => false,
            'preview' => true,
            'output' => array('body'),
            'units' => 'px',
            'weights' => array(
                '100' => 'Normal 100',
                '200' => 'Normal 200',
                '300' => 'Normal 300',
                '400' => 'Normal 400',
                '500' => 'Normal 500',
                '600' => 'Normal 600',
                '700' => 'Bold 700',
                '800' => 'Bold 800',
                '900' => 'Bold 900',
            ),
            'subtitle' => esc_html__('فونت بدنه سایت را انتخاب کنید.', TIHOSHOP_TEXT_DOMAIN),
            'default' => array(
                'font-size' => '16px',
                'font-family' => 'IRANYekanXFaNum',
                'google' => false,
                'font-backup' => "'MS Sans Serif', Geneva, sans-serif"
            ),
            'fonts' => $ts_fonts
        ),
        array(
            'id' => 'ts_menu_heading',
            'type' => 'typography',
            'title' => esc_html__('فونت منو', TIHOSHOP_TEXT_DOMAIN),
            'compiler' => true,
            'google' => false,
            'font-backup' => false,
            'all_styles' => true,
            'font-weight' => true,
            'font-style' => false,
            'text-align' => false,
            'subsets' => false,
            'font-size' => true,
            'line-height' => false,
            'word-spacing' => false,
            'letter-spacing' => false,
            'color' => false,
            'preview' => true,
            'output' => array('.menu-wrapper .menu li a', '.header-categories-menu a span'),
            'units' => 'px',
            'weights' => array(
                '100' => 'Normal 100',
                '200' => 'Normal 200',
                '300' => 'Normal 300',
                '400' => 'Normal 400',
                '500' => 'Normal 500',
                '600' => 'Normal 600',
                '700' => 'Bold 700',
                '800' => 'Bold 800',
                '900' => 'Bold 900',
            ),
            'subtitle' => esc_html__('', TIHOSHOP_TEXT_DOMAIN),
            'default' => array(
                'font-family' => 'IRANYekanXFaNum',
                'font-weight' => '400',
                'font-size' => '16px',
                'color' => 'rgb(33, 37, 41)'
            ),
            'fonts' => $ts_fonts
        ),
        array(
            'id' => 'ts_submenu_font',
            'type' => 'typography',
            'title' => esc_html__('فونت زیرمنوها', TIHOSHOP_TEXT_DOMAIN),
            'compiler' => false,
            'google' => false,
            'font-backup' => false,
            'all_styles' => true,
            'font-weight' => true,
            'text-align' => false,
            'font-style' => true,
            'subsets' => false,
            'font-size' => true,
            'line-height' => false,
            'word-spacing' => false,
            'letter-spacing' => false,
            'color' => false,
            'preview' => true,
            'weights' => array(
                '100' => 'Normal 100',
                '200' => 'Normal 200',
                '300' => 'Normal 300',
                '400' => 'Normal 400',
                '500' => 'Normal 500',
                '600' => 'Normal 600',
                '700' => 'Bold 700',
                '800' => 'Bold 800',
                '900' => 'Bold 900',
            ),
            'output' => array('.menu-wrapper .menu li .sub-menu li a', '.header-categories-menu .categories-menu .menu li a'),
            'units' => 'px',
            'subtitle' => esc_html__('', TIHOSHOP_TEXT_DOMAIN),
            'default' => array(
                'font-family' => 'IRANYekanXFaNum',
                'font-size' => '16px',
                'font-weight' => '400',
            ),
            'fonts' => $ts_fonts
        ),
        array(
            'id' => 'ts_h1_params',
            'type' => 'typography',
            'title' => esc_html__('H1', TIHOSHOP_TEXT_DOMAIN),
            'compiler' => true,
            'google' => false,
            'font-backup' => false,
            'all_styles' => true,
            'font-weight' => true,
            'font-family' => true,
            'text-align' => false,
            'font-style' => true,
            'subsets' => false,
            'font-size' => true,
            'line-height' => false,
            'word-spacing' => false,
            'letter-spacing' => false,
            'color' => false,
            'preview' => true,
            'weights' => array(
                '100' => 'Normal 100',
                '200' => 'Normal 200',
                '300' => 'Normal 300',
                '400' => 'Normal 400',
                '500' => 'Normal 500',
                '600' => 'Normal 600',
                '700' => 'Bold 700',
                '800' => 'Bold 800',
                '900' => 'Bold 900',
            ),
            'output' => array('h1,.h1'),
            'units' => 'px',
            'default' => array(
                'font-size' => '22px',
                'font-weight' => '700',
                'font-family' => 'IRANYekanXFaNum',
                'google' => false,
            ),
            'fonts' => $ts_fonts
        ),
        array(
            'id' => 'ts_h2_params',
            'type' => 'typography',
            'title' => esc_html__('H2', TIHOSHOP_TEXT_DOMAIN),
            'compiler' => true,
            'google' => false,
            'font-backup' => false,
            'all_styles' => true,
            'font-weight' => true,
            'font-family' => true,
            'text-align' => false,
            'font-style' => true,
            'subsets' => false,
            'font-size' => true,
            'line-height' => false,
            'word-spacing' => false,
            'letter-spacing' => false,
            'color' => false,
            'preview' => true,
            'weights' => array(
                '100' => 'Normal 100',
                '200' => 'Normal 200',
                '300' => 'Normal 300',
                '400' => 'Normal 400',
                '500' => 'Normal 500',
                '600' => 'Normal 600',
                '700' => 'Bold 700',
                '800' => 'Bold 800',
                '900' => 'Bold 900',
            ),
            'output' => array('h2,.h2'),
            'units' => 'px',
            'default' => array(
                'font-size' => '20px',
                'font-weight' => '700',
                'font-family' => 'IRANYekanXFaNum',
                'google' => false,
            ),
            'fonts' => $ts_fonts
        ),
        array(
            'id' => 'ts_h3_params',
            'type' => 'typography',
            'title' => esc_html__('H3', TIHOSHOP_TEXT_DOMAIN),
            'compiler' => true,
            'google' => false,
            'font-backup' => false,
            'all_styles' => true,
            'font-weight' => true,
            'font-family' => true,
            'text-align' => false,
            'font-style' => true,
            'subsets' => false,
            'font-size' => true,
            'line-height' => false,
            'word-spacing' => false,
            'letter-spacing' => false,
            'color' => false,
            'preview' => true,
            'weights' => array(
                '100' => 'Normal 100',
                '200' => 'Normal 200',
                '300' => 'Normal 300',
                '400' => 'Normal 400',
                '500' => 'Normal 500',
                '600' => 'Normal 600',
                '700' => 'Bold 700',
                '800' => 'Bold 800',
                '900' => 'Bold 900',
            ),
            'output' => array('h3,.h3'),
            'units' => 'px',
            'default' => array(
                'font-size' => '18px',
                'font-weight' => '700',
                'font-family' => 'IRANYekanXFaNum',
                'google' => true,
            ),
            'fonts' => $ts_fonts
        ),
        array(
            'id' => 'ts_h4_params',
            'type' => 'typography',
            'title' => esc_html__('H4', TIHOSHOP_TEXT_DOMAIN),
            'compiler' => true,
            'google' => false,
            'font-backup' => false,
            'all_styles' => true,
            'font-weight' => true,
            'font-family' => true,
            'text-align' => false,
            'font-style' => true,
            'subsets' => false,
            'font-size' => true,
            'line-height' => false,
            'word-spacing' => false,
            'letter-spacing' => false,
            'color' => true,
            'preview' => true,
            'weights' => array(
                '100' => 'Normal 100',
                '200' => 'Normal 200',
                '300' => 'Normal 300',
                '400' => 'Normal 400',
                '500' => 'Normal 500',
                '600' => 'Normal 600',
                '700' => 'Bold 700',
                '800' => 'Bold 800',
                '900' => 'Bold 900',
            ),
            'output' => array('h4,.h4'),
            'units' => 'px',
            'default' => array(
                'font-size' => '16px',
                'font-weight' => '700',
                'color' => '#464749',
                'font-family' => 'IRANYekanXFaNum',
                'google' => false,
            ),
            'fonts' => $ts_fonts
        ),
        array(
            'id' => 'ts_h5_params',
            'type' => 'typography',
            'title' => esc_html__('H5', TIHOSHOP_TEXT_DOMAIN),
            'compiler' => true,
            'google' => false,
            'font-backup' => false,
            'all_styles' => true,
            'font-weight' => true,
            'font-family' => true,
            'text-align' => false,
            'font-style' => true,
            'subsets' => false,
            'font-size' => true,
            'line-height' => false,
            'word-spacing' => false,
            'letter-spacing' => false,
            'color' => false,
            'preview' => true,
            'weights' => array(
                '100' => 'Normal 100',
                '200' => 'Normal 200',
                '300' => 'Normal 300',
                '400' => 'Normal 400',
                '500' => 'Normal 500',
                '600' => 'Normal 600',
                '700' => 'Bold 700',
                '800' => 'Bold 800',
                '900' => 'Bold 900',
            ),
            'output' => array('h5,.h5'),
            'units' => 'px',
            'default' => array(
                'font-size' => '14px',
                'font-weight' => '700',
                'font-family' => 'IRANYekanXFaNum',
                'google' => false,
            ),
            'fonts' => $ts_fonts
        ),
        array(
            'id' => 'ts_h6_params',
            'type' => 'typography',
            'title' => esc_html__('H6', TIHOSHOP_TEXT_DOMAIN),
            'compiler' => true,
            'google' => false,
            'font-backup' => false,
            'all_styles' => true,
            'font-weight' => true,
            'font-family' => true,
            'text-align' => false,
            'font-style' => true,
            'subsets' => false,
            'font-size' => true,
            'line-height' => false,
            'word-spacing' => false,
            'letter-spacing' => false,
            'color' => false,
            'preview' => true,
            'weights' => array(
                '100' => 'Normal 100',
                '200' => 'Normal 200',
                '300' => 'Normal 300',
                '400' => 'Normal 400',
                '500' => 'Normal 500',
                '600' => 'Normal 600',
                '700' => 'Bold 700',
                '800' => 'Bold 800',
                '900' => 'Bold 900',
            ),
            'output' => array('h6,.h6'),
            'units' => 'px',
            'default' => array(
                'font-size' => '12px',
                'font-weight' => '700',
                'font-family' => 'IRANYekanXFaNum',
                'google' => true,
            ),
            'fonts' => $ts_fonts
        ),
    )
));

// Blog
Redux::setSection($opt_name, array(
    'title' => esc_html__('وبلاگ', TIHOSHOP_TEXT_DOMAIN),
    'id' => 'blog',
    'icon' => 'fal fa-file-alt'
));

// Blog Archive
Redux::setSection($opt_name, array(
    'id' => 'ts_blog_settings',
    'title' => esc_html('تنظیمات آرشیو وبلاگ'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'ts_blog_style',
            'type' => 'image_select',
            'title' => esc_html__('قالب پیشفرض بلاگ', TIHOSHOP_TEXT_DOMAIN),
            'options' => array(
                'style_1' => array(
                    'alt' => 'blog-1',
                    'img' => get_template_directory_uri() . '/includes/admin-style/img/blog-1.jpg',
                    'class' => 'width-700'
                ),
                'style_2' => array(
                    'alt' => 'blog-2',
                    'img' => get_template_directory_uri() . '/includes/admin-style/img/blog-2.jpg',
                    'class' => 'width-700'
                ),
                'style_3' => array(
                    'alt' => 'blog-3',
                    'img' => get_template_directory_uri() . '/includes/admin-style/img/blog-3.jpg',
                    'class' => 'width-700'
                ),
            ),
            'default' => 'style_1'
        ),
        array(
            'id' => 'ts_blog_show_system',
            'type' => 'button_set',
            'title' => esc_html__('نوع نمایش', TIHOSHOP_TEXT_DOMAIN),
            'options' => array(
                'list' => 'نمایش لیستی',
                'column' => 'نمایش جدولی',
            ),
            'default' => 'column'
        ),
        array(
            'id' => 'ts_blog_archive_title_status',
            'type' => 'switch',
            'title' => esc_html('عنوان', TIHOSHOP_TEXT_DOMAIN),
            'default' => false
        ),
        array(
            'id' => 'ts_blog_archive_title_bg',
            'type' => 'background',
            'default' => array(
                'background-color' => '#00000021'
            ),
            'transparent' => false,
            'title' => esc_html__('استایل عنوان صفحات', TIHOSHOP_TEXT_DOMAIN),
            'required' => array('ts_blog_archive_title_status', '=', true),
            'output' => '.page-title.blog-archive'
        ),
        array(
            'id' => 'ts_blog_archive_color',
            'type' => 'color',
            'default' => '#000',
            'transparent' => false,
            'title' => esc_html__('رنگ متن', TIHOSHOP_TEXT_DOMAIN),
            'subtitle' => esc_html__('پیشفرض #fff', TIHOSHOP_TEXT_DOMAIN),
            'required' => array('ts_blog_archive_title_status', '=', true),
            'output' => array(
                'color' => '.page-title',
                'important' => true,
            ),
            'validate' => 'color',
        ),
        array(
            'id' => 'ts_blog_archive_align',
            'type' => 'select',
            'title' => esc_html('موقعیت متن عنوان', TIHOSHOP_TEXT_DOMAIN),
            'default' => 'align-items-start',
            'options' => array(
                'align-items-start' => 'راست',
                'align-items-center' => 'وسط',
                'align-items-end' => 'چپ',
            ),
            'required' => array('ts_blog_archive_title_status', '=', true)
        ),
        array(
            'id' => 'ts_blog_archive_title_breadcrumb_status',
            'type' => 'switch',
            'default' => true,
            'title' => esc_html('نمایش مسیر'),
            'required' => array('ts_blog_archive_title_status', '=', true)

        ),
        array(
            'id' => 'ts_blog_sidebar_location',
            'type' => 'image_select',
            'title' => esc_html__('موقعیت سایدبار', TIHOSHOP_TEXT_DOMAIN),
            'options' => array(
                'none' => array(
                    'alt' => 'بدون سایدبار',
                    'img' => Redux_Core::$url . 'assets/img/1col.png',
                ),
                'left' => array(
                    'alt' => 'چپ',
                    'img' => Redux_Core::$url . 'assets/img/2cl.png',
                ),
                'right' => array(
                    'alt' => 'راست',
                    'img' => Redux_Core::$url . 'assets/img/2cr.png',
                ),
            ),
            'default' => 'right',
        ),
        array(
            'id' => 'ts_blog_show_meta',
            'title' => esc_html('نمایش متا', TIHOSHOP_TEXT_DOMAIN),
            'type' => 'switch',
            'default' => true
        ),

        array(
            'id' => 'ts_blog_show_comments',
            'title' => esc_html('نمایش تعداد کامنت', TIHOSHOP_TEXT_DOMAIN),
            'type' => 'switch',
            'default' => true,
            'required' => array('ts_blog_style', '=', 'style_1'),
        ),
        array(
            'id' => 'ts_blog_show_desc',
            'title' => esc_html('نمایش خلاصه', TIHOSHOP_TEXT_DOMAIN),
            'type' => 'switch',
            'default' => true,
            'required' => array('ts_blog_style', '=', 'style_1'),
        ),
    )

));

// Single Post
Redux::setSection($opt_name, array(
    'id' => 'ts_single_blog_settings',
    'title' => esc_html('تنظیمات هر نوشته'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'ts_single_blog_sidebar_location',
            'type' => 'image_select',
            'title' => esc_html__('موقعیت سایدبار', TIHOSHOP_TEXT_DOMAIN),
            'options' => array(
                'none' => array(
                    'alt' => 'بدون سایدبار',
                    'img' => Redux_Core::$url . 'assets/img/1col.png',
                ),
                'left' => array(
                    'alt' => 'چپ',
                    'img' => Redux_Core::$url . 'assets/img/2cl.png',
                ),
                'right' => array(
                    'alt' => 'راست',
                    'img' => Redux_Core::$url . 'assets/img/2cr.png',
                ),
            ),
            'default' => 'right',
        ),
        array(
            'id' => 'ts_single_blog_show_comments_count',
            'title' => esc_html('نمایش تعداد کامنت', TIHOSHOP_TEXT_DOMAIN),
            'type' => 'switch',
            'default' => true
        ),

        array(
            'id' => 'ts_single_blog_show_date',
            'title' => esc_html('نمایش تاریخ انتشار', TIHOSHOP_TEXT_DOMAIN),
            'type' => 'switch',
            'default' => true
        ),
        array(
            'id' => 'ts_single_blog_show_cat',
            'title' => esc_html('نمایش دسته بندی', TIHOSHOP_TEXT_DOMAIN),
            'type' => 'switch',
            'default' => true
        ),
        array(
            'id' => 'ts_single_blog_show_tags',
            'title' => esc_html('نمایش برچسب ها', TIHOSHOP_TEXT_DOMAIN),
            'type' => 'switch',
            'default' => true
        ),
        array(
            'id' => 'ts_single_blog_show_comment_sec',
            'title' => esc_html('نمایش کامنت گذاری', TIHOSHOP_TEXT_DOMAIN),
            'type' => 'switch',
            'default' => true
        ),
    )

));

// footer
Redux::setSection($opt_name, array(
    'title' => esc_html__('فوتر', TIHOSHOP_TEXT_DOMAIN),
    'id' => 'footer',
    'icon' => 'fal fa-file',
    'fields' => array(
        array(
            'id' => 'ts_footer_status',
            'type' => 'switch',
            'title' => esc_html('وضعیت فوتر', TIHOSHOP_TEXT_DOMAIN),
            'default' => true
        ),
        array(
            'id' => 'ts_footer_page_id',
            'type' => 'select',
            'multi' => false,
            'data' => 'posts',
            'args' => array('post_type' => array('ts_footer'), 'numberposts' => -1),
            'title' => esc_html__('فوتر', TIHOSHOP_TEXT_DOMAIN),
            'subtitle' => esc_html__('برای افزودن فوتر به منوی "پنل تنظیمات ==> فوتر ساز" مراجعه کنید', TIHOSHOP_TEXT_DOMAIN),
            'required' => array('ts_footer_status', '=', true)
        ),
    ),
));

// shop
Redux::setSection($opt_name, array(
    'id' => 'shop',
    'title' => esc_html('فروشگاه', TIHOSHOP_TEXT_DOMAIN),
    'icon' => 'fal fa-shopping-bag',
));

// Shop General Settings
Redux::setSection($opt_name, array(
    'id' => 'ts_shop_general_settings',
    'subsection' => true,
    'title' => esc_html('تنظیمات عمومی فروشگاه', TIHOSHOP_TEXT_DOMAIN),
    'fields' => array(
        array(
            'id' => 'ts_shop_catalogue_mode',
            'type' => 'switch',
            'title' => esc_html('حالت کاتالوگ', TIHOSHOP_TEXT_DOMAIN),
            'default' => false
        ),
        array(
            'id' => 'ts_empty_cart_text',
            'type' => 'text',
            'title' => esc_html('متن سبد خرید خالی', TIHOSHOP_TEXT_DOMAIN),
            'default' => esc_html('سبد خرید شما خالی است', TIHOSHOP_TEXT_DOMAIN),
        ),
        array(
            'id' => 'ts_show_min_variable_price',
            'type' => 'switch',
            'title' => esc_html('نمایش کمترین قیمت در محصولات متغیر', TIHOSHOP_TEXT_DOMAIN),
            'default' => true
        ),
    )
));

// Shop Labels
Redux::setSection($opt_name, array(
    'id' => 'ts_shop_product_labels',
    'title' => esc_html('برچسب های محصول', TIHOSHOP_TEXT_DOMAIN),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'ts_shop_labels_status',
            'type' => 'switch',
            'title' => esc_html('برچسب تخفیف ها', TIHOSHOP_TEXT_DOMAIN),
            'default' => true
        ),
        array(
            'id' => 'ts_shop_discount_label_color',
            'title' => esc_html('رنگ متن', TIHOSHOP_TEXT_DOMAIN),
            'type' => 'color',
            'transparent' => false,
            'required' => array('ts_shop_labels_status', '=', true),
            'default' => '#fff'
        ),
        array(
            'id' => 'ts_shop_discount_label_bg',
            'type' => 'background',
            'title' => esc_html('پس زمینه', TIHOSHOP_TEXT_DOMAIN),
            'transparent' => false,
            'background-image' => false,
            'background-position' => false,
            'background-attachment' => false,
            'background-size' => false,
            'background-repeat' => false,
            'output' => '.product-labels .discount',
            'preview' => false,
            'required' => array('ts_shop_labels_status', '=', true)
        )
    )
));

// Product Quick View
Redux::setSection($opt_name, array(
    'id' => 'ts_shop_product_quick_view',
    'title' => esc_html('نمایش سریع', TIHOSHOP_TEXT_DOMAIN),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'ts_shop_product_quick_view_status',
            'type' => 'switch',
            'title' => esc_html('نمایش سریع محصول', TIHOSHOP_TEXT_DOMAIN),
            'default' => true
        ),
    )
));

// Product Compare
Redux::setSection($opt_name, array(
    'id' => 'ts_shop_product_compare',
    'title' => esc_html('مقایسه', TIHOSHOP_TEXT_DOMAIN),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'ts_shop_product_compare_status',
            'type' => 'switch',
            'title' => esc_html('مقایسه محصولات', TIHOSHOP_TEXT_DOMAIN),
            'default' => true
        ),
    )
));

// Product Wishlist
Redux::setSection($opt_name, array(
    'id' => 'ts_shop_product_wishlist',
    'title' => esc_html('علاقمندی ها', TIHOSHOP_TEXT_DOMAIN),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'ts_shop_product_wishlist_status',
            'type' => 'switch',
            'title' => esc_html('علاقمندی ها', TIHOSHOP_TEXT_DOMAIN),
            'default' => true
        ),
    )
));

// Profile Menu
Redux::setSection($opt_name, array(
    'id' => 'shop-profile',
    'title' => esc_html('زیر منوی پروفایل کاربری', TIHOSHOP_TEXT_DOMAIN),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'ts_shop_profile_submenu_status',
            'type' => 'switch',
            'title' => esc_html('وضعیت زیرمنوی پروفایل در هدر', TIHOSHOP_TEXT_DOMAIN),
            'default' => true
        ),
        array(
            'id' => 'ts_shop_profile_submenu_type',
            'type' => 'select',
            'title' => esc_html('نوع زیر منو', TIHOSHOP_TEXT_DOMAIN),
            'options' => array(
                'default' => 'پیشفرض',
                'custom_menu' => 'انتخاب منو'
            ),
            'default' => 'default',
            'required' => array('ts_shop_profile_submenu_status', '=', true)
        ),
        array(
            'id' => 'ts_shop_profile_submenu',
            'type' => 'select',
            'title' => esc_html('انتخاب زیر منو از لیست منو ها', TIHOSHOP_TEXT_DOMAIN),
            'data' => 'menus',
            'required' => array('ts_shop_profile_submenu_type', '=', 'custom_menu')
        ),
    )
));

// checkout
Redux::setSection($opt_name, array(
    'id' => 'checkout',
    'title' => esc_html('تسویه حساب', TIHOSHOP_TEXT_DOMAIN),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'ts_shop_checkout_product_image',
            'type' => 'switch',
            'title' => esc_html('نمایش تصویر محصول در لیست سفارشات', TIHOSHOP_TEXT_DOMAIN),
            'default' => true
        ),
        array(
            'id' => 'ts_shop_checkout_subtotal_status',
            'type' => 'switch',
            'title' => esc_html('نمایش جمع جزء', TIHOSHOP_TEXT_DOMAIN),
            'default' => true
        ),
    )
));

// Product Archive
Redux::setSection($opt_name, array(
    'title' => esc_html__('بایگانی محصولات', TIHOSHOP_TEXT_DOMAIN),
    'id' => 'product-archive',
    'icon' => 'fal fa-archive',
));

// shop page styles
Redux::setSection($opt_name, array(
    'id' => 'ts_shop_shop_page_styles',
    'title' => esc_html(' صفحه فروشگاه', TIHOSHOP_TEXT_DOMAIN),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'ts_shop_page_title_status',
            'type' => 'switch',
            'title' => esc_html__('عنوان', TIHOSHOP_TEXT_DOMAIN),
            'default' => true,
        ),
        array(
            'id' => 'ts_order_by_stock_status',
            'type' => 'switch',
            'title' => esc_html__('نمایش کالاهای موجود قبل از ناموجود', TIHOSHOP_TEXT_DOMAIN),
            'default' => true,
        ),
        array(
            'id' => 'ts_shop_page_title_bg',
            'type' => 'background',
            'default' => array(
                'background-color' => '#00000021'
            ),
            'transparent' => false,
            'title' => esc_html__('استایل عنوان صفحات', TIHOSHOP_TEXT_DOMAIN),
            'required' => array('ts_shop_page_title_status', '=', true),
            'output' => '.page-title .shop-title'
        ),
        array(
            'id' => 'ts_shop_page_text_color',
            'type' => 'color',
            'default' => '#000000',
            'transparent' => false,
            'title' => esc_html__('رنگ متن', TIHOSHOP_TEXT_DOMAIN),
            'subtitle' => esc_html__('پیشفرض #fff', TIHOSHOP_TEXT_DOMAIN),
            'required' => array('ts_shop_page_title_status', '=', true),
            'output' => array(
                'color' => '.page-title .shop-title',
                'important' => true,
            ),
            'validate' => 'color',
        ),
        array(
            'id' => 'ts_page_shop_title_align',
            'type' => 'select',
            'title' => esc_html('موقعیت متن عنوان', TIHOSHOP_TEXT_DOMAIN),
            'default' => 'align-items-start',
            'options' => array(
                'align-items-start' => 'راست',
                'align-items-center' => 'وسط',
                'align-items-end' => 'چپ',
            ),
            'required' => array('ts_shop_page_title_status', '=', true)
        ),
        array(
            'id' => 'ts_shop_page_breadcrumb_status',
            'type' => 'switch',
            'default' => true,
            'title' => esc_html('نمایش مسیر'),
            'required' => array('ts_shop_page_title_status', '=', true)

        ),
        array(
            'id' => 'ts_shop_category_desc_location',
            'title' => esc_html('موقعیت توضیحات دسته بندی', TIHOSHOP_TEXT_DOMAIN),
            'type' => 'button_set',
            'options' => array(
                'before' => 'قبل از شبکه محصولات',
                'after' => 'بعد از شبکه محصولات',
            ),
            'default' => 'after'
        ),
        array(
            'id' => 'ts_shop_page_column_selection',
            'type' => 'switch',
            'title' => esc_html__('انتخابگر تعداد ستون', TIHOSHOP_TEXT_DOMAIN),
            'default' => true,
        ),
    )
));

// product card
Redux::setSection($opt_name, array(
    'id' => 'product-cards',
    'title' => esc_html('استایل محصولات'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'ts_product_style',
            'type' => 'image_select',
            'title' => esc_html__('قالب پیشفرض محصولات', TIHOSHOP_TEXT_DOMAIN),
            'options' => array(
                'default' => array(
                    'alt' => 'blog-1',
                    'img' => get_template_directory_uri() . '/includes/admin-style/img/ps-1.jpg',
                    'class' => 'width-700'
                ),
                'style_1' => array(
                    'alt' => 'blog-2',
                    'img' => get_template_directory_uri() . '/includes/admin-style/img/ps-2.jpg',
                    'class' => 'width-700'
                ),
                'style_2' => array(
                    'alt' => 'blog-3',
                    'img' => get_template_directory_uri() . '/includes/admin-style/img/ps-3.jpg',
                    'class' => 'width-700'
                ),
            ),
            'default' => 'default'
        ),
        array(
            'id' => 'ts_shop_product_card_discount_label_status',
            'type' => 'switch',
            'title' => esc_html('برچسب درصد تخفیف', TIHOSHOP_TEXT_DOMAIN),
            'default' => true,
            'required' => array('ts_product_style', '=', array('style_2', 'default'))
        )
    )

));

// Single product
Redux::setSection($opt_name, array(
    'id' => 'single-product',
    'title' => esc_html('محصول تکی', TIHOSHOP_TEXT_DOMAIN),
    'icon' => 'fal fa-shopping-cart',
));

Redux::setSection($opt_name, array(
    'id' => 'ts_single_product',
    'title' => esc_html(' تنظیمات عمومی', TIHOSHOP_TEXT_DOMAIN),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'ts_single_product_show_comments_counter_status',
            'type' => 'switch',
            'title' => esc_html('نمایش شمارنده دیدگاه ها', TIHOSHOP_TEXT_DOMAIN),
            'default' => true
        ),
        array(
            'id' => 'ts_single_product_show_star_reviews',
            'type' => 'switch',
            'title' => esc_html('نمایش ستاره امتیاز ها', TIHOSHOP_TEXT_DOMAIN),
            'default' => true
        ),
        array(
            'id' => 'ts_single_product_show_breadcrumb_status',
            'type' => 'switch',
            'title' => esc_html('نمایش مسیر', TIHOSHOP_TEXT_DOMAIN),
            'default' => true
        ),
        array(
            'id' => 'ts_single_product_show_cat_status',
            'type' => 'switch',
            'title' => esc_html('نمایش دسته بندی', TIHOSHOP_TEXT_DOMAIN),
            'default' => true
        ),
        array(
            'id' => 'ts_single_product_show_tags_status',
            'type' => 'switch',
            'title' => esc_html('نمایش برچسب ها', TIHOSHOP_TEXT_DOMAIN),
            'default' => true
        ),
        array(
            'id' => 'ts_single_product_show_sku_status',
            'type' => 'switch',
            'title' => esc_html('نمایش SKU', TIHOSHOP_TEXT_DOMAIN),
            'default' => true
        ),
        array(
            'id' => 'ts_single_product_show_icons_status',
            'type' => 'switch',
            'title' => esc_html('نمایش بخش آیکون ها', TIHOSHOP_TEXT_DOMAIN),
            'default' => true
        ),
        array(
            'id' => 'ts_single_product_icons',
            'type' => 'select',
            'title' => esc_html('آیکون ها', TIHOSHOP_TEXT_DOMAIN),
            'required' => array('ts_single_product_show_icons_status', '=', true),
            'data' => 'posts',
            'args' => array('post_type' => array('ts_custom_blocks'), 'numberposts' => -1),
            'desc' => esc_html__('برای افزودن بلاک جدید به منوی "پنل تیهوشاپ ==> بلاک های دلخواه " مراجعه کنید', TIHOSHOP_TEXT_DOMAIN),
        ),
        array(
            'id' => 'ts_single_product_show_related',
            'type' => 'switch',
            'title' => esc_html('نمایش محصولات مرتبط', TIHOSHOP_TEXT_DOMAIN),
            'default' => true
        ),
        array(
            'id' => 'ts_single_product_custom_blocks_in_sidebar_status',
            'type' => 'switch',
            'title' => esc_html('نمایش بلاک دلخواه زیر بخش قیمت', TIHOSHOP_TEXT_DOMAIN),
            'default' => false
        ),
        array(
            'id' => 'ts_single_product_custom_blocks_in_sidebar',
            'type' => 'select',
            'title' => esc_html('بخش دلخواه', TIHOSHOP_TEXT_DOMAIN),
            'required' => array('ts_single_product_custom_blocks_in_sidebar_status', '=', true),
            'data' => 'posts',
            'args' => array('post_type' => array('ts_custom_blocks'), 'numberposts' => -1),
            'desc' => esc_html__('برای افزودن بلاک جدید به منوی "پنل تیهوشاپ ==> بلاک های دلخواه " مراجعه کنید', TIHOSHOP_TEXT_DOMAIN),
        ),
        array(
            'id' => 'ts_single_product_custom_blocks_under_short_desc_status',
            'type' => 'switch',
            'title' => esc_html('نمایش بلاک دلخواه زیر توضیحات کوتاه', TIHOSHOP_TEXT_DOMAIN),
            'default' => false
        ),
        array(
            'id' => 'ts_single_product_custom_blocks_under_short_desc',
            'type' => 'select',
            'title' => esc_html('بخش دلخواه', TIHOSHOP_TEXT_DOMAIN),
            'required' => array('ts_single_product_custom_blocks_under_short_desc_status', '=', true),
            'data' => 'posts',
            'args' => array('post_type' => array('ts_custom_blocks'), 'numberposts' => -1),
            'desc' => esc_html__('برای افزودن بلاک جدید به منوی "پنل تیهوشاپ ==> بلاک های دلخواه " مراجعه کنید', TIHOSHOP_TEXT_DOMAIN),
        ),
    )
));

//custom css js
Redux::setSection($opt_name, array(
    'id' => 'custom_css',
    'title' => esc_html('کد های سفارشی', TIHOSHOP_TEXT_DOMAIN),
    'icon' => 'fal fa-code',
    'fields' => array(
        array(
            'id' => 'css_editor',
            'type' => 'ace_editor',
            'title' => esc_html__('کد های CSS', 'your-project-name'),
            'mode' => 'css',
            'theme' => 'monokai',
            'desc' => 'کد های سفارشی CSS',
        ),
        array(
            'id' => 'js_editor',
            'type' => 'ace_editor',
            'title' => esc_html__('کد های جاوا اسکریپت', 'your-project-name'),
            'mode' => 'javascript',
            'theme' => 'chrome',
            'desc' => 'کد های سفارشی جاوا اسکریپت',
        ),
    )
));


// Function used to retrieve theme option values
if (!function_exists('ts_option')) {
    function ts_option($id, $fallback = false, $param = false)
    {
        global $ts_opt;
        if ($fallback == false) $fallback = '';
        $output = (isset($ts_opt[$id]) && $ts_opt[$id] !== '') ? $ts_opt[$id] : $fallback;
        if (!empty($ts_opt[$id]) && $param) {
            $output = $ts_opt[$id][$param];
        }
        return $output;
    }
}


/*
 * <--- END SECTIONS
 */

/*
 * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR OTHER CONFIGS MAY OVERRIDE YOUR CODE.
 */

/*
 * --> Action hook examples.
 */

// Function to test the compiler hook and demo CSS output.
// Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
// add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);
//
// Change the arguments after they've been declared, but before the panel is created.
// add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );
//
// Change the default value of a field after it's been set, but before it's been used.
// add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );
//
// Dynamically add a section. Can be also used to modify sections/fields.
// add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');
// .
if (!function_exists('compiler_action')) {
    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field's value has changed and compiler=>true is set.
     *
     * @param array $options Options values.
     * @param string $css Compiler selector CSS values  compiler => array( CSS SELECTORS ).
     * @param array $changed_values Any values changed since last save.
     */
    function compiler_action(array $options, string $css, array $changed_values)
    {
        echo '<h1>The compiler hook has run!</h1>';
        echo '<pre>';
        // phpcs:ignore WordPress.PHP.DevelopmentFunctions
        print_r($changed_values); // Values that have changed since the last save.
        // echo '<br/>';
        // print_r($options); //Option values.
        // echo '<br/>';
        // print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS ).
        echo '</pre>';
    }
}
if (!function_exists('redux_validate_callback_function')) {
    /**
     * Custom function for the callback validation referenced above
     *
     * @param array $field Field array.
     * @param mixed $value New value.
     * @param mixed $existing_value Existing value.
     *
     * @return array
     */
    function redux_validate_callback_function(array $field, $value, $existing_value): array
    {
        $error = false;
        $warning = false;

        // Do your validation.
        if (1 === (int)$value) {
            $error = true;
            $value = $existing_value;
        } elseif (2 === (int)$value) {
            $warning = true;
            $value = $existing_value;
        }

        $return['value'] = $value;

        if (true === $error) {
            $field['msg'] = 'your custom error message';
            $return['error'] = $field;
        }

        if (true === $warning) {
            $field['msg'] = 'your custom warning message';
            $return['warning'] = $field;
        }

        return $return;
    }
}


if (!function_exists('dynamic_section')) {
    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built-in icons.
     *
     * @param array $sections Section array.
     *
     * @return array
     */
    function dynamic_section(array $sections): array
    {
        $sections[] = array(
            'title' => esc_html__('Section via hook', 'your-textdomain-here'),
            'desc' => '<p class="description">' . esc_html__('This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.', 'your-textdomain-here') . '</p>',
            'icon' => 'el el-paper-clip',

            // Leave this as a blank section, no options just some intro text set above.
            'fields' => array(),
        );

        return $sections;
    }
}

if (!function_exists('change_arguments')) {
    /**
     * Filter hook for filtering the args.
     * Good for child themes to override or add to the args array. Can also be used in other functions.
     *
     * @param array $args Global arguments array.
     *
     * @return array
     */
    function change_arguments(array $args): array
    {
        $args['dev_mode'] = true;

        return $args;
    }
}

if (!function_exists('change_defaults')) {
    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     *
     * @param array $defaults Default value array.
     *
     * @return array
     */
    function change_defaults(array $defaults): array
    {
        $defaults['str_replace'] = esc_html__('Testing filter hook!', 'your-textdomain-here');

        return $defaults;
    }
}

if (!function_exists('redux_custom_sanitize')) {
    /**
     * Function to be used if the field sanitize argument.
     * Return value MUST be the formatted or cleaned text to display.
     *
     * @param string $value Value to evaluate or clean.  Required.
     *
     * @return string
     */
    function redux_custom_sanitize(string $value): string
    {
        $return = '';

        foreach (explode(' ', $value) as $w) {
            foreach (str_split($w) as $k => $v) {
                if (($k + 1) % 2 !== 0 && ctype_alpha($v)) {
                    $return .= mb_strtoupper($v);
                } else {
                    $return .= $v;
                }
            }

            $return .= ' ';
        }

        return $return;
    }
}
