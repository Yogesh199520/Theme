<?php
/*==============================*/
// @package agency
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Service */

get_header();

get_template_part('template-part/inner-banner');
$services_colored_heading = get_field('services_colored_heading');
$services_heading = get_field('services_heading');
$services_text = get_field('services_text');
$our_service = get_field('our_service');
$args = array('post_type'=> 'services','post_status'=> 'publish','orderby'=>'publish_date','order' =>'ASC',);
$query = new WP_Query($args);
if($query->have_posts()):
?>	
<!--============================== Content Section Start ==============================-->
    <div class="content-container color-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.1s">
                        <?php 
	                    if(!empty($services_colored_heading)): echo '<h6>'.$services_colored_heading.'</h6>'; endif; 
	                    if(!empty($services_heading)): echo '<h3>'.$services_heading.'</h3>'; endif; 
	                    if(!empty($services_text)): echo '<p>'.$services_text.'</p>'; endif; 
	                    ?>
                    </div>
                </div>
            </div>
            <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.2s">
                <div class="col-md-12">
                    <ul class="service-list">
                    	<?php 
                        while($query->have_posts()) : $query->the_post();
                        $title = get_the_title();
                        $icon = get_field('icon');
                        $link = get_the_permalink();
                        $excerpt = get_the_excerpt();
                        ?>
                        <li>
                            <div class="service-box">
                                <?php 
                                if(!empty($icon)): echo '<div class="icon2">'.$icon.'</div>'; endif; 
                                if(!empty($title)): echo '<h4>'.$title.'</h4>'; endif; 
                                if(!empty($excerpt)): echo '<p>'.$excerpt.'</p>'; endif; 
                                if(!empty($link)): echo '<a href="'.$link.'" class="link">Read more</a>'; endif; 
                                ?>
                            </div>
                        </li>
                        <?php 
                        endwhile;
                        wp_reset_postdata(); 
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--============================== Content Section End ==============================-->
<?php
endif; 
get_template_part('template-part/stats'); 
get_footer(); 
?>