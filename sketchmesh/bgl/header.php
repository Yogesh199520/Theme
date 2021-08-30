<?php
/*==============================*/
// @package Booth Golf & Leisure
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
$logo = get_field('logo','option');
$book_button_text = get_field('book_button_text','option');
$book_button_link = get_field('book_button_link','option');
?>
<!--============================== Header Start =============================================-->
<header id="header">
    <nav class="navbar">
        <div class="container">
            <div class="header-content w-100 d-flex align-items-center justify-content-between">
                <?php if(!empty($logo)): echo '<a class="navbar-brand" href="'.home_url('/').'"><img src="'.$logo.'" alt="'.get_bloginfo('name').'" /></a>'; endif; ?>
                <div class="header-nav-container d-none d-xl-flex justify-content-md-center">
                    <?php
                        wp_nav_menu( array(
                            'theme_location'    => 'header1',
                            'depth'             => 2,
                            'container'         => false,
                            'menu_class'        => 'header-nav d-flex',
                            'menu_id'           => '',
                            'add_li_class'      => 'header-item',
                            'link_class'        => 'header-link',
                            'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>'
                        ));
                    ?>
                </div>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-flex flex-column flex-md-row align-items-md-center justify-content-md-center" id="mainNav">
                    <span class="navbar-bg"></span>
                    <img src="<?php echo IMG.'menu-bg-logo.svg'; ?>" alt="menu-bg-logo" class="navbar-bg-logo" />
                    <div class="navbar-inside d-md-flex flex-md-wrap justify-content-md-between">
                        <div class="navbar-inside-left">
                            <?php
                                wp_nav_menu( array(
                                    'theme_location'    => 'header1',
                                    'depth'             => 2,
                                    'container'         => false,
                                    'menu_class'        => 'second-nav-navbar',
                                    'menu_id'           => '',
                                    'add_li_class'      => 'second-nav-item',
                                    'link_class'        => 'second-nav-link',
                                    'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                ));
                            ?>
                        </div>
                        <div class="navbar-inside-right">
                            <?php
                                wp_nav_menu( array(
                                    'theme_location'    => 'header2',
                                    'depth'             => 1,
                                    'container'         => false,
                                    'menu_class'        => 'navbar-nav',
                                    'menu_id'           => '',
                                    'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                    'walker'            => new WP_Bootstrap_Navwalker(),
                                ));
                                if(!empty($book_button_text)): echo '<div class="navbar-inside-btn"><a href="'.$book_button_link.'" class="btn btn-default header-btn btn-block">'.$book_button_text.'</a></div>'; endif; 
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<!--============================== Header End ================================================-->
<?php
if(is_home()){ $pid = get_option('page_for_posts'); }else{ $pid = get_the_ID(); }
$inner_banner_heading = get_field('inner_banner_heading',$pid);
$inner_banner_icon = wp_get_attachment_image(get_field('inner_banner_icon',$pid),'medium');
$inner_banner_short_text = get_field('inner_banner_short_text',$pid);
$show_breadcrumb = get_field('show_breadcrumb',$pid);
$inner_banner_bg_image = wp_get_attachment_image(get_field('inner_banner_bg_image',$pid),'full');
if(!empty($inner_banner_heading)):
    $title = $inner_banner_heading;
else:
    $title = get_the_title($pid);
endif;
?>
<!--============================== Level 3 Hero Start ==============================-->
<div class="level3-hero add-bg-graphic">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if($show_breadcrumb == true && function_exists('bcn_display_list')): ?>
                <div class="breadcrumbs-container">
                    <ol class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                        <?php bcn_display_list(); ?>
                    </ol>
                </div>
                <?php endif; ?>
                <h1><?php echo $title; ?></h1>
            </div>
        </div>
    </div>
</div>
<!--============================== Level 3 Hero End ==============================-->