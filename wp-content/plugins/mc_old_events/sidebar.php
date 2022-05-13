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
?>