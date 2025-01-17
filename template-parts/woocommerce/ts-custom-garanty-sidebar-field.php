<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$custom_sidebar_field_shipping_date = get_post_meta(get_the_ID(), 'tiho_shop_single_product_garanty_field_status', true);

if ($custom_sidebar_field_shipping_date === 'true') :
    $custom_sidebar_field_text = get_post_meta(get_the_ID(), 'tiho_shop_single_product_garanty_field_text', true);
    ?>

    <div class="seller-garanty">
            <i class="fi fi-rr-shield-check align-middle"></i>
            <?php
            if (!empty($custom_sidebar_field_text)) {
                echo $custom_sidebar_field_text;
            }
            ?>
    </div>
<?php
endif;


