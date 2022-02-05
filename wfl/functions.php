<?php
/*==============================*/
// @package WaterFront Law
// @author Think EQ
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
if ( ! function_exists( 'wfl_setup' ) ) :
function wfl_setup() {
	// Make theme available for translation.
	load_theme_textdomain( 'wfl' );
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
        'header' => __( 'Header Navigation', 'wfl' ),
        'footer' => __( 'Footer Navigation', 'wfl' )
	) );
    // This theme styles the visual editor to resemble the theme style,
    add_editor_style( array( 'editor-style.css', /*wfl_fonts_url()*/ ) ); //get_stylesheet_uri()
    $GLOBALS['theme_options'] = array(
        'contact_url' => get_permalink(52),
        'telephone' => get_field('telephone','option'),
        'telephone_strip' => str_replace(' ','',get_field('telephone','option')),
        'fax' => get_field('fax','option'),
        'email' => get_field('email','option'),
        'address' => get_field('address','option'),
        'team_id' => 142,
        'expertise_id' => 182,
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
add_action( 'after_setup_theme', 'wfl_setup' );
// Sets the content width in pixels, based on the theme's design and stylesheet.
function wfl_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wfl_content_width', 1170 );
}
add_action( 'after_setup_theme', 'wfl_content_width', 0 );
/***********************************************************************************************/
/* Register Custom Post Type */
/***********************************************************************************************/
function wfl_register_post_type() {
    $singular = 'Team';
    $plural = 'Team';
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
        'exclude_from_search'   => false,
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
            'slug'      => 'team',
            'with_front'=> false,
            'pages'     => true,
            'feeds'     => false
        ),
        'supports'              => array(
            'title'
        ),
    );
    register_post_type( 'team', $args);
    register_taxonomy( 'team_categories', array('team'), array(
        'hierarchical' => true,
        'show_admin_column'=> true,
	    'show_in_nav_menus'=>false,
        'labels' => array('name'=>'Team Categories','singular_name'=>'Category','menu_name'=>'Categories'),
        'rewrite' => array( 'slug' => 'team-category', 'with_front'=> false )
        )
    );
    $singular = 'Expertise';
    $plural = 'Expertise';
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
        'exclude_from_search'   => false,
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
            'slug'      => 'expertise',
            'with_front'=> false,
            'pages'     => true,
            'feeds'     => false
        ),
        'supports'              => array(
            'title',
            'excerpt'

        ),
    );
    register_post_type( 'expertise', $args);
    register_taxonomy( 'expertise_categories', array('expertise'), array(
        'hierarchical' => true,
        'show_admin_column'=> true,
        'show_in_nav_menus'=>true,
        'labels' => array('name'=>'Expertise Categories','singular_name'=>'Category','menu_name'=>'Categories'),
        'rewrite' => array( 'slug' => 'expertise-category', 'with_front'=> false )
        )
    );
    $singular = 'Sector';
    $plural = 'Sectors';
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
        'exclude_from_search'   => false,
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
            'slug'      => 'sector',
            'with_front'=> false,
            'pages'     => true,
            'feeds'     => false
        ),
        'supports'              => array(
            'title',
            'excerpt'

        ),
    );
    register_post_type( 'sector', $args);
    // global $wp_rewrite, $wp;
    // add_rewrite_rule( "our-work/{$wp_rewrite->pagination_base}/([0-9]{1,})/?$", "index.php?pagename=our-work" . '&paged=$matches[1]', 'top' );
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
            'title'
        )
    );
    register_post_type('testimonial',$args);
    flush_rewrite_rules();
}
add_action( 'init', 'wfl_register_post_type' );
/***********************************************************************************************/
/* Function for Google Fonts */
/***********************************************************************************************/
function wfl_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'swap';
    /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
    if('off' !== _x( 'on', 'Open Sans font: on or off', 'wfl')){
        $fonts[] = 'family=Open Sans:wght@400;700';
    }
    if('off' !== _x( 'on', 'Josefin Sans font: on or off', 'wfl')){
        $fonts[] = 'family=Josefin Sans:wght@300;400;500;600;700';
    }
    if($fonts){
        $fonts_url = 'https://fonts.googleapis.com/css2?'.implode('&',$fonts).'&display='.$subsets;
    }
    return $fonts_url;
}
/***********************************************************************************************/
/***********************************************************************************************/
if(!is_admin()){
require_once THEMEDIR.'/page-modules/module-functions.php';
function wfl_modules_css(){
    if(is_home() || is_category() || is_singular('post')){
        $pageid = get_option('page_for_posts');
    }elseif(is_tax('team_categories')){
        $pageid = $GLOBALS['theme_options']['team_id'];
    }elseif(is_tax('expertise_categories')){
        $pageid = get_queried_object();
    }else{
        $pageid = get_the_ID();
    }
    $modules = get_field('modules',$pageid);
    if($modules):
        $modules_exclude_arr = array('simple_text_block','breadcrumb');
        $module_name = array();
        foreach ($modules as $module) {
            $module_name[] = $module['acf_fc_layout'];
        }
        $modules_arr_css = array_diff(array_unique($module_name),$modules_exclude_arr);
        foreach ($modules_arr_css as $value) {
            wp_enqueue_style($value,THEMEURI.'/page-modules/'.$value.'/'.$value.'.css',array('theme-style'),'1.0');
        }
    else:
        return null;
    endif;
}
/***********************************************************************************************/
/* Proper way to enqueue scripts and styles */
/***********************************************************************************************/
function wfl_css_scripts() {
    wp_dequeue_style( 'wp-block-library' );
    wp_enqueue_style('google-fonts', wfl_fonts_url(), array(), null );
    wp_enqueue_style('bootstrap', THEMEURI.'/include/css/bootstrap.min.css',array(),'4.6.0', 'all');
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array('bootstrap'), time() );
    wfl_modules_css();

    wp_enqueue_script('modernizr', 'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js',array('jquery'),'2.8.3',false);
    wp_enqueue_script('bootstrap', THEMEURI.'/include/js/bootstrap.min.js',array('jquery'),'4.6.0',true);
    wp_enqueue_script('theme-plugins', THEMEURI.'/include/js/main.js',array(), null, true);
    wp_enqueue_script('theme-script', THEMEURI.'/include/js/custom.js',array('bootstrap'),null,true);
    wp_localize_script('jquery','ajax_object',array(
        'ajax_url'  =>  admin_url('admin-ajax.php'),
        'home_url'  =>  esc_url(home_url()),
        'news_url'  =>  esc_url(get_post_type_archive_link('post'))
    ));
    wp_add_inline_script( 'jquery', 'var $ = jQuery.noConflict();' );
    if(is_singular() && comments_open() && get_option('thread_comments')){
        wp_enqueue_script('comment-reply');
    }
}
add_action( 'wp_enqueue_scripts', 'wfl_css_scripts' );
/***********************************************************************************************/
/* Page Slug Body Class */
/***********************************************************************************************/
function wfl_add_slug_body_class( $classes ) {
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
add_filter( 'body_class', 'wfl_add_slug_body_class' );
/***********************************************************************************************/
/* Custom Nav Walker */
/***********************************************************************************************/
class wfl_Walker_Nav_Mobile_Menu extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\" role=\"menu\">\n";
    }
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        if(in_array('has-submenu', $item->classes)):
            $parent_title = 'All ' . $item->title . ' Developments';
            $back_text = 'Back to locations';
        else:
            $parent_title = $item->title.' overview';
            $back_text = 'main menu';
        endif;
        if ( array_search( 'menu-item-has-children', $item->classes ) ) {
            $output .= sprintf( "\n<li role='menuitem' class='has-submenu %s'><a href='%s' aria-label='%s'>%s</a>\n<div class='mp-level'><img src='https://devsmp.com/wfl/wp-content/uploads/2021/12/menu-bg.jpg' /><a class='mp-back' href='#'>%s</a><div class='menu-btn-parent'><a href='%s' class='btn btn-outline btn-block'>%s</a></div>", ( array_search( 'current-menu-item', $item->classes ) || array_search( 'current-page-parent', $item->classes ) ) ? 'active '.join(' ',$item->classes) : join(' ',$item->classes), $item->url, $item->title, $item->title, $back_text, $item->url, $parent_title );
        } else {
            $item_title = $item->title;
            $navDevelopLoc = '';
            if($item->object === 'developments'){
                $navDevelopLoc = ', <small>'.ucfirst(strtolower(get_field('location',$item->object_id))).'</small>';
            }
            if($item->title === 'Simple Life London' && 1 === $depth){
                $sll_logo_SVG = get_field('sll_logo_SVG_mono','option');
                $item_title = $sll_logo_SVG;
            }
            $output .= sprintf( "\n<li role='menuitem' class='%s'><a href='%s' aria-label='%s'>%s</a>\n", ( array_search( 'current-menu-item', $item->classes ) || array_search( 'current-page-parent', $item->classes ) ) ? 'active '.join(' ',$item->classes) : join(' ',$item->classes), $item->url, $item_title . ', ' . ucfirst(strtolower(get_field('location',$item->object_id))), $item_title.$navDevelopLoc );
        }
    }
}
/***********************************************************************************************/
/* filter for adding class in nav menu */
/***********************************************************************************************/
add_filter('nav_menu_css_class' , 'wfl_active_nav_class' , 10 , 2);
function wfl_active_nav_class ($classes, $item) {
    if (in_array('current-post-ancestor', $classes) || in_array('current-page-ancestor', $classes) || in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'wfl_add_active_class', 10, 2 );
function wfl_add_active_class($classes, $item) {
    if((is_singular('post') || is_category()) && (in_array('menu-item-87', $classes) || in_array('menu-item-260', $classes)) ){
        $classes[] = "active";
    }
    if(is_singular('sector') && in_array('menu-item-272', $classes)){
        $classes[] = "active";
    }
    if((is_tax('expertise_categories') || is_singular('expertise')) && in_array('menu-item-271', $classes)){
        $classes[] = "active";
    }
    if(is_singular('team') && in_array('menu-item-270', $classes)){
        $classes[] = "active";
    }
    return $classes;
}
function wfl_current_year_shortcode() {
  $year = date('Y');
  return $year;
}
add_shortcode('current_year', 'wfl_current_year_shortcode');
// define the gsn_li_attributes callback 
function wfl_bootstrap_gsn_li_attributes($li_class){
  // add 'breadcrumb-item' class
  $patterns[0] = '/class="/';
  $replacements[0] = '/class="breadcrumb-item ';
  // change 'current_item' to 'active'
  $patterns[1] = '/current_item/';
  $replacements[1] = 'active';
  return preg_replace( $patterns, $replacements, $li_class);
};
add_filter( "gsn_li_attributes", "wfl_bootstrap_gsn_li_attributes", 10, 3);
function ao_get_domain_name($url){
    preg_match('@^(https?://)?([a-z0-9_-]+\.)*([a-z0-9_-]+)\.[a-z]{2,6}(/.*)?$@i',$url,$match);
    return $match[3];
}
/***********************************************************************************************/
/* Filter for CF7 select empty */
/***********************************************************************************************/
function wfl_wpcf7_form_elements($html) {
    $text = 'Please select';
    $html = str_replace('<option value="">---</option>', '<option value="">' . $text . '</option>', $html);
    return $html;
}
add_filter('wpcf7_form_elements', 'wfl_wpcf7_form_elements');
/***********************************************************************************************/
/* Excerpt Settings */
/***********************************************************************************************/
function wfl_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'wfl_excerpt_more');
function wfl_excerpt_length( $length ) {
    return 48;
}
add_filter( 'excerpt_length', 'wfl_excerpt_length', 999 );
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
/* Get Reading Minutes */
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
        $timer = " minute read";
    } else {
        $timer = " minute read"; // or your version :) I use the same wordings for 1 minute of reading or more
    }
    // I'm going to print 'X minute read' above my post
    $totalreadingtime = $readingtime . $timer;
    return $totalreadingtime;
}
/***********************************************************************************************/
/* Get The COntent By ID */
/***********************************************************************************************/
function wfl_get_the_content_by_id($pid,$tags=false){
    $content_post = get_post($pid);
    $content = $content_post->post_content;
    if($tags==true){
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
    }
    echo $content;
}
/***********************************************************************************************/
/* Iframe settings */
/***********************************************************************************************/
function ao_iframe($name){
    // get iframe HTML
    $iframe = $name;
    // use preg_match to find iframe src
    preg_match('/src="(.+?)"/', $iframe, $matches);
    $src = $matches[1];
    // add extra params to iframe src
    $params = array(
        //'controls'    => 0,
        //'hd'        => 1,
        'autoplay'    => 0,
        'rel'        => 0,
        'enablejsapi'   => 1
    );
    $new_src = add_query_arg($params, $src);
    $iframe = str_replace($src, $new_src, $iframe);
    // add extra attributes to iframe html
    $attributes = 'class="embed-responsive-item"';
    $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
    $iframe = str_replace('frameborder="0"', '', $iframe);
    return $iframe;
}
add_action('ao_iframe','ao_iframe');
/* Pull apart OEmbed video link to get thumbnails out*/
function get_video_thumbnail_uri( $video_uri ) {
    $thumbnail_uri = '';
    // determine the type of video and the video id
    $video = parse_video_uri( $video_uri );     
    // get youtube thumbnail
    if ( $video['type'] == 'youtube' )
        /*
        - http://img.youtube.com/vi/I03uuxgpWd8/0.jpg (480x360px)
        - http://img.youtube.com/vi/I03uuxgpWd8/1.jpg (120x90px)
        - http://img.youtube.com/vi/I03uuxgpWd8/2.jpg (120x90px)
        - http://img.youtube.com/vi/I03uuxgpWd8/3.jpg (120x90px)
        - http://img.youtube.com/vi/I03uuxgpWd8/maxresdefault.jpg (1920x1080px)
        - http://img.youtube.com/vi/I03uuxgpWd8/sddefault.jpg (640x480px)
        - http://img.youtube.com/vi/I03uuxgpWd8/hqdefault.jpg (480x360px)
        - http://img.youtube.com/vi/I03uuxgpWd8/mqdefault.jpg (320x180px)
        - http://img.youtube.com/vi/I03uuxgpWd8/default.jpg (120x90px)
        */
        $thumbnail_uri = 'https://img.youtube.com/vi/' . $video['id'] . '/hqdefault.jpg';
    // get vimeo thumbnail
    if( $video['type'] == 'vimeo' )
        $thumbnail_uri = get_vimeo_thumbnail_uri( $video['id'] );
    // get default/placeholder thumbnail
    if( empty( $thumbnail_uri ) || is_wp_error( $thumbnail_uri ) )
        $thumbnail_uri = ''; 
    //return thumbnail uri
    return $thumbnail_uri;
}
/* Parse the video uri/url to determine the video type/source and the video id */
function parse_video_uri( $url ) {
    // Parse the url 
    $parse = parse_url( $url );
    // Set blank variables
    $video_type = '';
    $video_id = '';
    // Url is http://youtu.be/xxxx
    if ( $parse['host'] == 'youtu.be' ) {
        $video_type = 'youtube';
        $video_id = ltrim( $parse['path'],'/' );    
    }
    // Url is http://www.youtube.com/watch?v=xxxx 
    // or http://www.youtube.com/watch?feature=player_embedded&v=xxx
    // or http://www.youtube.com/embed/xxxx
    if ( ( $parse['host'] == 'youtube.com' ) || ( $parse['host'] == 'www.youtube.com' ) ) {
        $video_type = 'youtube';
        parse_str( $parse['query'] );
        $video_id = $v; 
        if ( !empty( $feature ) )
            $video_id = end( explode( 'v=', $parse['query'] ) );
        if ( strpos( $parse['path'], 'embed' ) == 1 )
            $video_id = end( explode( '/', $parse['path'] ) );
    }
    // Url is http://www.vimeo.com
    if ( ( $parse['host'] == 'vimeo.com' ) || ( $parse['host'] == 'www.vimeo.com' ) ) {
        $video_type = 'vimeo';
        $video_id = ltrim( $parse['path'],'/' );    
    }
    $host_names = explode(".", $parse['host'] );
    $rebuild = ( ! empty( $host_names[1] ) ? $host_names[1] : '') . '.' . ( ! empty($host_names[2] ) ? $host_names[2] : '');
    // If recognised type return video array
    if ( !empty( $video_type ) ) {
        $video_array = array(
            'type' => $video_type,
            'id' => $video_id
        );
        return $video_array;
    } else {
        return false;
    }
}
/* Takes a Vimeo video/clip ID and calls the Vimeo API v2 to get the large thumbnail URL.*/
function get_vimeo_thumbnail_uri( $clip_id ) {
    $vimeo_api_uri = 'http://vimeo.com/api/v2/video/' . $clip_id . '.php';
    $vimeo_response = wp_remote_get( $vimeo_api_uri );
    if( is_wp_error( $vimeo_response ) ) {
        return $vimeo_response;
    } else {
        $vimeo_response = unserialize( $vimeo_response['body'] );
        return $vimeo_response[0]['thumbnail_large'];
    }    
}
add_action( 'ao_video_autoplay', 'ao_video_autoplay' );
function ao_video_autoplay($video){
  if($video){
    // Add autoplay functionality to the video code
    if(preg_match('/src="(.+?)"/', $video, $matches)){
      // Video source URL
      $src = $matches[1];
      // Add option to hide controls, enable HD, and do autoplay -- depending on provider
      $params = array(
        'controls'    => 1,
        'hd'        => 1,
        'fs'        => 1,
        'rel'        => 0,
        'modestbranding' => 1,
        'autoplay' => 1,
        'mute' => 1
      );
      $new_src = add_query_arg($params, $src);
      $video = str_replace($src, $new_src, $video);
      // add extra attributes to iframe html
      $attributes = 'frameborder="0"';
      $video = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $video);
    }
    echo $video;
  }
}
/***********************************************************************************************/
/* Adding style css on dashboard */
/***********************************************************************************************/
function ao_edit_page_link(){
    if(is_tax()){
        edit_term_link('<i class="fas fa-pencil-alt"></i><b class="sr-only">Edit Page</b>','<span class="edit-post-link">','</span>',null,'edit-post-link');
    }else{
        edit_post_link('<i class="fas fa-pencil-alt"></i><b class="sr-only">Edit Page</b>','','',null,'edit-post-link');
    }
}
add_action('ao_edit_page_link','ao_edit_page_link');
}
/***********************************************************************************************/
/***********************************************************************************************/
if(is_admin()){
/***********************************************************************************************/
/* ACF Flexible Content Preview Path */
/***********************************************************************************************/
function wfl_acf_popup_preview($path){
    $path = 'page-modules/module-previews';
    return $path;
}
add_filter( 'acf-flexible-content-preview.images_path', 'wfl_acf_popup_preview' );
/***********************************************************************************************/
/* Adding style css on dashboard */
/***********************************************************************************************/
function wfl_admin_enqueue_scripts(){
    wp_enqueue_style( 'gs-admin-css', THEMEURI.'/admin-style.css', array(), 1);
}
add_action( 'admin_enqueue_scripts', 'wfl_admin_enqueue_scripts' );
/***********************************************************************************************/
/* Theme Option */
/***********************************************************************************************/
if(function_exists('acf_add_options_page')){
    acf_add_options_page(array(
        'page_title'    =>  __('Theme Options','wfl'),
        'menu_title'    =>  __('Theme Options','wfl'),
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
add_action('init', 'wfl_remove_tax');
function wfl_remove_tax() {
    //register_taxonomy('category', array());
    register_taxonomy('post_tag', array());
   // register_post_type('post', array());
}
// Removes from admin menu
add_action( 'admin_menu', 'wfl_remove_admin_menus' );
function wfl_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action('init', 'wfl_remove_comment_support', 100);
function wfl_remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function wfl_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'wfl_admin_bar_render' );
/***********************************************************************************************/
/* Change Label of admin menu */
/***********************************************************************************************/
//Change Posts labels in sidebar admin menu
function wfl_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Insight';
    $submenu['edit.php'][5][0] = 'Insight';
    $submenu['edit.php'][10][0] = 'Add Insight';
}
//Change Posts labels in other admin area
function wfl_post_object_label() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Insight';
    $labels->singular_name = 'Insight';
    $labels->add_new = 'Add Insight';
    $labels->add_new_item = 'Add Insight';
    $labels->edit_item = 'Edit Insight';
    $labels->new_item = 'Insight';
    $labels->view_item = 'View Insight';
    $labels->search_items = 'Search Insight';
    $labels->not_found = 'No results on Insight';
    $labels->not_found_in_trash = 'No Insight in Trash';
    $labels->name_admin_bar = 'Add Insight';       
}
add_action( 'init', 'wfl_post_object_label' );
add_action( 'admin_menu', 'wfl_post_menu_label' );
}
function ao_filter_gallery_img_atts( $atts, $attachment ) {
    if(empty($atts['alt'])){
        $atts['alt'] = str_replace('-', ' ', get_the_title($attachment->ID));
    }
    return $atts;
}
add_filter( 'wp_get_attachment_image_attributes', 'ao_filter_gallery_img_atts', 10, 2 );

// hook into the init action and call custom_post_formats_taxonomies when it fires
add_action( 'init', 'custom_post_formats_taxonomies', 0 );

// create a new taxonomy we're calling 'format'
function custom_post_formats_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Formats', 'taxonomy general name', 'wfl' ),
        'singular_name'     => _x( 'Format', 'taxonomy singular name', 'wfl' ),
        'search_items'      => __( 'Search Formats', 'wfl' ),
        'all_items'         => __( 'All Formats', 'wfl' ),
        'parent_item'       => __( 'Parent Format', 'wfl' ),
        'parent_item_colon' => __( 'Parent Format:', 'wfl' ),
        'edit_item'         => __( 'Edit Format', 'wfl' ),
        'update_item'       => __( 'Update Format', 'wfl' ),
        'add_new_item'      => __( 'Add New Format', 'wfl' ),
        'new_item_name'     => __( 'New Format Name', 'wfl' ),
        'menu_name'         => __( 'Format', 'wfl' ),
    );


    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'format' ),
        'capabilities' => array(
            'manage_terms' => '',
            'edit_terms' => '',
            'delete_terms' => '',
            'assign_terms' => 'edit_posts'
        ),
        'public' => true,
        'show_in_nav_menus' => false,
        'show_tagcloud' => false,
    );
    register_taxonomy( 'format', array( 'post' ), $args ); // our new 'format' taxonomy
}


// make sure there's a default Format type and that it's chosen if they didn't choose one
function moseyhome_default_format_term( $post_id, $post ) {
    if ( 'publish' === $post->post_status ) {
        $defaults = array(
            'format' => 'blog' // change 'default' to whatever term slug you created above that you want to be the default
            );
        $taxonomies = get_object_taxonomies( $post->post_type );
        foreach ( (array) $taxonomies as $taxonomy ) {
            $terms = wp_get_post_terms( $post_id, $taxonomy );
            if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
                wp_set_object_terms( $post_id, $defaults[$taxonomy], $taxonomy );
            }
        }
    }
}
add_action( 'save_post', 'moseyhome_default_format_term', 100, 2 );


// replace checkboxes for the format taxonomy with radio buttons and a custom meta box
function wpse_139269_term_radio_checklist( $args ) {
    if ( ! empty( $args['taxonomy'] ) && $args['taxonomy'] === 'format' ) {
        if ( empty( $args['walker'] ) || is_a( $args['walker'], 'Walker' ) ) { // Don't override 3rd party walkers.
            if ( ! class_exists( 'WPSE_139269_Walker_Category_Radio_Checklist' ) ) {
                class WPSE_139269_Walker_Category_Radio_Checklist extends Walker_Category_Checklist {
                    function walk( $elements, $max_depth, $args = array() ) {
                        $output = parent::walk( $elements, $max_depth, $args );
                        $output = str_replace(
                            array( 'type="checkbox"', "type='checkbox'" ),
                            array( 'type="radio"', "type='radio'" ),
                            $output
                        );
                        return $output;
                    }
                }
            }
            $args['walker'] = new WPSE_139269_Walker_Category_Radio_Checklist;
        }
    }
    return $args;
}


add_filter( 'wp_terms_checklist_args', 'wpse_139269_term_radio_checklist' );