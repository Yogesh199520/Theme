<?php
/*==============================*/
// @package HYD
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
if(!function_exists('hyd_dialysis_theme_support')) :
    function hyd_dialysis_theme_support() {
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );
        // Add theme support title tag.
        add_theme_support( 'title-tag' );
        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );
        //add_theme_support( 'post-thumbnails' );
        add_theme_support( 'responsive-embeds' );
        add_theme_support( 'post-thumbnails' );
        load_theme_textdomain( 'HYD' );
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
              'header_menu' => 'Header Menu',
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
add_action( 'after_setup_theme', 'hyd_dialysis_theme_support' );
/***********************************************************************************************/
/* Function for Google Fonts */
/***********************************************************************************************/
function hyd_dialysis_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'swap';
    /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
    if('off' !== _x( 'on', 'Montserrat font: on or off', 'acc')){
        $fonts[] = 'family=Montserrat:wght@300;400;500;600;700;900';
    }
    /*if('off' !== _x( 'on', 'Poppins font: on or off', 'acc')){
        $fonts[] = 'family=Poppins:wght@400;700';
    }*/
    if($fonts){
        $fonts_url = 'https://fonts.googleapis.com/css2?'.implode('&',$fonts).'&display='.$subsets;
    }
    return $fonts_url;
}
/***********************************************************************************************/
/* Proper way to enqueue scripts and styles */
/***********************************************************************************************/
function hyd_dialysis_css_scripts() {
    wp_dequeue_style( 'wp-block-library' );
    wp_enqueue_style('google-fonts', hyd_dialysis_fonts_url(), array(), null );
    wp_enqueue_style('bootstrap', THEMEURI.'/include/css/bootstrap.min.css',array(),'4.5.0', 'all');
   
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array('bootstrap') );

    wp_enqueue_script('bootstrap', THEMEURI.'/include/js/bootstrap.min.js',array('jquery-core'),'4.5.0',true);
    wp_enqueue_script('main-script', THEMEURI.'/include/js/main.js',array('bootstrap'),'1.0',true);
    wp_enqueue_script('theme-script', THEMEURI.'/include/js/custom.js',array('bootstrap'),null,true);
    wp_enqueue_script('fontawesome','https://kit.fontawesome.com/20dd01c86d.js');
    wp_localize_script('theme-script','ajax_object',array('ajax_url'=>admin_url('admin-ajax.php')));
    wp_add_inline_script( 'jquery-core', 'var $ = jQuery.noConflict();' );
    if(is_singular() && comments_open() && get_option('thread_comments')){
        wp_enqueue_script('comment-reply');
    }
}
add_action( 'wp_enqueue_scripts', 'hyd_dialysis_css_scripts' );


/***********************************************************************************************/
/* Page Slug Body Class */
/***********************************************************************************************/
function hyd_dialysis_add_slug_body_class( $classes ) {
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
add_filter( 'body_class', 'hyd_dialysis_add_slug_body_class' );
/***********************************************************************************************/
/* filter for adding class in nav menu */
/***********************************************************************************************/
add_filter('nav_menu_css_class' , 'hyd_dialysis_active_nav_class' , 10 , 2);
function hyd_dialysis_active_nav_class ($classes, $item) {
    if (in_array('current-post-ancestor', $classes) || in_array('current-page-ancestor', $classes) || in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}
/***********************************************************************************************/
// Get Current Year Short Code
/***********************************************************************************************/
function hyd_dialysis_current_year(){
    $year = date_i18n('Y');
    return $year;
}
add_shortcode('current_year','hyd_dialysis_current_year');



/***********************************************************************************************/
/* Actions for removing category,tags & comments */
/***********************************************************************************************/
// Remove Categories and Tags
add_action('init', 'hyd_dialysis_remove_tax');
function hyd_dialysis_remove_tax() {
    register_taxonomy('post_tag', array());
    /*register_post_type('post', array());*/
}
// Removes from admin menu
add_action( 'admin_menu', 'hyd_dialysis_remove_admin_menus' );
function hyd_dialysis_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action('init', 'hyd_dialysis_remove_comment_support', 100);
function hyd_dialysis_remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function hyd_dialysis_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'hyd_dialysis_admin_bar_render' );
/***********************************************************************************************/
/* Theme Option */
/***********************************************************************************************/
if(function_exists('acf_add_options_page')){
    acf_add_options_page(array(
        'page_title'    =>  __('Theme Options','HYD'),
        'menu_title'    =>  __('Theme Options','HYD'),
        'menu_slug'     =>  'theme-general-settings',
        'capability'    =>  'edit_posts',
        'position'      =>  59,
        'redirect'      =>  false
    ));
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
            return '<ul class="page-num type2 d-flex justify-content-end"><li>'.implode('</li><li>', $posts).'</li></ul>';
        }
    }
    add_action('init', 'ao_wp_pagination');
endif;

/***********************************************************************************************/
/* Register Custom Post Type */
/***********************************************************************************************/
function hyd_dialysis_register_post_type() {
    $singular = 'Patient Story';
    $plural = 'Patient Stories';
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
            'slug'      => 'patient-stories',
            'with_front'=> false,
            'pages'     => true,
            'feeds'     => false
        ),
        'supports'      => array(
            'title',
            'thumbnail',
            'editor',
            'excerpt'
        ),
    );
    register_post_type('patient-stories',$args);
    register_taxonomy( 'patient_category', 'patient-stories', array(
        'label'        => __( 'Category', 'hyd_dialysis'),
        'rewrite'      => array( 'slug' => 'patient-category'),
        'hierarchical' => true,
        'show_admin_column'=> true
    ));

    $singular = 'Faq';
    $plural = 'Faqs';
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
            'slug'      => 'fasq',
            'with_front'=> false,
            'pages'     => true,
            'feeds'     => false
        ),
        'supports'      => array(
            'title',
            'editor'
        ),
    );
    register_post_type('faqs',$args);
    register_taxonomy( 'faqs-category', 'faqs', array(
        'label'        => __( 'Category', 'HYD'),
        'rewrite'      => array( 'slug' => 'faqs-category'),
        'hierarchical' => true,
        'show_admin_column'=> true
    ));

    $singular = 'Eevnt';
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
            'editor',
            'custom-fields',
            'thumbnail',
        ),
    );
    register_post_type('events',$args);
    flush_rewrite_rules();
}
add_action( 'init', 'hyd_dialysis_register_post_type' );


/***********************************************************************************************/
/* Update the WordPress Login Logo And URL  */
/***********************************************************************************************/
/*function hyd_login_logo() { ?>
<style>
    #login h1 a, .login h1 a { background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/include/images/logo.png);background-repeat: no-repeat;padding-bottom: 30px;height:100%;width:100%;background-size: 320px 52px;background-repeat: no-repeat;}
</style>
<?php }
add_action( 'login_enqueue_scripts','hyd_login_logo');
function hyd_site_url() {  return home_url(); }
add_filter( 'login_headerurl', 'hyd_site_url' );

function hyd_back_to_site_url( $link ) {
    return '<a href="' . esc_url( home_url( '/' ) ) . '">' . __( 'Back to the website', 'HYD' ) . '</a>';
}
add_filter( 'login_site_html_link', 'hyd_back_to_site_url', 10, 1 );*/

function smp_breadcrumb_list() {
        echo '<ol class="breadcrumb">';
    if (!is_home()) {
        echo '<li><a href="';
        echo get_option('home');
        echo '">';
        echo 'Home';
        echo "</a></li>";
        if (is_category() || is_single()) {
            echo '<li>';
            the_category(' </li><li> ');
            if (is_single()) {
                echo "</li><li>";
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            echo '<li>';
            echo the_title();
            echo '</li>';
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
    echo '</ol>';
}