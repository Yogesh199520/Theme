<?php
$padding_options = get_sub_field('padding_options');
$body_text = get_sub_field('body_text');
if(!empty($body_text)):
?>
<!--============================== Full Width Text Start ============================-->
<div class="content-container <?php echo implode(' ', $padding_options); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
               <?php echo $body_text; ?>
            </div>
        </div>
    </div>
</div>
<!--============================== Full Width Text End ============================-->
<?php endif; ?>