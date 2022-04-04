<?php
/*==============================*/
// @package Paradise
// @author SLICEmyPAGE
/*==============================*/
if(!defined('ABSPATH')){
  exit; // Exit if accessed directly
}

/* ==============================
** Define Constants
** ============================== */
define('THEMEURI', get_theme_file_uri());
define('IMG', THEMEURI.'/images/');
define('THEMEDIR', get_template_directory());
if ( ! function_exists( 'paradisesetup' ) ) :
function paradisesetup() {
    // Make theme available for translation.
    load_theme_textdomain( 'Paradise' );
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
    //Let WordPress manage the document title.
    add_theme_support( 'title-tag' );
    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );
     
    //add_image_size('blog-thumbnails',704,380,array('center','center'));
    // Add support for responsive embeds.
    add_theme_support( 'responsive-embeds' );
    //Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',
        )
    );
    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus( array(
        'header' => __( 'Header Navigation', 'Paradise' ),
        'footer' => __( 'Footer Navigation', 'Paradise' )
    ));
    // This theme styles the visual editor to resemble the theme style,
    add_editor_style( array( 'editor-style.css', /*paradisefonts_url()*/ ) ); //get_stylesheet_uri()
    
}
endif;

add_action( 'after_setup_theme', 'paradisesetup' );
// Sets the content width in pixels, based on the theme's design and stylesheet.
function paradisecontent_width() {
    $GLOBALS['content_width'] = apply_filters( 'paradisecontent_width', 1280 );
}
add_action( 'after_setup_theme', 'paradisecontent_width', 0 );



/***********************************************************************************************/
/* Proper way to enqueue scripts and styles */
/***********************************************************************************************/
function paradisecss_scripts() {
    wp_dequeue_style( 'wp-block-library' );
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap', array(), null );

    
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array('google-fonts') );

    wp_localize_script('jquery','ajax_object',array(
        'ajax_url'  =>  admin_url('admin-ajax.php'),
    ));
    wp_add_inline_script( 'jquery', 'var $ = jQuery.noConflict();' );
    if(is_singular() && comments_open() && get_option('thread_comments')){
        wp_enqueue_script('comment-reply');
    }
}
add_action( 'wp_enqueue_scripts', 'paradisecss_scripts' );




/***********************************************************************************************/
/* Page Slug Body Class */
/***********************************************************************************************/
function paradiseadd_slug_body_class( $classes ) {
    global $wpdb, $post;
    if ( isset( $post ) ) {
        $classes[] = $post->post_name;
    }
    if (is_page()) {
        if ($post->post_parent) {
            $get_post_ances = get_post_ancestors($post->ID);
            $parent  = end($get_post_ances);
        } else {
            $parent = $post->ID;
        }
        $post_data = get_post($parent, ARRAY_A);
        $classes[] = $post_data['post_name'];
    }
    return $classes;
}
add_filter( 'body_class', 'paradiseadd_slug_body_class' );


/***********************************************************************************************/
/* Theme Option */
/***********************************************************************************************/
if(function_exists('acf_add_options_page')){
    acf_add_options_page(array(
        'page_title'    =>  __('Theme Options','Paradise'),
        'menu_title'    =>  __('Theme Options','Paradise'),
        'menu_slug'     =>  'theme-general-settings',
        'capability'    =>  'edit_posts',
        'position'      =>  62,
        'redirect'      =>  false
    ));
}


/***********************************************************************************************/
/* Actions for removing category,tags & comments */
/***********************************************************************************************/
// Remove Categories and Tags
add_action('init', 'paradiseremove_tax');
function paradiseremove_tax() {
    register_taxonomy('category', array());
    register_taxonomy('post_tag', array());
    register_taxonomy('post', array());
    register_taxonomy('category', array());
    register_post_type('post', array());
}
// Removes from admin menu
add_action( 'admin_menu', 'paradiseremove_admin_menus' );
function paradiseremove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
    // remove_menu_page('edit.php');
}
// Removes from post and pages
add_action('init', 'paradiseremove_comment_support', 100);
function paradiseremove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function paradiseadmin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'paradiseadmin_bar_render' );
