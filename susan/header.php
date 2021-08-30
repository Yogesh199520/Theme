<?php
/*==============================*/
// @package SusanCalman
// @author ThinkEQ
/*==============================*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
wp_body_open();
$logo = wp_get_attachment_image(get_field('logo','option'),'medium','',array('class'=>'logo-default'));
$colored_logo = wp_get_attachment_image(get_field('colored_logo','option'),'medium','',array('class'=>'logo-color'));
?>
<!--============================== Header Start ==============================-->
<header id="header">
    <nav class="navbar navbar-expand-xl">
        <div class="container">
            <div class="nav-inside d-flex align-items-center justify-content-between">
                <?php echo '<a class="navbar-brand" href="'.home_url('/').'">'.$logo.$colored_logo.'</a>'; ?>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="mainNav">
                    <div class="navbar-inside">
                        <div class="nav-shape d-block d-xl-none"><img src="<?php echo IMG.'graphics-yellow.svg'; ?>" alt="graphics" /></div>
                        <?php
                            wp_nav_menu(array(
                                'theme_location'    => 'header_menu',
                                'depth'             => 1,
                                'container'         => false,
                                'menu_class'        => 'navbar-nav',
                                'menu_id'           => '',
                                'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                'walker'            => new WP_Bootstrap_Navwalker(),
                            ));
                        ?>
                        <div class="nav-shape d-block d-xl-none flip"><img src="<?php echo IMG.'graphics-yellow.svg'; ?>" alt="graphics" /></div>
                        <?php if(have_rows('social_links','option')): ?>
                        <div class="nav-social-link d-block d-xl-none text-center">
                            <ul class="social-links">
                                <?php 
                                while(have_rows('social_links','option')): the_row();
                                    $icon = get_sub_field('icon');
                                    $url = get_sub_field('url');
                                    echo '<li><a href="'.$url.'" target="_blank">'.$icon.'</a></li>'; 
                                endwhile;
                                ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                        <div class="nav-second-nav d-block d-xl-none text-center">
                            <?php
                                wp_nav_menu( array(
                                    'theme_location'    => 'footer_menu',
                                    'depth'             => 1,
                                    'container'         => false,
                                    'menu_class'        => 'second-nav d-flex align-items-center justify-content-center',
                                ));
                            ?>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<!--============================== Header End ==============================-->
<?php if(!is_front_page() && !is_home()): echo '<main id="main">'; endif; ?>