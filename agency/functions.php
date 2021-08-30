<?php
/*==============================*/
// @package agency
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
if(!function_exists('agency_theme_setup')) :
    function agency_theme_setup() {
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        // Add theme support title tag.
        add_theme_support('title-tag');
        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');
        // Add theme support responsive embeds.
        add_theme_support('responsive-embeds');
        // Add theme support post thumbnails.
        add_theme_support('post-thumbnails');
        // Add theme support title tag.
        load_theme_textdomain('agency');
        set_post_thumbnail_size(370, 248);
        add_image_size('post-thumb', 420);
        add_image_size('about-thumb', 370, 383);
        add_image_size('about-thumb-alt', 570, 317);
        add_image_size('social-logo', 120, 120);
        add_image_size('case-study-single', 870, 580);
        // Add theme support editor styles.
        add_theme_support('editor-styles');
        // Add theme support wp-block styles.
        add_theme_support( 'wp-block-styles' );
        // Add theme support align wide.
        add_theme_support("align-wide");
        // Add theme support woocommerce.
        add_theme_support('woocommerce');
        // Add theme support custom logo.
        add_theme_support('custom-logo', array(
            'height' => 19,
            'width'  => 110,
        ));
        
       
        // Add theme support html5.
        $args = array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        );
        add_theme_support('html5',array($args));
        // Resistor agency nav menu
        register_nav_menus(
            array(
              'header_menu' => __( 'Header Menu', 'agency' ),
              'sitemap' => __( 'Sitemap', 'agency' ),
              'services' => __( 'Services', 'agency' ),
            )
        );
        if(!file_exists(get_template_directory().'/class-wp-bootstrap-navwalker.php')){
            // File does not exist... return an error.
            return new WP_Error('class-wp-bootstrap-navwalker-missing', __('It appears the class-wp-bootstrap-navwalker.php file may be missing.','agency'));
        }else{
            // File exists... require it.
            require_once get_template_directory().'/class-wp-bootstrap-navwalker.php';
        }
    }
endif;
add_action( 'after_setup_theme', 'agency_theme_setup');


/***********************************************************************************************/
/* Content Width */
/***********************************************************************************************/
function agency_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'agency_content_width', 900 );
}
add_action('after_setup_theme', 'agency_content_width', 0 );


/* Proper way to enqueue scripts and styles */
/***********************************************************************************************/
function agency_css_scripts() {
    wp_dequeue_style( 'wp-block-library' );
    wp_register_style('googleapis', 'https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,700i,800' );
    wp_enqueue_style('googleapis');
   
    wp_enqueue_style('bootstrap', THEMEURI.'/include/css/bootstrap.css',array(),'4.0.0', 'all');
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array('bootstrap'));
    wp_enqueue_style('fontawesome', THEMEURI.'/include/css/fontawesome-all.css',array(),'5.0.8', 'all');
    wp_enqueue_style('jquery-smartmenus-bootstrap-4', THEMEURI.'/include/css/jquery.smartmenus.bootstrap-4.css',array(),'4.0.0', 'all');
    wp_enqueue_style('owl.carousel', THEMEURI.'/include/css/owl.carousel.css',array(),'4.0.0', 'all');
    wp_enqueue_style('bootstrap', THEMEURI.'/include/css/bootstrap.css',array(),'2.2.1', 'all');
    wp_enqueue_style('animate', THEMEURI.'/include/css/animate.css',array(),'3.6.0', 'all');
   
    wp_enqueue_script('jquery', THEMEURI.'/include/js/jquery.min',array('jquery'),'3.5.1',false);
    wp_enqueue_script('bootstrap', THEMEURI.'/include/js/bootstrap.min.js',array('jquery-core'),'4.0.0',true);
    wp_enqueue_script('smartmenus', THEMEURI.'/include/js/jquery.smartmenus.js',array('bootstrap'),'1.1.0',true);
    wp_enqueue_script('smartmenus-bootstrap', THEMEURI.'/include/js/jquery.smartmenus.bootstrap-4.js',array('bootstrap'),'0.1.0',true);
    wp_enqueue_script('owl-carousel', THEMEURI.'/include/js/owl.carousel.min.js',array('bootstrap'),'2.2.1',true);
    wp_enqueue_script('waypoint', THEMEURI.'/include/js/waypoint.js',array('bootstrap'),'1.1.0',true);
    wp_enqueue_script('countTo', THEMEURI.'/include/js/jquery.countTo.js',array('bootstrap'),'2.0.2',true);
    wp_enqueue_script('theia-sticky-sidebar', THEMEURI.'/include/js/theia-sticky-sidebar.js',array('bootstrap'),'1.4.0',true);
    wp_enqueue_script('jquery-validate', THEMEURI.'/include/js/jquery.validate.js',array('bootstrap'),'1.15.0',true);
    wp_enqueue_script('theme-script', THEMEURI.'/include/js/custom.js',array('bootstrap'),null,true);

    wp_localize_script('theme-script','ajax_object',array('ajax_url'=>admin_url('admin-ajax.php')));
    wp_add_inline_script( 'jquery-core', 'var $ = jQuery.noConflict();' );
    if(is_singular() && comments_open() && get_option('thread_comments')){
        wp_enqueue_script('comment-reply');
    }
}
add_action( 'wp_enqueue_scripts', 'agency_css_scripts' );


/***********************************************************************************************/
/* Page Slug Body Class */
/***********************************************************************************************/
function agency_add_slug_body_class($classes) {
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
add_filter( 'body_class', 'agency_add_slug_body_class' );
/***********************************************************************************************/
/* filter for adding class in nav menu */
/***********************************************************************************************/
add_filter('nav_menu_css_class' , 'agency_active_nav_class' , 10 , 2);
function agency_active_nav_class ($classes, $item) {
    if (in_array('current-post-ancestor', $classes) || in_array('current-page-ancestor', $classes) || in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}



/***********************************************************************************************/
/* Theme Option */
/***********************************************************************************************/
if(function_exists('acf_add_options_page')){
    acf_add_options_page(array(
        'page_title'    =>  __('Theme Options','agency'),
        'menu_title'    =>  __('Theme Options','agency'),
        'menu_slug'     =>  'theme-general-settings',
        'capability'    =>  'edit_posts',
        'position'      =>  59,
        'redirect'      =>  false
    ));
    acf_add_options_sub_page(array(
        'page_title'    => 'Stats',
        'menu_title'    => 'Stats',
        'parent_slug'   => 'theme-general-settings',
    ));
}


/***********************************************************************************************/
/* Remove br tag from contact form 7 */
/***********************************************************************************************/
add_filter('wpcf7_autop_or_not', '__return_false');


/***********************************************************************************************/
/*Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin*/
/***********************************************************************************************/
function ao_wp_pagination( $custom_query ) {
    $total_pages = $custom_query->max_num_pages;
    $big = 999999999;
    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));
        echo paginate_links(array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => $current_page,
            'total' => $total_pages,
            'prev_next'    => true,
            'prev_text'    => __('<i class="fa fa-angle-left"></i>','agency'),
            'next_text'    => __('<i class="fa fa-angle-right"></i>','agency'),
            'type' => 'list'
        ));
    }
}

/***********************************************************************************************/
/* block style*/
/***********************************************************************************************/
/*if(function_exists('agency_register_block_style')) {
    agency_register_block_style(
        'core/quote',
        array(
            'name'         => 'blue-quote',
            'label'        => __('Blue Quote', 'agency'),
            'is_default'   => true,
            'inline_style' => '.wp-block-quote.is-style-blue-quote {color: blue;}',
        )
    );
}*/


/***********************************************************************************************/
/* Pattern */
/***********************************************************************************************/
/*function agency_register_my_patterns() {
  register_block_pattern(
    'agency/my-awesome-pattern',
    array(
        'title'       => __('Two buttons', 'agency'),
        'description' => _x('Two horizontal buttons, the left button is filled in, and the right button is outlined.', 'Block pattern description', 'agency' ),
        'content'     => "<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"backgroundColor\":\"very-dark-gray\",\"borderRadius\":0} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-background has-very-dark-gray-background-color no-border-radius\">" . esc_html__( 'Button One', 'agency' ) . "</a></div>\n<!-- /wp:button -->\n\n<!-- wp:button {\"textColor\":\"very-dark-gray\",\"borderRadius\":0,\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-text-color has-very-dark-gray-color no-border-radius\">" . esc_html__( 'Button Two', 'agency' ) . "</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons -->",
    ));
}
add_action( 'init', 'agency_register_my_patterns' );*/

/***********************************************************************************************/
/* editor style*/
/***********************************************************************************************/
function agency_theme_add_editor_styles() {
    add_editor_style('editor-style.css');
}
add_action( 'admin_init', 'agency_theme_add_editor_styles' );

/***********************************************************************************************/
/* widgets*/
/***********************************************************************************************/
add_action('widgets_init', 'agency_widgets_init');
function agency_widgets_init() {
    register_sidebar(array(
        'name'          => __('Latest Posts', 'agency'),
        'id'            => 'sidebar-1',
        'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5>',
        'after_title'   => '</h5>',
    ));
    register_sidebar(array(
        'name'          => __('Tags', 'agency'),
        'id'            => 'sidebar-2',
        'before_widget' => '<div id="%1$s" class="widget-box %2$s"><div class="tag-box">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h5>',
        'after_title'   => '</h5>',
    ));
}

/***********************************************************************************************/
/* Remove duplicate post */
/***********************************************************************************************/
function delete_post_type(){
    unregister_post_type('case_studies');
}
add_action('init','delete_post_type');

/***********************************************************************************************/
/* Black  Logo */
/***********************************************************************************************/
function agency_customizer_setting($wp_customize) {
    $wp_customize->add_setting('black_logo','sanitize_callback');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'black_logo', array(
        'label' => 'Black Logo',
        'section' => 'title_tagline',
        'settings' => 'black_logo',
        'priority' => 8,

    )));
}
add_action('customize_register', 'agency_customizer_setting');

add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );

function extra_user_profile_fields( $user ) { ?>
    <h3><?php _e("Extra profile information", "blank"); ?></h3>

    <table class="form-table">
    <tr>
        <th><label for="address"><?php _e("Address"); ?></label></th>
        <td>
            <input type="text" name="address" id="address" value="<?php echo esc_attr( get_the_author_meta( 'address', $user->ID ) ); ?>" class="regular-text" /><br />
            <span class="description"><?php _e("Please enter your address."); ?></span>
        </td>
    </tr>
    <tr>
        <th><label for="city"><?php _e("City"); ?></label></th>
        <td>
            <input type="text" name="city" id="city" value="<?php echo esc_attr( get_the_author_meta( 'city', $user->ID ) ); ?>" class="regular-text" /><br />
            <span class="description"><?php _e("Please enter your city."); ?></span>
        </td>
    </tr>
    <tr>
        <th><label for="postalcode"><?php _e("Postal Code"); ?></label></th>
        <td>
            <input type="text" name="postalcode" id="postalcode" value="<?php echo esc_attr( get_the_author_meta( 'postalcode', $user->ID ) ); ?>" class="regular-text" /><br />
            <span class="description"><?php _e("Please enter your postal code."); ?></span>
        </td>
    </tr>
    <tr>
        <th><label for="postalcode"><?php _e("Test One"); ?></label></th>
        <td>
            <input type="text" name="test1" id="postalcode" value="<?php echo esc_attr( get_the_author_meta( 'test1', $user->ID ) ); ?>" class="regular-text" /><br />
            <span class="description"><?php _e("Please enter your postal code."); ?></span>
        </td>
    </tr>
    <tr>
        <th><label for="postalcode"><?php _e("Test One"); ?></label></th>
        <td>
            <input type="text" name="test2" id="test2" value="<?php echo esc_attr( get_the_author_meta( 'test2', $user->ID ) ); ?>" class="regular-text" /><br />
            <span class="description"><?php _e("Please enter your postal code."); ?></span>
        </td>
    </tr>
    <tr>
        <th><label for="postalcode"><?php _e("Test Three"); ?></label></th>
        <td>
            <input type="text" name="test3" id="postalcode" value="<?php echo esc_attr( get_the_author_meta( 'test3', $user->ID ) ); ?>" class="regular-text" /><br />
            <span class="description"><?php _e("Please enter your postal code."); ?></span>
        </td>
    </tr>
    <tr>
        <th><label for="postalcode"><?php _e("Test Four"); ?></label></th>
        <td>
            <input type="text" name="test4" id="postalcode" value="<?php echo esc_attr( get_the_author_meta( 'test4', $user->ID ) ); ?>" class="regular-text" /><br />
            <span class="description"><?php _e("Please enter your postal code."); ?></span>
        </td>
    </tr>
    <tr>
        <th><label for="postalcode"><?php _e("Test Five"); ?></label></th>
        <td>
            <input type="text" name="test5" id="postalcode" value="<?php echo esc_attr( get_the_author_meta( 'test5', $user->ID ) ); ?>" class="regular-text" /><br />
            <span class="description"><?php _e("Please enter your postal code."); ?></span>
        </td>
    </tr>
    <tr>
        <th><label for="postalcode"><?php _e("Test six"); ?></label></th>
        <td>
            <input type="text" name="test6" id="postalcode" value="<?php echo esc_attr( get_the_author_meta( 'test6', $user->ID ) ); ?>" class="regular-text" /><br />
            <span class="description"><?php _e("Please enter your postal code."); ?></span>
        </td>
    </tr>
    <tr>
        <th><label for="postalcode"><?php _e("Test seven"); ?></label></th>
        <td>
            <input type="text" name="test7" id="postalcode" value="<?php echo esc_attr( get_the_author_meta( 'test7', $user->ID ) ); ?>" class="regular-text" /><br />
            <span class="description"><?php _e("Please enter your postal code."); ?></span>
        </td>
    </tr>
    <tr>
        <th><label for="postalcode"><?php _e("Test eight"); ?></label></th>
        <td>
            <input type="text" name="test8" id="postalcode" value="<?php echo esc_attr( get_the_author_meta( 'test8', $user->ID ) ); ?>" class="regular-text" /><br />
            <span class="description"><?php _e("Please enter your postal code."); ?></span>
        </td>
    </tr>
    <tr>
        <th><label for="postalcode"><?php _e("Test nine"); ?></label></th>
        <td>
            <input type="text" name="test9" id="postalcode" value="<?php echo esc_attr( get_the_author_meta( 'test9', $user->ID ) ); ?>" class="regular-text" /><br />
            <span class="description"><?php _e("Please enter your postal code."); ?></span>
        </td>
    </tr>
    </table>
<?php }

add_action( 'user_register', 'crf_user_register' );
function crf_user_register( $user_id ) {
    update_user_meta( $user_id, 'address', $_POST['address'] );
    update_user_meta( $user_id, 'city', $_POST['city'] );
    update_user_meta( $user_id, 'postalcode', $_POST['postalcode'] );
    update_user_meta( $user_id, 'address', $_POST['address'] );
    update_user_meta( $user_id, 'test1', $_POST['test1'] );
    update_user_meta( $user_id, 'test2', $_POST['test2'] );
    update_user_meta( $user_id, 'test3', $_POST['test3'] );
    update_user_meta( $user_id, 'test4', $_POST['test4'] );
    update_user_meta( $user_id, 'test5', $_POST['test5'] );
    update_user_meta( $user_id, 'test6', $_POST['test6'] );
    update_user_meta( $user_id, 'test7', $_POST['test7'] );
    update_user_meta( $user_id, 'test8', $_POST['test8'] );
    update_user_meta( $user_id, 'test9', $_POST['test9'] );
}



$words    = explode( ' ', the_title( '', '',  false ) );
$words[0] = '<span>' . $words[0];
$words[2] = $words[2] . '</span>';
$title    = implode( ' ', $words );
echo $title;