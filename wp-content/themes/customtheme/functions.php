<?php
function my_custom_files() {
   wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/scripts.js' );
   wp_enqueue_style( 'main-css', get_template_directory_uri() . '/style.css' );
   wp_enqueue_script( 'font-awesome', 'https://kit.fontawesome.com/ce62bf556f.js' );
}
add_action('wp_enqueue_scripts', 'my_custom_files');
?>