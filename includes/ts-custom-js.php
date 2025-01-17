<?php
add_action('wp_footer' , 'ts_custom_js' , 160);

function ts_custom_js() {

    global $ts_opt; ?>

    <script>
        <?php echo $ts_opt['js_editor'];?>
    </script>

<?php

}