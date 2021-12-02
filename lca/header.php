<?php
/*==============================*/
// @package LCA
// @author SLICEmyPAGE
/*==============================*/
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
   
    ?>
    <header id="header">
        <nav class="navbar navbar-expand-xl">
            <div class="container">
                <div class="nav-inside d-flex align-items-center justify-content-between">
                    <?php echo '<a class="navbar-brand" href="'.home_url('/').'"><img src="'.$logo.'" alt="'.get_bloginfo('name').'" /></a>'; ?>
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-xl-end" id="mainNav">
                        <div class="navbar-inside ml-auto">
                            <?php
                                wp_nav_menu( array(
                                    'theme_location'    => 'header',
                                    'depth'             => 3,
                                    'container'         => false,
                                    'menu_class'        => 'navbar-nav',
                                    'menu_id'           => 'main-nav',
                                    'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                    'walker'            => new WP_Bootstrap_Navwalker(),
                                ));
                            ?>
                        </div>
                    </div>
                    <div class="header-right">
                        <a href="#!" class="btn btn-default header-btn">Take Assessment</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
