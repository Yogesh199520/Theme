<?php 
$heading = get_sub_field('heading');
$select_form = get_sub_field('select_form');
if(!empty($select_form)):
?>
<div class="content-container light-blue-bg">
    <div class="container os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
        <?php if(!empty($heading)): ?>
        <div class="row d-flex">
            <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                <div class="heading text-md-center">
                    <h2><?php echo $heading; ?></h2>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="row d-flex">
            <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                <?php echo do_shortcode('[contact-form-7 id="'.$select_form.'"]'); ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>