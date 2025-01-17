<?php

function ts_custom_post_types()
{
    //testimonials post type
    $testimonials_labels = array(
        'name' => __('نظرات مشتریان'),
        'singular_name' => __('نظرات مشتریان'),
        'menu_name' => __('نظرات مشتریان'),
        'name_admin_bar' => __('نظرات مشتریان'),
        'add_new' => __(' افزودن جدید'),
        'add_new_item' => __('نظرات مشتریان'),
        'new_item' => __('نظر جدید'),
        'edit_item' => __('ویرایش نظر'),
        'view_item' => __('مشاهده نظر'),
        'all_items' => __('همه نظرات'),
        'search_items' => __('جستجو در بین نظرات'),
        'parent_item_colon' => __('مادر'),
        'not_found' => __('مطلب یافت نشد'),
        'not_found_in_trash' => __('مطلب در زباله دان یافت نشد')
    );

    $testimonials_args = array(
        'labels' => $testimonials_labels,
        'description' => __('Description.', 'tihoshop'),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_icon'           => 'dashicons-testimonial',
        'menu_position'      => null,
        'taxonomies' => array('post_tag'),
        //'taxonomies' => array('post_tag'),
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
    );

    //register post type
    register_post_type('ts_testimonials', $testimonials_args);

    //header post type
    $ts_header_labels = array(
        'name' => __('هدر ساز'),
        'singular_name' => __('هدر ساز'),
        'menu_name' => __('هدر ساز'),
        'name_admin_bar' => __('هدر ساز'),
        'add_new' => __(' افزودن جدید'),
        'add_new_item' => __('هدر ساز'),
        'new_item' => __('هدر جدید'),
        'edit_item' => __('ویرایش هدر'),
        'view_item' => __('مشاهده هدر'),
        'all_items' => __('همه هدر ها'),
        'search_items' => __('جستجو در بین هدر ها'),
        'parent_item_colon' => __('مادر'),
        'not_found' => __('مطلب یافت نشد'),
        'not_found_in_trash' => __('مطلب در زباله دان یافت نشد')
    );

    $ts_header_args = array(
        'labels' => $ts_header_labels,
        'description' => __('Description.', 'tihoshop'),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => false,
        'query_var' => true,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_icon'           => 'dashicons-testimonial',
        'menu_position'      => null,
        //'taxonomies' => array('post_tag'),
        'supports'           => array('title', 'editor')
    );

    //register post type
    register_post_type('ts_header', $ts_header_args);

    //footer post type
    $ts_footer_labels = array(
        'name' => __('پاورقی ساز'),
        'singular_name' => __('پاورقی ساز'),
        'menu_name' => __('پاورقی ساز'),
        'name_admin_bar' => __('پاورقی ساز'),
        'add_new' => __(' افزودن جدید'),
        'add_new_item' => __('پاورقی ساز'),
        'new_item' => __('پاورقی جدید'),
        'edit_item' => __('ویرایش پاورقی'),
        'view_item' => __('مشاهده پاورقی'),
        'all_items' => __('همه پاورقی ها'),
        'search_items' => __('جستجو در بین پاورقی ها'),
        'parent_item_colon' => __('مادر'),
        'not_found' => __('مطلب یافت نشد'),
        'not_found_in_trash' => __('مطلب در زباله دان یافت نشد')
    );

    $ts_footer_args = array(
        'labels' => $ts_footer_labels,
        'description' => __('Description.', 'tihoshop'),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => false,
        'query_var' => true,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_icon'           => 'dashicons-testimonial',
        'menu_position'      => null,
        //'taxonomies' => array('post_tag'),
        'supports'           => array('title', 'editor')
    );

    //register post type
    register_post_type('ts_footer', $ts_footer_args);

    //info bars post type
    $ts_top_nav_labels = array(
        'name' => __('اطلاعیه ساز'),
        'singular_name' => __('اطلاعیه ساز'),
        'menu_name' => __('اطلاعیه ساز'),
        'name_admin_bar' => __('اطلاعیه ساز'),
        'add_new' => __(' افزودن جدید'),
        'add_new_item' => __('اطلاعیه ساز'),
        'new_item' => __('اطلاعیه جدید'),
        'edit_item' => __('ویرایش اطلاعیه'),
        'view_item' => __('مشاهده اطلاعیه'),
        'all_items' => __('همه اطلاعیه ها'),
        'search_items' => __('جستجو در بین اطلاعیه ها'),
        'parent_item_colon' => __('مادر'),
        'not_found' => __('مطلب یافت نشد'),
        'not_found_in_trash' => __('مطلب در زباله دان یافت نشد')
    );

    $ts_top_nav_args = array(
        'labels' => $ts_top_nav_labels,
        'description' => __('Description.', 'tihoshop'),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => false,
        'query_var' => true,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_icon'           => 'dashicons-testimonial',
        'menu_position'      => null,
        //'taxonomies' => array('post_tag'),
        'supports'           => array('title', 'editor')
    );

    //register post type
    register_post_type('ts_info_bar', $ts_top_nav_args);

    //custom blocks post type
    $ts_custom_blocks_labels = array(
        'name' => __('بلاک های دلخواه'),
        'singular_name' => __('بلاک های دلخواه'),
        'menu_name' => __('بلاک های دلخواه'),
        'name_admin_bar' => __('بلاک های دلخواهز'),
        'add_new' => __(' افزودن جدید'),
        'add_new_item' => __('بلاک های دلخواه'),
        'new_item' => __('بلاک دلخواه جدید'),
        'edit_item' => __('ویرایش بلاک دلخواه'),
        'view_item' => __('مشاهده بلاک های دلخواه'),
        'all_items' => __('همه بلاک های دلخواه '),
        'search_items' => __('جستجو در بین بلاک های دلخواه '),
        'parent_item_colon' => __('مادر'),
        'not_found' => __('مطلب یافت نشد'),
        'not_found_in_trash' => __('مطلب در زباله دان یافت نشد')
    );

    $ts_custom_blocks_args = array(
        'labels' => $ts_custom_blocks_labels,
        'description' => __('Description.', 'tihoshop'),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => false,
        'query_var' => true,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_icon'           => 'dashicons-testimonial',
        'menu_position'      => null,
        //'taxonomies' => array('post_tag'),
        'supports'           => array('title', 'editor')
    );

    //register post type
    register_post_type('ts_custom_blocks', $ts_custom_blocks_args);
}

add_action('init', 'ts_custom_post_types');
