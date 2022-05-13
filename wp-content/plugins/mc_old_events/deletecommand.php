<?php
class OE_CLI {
   public function hello_world(){
      WP_CLI::line( 'Hello User!' );
   }
   public function delete($attr) {
      wp_trash_post($post_id);
   }
}
function wds_cli_register_commands() {
   WP_CLI::add_command( 'old_event', 'OE_CLI');

   
   
}
add_action( 'cli_init', 'wds_cli_register_commands' );


// fuction delete(){

// }
function add_delete() {
   WP_CLI::add_command('delete', 'wp_delete_post');
}
?>