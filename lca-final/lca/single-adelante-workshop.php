<?php
/*==============================*/
// @package LCA
// @author SLICEmyPAGE
/*==============================*/
if(!defined('ABSPATH')){
    exit; // Exit if accessed directly
} 
get_header(); 



$single_workshop_heading = get_field('single_workshop_heading');
$single_workshop_short_text = get_field('single_workshop_short_text');
if(have_rows('single_workshop_tabs_content')):
?>

<!--============================== Content Container Start ==============================-->
<div class="content-container block-card-container pb-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                <div class="block-card-box d-lg-flex flex-lg-wrap">
                    <div class="block-card-left">
                        <?php 
                        if(!empty($single_workshop_heading)): echo '<h1 class="bcl-title">'.$single_workshop_heading.'</h1>'; endif;
                        if(!empty($single_workshop_short_text)): echo '<p>'.$single_workshop_short_text.'</p>'; endif;
                        ?> 
                        <ul class="nav nav-tabs custom-tab" id="navTab" role="tablist">
                            <?php 
                            while(have_rows('single_workshop_tabs_content')): the_row();
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
                            while(have_rows('single_workshop_tabs_content')): the_row();
                            $color = get_sub_field('color');
                            $heading = get_sub_field('heading');
                            $body_content = get_sub_field('body_content');
                            $index = get_row_index();
                            ?>
                            <div class="tab-pane tab-pane-<?php echo $color; ?> fade <?php if($index == 1): echo 'show active'; endif; ?>" id="pane-<?php echo $index; ?>" role="tabpanel" aria-labelledby="tab-<?php echo $index; ?>">
                                <div class="accordion-header" data-bs-toggle="collapse" data-bs-target="#Accor-<?php echo $index; ?>" aria-expanded="false">
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
$single_joinus_title = get_field('single_joinus_title');
$single_joinus_select_payment_page = get_field('single_joinus_select_payment_page');
$product = wc_get_product( $single_joinus_select_payment_page );
?>
<!--============================== Content Container Start ==============================-->
<div class="cta-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                <div class="cta-box d-flex flex-wrap">
                    <?php if(!empty($single_joinus_title)): echo '<div class="cta-text-box flex-grow-1"><span class="arrow is-left"></span><h4>'.$single_joinus_title.'</h4> </div>'; endif; ?>
                    <div class="cta-btn-box1">
                        <span class="arrow is-left"></span>
                        <a href="<?php echo get_permalink( $single_joinus_select_payment_page ); ?>" class="cta-btn d-flex align-items-center justify-content-center flex-column">
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
$select_single_testimonial = get_field('select_single_testimonial');
if($select_single_testimonial):
$total_entry = count($select_single_testimonial);
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
                            foreach($select_single_testimonial as $t_id):
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