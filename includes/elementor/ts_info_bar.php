<?php
//header page id based on user selection in theme settings
$elPageId = ts_option('ts_top_info_content');

if (class_exists("\\Elementor\\Plugin")) {

    $frontend = new \Elementor\Frontend();

    $contentElementor = $frontend->get_builder_content_for_display($elPageId, $with_css = true);


}

echo $contentElementor;
