<?php
/*==============================*/
// @package Susan
// @author Thinkeq
/*==============================*/
/* Template Name: TV Radio */
get_header(); 

$tv_heading = get_field('tv_heading');
$tv_body_text = get_field('tv_body_text');
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-inner">
                <?php get_template_part('template-part/inner-banner'); ?>
                <!--============================== Content Start ==============================-->
                <div class="content-container pt-0">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <div class="tv-container">
                                <h4 class="text-center">ADD SLIDER HERE</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!--============================== Content End ==============================-->
                <?php if(!empty($tv_body_text)): ?>
                <!--============================== Content Start ==============================-->
                <div class="content-container pt-0">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                            <div class="main-content">
                                <?php 
                                if(!empty($tv_heading)): echo '<h4>'.$tv_heading.'</h4>'; endif; 
                                echo $tv_body_text;
                                if(have_rows('icon_list')):
                                ?>
                                <div class="icon">
                                <?php 
                                while(have_rows('icon_list')): the_row();
                                $logo = wp_get_attachment_image(get_sub_field('logo'),'thumbnail');
                                $url = get_sub_field('url');
                                echo '<a href="'.$url.'" target="_blank">'.$logo.'</a>';
                                endwhile;
                                ?>
                                </div>
                                <?php endif; ?>
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
<?php get_footer(); ?>