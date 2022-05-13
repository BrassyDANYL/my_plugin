<?php 
add_shortcode('addOldEvents', 'shortcodeOldEvents');

function shortcodeOldEvents($atts) {

   $atts = shortcode_atts( array(
      'importance'  => '1',
      'numberposts' => 1 
   ), $atts);

   $oldposts = new WP_Query(array(
   'posts_per_page' => $atts['numberposts'],
   'importance'     => $atts['importance'],
   'post_type'      => 'old_event',
   'paged'          => 1
));

		

      while($oldposts -> have_posts()) {
         $oldposts -> the_post();?>
         <div class="publication">
      <div class="title">
         <?php the_title(); ?>
      </div>
      <div class="content">
            <?php echo wp_trim_words(get_the_content(), 35);?><a class="read__more" href="<?php echo the_permalink();?>">Learn more</a>
         </div>
         <img src="" alt="">
         <div class="content__part"></div>
         <div class="date"><?php echo get_post_meta($post -> ID, 'Date', true); ?></div>
   </div>
         <?php
      }
    
}
?>