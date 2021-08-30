<?php
/*==============================*/
// @package Booth Golf & Leisure
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
define('PAGEID_DEVELOPMENTS', 136);

if(!function_exists('bvg_add_theme_support')) :
    function bvg_add_theme_support() {
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        // Add theme support title tag.
        add_theme_support('title-tag');
        // Add theme support responsive embeds.
        add_theme_support('responsive-embeds');
        // Add theme support post thumbnails.
        add_theme_support('post-thumbnails');
        // Add theme support textdomain.
        load_theme_textdomain('bvg');
        //Switch default core markup for search form, comment form, and comments to output valid HTML5.
        add_theme_support(
            'html5',
            array(
                // 'search-form',
                // 'comment-form',
                // 'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );
        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(
            array(
              'header1'   => __('Header 1 Menu','bvg'),
              'header2'   => __('Header 2 Menu','bvg'),
              'footer'   => __('Footer Menu','bvg')
            )
        );
        // This theme styles the visual editor to resemble the theme style,
        add_editor_style( array( 'editor-style.css', bvg_fonts_url() ) ); //get_stylesheet_uri()
        $GLOBALS['theme_options'] = array(
            'telephone' => get_field('telephone','option'),
            'telephone_strip' => str_replace(' ','',get_field('telephone','option')),
            'email' => get_field('email','option'),
            'address' => get_field('address','option')
        );

        if(!file_exists(THEMEDIR.'/class-wp-bootstrap-navwalker.php')){
            // File does not exist... return an error.
            return new WP_Error('class-wp-bootstrap-navwalker-missing', __('It appears the class-wp-bootstrap-navwalker.php file may be missing.','bvg'));
        }else{
            // File exists... require it.
            require_once THEMEDIR.'/class-wp-bootstrap-navwalker.php';
        }
    }
endif;
add_action( 'after_setup_theme', 'bvg_add_theme_support');
// Sets the content width in pixels, based on the theme's design and stylesheet.
function bvg_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'bvg_content_width', 1170 );
}
add_action( 'after_setup_theme', 'bvg_content_width', 0 );
/***********************************************************************************************/
/* Function for Google Fonts */
/***********************************************************************************************/
function bvg_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'swap';
    /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
    if('off' !== _x( 'on', 'Josefin Sans font: on or off', 'bvg')){
        $fonts[] = 'family=Josefin Sans:wght@400;700';
    }
    if('off' !== _x( 'on', 'Open Sans font: on or off', 'bvg')){
        $fonts[] = 'family=Open Sans:ital,wght@0,300;0,400;0,700;1,400';
    }
    if($fonts){
        $fonts_url = 'https://fonts.googleapis.com/css2?'.implode('&',$fonts).'&display='.$subsets;
    }
    return $fonts_url;
}

/***********************************************************************************************/
/***********************************************************************************************/
if(!is_admin()){
/***********************************************************************************************/
/* Proper way to enqueue scripts and styles */
/***********************************************************************************************/
function bvg_css_scripts() {
    if(get_field('enable_form') !== true){
        wp_dequeue_script( 'contact-form-7' );
        wp_dequeue_style( 'contact-form-7' );
    }
    if(!is_singular('post')){
        wp_dequeue_script( 'addtoany' );
        wp_dequeue_style( 'addtoany' );
    }
    wp_dequeue_style( 'wp-block-library' );
    wp_enqueue_style('google-fonts', bvg_fonts_url(), array(), null );
    wp_enqueue_style('vmz3ilf', 'https://use.typekit.net/vmz3ilf.css' );
    wp_enqueue_style('bootstrap', THEMEURI.'/include/css/bootstrap.min.css',array(),'4.5.2', 'all');
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array('bootstrap') );

    wp_enqueue_script('bootstrap', THEMEURI.'/include/js/bootstrap.min.js',array('jquery-core'),'4.5.2',true);
    wp_enqueue_script('main-script', THEMEURI.'/include/js/main.js',array('bootstrap'),'1.0',true);
    wp_enqueue_script('theme-script', THEMEURI.'/include/js/custom.js',array('bootstrap'),null,true);
    wp_localize_script('theme-script','ajax_object',array('ajax_url'=>admin_url('admin-ajax.php'), 'home_url'=>get_bloginfo('url')));
    wp_add_inline_script( 'jquery-core', 'var $ = jQuery.noConflict();' );
}
add_action( 'wp_enqueue_scripts', 'bvg_css_scripts' );

/***********************************************************************************************/
/* Page Slug Body Class */
/***********************************************************************************************/
function bvg_add_slug_body_class( $classes ) {
    global $wpdb, $post;
    if ( isset( $post ) ) {
        $classes[] = $post->post_name;
    }
    if (is_page()) {
        if ($post->post_parent) {
            $get_post_ancestors = get_post_ancestors($post->ID);
            $parent  = end($get_post_ancestors);
        } else {
            $parent = $post->ID;
        }
        $post_data = get_post($parent, ARRAY_A);
        $classes[] = $post_data['post_name'];
    }
    return $classes;
}
add_filter( 'body_class', 'bvg_add_slug_body_class' );
/***********************************************************************************************/
/* filter for adding class in nav menu */
/***********************************************************************************************/
add_filter('nav_menu_css_class' , 'bvg_active_nav_class' , 10 , 2);
function bvg_active_nav_class ($classes, $item) {
    if (in_array('current-post-ancestor', $classes) || in_array('current-page-ancestor', $classes) || in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    if((is_singular('post') || is_category()) && in_array('menu-item-59', $classes)){
        $classes[] = 'active ';
    }
    return $classes;
}
/***********************************************************************************************/
/* Custom nav walker */
/***********************************************************************************************/
function bvg_add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'bvg_add_additional_class_on_li', 1, 3);
function bvg_add_menu_link_class( $atts, $item, $args ) {
  if (property_exists($args, 'link_class')) {
    $atts['class'] = $args->link_class;
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'bvg_add_menu_link_class', 1, 3 );
function bvg_wp_nav_menu_objects( $items, $args ) {
    if($args->menu_class == 'second-nav-navbar'){
        foreach( $items as &$item ) {
            $icon = get_field('icon', $item);
            if($icon){
                $item->title = '<b><img src="'.$icon.'"></b>'.$item->title;
            }
        } 
        return $items;
    }
    return $items;
}
add_filter('wp_nav_menu_objects', 'bvg_wp_nav_menu_objects', 10, 2);
/***********************************************************************************************/
/* define the gsn_li_attributes callback */
/***********************************************************************************************/
function bvg_bootstrap_gsn_li_attributes($li_class){
    // add 'breadcrumb-item' class
    $patterns[0] = '/class="/';
    $replacements[0] = '/class="breadcrumb-item ';
    // change 'current_item' to 'active'
    $patterns[1] = '/current_item/';
    $replacements[1] = 'active';
    return preg_replace( $patterns, $replacements, $li_class);
};
add_filter( "bcn_display_attributes", "bvg_bootstrap_gsn_li_attributes", 10, 3);
/***********************************************************************************************/
/* Filter for CF7 select empty */
/***********************************************************************************************/
function bvg_wpcf7_form_elements($html) {
    $text = 'Type of enquiry';
    $html = str_replace('<option value="">---</option>', '<option value="">' . $text . '</option>', $html);
    return $html;
}
add_filter('wpcf7_form_elements', 'bvg_wpcf7_form_elements');
/***********************************************************************************************/
/* Excerpt Settings */
/***********************************************************************************************/
function bvg_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'bvg_excerpt_more');
function bvg_excerpt_length( $length ) {
    return 48;
}
add_filter( 'excerpt_length', 'bvg_excerpt_length', 999 );
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
function bvg_current_year(){
    $year = date_i18n('Y');
    return $year;
}
add_shortcode('current_year','bvg_current_year');
/***********************************************************************************************/
/* Content read time */
/***********************************************************************************************/
function ao_post_read_time($id=null) {
    global $post;
    $id = (!empty($id)?$id:$post->ID);
    // get the post content
    $content = get_post_field( 'post_content', $id );
    // count the words
    $word_count = str_word_count( strip_tags( $content ) );
    // reading time itself
    $readingtime = ceil($word_count / 200);
    if ($readingtime == 1) {
        $timer = " MINUTE READ";
    } else {
        $timer = " MINUTE READ"; // or your version :) I use the same wordings for 1 minute of reading or more
    }
    // I'm going to print 'X minute read' above my post
    $totalreadingtime = $readingtime . $timer;
    return $totalreadingtime;
}
/***********************************************************************************************/
/* Adding style css on dashboard */
/***********************************************************************************************/
function bvg_edit_page_link(){
    if(is_tax()){
        edit_term_link('<i class="fas fa-pencil-alt"></i><b class="sr-only">Edit Page</b>','<span class="edit-post-link">','</span>',null,'edit-post-link');
    }else{
        edit_post_link('<i class="fas fa-pencil-alt"></i><b class="sr-only">Edit Page</b>','','',null,'edit-post-link');
    }
}
add_action('bvg_edit_page_link','bvg_edit_page_link');
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

        $pagination = paginate_links( array(
            'base'       => str_replace($big, '%#%', esc_url(get_pagenum_link( $big ))),
            'format'     => '?paged=%#%',
            'current'    => max( 1, $paged ),
            'total'      => $max_page,
            'prev_next'    => true,
            'prev_text'    => __('<i class="fa fa-angle-left"></i>'),
            'next_text'    => __('<i class="fa fa-angle-right"></i>'),
            'type'       => 'array'
        ) );
        $pagination = str_replace('page/1/','', $pagination);
        if(is_array($pagination)){
            $pagination_html = '<ul class="pagination">';
                foreach ( $pagination as $key => $page_link ):
                    $pagination_html .= '<li class="page-item '.(strpos($page_link,'current') !== false?'active':'').'">'. str_replace( 'page-numbers', 'page-link', $page_link ).'</li>';
                endforeach;
            $pagination_html .= '</ul>';
            return $pagination_html;
        }

    }
    add_action('init', 'ao_wp_pagination');
endif;
/***********************************************************************************************/
add_action('pre_get_posts','ao_alter_main_query_ppp');
function ao_alter_main_query_ppp( $query ){
    if ( is_admin() || ! $query->is_main_query() ) {
        return;
    }
    if ( ! is_admin() && $query->is_main_query() && is_post_type_archive('development') ) {
        $query->set( 'posts_per_page', 4 );
        return;
    }
}
}
/***********************************************************************************************/
/***********************************************************************************************/
if(is_admin()){
/***********************************************************************************************/
/* Adding style css on dashboard */
/***********************************************************************************************/
function bvg_admin_enqueue_scripts(){
    wp_enqueue_style( 'bvg-admin-css', THEMEURI.'/admin-style.css', array(), 1);
}
add_action( 'admin_enqueue_scripts', 'bvg_admin_enqueue_scripts' );
/***********************************************************************************************/
/* fix no editor on posts page */
/***********************************************************************************************/
function bvg_fix_no_editor_on_posts_page($post)
{
    if($post->ID != get_option('page_for_posts') || post_type_supports('page', 'editor'))
        return;
    
    remove_action('edit_form_after_title', '_wp_posts_page_notice');
    add_post_type_support('page', 'editor');
}
add_action('edit_form_after_title', 'bvg_fix_no_editor_on_posts_page', 0);
/***********************************************************************************************/
/* Theme Option */
/***********************************************************************************************/
if(function_exists('acf_add_options_page')){
    acf_add_options_page(array(
        'page_title'    =>  __('Theme Options','bvg'),
        'menu_title'    =>  __('Theme Options','bvg'),
        'menu_slug'     =>  'theme-general-settings',
        'capability'    =>  'edit_posts',
        'position'      =>  55,
        'redirect'      =>  false
    ));
    // acf_add_options_sub_page(array(
    //     'page_title'    => 'CTA (For Work Single Page)',
    //     'menu_title'    => 'CTA (for work single)',
    //     'parent_slug'   => 'edit.php?post_type=work',
    // ));
}

/***********************************************************************************************/
/* Actions for removing category,tags & comments */
/***********************************************************************************************/
// Remove Categories and Tags
add_action('init', 'bvg_remove_tax');
function bvg_remove_tax() {
    register_taxonomy('post_tag', array());
}
// Removes from admin menu
add_action( 'admin_menu', 'bvg_remove_admin_menus' );
function bvg_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action('init', 'bvg_remove_comment_support', 100);
function bvg_remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function bvg_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'bvg_admin_bar_render' );
/***********************************************************************************************/
/* Change Label of admin menu */
/***********************************************************************************************/
//Change Posts labels in sidebar admin menu
function bvg_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'News';
    $submenu['edit.php'][5][0] = 'News';
    $submenu['edit.php'][10][0] = 'Add News';
}
//Change Posts labels in other admin area
function bvg_post_object_label() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'News';
    $labels->singular_name = 'News';
    $labels->add_new = 'Add News';
    $labels->add_new_item = 'Add News';
    $labels->edit_item = 'Edit News';
    $labels->new_item = 'News';
    $labels->view_item = 'View News';
    $labels->search_items = 'Search News';
    $labels->not_found = 'No results on News';
    $labels->not_found_in_trash = 'No News in Trash';
    $labels->name_admin_bar = 'Add News';       
}
add_action( 'init', 'bvg_post_object_label' );
add_action( 'admin_menu', 'bvg_post_menu_label' );
}
/***********************************************************************************************/
/***********************************************************************************************/

/***********************************************************************************************/
/* Register Custom Post Type */
/***********************************************************************************************/

function bvg_register_post_type() {
    $singular = 'Development';
    $plural = 'Developments';
    $labels = array(
        'name'                => $plural,
        'singular_name'       => $singular,
        'add_name'            => 'Add New',
        'add_new_item'        => 'Add New '.$singular,
        'edit'                => 'Edit',
        'edit_item'           => 'Edit '.$singular,
        'new_item'            => 'New '.$singular,
        'view'                => 'View '.$singular,
        'view_item'           => 'View '.$singular,
        'search_item'         => 'Search '.$plural,
        'parent'              => 'Parent '.$singular,
        'not_found'           => 'No '.$plural,
        'not_found_in_trash'  => 'No '.$plural.' in Trash',
    );
    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => true,
        'show_in_nav_menus'   => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 22,
        'menu_icon'           => 'dashicons-admin-post',
        'can_export'          => true,
        'delete_with_user'    => false,
        'hierarchical'        => true,
        'has_archive'         => true,
        'query_var'           => true,
        'capability_type'     => 'post',
        'map_meta_cap'        => true,
        // 'capabilities'        => array(),
        'rewrite'             => array(
            'slug'                => 'development',
            'with_front'          => false,
            'pages'               => true,
            'feeds'               => false
        ),
        'supports'            => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'custom-fields'
        ),
    );
    register_post_type('development',$args);

    $singular = 'FAQ';
    $plural = 'FAQs';
    $labels = array(
        'name'                => $plural,
        'singular_name'       => $singular,
        'add_name'            => 'Add New',
        'add_new_item'        => 'Add New '.$singular,
        'edit'                => 'Edit',
        'edit_item'           => 'Edit '.$singular,
        'new_item'            => 'New '.$singular,
        'view'                => 'View '.$singular,
        'view_item'           => 'View '.$singular,
        'search_item'         => 'Search '.$plural,
        'parent'              => 'Parent '.$singular,
        'not_found'           => 'No '.$plural,
        'not_found_in_trash'  => 'No '.$plural.' in Trash',
    );
    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => false,
        'exclude_from_search' => true,
        'show_in_nav_menus'   => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => false,
        'menu_position'       => 23,
        'menu_icon'           => 'dashicons-text-page',
        'can_export'          => true,
        'delete_with_user'    => false,
        'hierarchical'        => true,
        'has_archive'         => false,
        'query_var'           => false,
        'capability_type'     => 'post',
        'map_meta_cap'        => true,
        // 'capabilities'        => array(),
        'rewrite'             => array(
            'slug'                => 'faq',
            'with_front'          => true,
            'pages'               => true,
            'feeds'               => false
        ),
        'supports'              => array(
            'title',
            'editor'
        ),
    );
    register_post_type('faq',$args);

    $singular = 'Testimonial';
    $plural = 'Testimonials';
    $labels = array(
        'name'                => $plural,
        'singular_name'       => $singular,
        'add_name'            => 'Add New',
        'add_new_item'        => 'Add New '.$singular,
        'edit'                => 'Edit',
        'edit_item'           => 'Edit '.$singular,
        'new_item'            => 'New '.$singular,
        'view'                => 'View '.$singular,
        'view_item'           => 'View '.$singular,
        'search_item'         => 'Search '.$plural,
        'parent'              => 'Parent '.$singular,
        'not_found'           => 'No '.$plural,
        'not_found_in_trash'  => 'No '.$plural.' in Trash',
    );
    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => false,
        'exclude_from_search' => true,
        'show_in_nav_menus'   => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => false,
        'menu_position'       => 23,
        'menu_icon'           => 'dashicons-testimonial',
        'can_export'          => true,
        'delete_with_user'    => false,
        'hierarchical'        => true,
        'has_archive'         => false,
        'query_var'           => false,
        'capability_type'     => 'post',
        'map_meta_cap'        => true,
        // 'capabilities'        => array(),
        'rewrite'             => array(
            'slug'                => 'testimonial',
            'with_front'          => true,
            'pages'               => true,
            'feeds'               => false
        ),
        'supports'              => array(
            'title',
            'editor'
        ),
    );
    register_post_type('testimonial',$args);

    $singular = 'Member';
    $plural = 'Members';
    $labels = array(
        'name'                => $plural,
        'singular_name'       => $singular,
        'add_name'            => 'Add New',
        'add_new_item'        => 'Add New '.$singular,
        'edit'                => 'Edit',
        'edit_item'           => 'Edit '.$singular,
        'new_item'            => 'New '.$singular,
        'view'                => 'View '.$singular,
        'view_item'           => 'View '.$singular,
        'search_item'         => 'Search '.$plural,
        'parent'              => 'Parent '.$singular,
        'not_found'           => 'No '.$plural,
        'not_found_in_trash'  => 'No '.$plural.' in Trash',
    );
    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => false,
        'exclude_from_search' => true,
        'show_in_nav_menus'   => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => false,
        'menu_position'       => 23,
        'menu_icon'           => 'dashicons-groups',
        'can_export'          => true,
        'delete_with_user'    => false,
        'hierarchical'        => true,
        'has_archive'         => false,
        'query_var'           => false,
        'capability_type'     => 'post',
        'map_meta_cap'        => true,
        // 'capabilities'        => array(),
        'rewrite'             => array(
            'slug'                => 'member',
            'with_front'          => true,
            'pages'               => true,
            'feeds'               => false
        ),
        'supports'              => array(
            'title'
        ),
    );
    register_post_type('member',$args);
    register_taxonomy( 'member_categories', array('member'), array(
        'hierarchical' => true,
        'show_admin_column'=> true,
        'show_in_nav_menus'=> false,
        'labels' => array('name'=>'member Categories','singular_name'=>'Category','menu_name'=>'Categories'),
        'rewrite' => array( 'slug' => 'member-services', 'with_front'=> false )
        )
    );
    flush_rewrite_rules();
}
add_action( 'init', 'bvg_register_post_type' );