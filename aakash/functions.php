<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 * This for Theme function
 */
if ( ! isset( $content_width ) ) $content_width = 900;
/***********************************************************************************************/
/* Define Constants */
/***********************************************************************************************/
define('THEMEDIR', get_stylesheet_directory_uri());
define('IMG', THEMEDIR.'/include/images');

/***********************************************************************************************/
/* Remove Admin bar */
/***********************************************************************************************/
function remove_admin_bar()
{
    return false;
}
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar

/***********************************************************************************************/
/* Add Thumbnail Theme Support */
/***********************************************************************************************/
add_theme_support('post-thumbnails');
add_theme_support('post-formats',array('aside','image','video','quote','link','gallery','status','audio','chat',));
add_theme_support( "title-tag" );
add_theme_support( "custom-header", $args );
add_theme_support( "custom-background", $args );
add_theme_support( 'automatic-feed-links' );
remove_theme_support('post-formats');

/***********************************************************************************************/
/* Register Option Page */
/***********************************************************************************************/
add_action('init', 'add_my_options_page');
function add_my_options_page() {
    acf_add_options_page(array(
        'page_title'    => 'Testimonials',
        'menu_title'    => 'Testimonials',
        'menu_slug'     => 'testimonials',
        'capability'    => 'edit_posts',
        'icon_url'      => 'dashicons-testimonial',
        'redirect'      => false,
        'position'      => 50
    ));
    acf_add_options_page(array(
        'page_title'    => 'Theme Setting',
        'menu_title'    => 'Theme Setting',
        'menu_slug'     => 'theme_setting',
        'capability'    => 'edit_posts',
        'icon_url'      => 'dashicons-admin-tools',
        'redirect'      => false
    ));
}
/***********************************************************************************************/
/*Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin*/
/***********************************************************************************************/
function slicemytheme_wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'prev_next'    => True,
        'prev_text'    => __('<i class="fa fa-angle-left"></i>'),
        'next_text'    => __('<i class="fa fa-angle-right"></i>'),
        'total' => $wp_query->max_num_pages
    ));
}
add_action('init', 'slicemytheme_wp_pagination'); // Add our HTML5 Pagination

/***********************************************************************************************/
// Custom Comments Callback
/***********************************************************************************************/
function slicemythemecomments( $comment, $args, $depth ) {
    if(in_array($comment->comment_type, array('pingback', 'trackback'))) return;
    ?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
        <div class="post-comment">
        <?php //======== author photo ======== ?>
            <?php echo get_avatar( $comment, 100 ) ?>
        <?php //======== comment text & info ======== ?>
        <div class="desc">
            <h5><?php echo esc_html(get_comment_author( $comment )) ?><small><?php edit_comment_link( __( 'Edit', 'slicemytheme' ), ' ' ); ?></small></h5>
            <p class="date"><?php comment_time('j.m.Y') ?></p>
            <?php comment_text() ?>
            <p class="reply-btn">
                <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                <?php if($comment->comment_approved == '0') : ?><div class="text-muted"><?php echo __('Your comment is awaiting moderation.', 'slicemytheme') ?></div><?php endif ?>
            </p>
        </div>
        </div>
    </li>
<?php }
// filter to replace class on avatar pic
function add_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='avatar img-profile", $class);
    return $class;
}
add_filter('get_avatar','add_gravatar_class');
// filter to replace class on reply link
function replace_reply_link_class($class){
    $class = str_replace("class='comment-reply-link", "class='btn btn-primary btn-xs", $class);
    return $class;
}
//           class name             function name
add_filter('comment_reply_link', 'replace_reply_link_class');

/***********************************************************************************************/
// Remove "Nav Menu" page from menu
/***********************************************************************************************/
add_action( 'admin_menu', 'slicemytheme_remove_nav_menu_page' );
function slicemytheme_remove_nav_menu_page() {
    global $submenu;
    unset( $submenu['themes.php'][10] );
    unset( $submenu['themes.php'][6] );
}


/***********************************************************************************************/
/* Field Setting */
/***********************************************************************************************/
add_filter('acf/settings/dir', 'acf_slicemytheme');
function acf_slicemytheme() {
    return get_template_directory_uri() . '/admin/plugins/advanced-custom-fields-pro/';
}
add_filter('acf/settings/show_admin', '__return_false');

require_once 'admin/plugins/advanced-custom-fields-pro/acf.php';
require_once 'admin/plugins/advanced-custom-fields-font-awesome/acf-font-awesome.php';
require_once 'admin/plugins/acf_fields.php';
require_once get_template_directory().'/admin/tgm/settings.php';

/***********************************************************************************************/
// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
/***********************************************************************************************/
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

/***********************************************************************************************/
/* Register Project Post Type */
/***********************************************************************************************/
add_action('init', 'project_register');
function project_register() {
    $labels = array(
        'name' => 'Projects',
        'singular_name' => 'Project',
        'add_new' => 'Add New',
        'add_new_item' =>'Add New Project Item',
        'edit_item' => 'Edit Project Item',
        'new_item' => 'New Project Item',
        'view_item' => 'View Project Item',
        'search_items' => 'Search Project',
        'not_found' =>  'Nothing found',
        'not_found_in_trash' => 'Nothing found in Trash',
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'menu_icon' => 'dashicons-desktop',
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title','thumbnail','editor')
      ); 
    register_post_type( 'project' , $args );
    flush_rewrite_rules();
}
register_taxonomy("project_categories", array("project"), array("hierarchical" => true, "label" => "Categories", "singular_label" => "Category", "rewrite" => true));

function project_change_title_text( $title ){
     $screen_project = get_current_screen();
     if  ( 'project' == $screen_project->post_type ) {
          $title = 'Enter Project Name';
     }
     return $title;
}
add_filter( 'enter_title_here', 'project_change_title_text' );
add_action('do_meta_boxes', 'change_image_box');
function change_image_box()
{
    remove_meta_box( 'postimagediv', 'project', 'side' );
    add_meta_box('postimagediv', 'Project Image', 'post_thumbnail_meta_box', 'project', 'side', 'low');
}
function project_the_terms(){
    $terms = get_the_terms(get_the_ID(), "project_categories");
    foreach($terms as $term){
        $html .= $term->slug;
    }
    echo $html;
}

