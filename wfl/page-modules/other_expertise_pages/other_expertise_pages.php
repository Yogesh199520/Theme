<?php
$obj = get_queried_object();
$terms = get_terms(array('taxonomy'=>'expertise_categories', 'hide_empty'=>false, 'exclude'=>$obj->term_id));
if(!empty($terms) && !is_wp_error($terms)):
?>
<!--============================== content Start ============================-->
<div class="content-container other-expertise-container light-gray-bg">
    <div class="container">
        <div class="row ">
            <div class="col-lg-10 offset-lg-1">
                <div class="heading text-center text-md-left">
                    <h3>Our other expertise</h3>
                </div>
                <div class="expertise-slider-content">
                    <ul class="es-list es-slider p-0 full-height">
                    <?php
                    foreach($terms as $term):
                        $img = wp_get_attachment_image(get_field('bg_image',$term),'medium_large');
                        ?>
                        <li class="es-item">
                            <a href="<?php echo esc_url(get_term_link($term)); ?>" class="es-box read-more-btn-parent">
                                <div class="es-img">
                                    <?php echo $img; ?>
                                </div>
                                <div class="es-content d-flex flex-column">
                                    <h3><?php echo $term->name; ?></h3>
                                    <p><?php echo $term->description; ?></p>
                                    <div class="es-cta mt-auto">
                                        <span class="read-more-btn white-color">READ MORE <img src="<?php echo IMG.'arrow-right.svg'; ?>" alt=""></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <?php
                    endforeach;
                    ?>
                    </ul>
                </div>
                <div class="all-expertise-btn text-right">
                    <a href="<?php echo get_permalink($GLOBALS['theme_options']['expertise_id']); ?>" class="btn btn-default">ALL EXPERTISE</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==============================  content End ==============================-->
<?php endif; ?>