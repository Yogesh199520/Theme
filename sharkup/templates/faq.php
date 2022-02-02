<?php
/*==============================*/
// @package Sharkup
// @author Medical Darpan
/*==============================*/
/* Template Name: FAQ */
get_header();

get_template_part('template-part/inner-banner');
if(have_rows('faq_list')):
?>
<!--============================== Content container Start ==============================-->
<div class="content-container overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="faq-nav-box d-none d-md-block">
                    <ul class="faq-nav d-flex align-items-center flex-wrap">
                        <?php 
                        while(have_rows('faq_list')): the_row();
                        $faq_heading = get_sub_field('faq_heading'); 
                        $slug =  sanitize_title($faq_heading);
                        echo '<li><a href="#'.$slug.'" class="gray-outline-btn">'.$faq_heading.'</a></li>';
                        endwhile;
                        ?>
                    </ul>
                </div>
                <?php 
                while(have_rows('faq_list')): the_row();
                $faq_heading = get_sub_field('faq_heading'); 
                $slug =  sanitize_title($faq_heading);
                $parent_loop_index = get_row_index();
                ?>
                <div class="faq-box" id="<?php echo $slug; ?>">
                    <?php if(!empty($faq_heading)): echo '<h4>'.$faq_heading.'</h4>'; endif;  ?>
                    <div class="accordion custom-accor" id="parent-count<?php echo $parent_loop_index; ?>">
                        <?php 
                        while(have_rows('faqs')): the_row();
                        $question = get_sub_field('question'); 
                        $answer = get_sub_field('answer'); 
                        $index = get_row_index();
                        ?>
                        <div class="accordion-item">
                            <?php if(!empty($question)): ?>
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $index; ?>" aria-expanded="false" aria-controls="collapse<?php echo $index; ?>"><?php echo $question; ?></button>
                            </h2>
                            <?php 
                            endif;
                            if(!empty($answer)):
                            ?>
                            <div id="collapse<?php echo $index; ?>" class="accordion-collapse collapse" data-bs-parent="#parent-count<?php echo $parent_loop_index; ?>">
                                <div class="accordion-body">
                                    <?php echo $answer; ?>
                                </div>
                            </div>
                            <?php 
                            endif;
                            ?>
                        </div>
                        <?php 
                        endwhile;
                        ?>
                    </div>
                </div>
                <?php 
                endwhile;
                ?>
            </div>
        </div>
    </div>
</div>
<?php
endif;

get_template_part('template-part/help');

get_template_part('template-part/signup','cta');

get_footer();
?>