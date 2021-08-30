<?php
/*==============================*/
// @package Agency
// @author SLICEmyPAGE
/*==============================*/

if(!defined('ABSPATH')){
    exit; // Exit if accessed directly
}
get_header();
?>
<div class="inner-banner" style="background-image: url(<?php echo IMG.'search.jpg'; ?>)">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <?php if(function_exists('bcn_display')){bcn_display();} ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="content-container color-bg">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.2s">
			<?php woocommerce_content(); ?>
		</div>
	</div>
</div>
<?php
get_footer(); 
?>