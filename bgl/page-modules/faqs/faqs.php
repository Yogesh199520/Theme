<?php
$padding_options = get_sub_field('padding_options');
if(have_rows('faqs_group')):
?>
<!--============================== Faqs Start ============================-->
<div class="content-container <?php echo implode(' ', $padding_options); ?>" id="faqs-accordion">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <!--============================== Module 1 start ============================-->
                <?php
                while(have_rows('faqs_group')): the_row();
                    $heading = get_sub_field('heading');
                    $parent_index = get_row_index();
                    ?>
                    <div class="faqs-content"> 
                        <?php if(!empty($heading)): echo '<div class="heading"><h4>'.$heading.'</h4></div>'; endif; ?>
                        <div class="accordion">
                            <?php 
                            if(have_rows('faqs')):
                                while(have_rows('faqs')): the_row();
                                ?>
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="panel-title" data-toggle="collapse" data-target="#collapse<?php echo $parent_index.''.get_row_index(); ?>" aria-expanded="<?php echo ($parent_index == 1 && get_row_index() == 1?'true':'false'); ?>"><?php the_sub_field('question'); ?></h3>
                                    </div>
                                    <div id="collapse<?php echo $parent_index.''.get_row_index(); ?>" class="card-body collapse <?php echo ($parent_index == 1 && get_row_index() == 1?'show':''); ?>" data-parent="#faqs-accordion">
                                        <div class="card-body-content">
                                            <?php the_sub_field('answer') ?>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                endwhile;
                            endif;
                            ?>
                        </div>
                    </div>
                <?php endwhile; ?>
                <!--============================== Module 1 end ============================-->
            </div>
        </div>
    </div>
</div>
<!--==============================  Faqs End ==============================-->
<?php endif; ?>