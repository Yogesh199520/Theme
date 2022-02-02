<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/new/images/favicon.png" type="image/png">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<?php wp_head(); ?>
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-128389321-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-128389321-1');
</script>

	<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

</head>

<body <?php body_class(); ?>>
<div id="wrapper">
  <div id="menu-open">

    <div class="close-menu"><img src="<?php echo get_stylesheet_directory_uri(); ?>/new/images/close-menu-icon.png" alt="close-menu"/></div>

    <div class="header-logo">

      <div class="logo"><?php the_custom_logo(); ?></div>

    </div>

    <nav class="navigation">

<ul id="menu-header-menu" class="menu">

        <?php $defaults = array(
                                            'theme_location'  => 'primary',
                                            'menu'            => '',
                                            'container'       => '',
                                            'container_class' => '',
                                            'container_id'    => '',
                                            'menu_class'      => '',
                                            'menu_id'         => '',
                                            'echo'            => false,
                                            'fallback_cb'     => 'wp_page_menu',
                                            'before'          => '',
                                            'after'           => '',
                                            'link_before'     => '',
                                            'link_after'      => '',
                                            'items_wrap'      => '%3$s',
                                            'depth'           => 0,
                                            'walker'          => ''
                                        );
                                        //echo strip_tags(wp_nav_menu( $defaults ), '<a>' );
                                        echo wp_nav_menu( $defaults );
                                 ?>

      </ul>

    </nav>

    <div class="social_icon2">

      <ul>

        <li><a href="<?php the_field('top_bar_new_social_twitter','options'); ?>" class="twitter" target="_blank"></a></li>

        <li><a href="<?php the_field('top_bar_new_social_youtube','options'); ?>" class="youtube" target="_blank"></a></li>

        <li><a href="<?php the_field('top_bar_new_social_yelp','options'); ?>" class="yelp" target="_blank"></a></li>

      </ul>

    </div>

  </div>
<!-- footer-bottom --> 
 <div class="mobile-header" style="display:none;"> 
	<a href="<?php the_field('appointment_link' , 'options'); ?>" class="icon calandar-icon"><i class="fa fa-calendar" aria-hidden="true"></i></a> 
	<a href="<?php the_field('top_bar_new_mobile_address_link','options'); ?>" target="_blank" class="map-icon"><img loading="lazy" alt="Pin Icon" src="https://www.ricciortho.com/wp-content/uploads/2021/09/location_icon.png"></a> 
	<a id="mobilemenubtn" class="btn-open toggle-mobile"><span></span> <span></span> <span></span></a>
	 <a data-fancybox="" data-src="#hidden-content" href="javascript:;" class="phone-icon"><img alt="Phone Icon" src="https://www.ricciortho.com/wp-content/uploads/2021/09/call_icon.png"></a> 
	<a href="<?php the_field('map_menu_link' , 'options'); ?>" class="icon email-icon"><i class="fa fa-envelope" aria-hidden="true"></i></a> </div> 
  <header id="header">

    <div class="container">

      <div class="header">

        <div class="header-left">

          <div class="logo"><?php the_custom_logo(); ?></div>

        </div>

        <div class="header-right">

          <div class="social_icon">

            <ul>

              <li><a href="<?php the_field('top_bar_new_social_facebook','options'); ?>" class="facebook" target="_blank"></a></li>
              <li><a href="<?php the_field('top_bar_new_social_instagram','options'); ?>" class="instagram" target="_blank"></a></li>

            </ul>

          </div>

          <div class="appointment_btn"><a href="<?php the_field('top_bar_new_consultation_link','options'); ?>"><?php the_field('top_bar_new_consultation_text','options'); ?></a></div>

          <div class="phone_header">
         <!--<a href="tel:<?php //echo preg_replace('/[^\dxX]/', '',get_field('top_bar_new_phone','options')); ?>"><img src="<?php //echo get_stylesheet_directory_uri(); ?>/new/images/phone-icon.png" alt="Phone icon" /><?php //the_field('top_bar_new_phone','options'); ?></a>-->
        <a data-fancybox="" data-src="#hidden-content" href="javascript:;"><img src="<?php echo get_stylesheet_directory_uri(); ?>/new/images/phone-icon.png" alt="Phone icon" />678-417-9848</a>
        </div>

          <div class="toggle-menu"><a href="javascript:void(0)"class="toggle-btn" id="menu-open-btn"> <span class="menu-bar"></span> <span class="menu-bar"></span> <span class="menu-bar"></span> </a> </div>

        </div>

      </div>

    </div>

  </header>