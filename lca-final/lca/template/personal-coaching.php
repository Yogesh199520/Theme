<?php
/*==============================*/
// @package LCA
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Personal Coaching */
get_header();

$pc_banner_heading = get_field('pc_banner_heading');
$pc_banner_bg_image = wp_get_attachment_image(get_field('pc_banner_bg_image'),'large');
$pc_banner_body_text = get_field('pc_banner_body_text');
$pc_banner_button_text = get_field('pc_banner_button_text');
$pc_banner_button_link = get_field('pc_banner_button_link'); 
?>
<!--============================== Content Container Start ==============================-->
<div class="content-container i3-lca-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="i3-lca-content d-md-flex flex-md-wrap">
                    <?php if(!empty($pc_banner_bg_image)): echo '<div class="i3-lca-img-content">'.$pc_banner_bg_image.'</div>'; endif; ?>
                    <div class="i3-lca-text-content">
                        <div class="os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
                            <?php 
                            if(!empty($pc_banner_heading)): echo '<h3>'.$pc_banner_heading.'</h3>'; endif;
                            echo $pc_banner_body_text;
                            if(!empty($pc_banner_button_text)): echo '<div class="i3-lca-btn"><a href="'.$pc_banner_button_link.'" class="btn btn-white">'.$pc_banner_button_text.'</a></div>'; endif; 
                            ?>
                        </div>
                    </div>
                </div>
                <?php if(have_rows('i3_cla_content')): ?>
                <ul class="i3-grid-list d-flex flex-wrap">
                    <?php 
                    while(have_rows('i3_cla_content')): the_row();
                    $heading = get_sub_field('heading');
                    $animation_duration = ['0.3s', '0.32s', '0.34s', '0.36s', '0.38s', '0.40', '0.42s'];
                    $index = get_row_index() - 1;
                    ?>
                    <li class="i3-grid-item">
                        <div class="i3-grid-box os-animation" data-os-animation="fadeIn" data-os-animation-delay="<?php echo $animation_duration[$index]; ?>">
                            <?php 
                            if(!empty($heading)): echo '<h3>'.$heading.'</h3>'; endif;
                            if(have_rows('list_items')): 
                            ?>
                            <ul>
                                <?php 
                                while(have_rows('list_items')): the_row();
                                $list = get_sub_field('list');
                                echo '<li>'.$list.'</li>';
                                endwhile;
                                ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                    </li>
                    <?php endwhile; ?>
                </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!--============================== Content Container End ==============================-->
<?php 
if(have_rows('buttons')):
?>
<!--============================== Content Container Start ==============================-->
<div class="content-container btn-link-container pt-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                <div class="btn-link-content d-flex">
                    <?php 
                    while(have_rows('buttons')): the_row();
                    $button_text = get_sub_field('button_text');
                    if(have_rows('button_link')):
                    while(have_rows('button_link')): the_row();
                    if(get_row_layout() == 'page_link'):
                        $url = get_sub_field('page_link');
                        $target = "_self";
                    elseif(get_row_layout() == 'external_link'):
                        $url = get_sub_field('external_link');
                        $target = "_blank";
                    else:
                        $url = '';
                        $target = "_self";
                    endif;
                    endwhile;
                    endif; 
                    ?>
                    <div class="btn-link-box d-flex align-items-center">
                        <a href="<?php echo $url; ?>" target="<?php echo $target; ?>" class="btn btn-primary"><?php echo $button_text; ?></a> 
                        <img src="<?php echo IMG.'green-arrow.png'; ?>" alt="green-arrow" />
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content Container End ==============================-->
<?php
endif; 
$pc_page_heading = get_field('pc_page_heading');
$pc_page_sub_heading = get_field('pc_page_sub_heading');
$pc_page_select_coaches = get_field('pc_page_select_coaches');
$pc_page_button_text = get_field('pc_page_button_text');
$pc_page_button_link = get_field('pc_page_button_link');
if($pc_page_select_coaches):
?>
<!--============================== Content Container Start ==============================-->
<div class="content-container coach-container pt-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(!empty($pc_page_heading || $pc_page_sub_heading)): ?>
                <div class="heading text-uppercase overflow-hidden os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                    <?php 
                    if(!empty($pc_page_heading)): echo '<h3>'.$pc_page_heading.'</h3>'; endif;
                    if(!empty($pc_page_sub_heading)): echo '<h4>'.$pc_page_sub_heading.'</h4>'; endif; 
                    ?>
                </div>
                <?php endif; ?>
                <ul class="coach-list d-flex flex-wrap os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.35s">
                    <?php 
                    $count = 0;
                    foreach($pc_page_select_coaches as $cid):
                    $name = get_field('coaches_name',$cid);
                    $coaches_designation = get_field('coaches_designation',$cid);
                    $photo = wp_get_attachment_image(get_field('coaches_photo',$cid),'medium');
                    if(empty($name)):
                        $name = get_the_title($cid);
                    endif;
                    ?>
                    <li>
                        <div class="coach-box text-center" data-bs-toggle="modal" data-bs-target="#coachIntro-<?php echo $count; ?>">
                            <?php if(!empty($photo)): echo '<div class="coach-img">'.$photo.'</div>'; endif; ?>
                            <div class="coach-content">
                                <h5><?php echo $name; ?></h5>
                                <?php if(!empty($coaches_designation)): echo '<h6>'.$coaches_designation.'</h6>'; endif; ?>
                            </div>
                        </div>
                    </li>
                    <?php 
                    $count++;
                    endforeach; 
                    ?>
                </ul>
                <?php if(!empty($pc_page_button_text)): ?>
                <div class="text-center mt-5">
                    <a href="<?php echo $pc_page_button_link; ?>" class="add-arrow">
                        <span class="btn btn-primary"><?php echo $pc_page_button_text; ?></span>
                        <img src="<?php echo IMG.'green-arrow.png'; ?>" alt="green-arrow"/>
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!--============================== Content Container End ==============================-->
<?php 
endif;
$pc_page_select_testimonial = get_field('pc_page_select_testimonial');
if($pc_page_select_testimonial):
$client_name = get_field('client_name',$pc_page_select_testimonial);
$client_testimonial = get_field('client_testimonial',$pc_page_select_testimonial);
if(empty($client_name)):
    $client_name = get_the_title($pc_page_select_testimonial);
endif;
?>
<!--============================== Testimonial container Start ============================-->
<div class="testimonial-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                <div class="testimonial-inner">
                    <div class="testimonial-item">
                        <div class="testimonial-box">
                            <div class="testimonial-content text-center">
                                <?php echo $client_testimonial; ?>
                            </div>
                            <div class="author text-end">- <?php echo $client_name; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Testimonial container End ==============================-->
<?php 
endif;
$pc_page_select_coaches = get_field('pc_page_select_coaches');
if($pc_page_select_coaches):
$count = 0;
foreach($pc_page_select_coaches as $cid):
$name = get_field('coaches_name',$cid);
$coaches_designation = get_field('coaches_designation',$cid);
$coaches_body_content = get_field('coaches_body_content',$cid);
$photo = wp_get_attachment_image(get_field('coaches_photo',$cid),'medium');
if(empty($name)):
    $name = get_the_title($cid);
endif;                 
?>
<div class="modal fade coach-details-modal" id="coachIntro-<?php echo $count; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            <div class="modal-body">
                <div class="cdm-content-box" data-simplebar>
                    <div class="cdm-header d-flex flex-wrap align-items-center">
                        <?php if(!empty($photo)): echo '<div class="cdm-img-box">'.$photo.'</div>'; endif; ?>
                        <div class="cdm-text-box">
                            <h4><?php echo $name; ?></h4>
                            <?php if(!empty($coaches_designation)): echo '<p>'.$coaches_designation.'</p>'; endif; ?>
                        </div>
                    </div>
                    <?php echo $coaches_body_content; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$count++;
endforeach;  
endif;
get_footer(); 
?>