<div class="col-md-3 fix">
    <div class="sidebar">
        <div class="widget-box">
            <h5>Popular Posts</h5>
            <ul class="list">
                <?php echo do_shortcode('[wpp range="last7days" limit=5 order_by="views"]');?>
            </ul>
        </div>
        <?php if(is_active_sidebar('sidebar-1')): ?>
        <div class="widget-box">
            <h5>Latest Posts</h5>
            <ul class="list">
                <?php dynamic_sidebar('sidebar-1'); ?>
            </ul>
        </div>
        <?php 
        endif;
        if(is_active_sidebar('sidebar-2')):
        ?>
        <div class="widget-box">
            <h5>Tags</h5>
            <div class="tag-box"> 
                <?php dynamic_sidebar('sidebar-2'); ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>