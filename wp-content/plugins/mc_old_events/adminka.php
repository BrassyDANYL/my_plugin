<?php 
add_action( 'admin_menu', 'my_plugin_page');
function my_plugin_page() {
   add_menu_page( 'OE Settings', 'Old Events Settings', 'manage_options', 'mymenu', 'my_menu_point', 'dashicons-button', 4); 
} 



function my_menu_point() {
?>
<form method="post">
<br>
<label for="np">Введите количество постов</label>
<input type="number" value="1" name="np"><br><br>
<label for="importance">Введите важность событий</label>
<input type="number" value="5" name="importance" placeholder="5" max="5">
<input type="submit" name="submit" value="Generate shortcode">
</form>
<?php
$np = $_POST['np'];
$importance = $_POST['importance'];
?>
<p>Copy this after click on button:</p>
[addOldEvents importance="<?php echo $importance?>" numberposts="<?php echo $np?>"];


<!-- <form method="post">
<p>Choose one please:</p>
<label  for="load-or-pagination" >Pagination</label>
<input class="load-or-pagination" name="load-or-pagination" type="radio" val="1"><br>
<label for="load-or-pagination">Load more button</label>
<input class="load-or-pagination" name="load-or-pagination" type="radio" val="2">
<button type="submit" value="<?php _e('Save') ?>">Use</button>
</form> -->

<?php
}
?>