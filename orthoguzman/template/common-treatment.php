<?php
/*==============================*/
// @package Orthoguzman
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Common Treatment */

get_header();

get_template_part('template-part/inner-banner');
?>
<div id="content">
    <?php 
    $common_body_text = get_field('common_body_text');
    if(!empty($common_body_text)):
    ?>
    <section class="invi-sec1 pb_0">
        <div class="container">
            <h2 style="display:none;">Heading</h2>
            <?php echo $common_body_text; ?>
        </div>
    </section>
    <?php 
    endif;
    if(have_rows('common_braces')):
    ?>
    <section class="community-sec1">
        <div class="container">
            <?php 
            while(have_rows('common_braces')): the_row();
            $image = wp_get_attachment_image(get_sub_field('image'),'medium_large');
            $heading = get_sub_field('heading');
            $body_text = get_sub_field('body_text');
            ?>
            <div class="row">
                <?php 
                if(!empty($image)): echo '<div class="col-6"><div class="border_image">'.$image.'</div></div>'; endif; 
                if(!empty($body_text)):
                ?>
                <div class="col-6">
                    <?php 
                    if(!empty($heading)): echo '<h2>'.$heading.'</h2>'; endif;
                    echo $body_text;
                    ?>
                </div>
                <?php 
                endif;
                ?>
            </div>
            <?php endwhile; ?>
        </div>
    </section>
    <?php endif; ?>
</div>

<?php 
get_footer(); 
?>