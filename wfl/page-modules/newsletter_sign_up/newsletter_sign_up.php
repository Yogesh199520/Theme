<?php 
$select_form = get_sub_field('select_form');
if(!empty($select_form)):
?>
<div class="content-container light-gray-bg less-pad">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 offset-xl-1">
                <?php echo do_shortcode('[contact-form-7 id="'.$select_form.'" title="Newsletter Sign-up"]'); ?>
            </div>
        </div>
    </div>
</div> 
<?php endif; ?>