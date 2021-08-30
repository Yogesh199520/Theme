<?php
/*==============================*/
// @package SketchMesh
// @author SLICEmyPAGE
/*==============================*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0">
  <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php endif; ?>
  <?php wp_head(); ?>
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<?php /*
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-142283205-1"></script>
<script>
 window.dataLayer = window.dataLayer || [];
 function gtag(){dataLayer.push(arguments);}
 gtag('js', new Date());

 gtag('config', 'UA-142283205-1');
</script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-177305339-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-177305339-1');
</script>
*/?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TJF8RWZ');</script>
<!-- End Google Tag Manager -->
<!-- Hotjar Tracking Code for https://www.sketchmesh.com/ -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:2207361,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
</head>
<body <?php if(is_front_page()){ echo 'id="page-top"'; }else{ echo 'id="works"'; } ?> <?php body_class(); ?>>
<div id="loading">
  <div id="loading-center">
    <div id="loading-center-absolute">
      <img src="https://dev.sketchmesh.com/wp-content/uploads/2019/06/Untitled-2.gif" alt="">
    </div>
  </div>
</div>
<?php //============================== Header Start ============================== ?>
<?php
$telephone = $GLOBALS['theme_options']['telephone'];
$telephone_strip = $GLOBALS['theme_options']['telephone_strip'];
?>
<header <?php if(!is_front_page()){ echo 'class="inner-fixed"'; } ?>>
  <nav class="navbar navbar-expand-xl">
    <div class="container-fluid">
      <a class="navbar-brand js-scroll-trigger" href="<?php echo home_url('/'); ?>"><img class="logo-white" src="<?php the_field('logo','option'); ?>" alt="<?php echo get_bloginfo('name'); ?>" /><img class="logo-dark" src="<?php the_field('logo_colored','option'); ?>" alt="<?php echo get_bloginfo('name'); ?>" /></a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="icon-bar"></span>
      </button>
      <?php
        wp_nav_menu( array(
          'theme_location'    => 'header',
          'depth'             => 1,
          'container'         => 'div',
          'container_class'   => 'collapse navbar-collapse justify-content-md-center',
          'container_id'      => 'navbarNavDropdown',
          'menu_class'        => 'nav navbar-nav',
          'menu_id'           => 'main-nav',
          'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
          'walker'            => new WP_Bootstrap_Navwalker())
        );
      ?>
      <div class="new-header-right d-flex justify-content-center align-items-center">
        <?php if(!empty($telephone)): echo '<a class="header-icon" href="tel:'.$telephone_strip.'"><i class="fa fa-phone" aria-hidden="true"></i></a>'; endif; ?>
        <a class="header-btn js-scroll-trigger" href="#contact">GET IN TOUCH</a>
      </div>
    </div>
  </nav>
</header>
<?php //============================== Header End ============================== ?>