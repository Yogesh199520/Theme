<?php
/*==============================*/
// @package American Narratives
// @author SLICEmyPAGE
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
$logo = get_field('logo','option');
?>
<!--============================== Header Start ==============================-->
<header id="header">
    <div class="container container1">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-default">
                    <div class="logo">
                    <?php echo '<a class="navbar-brand add-shape" href="'.home_url('/').'"><img src="'.$logo.'" alt="'.get_bloginfo('name').'" title="'.get_bloginfo('name').'" /></a>'; ?>
                    </div>
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <?php if(have_rows('social_icons','option')): ?>
                    <div class="header-right ml-auto">
                        <ul class="social-links">
                            <?php while(have_rows('social_icons','option')): the_row();
                                $url = get_sub_field('url');
                                $icon = wp_get_attachment_image(get_sub_field('icon'),'thumbnail');
                                echo '<li><a href="'.$url.'" target="_blank" rel="noopener">'.$icon.'</a></li>';
                            endwhile; ?>
                            
                        </ul>
                    </div>
                <?php endif; ?>
                    <div class="navbar-collapse collapse" id="mainNav" style="">
                        <?php
                            wp_nav_menu( array(
                                'theme_location'    => 'header_left_menu',
                                'depth'             => 1,
                                'container'         => false,
                                'menu_class'        => 'nav navbar-nav left-navbar',
                                'menu_id'           => 'main-nav',
                                'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                'walker'            => new WP_Bootstrap_Navwalker(),
                            ) );
                        ?>
                        <?php
                            wp_nav_menu( array(
                                'theme_location'    => 'header_right_menu',
                                'depth'             => 1,
                                'container'         => false,
                                'menu_class'        => 'nav navbar-nav right-navbar',
                                'menu_id'           => 'main-nav',
                                'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                'walker'            => new WP_Bootstrap_Navwalker(),
                            ) );
                        ?>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

<!--============================== Header End ==============================-->
