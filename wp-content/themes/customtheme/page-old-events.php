<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
   <div class="container">
      <?php 
      $oldEvents = new WP_Query(array(
         'post_type' => 'old_event',
         'order' => 'ASC',
         'paged' => get_query_var('paged', 1)
      ));
      while($oldEvents -> have_posts()) {
         $oldEvents -> the_post();?>
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
     <?php }
     echo paginate_links(array(
        'total' => $oldEvents -> max_num_pages
     ));
      ?>
      <?php get_calendar(); ?>

   </div>
<?php include('footer.php'); ?>