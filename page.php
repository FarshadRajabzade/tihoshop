<?php
if ( class_exists( 'Redux') ) {
    $pageBreadCrumbStatus = ts_option('ts_page_breadcrumb_status');
}
?>

<?php get_header(); ?>

    <section class="main my-3">
            <?php if ($pageBreadCrumbStatus == true): ?>
            <div class="page-title d-flex flex-column mb-3">
                <?php
                ts_the_breadcrumb();
                ?>
            </div>
            <?php endif; ?>

            <?php the_content();  ?>
    </section>

<?php get_footer(); ?>