<?php
if (class_exists('redux')) {
    $singleBlogSidebarLoc = ts_option('ts_single_blog_sidebar_location');
}
?>



<?php get_header(); ?>

    <div class="my-3">
        <div class="row">
            <?php if ($singleBlogSidebarLoc == 'right'): ?>
                <div class="col-xl-3 col-lg-4">
                    <div class="side-bar">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            <?php endif; ?>

            <!--Start Of Main Content-->
            <div class="col-xl-9 col-lg-8">
                <!--Start Of Blog Content-->

                <div class="blog-content br-1 box-shadowed">
                    <?php get_template_part('includes/templates/blog/single-blog') ?>
                </div>
                <!--End Of Blog Content-->
            </div>
            <!--End Of Main Content-->

            <!--Start Of SideBar-->
            <?php if ($singleBlogSidebarLoc == 'left'): ?>
                <div class="col-xl-3 col-lg-4">
                    <div class="side-bar">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            <?php endif; ?>
            <!--End Of SideBar-->
        </div>
    </div>

<?php get_footer(); ?>