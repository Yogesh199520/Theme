<?php
/*==============================*/
// @package Sharkup
// @author Medical Darpan
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
if ( ! function_exists( 'sharkup_setup' ) ) :
function sharkup_setup() {
    // Make theme available for translation.
    load_theme_textdomain( 'sharkup');
    // Add default posts and comments RSS feed links to head.
    // add_theme_support( 'automatic-feed-links');
    //Let WordPress manage the document title.
    add_theme_support( 'title-tag');
    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails');
    //add_image_size('blog-thumbnails',704,380,array('center','center'));
    // Add support for responsive embeds.
    add_theme_support( 'responsive-embeds');
    //Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support(
        'html5',
        array(
            // 'search-form',
            // 'comment-form',
            // 'comment-list',
            'gallery',
            'caption',
            'script',
            'style',
        )
   );
    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus( array(
        'header' => __( 'Header Navigation', 'sharkup' ),
        'footer1' => __( 'Footer 1 Navigation', 'sharkup' ),
        'footer2' => __( 'Footer 2 Navigation', 'sharkup' )
    ));
    // This theme styles the visual editor to resemble the theme style,
    add_editor_style( array( 'editor-style.css', /*sharkup_fonts_url()*/ )); //get_stylesheet_uri()
    $GLOBALS['theme_options'] = array(
        'telephone' => get_field('telephone','option'),
        'telephone_strip' => str_replace(' ','',get_field('telephone','option')),
        'email' => get_field('email','option'),
        'address' => get_field('address','option')
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
add_action( 'after_setup_theme', 'sharkup_setup');
// Sets the content width in pixels, based on the theme's design and stylesheet.
function sharkup_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'sharkup_content_width', 1170);
}
add_action( 'after_setup_theme', 'sharkup_content_width', 0);
/***********************************************************************************************/
/***********************************************************************************************/
if(!is_admin()){
/***********************************************************************************************/
/* Proper way to enqueue scripts and styles */
/***********************************************************************************************/
function sharkup_css_scripts() {
    wp_dequeue_style( 'wp-block-library');
    
    wp_enqueue_style( 'bootstrap', THEMEURI.'/include/css/bootstrap.min.css',array(),'5.0.2', 'all');
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array('bootstrap'), time());

    wp_enqueue_script('bootstrap', THEMEURI.'/include/js/bootstrap.min.js',array('jquery-core'),'5.0.2',true);
    wp_enqueue_script('theme-script', THEMEURI.'/include/js/custom.js',array('jquery-core'),time(),true);
    wp_localize_script('theme-script','ajax_object',array('ajax_url'=>admin_url('admin-ajax.php')));
    wp_add_inline_script( 'jquery-core', 'var $ = jQuery.noConflict();');
    wp_localize_script('theme-script','ajax_object',array('ajax_url'=>admin_url('admin-ajax.php')));
    if(is_singular() && comments_open() && get_option('thread_comments')){
        wp_enqueue_script('comment-reply');
    }
    wp_register_script('fontawesome', 'https://kit.fontawesome.com/20dd01c86d.js', null, null, true);
    wp_enqueue_script('fontawesome');
}
add_action( 'wp_enqueue_scripts', 'sharkup_css_scripts');
/***********************************************************************************************/
/* Page Slug Body Class */
/***********************************************************************************************/
function sharkup_add_slug_body_class( $classes ) {
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
add_filter( 'body_class', 'sharkup_add_slug_body_class');
/***********************************************************************************************/
/* filter for adding class in nav menu */
/***********************************************************************************************/
add_filter('nav_menu_css_class' , 'sharkup_active_nav_class' , 10 , 2);
function sharkup_active_nav_class ($classes, $item) {
    if (in_array('current-post-ancestor', $classes) || in_array('current-page-ancestor', $classes) || in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'sharkup_add_active_class', 10, 2);
function sharkup_add_active_class($classes, $item) {
    if(is_singular('services') && in_array('menu-item-55', $classes)){
        $classes[] = "active";
    }
    return $classes;
}
function sharkup_year_shortcode() {
  $year = date('Y');
  return $year;
}
add_shortcode('year', 'sharkup_year_shortcode');
// define the gsn_li_attributes callback 
function sharkup_bootstrap_gsn_li_attributes($li_class){
  // add 'breadcrumb-item' class
  $patterns[0] = '/class="/';
  $replacements[0] = '/class="breadcrumb-item ';
  // change 'current_item' to 'active'
  $patterns[1] = '/current_item/';
  $replacements[1] = 'active';
  return preg_replace( $patterns, $replacements, $li_class);
};
add_filter( "bcn_display_attributes", "sharkup_bootstrap_gsn_li_attributes", 10, 3);
function sharkup_get_domain_name($url){
    preg_match('@^(https?://)?([a-z0-9_-]+\.)*([a-z0-9_-]+)\.[a-z]{2,6}(/.*)?$@i',$url,$match);
    return $match[3];
}
/***********************************************************************************************/
/* Filter for CF7 select empty */
/***********************************************************************************************/
function sharkup_wpcf7_form_elements($html) {
    $text = 'Please select';
    $html = str_replace('<option value="">---</option>', '<option value="">' . $text . '</option>', $html);
    return $html;
}
add_filter('wpcf7_form_elements', 'sharkup_wpcf7_form_elements');
/***********************************************************************************************/
/* Excerpt Settings */
/***********************************************************************************************/
function sharkup_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'sharkup_excerpt_more');
function sharkup_excerpt_length( $length ) {
    return 48;
}
add_filter( 'excerpt_length', 'sharkup_excerpt_length', 999);
/***********************************************************************************************/
/* Remove auto p from Contact Form 7 shortcode output */
/***********************************************************************************************/
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
    return false;
}
/***********************************************************************************************/
/* Get The COntent By ID */
/***********************************************************************************************/
function sharkup_get_the_content_by_id($pid,$tags=false){
    $content_post = get_post($pid);
    $content = $content_post->post_content;
    if($tags==true){
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
    }
    echo $content;
}
/***********************************************************************************************/
// Replace IMG ALT with title if ALT is empty
/***********************************************************************************************/
function ao_filter_gallery_img_atts( $atts, $attachment ) {
    if(empty($atts['alt'])){
        $atts['alt'] = str_replace('-', ' ', get_the_title($attachment->ID));
    }
    return $atts;
}
add_filter( 'wp_get_attachment_image_attributes', 'ao_filter_gallery_img_atts', 10, 2);
}
/***********************************************************************************************/
/***********************************************************************************************/
if(is_admin()){
/***********************************************************************************************/
/* Adding style css on dashboard */
/***********************************************************************************************/
function sharkup_admin_enqueue_scripts(){
    wp_enqueue_style( 'admin-css', THEMEURI.'/admin-style.css', array(), 1);
}
add_action( 'admin_enqueue_scripts', 'sharkup_admin_enqueue_scripts');
/***********************************************************************************************/
/* fix no editor on posts page */
/***********************************************************************************************/
function sharkup_fix_no_editor_on_posts_page($post)
{
    if($post->ID != get_option('page_for_posts') || post_type_supports('page', 'editor'))
        return;
    
    remove_action('edit_form_after_title', '_wp_posts_page_notice');
    add_post_type_support('page', 'editor');
}
add_action('edit_form_after_title', 'sharkup_fix_no_editor_on_posts_page', 0);
/***********************************************************************************************/
/* Theme Option */
/***********************************************************************************************/
if(function_exists('acf_add_options_page')){
    acf_add_options_page(array(
        'page_title'    =>  __('Theme Options','sharkup'),
        'menu_title'    =>  __('Theme Options','sharkup'),
        'menu_slug'     =>  'theme-general-settings',
        'capability'    =>  'edit_posts',
        'position'      =>  55,
        'redirect'      =>  false
    ));
}
/***********************************************************************************************/
/* Actions for removing category,tags & comments */
/***********************************************************************************************/
// Remove Categories and Tags
add_action('init', 'sharkup_remove_tax');
function sharkup_remove_tax() {
    register_taxonomy('category', array());
    register_taxonomy('post_tag', array());
   /* register_post_type('post', array());*/
}
// Removes from admin menu
add_action( 'admin_menu', 'sharkup_remove_admin_menus');
function sharkup_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php');
}
// Removes from post and pages
add_action('init', 'sharkup_remove_comment_support', 100);
function sharkup_remove_comment_support() {
    remove_post_type_support( 'post', 'comments');
    remove_post_type_support( 'page', 'comments');
}
// Removes from admin bar
function sharkup_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'sharkup_admin_bar_render');
}



/***********************************************************************************************/
/* Register Custom Post Type */
/***********************************************************************************************/
function sharkup_custom_post_type() {
    $singular = 'Company Registration';
    $plural = 'Company Resistration';
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
            'slug'      => 'company-registration',
            'with_front'=> false,
            'pages'     => true,
            'feeds'     => false
        ),
        'supports'      => array(
            'title',
            'custom-fields', 
            'author',
        ),
    );
    register_post_type('company-registration',$args);


    $singular = 'Document';
    $plural = 'Documents';
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
        'menu_icon'             => 'dashicons-media-document',
        'can_export'            => true,
        'delete_with_user'      => false,
        'hierarchical'          => true,
        'has_archive'           => false,
        'query_var'             => true,
        'capability_type'       => 'post',
        'map_meta_cap'          => true,
        // 'capabilities'       => array(),
        'rewrite'               => array(
            'slug'      => 'documents',
            'with_front'=> false,
            'pages'     => true,
            'feeds'     => false
        ),
        'supports'      => array(
            'title',
            'author',
            'custom-fields', 
        ),
    );
    register_post_type('documents',$args);
    flush_rewrite_rules();
}
add_action( 'init', 'sharkup_custom_post_type');



/***********************************************************************************************/
/* Adding fields in user profile */
/***********************************************************************************************/
add_action( 'show_user_profile', 'sharkup_extra_user_profile_fields');
add_action( 'edit_user_profile', 'sharkup_extra_user_profile_fields');
function sharkup_extra_user_profile_fields( $user ) { 
    $step              = esc_attr(get_the_author_meta('step', $user->ID));
    $ecn_option_one              = esc_attr(get_the_author_meta('ecn_option_one', $user->ID));
    $ecn_option_two              = esc_attr(get_the_author_meta('ecn_option_two', $user->ID));
    $ecn_option_three            = esc_attr(get_the_author_meta('ecn_option_three', $user->ID));
    $ar_option_one              = esc_attr(get_the_author_meta('ar_option_one', $user->ID));
    $ar_option_two              = esc_attr(get_the_author_meta('ar_option_two', $user->ID));
    $ar_option_three            = esc_attr(get_the_author_meta('ar_option_three', $user->ID));
    $franchisee_data            = esc_attr(get_the_author_meta('franchisee_data', $user->ID));
    $ammount                    = esc_attr(get_the_author_meta('ammount', $user->ID));
    $licence_type               = esc_attr(get_the_author_meta('licence_type', $user->ID));
    $visa_packge                = esc_attr(get_the_author_meta('visa_packge', $user->ID));
    $activity_one               = esc_attr(get_the_author_meta('activity_one', $user->ID));
    $activity_two               = esc_attr(get_the_author_meta('activity_two', $user->ID));
    $activity_three             = esc_attr(get_the_author_meta('activity_three', $user->ID));
    $activity_four             = esc_attr(get_the_author_meta('activity_four', $user->ID));
    $activity_five             = esc_attr(get_the_author_meta('activity_five', $user->ID));
    $activity_six             = esc_attr(get_the_author_meta('activity_six', $user->ID));
    $business_desc              = esc_attr(get_the_author_meta('business_desc', $user->ID));
    $shareholding_type          = esc_attr(get_the_author_meta('shareholding_type', $user->ID));
    $proposed_share_capital     = esc_attr(get_the_author_meta('proposed_share_capital', $user->ID));
    $share_value                = esc_attr(get_the_author_meta('share_value', $user->ID));
    $total_number_of_shares     = esc_attr(get_the_author_meta('total_number_of_shares', $user->ID));
    $document                   = esc_attr(get_the_author_meta('document', $user->ID));
    ?>
    <table class="form-table">
        <tr><th><strong>English Company Name</strong></th> </tr>
        <tr>
            <th><label for="step"><?php _e("Completetd Step"); ?></label></th>
            <td>
                <input type="text" name="step" id="step" value="<?php echo $step; ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="ecn_option_one"><?php _e("Option 1"); ?></label></th>
            <td>
                <input type="text" name="ecn_option_one" id="ecn_option_one" value="<?php echo $ecn_option_one; ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="ecn_option_two"><?php _e("Option 2"); ?></label></th>
            <td>
                <input type="text" name="ecn_option_two" id="ecn_option_two" value="<?php echo $ecn_option_two; ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="ecn_option_three"><?php _e("Option 3"); ?></label></th>
            <td>
                <input type="text" name="ecn_option_three" id="ecn_option_three" value="<?php echo $ecn_option_three; ?>" class="regular-text" />
            </td>
        </tr>
        <tr><th><strong>Arabic Company Name</strong></th> </tr>
        <tr>
            <th><label for="ar_option_one"><?php _e("Option 1"); ?></label></th>
            <td>
                <input type="text" name="ar_option_one" id="ar_option_one" value="<?php echo $ar_option_one; ?>" class="regular-text" />
                
            </td>
        </tr>
        <tr>
            <th><label for="ar_option_two"><?php _e("Option 2"); ?></label></th>
            <td>
                <input type="text" name="ar_option_two" id="ar_option_two" value="<?php echo $ar_option_two; ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="ar_option_three"><?php _e("Option 3"); ?></label></th>
            <td>
                <input type="text" name="ar_option_three" id="ar_option_three" value="<?php echo $ar_option_three; ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="ar_option_three"><?php _e("Are you going to operate as a franchisee?"); ?></label></th>
            <td>
                <label for="yes"><?php _e("Yes"); ?></label>
                <input type="radio" id="franchisee_yes" name="franchisee_data" value="yes" <?php if($franchisee_data =='yes'): echo 'checked'; endif; ?>>
                <label for="no"><?php _e("No"); ?></label>
                <input type="radio" id="franchisee_no" name="franchisee_data" value="no" <?php if($franchisee_data =='no'): echo 'checked'; endif; ?>>
            </td>
        </tr>
        
        <tr>
            <th><label for="ammount"><?php _e("IF YES' PLEASE INPUT TRADE NAME"); ?></label></th>
            <td>
                <input type="text" name="ammount" id="ammount" value="<?php echo $ammount; ?>" class="regular-text" />
            </td>
        </tr>
        <tr><th><strong>Select Your Business Activities <small>Note: Business Activities should be from one licence type only Certain activities are subject to third party approvals.</small></strong></th> </tr>
        <tr>
            <th><label for="licence_type"><?php _e("Licence Type"); ?></label></th>
            <td>
                <input type="text" name="licence_type" id="licence_type" value="<?php echo $licence_type; ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="visa_packge"><?php _e("Visa Package"); ?></label></th>
            <td>
                <input type="text" name="visa_packge" id="visa_packge" value="<?php echo $visa_packge; ?>" class="regular-text" />
            </td>
        </tr>
        <tr><th>Please select up to 3 business activities.</th></tr>
        <tr>
            <th><label for="activity_one"><?php _e("Activity One"); ?></label></th>
            <td><input type="text" name="activity_one" id="activity_one" value="<?php echo $activity_one; ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="activity_two"><?php _e("Activity Two"); ?></label></th>
            <td><input type="text" name="activity_two" id="activity_two" value="<?php echo $activity_two; ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="activity_three"><?php _e("Activity Three"); ?></label></th>
            <td><input type="text" name="activity_three" id="activity_three" value="<?php echo $activity_three; ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="activity_four"><?php _e("Activity Four"); ?></label></th>
            <td><input type="text" name="activity_four" id="activity_four" value="<?php echo $activity_four; ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="activity_five"><?php _e("Activity Five"); ?></label></th>
            <td><input type="text" name="activity_five" id="activity_five" value="<?php echo $activity_five; ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="activity_six"><?php _e("Activity Six"); ?></label></th>
            <td><input type="text" name="activity_six" id="activity_six" value="<?php echo $activity_six; ?>" class="regular-text" /></td>
        </tr>
       <!--  <tr>
            <th><label for="business_desc"><?php _e("Bussiness Description"); ?></label></th>
            <td><textarea cols=20 rows=5 name='business_desc'><?php echo $business_desc; ?></textarea> </td>
        </tr> -->
       <!--  <tr>
            <th><label for="shareholding_type"><?php _e("Shareholding Type"); ?></label></th>
            <td><input type="text" name="shareholding_type" id="shareholding_type" value="<?php echo $shareholding_type; ?>" class="regular-text" /></td>
        </tr> -->
        <tr>
            <th><label for="proposed_share_capital"><?php _e("Proposed Share Capital in AED"); ?></label></th>
            <td><input type="text" name="proposed_share_capital" id="proposed_share_capital" value="<?php echo $proposed_share_capital; ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="total_number_of_shares"><?php _e("Total Number of Shares"); ?></label></th>
            <td>
                <input type="text" name="total_number_of_shares" id="total_number_of_shares" value="<?php echo $total_number_of_shares; ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="share_value"><?php _e("Share Value"); ?></label></th>
            <td><input type="text" name="share_value" id="share_value" value="<?php echo $share_value; ?>" class="regular-text" /></td>
        </tr>
        
       <!--  <tr><th>Upload Documtns.</th></tr>
        <tr>
            <th><label for="document"><?php _e("Documents"); ?></label></th>
            <td><input type="file" name="document"></td>
        </tr> -->
       
    </table>
<?php 
}


add_action( 'user_register', 'sharkup_crf_user_register');
function sharkup_crf_user_register($user_id ) {
    update_user_meta($user_id, 'step', $_POST['step']);
    update_user_meta($user_id, 'ecn_option_one', $_POST['ecn_option_one']);
    update_user_meta($user_id, 'ecn_option_two', $_POST['ecn_option_two']);
    update_user_meta($user_id, 'ecn_option_three', $_POST['ecn_option_three']);
    update_user_meta($user_id, 'ar_option_one', $_POST['ar_option_one']);
    update_user_meta($user_id, 'ar_option_two', $_POST['ar_option_two']);
    update_user_meta($user_id, 'ar_option_three', $_POST['ar_option_three']);
    update_user_meta($user_id, 'franchisee_data', $_POST['franchisee_data']);
    update_user_meta($user_id, 'ammount', $_POST['ammount']);
    update_user_meta($user_id, 'licence_type', $_POST['licence_type']);
    update_user_meta($user_id, 'visa_packge', $_POST['visa_packge']);
    update_user_meta($user_id, 'activity_one', $_POST['activity_one']);
    update_user_meta($user_id, 'activity_two', $_POST['activity_two']);
    update_user_meta($user_id, 'activity_three', $_POST['activity_three']);
    update_user_meta($user_id, 'activity_four', $_POST['activity_four']);
    update_user_meta($user_id, 'activity_five', $_POST['activity_five']);
    update_user_meta($user_id, 'activity_six', $_POST['activity_six']);
    update_user_meta($user_id, 'business_desc', $_POST['business_desc']); 
    update_user_meta($user_id, 'shareholding_type', $_POST['shareholding_type']);
    update_user_meta($user_id, 'proposed_share_capital', $_POST['proposed_share_capital']);
    update_user_meta($user_id, 'share_value', $_POST['share_value']);
    update_user_meta($user_id, 'total_number_of_shares', $_POST['total_number_of_shares']);
    update_user_meta($user_id, 'document', $_POST['document']);
}

add_action( 'personal_options_update', 'sharkup_save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'sharkup_save_extra_user_profile_fields' );

function sharkup_save_extra_user_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;
    if( $_FILES['document']['error'] === UPLOAD_ERR_OK ) {
        $_POST['action'] = 'wp_handle_upload';
        $upload_overrides = array( 'test_form' => false );
        $upload = wp_handle_upload( $_FILES['document'], $upload_overrides );
        update_user_meta( $user_id, 'document', $upload );
    }
}


function ao_login_redirect( $redirect_to, $request, $user ) {
    if (isset($user->roles) && is_array($user->roles)) {
        if (in_array('subscriber', $user->roles)) {
            $redirect_to = home_url('/dashboard/');
        }else{
            $redirect_to = get_admin_url();
        }
    }
    return $redirect_to;
}
add_filter( 'login_redirect', 'ao_login_redirect', 1, 3 );

/*add_action('after_setup_theme', 'ao_remove_admin_bar');
function ao_remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
      show_admin_bar(false);
    }
    if(!is_user_logged_in() && is_page('documents')){
        $redirect_to = home_url('/documents/');
        wp_redirect($redirect_to);
        exit();
    }
}

add_action( 'template_redirect', function() {

  if ( is_user_logged_in() || ! is_page() ) return;

  $restricted = array( 389 ); // all your restricted pages

  if ( in_array( get_queried_object_id(), $restricted ) ) {
    wp_redirect( site_url( '/login/' ) ); 
    exit();
  }

});*/



function ao_user_registration_login_redirect($redirect, $user) {

    $redirect = home_url('dashboard');
    return $redirect;

}
add_filter('user_registration_login_redirect','ao_user_registration_login_redirect', 1, 2);

















/***********************************************************************************************/
/* Ajax Load More */
/***********************************************************************************************/
add_action('wp_ajax_nopriv_company_info','company_info');
add_action('wp_ajax_company_info','company_info');
function company_info(){

    $fieldset = $_POST["fieldset"];
    $data = $_POST["data"];

    $output = array();

    if($fieldset == 'add_member'){

        $id = wp_insert_post(array('post_title' =>$data['post_title'],'post_type'=>'member', 'post_status' => 'pending','comment_status' => 'closed','ping_status' => 'closed',  ));
        foreach($data as $key => $value) {
             // print_r($value);
            add_post_meta($id, $key, $value, true);
        }

        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        require_once( ABSPATH . 'wp-admin/includes/media.php' );

        if ($_FILES) {
            foreach ($_FILES as $file => $array) {
                if ($_FILES[$file]['error'] !== UPLOAD_ERR_OK) {
                    echo "upload error : " . $_FILES[$file]['error'];
                    die();
                }
                $attach_id = media_handle_upload( $file, $id );
            }
        }

        update_post_meta($id, 'passport_copy_clear_color_copy', $attach_id);

        // $attach_id = media_handle_upload('passport_copy_clear_color_copy', $id);
        // $attach_id = media_handle_upload('uae_visa_copy_or_uid_number', $id);
        // $attach_id = media_handle_upload('emirates_id_copy', $id);
        // if (is_numeric($attach_id)) {
            // update_post_meta($id, 'passport_copy_clear_color_copy', $attach_id);
            // update_post_meta($id, 'uae_visa_copy_or_uid_number', $attach_id);
            // update_post_meta($id, 'emirates_id_copy', $attach_id);
        // }
        // $attachment_id = media_handle_upload('passport_standard_size_photo', $post_id);
        // if (!is_wp_error($attachment_id)) { 
            // set_post_thumbnail($id, $attachment_id);
        // }

    }else{

        $user_id = get_current_user_ID();
        foreach($data as $key => $value) {
            update_user_meta( $user_id, $key, $value );
        }

    }
    $output['status'] = 'success';
    echo json_encode($output);
    die();
    
}


add_filter('acf/settings/remove_wp_meta_box', '__return_false');

/* Disable WordPress Admin Bar for all users */
add_filter( 'show_admin_bar', '__return_false' );