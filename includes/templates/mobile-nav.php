<?php
if (class_exists('Redux')) {
    global $ts_opt;
    $mobileNavStatus = ts_option('ts_mobile_navbar_status');
    $mobileNavBtnOne = array(
        'status' => ts_option('ts_mobile_navbar_btn_1_status'),
        'text' => ts_option('ts_mobile_navbar_btn_1_text'),
        'url' => ts_option('ts_mobile_navbar_btn_1_link'),
        'icon' => ts_option('ts_mobile_navbar_btn_1_icon')
    );
    $mobileNavBtnTwo = array(
        'status' => ts_option('ts_mobile_navbar_btn_2_status'),
        'text' => ts_option('ts_mobile_navbar_btn_2_text'),
        'url' => ts_option('ts_mobile_navbar_btn_2_link'),
        'icon' => ts_option('ts_mobile_navbar_btn_2_icon')
    );
    $mobileNavBtnThree = array(
        'status' => ts_option('ts_mobile_navbar_btn_3_status'),
        'text' => ts_option('ts_mobile_navbar_btn_3_text'),
        'url' => ts_option('ts_mobile_navbar_btn_3_link'),
        'icon' => ts_option('ts_mobile_navbar_btn_3_icon')
    );
    $mobileNavBtnFour = array(
        'status' => ts_option('ts_mobile_navbar_btn_4_status'),
        'text' => ts_option('ts_mobile_navbar_btn_4_text'),
        'url' => ts_option('ts_mobile_navbar_btn_4_link'),
        'icon' => ts_option('ts_mobile_navbar_btn_4_icon')
    );
    $mobileNavButtons = array($mobileNavBtnOne , $mobileNavBtnTwo , $mobileNavBtnThree , $mobileNavBtnFour);

}
?>
<?php if ($mobileNavStatus == true): ?>
    <div class="Sticky-nav-wrapper">
        <div class="sticky-nav">
            <?php foreach ($mobileNavButtons as $item): ?>
            <?php if ($item['status'] == true): ?>
                <a href="<?php echo $item['url'] ?>" class="sticky-item">
                    <img width="50" height="50" src="<?php echo $item['icon']['url'] ?>" alt="<?php echo site_url() ?>">
                    <?php echo $item['text'] ?>
                </a>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>