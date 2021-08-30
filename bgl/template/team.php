<?php
/*==============================*/
// @package Booth Golf & Leisure
// @author ThinkEQ
/*==============================*/
/* Template Name: Our Team */
get_header();

if('' !== get_post(get_the_ID())->post_content){
?>	
<!--============================== Content Start ==============================-->
<div class="content-container intro-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 text-left text-md-center">
                <?php $content = apply_filters('the_content', get_post(get_the_ID())->post_content); echo $content; ?>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php 
} 

$team_args = array('post_type'=>'member','post_status'=>'publish','tax_query'=>array(array('taxonomy'=>'member_categories','field'=>'term_id','terms'=>10)));
$team_query = new WP_Query($team_args);
if($team_query->have_posts()):
$term_name = get_term(10)->name;

?>
<!--============================== Content Start ==============================-->
<div class="content-container p-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading text-center">
                    <h3><?php echo $term_name; ?></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="member-list d-flex flex-wrap justify-content-center pb-0 member-slider full-height">
                    <?php 
                    $count = 1;
                    while($team_query->have_posts()) : $team_query->the_post();
                    $photo = wp_get_attachment_image(get_field('photo'),'medium_large');
                    $destination = get_field('destination');
                    $bio = get_field('bio');
                    $company = get_field('company');
                    ?>
                    <li class="member-item">
                        <div id="member-popup<?php echo $count; ?>" class="member-details-popup d-flex flex-wrap mfp-with-anim mfp-hide">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                                        <div class="member-popup-upper d-flex flex-wrap">
                                            <?php if(!empty($photo)): echo '<div class="member-popup-left"><div class="member-popup-img">'.$photo.'</div></div>'; endif; ?>
                                            <div class="member-popup-right">
                                                <div class="member-popup-head">
                                                    <h5><?php the_title(); ?></h5>
                                                    <?php if(!empty($destination)): echo '<h6>'.$destination.'</h6>'; endif; ?>
                                                </div>
                                                <?php if(!empty($bio)): echo '<div class="member-popup-body">'.$bio.'</div>'; endif; ?>
                                            </div>
                                        </div>
                                        <?php if(have_rows('social_links')): ?>
                                        <div class="member-popup-lower d-flex flex-wrap align-items-center">
                                            <div class="member-popup-left">
                                                <h5>Get in touch</h5>
                                            </div>
                                            <div class="member-popup-right">
                                                <ul class="member-social-links d-flex flex-wrap">
                                                    <?php
                                                    while(have_rows('social_links')): the_row();
                                                    $icon = get_sub_field('icon');
                                                    $url = get_sub_field('url');
                                                    echo '<li><a href="'.$url.'" target="_blank" rel="noopener"><i class="'.$icon.'"></i></a></li>';
                                                    endwhile; 
                                                    ?>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                         <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#member-popup<?php echo $count; ?>" class="member-box  d-flex flex-column" data-effect="mfp-zoom-in">
                            <?php if(!empty($photo)): echo '<div class="member-img">'.$photo.'</div>'; endif; ?>
                            <div class="member-details">
                                <h5><?php the_title(); ?></h5>
                                <?php if(!empty($destination)): echo '<h6>'.$destination.'</h6>'; endif; ?>
                            </div>
                        </a>
                    </li>
                    <?php 
                    $count = $count+1;
                    endwhile;
                    wp_reset_postdata(); 
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php
endif;
$aff_args = array('post_type'=>'member','post_status'=>'publish','tax_query'=>array(array('taxonomy'=>'member_categories','field'=>'term_id','terms'=>9)));
$aff_query = new WP_Query($aff_args);
if($aff_query->have_posts()):
$term_name = get_term(9)->name;
?>
<!--============================== Content Start ==============================-->
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading text-center">
                    <h3><?php echo $term_name; ?></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="member-list affiliate-member-list d-flex flex-wrap justify-content-center pb-0 member-slider full-height">
                    <?php 
                    $count = 21;
                    while($aff_query->have_posts()) : $aff_query->the_post();
                    $photo = wp_get_attachment_image(get_field('photo'),'medium_large');
                    $destination = get_field('destination');
                    $bio = get_field('bio');
                    $company = get_field('company');
                    ?>
                    <li class="member-item">
                        <div id="member-popup<?php echo $count; ?>" class="member-details-popup d-flex flex-wrap mfp-with-anim mfp-hide">
                           <div class="container">
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="member-popup-upper d-flex flex-wrap">
                                            <?php if(!empty($photo)): echo '<div class="member-popup-left"><div class="member-popup-img">'.$photo.'</div></div>'; endif; ?>
                                            <div class="member-popup-right">
                                                <div class="member-popup-head">
                                                    <h5><?php the_title(); ?><?php if(!empty($company)): echo '<span>'.$company.'</span>'; endif; ?></h5>
                                                    <?php if(!empty($destination)): echo '<h6>'.$destination.'</h6>'; endif; ?>
                                                </div>
                                                <?php if(!empty($bio)): echo '<div class="member-popup-body">'.$bio.'</div>'; endif; ?>
                                            </div>
                                        </div>
                                        <?php if(have_rows('social_links')): ?>
                                        <div class="member-popup-lower d-flex flex-wrap align-items-center">
                                            <div class="member-popup-left">
                                                <h5>Get in touch</h5>
                                            </div>
                                            <div class="member-popup-right">
                                                <ul class="member-social-links d-flex flex-wrap">
                                                   <?php
                                                    while(have_rows('social_links')): the_row();
                                                    $icon = get_sub_field('icon');
                                                    $url = get_sub_field('url');
                                                    echo '<li><a href="'.$url.'" target="_blank" rel="noopener"><i class="'.$icon.'"></i></a></li>';
                                                    endwhile; 
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                       <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#member-popup<?php echo $count; ?>" class="member-box  d-flex flex-column" data-effect="mfp-zoom-in">
                            <?php if(!empty($photo)): echo '<div class="member-img">'.$photo.'</div>'; endif; ?>
                            <div class="member-details">
                                <h5><?php the_title(); ?><?php if(!empty($company)): echo '<span>'.$company.'</span>'; endif; ?></h5>
                                <?php if(!empty($destination)): echo '<h6>'.$destination.'</h6>'; endif; ?>
                            </div>
                        </a>
                    </li>
                    <?php 
                    $count = $count+1;
                    endwhile;
                    wp_reset_postdata(); 
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