<?php
/*==============================*/
// @package Plymouth
// @author SLICEmyPAGE
/*==============================*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Our goal is to provide a friendly and relaxed atmosphere while you achieve the smile of your dreams. If you have considered orthodontic treatment for your child or yourself —we are here to help! The first step as part of your orthodontic treatment is a complimentary consultation where we will perform an oral examination complete with x-rays and photographs so that we can discuss your personalized treatment plan.">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div id="wrapper">
    <?php
    wp_body_open();
    $logo = get_field('logo','option');
    $location = preg_replace( "/<br>|\n/", "", get_field('location','option'));
    $phone = get_field('phone','option');
    $button_text = get_field('button_text','option');
    $button_link = get_field('button_link','option');
    ?>
    <header id="header">
        <div class="header_top">
            <div class="container">
                <div class="row">
                    <?php 
                    if(!empty($location)): echo '<div class="col-6"><p class="address">'.$location.'</p></div>'; endif;
                    if(have_rows('social_links','option')): 
                    ?>
                    <div class="col-6">
                        <ul class="social">
                            <?php 
                            while(have_rows('social_links','option')): the_row();
                            $icon = get_sub_field('icon');
                            $url = get_sub_field('url');
                            echo '<li><a href="'.$url.'" aria-label="linkedin Link" target="_blank" rel="noopener">'.$icon.'</a></li>';
                            endwhile;
                            ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
      
        <div class="header_bottom" id="myHeader">
            <div class="bottombar">
              <div class="container">
                <div class="header">
                    <?php echo '<div class="logo"><a href="'.home_url('/').'"><img width="100" height="100"  src="'.$logo.'" alt="'.get_bloginfo('name').'" /></a></div>'; ?>
                    <div class="header-right">
                        <nav class="nav">
                            <?php
                                wp_nav_menu( array(
                                    'theme_location'    => 'header',
                                    'depth'             => 2,
                                    'container'         => false,
                                    'menu_class'        => 'main-menu',
                                    'menu_id'           => 'main-nav',
                                    'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                    'walker'            => new WP_Bootstrap_Navwalker(),
                                ));
                            
                            if(!empty($button_text)): echo '<a class="blue_button" href="'.$button_link.'" target="_blank">'.$button_text.'</a>'; endif;
                            if(!empty($phone)): echo '<a class="blue_button" href="tel:+1'.$phone.'">'.$phone.'</a>'; endif;
                            ?>
                        </nav>
                        <?php 
                        if(!empty($button_text)): echo '<a class="blue_button" href="'.$button_link.'" target="_blank">'.$button_text.'</a>'; endif;
                        if(!empty($phone)): echo '<a class="phone" href="tel:+1'.$phone.'">'.$phone.'</a>'; endif;
                        ?>
                    </div>
                </div>
              </div>
            </div>
        </div>
  </header>

