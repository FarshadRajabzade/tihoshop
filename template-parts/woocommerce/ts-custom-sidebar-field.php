<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$custom_sidebar_field_shipping_date = get_post_meta(get_the_ID(), 'product_sidebar_shipping_date_field_status', true);

if ($custom_sidebar_field_shipping_date === 'true') :
    $custom_sidebar_field_text = get_post_meta(get_the_ID(), 'product_sidebar_shipping_date_field_text', true);
    ?>
    <div class="shipping-date">
        <a href="#">
            <i class="fi fi-rr-truck-moving align-middle line-height-1"></i>
            مدت زمان ارسال:
            <?php
            if (!empty($custom_sidebar_field_text)) {
                echo $custom_sidebar_field_text;
            }
            ?>
        </a>
    </div>
<?php
endif;


