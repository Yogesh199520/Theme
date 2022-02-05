<?php 
$heading = get_sub_field('heading');
if(have_rows('partner_logos')): 
?>
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php if(!empty($heading)): echo '<div class="heading text-center"><h2>'.$heading.'</h2></div>'; endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="partner-logo-content d-flex flex-wrap">
                    <?php 
                    while(have_rows('partner_logos')): the_row();
                    $logo = wp_get_attachment_image(get_sub_field('logo'),'medium');
                    if(have_rows('link')):
                        while(have_rows('link')): the_row();
                            if(get_row_layout() == 'internal_link'):
                                $url = get_sub_field('page_link');
                                $target = "_self";
                                echo '<div class="partner-logo-box"><a href="'.$url.'" target="'.$target.'"class="partner-logo-img">'.$logo.'</a></div>';
                            elseif(get_row_layout() == 'external_link'):
                                $url = get_sub_field('url');
                                $target = "_blank";
                                echo '<div class="partner-logo-box"><a href="'.$url.'" target="'.$target.'"class="partner-logo-img">'.$logo.'</a></div>';
                            else:
                                echo '<div class="partner-logo-box">'.$logo.'</div>';
                            endif;
                        endwhile;
                    endif;
                    endwhile;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div> 
<?php endif; ?>