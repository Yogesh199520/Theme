<?php
$padding_option = get_sub_field('padding_option'); 
$heading = get_sub_field('heading');
if(have_rows('accordion')):
?>
<div class="content-container grey-faq-container <?php echo implode(' ', $padding_option); ?>">
    <div class="container">
        <div class="row ">
            <div class="col-lg-10 offset-lg-1">
                <?php if(!empty($heading)): echo '<div class="heading"><h3>'.$heading.'</h3></div>'; endif; ?>
                <div class="grey-faqs-content">   
                    <div class="accordion scroll-to-accordion" id="faqs-accordion">
                        <?php while(have_rows('accordion')): the_row(); 
                        $title = get_sub_field('title');
                        $body_text = get_sub_field('body_text');
                        $icon = wp_get_attachment_image(get_sub_field('icon'),'medium');
                        $index = get_row_index();
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="panel-title" data-toggle="collapse" data-target="#collapse<?php echo $index; ?>" aria-expanded="<?php if($index == 1): echo 'true'; else: echo 'false'; endif; ?>"><?php echo $title; ?></h3>
                            </div>
                            <div id="collapse<?php echo $index; ?>" class="card-body collapse <?php if($index == 1): echo 'show'; endif; ?>" data-parent="#faqs-accordion">
                                <div class="card-body-content d-flex flex-wrap">
                                    <?php 
                                    if(!empty($icon)): echo '<div class="grey-faq-icon d-flex align-items-center">'.$icon.'</div>'; endif; 
                                    if(!empty($body_text)): echo '<div class="grey-faq-text">'.$body_text.'</div>'; endif; 
                                    ?>
                                </div>
                            </div> 
                        </div>
                        <?php endwhile; ?>
                    </div>              
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
endif;
?>