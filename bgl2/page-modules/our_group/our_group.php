<?php 
$heading = get_sub_field('heading');
if(have_rows('group_list')): 
?>
<div class="content-container our-group-container color-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(!empty($heading)): echo '<div class="heading text-center light-green"><h3>'.$heading.'</h3></div>'; endif; ?>
                <ul class="our-group-list d-flex flex-wrap">
                    <?php 
                    while(have_rows('group_list')): the_row();
                    $logo = wp_get_attachment_image(get_sub_field('logo'),'medium');
                    $title = get_sub_field('title');
                    $short_text = get_sub_field('short_text');
                    $link = get_sub_field('link');
                    ?>
                    <li class="our-group-item">
                        <div class="our-group-box">
                            <?php 
                            if(!empty($logo)): echo '<a href="'.$link.'" target="_blank" class="our-group-icon-box"><span class="our-group-icon">'.$logo.'</span></a>'; endif; 
                            if(!empty($title)): echo '<h6>'.$title.'</h6>'; endif; 
                            if(!empty($short_text)): echo '<p>'.$short_text.'</p>'; endif; 
                            ?>
                        </div>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>