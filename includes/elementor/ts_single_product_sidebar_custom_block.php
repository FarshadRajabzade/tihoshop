<?php

//ts custom block page id based on user selection in theme settings
$elTsCustomBlock = ts_option('ts_single_product_custom_blocks_in_sidebar');

if (class_exists("\\Elementor\\Plugin")) {

    $frontend = new \Elementor\Frontend();

    $contentElementor = $frontend->get_builder_content_for_display($elTsCustomBlock, $with_css = true);


}

?>
        <?php echo $contentElementor; ?>

<?php
//elementor header end
?>