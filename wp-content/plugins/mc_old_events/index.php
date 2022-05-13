<?php 
/*
Plugin Name: Old Events 
Description: This plugin adds functionality to add custom post type Old Events 
Version: 1.0
Author: Brassy
*/

//Our Scripts
add_action('wp_enqueue_scripts', 'files');

function files() {
   wp_enqueue_script( 'jquery' );
   wp_register_script( 'true_loadmore', plugins_url('/js/scripts.js', __FILE__ ), array('jquery'), time());

   wp_localize_script('true_loadmore', 'misha', array('ajaxurl' => admin_url('admin-ajax.php')));
   wp_enqueue_script( 'true_loadmore' );
}


//Features
function add_custom_features() {
add_theme_support('post-thumbnails');
}

add_action( 'after_setup_theme', 'add_custom_features');

//Old Event post type
require __DIR__ . '/customPT.php';
//comments
require __DIR__ . '/comments.php';
//sidebar
require __DIR__ . '/sidebar.php';
//date picker
require __DIR__ . '/date-field.php';
//calendar
require __DIR__ . '/calendar.php';
//shortcode
require __DIR__ . '/shortcode.php';
//adminka
require __DIR__ . '/adminka.php';
//loadmore button
require __DIR__ . '/loadmore.php';
//custom command for WP-CLI
require __DIR__ . '/deletecommand.php';

