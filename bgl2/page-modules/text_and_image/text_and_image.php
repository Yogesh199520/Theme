<?php 
$padding_options = get_sub_field('padding_options');
if(have_rows('sections')): 
?>
<div class="content-container mob-pb-0 <?php echo implode(' ', $padding_options); ?>">
    <?php 
    while(have_rows('sections')): the_row();
    $image_option = get_sub_field('image_option');
    $image = wp_get_attachment_image(get_sub_field('image'),'large');
    $title = get_sub_field('title');
    $body_text = get_sub_field('body_text');
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
    <div class="ti-grid-container">
        <div class="container">
            <div class="row <?php if($image_option == 'left'): echo 'flex-lg-row-reverse'; endif; ?>">
                <div class="col-lg-6">
                    <div class="ti-grid-content d-flex flex-column">
                        <?php 
                        if(!empty($title)): echo '<h3>'.$title.'</h3>'; endif; 
                        echo $body_text; 
                        if(!empty($button_text)): echo '<div class="ti-grid-cta"><a href="'.$url.'" target="'.$target.'" class="btn btn-primary2">'.$button_text.'</a></div>'; endif; 
                        ?>
                    </div>
                </div>
                <?php if(!empty($image)): echo '<div class="col-lg-6"><div class="ti-grid-img">'.$image.'</div></div>'; endif; ?>
                
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>
<?php endif; ?>