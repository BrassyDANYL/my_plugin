<?php 
function vm_add_post_meta_boxes() {
   add_meta_box(
      "post_metadata_events_post",
      "Event Date",
      "post_meta_box_events_post",
      "old_event",
      "side",
      "low"
   );
}

add_action( "admin_init", "vm_add_post_meta_boxes" );

function vm_save_post_meta_boxes() {
   global $post;
   if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
      return;
   }
   update_post_meta($post -> ID, "_event_date", sanitize_text_field($_POST["_event_date"]));
}
add_action('save_post', 'vm_save_post_meta_boxes');

function post_meta_box_events_post() {
   global $post;
   $custom = get_post_custom($post -> ID);
   $fieldData = $custom["_event_date"][0];
   echo "<input type=\"date\" name=\"_event_date\" value=\"".$fieldData."\" placeholder=\"Event Date\">";
}
?>