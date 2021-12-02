<?php
/*==============================*/
// @package LCA
// @author SLICEmyPAGE
/*==============================*/
if(!defined('ABSPATH')){
    exit; // Exit if accessed directly
} 
get_header(); 
?>
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Opps, Page not found</h2>
                <a href="<?php echo site_url(); ?>" class="btn btn-primary">Back to homepage</a>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>