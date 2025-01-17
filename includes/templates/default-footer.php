<?php
if (class_exists('Redux')) {
    $floatBtnStatus = ts_option('ts_float_btn_status');
    $floatBtnIcon = ts_option('ts_float_btn_icon');
    $floatBtnLink = ts_option('ts_float_btn_url');
}
?>

<?php if ($floatBtnStatus == true): ?>

    <!--Float Btn-->
    <div class="float-btn">

        <a href="<?php echo $floatBtnLink ?>">
            <img src="<?php echo $floatBtnIcon['url'] ?>" alt="<?php echo site_url() ?>">
        </a>
    </div>

    <!--Float Btn End-->

<?php endif; ?>

<!--Footer-->
<?php get_template_part('/includes/elementor/ts_footer') ?>
<!--Footer End-->


