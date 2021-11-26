<?php if(have_rows('graphic_counter')): ?>
<div class="content-container color-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12"> 
                <ul class="stats-list d-flex flex-wrap mobile-slider pb-0">
                    <?php 
                    while(have_rows('graphic_counter')): the_row();
                    $icon = wp_get_attachment_image(get_sub_field('icon'),'thumbnail');
                    $number = get_sub_field('number');
                    $text_after_number = get_sub_field('text_after_number');
                    $title = get_sub_field('title');
                    ?>
                    <li class="stats-item">
                        <div class="stats-box">
                            <?php 
                            if(!empty($icon)): echo '<div class="stats-icon">'.$icon.'</div>'; endif;
                            if(!empty($number)): ?>
                            <h3><?php echo $number; if(!empty($text_after_number)): echo '<small>'.$text_after_number.'</small>'; endif; ?></h3>
                            <?php 
                            endif; 
                            if(!empty($title)): echo '<h6>'.$title.'</h6>'; endif; 
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