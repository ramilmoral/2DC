<?php
function load_custom_fonts() {
    echo "
    <style>
        @font-face {
            font-family: 'Roboto';
            src: url('" . get_template_directory_uri() . "/assets/fonts/Roboto-Regular.ttf') format('truetype');
            font-weight: 400;
            font-style: normal;
        }
        @font-face {
            font-family: 'Roboto';
            src: url('" . get_template_directory_uri() . "/assets/fonts/Roboto-Bold.ttf') format('truetype');
            font-weight: 700;
            font-style: normal;
        }
    </style>";
}
add_action('wp_head', 'load_custom_fonts');
?>