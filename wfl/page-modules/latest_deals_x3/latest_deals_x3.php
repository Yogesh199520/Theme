<?php 
$padding_options = get_sub_field('padding_options');
$title = get_sub_field('title');
$select_deals = get_sub_field('select_deals');
if(!empty($select_deals)):
?>
<div class="content-container <?php echo implode(' ', $padding_options); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <?php if(!empty($title)): echo '<div class="heading text-center more-mar"><h2>'.$title.'</h2></div>'; endif; ?>
                <ul class="latest-deals-list d-flex flex-wrap">
                    <?php  
                    foreach($select_deals as $deal_id):
                    ?>
                     <li class="latest-deal-item">
                        <a href="<?php echo get_the_permalink($deal_id); ?>" class="latest-deal-box read-more-btn-parent">
                            <div class="latest-deal-img">
                                <?php echo get_the_post_thumbnail($deal_id, 'medium'); ?>
                            </div>
                            <div class="latest-deal-text">
                                <?php echo get_the_excerpt($deal_id); ?>
                            </div>
                            <div class="latest-deal-cta">
                                <span class="read-more-btn">READ MORE <img src="<?php echo IMG.'arrow-right.svg'; ?>" alt="arrow-right"></span>
                            </div>
                        </a>
                    </li> 
                    <?php endforeach; ?>
                </ul>
                <div class="view-all text-center">
                    <a href="<?php echo site_url('/blog/'); ?>" class="btn btn-default btn-lg">VIEW ALL DEALS</a>
                </div>
            </div>
        </div>
    </div>
</div> 
<?php endif; ?>