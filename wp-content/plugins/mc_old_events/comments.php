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




//likes



//---- Add buttons to top of post content
	function ip_post_likes($content) {
		// Check if single post
		if(is_singular('old_event')) {
			ob_start();

			?>
				<ul class="likes">
					<li class="likes__item likes__item--like">
						<a href="<?php echo add_query_arg('post_action', 'like'); ?>">
							Like (<?php echo ip_get_like_count('likes') ?>)
						</a>
					</li>
					<li class="likes__item likes__item--dislike">
						<a href="<?php echo add_query_arg('post_action', 'dislike'); ?>">
							Dislike (<?php echo ip_get_like_count('dislikes') ?>)
						</a>
					</li>
				</ul>
			<?php

			$output = ob_get_clean();

			return $output . $content;
		}else {
			return $content;
		}
	}

	add_filter('the_content', 'ip_post_likes');

	//---- Get like or dislike count
	function ip_get_like_count($type = 'likes') {
		$current_count = get_post_meta(get_the_id(), $type, true);

		return ($current_count ? $current_count : 0);
	}

	//---- Process like or dislike
	function ip_process_like() {
		$processed_like = false;
		$redirect       = false;

		// Check if like or dislike
		if(is_singular('post')) {
			if(isset($_GET['post_action'])) {
				if($_GET['post_action'] == 'like') {
					// Like
					$like_count = get_post_meta(get_the_id(), 'likes', true);

					if($like_count) {
						$like_count = $like_count + 1;
					}else {
						$like_count = 1;
					}

					$processed_like = update_post_meta(get_the_id(), 'likes', $like_count);
				}elseif($_GET['post_action'] == 'dislike') {
					// Dislike
					$dislike_count = get_post_meta(get_the_id(), 'dislikes', true);

					if($dislike_count) {
						$dislike_count = $dislike_count + 1;
					}else {
						$dislike_count = 1;
					}

					$processed_like = update_post_meta(get_the_id(), 'dislikes', $dislike_count);
				}

				if($processed_like) {
					$redirect = get_the_permalink();
				}
			}
		}

		// Redirect
		if($redirect) {
			wp_redirect($redirect);
			die;
		}
	}

	add_action('template_redirect', 'ip_process_like');
?>