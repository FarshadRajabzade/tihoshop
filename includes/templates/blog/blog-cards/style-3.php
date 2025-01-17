
    <div class="post-card">
        <figure class="post-image overlay">
            <a href="<?php the_permalink(); ?>">
                <span class="bg"></span>
                <?php the_post_thumbnail('post'); ?>
            </a>
            <figcaption>
                <h5 class="from-top">بیشتر بخوانید</h5>
            </figcaption>
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


        </div>
    </div>
