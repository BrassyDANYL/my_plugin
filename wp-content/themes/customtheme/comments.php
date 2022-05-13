<?php // DO NOT DELETE THESE LINES
    if (post_password_required()) {           
            echo '<p class="nocomments">Эта запись защищена паролем. Введите пароль чтобы увидеть комментарии.</p>';
            return;
        }
    $oddcomment = "graybox";
?>
<?php if ($comments) : ?>
   <h4 class="comments"><?php comments_number('Комментарии  %' );?></h4>
    <?php $args = array(
     'avatar_size'       => 70,
     'reply_text'       => 'Send',
     'callback'          => 'mytheme_comment',
     'page'                 => 0,
     'per_page'             => 8
       ); 
       ?>
         
  
    <ul class="comments-list"><?php wp_list_comments($args); ?></ul>
    <div id="comment-nav-above">
    <?php paginate_comments_links() ?>
    </div>
<?php else:?>
    <?php if (comments_open()) : ?>
    <?php elseif (!is_page()) : // COMMENTS ARE CLOSED ?>
        <h4>Комментарии запрещены.</h4>
     <?php endif; ?>
<?php endif; ?>
<?php if (comments_open()) : ?>

<?php 
$args = array(
        'comment_notes_before' => '<p class="comment-notes"><a id="reg" href="/wp-login.php">Войдите</a> или заполните поля ниже. Ваш e-mail не будет опубликован. Обязательные поля помечены *</p>',
        'comment_field'        => '<p class="comment-form-comment "><label for="comment" >' . _x( 'Comment', 'noun' ) . '</label><br /> <textarea id="comment" name="comment" rows="8"  aria-required="true"></textarea></p>',
        'comment_notes_after'  => '<label>Do you like this post?</label><input type="checkbox" class="like">',
        'id_submit'            => '',
        'label_submit'         => __( 'Send' ),
        'paged' => get_query_var('paged', 1)
        
    );
comment_form( $args );
?>
<?php endif; ?>