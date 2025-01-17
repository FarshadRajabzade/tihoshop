<?php
if (class_exists('redux')) {
    $showSingleBlogCat = ts_option('ts_single_blog_show_cat');
    $showSingleBlogCommentsCount = ts_option('ts_single_blog_show_comments_count');
    $showSingleBlogShowDate = ts_option('ts_single_blog_show_date');
    $showSingleBlogShowTags = ts_option('ts_single_blog_show_tags');
    $showSingleBlogShowComments = ts_option('ts_single_blog_show_comment_sec');
}
?>
<?php
if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <ul class="blog-meta mb-3">

            <?php if ($showSingleBlogCommentsCount == true): ?>
            <li class="meta-item">
                <i class="fi fi-rr-comment align-middle"></i>
                <?php echo get_comments_number(get_the_ID()); ?>
                کامنت
            </li>
            <?php endif; ?>

            <?php if ($showSingleBlogShowDate == true): ?>
            <li class="meta-item">
                <i class="fi fi-rr-clock align-middle"></i>
                <?php echo the_time('j F Y'); ?>
            </li>
            <?php endif; ?>

            <?php if ($showSingleBlogCat == true): ?>
            <li class="meta-item">
                <i class="fi fi-rr-folder align-middle"></i>
                <?php echo the_category(','); ?>
            </li>
            <?php endif; ?>
        </ul>
        <?php the_content(); ?>
    <?php
    endwhile;
endif
?>

<?php if ($showSingleBlogShowTags == true): ?>
    <!--Start Of Tags-->
    <div class="blog-content-footer d-flex justify-content-between pt-5 pb-5">
        <div>
            <?php
            $posttags = get_the_tags(get_the_ID());
            if ($posttags) {
            ?>
            <h4>برچسب ها</h4>
            <ul class="blog-tags">

                <?php
                foreach ($posttags as $tag) {
                    ?>
                    <li class="tag-item"><a
                                href="<?php echo get_tag_link($tag); ?>"><?php echo $tag->name ?></a>
                    </li>
                    <?php
                }
                }
                ?>
            </ul>
            <?php
            ?>

        </div>
    </div>
    <!--End Of Tags-->
<?php endif; ?>


<?php if ($showSingleBlogShowComments == true): ?>
<!--Start Of Comments Section-->
<div class="comments" id="comments">
    <div class="title-box">
        <div class="title-wrapper">
            <h3 class="title title-line">
                <i class="fi fi-rr-comment align-middle"></i>
                کامنت ها
            </h3>
        </div>
    </div>
    <?php if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif; ?>
</div>
<!--End Of Comments Section-->
<?php endif; ?>