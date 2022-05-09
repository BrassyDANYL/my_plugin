<!DOCTYPE html>
<html lang="en">
<head>
   <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
   <?php wp_head();?>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
<header>
<div class="container">
   <a href="<?php echo site_url();?>"><h1>News of Our Company <br> <i class="fa-solid fa-newspaper"></i></h1></a>
    <ul class="menu">
      <a href="<?php echo site_url('/old-events'); ?>"><li class="menu__elem">Old Events</li></a>
    </ul>
</div> 
</header>
   


