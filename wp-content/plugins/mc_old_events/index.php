<?php 
/*
Plugin Name: Old Events 
Description: This plugin adds functionality to add custom post type Old Events 
Version: 1.0
Author: Brassy
*/

//Our Scripts
function files() {
   wp_enqueue_script( 'main-js', plugins_url('/js/scripts.js', __FILE__ ), array('jquery'));

   wp_localize_script('main-js', 'ajax_var', array(
'url' => admin_url('admin-ajax.php'),
'nonce' => wp_create_nonce('ajax-nonce')
));
}
add_action('wp_enqueue_scripts', 'files');

//Features
function add_custom_features() {
add_theme_support('post-thumbnails');
}

add_action( 'after_setup_theme', 'add_custom_features');

//Add Custom Post Type
function old_events_post_type() {
	//Old Events Post Type
	register_post_type('old_event', array(
	  'show_in_rest' => true,
      'supports' => array('title-', 'editor', 'excerpt', 'comments', 'custom-fields', 'thumbnail'),
      'rewrite' => array('slug' => 'old_events'),
      'has_archive' => true,
      'public' => true,
      'taxonomies' => array('importance'),
      'labels' => array(
         'name' => 'Old Events',
         'add_new_item' => 'Add New Old Event',
         'edit_item' => 'Edit Old Event',
         'all_items' => 'All Old Events',
         'singular_name' => 'Old Event'
      ),
      'menu_icon' => 'dashicons-media-archive',
	));

   add_post_type_support('old_event', array(
      'title', 'editor', 'excerpt, comments', 'custom_fields', 'thumbnail'
   ));
   
}
add_action('init', 'old_events_post_type');


//Our Custom Taxonomy

function our_custom_taxonomy() {
   register_taxonomy('importance', array('old_event'), array(
      'label' => '',
      'labels' => array(
         'name' => 'Importance',
         'singular_name' => 'Importance'
      ),
      'description' => 'Importance of event',
      'public' => true,
      'rewrite' => true,
      'show_ui' => true,
      'capabilities'=> array(
         'manage_terms' => 'manage_categories',
         'edit_terms' => 'manage_categories',
         'delete_terms' => 'manage_categories',
         'assign_terms' => 'edit_posts'
      )

   ));
}
 add_action('init', 'our_custom_taxonomy');

//comments
function mytheme_comment($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case '' :
?>
            <div id="comment-<?php comment_ID(); ?>">
             <div id="comment_block">
                <div class="comment-author vcard">
                    <?php echo get_avatar( $comment->comment_author_email, $args['avatar_size']); ?>
               <div class="coll_comm">Комментариев: <?php commentCount(); ?></div>
               </div>
                </div>

            <li class="post pingback">
                <?php comment_author_link(); ?>
                <?php edit_comment_link( __( 'Редактировать' ), ' ' ); ?>
<?php
        break;
    endswitch;
}
 
//Comment Counter
function commentCount(){
global $wpdb;
$count = $wpdb->get_var('SELECT COUNT(comment_ID) FROM ' . $wpdb->comments. ' WHERE comment_author_email = "' . get_comment_author_email() . '"');
echo $count . '';
}



// //likes Counter
// //function likesCount(){
//    $lcont = 0;
//    while(){
//       $lcount++;
//       echo $lcount;
//    } else {
//       echo $lcount;
//    }

// }

//sidebar

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
//calendar
function verbose_calendar_scripts() {
    global $post;
 
    wp_enqueue_script(‘jquery’);
 
    wp_register_style(‘verboseCalCustomStyles’, plugins_url(‘styles.css’, __FILE__));
    wp_enqueue_style(‘verboseCalCustomStyles’);
 
    wp_register_script(‘verboseCal’, plugins_url(‘javascripts/jquery.calendar/jquery.calendar.min.js’, __FILE__));
    wp_enqueue_script(‘verboseCal’);
 
    wp_register_style(‘verboseCalMainStyles’, plugins_url(‘stylesheets/main.css’, __FILE__));
    wp_enqueue_style(‘verboseCalMainStyles’);
 
    wp_register_style(‘verboseCalStyles’, plugins_url(‘javascripts/jquery.calendar/calendar.css’, __FILE__));
    wp_enqueue_style(‘verboseCalStyles’);
 
    wp_register_script(‘verboseCalCustom’, plugins_url(‘verboseCalCustom.js’, __FILE__));
    wp_enqueue_script(‘verboseCalCustom’);
 
    $config_array = array(
        ‘ajaxUrl’ => admin_url(‘admin-ajax.php’),
        ‘nonce’ => wp_create_nonce(‘reward-nonce’)
    );
 
    wp_localize_script(‘verboseCal’, ‘calendarData’, $config_array);
}
 
add_action(‘wp_enqueue_scripts’, ‘verbose_calendar_scripts’);

function verbose_calendar_admin_scripts() {
    global $post;
 
    wp_enqueue_script(‘jquery’);
 
    wp_register_style(‘verboseCalCustomStyles’, plugins_url(‘styles.css’, __FILE__));
    wp_enqueue_style(‘verboseCalCustomStyles’);
 
    wp_register_style(‘jqueryUIALL’, plugins_url(‘themes/base/jquery.ui.all.css’, __FILE__));
    wp_enqueue_style(‘jqueryUIALL’);
 
    wp_register_script(‘jqueryUICore’, plugins_url(‘ui/jquery.ui.core.js’, __FILE__));
    wp_enqueue_script(‘jqueryUICore’);
 
    wp_register_script(‘jqueryUIWidget’, plugins_url(‘ui/jquery.ui.widget.js’, __FILE__));
    wp_enqueue_script(‘jqueryUIWidget’);
 
    wp_register_script(‘jqueryUIDate’, plugins_url(‘ui/jquery.ui.datepicker.js’, __FILE__));
    wp_enqueue_script(‘jqueryUIDate’);
 
    wp_register_script(‘verboseCalAdmin’, plugins_url(‘verboseCalAdmin.js’, __FILE__));
    wp_enqueue_script(‘verboseCalAdmin’);
}
 
add_action(‘admin_enqueue_scripts’, ‘verbose_calendar_admin_scripts’);

function register_custom_event_type() {
    $labels = array(
        ‘name’ => _x(‘Events’, ‘event’),
        ‘singular_name’ => _x(‘Event’, ‘event’),
        ‘add_new’ => _x(‘Add New’, ‘event’),
        ‘add_new_item’ => _x(‘Add New Event’, ‘event’),
        ‘edit_item’ => _x(‘Edit Event’, ‘event’),
        ‘new_item’ => _x(‘New Event’, ‘event’),
        ‘view_item’ => _x(‘View Event’, ‘event’),
        ‘search_items’ => _x(‘Search Events’, ‘event’),
        ‘not_found’ => _x(‘No events found’, ‘event’),
        ‘not_found_in_trash’ => _x(‘No events found in Trash’, ‘event’),
        ‘parent_item_colon’ => _x(‘Parent Event:’, ‘event’),
        ‘menu_name’ => _x(‘Events’, ‘event’),
    );
    $args = array(
        ‘labels’ => $labels,
        ‘hierarchical’ => false,
        ‘supports’ => array(‘title’, ‘editor’),
        ‘public’ => true,
        ‘show_ui’ => true,
        ‘show_in_menu’ => true,
        ‘show_in_nav_menus’ => true,
        ‘publicly_queryable’ => true,
        ‘exclude_from_search’ => false,
        ‘has_archive’ => true,
        ‘query_var’ => true,
        ‘can_export’ => true,
        ‘rewrite’ => true,
        ‘capability_type’ => ‘post’
    );
    register_post_type(‘event’, $args);
}
add_action(‘init’, ‘register_custom_event_type’);

add_action(‘add_meta_boxes’, ‘add_events_fields_box’);
 
function add_events_fields_box() {
    add_meta_box(‘events_fields_box_id’, ‘Event Info’, ‘display_event_info_box’, ‘event’);
}

function display_event_info_box() {
    global $post;
 
    $values = get_post_custom($post->ID);
    $eve_start_date = isset($values[‘_eve_sta_date’]) ?
    $eve_end_date = isset($values[‘_eve_end_date’]) ?
 
    wp_nonce_field(‘event_frm_nonce’, ‘event_frm_nonce’);
 
    $html = “<label>Event Start Date</label><input id=’datepickerStart’ type=’text’ name=’datepickerStart’ value=’$eve_start_date’ />
        <label>Event End Date</label><input id=’datepickerEnd’ type=’text’ name=’datepickerEnd’ value=’$eve_end_date’ />”;
    echo $html;
}

add_action(‘save_post’, ‘save_event_information’);
 
function save_event_information($post_id) {
    // Bail if we’re doing an auto save
    if (defined(‘DOING_AUTOSAVE’) && DOING_AUTOSAVE)
        return;
 
    // if our nonce isn’t there, or we can’t verify it, bail
    if (!isset($_POST[‘event_frm_nonce’]) || !wp_verify_nonce($_POST[‘event_frm_nonce’], ‘event_frm_nonce’))
        return;
 
    // if our current user can’t edit this post, bail
    if (!current_user_can(‘edit_post’))
        return;
 
    if (isset($_POST[‘datepickerStart’]))
        update_post_meta($post_id, ‘_eve_sta_date’, esc_attr($_POST[‘datepickerStart’]));
    if (isset($_POST[‘datepickerEnd’]))
        update_post_meta($post_id, ‘_eve_end_date’, esc_attr($_POST[‘datepickerEnd’]));
}

function verbose_calendar() {
    global $post;
 
    return “<div id=’main-container’></div><div id=’popup_events’>
        <div class=’pop_cls’></div>
        <div id=’popup_events_list’>
            <div id=’popup_events_head’></div>
            <div id=’popup_events_bar’></div>
            <div id=’event_row_panel’ class=’event_row_panel’></div>
            <div id=’popup_events_bottom’></div>
        </div>
    </div>”;
}
 
add_shortcode(“verbose_calendar”, “verbose_calendar”);


