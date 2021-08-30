<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*=============================*/
/* Template Name: Benefits */
get_header(); 

$ben_heading = get_field('ben_heading');
if(!empty($ben_heading)):
?>
<div class="main-banner-container gradient-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 text-center os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
                <h1 class="text-uppercase"><?php echo $ben_heading; ?></h1>
            </div>
        </div>
    </div>
</div>
<?php 
endif;
if(have_rows('body_content')): 
?>
<!--============================== Content Start ==============================-->
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <ul class="new-post-list d-flex flex-wrap">
                    <?php
                    $count = null; 
                    while(have_rows('body_content')): the_row();
                    $image = wp_get_attachment_image(get_sub_field('image'),'large');
                    $heading = get_sub_field('heading');
                    $body_text = get_sub_field('body_text');
                    $button_text = get_sub_field('button_text');
                    $button_link = get_sub_field('button_link');
                    $link_url = $button_link['url'];
                    $link_text = $button_link['title'];
                    $link_target = $button_link['target'] ? $button_link['target'] : '_self';
                    ?>
                    <li class="ns-item os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                        <div class="ns-box">
                            <?php if(!empty($image)): echo '<a href="'.$link_url.'" class="ns-img">'.$image.'</a>'; endif; ?>
                            <div class="ns-content-box">
                                <?php 
                                if(!empty($heading)): echo '<h4 class="gradient-text">'.$heading.'</h4>'; endif; 
                                if(!empty($body_text)): echo '<p>'.$body_text.'</p>'; endif; 
                                if(!empty($link_text)): echo ' <a href="'.$link_url.'" target="'.$link_target.'" class="btn-hover color-1">'.$link_text.'</a>'; endif; 
                                ?>
                            </div>
                        </div>
                    </li>
                    <?php
                    if($count % 2 == 0){
                        $count = null;
                    }
                    $count = $count+2; 
                    endwhile; 
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php
endif;
get_footer(); 
?>