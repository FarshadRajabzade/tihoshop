<?php
/**
 * The template for displaying all top headers
 */

get_header();
the_content();
get_footer();

//if(class_exists('Elementor')){
if(\Elementor\Plugin::$instance->editor->is_edit_mode()){

    add_action('wp_footer',function(){
        echo "<style>
        footer{display:none !important;}
        </style>";
    });

}
//}
