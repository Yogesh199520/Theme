<?php
$terms = get_terms(array('taxonomy'=>'expertise_categories', 'hide_empty'=>false));
if(!empty($terms) && !is_wp_error($terms)):
?>
<!--============================== content Start ============================-->
<div class="content-container expertise-signpost-container">
    <div class="container">
        <div class="row ">
            <div class="col-lg-10 offset-lg-1">
                <ul class="es-list">
                <?php
                foreach($terms as $term):
                    $img = wp_get_attachment_image(get_field('bg_image',$term),'medium_large');
                    ?>
                    <li class="es-item">
                        <a href="<?php echo esc_url(get_term_link($term)); ?>" class="es-box">
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
        </div>
    </div>
</div>
<!--==============================  content End ==============================-->
<?php endif; ?>