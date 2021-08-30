<?php
/*==============================*/
// @package American Narratives
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
if(!function_exists('american_narratives_theme_support')) :
    function american_narratives_theme_support() {
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );
        // Add theme support title tag.
        add_theme_support( 'title-tag' );
        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );
        //add_theme_support( 'post-thumbnails' );
        add_theme_support( 'responsive-embeds' );
        add_theme_support( 'post-thumbnails' );
        load_theme_textdomain( 'american_narratives' );
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
        // Resistor activebroadband nav menu
        register_nav_menus(
            array(
              'header_left_menu' => 'Header Left Menu',
              'header_right_menu' => 'Header Right Menu',
              'footer_menu' => 'Footer Menu',
            )
        );
        if(!file_exists(get_template_directory().'/class-wp-bootstrap-navwalker.php')){
	        // File does not exist... return an error.
	        return new WP_Error('class-wp-bootstrap-navwalker-missing', __('It appears the class-wp-bootstrap-navwalker.php file may be missing.','wp-bootstrap-navwalker'));
	    }else{
	        // File exists... require it.
	        require_once get_template_directory().'/class-wp-bootstrap-navwalker.php';
	    }
    }
endif;
add_action( 'after_setup_theme', 'american_narratives_theme_support' );
/***********************************************************************************************/
/* Function for Google Fonts */
/***********************************************************************************************/
https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,900;1,300;1,400;1,700;1,900&display=swap
function american_narratives_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'swap';
    /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
    if('off' !== _x( 'on', 'Montserrat font: on or off', 'acc')){
        $fonts[] = 'family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,900;1,300;1,400;1,700;1,900';
    }
    if($fonts){
        $fonts_url = 'https://fonts.googleapis.com/css2?'.implode('&',$fonts).'&display='.$subsets;
    }
    return $fonts_url;
}
/***********************************************************************************************/
/* Proper way to enqueue scripts and styles */
/***********************************************************************************************/
function american_narratives_css_scripts() {
    wp_dequeue_style( 'wp-block-library' );
    wp_enqueue_style('google-fonts', american_narratives_fonts_url(), array(), null );
    wp_enqueue_style('bootstrap', THEMEURI.'/include/css/bootstrap.min.css',array(),'4.5.0', 'all');
    wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css',array(),'5.3.1', 'all');
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array('bootstrap') );

    wp_enqueue_script('bootstrap', THEMEURI.'/include/js/bootstrap.min.js',array('jquery-core'),'4.5.0',true);
    wp_enqueue_script('main-script', THEMEURI.'/include/js/main.js',array('bootstrap'),'1.0',true);
    wp_enqueue_script('theme-script', THEMEURI.'/include/js/custom.js',array('bootstrap'),null,true);
    wp_localize_script('theme-script','ajax_object',array('ajax_url'=>admin_url('admin-ajax.php')));
    wp_add_inline_script( 'jquery-core', 'var $ = jQuery.noConflict();' );
    if(is_singular() && comments_open() && get_option('thread_comments')){
        wp_enqueue_script('comment-reply');
    }
}
add_action( 'wp_enqueue_scripts', 'american_narratives_css_scripts' );

/***********************************************************************************************/
/* Page Slug Body Class */
/***********************************************************************************************/
function american_narratives_add_slug_body_class( $classes ) {
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
add_filter( 'body_class', 'american_narratives_add_slug_body_class' );
/***********************************************************************************************/
/* filter for adding class in nav menu */
/***********************************************************************************************/
add_filter('nav_menu_css_class' , 'american_narratives_active_nav_class' , 10 , 2);
function american_narratives_active_nav_class ($classes, $item) {
    if (in_array('current-post-ancestor', $classes) || in_array('current-page-ancestor', $classes) || in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    if (is_singular('post') && in_array('menu-item-387', $classes) ){
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
// Get Current Year Short Code
/***********************************************************************************************/
function american_narratives_current_year(){
    $year = date_i18n('Y');
    return $year;
}
add_shortcode('current_year','american_narratives_current_year');
/***********************************************************************************************/
// Pagination
/***********************************************************************************************/
function ao_wp_pagination( $paged = '', $max_page = '' ){
    global $wp_query;
    $big = 999999999; // need an unlikely integer
    if( ! $paged )
        $paged = get_query_var('paged');
    if( ! $max_page )
        $max_page = $wp_query->max_num_pages;

    $posts = paginate_links( array(
        'base'       => str_replace($big, '%#%', esc_url(get_pagenum_link( $big ))),
        'format'     => '?paged=%#%',
        'current'    => max( 1, $paged ),
        'total'      => $max_page,
        'prev_next'    => true,
        'prev_text'    => __('<i class="fa fa-angle-left"></i>'),
        'next_text'    => __('<i class="fa fa-angle-right"></i>'),
        'type'       => 'array'
    ) );
    $posts = str_replace('page/1/','', $posts);
    if(is_array($posts)){
        echo '<ul class="page-num d-flex justify-content-center"><li>'.implode('</li><li>', $posts).'</li></ul>';
    }
}
add_action('init', 'ao_wp_pagination');
/***********************************************************************************************/
/* Actions for removing category,tags & comments */
/***********************************************************************************************/
// Remove Categories and Tags
add_action('init', 'american_narratives_remove_tax');
function american_narratives_remove_tax() {
    register_taxonomy('category', array());
    register_taxonomy('post_tag', array());
    /*register_post_type('post', array());*/
}
// Removes from admin menu
add_action( 'admin_menu', 'american_narratives_remove_admin_menus' );
function american_narratives_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action('init', 'american_narratives_remove_comment_support', 100);
function american_narratives_remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function american_narratives_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'american_narratives_admin_bar_render' );
/***********************************************************************************************/
/* Theme Option */
/***********************************************************************************************/
if(function_exists('acf_add_options_page')){
    acf_add_options_page(array(
        'page_title'    =>  __('Theme Options','american_narratives'),
        'menu_title'    =>  __('Theme Options','american_narratives'),
        'menu_slug'     =>  'theme-general-settings',
        'capability'    =>  'edit_posts',
        'position'      =>  59,
        'redirect'      =>  false
    ));
}


/***********************************************************************************************/
/* Update the WordPress Post Type post ot episode  */
/***********************************************************************************************/
add_action('init', 'ao_change_post_object');
function ao_change_post_object() {
    $get_post_type = get_post_type_object('post');
    $labels = $get_post_type->labels;
    $labels->name = 'Episode';
    $labels->singular_name = 'Episode';
    $labels->add_new = 'Add Episode';
    $labels->add_new_item = 'Add Episode';
    $labels->edit_item = 'Edit Episode';
    $labels->new_item = 'Episode';
    $labels->view_item = 'View Episode';
    $labels->search_items = 'Search Episode';
    $labels->not_found = 'No Episode found';
    $labels->not_found_in_trash = 'No Episode found in Trash';
    $labels->all_items = 'All Episode';
    $labels->menu_name = 'Episode';
    $labels->name_admin_bar = 'Episode';
}