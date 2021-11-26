<?php 
$padding_options = get_sub_field('padding_options');
if(have_rows('page_links')): 
?>
<div class="content-container about-detail-container <?php echo implode(' ', $padding_options); ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-12"> 
                <?php 
                while(have_rows('page_links')): the_row();
                $image_option = get_sub_field('image_option');
                $image = wp_get_attachment_image(get_sub_field('image'),'medium_large');
                $title = get_sub_field('title');
                $description = get_sub_field('description');
                $button_text = get_sub_field('button_text');
                if(have_rows('button_link')):
                    while(have_rows('button_link')): the_row();
                        if(get_row_layout() == 'page_link'):
                            $url = get_sub_field('page_link');
                            $target = "_self";
                        elseif(get_row_layout() == 'external_link'):
                            $url = get_sub_field('external_link');
                            $target = "_blank";
                        else:
                            $url = '';
                            $target = "_self";
                        endif;
                    endwhile;
                endif;
                ?>
                <div class="about-detail-box d-flex flex-wrap <?php echo 'img-'.$image_option; ?>">
                    <?php if(!empty($image)): echo '<div class="about-detail-img"><a href="'.$url.'" target="'.$target.'">'.$image.'</a></div>'; endif; ?>
                    <div class="about-detail-text">
                        <?php 
                        if(!empty($title)): echo '<h3>'.$title.'</h3>'; endif; 
                        if(!empty($description)): echo '<p>'.$description.'</p>'; endif; 
                        if(!empty($button_text)): echo '<div class="about-detail-cta"><a href="'.$url.'" " target="'.$target.'" class="btn btn-default">'.$button_text.'</a></div>'; endif;
                        ?>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>