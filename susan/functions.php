<?php
/*==============================*/
// @package SusanCalman
// @author ThinkEQ
/*==============================*/
if(!defined('ABSPATH')){
    exit; // Exit if accessed directly
}
/* ==============================
** Define Constants
** ============================== */
define('THEMEURI', get_theme_file_uri());
define('IMG', THEMEURI.'/include/images/');
define('THEMEDIR', get_template_directory());
if(!function_exists('susan_theme_setup')) :
    function susan_theme_setup() {
        // Add default posts and comments RSS feed links to head.
        //add_theme_support('automatic-feed-links');
        // Add theme support textdomain.
        load_theme_textdomain('susan');
        // Add theme support title tag.
        add_theme_support('title-tag');
        // Add theme support post thumbnails.
        add_theme_support('post-thumbnails');
        // Add theme support responsive embeds.
        add_theme_support('responsive-embeds');
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );
        // Resistor Susan nav menu
        register_nav_menus(
            array(
              'header_menu'   => __('Header Menu','susan'),
              'footer_menu'   => __('Footer Menu','susan'),
            )
        );
        // This theme styles the visual editor to resemble the theme style,
        add_editor_style( array( 'editor-style.css', susan_fonts_url() ) ); //get_stylesheet_uri()

        if(!file_exists(get_template_directory().'/class-wp-bootstrap-navwalker.php')){
            // File does not exist... return an error.
            return new WP_Error('class-wp-bootstrap-navwalker-missing', __('It appears the class-wp-bootstrap-navwalker.php file may be missing.','wp-bootstrap-navwalker'));
        }else{
            // File exists... require it.
            require_once get_template_directory().'/class-wp-bootstrap-navwalker.php';
        }
    }
endif;
add_action( 'after_setup_theme', 'susan_theme_setup');
// Sets the content width in pixels, based on the theme's design and stylesheet.
function susan_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'susan_content_width', 1170 );
}
add_action( 'after_setup_theme', 'susan_content_width', 0 );
/***********************************************************************************************/
/* Function for Google Fonts */
/***********************************************************************************************/
function susan_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'swap';
    /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
    if('off' !== _x( 'on', 'Poppins font: on or off', 'susan')){
        $fonts[] = 'family=Poppins:wght@300;400;500;600;700;800;900';
    }
    if($fonts){
        $fonts_url = 'https://fonts.googleapis.com/css2?'.implode('&',$fonts).'&display='.$subsets;
    }
    return $fonts_url;
}
/***********************************************************************************************/
if(!is_admin()){
/***********************************************************************************************/
/* Proper way to enqueue scripts and styles */
/***********************************************************************************************/
function susan_css_scripts() {
    wp_dequeue_style( 'wp-block-library' );
    if(!is_page(array('contact',61))){
        wp_dequeue_style( 'contact-form-7' );
        wp_dequeue_script( 'contact-form-7' );
    }
    wp_enqueue_style('google-fonts', susan_fonts_url(), array(), null );
    wp_enqueue_style('bootstrap', THEMEURI.'/include/css/bootstrap.min.css',array(),'4.5.2', 'all');
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array('bootstrap') );

    wp_enqueue_script('bootstrap', THEMEURI.'/include/js/bootstrap.min.js',array('jquery-core'),'4.5.2',true);
    wp_enqueue_script('main-script', THEMEURI.'/include/js/main.js',array(),'1.0',true);
    /*wp_enqueue_script('fontawesome','https://kit.fontawesome.com/20dd01c86d.js',array(),null,false);*/
    wp_enqueue_script('theme-script', THEMEURI.'/include/js/custom.js',array(),null,true);
    wp_localize_script('theme-script','ajax_object',array('ajax_url'=>admin_url('admin-ajax.php'), 'home_url'=>get_bloginfo('url')));
    wp_add_inline_script( 'jquery-core', 'var $ = jQuery.noConflict();' );
}
add_action( 'wp_enqueue_scripts', 'susan_css_scripts' );
/***********************************************************************************************/
/* Page Slug Body Class */
/***********************************************************************************************/
function susan_add_slug_body_class( $classes ) {
global $wpdb, $post;
if ( isset( $post ) ) {
    $classes[] = $post->post_name;
}
if (is_page()) {
    if ($post->post_parent) {
        $parent  = end(get_post_ancestors($current_page_id));
    } else {
        $parent = $post->ID;
    }
    $post_data = get_post($parent, ARRAY_A);
    $classes[] = $post_data['post_name'];
}
return $classes;
}
add_filter( 'body_class', 'susan_add_slug_body_class' );
/***********************************************************************************************/
/* filter for adding class in nav menu */
/***********************************************************************************************/
add_filter('nav_menu_css_class' , 'susan_active_nav_class' , 10 , 2);
function susan_active_nav_class ($classes, $item) {
    if (in_array('current-post-ancestor', $classes) || in_array('current-page-ancestor', $classes) || in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    if((is_singular('post') || is_category()) && in_array('menu-item-59', $classes)){
        $classes[] = 'active ';
    }
    return $classes;
}
/***********************************************************************************************/
// Get Current Year Short Code
/***********************************************************************************************/
function susan_current_year(){
    $year = date_i18n('Y');
    return $year;
}
add_shortcode('current_year','susan_current_year');
/***********************************************************************************************/
/* Remove auto p from Contact Form 7 shortcode output */
/***********************************************************************************************/
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
    return false;
}
/***********************************************************************************************/
// Replace IMG ALT with title if ALT is empty
/***********************************************************************************************/
function ao_filter_gallery_img_atts( $atts, $attachment ) {
    if(empty($atts['alt'])){
        $atts['alt'] = str_replace('-', ' ', get_the_title($attachment->ID));
    }
    return $atts;
}
add_filter( 'wp_get_attachment_image_attributes', 'ao_filter_gallery_img_atts', 10, 2 );
}
/***********************************************************************************************/
if(is_admin()){
/***********************************************************************************************/
/* Theme Option */
/***********************************************************************************************/
if(function_exists('acf_add_options_page')){
    acf_add_options_page(array(
        'page_title'    =>  __('Theme Options','susan'),
        'menu_title'    =>  __('Theme Options','susan'),
        'menu_slug'     =>  'theme-general-settings',
        'capability'    =>  'edit_posts',
        'position'      =>  59,
        'redirect'      =>  false
    ));
}

/***********************************************************************************************/
/* Actions for removing category,tags & comments */
/***********************************************************************************************/
// Remove Categories and Tags
add_action('init', 'susan_remove_tax');
function susan_remove_tax() {
    register_taxonomy('category', array());
    register_taxonomy('post_tag', array());
    register_post_type('post', array());
}
// Removes from admin menu
add_action( 'admin_menu', 'susan_remove_admin_menus' );
function susan_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action('init', 'susan_remove_comment_support', 100);
function susan_remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function susan_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'susan_admin_bar_render' );

}