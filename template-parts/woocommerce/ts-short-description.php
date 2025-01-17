<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$short_desc_status = get_post_meta(get_the_ID(), 'short_desc_status', true);

if ($short_desc_status === 'true') :
    $short_desc_icon = get_post_meta(get_the_ID() , 'short_desc_icon_upload' , true);
    $short_desc_text = get_post_meta(get_the_ID() , 'short_desc_text' , true);
    ?>
    <div class="product-desc-icon-box">
        <img src="<?php echo $short_desc_icon ?>" alt="">
        <div class="text">
            <?php echo esc_html($short_desc_text) ?>
        </div>
    </div>
<?php
endif;


