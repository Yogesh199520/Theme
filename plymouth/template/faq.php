<?php
/*==============================*/
// @package Plymouth
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Faqs */


get_header();

get_template_part('/template-part/inner-banner');

$faqsec1_heading = get_field('faqsec1_heading');
$faqsec1_intro_text = get_field('faqsec1_intro_text');
if(have_rows('faqsec1_accordion')):
?>
<section class="braces-sec1">
    <div class="container">
        <?php 
        if(!empty($faqsec1_heading)): echo '<h2 class="center section-title">'.$faqsec1_heading.'</h2>'; endif;
        if(!empty($faqsec1_intro_text)): echo '<h6 class="center">'.$faqsec1_intro_text.'</h6>'; endif;
        ?>
        <div class="acc-sec">
            <div class="acc">
                <?php 
                while(have_rows('faqsec1_accordion')): the_row();
                $heading = get_sub_field('heading');
                $body_text = get_sub_field('body_text');
                ?>
                <div class="acc__card">
                    <?php 
                    if(!empty($heading)): echo '<div class="acc__title">'.$heading.'</div>'; endif;
                    if(!empty($body_text)): echo '<div class="acc__panel">'.$body_text.'</div>'; endif;
                    ?>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>
<?php
endif;
$faqsec2_heading = get_field('faqsec2_heading');
if(have_rows('faqsec2_accordion')):
?>
<section class="home-sec4 braces_sec2">
    <div class="container">
        <?php 
        if(!empty($faqsec2_heading)): echo '<h2 class="center section-title">'.$faqsec2_heading.'</h2>'; endif;
        ?>
        <div class="acc-sec">
            <div class="acc">
                <?php 
                while(have_rows('faqsec2_accordion')): the_row();
                $heading = get_sub_field('heading');
                $body_text = get_sub_field('body_text');
                ?>
                <div class="acc__card">
                    <?php 
                    if(!empty($heading)): echo '<div class="acc__title">'.$heading.'</div>'; endif;
                    if(!empty($body_text)): echo '<div class="acc__panel">'.$body_text.'</div>'; endif;
                    ?>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>
<?php
endif;
$faqsec3_heading = get_field('faqsec3_heading');
$faqsec3_intro_text = get_field('faqsec3_intro_text');
if(have_rows('faqsec3_accordion')):
?>
<section class="braces-sec1">
    <div class="container">
        <?php 
        if(!empty($faqsec3_heading)): echo '<h2 class="center section-title">'.$faqsec3_heading.'</h2>'; endif;
        if(!empty($faqsec3_intro_text)): echo '<h6 class="center">'.$faqsec3_intro_text.'</h6>'; endif;
        ?>
        <div class="acc-sec">
            <div class="acc">
            <?php 
            while(have_rows('faqsec3_accordion')): the_row();
            $heading = get_sub_field('heading');
            $body_text = get_sub_field('body_text');
            ?>
            <div class="acc__card">
                <?php 
                if(!empty($heading)): echo '<div class="acc__title">'.$heading.'</div>'; endif;
                if(!empty($body_text)): echo '<div class="acc__panel">'.$body_text.'</div>'; endif;
                ?>
            </div>
            <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>
<?php
endif;
$faqsec4_heading = get_field('faqsec4_heading');
$faqsec4_intro_text = get_field('faqsec4_intro_text');
if(have_rows('faqsec4_accordion')):
?>
<section class="home-sec4 braces_sec2">
    <div class="container">
        <?php 
        if(!empty($faqsec4_heading)): echo '<h2 class="center section-title">'.$faqsec4_heading.'</h2>'; endif;
        if(!empty($faqsec4_intro_text)): echo '<h6 class="center">'.$faqsec4_intro_text.'</h6>'; endif;
        ?>
        <div class="acc-sec">
            <div class="acc">
            <?php 
            while(have_rows('faqsec4_accordion')): the_row();
            $heading = get_sub_field('heading');
            $body_text = get_sub_field('body_text');
            ?>
            <div class="acc__card">
                <?php 
                if(!empty($heading)): echo '<div class="acc__title">'.$heading.'</div>'; endif;
                if(!empty($body_text)): echo '<div class="acc__panel">'.$body_text.'</div>'; endif;
                ?>
            </div>
            <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>

<?php
endif;

get_footer(); 
?>