<?php
add_action('wp_head' , 'ts_custom_styles' , 160);
function ts_custom_styles() {

    global $ts_opt; ?>

    <style>
        :root {
            --theme-default: <?php echo $ts_opt['ts_default_color'] ?>;
            --font-default: <?php echo $ts_opt['ts_font_body']['font-family'] ?>;
        }

        .product-labels .discount {
            color: <?php echo $ts_opt['ts_shop_discount_label_color'] ?>;
        }

        <?php echo $ts_opt['css_editor'];?>
    </style>

<?php

}