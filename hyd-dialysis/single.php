<?php
/*==============================*/
// @package HYD
// @author SLICEmyPAGE
/*==============================*/
if(!defined('ABSPATH')){
    exit; // Exit if accessed directly
} 
get_header(); 

$pmid = get_field('pmid');
$pmcid = get_field('pmcid');
$doi = get_field('doi');
$author = get_field('author');
?>
<!--============================== Content Start ==============================-->
<div class="content-container individual-publications individual-events-container">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-lg-12">
                <div class="ie-heading">
                    <h5><?php the_title(); ?></h5>
                    <?php 
                    if(!empty($pmid)): echo '<span>PMID: '.$pmid.'</span> <br>'; endif; 
                    if(!empty($pmcid)): echo '<span>PMCID: '.$pmcid.'</span> <br>'; endif;
                    if(!empty($doi)): echo '<span>DOI: '.$doi.'</span>'; endif;
                    ?>
                </div>
                <div class="se-desc">
                   <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php 
get_footer();
?>