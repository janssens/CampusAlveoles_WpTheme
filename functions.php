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

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_609a925725a6e',
        'title' => 'Split page',
        'fields' => array(
            array(
                'key' => 'field_609a9287f0d27',
                'label' => 'Page membres gratuits',
                'name' => 'page_membres_gratuits',
                'type' => 'post_object',
                'instructions' => 'Page pour les membres gratuits',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'page',
                ),
                'taxonomy' => '',
                'allow_null' => 0,
                'multiple' => 0,
                'return_format' => 'object',
                'ui' => 1,
            ),
            array(
                'key' => 'field_609a92e9f0d28',
                'label' => 'Page membres payants',
                'name' => 'page_membres_payants',
                'type' => 'post_object',
                'instructions' => 'Page pour les membres payants',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'page',
                ),
                'taxonomy' => '',
                'allow_null' => 0,
                'multiple' => 0,
                'return_format' => 'object',
                'ui' => 1,
            ),
            array(
                'key' => 'field_609a9345f0d29',
                'label' => 'Page non membre / non connecté',
                'name' => 'page_non_membre',
                'type' => 'post_object',
                'instructions' => 'Page pour les internaute non connecté',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'page',
                ),
                'taxonomy' => '',
                'allow_null' => 0,
                'multiple' => 0,
                'return_format' => 'object',
                'ui' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-template/pmp-switch.php',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'acf_after_title',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => array(
            0 => 'the_content',
        ),
        'active' => true,
        'description' => '',
    ));

endif;