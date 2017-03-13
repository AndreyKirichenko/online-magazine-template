<?php

include_once ('includes/main-menu-walker.php');
include_once ('includes/drawer-menu-walker.php');
include_once ('includes/oriolo_pagination.php');
include_once ('includes/parse_gallery_shortcode.php');

function enqueue_styles() {
    wp_enqueue_style( 'whitesquare-style', get_stylesheet_uri());
    wp_register_style('font-style', 'http://fonts.googleapis.com/css?family=Oswald:400,300');
    wp_enqueue_style( 'font-style');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

function enqueue_scripts () {
    wp_register_script('html5-shim', 'http://html5shim.googlecode.com/svn/trunk/html5.js');
    wp_enqueue_script('html5-shim');
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}

show_admin_bar(false);

function wpdocs_custom_excerpt_length( $length ) {
    return 12;
}

function wpdocs_excerpt_more( $more ) {
    return '&nbsp;…';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


function my_permalink() {
    echo substr(get_permalink(), strlen(get_option('home')));
}

remove_shortcode('gallery');
add_shortcode('gallery', 'parse_gallery_shortcode');
