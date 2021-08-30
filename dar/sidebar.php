<?php
$term = get_queried_object();
?>
<div class="cb-left os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
    <div class="cb-head">
        <h4>Categories</h4>
    </div>
    <div class="cb-body">
        <div class="accordion" id="categories">
            <?php
            $parent_categories = get_terms('category', array('hide_empty' => false, 'parent' =>0));
            $index = 0;
            foreach($parent_categories as $category) { 
            $child_cat = get_terms('category', array('hide_empty' => false, 'parent' => $category->term_id));
            ?>
            <div class="card">
                <div class="card-header">
                    <a href="javascript:void(0)" class="btn-header-link <?php echo($term->parent == $category->term_id?'':'collapsed'); ?>" data-toggle="collapse" data-target="#cat-<?php echo $index; ?>" aria-expanded="true" aria-controls="cat-<?php echo $index; ?>"><?php echo $category->name; ?><span>(<?php echo $category->count; ?>)</span></a>
                </div>
                <div id="cat-<?php echo $index; ?>" class="collapse <?php echo($term->parent == $category->term_id?'show':''); ?>" data-parent="#categories">
                    <div class="card-body">
                        <?php foreach( $child_cat as $child_term ){ ?>
                        <a href="<?php echo get_category_link($child_term->term_id); ?>" class="card-link <?php if($term->slug == $child_term->slug): echo 'active'; endif; ?>"><?php echo $child_term->name; ?><span>(<?php echo $child_term->count; ?>)</span></a>
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