<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: About */
get_header();

$who_heading = get_field('who_heading');
$who_text = get_field('who_text');
$who_image = wp_get_attachment_image(get_field('who_image'),'large');
if(!empty($who_text)):
?>
<!--============================== Content Start ==============================-->
<div class="content-container gradient-bg info-container white-text">
    <div class="container">
        <div class="row align-items-lg-center">
            <div class="col-lg-5 offset-lg-1 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                <?php
                if(!empty($who_heading)): echo '<div class="heading text-center"><h5>'.$who_heading.'</h5></div>'; endif;
                echo $who_text;
                ?>
                </div>
                <?php if(!empty($who_image)): echo '<div class="col-lg-6 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.4s"><div class="thubnail-image-box border box-shadow">'.$who_image.'</div></div>'; endif; ?>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php 
endif;
if(have_rows('content')):
?>
<!--============================== Content Start ==============================-->
<div class="content-container card-block-container pb-0 overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="card-block-list d-flex flex-wrap">
                	<?php while(have_rows('content')): the_row();
                	$heading = get_sub_field('heading');
                    $image = wp_get_attachment_image(get_sub_field('image'),'large');	
                    $body_text = get_sub_field('body_text');
                    $body_text = str_replace('<ul>', '<ul class="dot-list">', $body_text);
                    $index = get_row_index();
                    if($index ==1):
                    	$cls = 'add-shape';
                    elseif($index ==2):
                    	$cls = 'add-shape small right';
                    endif;
                	?>
                    <li class="cb-item os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.<?php echo $index+2; ?>s">
                        <div class="cb-box">
                        	<?php
                            if(!empty($heading)): echo '<div class="heading gradient text-center"><h5 class="gradient-text">'.$heading.'</h5></div>'; endif;
                        	echo $body_text;
                        	if(!empty($image)): echo '<div class="cb-img-outer add-shape '.$cls.'"><div class="cb-img">'.$image.'</div></div>'; endif;
                        	?>
                        </div>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php 
endif; 
if(have_rows('organizational_chart')):
$chart_heading = get_field('chart_heading');
?>
<!--============================== Content Start ==============================-->
<!--============================== Content Start ==============================-->
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <?php if(!empty($chart_heading)): echo '<div class="heading gradient text-center os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s"><h5 class="gradient-text">'.$chart_heading.'</h5></div>'; endif; ?>
                <ul class="member-list">
                    <?php
                    $count =  0; 
                    while(have_rows('organizational_chart')): the_row();
                    $image = wp_get_attachment_image(get_sub_field('image'),'medium_large');   
                    $name = get_sub_field('name');
                    $designation = get_sub_field('designation');
                    ?>
                    <li class="member-item os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3<?php echo $count; ?>s">
                        <div class="member-box">
                            <?php if(!empty($image)): echo '<div class="member-img-box">'.$image.'</div>'; endif; ?>
                            <div class="member-text-box gradient-text">
                                <?php 
                                if(!empty($name)): echo '<h6 class="gradient-text">'.$name.'</h6>'; endif;
                                if(!empty($designation)): echo '<span class="v-line"></span><p>'.$designation.'</p>'; endif;  
                                ?>
                            </div>
                        </div>
                    </li>
                    <?php $count = $count+2; endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<!--============================== Content End ==============================-->
<?php
endif;
get_footer(); 
?>



