<?php 
$padding_options = get_sub_field('padding_options');
$title = get_sub_field('title');
$intro_text = get_sub_field('intro_text');
$client = get_sub_field('client');
$location = get_sub_field('location');
$services = get_sub_field('services');

?>
<!--============================== Work Intro Start ============================-->
<div class="content-container mob-pt-0 <?php echo implode(' ', $padding_options); ?>">
    <div class="container">
        <div class="row justify-content-center align-items-center flex-column-reverse flex-lg-row">
            <?php if(!empty($title || $intro_text)): ?>
            <div class="col-xl-5 col-lg-6">
                <div class="work-intro-left">
                    <?php 
                    if(!empty($title)): echo '<h5>'.$title.'</h5>'; endif; 
                    echo $intro_text;
                    ?>     
                </div>
            </div>
            <?php 
            endif;
            if(!empty($client || $location || $services )): 
            ?>
            <div class="col-xl-5 col-lg-6">
                <div class="work-intro-right seige-bg">
                    <ul class="wir-list">
                        <?php 
                        if(!empty($client)): echo '<li><p><strong>CLIENT</strong>'.$client.'</p></li>'; endif; 
                        if(!empty($location)): echo '<li><p><strong>LOCATION</strong>'.$location.'</p>'; endif; 
                        if(!empty($services)): echo '<li><p><strong>SERVICES</strong>'.$services.'</p></li>'; endif; 
                        ?>
                    </ul>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!--==============================  Work Intro End ==============================-->