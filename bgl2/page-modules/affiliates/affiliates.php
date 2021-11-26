<?php 
$padding_options = get_sub_field('padding_options');
if(have_rows('affiliates')): 
?>
<div class="content-container <?php echo implode(' ', $padding_options); ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="affiliates-list d-flex flex-wrap">
                    <?php 
                    while(have_rows('affiliates')): the_row();
                    $logo = wp_get_attachment_image(get_sub_field('logo'),'medium');
                    $title = get_sub_field('title');
                    $body_text = get_sub_field('body_text');
                    if(have_rows('link')):
                        while(have_rows('link')): the_row();
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
                    <li class="affiliates-item">
                        <a href="<?php echo $url; ?>" target="<?php echo $target; ?>" class="affiliates-box">
                            <?php 
                            if(!empty($logo)): echo '<div class="affiliates-icon">'.$logo.'</div>'; endif;
                            if(!empty($title || $body_text)):
                            ?>
                            <div class="affiliates-content">
                                <?php 
                                if(!empty($title)): echo '<h6>'.$title.'</h6>'; endif; 
                                echo $body_text;
                                ?>
                            </div>
                            <?php endif; ?>
                        </a>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>