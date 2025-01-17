<?php

//header page id based on user selection in theme settings
$elHeaderPageId = ts_option('header_page_id');

if (class_exists("\\Elementor\\Plugin")) {

    $frontend = new \Elementor\Frontend();

    $contentElementor = $frontend->get_builder_content_for_display($elHeaderPageId, $with_css = true);


}

?>
    <header class="site-header studi_el_head <?php if(ts_option('fixed_header') == true): echo 'ts-el-fixed'; endif; ?>">

        <?php echo $contentElementor; ?>

    </header>
<?php
//elementor header end
?>