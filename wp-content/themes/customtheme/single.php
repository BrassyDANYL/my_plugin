<?php include('header.php'); ?>
   <div class="container">
      <div class="publication">
      <div class="title">
         <?php echo the_title();?>
      </div>
      <div class="content">
            <?php the_content();?>
         </div>
         <div class="img__cont">
         <img class="event__img" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
         </div>
         <div class="content__part"></div>
         <div class="date"><?php echo get_post_meta($post -> ID, 'Date', true); ?></div>
   </div>
   </div>
<?php include('footer.php'); ?>