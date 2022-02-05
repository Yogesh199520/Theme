<?php 
$select_page_signpost = get_sub_field('select_page_signpost');
if($select_page_signpost):
?>
<div class="content-container signpost-container light-gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 offset-xl-1">
                <ul class="page-signpost-list d-flex flex-wrap page-signpost-slider">
                    <?php  
                    foreach($select_page_signpost as $signpost_id):
                    $cta_icon = wp_get_attachment_image(get_field('cta_icon',$signpost_id),'thumbnail');
                    $cta_title = get_field('cta_title',$signpost_id);
                    $cta_text = get_field('cta_text',$signpost_id);
                    ?>
                    <li class="page-signpost-item">
                        <a href="<?php echo get_permalink($signpost_id); ?>" class="page-signpost-box d-flex flex-column read-more-btn-parent">
                            <?php
                            if(!empty($cta_icon)): echo '<div class="psbox-icon">'.$cta_icon.'</div>'; endif;
                            echo '<h3>'.(!empty($cta_title)?$cta_title:get_the_title($signpost_id)).'</h3>';
                            if(!empty($cta_text)): echo '<p>'.$cta_text.'</p>'; endif;
                            ?>
                            <div class="psbox-cta mt-auto"><span class="read-more-btn">READ MORE <img src="<?php echo IMG.'arrow-right.svg'; ?>" alt="arrow-right"></span></div>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div> 
<?php 
endif;
?>