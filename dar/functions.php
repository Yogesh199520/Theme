<?php
/*==============================*/
// @package TWSRDC
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
if(!function_exists('twsrdc_theme_support')) :
    function twsrdc_theme_support() {
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        // Add theme support title tag.
        add_theme_support('title-tag');
        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('responsive-embeds');
        add_theme_support('post-thumbnails');
        load_theme_textdomain('twsrdc');
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
              'header_menu' => __('Header Menu','twsrdc'),
              'footer_menu' => __('Footer Menu','twsrdc')
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
add_action( 'after_setup_theme', 'twsrdc_theme_support');
/***********************************************************************************************/
/* Function for Google Fonts */
/***********************************************************************************************/
function twsrdc_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'swap';
    /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
    if('off' !== _x( 'on', 'Montserrat font: on or off', 'acc')){
        $fonts[] = 'family=Montserrat:wght@300;400;500;600;700;900';
    }
    if('off' !== _x( 'on', 'Poppins font: on or off', 'acc')){
        $fonts[] = 'family=Poppins:wght@400;700';
    }
    if($fonts){
        $fonts_url = 'https://fonts.googleapis.com/css2?'.implode('&',$fonts).'&display='.$subsets;
    }
    return $fonts_url;
}
/***********************************************************************************************/
/* Hide default editor */
/***********************************************************************************************/
//add_filter('use_block_editor_for_post', '__return_false', 10);
/***********************************************************************************************/
/* Proper way to enqueue scripts and styles */
/***********************************************************************************************/
function twsrdc_css_scripts() {
    wp_dequeue_style( 'wp-block-library' );
    wp_enqueue_style('google-fonts', twsrdc_fonts_url(), array(), null );
    wp_enqueue_style('bootstrap', THEMEURI.'/include/css/bootstrap.min.css',array(),'4.5.2', 'all');
    wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css',array(),'5.3.1', 'all');
    
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array('bootstrap') );
    wp_enqueue_script('bootstrap', THEMEURI.'/include/js/bootstrap.min.js',array('jquery-core'),'4.5.2',true);
    wp_enqueue_script('main-script', THEMEURI.'/include/js/main.js',array('bootstrap'),'1.0',true);
    wp_enqueue_script('theme-script', THEMEURI.'/include/js/custom.js',array('bootstrap'),null,true);
    wp_localize_script('theme-script','ajax_object',array('ajax_url'=>admin_url('admin-ajax.php'), 'home_url'=>get_bloginfo('url')));
    wp_add_inline_script( 'jquery-core', 'var $ = jQuery.noConflict();' );
    if(is_singular() && comments_open() && get_option('thread_comments')){
        wp_enqueue_script('comment-reply');
    }
   
    wp_register_script( 'validate', 'https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js', null, null, false );
    wp_enqueue_script('validate');
    if(is_page(52)){
        wp_register_script( 'magnific-popup', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js', null, null, false );
        wp_enqueue_script('magnific-popup');

    }

    
}
add_action( 'wp_enqueue_scripts', 'twsrdc_css_scripts' );
/***********************************************************************************************/
/* Page Slug Body Class */
/***********************************************************************************************/
function twsrdc_add_slug_body_class( $classes ) {
global $wpdb, $post;
$current_page_id = get_queried_object_id();
if ( isset( $post ) ) {
    $classes[] = $post->post_name;
}
if (is_page()) {
    if ($post->post_parent) {
        $current_page_id_by_post_ancenstors = get_post_ancestors($current_page_id);
        $parent  = end($current_page_id_by_post_ancenstors);
    } else {
        $parent = $post->ID;
    }
    $post_data = get_post($parent, ARRAY_A);
    $classes[] = $post_data['post_name'];
}
if(is_page(147)){
    $classes[] = 'gradient-bg';
}
return $classes;
}
add_filter( 'body_class', 'twsrdc_add_slug_body_class' );
/***********************************************************************************************/
/* filter for adding class in nav menu */
/***********************************************************************************************/
add_filter('nav_menu_css_class' , 'twsrdc_active_nav_class' , 10 , 2);
function twsrdc_active_nav_class ($classes, $item) {
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
function twsrdc_current_year(){
    $year = date_i18n('Y');
    return $year;
}
add_shortcode('current_year','twsrdc_current_year');
/***********************************************************************************************/
/* Theme Option */
/***********************************************************************************************/
if(function_exists('acf_add_options_page')){
    acf_add_options_page(array(
        'page_title'    =>  __('Theme Options','twsrdc'),
        'menu_title'    =>  __('Theme Options','twsrdc'),
        'menu_slug'     =>  'theme-general-settings',
        'capability'    =>  'edit_posts',
        'position'      =>  59,
        'redirect'      =>  false
    ));
}


/***********************************************************************************************/
/* Register Custom Post Type */
/***********************************************************************************************/
function twsrdc_register_post_type() {
    $singular = 'Events';
    $plural = 'Events';
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
        'menu_icon'             => 'dashicons-calendar-alt',
        'can_export'            => true,
        'delete_with_user'      => false,
        'hierarchical'          => true,
        'has_archive'           => false,
        'query_var'             => true,
        'capability_type'       => 'post',
        'map_meta_cap'          => true,
        // 'capabilities'       => array(),
        'rewrite'               => array(
            'slug'      => 'events',
            'with_front'=> false,
            'pages'     => true,
            'feeds'     => false
        ),
        'supports'      => array(
            'title',
            'thumbnail',
            'editor',
            'excerpt',
            'author',
            'custom-fields'
        ),
    );
    register_post_type('events',$args);
    register_taxonomy( 'events_category', 'events', array(
        'label'        => __( 'Category', 'twsrdc'),
        'rewrite'      => array( 'slug' => 'events-category'),
        'hierarchical' => true,
        'show_admin_column'=> true
    ) );

    $singular = 'Gallery';
    $plural = 'Gallery';
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
        'menu_position'         => 21,
        'menu_icon'             => 'dashicons-format-gallery',
        'can_export'            => true,
        'delete_with_user'      => false,
        'hierarchical'          => true,
        'has_archive'           => false,
        'query_var'             => true,
        'capability_type'       => 'post',
        'map_meta_cap'          => true,
        // 'capabilities'       => array(),
        'rewrite'               => array(
            'slug'      => 'gallary',
            'with_front'=> false,
            'pages'     => true,
            'feeds'     => false
        ),
        'supports'      => array(
            'title',
            'custom-fields',
            'thumbnail'
        ),
    );
    register_post_type('gallary',$args);

    $singular = 'Community';
    $plural = 'Community';
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
        'menu_position'         => 22,
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
            'slug'      => 'community',
            'with_front'=> false,
            'pages'     => true,
            'feeds'     => false
        ),
        'supports'      => array(
            'title',
            'excerpt',
            'thumbnail',
            'editor'
        ),
    );
    register_post_type('community',$args);

    $singular = 'Education';
    $plural = 'Education';
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
        'menu_position'         => 23,
        'menu_icon'             => 'dashicons-book',
        'can_export'            => true,
        'delete_with_user'      => false,
        'hierarchical'          => true,
        'has_archive'           => false,
        'query_var'             => true,
        'capability_type'       => 'post',
        'map_meta_cap'          => true,
        // 'capabilities'       => array(),
        'rewrite'               => array(
            'slug'      => 'education',
            'with_front'=> false,
            'pages'     => true,
            'feeds'     => false
        ),
        'supports'      => array(
            'title',
            'excerpt',
            'thumbnail',
            'editor'
        ),
    );
    register_post_type('education',$args);

    $singular = 'Alumni Record';
    $plural = 'Alumni Records';
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
        'menu_position'         => 24,
        'menu_icon'             => 'dashicons-groups',
        'can_export'            => true,
        'delete_with_user'      => false,
        'hierarchical'          => true,
        'has_archive'           => false,
        'query_var'             => true,
        'capability_type'       => 'post',
        'map_meta_cap'          => true,
        // 'capabilities'       => array(),
        'rewrite'               => array(
            'slug'      => 'alumni-record',
            'with_front'=> false,
            'pages'     => true,
            'feeds'     => false
        ),
        'supports'      => array(
            'title',
            'custom-fields',
            'thumbnail'
        ),
    );
    register_post_type('alumni_record',$args);
   
    $singular = 'Alumni Award';
    $plural = 'Alumni Awards';
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
        'menu_position'         => 25,
        'menu_icon'             => 'dashicons-awards',
        'can_export'            => true,
        'delete_with_user'      => false,
        'hierarchical'          => true,
        'has_archive'           => false,
        'query_var'             => true,
        'capability_type'       => 'post',
        'map_meta_cap'          => true,
        // 'capabilities'       => array(),
        'rewrite'               => array(
            'slug'      => 'alumni-awards',
            'with_front'=> false,
            'pages'     => true,
            'feeds'     => false
        ),
        'supports'      => array(
            'title',
            'custom-fields',
            'thumbnail',
            'editor'
        ),
    );
    register_taxonomy('awards_category', 'alumni_awards', array(
        'label'        => __('Category', 'twsrdc'),
        'rewrite'      => array('slug' => 'awards-category','with_front' => false),
        'hierarchical' => true,
        'show_admin_column'=> true
    ));
    register_post_type('alumni_awards',$args);
   

    $singular = 'Skill Enhancement';
    $plural = 'Skill Enhancement';
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
        'menu_position'         => 26,
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
            'slug'      => 'skill-enhancement',
            'with_front'=> false,
            'pages'     => true,
            'feeds'     => false
        ),
        'supports'      => array(
            'title',
            'excerpt',
            'thumbnail',
            'editor'
        ),
    );
    register_post_type('skill_enhancement',$args);

    $singular = 'Alumni Stories';
    $plural = 'Alumni Stories';
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
        'menu_position'         => 27,
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
            'slug'      => 'alumni-stories',
            'with_front'=> false,
            'pages'     => true,
            'feeds'     => false
        ),
        'supports'      => array(
            'title',
            'custom-fields',
        ),
    );
    register_post_type('alumni_stories',$args);
    register_taxonomy('stories_category', 'alumni_stories', array(
        'label'        => __('Category', 'twsrdc'),
        'rewrite'      => array('slug' => 'stories-category','with_front' => false),
        'hierarchical' => true,
        'show_admin_column'=> true
    ));

    $singular = 'Reunion';
    $plural = 'Reunion';
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
        'menu_position'         => 28,
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
            'slug'      => 'reunion',
            'with_front'=> false,
            'pages'     => true,
            'feeds'     => false
        ),
        'supports'      => array(
            'title',
            'excerpt',
            'thumbnail',
            'editor'
        ),
    );
    register_post_type('reunion',$args);

    $singular = 'Swaero Fellowship';
    $plural = 'Swaero Fellowship';
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
        'menu_position'         => 29,
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
            'slug'      => 'swaero-fellowship',
            'with_front'=> false,
            'pages'     => true,
            'feeds'     => false
        ),
        'supports'      => array(
            'title',
            'thumbnail',
            'editor',
            'custom-fields',
        ),
    );
    register_post_type('swaero_fellowship',$args);

    flush_rewrite_rules();
}
add_action( 'init', 'twsrdc_register_post_type' );
/***********************************************************************************************/

/***********************************************************************************************/
/* Setting rewrite_rule for past and upcoming events */
/***********************************************************************************************/

/*function custom_rewrite_rule() {
    add_rewrite_rule('^events/?([^/]*)/?','index.php?page_id=40&events-category/upcoming-events=$matches[1]','top');
    add_rewrite_rule('^events/?([^/]*)/?','index.php?page_id=40&events-category/past-events=$matches[1]','top');
}
add_action('init', 'custom_rewrite_rule', 10, 0);*/

/***********************************************************************************************/

/***********************************************************************************************/
/* Filter for CF7 select empty */
/***********************************************************************************************/
function admerchandise_wpcf7_form_elements($html) {
    $text = 'Please select';
    $html = str_replace('<option value="">---</option>', '<option value="">' . $text . '</option>', $html);
    return $html;
}
add_filter('wpcf7_form_elements', 'admerchandise_wpcf7_form_elements');
/***********************************************************************************************/
/* Remove auto p from Contact Form 7 shortcode output */
/***********************************************************************************************/
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
    return false;
}
/***********************************************************************************************/
/*Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin*/
/***********************************************************************************************/
if ( ! function_exists( 'ao_wp_pagination' ) ) :
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
            return '<ul class="page-num"><li>'.implode('</li><li>', $posts).'</li></ul>';
        }
    }
    add_action('init', 'ao_wp_pagination');
endif;

/***********************************************************************************************/
/* Actions for removing category,tags & comments */
/***********************************************************************************************/
// Remove Categories and Tags
add_action('init', 'twsrdc_remove_tax');
function twsrdc_remove_tax() {
    //register_taxonomy('category', array());
    register_taxonomy('post_tag', array());
    // register_post_type('post', array());
}
// Removes from admin menu
add_action( 'admin_menu', 'twsrdc_remove_admin_menus' );
function twsrdc_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action('init', 'twsrdc_remove_comment_support', 100);
function twsrdc_remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function twsrdc_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'twsrdc_admin_bar_render' );

function ao_get_submitter($pid){
    global $wpdb;
    $table_name   = $wpdb->prefix.'db7_forms';
    $form_post_id = '923';
    $orderby = 'form_date';
    $order   = 'ASC';
    $results = $wpdb->get_results( "SELECT * FROM $table_name 
                WHERE form_post_id = $form_post_id
                ORDER BY $orderby $order
                LIMIT 1000", OBJECT 
            );
    $count_submitter = array();
    $last_submitter = null;
    $nametrue = null;
    foreach ( $results as $result ) {

        $form_value = unserialize( $result->form_value );
        $form_values['form_id'] = $result->form_id;

        foreach ($form_value as $ktmp => $value) {

            if(!empty($ktmp) & $ktmp == 'destination-postid'){
                if($value == $pid){
                    $count_submitter[] = $value;
                    $nametrue = true;
                }
            }

            if(!empty($ktmp) && $ktmp == 'FullName' && $nametrue === true){
                $last_submitter = $value;
                $nametrue = false;
            }
        }

    }
    return array( 'count_submitter'=>count($count_submitter)-1, 'last_submitter'=>$last_submitter );
}

function ao_login_redirect( $redirect_to, $request, $user ) {
    if (isset($user->roles) && is_array($user->roles)) {
        if (in_array('subscriber', $user->roles)) {
            $redirect_to = home_url('/registration/');
        }else{
            $redirect_to = get_admin_url();
        }
    }
    return $redirect_to;
}
add_filter( 'login_redirect', 'ao_login_redirect', 10, 3 );
add_action('after_setup_theme', 'ao_remove_admin_bar');
function ao_remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
      show_admin_bar(false);
    }
    if(!is_user_logged_in() && is_page('registration')){
        $redirect_to = home_url('/registration/');
        wp_redirect($redirect_to);
        exit();
    }
}

add_action( 'template_redirect', function() {

  if ( is_user_logged_in() || ! is_page() ) return;

  $restricted = array( 471 ); // all your restricted pages

  if ( in_array( get_queried_object_id(), $restricted ) ) {
    wp_redirect( site_url( '/login/' ) ); 
    exit();
  }

});

function twsrdc_status_approved(){
    register_post_status( 'approved', array(
    'label'                     => _x('Approved', 'post'),
    'label_count'               => _n_noop('Approved <span class="count">(%s)</span>', 'Approved <span class="count">(%s)</span>'),
    'public'                    => true,
    'exclude_from_search'       => false,
    'show_in_admin_all_list'    => true,
    'show_in_admin_status_list' => true
    ));
    register_post_status( 'reject', array(
    'label'                     => _x('Reject', 'post'),
    'label_count'               => _n_noop('Reject <span class="count">(%s)</span>', 'Reject <span class="count">(%s)</span>'),
    'public'                    => true,
    'exclude_from_search'       => false,
    'show_in_admin_all_list'    => true,
    'show_in_admin_status_list' => true
    ));
}
add_action('init', 'twsrdc_status_approved');

function twsrdc_status_approved_edit() {
    echo "<script>
    jQuery(document).ready( function() {
    jQuery( 'select[name=\"_status\"]' ).append( '<option value=\"approved\">Approved</option>' );      
    }); 
    </script>";
    echo "<script>
    jQuery(document).ready( function() {
    jQuery( 'select[name=\"_status\"]' ).append( '<option value=\"reject\">Reject</option>' );      
    }); 
    </script>";
}
add_action('admin_footer-edit.php','twsrdc_status_approved_edit');
    function twsrdc_custom_post_status() {

    echo "<script>
    jQuery(document).ready( function() {        
    jQuery( 'select[name=\"post_status\"]' ).append( '<option value=\"approved\">Approved</option>' );
    });
    </script>";
    echo "<script>
    jQuery(document).ready( function() {        
    jQuery( 'select[name=\"post_status\"]' ).append( '<option value=\"reject\">Reject</option>' );
    });
    </script>";
}
add_action('admin_footer-post.php', 'twsrdc_custom_post_status');
add_action('admin_footer-post-new.php', 'twsrdc_custom_post_status');

add_filter( 'wp_mail_from_name', 'custom_wp_mail_from_name' );
function custom_wp_mail_from_name($original_email_from) {
    return get_bloginfo('name');
}


/*add_filter("wp_mail_from", "custom_wp_mail_from");
function custom_wp_mail_from($email){
    return get_bloginfo('admin_email');
}*/

function send_notification_of_approved_post( $post ) {
   /* $users = get_users( array( 'fields' => array( 'user_email', 'display_name' ) ) );*/  
    /*foreach( $users as $user ) {*/
        $current_user = wp_get_current_user();
        $site_name = get_bloginfo('name');
        $site_email = get_bloginfo('admin_email');
        $to = $current_user->user_email;
        $subject = 'Approved (TWSRDC)';
        $body = 'Hi ' . $post->post_title.', Your registration request has been approved';
        //$headers = array('Content-Type: text/html; charset=UTF-8','From: '.$site_name.' <support@example.com>');
        $headers = array('Content-Type: text/html; charset=UTF-8');
        wp_mail($to, $subject, $body, $headers);

    /*}*/
}
add_action( 'pending_to_approved', 'send_notification_of_approved_post', 10, 1 );



function send_notification_of_trash_post($post) {
   /* $users = get_users( array( 'fields' => array( 'user_email', 'display_name' ) ) );       
    foreach( $users as $user ) {*/
        $current_user = wp_get_current_user();
        $site_name = get_bloginfo('name');
        $site_email = get_bloginfo('admin_email');
        $to = $current_user->user_email;
        $subject = 'Reject (TWSRDC)';
        $body = 'Hi ' . $post->post_title.', Your registration request has been rejected';
        //$headers[] = 'From: Me Myself <me@example.net>';
        //$headers[] = 'Cc: John Q Codex <jqc@wordpress.org>';
        //$headers[] = 'Cc: iluvwp@wordpress.org';
        //$headers = array('Content-Type: text/html; charset=UTF-8','From: '.$site_name.' <support@example.com>');
        //$headers = "From: $site_name <$site_email>" . "\r\n";
        $headers = array('Content-Type: text/html; charset=UTF-8');
        wp_mail($to, $subject, $body, $headers);
   /* }*/
}
add_action( 'pending_to_trash', 'send_notification_of_trash_post', 10, 1 );



function send_notification_of_reject_post($post) {
   /* $users = get_users( array( 'fields' => array( 'user_email', 'display_name' ) ) );       
    foreach( $users as $user ) {*/
        $current_user = wp_get_current_user();
        $site_name = get_bloginfo('name');
        $site_email = get_bloginfo('admin_email');
        $to = $current_user->user_email;
        $subject = 'Reject (TWSRDC)';
        $body = 'Hi ' . $post->post_title.', Your registration request has been rejected';
        //$headers[] = 'From: Me Myself <me@example.net>';
        //$headers[] = 'Cc: John Q Codex <jqc@wordpress.org>';
        //$headers[] = 'Cc: iluvwp@wordpress.org';
       // $headers = array('Content-Type: text/html; charset=UTF-8','From: '.$site_name.' <support@example.com>');
        //$headers = "From: $site_name <$site_email>" . "\r\n";
        $headers = array('Content-Type: text/html; charset=UTF-8');
        wp_mail($to, $subject, $body, $headers);
   /* }*/
}
add_action( 'pending_to_reject', 'send_notification_of_reject_post', 10, 1 );

/*
add_action( 'pending_to_reject', 'send_notification_of_new_post', 10, 1 );
add_action( 'draft_to_publish', 'send_notification_of_new_post', 10, 1 );
add_action( 'auto-draft_to_publish', 'send_notification_of_new_post', 10, 1 );
add_action( 'future_to_publish', 'send_notification_of_new_post', 10, 1 );
add_action( 'private_to_publish', 'send_notification_of_new_post', 10, 1 );
add_action( 'pending_to_publish', 'send_notification_of_new_post', 10, 1 );
*/



add_action( 'wp_ajax_set_post_status', 'set_post_status_ajax_handler' );
add_action( 'admin_footer', 'set_post_status_js' );


function set_post_status_js()
{
  $nonce = wp_create_nonce('set_post_status');
  $ajax_url = admin_url('admin-ajax.php'); ?>

  <script type="text/javascript">
    (function($){
      $(document).ready(function(){
        $('.decision a').click(function(event){
          event.preventDefault();
          $.post( "<?= $ajax_url; ?>", {
            nonce: "<?= $nonce; ?>",
            action: 'set_post_status',
            post_id: $(this).data('post_id'),
            status: $(this).data('status'),
          }, function(data){
            if (data.ok) {
              var postStateLabel = (data.status === 'approved') ? '<span style="color: #009900;">Approved</span>' : '<span style="color: #990000;">Rejected</span>';

              $('#post-' + data.id)
                .css('background', data.status === 'approved' ? '#EEFFEE' : '#FFEEEE')
                .find('.post-state').html( postStateLabel );
            }
          });
        });
      });
    })(jQuery)
  </script>

  <?php
}



function set_post_status_ajax_handler()
{
  $nonce = $_POST['nonce'];

  if ( ! wp_verify_nonce( $nonce, 'set_post_status' ) )
    die ( 'Not permitted');

  // Extract the vars from the Ajax request
  $post_id = $_POST['post_id'];
  $status = $_POST['status'];

  // Now update the relevant post
  $post_id = wp_update_post([
    'ID' => $post_id,
    'post_status' => $status,
  ], true);

  // make sure it all went OK
  if (is_wp_error($post_id))
  {
    $response = [
      'ok' => false,
    ];
  } else 
  {
    $response = [
      'ok'      => true,
      'id'      => $post_id,
      'status'  => $status,
    ];
  }

  // Return the response
  wp_send_json( $response );
}


add_filter( 'manage_alumni-record_posts_columns', 'smashing_filter_posts_columns' );
function smashing_filter_posts_columns( $columns ) {
  $columns['decision'] = __( 'Action Pending', 'rima' );
  return $columns;
}
add_action( 'manage_alumni-record_posts_custom_column', 'smashing_dream_column', 10, 2);
function smashing_dream_column( $column, $post_id ) {

  if ( 'decision' === $column ) {
    if (get_post_status ( $post_id ) == 'pending') {
        echo '<div class="decision"><a href="#" data-post_id="' . $post_id . '" data-status="approved" class="dapprove">Approve</a> | <a href="#" data-post_id="' . $post_id . '" data-status="trash" class="reject">Reject</a></div>';
    }
    /*else {
        echo '<div class="decision"><a href="#" data-post_id="' . $post_id . '" data-status="approved" class="dapprove">Approve</a> | <a href="#" data-post_id="' . $post_id . '" data-status="trash" class="reject">Reject</a></div>';
    }*/
  }
}


add_filter( 'shortcode_atts_wpcf7', 'custom_shortcode_atts_wpcf7_filter', 10, 3 );
function custom_shortcode_atts_wpcf7_filter( $out, $pairs, $atts ) {
  $my_attr = 'destination-postid';
 
  if ( isset( $atts[$my_attr] ) ) {
    $out[$my_attr] = $atts[$my_attr];
  }
 
  return $out;
}



/*add_action('wp_ajax_nopriv_dar_get_address','dar_get_address');
add_action('wp_ajax_dar_get_address','dar_get_address');
function dar_get_address(){
    $address = $_POST['search_value'];
    $output = 'https://nominatim.openstreetmap.org/search?q='.$address.'&format=json';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$output);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    curl_close ($ch);
    if ($server_output == "OK") { 
            echo 'hello'; 
        }else { 
            echo 'hi'; 
        }
}*/