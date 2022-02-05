<?php 
$select_testimonials = get_sub_field('select_testimonials');
$testimonials_len = count($select_testimonials);
if($select_testimonials && $testimonials_len == 1):
$testimonial_text = get_field('testimonial_text',$select_testimonials[0]);
$testimonial_by = get_field('testimonial_by',$select_testimonials[0]);
if(empty($testimonial_by)):
    $testimonial_by = get_the_title($select_testimonials[0]);
endif;
?>
<!--==============================  Testimonials Start ============================-->
<div class="content-container testimonials-container light-blue-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-11 offset-lg-1">
                <div class="testimonial-box">
                    <?php if(!empty($testimonial_text)): echo '<blockquote>'.$testimonial_text.'</blockquote>'; endif; ?>
                    <div class="quote-by"><?php echo $testimonial_by; ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Testimonials End ==============================-->
<?php 
elseif($select_testimonials && $testimonials_len > 1):
?>
<!--==============================  Testimonials Start ============================-->
<div class="content-container testimonials-container light-blue-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">
                <div class="testimonial-content">
                    <ul class="testimonial-list testimonial-slider full-height pb-0">
                        <?php  
                        foreach($select_testimonials as $testimonial_id):
                        $testimonial_text = get_field('testimonial_text',$testimonial_id);
                        $testimonial_by = get_field('testimonial_by',$testimonial_id);
                        ?>
                        <li class="testimonial-item">
                            <div class="testimonial-box-content">
                                <?php
                                if(!empty($testimonial_text)): echo '<blockquote>'.$testimonial_text.'</blockquote>'; endif;
                                echo '<div class="quote-by">'.(!empty($testimonial_by)?$testimonial_by:get_the_title($testimonial_id)).'</div>';
                                ?>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Testimonials End ==============================-->
<?php endif; ?>