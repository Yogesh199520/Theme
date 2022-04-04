<?php 
$title = get_field('innerbanner_heading');
if(empty($title)):
    $title = get_the_title();
endif;
?>
<section class="banner-sec">
    <div class="container">
        <h1><?php echo $title; ?></h1>
    </div>
</section>