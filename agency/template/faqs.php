<?php
/*==============================*/
// @package agency
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: FAQ */

get_header();
get_template_part('template-part/inner-banner');
if(have_rows('faqs')):
?>	
<div class="content-container">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.2s">
            <div class="col-md-10 offset-md-1">
                <?php 
                while(have_rows('faqs') ): the_row();
                $heading = get_sub_field('heading');
                ?>
                <div class="faq-container">
                    <?php 
                    if(!empty($heading)): echo '<h3>'.$heading.'</h3>'; endif;
                    if(have_rows('faqs_content')): 
                    ?>
                    <hr>
                    <ul class="faqs-list">
                    	<?php 
		                while(have_rows('faqs_content') ): the_row();
		                $question = get_sub_field('question');
		                $answer = get_sub_field('answer');
                        $content = apply_filters('the_content', $answer);
		                echo '<li>';
		                if(!empty($question)): echo '<h5>'.esc_html($question).'</h5>'; endif;
                        echo html_entity_decode(esc_html($content));
		                echo '</li>';
		            	endwhile;
		                ?>
                    </ul>
                	<?php endif; ?>
                </div>
            	<?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
<?php
endif;
get_footer();
?>