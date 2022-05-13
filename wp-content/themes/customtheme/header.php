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
   <br><a class="menu__elem" href="<?php echo site_url('/test-shortcode');?>">test shorcode</a>
</div> 
</header>
   


