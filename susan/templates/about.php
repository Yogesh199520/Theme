<?php
/*==============================*/
// @package Susan
// @author Thinkeq
/*==============================*/
/* Template Name: About */
get_header(); 

$tc_body_text = get_field('tc_body_text');
$bd_bottom_body_text = get_field('bd_bottom_body_text');
$about_button_text = get_field('about_button_text');
$about_button_link = get_field('about_button_link');
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-inner">
                <!--============================== Hero container Start ==============================--> 
                <?php get_template_part('template-part/inner-banner'); ?>
                <!--============================== Hero container End ================================-->
                <?php if(!empty($tc_body_text)): ?>
                <!--============================== Content Start ==============================-->
                <div class="content-container pt-0 less-pad">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                            <?php echo $tc_body_text; ?>
                        </div>
                    </div>
                </div>
                <!--============================== Content End ==============================-->
                <?php 
                endif;
                if(have_rows('about_slider')): 
                ?>
                <!--============================== Content Start ==============================-->
                <div class="content-container about-gllery-container py-0">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                            <div class="about-gallery-outer">
                                <div class="about-gallery ag-slider pb-0">
                                    <?php 
                                    while(have_rows('about_slider')): the_row();
                                        $image = wp_get_attachment_image(get_sub_field('image'),'medium_large');
                                        echo '<div class="ag-slide">'.$image.'</div>'; 
                                    endwhile;
                                    ?>
                                </div>
                                <img src="<?php echo IMG.'about-van.svg'; ?>" alt="About-van" class="about-graphics">
                            </div>
                        </div>
                    </div>
                </div>
                <!--============================== Content End ==============================-->
                <?php 
                endif;
                if(!empty($bd_bottom_body_text)):
                ?>
                <!--============================== Content Start ==============================-->
                <div class="content-container less-pad">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                            <?php echo $bd_bottom_body_text; ?>
                        </div>
                    </div>
                </div>
                <!--============================== Content End ==============================-->
                <?php 
                endif;
                if(!empty($about_button_text)):
                ?>
                <!--============================== Content Start ==============================-->
                <div class="content-container about-cta-container pt-0">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="cta-content text-center">
                                <a href="<?php echo $about_button_link; ?>" class="btn btn-default"><?php echo $about_button_text; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--============================== Content End ==============================-->
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php 
get_footer(); 
?>