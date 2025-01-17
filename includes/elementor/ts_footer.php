<?php
//header page id based on user selection in theme settings
$tsFooterStatus = ts_option('ts_footer_status');
$elFooterPageId = ts_option('ts_footer_page_id');

if (class_exists("\\Elementor\\Plugin")) {

    $frontend = new \Elementor\Frontend();

    $contentElementor = $frontend->get_builder_content_for_display($elFooterPageId, $with_css = true);


}

?>
<?php if ($tsFooterStatus == true): ?>
    <footer>

        <?php echo $contentElementor; ?>

    </footer>
<?php endif; ?>
<?php
//elementor header end
?>