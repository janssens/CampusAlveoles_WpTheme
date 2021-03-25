<?php
add_action( 'wp_enqueue_scripts', 'enqueue_styles' );
function enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_uri() );
}

function print_menu_shortcode($attributes, $content = null) {
    extract(shortcode_atts(array( 'name' => null, 'class' => null ), $attributes));
    if (!$class){
        $class = 'content_menu';
    }
    if (wp_get_nav_menu_object($name)){
        return wp_nav_menu( array( 'menu' => $name, 'menu_class' => $class, 'echo' => false ) );
    }
}
add_shortcode('menu', 'print_menu_shortcode');
