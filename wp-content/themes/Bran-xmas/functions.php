<?php


/*
=======================================
ENABLE STYLES AND SCRIPTS
=======================================
*/
function branxmas_script_enqueue(){
    wp_enqueue_style('titlename', get_template_directory_uri() . '/css/styles.css', array(), '0.0.1', 'all');
    wp_enqueue_style('titlename', get_template_directory_uri() . '/css/aboutstyles.css', array(), '0.0.1', 'all');
} 


add_action('wp_enqueue_scripts', 'branxmas_script_enqueue');





/*
==========================================
ENABLE MENUS
==========================================
*/

function branxmas_theme_setup(){
    add_theme_support('menus');
    register_nav_menu('primaryNav', 'Nav used across site');
}

add_action('init', 'branxmas_theme_setup');

add_theme_support('post-formats', array('aside', 'image', 'video'));


?>