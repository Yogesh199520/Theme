<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Events */
get_header();

?>
<!--============================== Content Start ==============================-->
<div class="main-banner-container gradient-bg">
    <div class="container">
        <div class="row">
           <div class="col-md-12 text-center os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
              <h1><?php the_title(); ?></</h1>
           </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<!--============================== Content Start ==============================-->
<div class="content-container pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <ul class="new-post-list event-list three-column d-flex flex-wrap">
                    <?php
                    $today = current_time('Y-m-d');
                    $upcoming_args = array (
                        'post_type'  => 'events',
                        'posts_per_page' => -1,
                        'meta_query' => array(
                            array(
                                'key'       => 'end_date',
                                'value'     => $today,
                                'compare'   => '>',
                                'type'      => 'DATE',
                            ),
                        ),
                        'meta_key' => 'end_date',
                        'orderby'  => 'meta_value',
                        'order'    => 'ASC'
                    );
                    $upcoming_event = new WP_Query($upcoming_args);
                    while($upcoming_event->have_posts()): $upcoming_event->the_post();
                    $featured_img = get_the_post_thumbnail(get_the_ID(),'medium_large');
                    $venue = strip_tags(get_field('venue'));
                    $event_end_date = get_field('end_date', false, false);
                    $event_start_date = get_field('start_date', false, false);
                    $ts1 = strtotime($event_end_date);
                    $ts2 = strtotime($event_start_date);
                    $day_diff = $ts1 - $ts2;
                    $day_diff = round($day_diff / (60 * 60 * 24));
                    ?>
                    <li class="ns-item os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                        <div class="ns-box">
                            <!-- <?php if(!empty($featured_img)): echo '<div class="ns-img">'.$featured_img.'</div>'; endif; ?> -->
                            <a href="<?php the_permalink(); ?>" class="ns-img">
                                <?php if(!empty($featured_img)): echo $featured_img; endif; ?>
                            </a>
                            <div class="ns-content-box py-0">
                                <div class="nsc-box d-flex flex-wrap flex-column">
                                    <div class="ns-date-box">
                                        <h4><?php echo get_the_date('l'); ?></h4>
                                        <b><?php echo get_the_date('d'); ?></b>
                                        <h4><?php echo get_the_date('F, y'); ?></h4>
                                    </div>
                                    <div class="ns-text-box">
                                        <h5 class="gradient-text"><?php the_title(); ?></h5>
                                        <?php if(!empty($venue)): echo '<p>Venue: '.$venue.' <span>'.$day_diff.' day event</span></p>'; endif; ?>
                                        <a href="<?php the_permalink(); ?>" class="btn-hover color-1">Know more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php 
                    wp_reset_postdata();
                    endwhile;
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php
$obj = get_queried_object();
?>
<!--============================== Content Start ==============================-->
<div class="content-container pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <?php 
                $terms = get_terms('events_category', array('hide_empty'=>true));
                if(!empty($terms)):
                ?>
                <div class="events-filter os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                    <span class="filter-label">Completed Events</span>
                    <div class="filter-select">
                        <?php wp_dropdown_categories(array('taxonomy'=>'events_category','show_option_none'=>'All Events','class'=>'postform','value_field'=>'slug','id'=>'events-term','selected'=>$obj->slug)); ?>
                    </div>
                </div>
                <?php endif; ?>
                <ul class="new-post-list event-list three-column d-flex flex-wrap">
                    <?php 
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $today = current_time('Y-m-d');
                    $past_args = array (
                        'post_type'  => 'events',
                        'paged' => $paged, 
                        'meta_query' => array(
                            array(
                                'key'       => 'end_date',
                                'value'     => $today,
                                'compare'   => '<',
                                'type'      => 'DATE',
                            ),
                        ),
                        'meta_key' => 'end_date',
                        'orderby'  => 'meta_value',
                        'order'    => 'ASC'
                    );
                    $wp_query = new WP_Query($past_args); 
                    while($wp_query->have_posts()): $wp_query->the_post();
                    $featured_img = get_the_post_thumbnail(get_the_ID(),'medium_large');
                    $venue = strip_tags(get_field('venue'));
                    $event_end_date = get_field('end_date', false, false);
                    $event_start_date = get_field('start_date', false, false);
                    $ts1 = strtotime($event_end_date);
                    $ts2 = strtotime($event_start_date);
                    $day_diff = $ts1 - $ts2;
                    $day_diff = round($day_diff / (60 * 60 * 24));
                    ?>
                    <li class="ns-item os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                        <div class="ns-box  expire-events">
                            
                            <a href="<?php the_permalink(); ?>" class="ns-img">
                                <?php if(!empty($featured_img)): echo $featured_img; endif; ?>
                            </a>

                            <div class="ns-content-box py-0">
                                <div class="nsc-box d-flex flex-wrap flex-column">
                                    <div class="ns-date-box">
                                        <h4><?php echo get_the_date('l'); ?></h4>
                                        <b><?php echo get_the_date('d'); ?></b>
                                        <h4><?php echo get_the_date('F, y'); ?></h4>
                                    </div>
                                    <div class="ns-text-box">
                                        <h5 class="gradient-text"><?php the_title(); ?></h5>
                                        <?php if(!empty($venue)): echo '<p>Venue: '.$venue.' <span>'.$day_diff.' day event</span></p>'; endif; ?>
                                        <a href="<?php the_permalink(); ?>" class="btn-hover color-1">Know more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php 
                    wp_reset_postdata();
                    endwhile;
                    ?>
                </ul>
                <div class="pagination-container text-right">
                   <?php echo ao_wp_pagination($paged,$wp_query->max_num_pages); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!--============================== Content End ==============================-->
<?php get_footer(); ?>

