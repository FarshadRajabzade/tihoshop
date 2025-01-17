    <div class="post-card post-masked">
        <div class="post-wrapper">
            <figure class="post-image">
                <a href="<?php the_permalink(); ?>">
                    <span class="bg"></span>
                    <?php the_post_thumbnail('post'); ?>
                </a>
            </figure>
            <div class="post-details">

                <h3 class="post-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>

                <?php if (ts_option('ts_blog_show_meta') == true): ?>
                <div class="post-meta">
                    <span><?php the_date(); ?></span>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
