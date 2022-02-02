<?php
/*==============================*/
// @package Sharkup
// @author Medical Darpan
/*==============================*/
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta name="google-site-verification" content="Mp4znqlwTiF8CB--RAvIqHLWB0P2YqETHzXK4cGc0gw" />
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-210908066-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-210908066-1');
</script>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
wp_body_open();
$logo = wp_get_attachment_image(get_field('logo','option'),'medium','',array('alt'=>get_bloginfo('name')));
$whatsapp_link = get_field('whatsapp_link','option');
$get_started_link = get_field('get_started_link','option');
$login_link = get_field('login_link','option');
?>
<!--============================== Header Start ==============================-->
<header id="header">
    <nav class="navbar navbar-expand-xl" aria-label="Main navigation">
        <div class="container container1">
            <?php if(is_page(389)){ ?>
            <button class="navbar-toggler collapsed d-block d-md-none" type="button" id="toggleMenu" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        <?php } ?>
            <a class="navbar-brand" href="<?php echo home_url('/'); ?>"><?php echo $logo; ?></a>
            <button class="navbar-toggler collapsed" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse offcanvas-collapse justify-content-center" id="navbarsExampleDefault">
                <div class="navbar-head d-block d-xl-none">Menu</div>
                <?php
                    wp_nav_menu(array(
                        'theme_location'    => 'header',
                        'depth'             => 1,
                        'container'         => false,
                        'menu_class'        => 'navbar-nav',
                        'menu_id'           => '',
                        'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'            => new WP_Bootstrap_Navwalker(),
                    ));
                ?>
            </div>
            <div class="header-right">
                <?php 
                if(!empty($whatsapp_link)): echo '<a href="'.$whatsapp_link.'" target="_blank" class="btn btn-default"><i class="fab fa-whatsapp"></i></a>'; endif;
                if(is_user_logged_in()):
                    global $current_user;
                    echo '<a href="'.home_url('/dashboard/').'" class="btn btn-default d-none d-xl-block">Hello, '.$current_user->display_name.'</a>';
                else:
                    if(!empty($get_started_link)): echo '<a href="'.$get_started_link.'" target="_blank" class="btn btn-default d-none d-xl-block">Get Started</a>'; endif;
                endif;
                ?>
                <?php
                if(is_user_logged_in()):
                    echo '<a href="'.wp_logout_url(home_url('/')).'" class="btn btn-default d-none d-xl-block">Logout</a>';
                else:
                    if(!empty($login_link)): echo '<a href="'.$login_link.'" class="btn btn-default">Login</a>'; endif;
                endif;
                ?>
            </div>
        </div>
    </nav>
</header>
<div class="overlay"></div>
<!-- <div class="close-side-menu"><i class="fas fa-times"></i></div> -->
<!--============================== Header End ==============================-->