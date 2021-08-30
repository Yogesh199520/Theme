<?php
/*==============================*/
// @package SketchMesh
// @author SLICEmyPAGE
/*==============================*/
/* ==============================
** Define Constants
** ============================== */
define('THEMEDIR', get_theme_file_uri());
define('IMG', THEMEDIR.'/include/images/');
if ( ! function_exists( 'sm_setup' ) ) :
function sm_setup() {
	// Make theme available for translation.
	load_theme_textdomain( 'sm' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	//Let WordPress manage the document title.
	add_theme_support( 'title-tag' );
	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
    //add_image_size('blog-thumbnails',704,380,array('center','center'));
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
        'header' => __( 'Header Navigation', 'sm' ),
	) );
    // This theme styles the visual editor to resemble the theme style,
    add_editor_style( array( 'editor-style.css', sm_fonts_url() ) ); //get_stylesheet_uri()
    $GLOBALS['theme_options'] = array(
        'telephone' => get_field('telephone','option'),
        'telephone_strip' => str_replace(' ','',get_field('telephone','option')),
        'email' => get_field('email','option'),
        'address' => get_field('address','option')
    );
}
endif;
add_action( 'after_setup_theme', 'sm_setup' );
// Sets the content width in pixels, based on the theme's design and stylesheet.
function sm_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sm_content_width', 1700 );
}
add_action( 'after_setup_theme', 'sm_content_width', 0 );
/***********************************************************************************************/
/* Function for Google Fonts */
/***********************************************************************************************/
function sm_fonts_url() {
$fonts_url = '';
    $fonts     = array();
    $subsets   = 'latin,latin-ext';
    /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
    if('off' !== _x( 'on', 'Montserrat font: on or off', 'sm')){
        $fonts[] = 'Montserrat:300,400,500,600,700,800,900';
    }
    if('off' !== _x( 'on', 'Raleway font: on or off', 'sm')){
        $fonts[] = 'Raleway:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
    }
    if($fonts){
        $fonts_url = add_query_arg(array(
            'family' => urlencode(implode( '|', $fonts )),
            'subset' => urlencode($subsets),
        ),'https://fonts.googleapis.com/css');
    }
    return $fonts_url;
}
/***********************************************************************************************/
/* Proper way to enqueue scripts and styles */
/***********************************************************************************************/
function sm_css_scripts() {
    wp_enqueue_style('bootstrap', THEMEDIR.'/include/css/bootstrap.css',array(),'4.3.1', 'all');
    wp_enqueue_style('google-fonts-lora', sm_fonts_url(), array(), null );
    wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css',array(),'5.3.1', 'all');
    wp_enqueue_style('magnific-popup', THEMEDIR.'/include/css/magnific-popup.css',array(),'1.1.0', 'all');
    wp_enqueue_style('slick', THEMEDIR.'/include/css/slick.css',array(),'1.5.9', 'all');
    wp_enqueue_style('animate', THEMEDIR.'/include/css/animate.css',array(),'3.6.0', 'all');
    wp_enqueue_style('sm-theme-style', get_stylesheet_uri(),array(),null,'all');
    wp_enqueue_script('modernizr', THEMEDIR.'/include/js/modernizr.min.js',array(),'2.8.1',false);
    wp_enqueue_script('bootstrap', THEMEDIR.'/include/js/bootstrap.min.js',array('jquery'),'4.3.1',true);
    wp_enqueue_script('slick', THEMEDIR.'/include/js/slick.min.js',array('jquery'),'1.5.9',true);
    wp_enqueue_script('easing', THEMEDIR.'/include/js/jquery.easing.min.js',array('jquery'),'1.0.0',true);
    wp_enqueue_script('scrolling-nav', THEMEDIR.'/include/js/scrolling-nav.js',array('jquery'),'1.0.0',true);
    wp_enqueue_script('isotope', THEMEDIR.'/include/js/isotope.min.js',array('jquery'),'3.0.6',true);
    wp_enqueue_script('flash-animation', THEMEDIR.'/include/js/flash-animation.js',array('jquery'),'1.0.0',true);
    wp_enqueue_script('plugin', THEMEDIR.'/include/js/plugin.js',array('jquery'),'1.0.0',true);
    wp_enqueue_script('magnific-popup', THEMEDIR.'/include/js/jquery.magnific-popup.min.js',array('jquery'),'1.1.0',true);
    wp_enqueue_script('waypoint', THEMEDIR.'/include/js/waypoint.js',array('jquery'),'2.0.2',true);
    wp_enqueue_script('sm-js', THEMEDIR.'/include/js/custom.js',array('jquery'),null,true);
    wp_add_inline_script('jquery', 'var $ = jQuery.noConflict();' );
    if(is_singular() && comments_open() && get_option('thread_comments')){
        wp_enqueue_script('comment-reply');
    }
}
add_action( 'wp_enqueue_scripts', 'sm_css_scripts' );
if(!file_exists(get_template_directory().'/wp-bootstrap-navwalker.php')){
    // file does not exist... return an error.
    return new WP_Error('wp-bootstrap-navwalker-missing',__('It appears the wp-bootstrap-navwalker.php file may be missing.','wp-bootstrap-navwalker'));
}else{
    // file exists... require it.
    require_once get_template_directory().'/wp-bootstrap-navwalker.php';
}
function sm_admin_enqueue_scripts(){
    wp_enqueue_style( 'sm-admin-css', THEMEDIR.'/admin-style.css', array(), 1);
}
add_action( 'admin_enqueue_scripts', 'sm_admin_enqueue_scripts' );
/***********************************************************************************************/
/* Theme Option */
/***********************************************************************************************/
if(function_exists('acf_add_options_page')){
    acf_add_options_page(array(
        'page_title'    =>  __('Theme Options','sm'),
        'menu_title'    =>  __('Theme Options','sm'),
        'menu_slug'     =>  'theme-general-settings',
        'capability'    =>  'edit_posts',
        'redirect'      =>  false
    ));
}
/***********************************************************************************************/
/* Page Slug Body Class */
/***********************************************************************************************/
function sm_add_slug_body_class( $classes ) {
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
add_filter( 'body_class', 'sm_add_slug_body_class' );
add_filter( 'body_class', 'sm_body_class');
function sm_body_class($classes){
  if(is_tax('work_categories')){
$classes[] = 'fixed';
}
    return $classes; 
}

/***********************************************************************************************/
/* filter for adding class in nav menu */
/***********************************************************************************************/
add_filter('nav_menu_css_class' , 'sm_active_nav_class' , 10 , 2);
function sm_active_nav_class ($classes, $item) {
    if (in_array('current-post-ancestor', $classes) || in_array('current-page-ancestor', $classes) || in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    if (is_tax('work_categories') && in_array('menu-item-51', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}

/***********************************************************************************************/
/* Remove auto p from Contact Form 7 shortcode output */
/***********************************************************************************************/
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
    return false;
}
/***********************************************************************************************/
/* Actions for removing category,tags & comments */
/***********************************************************************************************/
// Remove Categories and Tags
add_action('init', 'sm_remove_tax');
function sm_remove_tax() {
    //register_taxonomy('category', array());
    register_taxonomy('post_tag', array());
}
// Removes from admin menu
add_action( 'admin_menu', 'sm_remove_admin_menus' );
function sm_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action('init', 'sm_remove_comment_support', 100);
function sm_remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function sm_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'sm_admin_bar_render' );

add_action( 'admin_menu', 'sm_remove_default_post_type' );
function sm_remove_default_post_type() {
    remove_menu_page( 'edit.php' );
}

add_action( 'admin_bar_menu', 'sm_remove_default_post_type_menu_bar', 999 );
function sm_remove_default_post_type_menu_bar( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'new-post' );
}

add_action( 'wp_dashboard_setup', 'sm_remove_draft_widget', 999 );
function sm_remove_draft_widget(){
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
}

/***********************************************************************************************/
/* Register Custom Post Type */
/***********************************************************************************************/
function jgm_register_post_type() {
    $singular = 'Work';
    $plural = 'Works';
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
        'publicly_queryable'    => true,
        'exclude_from_search'   => true,
        'show_in_nav_menus'     => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_admin_bar'     => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-admin-post',
        'can_export'            => true,
        'delete_with_user'      => false,
        'hierarchical'          => true,
        'has_archive'           => false,
        'query_var'             => true,
        'capability_type'       => 'post',
        'map_meta_cap'          => true,
        // 'capabilities'       => array(),
        'rewrite'               => array(
            'slug'      => 'works',
            'with_front'=> false,
            'pages'     => true,
            'feeds'     => false
        ),
        'supports'              => array(
            'title'
        )
    );
    register_post_type( 'works', $args);
    register_taxonomy( 'work_categories', array('works'), array(
        'hierarchical' => true,
        'show_admin_column'=> true,
        'labels' => array('name'=>'Work Categories','singular_name'=>'Category','menu_name'=>'Categories'),
        'rewrite' => array( 'slug' => 'work-category', 'with_front'=> false )
        )
    );
    flush_rewrite_rules();
}
add_action( 'init', 'jgm_register_post_type' );

function year_shortcode() {
  $year = date('Y');
  return $year;
}
add_shortcode('year', 'year_shortcode');

function hex2rgb($hex) {
    $hex = str_replace("#", "", $hex);

    if(strlen($hex) == 3) {
        $r = hexdec(substr($hex,0,1).substr($hex,0,1));
        $g = hexdec(substr($hex,1,1).substr($hex,1,1));
        $b = hexdec(substr($hex,2,1).substr($hex,2,1));
    } else {
        $r = hexdec(substr($hex,0,2));
        $g = hexdec(substr($hex,2,2));
        $b = hexdec(substr($hex,4,2));
    }
    $rgb = array($r, $g, $b);

    return $rgb; // returns an array with the rgb values
}