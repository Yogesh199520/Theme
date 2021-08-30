<?php
/*==============================*/
// @package American Narrative
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Contact */
get_header();

$red_image = wp_get_attachment_image_url(get_field('contact_red_image'),'large');
$right_image = wp_get_attachment_image_url(get_field('contact_right_image'),'large');
$contact_title = get_field('contact_title');
?>
<!--============================== inner banner  Start ==============================-->
<div class="inner-banner-conatainer d-flex align-items-center">
    <div class="inner-banner-bg d-none d-lg-block" style="background-image: url(<?php echo $right_image; ?>);"></div>
    <div class="inner-banner-bg d-block d-lg-none" style="background-image: url(<?php echo $red_image; ?>);"></div>
    <?php if(!empty($contact_title)): ?>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 text-center">
                <h2><?php echo $contact_title; ?></h2>
            </div>
        </div>
    </div>
	<?php endif; ?>
</div>
<!--============================== inner banner  End ==============================-->
<?php
$podcast_normal_heading = get_field('contact_normal_heading');
$podcast_bold_heading = get_field('contact_bold_heading');
$podcast_contact_form = get_field('podcast_contact_form');
$maryanne_normal_heading = get_field('contact_maryanne_normal_heading');
$maryanne_bold_heading = get_field('contact_maryanne_bold_heading');
$maryanne_contact = get_field('maryanne_contact_form');
?>
<div class="content-container contact-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contact-box d-flex flex-wrap">
                    <div class="cb-left">
                        <div class="heading2">
                            <?php 
                            if(!empty($podcast_normal_heading)): echo '<h6>'.$podcast_normal_heading.'</h6>'; endif;
                            if(!empty($podcast_bold_heading)): echo '<h5>'.$podcast_bold_heading .'</h5>'; endif;
                            ?>
                        </div>
                        <div class="cb-form">
                            <?php echo do_shortcode('[contact-form-7 id="'.$podcast_contact_form.'"]'); ?>

                        </div>
                    </div>
                    <div class="cb-right">
                        <div class="cbr-form">
                            <div class="heading2">
                                <?php 
	                            if(!empty($maryanne_normal_heading)): echo '<h6>'.$maryanne_normal_heading.'</h6>'; endif;
	                            if(!empty($maryanne_bold_heading)): echo '<h5>'.$maryanne_bold_heading .'</h5>'; endif;
	                            ?>
                            </div>
                            <div class="cb-form">
                                <?php echo do_shortcode('[contact-form-7 id="'.$maryanne_contact.'"]'); ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

$API_Key    = 'AIzaSyAaFD2uvjPCzlIneJmsAXsOpClp3fc5wZY'; 
$Channel_ID = 'UCxy0-c-VIyinc6x49jkur8A'; 
$Max_Results = 10; 
 
// Get videos from channel by YouTube Data API 
$apiData = @file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$Channel_ID.'&maxResults='.$Max_Results.'&key='.$API_Key.''); 
if($apiData){ 
    $videoList = json_decode($apiData); 
}else{ 
    echo 'Invalid API key or channel ID.'; 
}
if(!empty($videoList->items)){ 
    foreach($videoList->items as $item){ 
        // Embed video 
        if(isset($item->id->videoId)){ 
            echo ' 
            <div class="yvideo-box"> 
                <iframe width="280" height="150" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="0" allowfullscreen></iframe> 
                <h4>'. $item->snippet->title .'</h4> 
            </div>'; 
        } 
    } 
}else{ 
    echo '<p class="error">'.$apiError.'</p>'; 
}

get_footer();
?>