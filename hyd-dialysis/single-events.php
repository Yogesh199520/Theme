<?php 
get_header(); 

?>
<!--============================== Content Start ==============================-->
<div class="content-container individual-events-container">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-lg-12">
                <div class="breadcrumb-list">
                <?php smp_breadcrumb_list(); ?>
                </div>
                <div class="ie-heading">
                    <h5><?php the_title(); ?></h5>
                   <?php 
                    $event_date = get_field('start_date');
                    $end_date = get_field('end_date');
                    $days_diff = (strtotime($end_date) - strtotime($event_date)) / (60 * 60 * 24);
                    $event = date("dS M Y", strtotime($event_date));
                    if($days_diff > 0):
                        echo ''.$event_date.' - '.$end_date .'';
                    else:
                        echo  $event_date;
                    endif;
                    ?>
                </div>
                <?php if(have_rows('kit_list')): ?>
                <ul class="individual-events-list single-events-slider">
                    <?php
                    $ID = $post->ID;
                    while(have_rows('kit_list')): the_row();
                    $kit_image = wp_get_attachment_image(get_sub_field('kit_image'),'medium');
                    ?>
                    <li class="individual-events-item">
                        <div class="individual-events-img">
                            <?php echo $kit_image; ?>
                        </div>
                    </li>
                    <?php 
                    endwhile; 
                    ?>
                </ul>
                <?php endif; ?>
                <div class="se-desc">
                   <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php 
get_footer();
?>