<?php
/*==============================*/
// @package LCA
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Adalante Workshop */

get_header();


$workshop_heading = get_field('workshop_heading');
$workshop_short_text = get_field('workshop_short_text');

if(have_rows('workshop_tabs_content')):
?>

<!--============================== Content Container Start ==============================-->
<div class="content-container block-card-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                <div class="block-card-box d-lg-flex flex-lg-wrap">
                    <div class="block-card-left">
                        <?php 
                        if(!empty($workshop_heading)): echo '<h1 class="bcl-title">'.$workshop_heading.'</h1>'; endif;
                        if(!empty($workshop_short_text)): echo '<p>'.$workshop_short_text.'</p>'; endif;
                        ?> 
                        <ul class="nav nav-tabs custom-tab" id="navTab" role="tablist">
                            <?php 
                            while(have_rows('workshop_tabs_content')): the_row();
                            $color = get_sub_field('color');
                            $heading = get_sub_field('heading');
                            $intro_text = get_sub_field('intro_text');
                            $index = get_row_index();
                            ?>
                            <li class="nav-item">
                                <a class="nav-link <?php if($index == 1): echo 'active'; endif; ?> tab-<?php echo $color; ?>" id="tab-<?php echo $index; ?>" data-bs-toggle="tab" data-bs-target="#pane-<?php echo $index; ?>" type="button" role="tab" aria-controls="pane-<?php echo $index; ?>" aria-selected="<?php if($index == 1): echo 'true'; else: echo 'false'; endif; ?>">
                                    <div class="ct-box">
                                        <span class="arrow is-left"></span>
                                        <?php 
                                        if(!empty($heading)): echo '<h3>'.$heading.'</h3>'; endif;
                                        echo $intro_text; 
                                        ?>
                                    </div>
                                </a>
                            </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                    <div class="block-card-right">
                        <div class="tab-content" id="tabAccordation">
                            <?php 
                            while(have_rows('workshop_tabs_content')): the_row();
                            $color = get_sub_field('color');
                            $heading = get_sub_field('heading');
                            $body_content = get_sub_field('body_content');
                            $index = get_row_index();
                            ?>
                            <div class="tab-pane tab-pane-<?php echo $color; ?> fade <?php if($index == 1): echo 'show active'; endif; ?>" id="pane-<?php echo $index; ?>" role="tabpanel" aria-labelledby="tab-<?php echo $index; ?>">
                                <div class="accordion-header" data-bs-toggle="collapse" data-bs-target="#Accor-<?php echo $index; ?>" aria-expanded="<?php if($index == 1): echo 'true'; else: echo 'false'; endif; ?>">
                                   <?php echo $heading; ?>
                                </div>
                                <div id="Accor-<?php echo $index; ?>" class="accordion-collapse collapse <?php if($index == 1): echo 'show'; endif; ?>" data-bs-parent="#tabAccordation">
                                    <div class="accordion-body">
                                        <?php echo $body_content; ?>
                                    </div>
                                </div>
                            </div>
                           <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content Container End ==============================-->
<?php 
endif;

$process_title = get_field('process_title');
$process_heading = get_field('process_heading');
$joinus_title = get_field('joinus_title');
$webinar_sessions = get_field('webinar_sessions');
$process_image = wp_get_attachment_image(get_field('process_image'),'medium_lagre');
?>
<!--============================== Content Container Start ==============================-->
<div class="content-container i3cla-container pt-0">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            <div class="col-lg-6">
                <div class="i3cla-text-left">
                    <?php 
                    if(!empty($process_title)): echo '<h3 class="i3cla-title">'.$process_title.'</h3>'; endif; 
                    if(!empty($process_image)): echo '<div class="small-thumbnail">'.$process_image.'</div>'; endif;
                    if(!empty($process_heading)): echo '<h5 class="i3cla-sub-title">'.$process_heading.'</h5>'; endif;
                    ?>
                </div>
            </div>
            <?php
            $args = array( 'post_type'=>'adelante-workshop', 'meta_key'=>'date', 'meta_value'=>date("Ymd"), 'meta_compare'=>'>','orderby'=>'meta_value date','order'=>'ASC','posts_per_page'=>-1);
            $query = new WP_Query($args);
            if($query->have_posts()): 
            ?>
            <div class="col-lg-6">
                <div class="i3cla-text-right">
                    <?php if(!empty($joinus_title)): echo '<h3 class="i3cla-title">'.$joinus_title.'</h3>'; endif; ?>
                    <div class="i3cla-text">$495</div>
                    <ul class="i3cla-workshop-list d-flex flex-wrap">
                        <?php
                        while($query->have_posts()): $query->the_post();
                        $date = get_field('date');
                        $dateTime = DateTime::createFromFormat("Ymd", $date);
                        ?>
                        <li>
                            <a href="<?php the_permalink(); ?>" class="i3cla-link w-100"><?php echo $dateTime->format('M'); ?> <span><?php echo $dateTime->format('d'); ?></span> <?php echo $dateTime->format('D'); ?></a>
                        </li>
                       <?php endwhile;  wp_reset_postdata(); ?>
                    </ul>
                    <?php if(!empty($webinar_sessions)): echo '<p>'.$webinar_sessions.'</p>'; endif; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!--============================== Content Container End ==============================-->
<?php 
$select_slider_testimonial = get_field('select_slider_testimonial');
if($select_slider_testimonial):
$total_entry = count($select_slider_testimonial);
?>
<!--============================== Content Container Start ==============================-->
<div class="quote-container orange-bg">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            <div class="col-md-12">
                <ul class="quote-list quote-slider">
                    <li class="quote-item">
                        <div class="quote-box-row d-flex">
                            <?php
                            $count = 0; 
                            foreach($select_slider_testimonial as $t_id):
                            $client_name = get_field('client_name',$t_id);
                            $client_testimonial = get_field('client_testimonial',$t_id);
                            if(empty($client_name)):
                                $client_name = get_the_title($t_id);
                            endif;
                            ?>
                            <div class="quote-box-column">
                                <div class="quote-box position-relative d-flex flex-column">
                                    <div class="quote-icon"><i class="fas fa-quote-left"></i></div>
                                    <p class="quote-text"><?php echo $client_testimonial; ?></p>
                                    <div class="author-name mt-auto">- <?php echo $client_name; ?></div>
                                </div>
                            </div>
                            <?php 
                            $count++;
                            if($count % 2 == 0 && $total_entry != $count): echo '</div></li><li class="quote-item"><div class="quote-box-row d-flex">'; endif; 
                            endforeach; 
                            ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--============================== Content Container End ==============================-->
<?php 
endif;
$workshop_select_testimonial = get_field('workshop_select_testimonial');
if($workshop_select_testimonial):
$client_name = get_field('client_name',$workshop_select_testimonial);
$client_testimonial = get_field('client_testimonial',$workshop_select_testimonial);
if(empty($client_name)):
    $client_name = get_the_title($workshop_select_testimonial);
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
get_footer(); 
?>