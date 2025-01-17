<div class="post-card mb-3 br-1 box-shadowed">
    <figure class="post-image">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('post'); ?>
        </a>
    </figure>
    <div class="post-details">
        <?php if (ts_option('ts_blog_show_meta') == true): ?>
            <div class="post-meta">

                نویسنده
                <a href="#" class="post-author"><?php the_author(); ?></a>
                -
                <a href="#" class="post-date"><?php the_date(); ?></a>

            </div>
        <?php endif; ?>
        <h3 class="post-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>

        <?php if (ts_option('ts_blog_show_desc') == true): ?>
            <div class="post-content">
                <p><?php the_excerpt(); ?></p>
            </div>
        <?php endif; ?>

        <div class="post-footer">
            <a href="<?php the_permalink(); ?>" class="btn btn-link">
                بیشتر بخوانید
                <i class="fi fi-rr-arrow-left"></i>
            </a>

            <?php if (ts_option('ts_blog_show_comments') == true): ?>
                <div class="post-comments">
                    <a href="#" class="d-flex align-items-center justify-content-between">
                        <p>
                            <?php
                            echo get_comments_number(get_the_ID());
                            ?>
                        </p>
                        <i class="fi fi-rr-comment"></i>
                    </a>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>
