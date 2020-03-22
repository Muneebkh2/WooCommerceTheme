<?php

function load_stylesheets()
{
    // main stylesheet
    wp_register_style('stylesheet', get_template_directory_uri() . '/style.css', '', 1, 'all');
    wp_enqueue_style('stylesheet');
    // webpack stylesheet
    wp_register_style('custom', get_template_directory_uri() . '/app.css', '', 1, 'all');
    wp_enqueue_style('custom');
}
add_action('wp_enqueue_scripts', 'load_stylesheets');

// load scripts
function load_javascript()
{
    // webpack javascript
    wp_register_script('custom', get_template_directory_uri() . '/app.js', 'jquery', 1, true);
    wp_enqueue_script('custom');
}

add_action('wp_enqueue_scripts', 'load_javascript');

// enable options for wordpress panel
add_theme_support('menus');
add_theme_support('post-thumbnails');


// register_menus array
register_nav_menus( 
    array(
        'top_menu' => __('Top Menu')
    )
);

// image size transform all uploaded images into size
add_image_size('post_iamge', 1100, 750, true);

// add sidebar method
register_sidebar( array(
    'name' => 'Page Sidebar',
    'id' => 'page-sidebar',
    'class' => '',
    'before_title' => '<h4>',
    'after_title' => '</h4>',
) );

// Declaring woocomerce_custom_theme Support
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );





?>