<?php 
if(is_home()): $pid = get_option('page_for_posts'); else: $pid = get_the_ID(); endif;
$page_title = get_field('page_title',$pid);
$heading = get_field('heading',$pid);
$hero_text = get_field('hero_text',$pid);
if(!empty($page_title)):
    $title = $page_title;
else:
    $title = get_the_title($pid);
endif;
?>
<!--============================== Inner Banner Start ==============================-->
<div class="inner-banner-container d-flex align-items-center justify-content-center text-center" style="background-image: url('<?php echo IMG.'contact-banner.png'; ?>');">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="inner-banner-content">
                    <h6><?php echo $page_title; ?></h6>
                    <?php 
                    if(!empty($heading)): echo '<h3>'.$heading.'</h3>'; endif; 
                    if(!empty($hero_text)): echo '<p>'.$hero_text.'</p>'; endif; 
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Inner Banner End ==============================-->