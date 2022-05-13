<?php
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
 ?>