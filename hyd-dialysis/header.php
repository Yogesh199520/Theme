<?php
/*==============================*/
// @package American Narratives
// @author SLICEmyPAGE
/*==============================*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
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
    <nav class="navbar navbar-expand-xl">
        <div class="container container1">
            <?php echo '<a class="navbar-brand" href="'.home_url('/').'"><img src="'.$logo.'" alt="'.get_bloginfo('name').'"/></a>'; ?>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <div class="navbar-inside ml-auto">
                    <?php
                        wp_nav_menu( array(
                            'theme_location'    => 'header_menu',
                            'depth'             => 2,
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
        </div>
    </nav>
</header>
<!--============================== Header End ==============================-->
<!--============================== Main Start ==============================-->
<main id="main">
