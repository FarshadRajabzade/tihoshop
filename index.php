<?php get_header() ?>

<section class="main my-3">
    <?php
    if (is_archive() || is_home() || is_search()) {
        // Elementor `archive` location
        if (!function_exists('elementor_theme_do_location') || !elementor_theme_do_location('archive')) {
            get_template_part('template-parts/archive');
        }

    } if (is_singular()) {
        // Elementor `single` location
        if (!function_exists('elementor_theme_do_location') || !elementor_theme_do_location('single')) {
            get_template_part('single');
        }
    } else {
        // Elementor `404` location
        if (!function_exists('elementor_theme_do_location') || !elementor_theme_do_location('single')) {
            get_template_part('template-parts/404');
        }
    }
    ?>
</section>

<?php get_footer() ?>

