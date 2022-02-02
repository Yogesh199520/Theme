<?php 
add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );
add_filter('use_block_editor_for_post', '__return_false'); 
function add_scripts_and_styles() {
	
	//Styles	
	
	
	wp_enqueue_style( 'googleapis-Roboto', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap', false );
    
    wp_enqueue_style( 'googleapis-Open+Sans', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,800;1,300;1,400;1,600;1,800&display=swap', false );

	wp_enqueue_style( 'googleapis-Comfortaa', 'https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap', false );
    
    wp_enqueue_style('fancybox', get_stylesheet_directory_uri().'/css/jquery.fancybox.min.css');
    
    wp_enqueue_style('flexslider', get_stylesheet_directory_uri().'/css/flexslider.css');
    
	wp_enqueue_style('theme-child-style', get_stylesheet_directory_uri().'/style.css');
    
    

	//Scripts
	
	 wp_enqueue_script( 'jquery_min','https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js' );
		
	
	wp_enqueue_script( 'fancybox', get_stylesheet_directory_uri(). '/js/jquery.fancybox.min.js', array('jquery'), null, true );	
	
	wp_enqueue_script( 'flexslider', get_stylesheet_directory_uri(). '/js/jquery.flexslider.js', array('jquery'), null, true );
    
    wp_enqueue_script( 'custom', get_stylesheet_directory_uri(). '/js/custom.js', array('jquery'), null, true );


}
	
add_action('wp_enqueue_scripts', 'add_scripts_and_styles');



if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Options',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-general-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Options',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-options',
	));
	
	
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Options',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-options',
	));
	
	
	
}


add_action( 'after_setup_theme', 'register_custom_nav_menus' );
function register_custom_nav_menus() {
	register_nav_menus( array(
        'primary' => 'Primary Menu',
        'footer' => 'Footer Menu',
		
	) );
}



function load_custom_script_to_footer(){
?>
  <script type="text/javascript">
    jQuery(window).load(function(){
      jQuery('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          jQuery('body').removeClass('loading');
        }
      });
    });
	  
  </script>
  
  <script>
jQuery(function() {
    jQuery("a").on("click", function() {
		
      var $parent = jQuery(this).parent();
        if ($parent.hasClass('active')) {
            $parent.removeClass('active');
        }
        else{$parent.addClass('active');}
      
    });
});
</script>

<?php 
}
add_action( 'wp_footer', 'load_custom_script_to_footer' );

function my_custom_sidebar() {
    register_sidebar(
        array (
            'name' => __( 'Footer Widget1', 'ricciorthodontics' ),
            'id' => 'footer1',
            'description' => __( 'Footer Widget1', 'ricciorthodontics' ),
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
        )
    );
     register_sidebar(
        array (
            'name' => __( 'Footer Widget2', 'ricciorthodontics' ),
            'id' => 'footer2',
            'description' => __( 'Footer Widget2', 'ricciorthodontics' ),
            'before_widget' => '<h3>',
            'after_widget' => '</h3>',
            'before_title' => '',
            'after_title' => '',
        )
    );
     register_sidebar(
        array (
            'name' => __( 'Footer Widget3', 'ricciorthodontics' ),
            'id' => 'footer3',
            'description' => __( 'Footer Widget3', 'ricciorthodontics' ),
            'before_widget' => '<h3>',
            'after_widget' => '</h3>',
            'before_title' => '',
            'after_title' => '',
        )
    );
     register_sidebar(
        array (
            'name' => __( 'Footer Widget4', 'ricciorthodontics' ),
            'id' => 'footer4',
            'description' => __( 'Footer Widget4', 'ricciorthodontics' ),
            'before_widget' => '<h3>',
            'after_widget' => '</h3>',
            'before_title' => '',
            'after_title' => '',
        )
    );
    
    register_sidebar(
        array (
            'name' => __( 'Page Sidebar', 'ricciorthodontics' ),
            'id' => 'page-sidebar',
            'description' => __( 'Page Sidebar', 'ricciorthodontics' ),
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
        )
    );
}
add_action( 'widgets_init', 'my_custom_sidebar' );

function get_breadcrumb() {
    global $post;
    echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
    echo ' / ';
        if (is_category() || is_single()) {
            the_category(' / ');
            if (is_single()) {
                
                the_title();
			
            }
        } elseif( is_page() ){
    $items = [];
    $items[] = '<strong> '.get_the_title().'</strong>';
    $page = &$post;
    while( $page->post_parent ){
        $items[] = '<a href="'.get_permalink($page->post_parent).'" title="'.get_the_title($page->post_parent).'">'.get_the_title($page->post_parent).'</a>';
        $page = get_post($page->post_parent);
    } wp_reset_query();
    $items = array_reverse($items);
    echo implode(' / ', $items);
}
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"Archive for "; the_time('F jS, Y');}
    elseif (is_month()) {echo"Archive for "; the_time('F, Y');}
    elseif (is_year()) {echo"Archive for "; the_time('Y');}
    elseif (is_author()) {echo"Author Archive";}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "Blog Archives";}
    elseif (is_search()) {echo"Search Results";}
}