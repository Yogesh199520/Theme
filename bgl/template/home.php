<?php
/*==============================*/
// @package Booth Golf & Leisure
// @author ThinkEQ
/*==============================*/
/* Template Name: Homepage */
get_header();

if(have_rows('hero_slider')):
?>	
<!--============================== Hero Start ==============================-->
<div class="hero-outer">
    <div class="hero-container hero-slider mb-0 white-dots">
        <?php 
        while(have_rows('hero_slider')): the_row();
        $heading = get_sub_field('heading');
        $sub_heading = get_sub_field('sub_heading');
        $button_text = get_sub_field('button_text');
        $button_link = get_sub_field('button_link');
        ?>
        <div class="hero-slide d-flex align-items-md-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="hero-box">
                            <?php 
                            if(!empty($heading)): echo '<h1 class="hero-heading">'.$heading.'</h1>'; endif;
                            if(!empty($sub_heading)): echo '<h2>'.$sub_heading.'</h2>'; endif; 
                            if(!empty($button_text)): echo '<a href="'.$button_link.'" class="btn btn-default2">'.$button_text.'</a>'; endif;  
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    <div class="hero-container hero-image-slider d-none d-md-block">
        <?php 
        while(have_rows('hero_slider')): the_row();
        $bg_image = wp_get_attachment_image_url(get_sub_field('bg_image'),'full');
        ?>
        <div class="hero-slide d-flex align-items-center" style="background-image:url(<?php echo $bg_image; ?>);"></div>
        <?php endwhile; ?>
    </div>
    <div class="hero-container hero-image-slider d-block d-md-none">
        <?php 
        while(have_rows('hero_slider')): the_row();
        $bg_image_mob = wp_get_attachment_image_url(get_sub_field('bg_image_mob'),'large');
        ?>
        <div class="hero-slide d-flex align-items-center" style="background-image:url(<?php echo $bg_image_mob; ?>);"></div>
        <?php endwhile; ?>
    </div>
    <div class="hero-grass-dark"></div>
    <div class="hero-grass-light"></div>
</div>
<!--============================== Hero End ==============================-->
<?php 
endif;

$intro_body_text = get_field('intro_body_text');
if(have_rows('intro_page_links')):
?>
<!--============================== Content Start ==============================-->
<div class="content-container home-intro-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <?php if(!empty($intro_body_text)): echo '<div class="home-hero-content text-md-center">'.$intro_body_text.'</div>'; endif; ?>
                <div class="home-hero-links">
                    <ul class="home-links-list d-flex flex-wrap">
                        <?php 
                        while(have_rows('intro_page_links')): the_row();
                        $icon = wp_get_attachment_image(get_sub_field('icon'),'medium');
                        $heading = get_sub_field('heading');
                        $text = get_sub_field('text');
                        $button_text = get_sub_field('button_text');
                        $button_link = get_sub_field('button_link');
                        ?>
                        <li>
                            <div class="hl-box d-flex flex-column">
                                <?php 
                                if(!empty($icon)): echo '<div class="hl-icon">'.$icon.'</div>'; endif;
                                if(!empty($heading)): echo '<h4>'.$heading.'</h4>'; endif; 
                                if(!empty($text)): echo '<p>'.$text.'</p>'; endif; 
                                if(!empty($button_text)): echo '<a href="'.$button_link.'" class="link mt-auto">'.$button_text.'</a>'; endif;  
                                ?>
                            </div>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php 
endif;

$hiw_heading = get_field('hiw_heading');
$hiw_button_text = get_field('hiw_button_text');
$hiw_button_link = get_field('hiw_button_link');
if(have_rows('hiw_steps')):
?>
<!--============================== Content Start ==============================-->
<div class="content-container">
    <div class="container">
        <?php if(!empty($hiw_heading)): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="heading text-center">
                    <h3><div class="heading-icon"><img src="<?php echo IMG .'how-it-works-icon-green.svg'; ?>" alt="how-it-works-icon-green" /></div><?php echo $hiw_heading; ?></h3>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-12 lg-mb">
                <div class="steps-container d-flex flex-column">
                    <ul class="step-list d-flex flex-wrap">
                        <?php 
                        while(have_rows('hiw_steps')): the_row();
                        $heading = get_sub_field('heading');
                        $body_text = get_sub_field('body_text');
                        ?>
                        <li class="step-list-item">
                            <div class="step-list-box">
                                <?php 
                                if(!empty($heading)): echo '<h4>'.$heading.'</h4>'; endif;
                                if(!empty($body_text)): echo '<p>'.$body_text.'</p>'; endif;  
                                ?>
                            </div>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php if(!empty($hiw_button_text)): echo '<div class="row"><div class="col-md-12 text-center"><a href="'.$hiw_button_link.'" class="btn btn-primary2 btn-lg">'.$hiw_button_text.'</a></div></div>'; endif; ?>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php 
endif;

$dev_select_development = get_field('dev_select_development');
if(!empty($dev_select_development)):
$bg_image = get_the_post_thumbnail_url($dev_select_development, 'full');
$excrept = get_the_excerpt($dev_select_development);
$link = get_the_permalink($dev_select_development);
$icon = wp_get_attachment_image(get_field('dev_icon',$dev_select_development),'medium');
$dev_button_text = get_field('dev_button_text');
$dev_button_link = get_field('dev_button_link');
?>
<!--============================== Content Start ==============================-->
<div class="home-development-container">
    <a href="<?php echo $link; ?>" class="development-box d-flex flex-column">
        <div class="development-box-img" style="background-image: url(<?php echo $bg_image; ?>);"></div>
        <div class="development-box-content d-flex flex-column justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <?php if(!empty($icon)): echo '<div class="development-box-icon">'.$icon.'</div>'; endif; ?>
                        <h3><?php echo esc_html($dev_select_development->post_title); ?></h3>
                        <p><?php echo $excrept; ?></p>
                        <span class="btn btn-default">LEARN MORE</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="development-box-overlay"></div>
    </a>
    <?php 
    if(!empty($dev_button_text)): 
        echo '<div class="all-dev-cta"><div class="container"><div class="row"><div class="col-md-12 text-center"><a href="'.$dev_button_link.'" class="btn btn-primary2 btn-lg">'.$dev_button_text.'</a></div></div></div></div>';
    endif; 
    ?>
</div>
<!--============================== Content End ==============================-->
<?php 
endif;

$faqs_heading = get_field('faqs_heading');
$faqs_button_text = get_field('faqs_button_text');
$faqs_button_link = get_field('faqs_button_link');
$select_faqs = get_field('select_faqs');
if(!empty($select_faqs)):
?>
<!--============================== Content Start ==============================-->
<div class="content-container">
    <div class="container">
        <?php if(!empty($faqs_heading)): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="heading text-center">
                    <h3><?php echo $faqs_heading; ?></h3>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-10 offset-lg-1 lg-mb">
                <div class="faqs-content">
                    <div class="accordion" id="faqs-accordion">
                        <?php
                        $count = 1;
                        foreach($select_faqs as $faq_id):
                            $title = get_the_title($faq_id);
                            $content_post = get_post($faq_id);
                            $content = $content_post->post_content;
                            $content = apply_filters('the_content', $content);
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="panel-title" data-toggle="collapse" data-target="#collapse<?php echo $count; ?>" aria-expanded="<?php echo $count==1?'true':'false'; ?>"><?php echo $title; ?></h3>
                            </div>
                            <div id="collapse<?php echo $count; ?>" class="card-body collapse <?php echo $count==1?'show':''; ?>" data-parent="#faqs-accordion" style="">
                                <div class="card-body-content">
                                    <?php echo $content; ?>
                                </div>
                            </div>
                        </div>
                        <?php 
                        $count = $count+1;
                        endforeach; 
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if(!empty($faqs_button_text)): echo '<div class="row"><div class="col-md-12 text-center"><a href="'.$faqs_button_link.'" class="btn btn-primary2 btn-lg">'.$faqs_button_text.'</a></div></div>'; endif; ?>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php 
endif;

$testimonials = get_field('testimonials');
if(!empty($testimonials)):
?>
<!--============================== Content Start ==============================-->
<div class="content-container color-bg add-bg-graphic more-opacity">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="testimonial-list d-flex flex-wrap justify-content-center  full-height testimonial-slider">
                    <?php
                    foreach($testimonials as $t_id):
                        $title = get_field('name',$t_id);
                        $destination = get_field('destination',$t_id);
                        $quote = get_field('quote',$t_id);
                        $author_photo = wp_get_attachment_image(get_field('author_photo',$t_id),'medium');
                        if(empty($title)): $title = get_the_title($t_id); endif;
                    ?>
                    <li class="testimonial-item">
                        <div class="testimonial-box">
                            <?php 
                            if(!empty($author_photo)): echo '<div class="testimonial-img">'.$author_photo.'</div>'; endif; 
                            if(!empty($quote)): echo '<div class="testimonial-text"><p>'.$quote.'</p></div>'; endif; 
                            ?>
                            <div class="testimonial-by">
                            <span><?php echo $title; ?> </span>
                            <?php if(!empty($destination)): echo '<small>'.$destination.'</small>'; endif; ?>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php 
endif;

$ln_heading = get_field('ln_heading');
$ln_latest_news = get_field('ln_latest_news');
?>
<!--============================== Content Start ==============================-->
<div class="content-container mid-pad pb-0 latest-blog-post">
    <?php if(!empty($ln_heading)): ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading text-center">
                    <h3><?php echo $ln_heading; ?></h3>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="container-fluid">
        <div class="row">
            <ul class="blog-post-list d-flex flex-wrap">
                <?php
                if(!empty($ln_latest_news)):
                foreach($ln_latest_news as $news_id):
                    $featured_img = get_the_post_thumbnail($news_id, 'large');
                    $title = get_the_title($news_id);
                    $permalink = get_the_permalink($news_id);
                ?>
                <li class="blog-post-item">
                    <a href="<?php echo $permalink; ?>" class="blog-post-box d-flex">
                        <?php if(!empty($featured_img)): echo '<div class="blog-post-img">'.$featured_img.'</div>'; endif; ?>
                        <div class="blog-post-caption">
                            <h3><?php echo $title; ?></h3>
                        </div>
                        <span class="blog-post-btn">READ MORE</span>
                        <div class="blog-post-overlay"></div>
                    </a>
                </li>
                <?php 
                endforeach;
                else: 
                $news_args = array('post_type'=> 'post','post_status'=> 'publish','posts_per_page' =>3);
                $query = new WP_Query($news_args); 
                while($query->have_posts()) : $query->the_post();
                ?>
                <li class="blog-post-item">
                    <a href="<?php the_permalink(); ?>" class="blog-post-box d-flex">
                        <?php if(has_post_thumbnail()): ?>
                        <div class="blog-post-img">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <?php endif; ?>
                        <div class="blog-post-caption">
                            <h3><?php the_title(); ?></h3>
                        </div>
                        <span class="blog-post-btn">READ MORE</span>
                        <div class="blog-post-overlay"></div>
                    </a>
                </li>
                <?php 
                endwhile;
                wp_reset_postdata();
                endif; 
                ?>
            </ul>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php 
$ccta_sub_heading = get_field('ccta_sub_heading','option');
$ccta_heading = get_field('ccta_heading','option');
$ccta_button_text = get_field('ccta_button_text','option');
$ccta_button_link = get_field('ccta_button_link','option');
$contact_cta = get_field('contact_cta');
if(!empty($ccta_sub_heading || $ccta_heading)) :
?>
<!--============================== Contact CTA Start ==============================-->
<div class="contact-cta-container add-bg-graphic more-opacity">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php 
                if(!empty($ccta_sub_heading)): echo '<h6>'.$ccta_sub_heading.'</h6>'; endif; 
                if(!empty($ccta_heading)): echo '<h4>'.$ccta_heading.'</h4>'; endif; 
                if(!empty($ccta_button_text)): echo '<a href="'.$ccta_button_link.'" class="btn btn-primary">'.$ccta_button_text.'</a>'; endif;
                ?> 
            </div>
        </div>
    </div>
</div>
<!--============================== Contact CTA End ==============================-->
<?php
endif; 

$enable_form = get_field('enable_form');
$form_id = get_field('nl_select_form');
if($enable_form && !empty($form_id)): 
?>
<!--============================== Subscribe Start ==============================-->
<div class="content-container less-pad">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
               <?php echo do_shortcode('[contact-form-7 id="'.$form_id.'"]'); ?>
            </div>
        </div>
    </div>
</div>
<!--============================== Subscribe End ==============================-->
<?php 
endif;
get_footer(); 
?>