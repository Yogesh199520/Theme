<div class="col-35 blog_sidebar">
    <div class="oxy-search-form">
        <form role="search" method="get" id="searchform" class="searchform" action="#">
            <div class="searchbox">
                <label class="screen-reader-text" for="s">Search for:</label>
                <input type="text" name="s" id="s" value="<?php the_search_query(); ?>" />
                <input type="submit" id="searchsubmit" value="Search" />
            </div>
        </form>
    </div>
    <?php 
    $args = array('orderby' > 'slug','parent' => 0);
    $categories = get_categories($args); 
    if(!empty($categories)):
    ?>
    <div class="sidebox">
        <div class="categories">
            <h2>Categories</h2>
            <ul>
                <?php 
                foreach($categories as $category):
                ?>
                <li class="cat-item cat-item-6"><a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->name; ?></a> (<?php echo $category->category_count; ?>)</li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <?php 
    endif;
    $query = new WP_Query(array('post_type'=>'post','posts_per_page'=>5,'order'=>'DESC','orderby'=> 'date'));
    if(!empty($query)):
    ?>
    <div class="sidebox">
        <div class="recent_entries">
            <h2>Recent Posts</h2>
            <ul>
                <?php
                while($query->have_posts()): $query->the_post();
                ?>
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </ul>
        </div>
    </div>
    <?php 
    endif;
    $tags = get_tags(array('hide_empty' => false));
    if(!empty($tags)):
    ?>
    <div class="sidebox">
        <div class="tag_cloud">
            <h2>Tag Cloud</h2>
            <div class="tagcloud">
                <?php 
                foreach ($tags as $tag):
                $tag_link = get_tag_link($tag->term_id);
                ?>
                <a href="<?php echo $tag_link; ?>" class="tag-link"><?php echo $tag->name; ?></a>
                <?php
                endforeach;
                ?> 
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>