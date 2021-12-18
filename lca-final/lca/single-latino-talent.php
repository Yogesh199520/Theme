<?php
/*==============================*/
// @package LCA
// @author SLICEmyPAGE
/*==============================*/
if(!defined('ABSPATH')){
    exit; // Exit if accessed directly
} 
get_header(); 


$single_el_heading = get_field('single_el_heading');
$single_el_intro_heading = get_field('single_el_intro_heading');
$single_el_intro_text = get_field('single_el_intro_text');
$single_el_intro_body_content = get_field('single_el_intro_body_content');
?>
<!--============================== Content Container Start ==============================-->
<div class="content-container add-dot-list">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            <?php 
            if(!empty($single_el_heading)): echo '<div class="col-md-5"><h1 class="bcl-title">'.$single_el_heading.'</h1></div>'; endif; 
            if(!empty($single_el_intro_heading || $single_el_intro_text)):
            ?>
            <div class="col-md-7">
                <div class="text-block dark-green-bg add-left-angle-shape">
                    <?php 
                    if(!empty($single_el_intro_heading)): echo '<h4>'.$single_el_intro_heading.'</h4>'; endif; 
                    if(!empty($single_el_intro_text)): echo '<p>'.$single_el_intro_text.'</p>'; endif; 
                    ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <?php if(!empty($single_el_intro_body_content)): ?>
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            <div class="col-md-12">
                <?php echo $single_el_intro_body_content; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<!--============================== Content Container End ==============================-->
<?php 
$single_el_joinus_title = get_field('single_el_joinus_title');
$single_el_joinus_select_payment_page = get_field('single_el_joinus_select_payment_page');
$product = wc_get_product( $single_el_joinus_select_payment_page );
if(!empty($single_el_joinus_title)):
?>
<!--============================== Content Container Start ==============================-->
<div class="cta-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                <div class="cta-box green-cta-box d-flex flex-wrap">
                    <div class="cta-text-box flex-grow-1">
                        <span class="arrow is-left"></span>
                        <h4><?php echo $single_el_joinus_title; ?></h4>
                    </div>
                    <div class="cta-btn-box1">
                        <span class="arrow is-left"></span>
                        <a href="<?php echo get_permalink( $single_el_joinus_select_payment_page ); ?>" class="cta-btn d-flex align-items-center justify-content-center flex-column">
                            <p>Pay nOw</p>
                            <span>$<?php echo ($product?$product->get_price():''); ?> <img src="<?php echo IMG.'chevron-right-arrow.png'; ?>" alt="chevron-right-arrow" /></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content Container End ==============================-->
<?php 
endif;
$single_el_testimonial_slider = get_field('single_el_testimonial_slider');
if($single_el_testimonial_slider):
$total_entry = count($single_el_testimonial_slider);
?>
<!--============================== Content Container Start ==============================-->
<div class="quote-container yellow-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                <ul class="quote-list quote-slider">
                    <li class="quote-item">
                        <div class="quote-box-row d-flex">
                            <?php
                            $count = 0; 
                            foreach($single_el_testimonial_slider as $t_id):
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
get_footer(); 
?>