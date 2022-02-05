<?php
/*==============================*/
// @package WaterFront Law
// @author Think EQ
/*==============================*/
if(!defined('ABSPATH')){
  exit; // Exit if accessed directly
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php endif; ?>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
wp_body_open();
$logo = get_field('logo','option');
$telephone = $GLOBALS['theme_options']['telephone'];
$telephone_strip = str_replace(' ','',$telephone);
$email = $GLOBALS['theme_options']['email'];
?>
<!--============================== Header Start ==============================-->
<header id="header">
    <nav class="navbar navbar-expand-xl">
        <div class="container position-relative">
            <?php echo '<a class="navbar-brand" href="'.home_url('/').'"><img src="'.$logo.'" alt="'.get_bloginfo('name').' Logo" /></a>'; ?>
            <div class="collapse navbar-collapse">
                <?php
                    wp_nav_menu( array(
                        'theme_location'    => 'header',
                        'depth'             => 3,
                        'container'         => false,
                        'menu_class'        => 'navbar-nav mx-auto',
                        'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'            => new WP_Bootstrap_Navwalker(),
                    ) );
                ?>
            </div>
            <div class="header-right">
                <?php if(!empty($telephone)): echo '<a href="tel:'.$telephone_strip.'" class="header-phone"><i class="fas fa-mobile-alt"></i></a>'; endif; ?>
                <a href="#" class="header-search"><i class="fas fa-search"></i></a>
            </div>
            <button id="trigger" class="navbar-toggler collapsed" type="button" aria-expanded="false" aria-label="Toggle navigation" role="button" tabindex="0">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
</header>
<div class="mp-pusher d-xl-none" id="mp-pusher">
    <nav id="mp-menu" class="mp-menu">
        <div class="mp-level">
            <img width="1366" height="554" src="https://devsmp.com/wfl/wp-content/uploads/2021/12/menu-bg.jpg" class="attachment-full size-full" alt="menu bg" loading="lazy" srcset="https://devsmp.com/wfl/wp-content/uploads/2021/12/menu-bg.jpg 1366w, https://devsmp.com/wfl/wp-content/uploads/2021/12/menu-bg-300x122.jpg 300w, https://devsmp.com/wfl/wp-content/uploads/2021/12/menu-bg-1024x415.jpg 1024w, https://devsmp.com/wfl/wp-content/uploads/2021/12/menu-bg-768x311.jpg 768w" sizes="(max-width: 1366px) 100vw, 1366px" />
            <?php 
            wp_nav_menu(
                array(
                    'theme_location'=>'header',
                    'container'=>'ul',
                    'menu_class'=>'mobile-menu',
                    'menu_id'=>'menu-mobile-menu',
                    'items_wrap'=>'<ul role="menu" id="menu-mobile-menu" class="mobile-menu">%3$s</ul>',
                    'walker'=>new wfl_Walker_Nav_Mobile_Menu()
                )
            ); 
            ?>
            <div class="menu-contact-box">
                <?php echo get_search_form(false); ?>
                <a href="<?php echo $contact_url; ?>" class="btn btn-default btn-block">Contact us</a>
            </div>
        </div>
    </nav>
</div>
<!--============================== Header End ==============================-->

<script>
    $('.navbar-expand-xl .navbar-nav > li.dropdown > ul > li.dropdown').hover(function(){
        $('.navbar-expand-xl .navbar-nav > li.dropdown > ul > li.dropdown').removeClass('active');
        $(this).addClass('active');
    });
    $('#trigger').on('click', function(){
        $(this).toggleClass('collapsed');
    });
</script>