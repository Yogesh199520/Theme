<?php 
$padding_option = get_sub_field('padding_option');  
$heading = get_sub_field('heading');
if(have_rows('partners')):
?>
<div class="content-container <?php echo implode(' ', $padding_option); ?>">
    <div class="container">
        <?php if(!empty($heading)): ?>
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="heading">
                    <h3><?php echo $heading; ?></h3>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <ul class="partners-list d-flex flex-wrap partners-slider">
                    <?php 
                    while( have_rows('partners') ): the_row(); 
                    $photo = wp_get_attachment_image(get_sub_field('photo'),'medium');
                    $name = get_sub_field('name');
                    ?>
                    <li class="partners-item">
                        <div class="partner-box">
                            <?php 
                            if(!empty($photo)): echo '<div class="partner-img">'.$photo.'</div>'; endif; 
                            if(!empty($photo)): echo '<h3>'.$name.'</h3>'; endif; 
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