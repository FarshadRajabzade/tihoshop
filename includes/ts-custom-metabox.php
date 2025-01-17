<?php

/**
 * Testimonial Custom metabox
 */
function ts_testimonials_custom_metabox()
{

    //Testimonial Post Type - Custom metaboxes
    $testimonial_details = new_cmb2_box(array(
        'id' => 'testimonial_details',
        'title' => __('جزئیات نظر مشتری', 'cmb2'),
        'object_types' => array('ts_testimonials'), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true
    ));


    // Testimonials Image
    $testimonial_details->add_field(array(
        'name' => __('تصویر نظر دهنده', 'cmb2'),
        'desc' => __('لطفا تصویر نظر دهنده را وارد کنید (اجباری)', 'cmb2'),
        'id' => 'testimonial_avatar',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => true, // Hide the text input for the url
        ),
        'query_args' => array(
             'type' => array(
             	'image/gif',
             	'image/jpeg',
             	'image/png',
             ),
        ),
        'text'    => array(
            'add_upload_file_text' => 'آپلود تصویر' // Change upload button text. Default: "Add or Upload File"
        ),
        'preview_size' => 'medium', // Image size to use when previewing in the admin.
    ));

    // Testimonials Name
    $testimonial_details->add_field(array(
        'name' => __('نام نظر دهنده', 'cmb2'),
        'desc' => __('لطفا نام نظر دهنده را وارد کنید (اجباری)', 'cmb2'),
        'id' => 'testimonial_name',
        'type' => 'text',
        'attributes' => array(
            'placeholder' => 'مثلا: فرشاد رجب زاده',
            'required' => 'required',
        ),
        'show_on_cb' => 'cmb2_hide_if_no_cats'
    ));

    // Testimonials side field
    $testimonial_details->add_field(array(
        'name' => __('سمت مشتری', 'cmb2'),
        'desc' => __('لطفا سمت مشتری را وارد کنید (اختیاری)', 'cmb2'),
        'id' => 'testimonial_side',
        'default' => '',
        'attributes' => array(
            'placeholder' => 'مثلا: مدیر عامل',
        ),
        'type' => 'text',
        'show_on_cb' => 'cmb2_hide_if_no_cats'
    ));

    // Message Field
    $testimonial_details->add_field(array(
        'name' => __('متن نظر مشتری', 'cmb2'),
        'desc' => __('لطفا متن نظر مشتری را وارد کنید (اجباری)', 'cmb2'),
        'id' => 'testimonial_message',
        'default' => '',
        'attributes' => array(
            'placeholder' => 'مثلا: این شرکت عالی است...',
            'required' => 'required',
        ),
        'type' => 'textarea',
        'show_on_cb' => 'cmb2_hide_if_no_cats'
    ));

    //Rating field
    $testimonial_details->add_field( array(
        'name'             => 'امتیاز مشتری',
        'desc'             => 'لطفا امتیاز مشتری را انتخاب کنید (اجباری)',
        'id'               => 'testimonials_rate',
        'type'             => 'select',
        'show_option_none' => true,
        'default'          => '1_stars',
        'options'          => array(
            '1_stars' => __( '1 ستاره', 'cmb2' ),
            '2_stars'   => __( '2 ستاره', 'cmb2' ),
            '3_stars'     => __( '3 ستاره', 'cmb2' ),
            '4_stars'     => __( '4 ستاره', 'cmb2' ),
            '5_stars'     => __( '5 ستاره', 'cmb2' ),
        ),
    ) );

}

add_action('cmb2_admin_init', 'ts_testimonials_custom_metabox');

/**
 * Product Short Desc Custom metabox
 */
function tiho_shop_product_custom_desc_metabox() {

    // Custom Product Desc Metabox
    $ts_product_custom_metabox = new_cmb2_box( array(
        'id'            => 'tiho_shop_product_custom_metabox',
        'title'         => __( 'تنظیمات اختصاصی قالب (بخش توضیحات اضافی همراه با آیکون)', 'cmb2' ),
        'object_types'  => array( 'product'), // Post type
        'context'       => 'normal',
        'priority'      => 'low',
        'show_names'    => true, // Show field names on the left
    ) );

    $ts_product_custom_metabox->add_field( array(
        'desc' => 'این قسمت در بخش توضیحات کوتاه محصول نمایش داده خواهد شد',
        'type' => 'title',
        'id'   => 'tiho_shop_product_custom_metabox_title'
    ) );

    $ts_product_custom_metabox->add_field( array(
        'name'    => 'وضعیت',
        'desc'    => 'به صورت پیش فرض غیر فعال است',
        'id'      => 'short_desc_status',
        'type'    => 'radio_inline',
        'options' => array(
            'false' => __( 'غیر فعال', 'cmb2' ),
            'true'   => __( 'فعال', 'cmb2' ),
        ),
        'default' => 'false',
    ) );

    $ts_product_custom_metabox->add_field( array(
        'name'    => 'آیکون',
        'desc'    => 'لطفا آیکون مورد نظر خود را آپلود کنید',
        'id'      => 'short_desc_icon_upload',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'آپلود آیکون' // Change upload button text. Default: "Add or Upload File"
        ),
        // query_args are passed to wp.media's library query.
        'query_args' => array(
             'type' => array(
             	'image/gif',
             	'image/jpeg',
             	'image/png',
             ),
        ),
        'preview_size' => 'medium', // Image size to use when previewing in the admin.
    ) );

    $ts_product_custom_metabox->add_field( array(
        'name'    => 'توضیحات',
        'desc' => 'لطفا توضیحات را وارد کنید',
        'id'      => 'short_desc_text',
        'type'    => 'wysiwyg',
        'options' => array(
            'textarea_rows' => get_option('default_post_edit_rows', 7), // rows="..."
            'media_buttons' => false, // show insert/upload button(s)
        ),
    ) );

}

add_action( 'cmb2_admin_init', 'tiho_shop_product_custom_desc_metabox' );



// Custom Side Bar Shipping Date

function tiho_shop_product_custom_sidebar_metabox() {

    $ts_product_custom_metabox = new_cmb2_box( array(
        'id'            => 'tiho_shop_product_custom_sidebar_metabox',
        'title'         => __( 'تنظیمات اختصاصی قالب (مدت زمان ارسال کالا)', 'cmb2' ),
        'object_types'  => array( 'product'), // Post type
        'context'       => 'normal',
        'priority'      => 'low',
        'show_names'    => true, // Show field names on the left
    ) );

    $ts_product_custom_metabox->add_field( array(
        'name'    => 'وضعیت',
        'desc'    => 'به صورت پیش فرض غیر فعال است',
        'id'      => 'product_sidebar_shipping_date_field_status',
        'type'    => 'radio_inline',
        'options' => array(
            'false' => __( 'غیر فعال', 'cmb2' ),
            'true'   => __( 'فعال', 'cmb2' ),
        ),
        'default' => 'false',
    ) );


    $ts_product_custom_metabox->add_field( array(
        'name'    => 'متن دلخوان',
        'desc'    => 'لطفا متن را وارد کنید',
        'default' => '5 روز کاری',
        'id'      => 'product_sidebar_shipping_date_field_text',
        'type'    => 'textarea'
    ) );
}

add_action( 'cmb2_admin_init', 'tiho_shop_product_custom_sidebar_metabox' );

// Custom Side Bar Shipping Date

function tiho_shop_single_product_garanty_field_metabox() {

    $ts_product_custom_metabox = new_cmb2_box( array(
        'id'            => 'tiho_shop_single_product_garanty_field_metabox',
        'title'         => __( 'تنظیمات اختصاصی قالب (بخش گارانتی اصالت و سلامت فیزیکی کالا)', 'cmb2' ),
        'object_types'  => array( 'product'), // Post type
        'context'       => 'normal',
        'priority'      => 'low',
        'show_names'    => true, // Show field names on the left
    ) );

    $ts_product_custom_metabox->add_field( array(
        'name'    => 'وضعیت',
        'desc'    => 'به صورت پیش فرض غیر فعال است',
        'id'      => 'tiho_shop_single_product_garanty_field_status',
        'type'    => 'radio_inline',
        'options' => array(
            'false' => __( 'غیر فعال', 'cmb2' ),
            'true'   => __( 'فعال', 'cmb2' ),
        ),
        'default' => 'false',
    ) );


    $ts_product_custom_metabox->add_field( array(
        'name'    => 'متن دلخوان',
        'desc'    => 'لطفا متن را وارد کنید',
        'default' => 'گارانتی اصالت و سلامت فیزیکی کالا',
        'id'      => 'tiho_shop_single_product_garanty_field_text',
        'type'    => 'textarea'
    ) );
}

add_action( 'cmb2_admin_init', 'tiho_shop_single_product_garanty_field_metabox' );