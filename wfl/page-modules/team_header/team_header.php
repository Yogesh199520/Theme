<?php 
$icon = wp_get_attachment_image(get_sub_field('icon'),'thubmnail');
$title = get_sub_field('title');
$short_description = get_sub_field('short_description');
$obj = get_queried_object();
?>
<div class="team-hero-container d-flex flex-column justify-content-center light-gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="team-hero-content d-flex flex-wrap align-items-start">
                    <?php 
                    if(!empty($icon)): echo '<div class="team-hero-icon">'.$icon.'</div>'; endif; 
                    if(!empty($title || $short_description)):
                    ?>
                    <div class="team-hero-text">
                        <?php 
                        if(!empty($icon)): echo '<h1>'.$title.'</h1>'; endif; 
                        if(!empty($icon)): echo '<p>'.$short_description.'</p>'; endif; 
                        ?>
                    </div>
                    <?php endif; ?>
                    <div class="team-filter-box">
                        <?php wp_dropdown_categories(array('show_option_none'=>'All Team','class'=>'','value_field'=>'slug','selected'=>$obj->slug, 'taxonomy'=>'team_categories', 'id'=>'team_cat' )); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>