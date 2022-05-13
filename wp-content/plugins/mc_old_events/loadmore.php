<?php
function load_posts () {
    $args = unserialize( stripslashes( $_POST['query'] ) );
    $args['paged'] = $_POST['page'] + 1; // следующая страница 

    query_posts( $args );
    if ( have_posts() ) {
        while ( have_posts() ) { the_post();

            if ($_POST['tpl'] === 'news') {
               ?>
 <div class="publication">
      <div class="title">
         <?php the_title(); ?>
      </div>
      <div class="content">
            <?php echo wp_trim_words(get_the_content(), 35);?><a class="read__more" href="<?php echo the_permalink();?>">Learn more</a>
         </div>
         <img src="" alt="">
         <div class="content__part"></div>
         <div class="date"><?php echo get_post_meta($post -> ID, '_event_date', true); ?></div>
   </div>
	<?php
            }

            
        }
        die();
    }
}
add_action('wp_ajax_loadmore', 'load_posts');
add_action('wp_ajax_nopriv_loadmore', 'load_posts');
?>