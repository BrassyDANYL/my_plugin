<?php include('header.php');?>
<div class="container">

<?php $eventPosts = new WP_Query(['category_name' => 'event']); 
   while($eventPosts -> have_posts()) {
      $eventPosts -> the_post();?>
      <div class="publication">
      <div class="title">
         <?php echo the_title();?>
      </div>
      <div class="content">
         <?php echo wp_trim_words(get_the_content(), 35);?><a class="read__more" href="<?php echo the_permalink();?>">Learn more</a>
         </div>
         <div class="content__part"></div>
         <div class="date"><?php echo the_date();?></div>
   </div>
   <?php
   }
   
?>


   <div class="publication">
      <div class="title">
         Title
      </div>
      <div class="content">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora ex a corporis ducimus voluptas, eum provident corrupti, tempore, quidem iure nisi ipsam temporibus dignissimos reiciendis magnam quas rerum! Ipsum, rerum.
         </div>
         <img src="" alt="">
         <div class="content__part"></div>
         <div class="date">06.12.2022</div>
   </div>
</div>
<?php include('footer.php');?> 