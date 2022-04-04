<?php
/*==============================*/
// @package Orthoguzman
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Treatments */

get_header();

get_template_part('template-part/inner-banner');
?>

<div id="content">
    <?php 
    $treatment_body_text = get_field('treatment_body_text');
    if(!empty($treatment_body_text)):
    ?>
    <section class="invi-sec1 pb_0">
        <div class="container">
            <h2 style="display:none;">Heading</h2>
            <?php echo $treatment_body_text; ?>
        </div>
    </section>
    <?php 
    endif;
    if(have_rows('treatments')):
    ?>
    <section class="community-sec1">
        <div class="container">
            <?php 
            $i=1; while(have_rows('treatments')): the_row();
            $image = wp_get_attachment_image(get_sub_field('image'),'medium_large');
            $heading = get_sub_field('heading');
            $body_text = get_sub_field('body_text');
            $button_text = get_sub_field('button_text');
            $button_link = get_sub_field('button_link');
            ?>
            <div class="row">
                <?php if(!empty($image)): ?>
                <div class="col-6"><div class="<?php if (($i == '5') or ($i == '10') or ($i == '11')){ echo 'no_border'; } else{ echo 'border_image';} ?>"><?php echo $image; ?></div></div>
                <?php endif; ?>
                <div class="col-6">
                    <?php 
                    if(!empty($heading)): echo '<h2>'.$heading.'</h2>'; endif;
                    echo $body_text;
                    if(!empty($button_text)): echo '<a href="'.$button_link.'" class="banner-btn">'.$button_text.'</a>'; endif;
                    ?>
                </div>
            </div>
            <?php $i++; endwhile; ?>
        </div>
    </section>
    <?php 
    endif; 
    ?>
</div>

<?php 
get_footer(); 
?>