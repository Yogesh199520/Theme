<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Gallery */

get_header();

$args = array(
    'post_type' =>'gallary',
    'posts_per_page' =>-1,
    'order' => 'DESC',
    'orderby' => 'date'
);
$query = new WP_Query($args);
if($query->have_posts()):
?>
<!--============================== Content Start ==============================-->
<div class="content-container gallery-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="gallery-content d-flex flex-row flex-wrap">
                    <?php
                    $index = 1;
                    while($query->have_posts()): $query->the_post();
                    $featured_img = get_the_post_thumbnail(get_the_ID(),'medium_large');
                    $short_text = get_field('short_text');
                    if($index % 2 == 1 ):
                        $duration = '0.3s';
                    else :
                        $duration = '0.5s';
                    endif; 
                    ?>
                    <div class="gallery-hero-list os-animation" data-os-animation="fadeIn" data-os-animation-delay="<?php echo $duration; ?>">
                        <div class="gallery-hero-box">
                            <?php if(!empty($featured_img)): ?>
                            <div class="gallery-hero-img">
                                <div class="gallery-img-box">
                                    <?php echo $featured_img; ?>
                                </div>
                                <div class="gallery-caption">
                                    <h5><?php echo the_title(); ?></h5>
                                    <?php if(!empty($short_text)): echo '<p>'.$short_text.'</p>'; endif; ?>
                                </div>
                            </div>
                            <?php endif;
                            $items = get_field('gallery_items');
                            $size = 'medium'; 
                            $counter = 0;
                            ?>
                            <div class="gallery-thumbnails">
                                <ul class="gallery-thumbnails-list d-flex flex-row">
                                    <?
                                    foreach($items as $item ):
                                    if($counter < 2):
                                    ?>
                                    <li class="gallery-thumbnails-item">
                                        <img src="<?php echo $item['url']; ?>">
                                    </li>
                                    <?php
                                    $counter++;
                                    endif;
                                    endforeach; 
                                    ?>
                                    <li class="gallery-thumbnails-item">
                                        <a href="#gallery<?php echo $index; ?>" class="maginific-popup d-flex align-items-center justify-content-center" >
                                            <span></span>
                                        </a>
                                        <div id="gallery<?php echo $index; ?>" class="gallery-item">
                                            <?php 
                                            $items = get_field('gallery_items');
                                            $size = 'full';
                                            foreach($items as $item ):
                                            ?>
                                            <a href="<?php echo $item['url']; ?>" title="<?php echo $item['description']; ?>"></a>
                                            <?php
                                            endforeach; 
                                            ?>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php 
                    $index++;
                    endwhile; 
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php
endif;

get_footer();
?>