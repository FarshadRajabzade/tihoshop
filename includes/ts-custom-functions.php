<?php
//TODO edit this section
//  to include in functions.php
function ts_the_breadcrumb() {

    $sep = '<svg width="15" height="15" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M19 8L11 16L19 24" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>';

    if (!is_front_page()) {

        // Start the breadcrumb with a link to your homepage
        echo '<div class="breadcrumbs">';
        echo '<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 8.49509C8.03026 8.49509 8.53882 8.28452 8.91386 7.90966C9.2889 7.5348 9.49973 7.02635 9.5 6.49609C9.5 5.96566 9.28929 5.45695 8.91421 5.08188C8.53914 4.70681 8.03043 4.49609 7.5 4.49609C6.96957 4.49609 6.46086 4.70681 6.08579 5.08188C5.71071 5.45695 5.5 5.96566 5.5 6.49609C5.50027 7.02635 5.7111 7.5348 6.08614 7.90966C6.46118 8.28452 6.96974 8.49509 7.5 8.49509Z" stroke="#CCCCCC" stroke-linecap="square"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M13.5 6.496C13.5 11.493 8.5 14.491 7.5 14.491C6.5 14.491 1.5 11.493 1.5 6.496C1.5008 4.90531 2.13332 3.38006 3.25848 2.25565C4.38364 1.13124 5.90931 0.499735 7.5 0.5C10.813 0.5 13.5 3.185 13.5 6.496Z" stroke="#CCCCCC" stroke-linecap="square"/>
</svg>
';
        echo '<a href="';
        echo get_option('home');
        echo '">';
        bloginfo('name');
        echo '</a>' . $sep;

        // Check if the current page is a category, an archive or a single page. If so show the category or archive name.
        if (is_category() || is_single()){
            the_category('title_li=');
        } elseif (is_archive() || is_single()){
            if ( is_day() ) {
                printf( __( '%s', 'text_domain' ), get_the_date() );
            } elseif ( is_month() ) {
                printf( __( '%s', 'text_domain' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'text_domain' ) ) );
            } elseif ( is_year() ) {
                printf( __( '%s', 'text_domain' ), get_the_date( _x( 'Y', 'yearly archives date format', 'text_domain' ) ) );
            } else {
                _e( '', 'text_domain' );
            }
        }

        // If the current page is a single post, show its title with the separator
        if (is_single()) {
            echo $sep;
            the_title();
        }

        // If the current page is a static page, show its title.
        if (is_page()) {
            echo the_title();
        }

        // if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) {
                $post = get_post($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }

        echo '</div>';
    }
}

