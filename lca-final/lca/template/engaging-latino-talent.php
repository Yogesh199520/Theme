<?php
/*==============================*/
// @package LCA
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Engaging Latino Talent */


get_header();

$el_intro_heading = get_field('el_intro_heading');
$el_intro_text_heading = get_field('el_intro_text_heading');
$el_intro_text = get_field('el_intro_text');
$el_intro_body_content = get_field('el_intro_body_content');
?>
<!--============================== Content Container Start ==============================-->
<div class="content-container add-dot-list">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            <?php 
            if(!empty($el_intro_heading)): echo '<div class="col-md-5"><h1 class="bcl-title">'.$el_intro_heading.'</h1></div>'; endif; 
            if(!empty($el_intro_text_heading || $el_intro_text)):
            ?>
            <div class="col-md-7">
                <div class="text-block dark-green-bg add-left-angle-shape">
                    <?php 
                    if(!empty($el_intro_text_heading)): echo '<h4>'.$el_intro_text_heading.'</h4>'; endif; 
                    if(!empty($el_intro_text)): echo '<p>'.$el_intro_text.'</p>'; endif; 
                    ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <?php if(!empty($el_intro_body_content)): ?>
        <div class="row">
            <div class="col-md-12 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                <?php echo $el_intro_body_content; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<!--============================== Content Container End ==============================-->
<?php 
$support_title = get_field('support_title');
$support_heading = get_field('support_heading');
$support_short_text = get_field('support_short_text');
$el_joinus_title = get_field('el_joinus_title');
$el_webinar_sessions = get_field('el_webinar_sessions');
?>
<!--============================== Content Container Start ==============================-->
<div class="content-container i3cla-container pt-0">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            <div class="col-lg-6">
                <div class="i3cla-text-left">
                    <?php 
                    if(!empty($support_title)): echo '<h3 class="i3cla-title">'.$support_title.'</h3>'; endif;
                    if(!empty($support_heading || $support_short_text)):
                    ?>
                    <div class="text-block dark-green-bg add-top-angle-shape">
                        <?php 
                        if(!empty($support_heading)): echo '<h4>'.$support_heading.'</h4>'; endif; 
                        if(!empty($support_short_text)): echo '<p>'.$support_short_text.'</p>'; endif; 
                        ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php
            $args = array('post_type'=> 'latino-talent', 'meta_key'=>'date', 'meta_value'=>date("Ymd"), 'meta_compare'=>'>','orderby'=>'meta_value date','order'=>'ASC','posts_per_page'=>-1);
            $talent_query = new WP_Query($args);
            if($talent_query->have_posts()): 
            ?>
            <div class="col-lg-6">
                <div class="i3cla-text-right">
                    <?php if(!empty($el_joinus_title)): echo '<h3 class="i3cla-title">'.$el_joinus_title.'</h3>'; endif; ?>
                    <div class="i3cla-text dark-green-bg">$195</div>
                    
                    <ul class="i3cla-workshop-list d-flex flex-wrap">
                        <?php
                        while($talent_query->have_posts()): $talent_query->the_post();
                        $date = get_field('date');
                        $dateTime = DateTime::createFromFormat("Ymd", $date);
                        ?>
                        <li>
                            <a href="<?php the_permalink(); ?>" class="i3cla-link w-100"><?php echo $dateTime->format('M'); ?> <span><?php echo $dateTime->format('d'); ?></span> <?php echo $dateTime->format('D'); ?></a>
                        </li>
                       <?php endwhile;  wp_reset_postdata(); ?>
                    </ul>
                    <?php if(!empty($el_webinar_sessions)): echo '<p>'.$el_webinar_sessions.'</p>'; endif; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!--============================== Content Container End ==============================-->
<?php 
$el_testimonial_slider = get_field('el_testimonial_slider');
if($el_testimonial_slider):
$total_entry = count($el_testimonial_slider);
?>
<!--============================== Content Container Start ==============================-->
<div class="quote-container dark-green-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                <ul class="quote-list quote-slider">
                    <li class="quote-item">
                        <div class="quote-box-row d-flex">
                            <?php
                            $count = 0; 
                            foreach($el_testimonial_slider as $t_id):
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
$el_select_testimonial = get_field('el_select_testimonial');
if($el_select_testimonial):
$client_name = get_field('client_name',$el_select_testimonial);
$client_testimonial = get_field('client_testimonial',$el_select_testimonial);
if(empty($client_name)):
    $client_name = get_the_title($el_select_testimonial);
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