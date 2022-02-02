<?php
/*==============================*/
// @package Sharkup
// @author Medical Darpan
/*==============================*/
/* Template Name: Home */
get_header();

$hero_heading = get_field('hero_heading');
$hero_text = get_field('hero_text');
$hero_right_image = wp_get_attachment_image(get_field('hero_right_image'),'full');
?>
<!--============================== Hero Start ==============================-->
<div class="hero-contianer d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="hero-content-box">
                    <?php 
                    if(!empty($hero_heading)): echo '<h1>'.$hero_heading.'</h1>'; endif; 
                    if(!empty($hero_text)): echo '<p>'.$hero_text.'</p>'; endif;
                    if(have_rows('hero_buttons')): 
                    ?>
                    <div class="hero-btn">
                        <?php 
                        while(have_rows('hero_buttons')): the_row();
                        $button_text = get_sub_field('button_text');
                        $button_link = get_sub_field('button_link');
                        echo '<a href="'.$button_link.'" class="btn btn-default btn-lg">'.$button_text.'</a>';
                        endwhile;
                        ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if(!empty($hero_right_image)): ?>
            <div class="col-md-6">
                <div class="hero-bg-box">
                    <div class="hero-bg">
                        <?php echo $hero_right_image; ?>
                        <div class="circle1"></div>
                        <div class="circle2"></div>
                        <div class="circle3"></div>
                        <div class="circle4"></div>
                        <div class="circle5"></div>
                        <div class="circle6"></div>
                        <div class="circle7"></div>
                        <!-- <div class="svg-img d-none d-sm-block">
                           <img src="<?php echo IMG; ?>component.svg"></div> -->
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!--============================== Hero End ==============================-->
<?php 
$wwd_image_1 = wp_get_attachment_image(get_field('wwd_image_1'),'medium_large');
$wwd_image_2 = wp_get_attachment_image(get_field('wwd_image_2'),'medium_large');
$wwd_sub_heading = get_field('wwd_sub_heading');
$wwd_heading = get_field('wwd_heading');
$wwd_body_text = get_field('wwd_body_text');
?>
<!--============================== Content container Start ==============================-->
<div class="content-container what-we-do-container overflow-hidden">
    <div class="container">
        <div class="row">
            <?php if(!empty($wwd_image_1 || $wwd_image_2)): ?>
            <div class="col-md-6">
                <div class="wwd-box">
                    <?php 
                    if(!empty($wwd_image_1)): echo '<div class="men-img">'.$wwd_image_1.'</div>'; endif;
                    if(!empty($wwd_image_2)): echo '<div class="women-img">'.$wwd_image_2.'</div>'; endif; 
                    ?>
                    <div class="comma-img"><img src="<?php echo IMG; ?>comma.png" alt="" /></div>
                    <div class="circle-img-1"></div>
                    <div class="circle-img-2"></div>
                    <div class="circle-img-3"></div>
                    <div class="circle-img-4"></div>
                    <div class="circle-img-5"></div>
                    <div class="dotted-img-left">
                        <img src="<?php echo IMG; ?>component.svg" alt=" " />
                    </div>
                    <div class="dotted-img-right">
                        <img src="<?php echo IMG; ?>component.svg" alt=" " />
                    </div>
                </div>
            </div>
            <?php 
            endif;
            if(have_rows('wwd_list_items')):  
            ?>
            <div class="col-md-6">
                <div class="wwd-right-content">
                    <div class="heading">
                        <?php 
                        if(!empty($wwd_sub_heading)): echo '<h4>'.$wwd_sub_heading.'</h4>'; endif; 
                        if(!empty($wwd_heading)): echo '<h3>'.$wwd_heading.'</h3>'; endif;
                        if(!empty($wwd_body_text)): echo '<p>'.$wwd_body_text.'</p>'; endif;
                        ?>
                    </div>
                    <ul class="wwd-list">
                        <?php 
                        while(have_rows('wwd_list_items')): the_row();
                        $icon = wp_get_attachment_image(get_sub_field('icon'),'small');
                        $heading = get_sub_field('heading');
                        $body_text = get_sub_field('body_text');
                        ?>
                        <li class="wwd-item">
                            <div class="wwd-content-box">
                                <?php
                                if(!empty($icon)): echo '<div class="wwd-icon">'.$icon.'</div>'; endif; 
                                if(!empty($heading)): echo '<h4>'.$heading.'</h4>'; endif;
                                if(!empty($body_text)): echo '<p>'.$body_text.'</p>'; endif;
                                ?>
                            </div>
                        </li>
                       <?php endwhile; ?>
                    </ul>
                    <div class="circle-right1"></div>
                    <div class="circle-imgs"><img src="<?php echo IMG; ?>component.svg" alt=" " /></div>
                    <div class="circle-right2"></div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!--============================== Content container End ==============================-->
<?php 
$hiw_sub_heading = get_field('hiw_sub_heading');
$hiw_heading = get_field('hiw_heading');
$hiw_body_text = get_field('hiw__body_text');
if(have_rows('hiw_work_steps')): 
?>
<!--============================== Content container Start ==============================-->
<div class="content-container how-it-work-container overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading text-center">
                    <?php 
                    if(!empty($hiw_sub_heading)): echo '<h4>'.$hiw_sub_heading.'</h4>'; endif; 
                    if(!empty($hiw_heading)): echo '<h3>'.$hiw_heading.'</h3>'; endif;
                    if(!empty($hiw_body_text)): echo '<p>'.$hiw_body_text.'</p>'; endif;
                    ?>
                </div>
                <ul class="how-list d-md-flex flex-md-wrap">
                    <?php 
                    while(have_rows('hiw_work_steps')): the_row();
                    $icon = wp_get_attachment_image(get_sub_field('icon'),'small');
                    $heading = get_sub_field('heading');
                    $body_text = get_sub_field('body_text');
                    $button_text = get_sub_field('button_text');
                    $button_link = get_sub_field('button_link');
                    $step = get_row_index();
                    ?>
                    <li class="how-item">
                        <div class="how-box">
                            <?php 
                            if(!empty($icon)): echo '<div class="how-icon">'.$icon.'</div>'; endif;
                            if(!empty($heading)): echo '<h5>'.$heading.'</h5>'; endif;
                            if(!empty($body_text)): echo '<p>'.$body_text.'</p>'; endif;
                            if(!empty($button_text)): echo '<a href="'.$button_link.'" class="long-arrow-btn">'.$button_text.' <i class="fas fa-long-arrow-alt-right"></i></a>'; endif;
                            ?>
                            <div class="hover-count-box">
                                0<?php echo $step; ?>
                            </div>
                        </div>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--============================== Content container End ==============================-->
<?php 
endif; 
$lp_sub_heading = get_field('lp_sub_heading');
$lp_heading = get_field('lp_heading');
$lp_body_text = get_field('lp_body_text');
?>
<!--============================== Content container Start ==============================-->
<div class="content-container price-comparsion-container overflow-hidden" id="pricing">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(!empty($lp_sub_heading || $lp_heading || $lp_body_text)): ?>
                <div class="heading text-center mb-0">
                    <?php 
                    if(!empty($lp_sub_heading)): echo '<h4>'.$lp_sub_heading.'</h4>'; endif; 
                    if(!empty($lp_heading)): echo '<h3>'.$lp_heading.'</h3>'; endif;
                    echo $lp_body_text;
                    ?>
                </div>
                <?php endif; ?>
                <!-- <ul class="pricing-list d-flex flex-wrap">
                    <li>
                        <div class="pricing-box d-flex flex-column">
                            <div class="price-head">
                                <div class="purple-text"> Global Entrepreneur </div>
                                <ul class="check-list">
                                    <li>Entity :<span>offshore - Ltd</span></li>
                                    <li>Emirate :<span>Ras Al khaima</span></li>
                                    <li>Authority :<span>RAK ICC</span></li>
                                    <li>Visa Eligibility :<span>Not Applicable</span></li>
                                </ul>
                            </div>
                            <div class="price-body">
                                <div class="pb-upper">
                                    <h4> Total AED 6500/yr </h4>
                                    <small>+ Visa fee for visa package</small>
                                </div>
                                <div class="pb-lower">
                                    <div class="pb-heading"><img src="<?php echo IMG; ?>topfeatures.svg" alt="" /></div>
                                    <ul class="check-list add-outline-icon">
                                        <li>Shareholder presence Not Required.</li>
                                        <li>100% Foreign Ownership.</li>
                                        <li>Select any business activities from the list.</li>
                                        <li>Dedicated Client Manager.</li>
                                        <li>Low Service Fees.</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="price-footer">
                                <a href="#!" class="btn btn-outline btn-block btn-lg">Choose Plan</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="pricing-box d-flex flex-column">
                            <div class="price-head">
                                <div class="purple-text"> The Skilled Entrepreneur </div>
                                <ul class="check-list">
                                    <li>Entity :<span>Free zone- OPC</span></li>
                                    <li>Emirate :<span>Ras Al Khaima</span></li>
                                    <li>Authority :<span>RAKEZ</span></li>
                                    <li>Visa Eligibility :<span>One</span></li>
                                </ul>
                            </div>
                            <div class="price-body">
                                <div class="pb-upper">
                                    <h4>Total AED 12500/yr</h4>
                                    <small>+ Visa fee for visa package</small>
                                </div>
                                <div class="pb-lower">
                                    <div class="pb-heading"><img src="<?php echo IMG; ?>topfeatures.svg" alt="" /></div>
                                    <ul class="check-list add-outline-icon">
                                        <li>Shareholder presence Not Required.</li>
                                        <li>3 Year Residency Visa.</li>
                                        <li>100% Foreign Ownership.</li>
                                        <li>Select any business activities from the list.</li>
                                        <li>Dedicated Client Manager.</li>
                                        <li>Zero Service Fees.</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="price-footer">
                                <a href="#!" class="btn btn-outline btn-block btn-lg">Choose Plan</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="pricing-box d-flex flex-column">
                            <div class="price-head">
                                <div class="purple-text"> The Unstoppable </div>
                                <ul class="check-list">
                                    <li>Entity :<span>Mainland- Partnership</span></li>
                                    <li>Emirate :<span>Dubai</span></li>
                                    <li>Authority :<span>DED</span></li>
                                    <li>Visa Eligibility :<span>3</span></li>
                                </ul>
                            </div>
                            <div class="price-body">
                                <div class="pb-upper">
                                    <h4>Total AED 16999/yr</h4>
                                    <small>+ Visa fee for visa package</small>
                                </div>
                                <div class="pb-lower">
                                    <div class="pb-heading"><img src="<?php echo IMG; ?>topfeatures.svg" alt="" /></div>
                                    <ul class="check-list add-outline-icon">
                                        <li>Shareholder presence Not Required.</li>
                                        <li>3 Year Residency Visa.</li>
                                        <li>100% Foreign Ownership.</li>
                                        <li>Service/Consultancy Activities.</li>
                                        <li>Local Agent.</li>
                                        <li>Low Service Fees.</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="price-footer">
                                <a href="#!" class="btn btn-outline btn-block btn-lg">Choose Plan</a>
                            </div>
                        </div>
                    </li>
                </ul> -->
                <?php if(have_rows('pricing',13)): ?>
                <ul class="pricing-list price-slider d-flex flex-wrap">
                   <?php 
                    while(have_rows('pricing',13)): the_row(); 
                    $package_name = get_sub_field('package_name');
                    $price = get_sub_field('price');
                    $note = get_sub_field('note');
                    ?>
                    <li class="pricing-item">
                        <div class="pricing-box d-flex flex-column">
                            <div class="price-head">
                                <div class="purple-text"><?php echo $package_name; ?> </div>
                                <?php if(have_rows('packages')): ?>
                                <ul class="check-list">
                                    <?php 
                                    while(have_rows('packages')): the_row(); 
                                    $package = get_sub_field('package');
                                    echo '<li>'.$package.'</li>';
                                    endwhile;
                                    ?>
                                </ul>
                                <?php endif; ?>
                            </div>
                            <div class="price-body">
                                <div class="pb-upper">
                                    <h4>Total AED <?php echo $price; ?>/yr</h4>
                                    <small><?php echo $note; ?></small>
                                </div>
                                <div class="pb-lower">
                                    <div class="pb-heading"><img src="<?php echo IMG; ?>topfeatures.svg" alt="" /></div>
                                    <?php if(have_rows('top_features')): ?>
                                    <ul class="check-list add-outline-icon">
                                        <?php 
                                        while(have_rows('top_features')): the_row(); 
                                        $feature = get_sub_field('feature');
                                        echo '<li>'.$feature.'</li>';
                                        endwhile;
                                        ?>
                                    </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="price-footer">
                            <?php 
                            if(is_user_logged_in()):
                            ?>
                            <form method="post" action="<?php echo home_url('/dashboard/') ?>">
                                <input type="hidden" value="<?php echo $package_name; ?>" name="plan" />
                                <input type="hidden" value="<?php echo $price; ?>"  name="price" />
                                <input type="submit" value="Choose Plan" class="btn btn-purple btn-block btn-lg" />
                            </form>
                            <?php 
                            else:
                            echo '<a href="https://www.sharkup.com/register/" class="btn btn-purple btn-block btn-lg">Choose Plan</a>';
                            endif;
                            ?>
                            </div>
                        </div>
                    </li>
                   <?php endwhile; ?>
                </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!--============================== Content container End ==============================-->
<?php 
$as_sub_heading = get_field('as_sub_heading');
$as_heading = get_field('as_heading');
$as_body_text = get_field('as_body_text');
if(have_rows('as_additional_services')): 
?>
<!--============================== Content container Start ==============================-->
<div class="content-container add-service-container overflow-hidden pb-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading text-center">
                    <?php 
                    if(!empty($as_sub_heading)): echo '<h4>'.$as_sub_heading.'</h4>'; endif; 
                    if(!empty($as_heading)): echo '<h3>'.$as_heading.'</h3>'; endif;
                    if(!empty($as_body_text)): echo '<p>'.$as_body_text.'</p>'; endif;
                    ?>
                </div>
                <ul class="add-service-list d-flex flex-wrap">
                    <?php 
                    while(have_rows('as_additional_services')): the_row();
                    $icon = wp_get_attachment_image(get_sub_field('icon'),'small');
                    $heading = get_sub_field('heading');
                    $body_text = get_sub_field('body_text');
                    ?>
                    <li class="as-item">
                        <div class="as-box">
                            <?php 
                            if(!empty($icon)): echo '<div class="as-icon">'.$icon.'</div>'; endif;
                            if(!empty($heading)): echo '<h5>'.$heading.'</h5>'; endif;
                            if(!empty($body_text)): echo '<p>'.$body_text.'</p>'; endif;
                            ?> 
                        </div>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--============================== Content container End ==============================-->
<?php  
endif;
$ws_sub_heading = get_field('ws_sub_heading');
$ws_heading = get_field('ws_heading');
$ws_body_text = get_field('ws_body_text');
if(have_rows('ws_why_sharkup_list')): 
?>
<!--============================== Content container Start ==============================-->
<div class="content-container our-services-container pb-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="os-box">
                    <div class="row d-lg-flex flex-lg-wrap align-items-lg-center">
                        <div class="col-lg-4">
                            <?php 
                            if(!empty($ws_sub_heading)): echo '<h4>'.$ws_sub_heading.'</h4>'; endif; 
                            if(!empty($ws_heading)): echo '<h2>'.$ws_heading.'</h2>'; endif;
                            if(!empty($ws_body_text)): echo '<p>'.$ws_body_text.'</p>'; endif;
                            ?>
                        </div>
                        <div class="col-lg-8">
                            <ul class="services-list d-md-flex flex-md-wrap">
                                <?php 
                                while(have_rows('ws_why_sharkup_list')): the_row();
                                $icon = wp_get_attachment_image(get_sub_field('icon'),'small');
                                $heading = get_sub_field('heading');
                                $body_text = get_sub_field('body_text');
                                ?>
                                <li class="service-item">
                                    <div class="service-box">
                                        <?php 
                                        if(!empty($icon)): echo '<div class="service-icon">'.$icon.'</div>'; endif;
                                        if(!empty($heading)): echo '<h5>'.$heading.'</h5>'; endif;
                                        if(!empty($body_text)): echo '<p>'.$body_text.'</p>'; endif;
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
    </div>
</div>
<!--============================== Content container End ==============================-->
<?php 
endif; 
$test_sub_heading = get_field('test_sub_heading');
$test_heading = get_field('test_heading');
if(have_rows('test_testimonials')): 
?>
<!--============================== Content container Start ==============================-->
<div class="content-container testimonial-container pb-0 overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading text-center">
                    <?php 
                    if(!empty($test_sub_heading)): echo '<h4>'.$test_sub_heading.'</h4>'; endif; 
                    if(!empty($test_heading)): echo '<h3>'.$test_heading.'</h3>'; endif;
                    ?>
                </div>
            </div>
        </div>
        <ul class="testimonial-list d-md-flex flex-md-wrap mobile-slider">
            <?php 
            while(have_rows('test_testimonials')): the_row();
            $author_photo = wp_get_attachment_image(get_sub_field('author_photo'),'small');
            $content = get_sub_field('content');
            $author_name = get_sub_field('author_name');
            $author_position = get_sub_field('author_position');
            ?>
            <li class="testimonial-item">
                <div class="testimonial-box">
                    <?php 
                    if(!empty($content)): echo '<p>'.$content.'</p><a href="#!" class="showmore-btn">Show More</a>'; endif; 
                    ?>
                    <div class="author-desc-box">
                        <?php 
                        if(!empty($author_photo)): echo '<div class="author-img-box">'.$author_photo.'</div>'; endif;
                        if(!empty($author_name || $author_position)):
                        ?>
                        <div class="author-text-box">
                            <?php 
                            if(!empty($author_name)): echo '<h4>'.$author_name.'</h4>'; endif;
                            if(!empty($author_position)): echo '<p>'.$author_position.'</p>'; endif; 
                            ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </li>
            <?php endwhile; ?>
        </ul>
    </div>
</div>
<!--============================== Content container End ==============================-->
<?php
endif;

$news_args = array('post_type'=> 'post','post_status'=> 'publish','posts_per_page' =>4);
?>

<div class="content-container blog-list-container pb-0 overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading text-center">
                    <h4>BLOG</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="blog-list mobile-slider">
                    <?php $query = new WP_Query($news_args); 
                while($query->have_posts()) : $query->the_post(); ?>
                      <li class="blog-item">
                          <a href="<?php the_permalink(); ?>" class="blog-box link-parent">
                              <div class="blog-img"><?php the_post_thumbnail('medium_large'); ?></div>
                              <div class="blog-content"><h5><?php the_title(); ?></h5></div>
                              <div class="blog-cta"><span class="link">Read More</span></div>
                          </a>
                      </li>
                      <?php 
                endwhile;
                wp_reset_postdata();
                ?>
                  </ul>
            </div>
        </div>
    </div>
</div>

<?php
$tc_sub_heading = get_field('tc_sub_heading');
$tc_heading = get_field('tc_heading');
$tc_body_text = get_field('tc_body_text');
if(have_rows('tc_trusted_customers')): 
?>
<!--============================== Content container Start ==============================-->
<div class="content-container trusted-customer-container overflow-hidden">
    <div class="container">
        <div class="row d-lg-flex align-items-lg-center">
            <?php if(!empty($tc_sub_heading || $tc_heading || $tc_body_text)): ?>
            <div class="col-md-5">
                <div class="tc-text-box">
                    <div class="heading mb-0">
                        <?php 
                        if(!empty($tc_sub_heading)): echo '<h4>'.$tc_sub_heading.'</h4>'; endif; 
                        if(!empty($tc_heading)): echo '<h3>'.$tc_heading.'</h3>'; endif;
                        ?>
                    </div>
                    <?php if(!empty($tc_body_text)): echo '<p>'.$tc_body_text.'</p>'; endif; ?>
                </div>
            </div>
            <?php endif; ?>
            <div class="col-md-7">
                <ul class="trusted-customer-list d-flex flex-wrap">
                    <?php 
                    while(have_rows('tc_trusted_customers')): the_row();
                    $logo = wp_get_attachment_image(get_sub_field('logo'),'small');
                    $url = get_sub_field('url');
                    echo '<li class="tc-item"><a href="'.$url.'" class="tc-logo" target="_blank">'.$logo.'</a></li>';
                    endwhile;
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--============================== Content container End ==============================-->
<?php 
endif;  

get_template_part('template-part/signup','cta'); 
?>
<!--============================== Content container Start ==============================-->
<div class="content-container white-bg home-query-container">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <?php echo do_shortcode('[contact-form-7 id="6" title="Contact Form"]'); ?>
            </div>
        </div>
    </div>
</div>
<!--============================== Content container End ==============================-->
<?php
get_footer();
?>