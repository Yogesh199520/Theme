<?php
/*==============================*/
// @package LCA
// @author SLICEmyPAGE
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
if ( ! function_exists( 'lca_setup' ) ) :
function lca_setup() {
    // Make theme available for translation.
    load_theme_textdomain( 'LCA' );
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
        'header' => __( 'Header Navigation', 'LCA' ),
        'footer' => __( 'Footer Navigation', 'LCA' )
    ) );
    // This theme styles the visual editor to resemble the theme style,
    add_editor_style( array( 'editor-style.css', /*lca_fonts_url()*/ ) ); //get_stylesheet_uri()
   
    if(!file_exists(get_template_directory().'/class-wp-bootstrap-navwalker.php')){
        // File does not exist... return an error.
        return new WP_Error('class-wp-bootstrap-navwalker-missing', __('It appears the class-wp-bootstrap-navwalker.php file may be missing.','wp-bootstrap-navwalker'));
    }else{
        // File exists... require it.
        require_once get_template_directory().'/class-wp-bootstrap-navwalker.php';
    }
}
endif;
add_action( 'after_setup_theme', 'lca_setup' );
// Sets the content width in pixels, based on the theme's design and stylesheet.
function lca_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'lca_content_width', 1170 );
}
add_action( 'after_setup_theme', 'lca_content_width', 0 );



/***********************************************************************************************/
/* Register Custom Post Type */
/***********************************************************************************************/
function lca_register_post_type() {
 
    $singular = 'Testimonial';
    $plural = 'Testimonials';
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
        'show_in_nav_menus'     => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_admin_bar'     => false,
        'menu_position'         => 56,
        'menu_icon'             => 'dashicons-testimonial',
        'can_export'            => true,
        'delete_with_user'      => false,
        'hierarchical'          => true,
        'has_archive'           => true,
        'query_var'             => false,
        'capability_type'       => 'post',
        'map_meta_cap'          => true,
        // 'capabilities'       => array(),
        'rewrite'               => array(
            'slug'      => 'testimonial',
            'with_front'=> true,
            'pages'     => true,
            'feeds'     => false
        ),
        'supports'              => array(
            'title',
            'custom-fields',
        )
    );
    register_post_type('testimonial',$args);


    $singular = 'Coaches';
    $plural = 'Coaches';
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
        'show_in_nav_menus'     => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_admin_bar'     => false,
        'menu_position'         => 56,
        'menu_icon'             => 'dashicons-admin-post',
        'can_export'            => true,
        'delete_with_user'      => false,
        'hierarchical'          => true,
        'has_archive'           => true,
        'query_var'             => false,
        'capability_type'       => 'post',
        'map_meta_cap'          => true,
        // 'capabilities'       => array(),
        'rewrite'               => array(
            'slug'      => 'testimonial',
            'with_front'=> true,
            'pages'     => true,
            'feeds'     => false
        ),
        'supports'              => array(
            'title',
            'custom-fields',
        )
    );
    register_post_type('coaches',$args);
    register_taxonomy( 'coaches_categories', array('coaches'), array(
        'hierarchical' => true,
        'show_admin_column'=> true,
        'show_in_nav_menus'=>false,
        'labels' => array('name'=>'Coaches Categories','singular_name'=>'Category','menu_name'=>'Categories'),
        'rewrite' => array( 'slug' => 'coaches-category', 'with_front'=> false )
        )
    );

    flush_rewrite_rules();
}
add_action( 'init', 'lca_register_post_type' );
/***********************************************************************************************/
/* Function for Google Fonts */
/***********************************************************************************************/
function lca_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'swap';
    /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
    if('off' !== _x( 'on', 'Open Sans font: on or off', 'LCA')){
        $fonts[] = 'family=Open Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800';
    }
    if('off' !== _x( 'on', 'Montserrat: on or off', 'LCA')){
        $fonts[] = 'family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600';
    }
    if('off' !== _x( 'on', 'Poppins: on or off', 'LCA')){
        $fonts[] = 'family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400';
    }
    if($fonts){
        $fonts_url = 'https://fonts.googleapis.com/css2?'.implode('&',$fonts).'&display='.$subsets;
    }
    return $fonts_url;
}

/***********************************************************************************************/
/* Proper way to enqueue scripts and styles */
/***********************************************************************************************/
function lca_css_scripts() {
    wp_dequeue_style( 'wp-block-library' );
    wp_enqueue_style('google-fonts', lca_fonts_url(), array(), null );
    wp_enqueue_style('bootstrap', THEMEURI.'/include/css/bootstrap.min.css',array(),'4.6.0', 'all');
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array('bootstrap') );

    wp_enqueue_script('fontawesome','https://kit.fontawesome.com/20dd01c86d.js',array(),null,false); 
    wp_enqueue_script('bootstrap', THEMEURI.'/include/js/bootstrap.min.js',array('jquery'),'4.6.0',true);
    wp_enqueue_script('theme-plugins', THEMEURI.'/include/js/main.js',array(), null, true);
    wp_enqueue_script('theme-script', THEMEURI.'/include/js/custom.js',array('bootstrap'),null,true);
    wp_localize_script('jquery','ajax_object',array(
        'ajax_url'  =>  admin_url('admin-ajax.php'),
    ));
    wp_add_inline_script( 'jquery', 'var $ = jQuery.noConflict();' );
    if(is_singular() && comments_open() && get_option('thread_comments')){
        wp_enqueue_script('comment-reply');
    }
}
add_action( 'wp_enqueue_scripts', 'lca_css_scripts' );

/***********************************************************************************************/
/* Current year by shortcode */
/***********************************************************************************************/
function lca_current_year_shortcode() {
  $year = date('Y');
  return $year;
}
add_shortcode('current_year', 'lca_current_year_shortcode');

/***********************************************************************************************/
/* Page Slug Body Class */
/***********************************************************************************************/
function lca_add_slug_body_class( $classes ) {
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
add_filter( 'body_class', 'lca_add_slug_body_class' );

/***********************************************************************************************/
/* Filter for CF7 select empty */
/***********************************************************************************************/
function lca_wpcf7_form_elements($html) {
    $text = 'Please select';
    $html = str_replace('<option value="">---</option>', '<option value="">' . $text . '</option>', $html);
    return $html;
}
add_filter('wpcf7_form_elements', 'lca_wpcf7_form_elements');

/***********************************************************************************************/
/* Remove auto p from Contact Form 7 shortcode output */
/***********************************************************************************************/
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
    return false;
}


/***********************************************************************************************/
/* Theme Option */
/***********************************************************************************************/
if(function_exists('acf_add_options_page')){
    acf_add_options_page(array(
        'page_title'    =>  __('Theme Options','LCA'),
        'menu_title'    =>  __('Theme Options','LCA'),
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
add_action('init', 'lca_remove_tax');
function lca_remove_tax() {
    //register_taxonomy('category', array());
    register_taxonomy('post_tag', array());
    register_taxonomy('post', array());
    register_taxonomy('category', array());
   // register_post_type('post', array());
}
// Removes from admin menu
add_action( 'admin_menu', 'lca_remove_admin_menus' );
function lca_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
    remove_menu_page('edit.php');
}
// Removes from post and pages
add_action('init', 'lca_remove_comment_support', 100);
function lca_remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function lca_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'lca_admin_bar_render' );


