<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Events */
get_header();

$pid = get_option('page_for_posts');
$today = current_time('Y-m-d');
$start_date = get_field('start_date');
$end_date = get_field('end_date');
$bold_heading = get_field('event_bold_heading');
$normal_heading = get_field('event_normal_heading');
if(!empty($bold_heading || $normal_heading)):
?>
<!--============================== Content Start ==============================-->
<div class="content-container pb-0">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-md-12">
                <div class="heading-2 text-moon-yellow">
                    <?php 
                    if(!empty($bold_heading)):echo '<h1>'.$bold_heading.'</h1>'; endif; 
                    if(!empty($normal_heading)):echo '<h5>'.$normal_heading.'</h5>'; endif; 
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content end ==============================-->
<?php
endif; 
if(post_type_exists('events')):
$show_post = get_option('posts_per_page'); 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$today = date('Ymd');
$events_args=array(        
'post_type'  => 'events',
'posts_per_page' =>$show_post,
'paged' => $paged,     
'meta_query' => array(
    array(
        'key'       => 'end_date',
        'compare'   => '>=',
        'value'     => $today,
    )),
);    
$events = new WP_Query($events_args); 
?>
<!--============================== Content Start ==============================-->
<div class="content-container pt-0">
    <div class="container container1">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-md-10 offset-md-1">
                <ul class="events-list single d-flex flex-wrap px-0">
                    <?php while($events->have_posts()): $events->the_post(); ?>
                    <li class="events-item">
                        <a href="<?php the_permalink(); ?>" class="events-box">
                            <?php if(has_post_thumbnail()): ?>
                            <div class="events-img-box">
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <?php endif; ?>
                            <div class="events-content-inner">
                                <span><?php the_title(); ?> </span>
                                <div class="events-date">
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
                                <div class="events-btn">
                                    <span class="">know-more</span>
                                </div>

                            </div>
                        </a>
                    </li>
                    <?php 
                    wp_reset_postdata();
                    endwhile; 
                    ?>
                </ul>
                <?php
                $total_pages = $events->max_num_pages;
                if($total_pages > 1): ?>
                <div id="event-pagination">
                <?php
                    $current_page = max(1, get_query_var('paged'));
                    echo paginate_links(array(
                        'base' => get_pagenum_link(1) . '%_%',
                        'format' => 'page/%#%',
                        'current' => $current_page,
                        'total' => $total_pages,
                        'prev_text'    => __('<i class="fa fa-angle-left"></i>'),
                        'next_text'    => __('<i class="fa fa-angle-right"></i>'),
                        'type'       => 'list'
                    ));
                ?>
                </div>
                <?php 
                endif; 
                ?>     
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content end ==============================-->
<?php
endif;
get_footer();
?>