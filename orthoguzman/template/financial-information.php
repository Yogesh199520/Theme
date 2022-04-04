<?php
/*==============================*/
// @package Orthoguzman
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Financial Information */

get_header();

get_template_part('template-part/inner-banner');

$financial_intro_text = get_field('financial_intro_text');
$financial_heading = get_field('financial_heading');
$financial_body_text = get_field('financial_body_text');
$financial_heading_one = get_field('financial_heading_one');
$financial_heading_two = get_field('financial_heading_two');
$financial_heading_three = get_field('financial_heading_three');
$financial_address = get_field('financial_address');
$financial_office_hours = get_field('financial_office_hours');
?>
<div id="content">
    <section class="contact-sec2">
        <div class="container">
            <?php 
            echo $financial_intro_text;
            echo '<h2>'.$financial_heading.'</h2>';
            echo $financial_body_text; 
            ?>
            <div class="row">
                <?php if(!empty($financial_address)): ?>
                <div class="col-6">
                    <?php 
                    if(!empty($financial_heading_one)): echo '<h1>'.$financial_heading_one.'</h1>'; endif; 
                    if(!empty($financial_heading_two)): echo '<h2>'.$financial_heading_two.'</h2>'; endif; 
                    if(!empty($financial_heading_three)): echo '<h2>'.$financial_heading_three.'</h2>'; endif; 
                    echo '<h4>'.$financial_address.'</h4>';
                    ?>
                </div>
                <?php 
                endif;
                if(!empty($financial_office_hours)): 
                ?>
                <div class="col-6">
                    <h2>Office Hours</h2>
                    <h3>
                        <?php echo $financial_office_hours; ?>
                    </h3>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>

<?php 
get_footer(); 
?>