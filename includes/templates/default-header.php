<?php
if (class_exists('Redux')) {
    $headerType = ts_option('ts_header_type');

    $topHeader = ts_option('ts_top_bar');

    $topBarRightText = ts_option('header_top_right_text');
    $topBarLeftText = ts_option('header_top_left_text');

    $defaultLogo = ts_option('custom_logo_image');
    $logoWidth = ts_option('logo_img_width');

    $profileSubmenuStatus = ts_option('ts_shop_profile_submenu_status');
    $profileSubmenuType = ts_option('ts_shop_profile_submenu_type');
    $profileSubmenu = ts_option('ts_shop_profile_submenu');
}
?>



<?php if ($headerType == 'default'): ?>

    <!--Start Of Website Header-->
    <header class="header header-shadow <?php if (ts_option('fixed_header') == true): echo 'ts-fixed'; endif ?>">

        <?php if ($topHeader == true): ?>

            <!--Top Header-->
            <div class="header-top">
                <div class="container d-flex justify-content-between header-top-inner ">
                    <div class="header-left">
                        <?php echo $topBarRightText; ?>
                    </div>
                    <div class="header-right">
                        <?php echo $topBarLeftText; ?>
                    </div>
                </div>
            </div>
            <!--Top Header End-->

        <?php endif ?>

        <!--navbar-->
        <div class="header-middle">
            <div class="container d-flex justify-content-between align-items-center header-middle-inner">
                <a class="hamburger-menu">
                    <i class="bi bi-list"></i>
                </a>
                <div class="header-right">
                    <div class="brand-logo">
                        <a href="<?php echo home_url(); ?>">
                            <?php if (isset($defaultLogo['url'])): ?>
                                <img src="<?php echo $defaultLogo['url']; ?>" width="<?php echo $logoWidth ?>">
                            <?php endif; ?>
                        </a>
                    </div>

                </div>
                <div class="header-center position-relative">
                    <div class="search">
                        <form action="<?php home_url('/'); ?>" method="get" class="header-search">
                            <input type="text"
                                   name="s"
                                   placeholder="جستجو در محصولات..."
                                   id="keyword"
                                   class="form-control search-control"
                                   autocomplete="off">
                            <button type="submit" class="btn hover-color-inherit">
                                <i class="fi fi-rr-search line-height-0"></i>
                            </button>
                        </form>
                        <div class="ajax-search-wrapper search_result" style="display: none;">
                            <div class="d-flex justify-content-center">
                                <div class="loading">
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="result">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-left">

                    <?php if (ts_option('show_profile_icon') == true): ?>
                        <div class="header-item cart-wrapper profile">
                            <div class="cart d-flex align-items-center justify-content-between">
                                <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="20"
                                     height="20">
                                    <path d="M12,12A6,6,0,1,0,6,6,6.006,6.006,0,0,0,12,12ZM12,2A4,4,0,1,1,8,6,4,4,0,0,1,12,2Z"></path>
                                    <path d="M12,14a9.01,9.01,0,0,0-9,9,1,1,0,0,0,2,0,7,7,0,0,1,14,0,1,1,0,0,0,2,0A9.01,9.01,0,0,0,12,14Z"></path>
                                </svg>
                                <div class="ts-mr-small hide-in-mobile me-2">
                                    <?php if (is_user_logged_in()): ?>
                                        <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">
                                            <p>پروفایل</p>
                                            سلام!
                                        </a>
                                        <?php if ($profileSubmenuStatus == true): ?>
                                            <div class="profile-submenu">
                                                <?php if ($profileSubmenuType == 'default'): ?>
                                                    <ul>
                                                        <?php ts_get_woo_account_menus(); ?>
                                                    </ul>

                                                <?php else: ?>
                                                    <?php wp_nav_menu($profileSubmenu); ?>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <div class="ts-mr-small hide-in-mobile me-2">
                                            <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">
                                                <p>پروفایل</p>
                                                ورود / ثبت نام
                                            </a>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>


                    <?php if (ts_option('show_cart_icon') == true): ?>

                        <div class="header-item cart-wrapper" id="cart-icon">
                            <div class="cart d-flex align-items-center justify-content-between">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 40 40"
                                     fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M36.7516 9.7701L39.1666 25.7551C40.1441 32.7509 35.3333 39.1143 28.8166 39.1718H11.0683C4.66662 39.1718 -0.201715 32.7509 0.833285 25.7551L3.24828 9.7701C3.82161 4.48465 8.17158 0.411636 13.4833 0.186768H26.5166C31.8283 0.411636 36.1783 4.48465 36.7516 9.7701ZM28.8741 36.2393C30.9321 36.2095 32.8732 35.2775 34.1833 33.6901C35.9403 31.6092 36.7031 28.8659 36.2724 26.1768L33.915 10.1918C33.5783 6.28998 30.4265 3.22799 26.5166 3.00427H13.4833C9.5734 3.22799 6.42159 6.28998 6.08495 10.1918L3.72745 26.1768C3.29679 28.8659 4.0596 31.6092 5.81662 33.6901C7.12668 35.2775 9.06779 36.2095 11.1258 36.2393H28.8741Z"
                                          fill="black"></path>
                                    <path d="M26.0374 10.1534C25.2435 10.1534 24.5999 10.797 24.5999 11.5909C24.5999 14.1315 22.5404 16.1909 19.9999 16.1909C17.4594 16.1909 15.3999 14.1315 15.3999 11.5909C15.3999 10.797 14.7563 10.1534 13.9624 10.1534C13.1685 10.1534 12.5249 10.797 12.5249 11.5909C12.5249 14.2615 13.9496 16.7292 16.2624 18.0645C18.5752 19.3998 21.4246 19.3998 23.7374 18.0645C26.0502 16.7292 27.4749 14.2615 27.4749 11.5909C27.4646 10.8013 26.827 10.1638 26.0374 10.1534V10.1534Z"
                                          fill="black"></path>
                                </svg>
                                <div class="ts-mr-small hide-in-mobile me-2">
                                    <p>سبد خرید</p>
                                    <?php echo WC()->cart->get_cart_contents_count(); ?>
                                    محصول
                                </div>
                            </div>
                        </div>

                    <?php endif; ?>

                </div>

            </div>
        </div>
        <!--navbar End-->

        <!--Header Bottom-->
        <nav class="header-bottom">
            <div class="container d-flex justify-content-between align-items-center header-bottom-inner
            <?php if (ts_option('show_categories_menu') == false): echo 'p-3'; endif; ?>">
                <div class="header-left">
                    <!--start of categories menu-->
                    <div class="header-categories-menu">
                        <?php if (ts_option('show_categories_menu') == true): ?>
                            <a href="#" class="category-toggle hover-color-inherit">
                                <i class="fi fi-rr-menu-burger"></i>
                                <span>دسته بندی ها</span>
                            </a>
                        <?php endif; ?>

                        <div class="categories-menu">
                            <?php if (has_nav_menu('categories-menu')): ?>
                                <?php wp_nav_menu(array(
                                    'theme_location' => 'categories-menu',
                                    'container' => '',
                                    'menu-class' => 'menu'
                                )) ?>
                            <?php else: ?>
                                <p class="me-3 p-3">هنوز منوی اصلی را انتخاب نکردید. برای انتخاب منوی اصلی به <strong
                                            class="color-default">پیشخوان > نمایش > فهرست ها</strong> مراجعه کنید</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!--end of categories menu-->

                    <!--Start of main menu-->
                    <div class="position-relative">
                        <div class="menu-container">
                            <div class="canvas-overlay"></div>
                            <div class="menu-wrapper">
                                <div class="header-search d-lg-none m-2">
                                    <input type="text" class="form-control search-control" name="search" id="search"
                                           placeholder="جستجو در محصولات...">
                                    <button type="submit" class="btn btn-search">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </div>
                                <?php if (has_nav_menu('main-menu')): ?>
                                    <?php wp_nav_menu(array(
                                        'theme_location' => 'main-menu',
                                        'container' => '',
                                        'menu-class' => 'menu'
                                    )) ?>
                                <?php else: ?>
                                    <p class="me-3">هنوز منوی اصلی را انتخاب نکردید. برای انتخاب منوی اصلی به <strong
                                                class="color-default">پیشخوان > نمایش > فهرست ها</strong> مراجعه کنید
                                    </p>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <!--end of main menu-->
                </div>
            </div>
        </nav>
        <!--Header Bottom End-->
    </header>
    <!-- End Of Website Header -->

<?php
else:
    get_template_part('includes/elementor/ts_header')
    ?>
<?php endif ?>
