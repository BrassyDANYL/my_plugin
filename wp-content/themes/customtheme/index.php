<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
   <div class="container">
      <br>
      <?php 
      
     echo do_shortcode('[ajax_load_more container_type="div" post_type="old_event" posts_per_page="2"]');
      wp_reset_postdata();
   //   echo paginate_links(array(
   //      'total' => $oldEvents -> max_num_pages
   //   ));


      ?>


   </div>
<?php include('footer.php'); ?>

