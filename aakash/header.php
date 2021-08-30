<?php $seo = get_field('seo_keywords','option'); $favicon = get_field('favicon','option'); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="<?php bloginfo('html_type'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="<?php echo esc_attr($seo); ?>">
	<?php if(!empty($favicon)): ?>
	<link rel="shortcut icon" href="<?php echo esc_url($favicon); ?>">
	<?php endif ?>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
  	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
  	<link href="<?php echo THEMEDIR; ?>/include/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Gabriela' rel='stylesheet' type='text/css'>
	<link href="<?php echo THEMEDIR; ?>/include/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo THEMEDIR; ?>/include/css/animsition.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo THEMEDIR; ?>/include/css/heading.css" rel="stylesheet" type="text/css">
	<link href="<?php echo THEMEDIR; ?>/include/css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
	<link href="<?php echo THEMEDIR; ?>/include/css/flexslider.css" rel="stylesheet" type="text/css">
	<link href="<?php echo THEMEDIR; ?>/include/css/style.css" rel="stylesheet" type="text/css">
  	<?php wp_head(); ?>
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body <?php body_class(); ?>>
<?php //======== LOADER ======== ?>
<div id="site-preloader" class="preload-complete">
	<div class="preload-position">
        <div class="preloading">
            <div class="preloading-line"></div>
            <div class="preloading-break preloading-line-1"></div>
            <div class="preloading-break preloading-line-2"></div>
            <div class="preloading-break preloading-line-3"></div>
            <div class="preloading-break preloading-line-4"></div>
            <div class="preloading-break preloading-line-5"></div>
        </div>
    </div>
</div>
<?php //======== LOADER END ======== ?>
<?php if(!is_page_template('templates/home.php')){
if(is_page_template('templates/about.php')){
	$main_class = 'about-container';
}elseif(is_page_template('templates/resume.php')){
	$main_class = 'resume-container';
}elseif(is_page_template('templates/portfolio.php')){
	$main_class = 'portfolio-container';
}elseif(is_page_template('templates/contact.php')){
	$main_class = 'contact-container';
}else{
	$main_class = 'blog-container';
} ?>
<div class="animsition" data-animsition-in-class="zoom-in" data-animsition-in-duration="1000" data-animsition-out-class="zoom-out" data-animsition-out-duration="500">
	<div class="outer-container <?php echo $main_class; ?>">
		<header style="background-color:<?php the_field('header_color'); ?>;">
			<h2><?php if(is_single()){ echo 'Blog'; }else{ wp_title(''); } ?></h2>
			<a class="page-close" href="<?php if(is_single() || is_category() || is_author() || is_tag()){echo home_url('/blog/'); }else{ echo home_url('/'); } ?>"></a> 
		</header>
		<div class="main-container scroll-container">
<?php } 
