<?php
/*==============================*/
// @package Agaency
// @author SLICEmyPAGE
/*==============================*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php if(is_singular() && get_option('thread_comments')) wp_enqueue_script('comment-reply'); ?>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <?php
        wp_body_open();
        $logo_id = get_theme_mod('custom_logo');
        $white_logo = wp_get_attachment_image_src($logo_id,'medium');
        $black_logo = get_theme_mod('black_logo');
        $phone = get_field('phone','option');
        $email = get_field('email','option');
        ?>
        <!--============================== Header Start ==============================-->
        <header>
            <!-- Navbar -->
            <nav class="navbar navbar-expand-xl">
                <div class="container">
                    <?php echo '<a class="navbar-brand" href="'.esc_url(home_url('/')).'"><img src="'.$white_logo[0].'" alt="'.get_bloginfo('name').'" class="logo-white" /><img src="'.$black_logo.'" alt="'.get_bloginfo('name').'" class="logo-dark" /></a>'; ?>
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-md-center" id="navbarNavDropdown">
                        <?php
                            wp_nav_menu( array(
                                'theme_location'    => 'header_menu',
                                'depth'             => 2,
                                'container'         => false,
                                'menu_class'        => 'nav navbar-nav',
                                'menu_id'           => 'main-nav',
                                'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                'walker'            => new WP_Bootstrap_Navwalker(),
                            ));
                        ?>
                    </div>
                    <div class="header-right">
                        <a href="tel:<?php echo esc_html($phone); ?>"><i class="fa fa-phone fa-flip-horizontal"></i></a>
                        <a href="mailto:<?php echo esc_html($email); ?>"><i class="fa fa-envelope"></i></a>
                        <a href="javascript:void(0)" rel="nofollow" class="search-icon"><i class="fa fa-search"></i></a>
                       
                    </div>
                </div>
            </nav>
        </header>
        <!--============================== Header End ==============================-->
        <!--============================== Search Bar Start ==============================-->
        <div class="search-box-outer">
            <div class="container">
                <div class="search-box">
                    <form action="<?php echo esc_url(home_url()); ?>" id="search-form" method="get">
                        <input type="text" name="s" id="s" class="form-control" placeholder="Type &amp; Hit Enter to Search" />
                        <input type="hidden" value="submit" />
                    </form>
                    <a href="javascript:void(0)" class="close-search"><i class="far fa-times-circle"></i></a>
                </div>
            </div>
        </div>
        <!--============================== Search Bar End ==============================-->

