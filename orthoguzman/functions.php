<?php
/*==============================*/
// @package Orthoguzman
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
if ( ! function_exists( 'orthoguzman_setup' ) ) :
function orthoguzman_setup() {
    // Make theme available for translation.
    load_theme_textdomain( 'Orthoguzman' );
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
        'header' => __( 'Header Navigation', 'Orthoguzman' ),
        'footer' => __( 'Footer Navigation', 'Orthoguzman' )
    ) );
    // This theme styles the visual editor to resemble the theme style,
    add_editor_style( array( 'editor-style.css', /*orthoguzman_fonts_url()*/ ) ); //get_stylesheet_uri()
   
    if(!file_exists(get_template_directory().'/class-wp-bootstrap-navwalker.php')){
        // File does not exist... return an error.
        return new WP_Error('class-wp-bootstrap-navwalker-missing', __('It appears the class-wp-bootstrap-navwalker.php file may be missing.','wp-bootstrap-navwalker'));
    }else{
        // File exists... require it.
        require_once get_template_directory().'/class-wp-bootstrap-navwalker.php';
    }
}
endif;
add_action( 'after_setup_theme', 'orthoguzman_setup' );
// Sets the content width in pixels, based on the theme's design and stylesheet.
function orthoguzman_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'orthoguzman_content_width', 1200 );
}
add_action( 'after_setup_theme', 'orthoguzman_content_width', 0 );


/***********************************************************************************************/
/* Register Custom Post Type */
/***********************************************************************************************/
/*function orthoguzman_register_post_type() {
    $singular = 'Testimonail';
    $plural = 'Testimonails';
    $labels = array(
        'name'                  => $plural,
        'singular_name'         => $singular,
        'add_name'              => 'Add New',
        'add_new_item'          => 'Add New '.$singular,
        'edit'                  => 'Edit',
        'edit_item'             => 'Edit '.$singular,
        'new_item'              => 'New '.$singular,
        'view'                  => 'View '.$singular,
        'view_item'             => 'View '.$singular,
        'search_item'           => 'Search '.$plural,
        'parent'                => 'Parent '.$singular,
        'not_found'             => 'No '.$plural,
        'not_found_in_trash'    => 'No '.$plural.' in Trash',
    );
    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => false,
        'exclude_from_search'   => true,
        'show_in_nav_menus'     => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_admin_bar'     => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-testimonial',
        'can_export'            => true,
        'delete_with_user'      => false,
        'hierarchical'          => true,
        'has_archive'           => false,
        'query_var'             => true,
        'capability_type'       => 'post',
        'map_meta_cap'          => true,
        // 'capabilities'       => array(),
        'rewrite'               => array(
            'slug'      => 'testimonail',
            'with_front'=> false,
            'pages'     => true,
            'feeds'     => false
        ),
        'supports'      => array(
            'title',
            'custom-fields',
        ),
    );
    register_post_type('testimonail',$args);
    flush_rewrite_rules();
}
add_action('init', 'orthoguzman_register_post_type');*/

/***********************************************************************************************/
/* Proper way to enqueue scripts and styles */
/***********************************************************************************************/
function orthoguzman_css_scripts() {
    wp_dequeue_style( 'wp-block-library' );
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', array(), null );
   
    wp_enqueue_style('fancybox', THEMEURI.'/css/jquery.fancybox.min.css',array(),'1.0.0', 'all');
    wp_enqueue_style('flexslider', THEMEURI.'/css/flexslider.css',array(),'2.0', 'all');
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array('fancybox','flexslider') );

   /* wp_enqueue_script('fontawesome','https://kit.fontawesome.com/20dd01c86d.js',array(),null,false); */
    wp_enqueue_script('fancybox', THEMEURI.'/js/jquery.fancybox.min.js',array('jquery'),'5.0.0',true);
    wp_enqueue_script('theme-script', THEMEURI.'/js/custom.js',array('fancybox'),null,true);
    wp_enqueue_script('theme-plugins', THEMEURI.'/js/jquery.flexslider.js',array(), null, true);
    wp_localize_script('jquery','ajax_object',array(
        'ajax_url'  =>  admin_url('admin-ajax.php'),
    ));
    wp_add_inline_script( 'jquery', 'var $ = jQuery.noConflict();' );
    if(is_singular() && comments_open() && get_option('thread_comments')){
        wp_enqueue_script('comment-reply');
    }
}
add_action( 'wp_enqueue_scripts', 'orthoguzman_css_scripts' );

/***********************************************************************************************/
/* Current year by shortcode */
/***********************************************************************************************/
function orthoguzman_current_year_shortcode() {
  $year = date('Y');
  return $year;
}
add_shortcode('current_year', 'orthoguzman_current_year_shortcode');

/***********************************************************************************************/
/* Page Slug Body Class */
/***********************************************************************************************/
function orthoguzman_add_slug_body_class( $classes ) {
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
add_filter( 'body_class', 'orthoguzman_add_slug_body_class' );


/***********************************************************************************************/
/* Theme Option */
/***********************************************************************************************/
if(function_exists('acf_add_options_page')){
    acf_add_options_page(array(
        'page_title'    =>  __('Theme Options','orthoguzman'),
        'menu_title'    =>  __('Theme Options','orthoguzman'),
        'menu_slug'     =>  'theme-general-settings',
        'capability'    =>  'edit_posts',
        'position'      =>  58,
        'redirect'      =>  false
    ));
}
/***********************************************************************************************/
/* Actions for removing category,tags & comments */
/***********************************************************************************************/
// Remove Categories and Tags
add_action('init', 'orthoguzman_remove_tax');
function orthoguzman_remove_tax() {
    //register_taxonomy('category', array());
    //register_taxonomy('post_tag', array());
    // register_taxonomy('post', array());
    //register_taxonomy('category', array());
   // register_post_type('post', array());
}
// Removes from admin menu
add_action( 'admin_menu', 'orthoguzman_remove_admin_menus' );
function orthoguzman_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
    // remove_menu_page('edit.php');
}
// Removes from post and pages
add_action('init', 'orthoguzman_remove_comment_support', 100);
function orthoguzman_remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function orthoguzman_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'orthoguzman_admin_bar_render' );



/****************************************************
 * 
/***********************************************************************************************/
/* Grandparent Active */
/***********************************************************************************************/
function wpse_310629_nav_menu_css_class( $classes, $item, $args, $depth ) {
    if ($depth === 0 ) {
        if ( 
            in_array( 'current-menu-item', $classes ) || 
            in_array( 'current-menu-ancestor', $classes ) 
        ) {
            $classes[] = 'active';
        }
    }

    return $classes;
}
add_filter( 'nav_menu_css_class', 'wpse_310629_nav_menu_css_class', 10, 4 );
