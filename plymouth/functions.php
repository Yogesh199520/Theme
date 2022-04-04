<?php
/*==============================*/
// @package Plymouth
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
if ( ! function_exists( 'plymouth_setup' ) ) :
function plymouth_setup() {
    // Make theme available for translation.
    load_theme_textdomain( 'Plymouth' );
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
        'header' => __( 'Header Navigation', 'Plymouth' ),
        'footer' => __( 'Footer Navigation', 'Plymouth' )
    ) );
    // This theme styles the visual editor to resemble the theme style,
    add_editor_style( array( 'editor-style.css', /*plymouth_fonts_url()*/ ) ); //get_stylesheet_uri()
   
    if(!file_exists(get_template_directory().'/class-wp-bootstrap-navwalker.php')){
        // File does not exist... return an error.
        return new WP_Error('class-wp-bootstrap-navwalker-missing', __('It appears the class-wp-bootstrap-navwalker.php file may be missing.','wp-bootstrap-navwalker'));
    }else{
        // File exists... require it.
        require_once get_template_directory().'/class-wp-bootstrap-navwalker.php';
    }
}
endif;
add_action( 'after_setup_theme', 'plymouth_setup' );
// Sets the content width in pixels, based on the theme's design and stylesheet.
function plymouth_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'plymouth_content_width', 1170 );
}
add_action( 'after_setup_theme', 'plymouth_content_width', 0 );


/***********************************************************************************************/
/* Register Custom Post Type */
/***********************************************************************************************/
function plymouth_register_post_type() {
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
add_action('init', 'plymouth_register_post_type');

/***********************************************************************************************/
/* Proper way to enqueue scripts and styles */
/***********************************************************************************************/
function plymouth_css_scripts() {
    wp_dequeue_style( 'wp-block-library' );
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Roboto:wght@300&display=swap', array(), null );
   
    wp_enqueue_style('fancybox', THEMEURI.'/include/css/jquery.fancybox.min.css',array(),'1.0.0', 'all');
    wp_enqueue_style('flexslider', THEMEURI.'/include/css/flexslider.css',array(),'2.0', 'all');
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array('fancybox','flexslider') );

   /* wp_enqueue_script('fontawesome','https://kit.fontawesome.com/20dd01c86d.js',array(),null,false); */
    wp_enqueue_script('fancybox', THEMEURI.'/include/js/jquery.fancybox.min.js',array('jquery'),'5.0.0',true);
    wp_enqueue_script('theme-script', THEMEURI.'/include/js/custom.js',array('fancybox'),null,true);
    wp_enqueue_script('theme-plugins', THEMEURI.'/include/js/jquery.flexslider.js',array(), null, true);
    wp_localize_script('jquery','ajax_object',array(
        'ajax_url'  =>  admin_url('admin-ajax.php'),
    ));
    wp_add_inline_script( 'jquery', 'var $ = jQuery.noConflict();' );
    if(is_singular() && comments_open() && get_option('thread_comments')){
        wp_enqueue_script('comment-reply');
    }
}
add_action( 'wp_enqueue_scripts', 'plymouth_css_scripts' );

/***********************************************************************************************/
/* Current year by shortcode */
/***********************************************************************************************/
function plymouth_current_year_shortcode() {
  $year = date('Y');
  return $year;
}
add_shortcode('current_year', 'plymouth_current_year_shortcode');

/***********************************************************************************************/
/* Page Slug Body Class */
/***********************************************************************************************/
function plymouth_add_slug_body_class( $classes ) {
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
add_filter( 'body_class', 'plymouth_add_slug_body_class' );

/***********************************************************************************************/
/* Filter for CF7 select empty */
/***********************************************************************************************/
function plymouth_wpcf7_form_elements($html) {
    $text = 'Please select';
    $html = str_replace('<option value="">---</option>', '<option value="">' . $text . '</option>', $html);
    return $html;
}
add_filter('wpcf7_form_elements', 'plymouth_wpcf7_form_elements');

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
        'page_title'    =>  __('Theme Options','Plymouth'),
        'menu_title'    =>  __('Theme Options','Plymouth'),
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
add_action('init', 'plymouth_remove_tax');
function plymouth_remove_tax() {
    //register_taxonomy('category', array());
    register_taxonomy('post_tag', array());
    // register_taxonomy('post', array());
    register_taxonomy('category', array());
   // register_post_type('post', array());
}
// Removes from admin menu
add_action( 'admin_menu', 'plymouth_remove_admin_menus' );
function plymouth_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
    // remove_menu_page('edit.php');
}
// Removes from post and pages
add_action('init', 'plymouth_remove_comment_support', 100);
function plymouth_remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function plymouth_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'plymouth_admin_bar_render' );



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


add_filter('script_loader_tag', 'wsds_defer_scripts', 10, 3);
function wsds_defer_scripts( $tag, $handle, $src ) {
    $defer_scripts = array( 
        'fancybox',
        'theme-script',
        'theme-plugins',
        'contact-form-7-js',
        'sb_instagram_scripts-js',
        'sb_instagram_scripts-js-extra',
        'wp-polyfill-js',
        'regenerator-runtime-js',
        'contact-form-7-js-extra',
        'jquery-core-js',
        'jquery-migrate-js',
        'cookie-law-info-js',
        'jquery-core-js-extra',
    );

    if(in_array($handle, $defer_scripts)) {
        return '<script src="' . $src . '" defer="defer"></script>' . "\n";
    }
    return $tag;
}