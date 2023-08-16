<?php 
require_once get_theme_file_path( '/inc/tgm.php' );


function orjanik_theme_setup(){
    load_theme_textdomain('orjanik', get_theme_file_uri('/languages'));
    add_theme_support( 'title-tag' );
    add_theme_support('custom-logo');
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support('html5', array('comment-form', 'search-form'));
    add_theme_support( 'post-formats', array( 'aside', 'gallery', 'image', 'video', 'quote', 'audio', 'link' ) );
    add_editor_style('/assets/css/editor-style.css');
}
add_action('after_setup_theme', 'orjanik_theme_setup');


function orjanik_assets(){
    wp_enqueue_style( 'style-css', get_stylesheet_uri());

    wp_enqueue_style( 'cairo-font', '//fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap');

    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', '1.0', 'all');
    wp_enqueue_style( 'fontawesome-css', get_template_directory_uri() . '/assets/css/font-awesome.min.css', '1.0', 'all');
    wp_enqueue_style( 'elegant-icons-css', get_template_directory_uri() . '/assets/css/elegant-icons.css', '1.0', 'all');
    wp_enqueue_style( 'nice-select-css', get_template_directory_uri() . '/assets/css/nice-select.css', '1.0', 'all');
    wp_enqueue_style( 'jquery-ui-css', get_template_directory_uri() . '/assets/css/jquery-ui.min.css', '1.0', 'all');
    wp_enqueue_style( 'owl-carousel-css', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', '1.0', 'all');
    wp_enqueue_style( 'slicknav-css', get_template_directory_uri() . '/assets/css/slicknav.min.css', '1.0', 'all');
    wp_enqueue_style( 'orjanik-style-css', get_template_directory_uri() . '/assets/css/style.css', '1.0', 'all');

    wp_enqueue_script( 'bootrstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), 1.0,true);
    wp_enqueue_script( 'nice-select-js', get_template_directory_uri() . '/assets/js/jquery.nice-select.min.js', array('jquery'), 1.0,true);
    wp_enqueue_script( 'jquery-ui-js', get_template_directory_uri() . '/assets/js/jquery-ui.min.js', array('jquery'), 1.0,true);
    wp_enqueue_script( 'slicknav-js', get_template_directory_uri() . '/assets/js/jquery.slicknav.js', array('jquery'), 1.0,true);
    wp_enqueue_script( 'maxitup-js', get_template_directory_uri() . '/assets/js/mixitup.min.js', array('jquery'), 1.0,true);
    wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), 1.0,true);
    wp_enqueue_script( 'orjanik-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), 1.0,true);

}
add_action('wp_enqueue_scripts', 'orjanik_assets');