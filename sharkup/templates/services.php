<?php
/*==============================*/
// @package Sharkup
// @author Medical Darpan
/*==============================*/
/* Template Name: Services */
get_header();
?>
<!--============================== Content container Start ==============================-->
<div class="content-container overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(have_rows('service_category')): ?>
                <div class="filter-container d-flex align-items-center justify-content-between">
                    <h1>Our Services</h1>
                    <div class="fiter-right-box d-flex align-items-center">
                        <div class="search-box">
                            <input type="text" name="search" class="search-input" placeholder="search services">
                        </div>
                        <!-- <div class="serch-bar-box">
                            <span class="bar1"></span>
                            <span class="bar2"></span>
                            <span class="bar3"></span>
                        </div> -->
                    </div>
                </div>
                <div class="services-nav">
                    <ul class="services-nav-list d-flex flex-wrap align-items-center">
                        <?php
                        while(have_rows('service_category')): the_row();
                            $sc_title = get_sub_field('service_category_heading');
                            echo '<li><a href="#'.sanitize_title($sc_title).'" class="service-nav-link">'.$sc_title.'</a></li>';
                        endwhile;
                        ?>
                    </ul>
                </div>
                <?php while(have_rows('service_category')): the_row(); $sc_title = get_sub_field('service_category_heading'); ?>
                <div class="services-content-box" id="<?php echo sanitize_title($sc_title); ?>">
                    <h4><?php echo $sc_title; ?></h4>
                    <ul class="add-service-list add-white-bg d-flex flex-wrap">
                        <?php
                        while(have_rows('services')): the_row();
                        $icon = wp_get_attachment_image(get_sub_field('icon'),'thumbnail');
                        $heading = get_sub_field('heading');
                        $body_text = get_sub_field('body_text');
                        ?>
                        <li class="as-item">
                            <div class="as-box">
                                <?php
                                if(!empty($icon)): echo '<div class="as-icon">'.$icon.'</div>'; endif;
                                if(!empty($heading)): echo '<h5>'.$heading.'</h5>'; endif;
                                echo $body_text;
                                ?>
                            </div>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
                <?php endwhile; ?>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!--============================== Content container End ==============================-->
<?php

get_template_part('template-part/signup','cta');

get_footer();
?>