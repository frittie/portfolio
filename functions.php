<?php
load_theme_textdomain('portfolio', TEMPLATEPATH .'/languages'); //laddar in översättningen

//Laddar in main.js
function my_scripts_method() {
    wp_enqueue_script(
        'main',
        get_stylesheet_directory_uri() . '/js/main.js',
        array( 'jquery' )
    );
}
add_action( 'wp_enqueue_scripts', 'my_scripts_method' );

function load_wp_media_files(){
    wp_enqueue_media();
}
add_action('admin_enqueue_scripts', 'load_wp_media_files');

//skapar menyn
register_nav_menus(array(
	'main_menu' => __('Head Menu', 'portfolio')
    )); 

//skapar olika storlikar på thumbnails
add_theme_support('post-thumbnails'); //beskär bilden till en "thumbnail" = 50x50px
add_image_size('mobile-thumb', 300, 500, true); //true beskär bilden
add_image_size('project-image', 700, 500, false);
add_image_size('project-image2', 550, 400, false);
add_image_size('insta', 350, 350, false); 


/***************************************************************************************/
/******************************* CUSTOM POST TYPES *************************************/
/***************************************************************************************/
/* Skapar Custom Post Type där man kan fylla i projektets Titel, Exerpt och thumbnail */
function projects() {
    $args = array(
      'label' => 'Projects',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'project'),
        'query_var' => true,
        'menu_icon' => 'dashicons-clipboard',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'comments',
            )
        );
    register_post_type( 'project', $args );
}
add_action( 'init', 'projects' ); //Kallar på funktionen "projects"

/* Skapar Custom Post Type där man kan registrera sina skills */
function skills() {
    $args = array(
      'label' =>  __('Skills', 'fridasportfolio'),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'skills'),
        'query_var' => true,
        'menu_icon' => 'dashicons-heart',
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
        )
    );
    register_post_type( 'skills', $args );
}
add_action( 'init', 'skills' ); //Kallar på funktionen "skills"
