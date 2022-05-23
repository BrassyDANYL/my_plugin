<?php

class deleteCommand{
    public function delete($args, $assoc_args) {
    $importance = $assoc_args['importance'];
    $importance_terms = get_terms([
    'taxonomy' => 'importance',
    'hide_empty' => false
    ]);
    global $newimportance;
    $query = new WP_Query( array(
         'post-type' => 'old_event',
         'importance' => $assoc_args
    ));

        }
        }
    
        if (class_exists('WP_CLI')){
        WP_CLI::add_command( 'old_events', 'deleteCommand');
        WP_CLI::success( 'Post(s) deleted');
    
        }