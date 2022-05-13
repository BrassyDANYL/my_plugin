<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
   <div class="container">
   <ul class="archive__list">
      <?php 
      while(have_posts(
      )) {
         the_post(); ?>
         <li class="archive__elem"><a href="<?php echo the_permalink(); ?>"><?php the_title();?></a></li>

         <?php
      }
      ?>
      </ul>
<?php

 


?>
   </div>
<?php include('footer.php'); ?>