<?php
/*==============================*/
// @package Booth Golf and Leisure
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
$contact_url = $GLOBALS['theme_options']['contact_url'];
?>
<!--============================== Header Start ==============================-->
<header>
    <nav class="navbar navbar-expand-xl">
        <div class="container">
            <?php echo '<a class="navbar-brand" href="'.home_url('/').'"><img src="'.$logo.'" alt="'.get_bloginfo('name').'" /></a>'; ?>
            <div class="header-right d-xl-none d-block">
                <a href="<?php echo $contact_url; ?>" class="hero-btn">Contact</a>
            </div>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                data-target="#navbarsExample06" aria-controls="navbarsExample06" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExample06">
                <div class="navbar-inside d-flex ml-auto">
					<?php
						wp_nav_menu( array(
							'theme_location'    => 'header',
							'depth'             => 2,
							'container'         => false,
							'menu_class'        => 'navbar-nav',
							'menu_id'           => 'main-nav',
							'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
							'walker'            => new WP_Bootstrap_Navwalker(),
						) );
					?>
                    <a href="<?php echo $contact_url; ?>" class="hero-btn d-xl-none d-block">Contact</a>
                </div>
                <div class="header-right d-xl-flex d-none">
                    <a href="<?php echo $contact_url; ?>" class="hero-btn">Contact</a>
                </div>
            </div>

        </div>
    </nav>
</header>
<!--============================== Header End ==============================-->
