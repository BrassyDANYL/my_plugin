<?php
function mytheme_comment($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case '' :
?>
            <div id="comment-<?php comment_ID(); ?>">
             <div id="comment_block">
                <div class="comment-author vcard">
                    <?php echo get_avatar( $comment->comment_author_email, $args['avatar_size']); ?>
               <div class="coll_comm">Комментариев: <?php commentCount(); ?></div>
               </div>
                </div>

            <li class="post pingback">
                <?php comment_author_link(); ?>
                <?php edit_comment_link( __( 'Редактировать' ), ' ' ); ?>
<?php
        break;
    endswitch;
}
 
//Comment Counter
function commentCount(){
global $wpdb;
$count = $wpdb->get_var('SELECT COUNT(comment_ID) FROM ' . $wpdb->comments. ' WHERE comment_author_email = "' . get_comment_author_email() . '"');
echo $count . '';
}




?>