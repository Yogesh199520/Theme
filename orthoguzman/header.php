<?php
/*==============================*/
// @package Orthoguzman
// @author Orthoguzman
/*==============================*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div id="wrapper">
    <?php wp_body_open(); 
    $logo = get_field('logo','option');
    $location = get_field('location','option');
    $call_us = get_field('call_us','option');
    $text_us = get_field('text_us','option');
    $schedule_now = get_field('schedule_now','option');
    ?>
    <header id="header">
        <div class="header_bottom" id="myHeader">
            <div class="container">
                <div class="header">
                    <div class="header_left">
                        <?php 
                        echo '<div class="logo"><a href="'.home_url('/').'"><img width="260" height="72"  src="'.$logo.'" alt="'.get_bloginfo('name').'" /></a></div>';
                        if(have_rows('social_links','option')): 
                        ?>
                        <div class="header-social">
                            <?php 
                            while(have_rows('social_links','option')): the_row();
                            $icon = wp_get_attachment_image(get_sub_field('icon'),'thumbnail');
                            $url = get_sub_field('url');
                            echo '<a href="'.$url.'" target="_blank">'.$icon.'</a>';
                            endwhile;
                            ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="header_right">
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
                            ?>
                        </nav>
                        <div class="header_block">
                            <?php 
                            if(!empty($location)): ?>
                                <a class="top_address" href="<?php echo $location; ?>" target="_blank"><img loading="lazy" src="<?php echo IMG.'location-3.png'; ?>" alt="location" /></a>
                            <?php 
                            endif;
                            if(!empty($call_us || $text_us || $schedule_now)):
                            ?>
                            <a class="top_phone" data-fancybox="" data-src="#hidden-content2" href="javascript:void(0)"><img loading="lazy" src="<?php echo IMG.'phone-2-1.png'; ?>" alt="phone" /></a> 
                            <?php if(!empty($schedule_now)): echo '<a class="top_bar_btn" href="'.$schedule_now.'" target="_blank">Schedule Now</a>'; endif; ?>
                            <div style="display: none;" id="hidden-content2" class="fancybox-content">
                                <div class="book-now-form_button">
                                    <div class="popup-phones">
                                        <ul class="phones">
                                            <?php 
                                            if(!empty($call_us)): echo '<li><div class="icon_title_popup"><a href="tel:+'.$call_us.' "> Call Us </a></div></li>'; endif; 
                                            if(!empty($text_us)): echo '<li><div class="icon_title_popup"><a href="sms:+'.$text_us.'"> Text Us </a></div></li>'; endif; 
                                            ?>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php 
                            endif; 
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

