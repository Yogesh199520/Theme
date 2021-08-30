<?php
/*==============================*/
// @package Booth Golf & Leisure
// @author ThinkEQ
/*==============================*/
/* Template Name: FAQs */

get_header();

$query = new WP_Query( array( 'post_type'=>'faq', 'nopaging'=>true ) );

if($query->have_posts()):
?>
<!--============================== Content Start ==============================-->
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="faqs-content">
                    <div class="accordion" id="faqs-accordion">
                    <?php
                    while($query->have_posts('faqs')): $query->the_post();
                        $index = $query->current_post + 1;
                    	?>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="panel-title <?php echo $index==1?'':'collapsed'; ?>" data-toggle="collapse" data-target="#collapse<?php echo $index; ?>" aria-expanded="<?php echo $index==1?'true':'false'; ?>"><?php the_title(); ?></h3>
                            </div>
                            <div id="collapse<?php echo $index; ?>" class="card-body collapse <?php echo $index==1?'show':''; ?>" data-parent="#faqs-accordion" style="">
                                <div class="card-body-content">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_query(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php
endif;

get_footer();
?>