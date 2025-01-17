<?php
if (class_exists('redux')) {
    $defaultBlogCardStyle = ts_option('ts_blog_style');
    $blogShowType = ts_option('ts_blog_show_system');
    $blogSidebarLoc = ts_option('ts_blog_sidebar_location');
    $blogTitleStatus = ts_option('ts_blog_archive_title_status');
    $blogTitleAlign = ts_option('ts_blog_archive_align');
    $blogBreadCrumbStatus = ts_option('ts_blog_archive_title_breadcrumb_status');
}
?>


<div class="my-3">
    <?php if ($blogTitleStatus == true): ?>
        <div class="page-title blog-archive d-flex flex-column mb-3 <?php echo $blogTitleAlign; ?>">
            <h1> <?php the_title(); ?> </h1>

            <?php
            if ($blogBreadCrumbStatus == true) {
                ts_the_breadcrumb();
            }
            ?>
        </div>
    <?php endif; ?>
    <div class="row">
        <?php if ($blogSidebarLoc == 'right'): ?>
        <div class="col-xl-3 col-lg-4">
            <div class="side-bar">
                <?php get_sidebar(); ?>
            </div>
        </div>
        <?php endif; ?>
        <div class="<?php if ($blogSidebarLoc == 'none') : echo 'col-md-12'; else: echo 'col-xl-9 col-lg-8'; endif; ?>">
            <div class="row">
                <?php
                if (have_posts()) :
                    while (have_posts()) : the_post(); ?>
                        <div class="<?php if ($blogShowType == 'list') : echo 'col-md-12'; else: echo 'col-md-6 col-lg-4'; endif; ?>">
                        <?php
                        switch ($defaultBlogCardStyle) {
                            case 'style_1':
                                get_template_part('/includes/templates/blog/blog-cards/style-1');
                                break;
                            case 'style_2':
                                get_template_part('/includes/templates/blog/blog-cards/style-2');
                                break;
                            case 'style_3':
                                get_template_part('/includes/templates/blog/blog-cards/style-3');
                                break;
                        }
                        ?>
                        </div>
                    <?php
                    endwhile;
                endif
                ?>


            </div>


            <ul class="pagination flex-wrap">
                <?php echo paginate_links(
                    array(
                        'prev_text' => 'صفحه قبل
                            <i class="fi fi-rr-angle-right align-middle line-height-1"></i>
                            ',
                        'next_text' => ' صفحه بعد
                            <i class="fi fi-rr-angle-left align-middle line-height-1"></i>
                            ',
                    )
                ); ?>
            </ul>
        </div>

        <?php if ($blogSidebarLoc == 'left'): ?>
        <div class="col-xl-3 col-lg-4">
            <div class="side-bar">
                <?php get_sidebar(); ?>
            </div>
        </div>
        <?php endif; ?>
    </div>

</div>
