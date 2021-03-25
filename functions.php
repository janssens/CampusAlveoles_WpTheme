<?php
add_action( 'wp_enqueue_scripts', 'enqueue_styles' );
function enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_uri() );
}

function print_menu_shortcode($attributes, $content = null) {
    extract(shortcode_atts(array( 'logged_in_menu' => null, 'logged_out_menu' => null, 'class' => null ), $attributes));
    if (!$class){
        $class = 'content_menu';
    }
    $menu_name = '';
    if (is_user_logged_in()){
        $menu_name = $logged_in_menu;
    }else{
        $menu_name = $logged_out_menu;
    }
    if (wp_get_nav_menu_object($menu_name)){
        return wp_nav_menu( array( 'menu' => $menu_name, 'menu_class' => $class, 'echo' => false ) );
    }
}
add_shortcode('menu', 'print_menu_shortcode');
