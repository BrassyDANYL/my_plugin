<?php
function my_wp_sidebar_for_widget() {
   register_sidebar(
      array(
         'id' => 'my_sitebar',
         'name' => 'My Sitebar',
         'description' => 'You can place you widgets here',
         'before_widget' => '<div id="%1$s" class="side widget %2$s">',
         'after_widget' => '</div>',
         'before_title' => '<h3 class="widget-title">',
         'after_title' => '</h3>'
      )
   );
}
add_action( 'widgets_init', 'my_wp_sidebar_for_widget' );

add_action('admin_menu', 'custom_css_hooks');
add_action('save_post', 'save_custom_css');
add_action('wp_head','insert_custom_css');
function custom_css_hooks() {
    add_meta_box('custom_css', 'Custom CSS', 'custom_css_input',
    'old_event', 'normal', 'high');
    add_meta_box('custom_css', 'Custom CSS', 'custom_css_input',
    'archive','single', 'normal', 'high');
}
function custom_css_input() {
global $post;
echo '<input type="hidden" name="custom_css_noncename" id="custom_css_noncename"
    value="'.wp_create_nonce('custom-css').'" />';
echo '<textarea name="custom_css" id="custom_css" rows="5" cols="30"
    style="width:100%;">'.get_post_meta($post->ID,'_custom_css',true).'</textarea>';
}
function save_custom_css($post_id) {
    if (!wp_verify_nonce($_POST['custom_css_noncename'], 'custom-css')) return $post_id;

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
        $custom_css = $_POST['custom_css'];
        update_post_meta($post_id, '_custom_css', $custom_css);
}
function insert_custom_css() {
if (is_page() || is_single()) {
    if (have_posts()) : while (have_posts()) : the_post();
        echo '<style type="text/css">
        '.get_post_meta(get_the_ID(), '_custom_css', true).'
        </style>';
    endwhile; endif;
    rewind_posts();
}
}
?>

