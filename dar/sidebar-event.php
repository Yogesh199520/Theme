<?php
$total_event = wp_count_posts('events')->publish;
$term = get_queried_object();
$slug =  $term->slug;
$eventStatus = isset($_GET['status'])?$_GET['status']:'';
?>
<div class="cb-left os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
    <div class="cb-head">
        <h4>Categories</h4>
    </div>
    <div class="cb-body">
        <div class="accordion" id="categories">
            <div class="card">
                <div class="card-header">
                    <a href="#!" class="btn-header-link <?php if(empty($eventStatus)): echo 'collapsed'; endif; ?>" data-toggle="collapse" data-target="#cat-A" aria-expanded="true" aria-controls="cat-A">all events <span>(<?php echo $total_event ; ?>)</span></a>
                </div>
                <div id="cat-A" class="collapse <?php if(!empty($eventStatus)): echo 'show'; endif; ?>" data-parent="#categories" style="">
                    <div class="card-body">
                        <a href="<?php echo site_url('/events/?status=upcoming-events'); ?>" class="card-link <?php echo($eventStatus=='upcoming-events'?'active':''); ?>" id="upcoming-event">Upcoming <span>Events</span></a>
                        <a href="<?php echo site_url('/events/?status=past-events'); ?>" class="card-link <?php echo($eventStatus=='past-events'?'active':''); ?>" id="past-event">Past <span>Events</span></a>
                    </div>
                </div>
            </div>
            <?php
            $parent_cat_arg = array('hide_empty' => false, 'parent' =>0);
            $parent_categories = get_terms('events_category',$parent_cat_arg);
            $index = 0;
            foreach($parent_categories as $category) { 
            $child_arg = array('hide_empty' => false, 'parent' => $category->term_id,);
            $child_cat = get_terms('events_category', $child_arg);
            ?>
            <div class="card">
                <div class="card-header">
                    <a href="javascript:void(0)" class="btn-header-link collapsed" data-toggle="collapse" data-target="#cat-<?php echo $index; ?>" aria-expanded="true" aria-controls="cat-<?php echo $index; ?>"><?php echo $category->name; ?><span>(<?php echo $category->count; ?>)</span></a>
                </div>
                <div id="cat-<?php echo $index; ?>" class="collapse <?php if(!empty($slug)): echo 'show'; endif; ?>" data-parent="#categories">
                    <div class="card-body">
                        <?php foreach( $child_cat as $child_term ) {
                        $name = $child_term->slug; 
                        ?>
                        <a href="<?php echo get_category_link($child_term->term_id); ?>" class="card-link <?php if($slug == $name): echo 'active'; endif; ?>"><?php echo $child_term->name; ?><span>(<?php echo $child_term->count; ?>)</span></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php 
            $index++;
            } 
            ?>
        </div>
    </div>
</div>
