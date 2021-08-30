<?php
/*==============================*/
// @package agency
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
<?php 
$s=get_search_query();
$args = array('s' =>$s);
$the_query = new WP_Query($args);
if($the_query->have_posts()):
?>
<div class="content-container">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.2s">
            <div class="col-md-12">
                <ul class="service-list">
                    <?php while($the_query->have_posts()): $the_query->the_post(); ?>
                    <li>
                        <div class="service-box">
                            <h4><?php the_title(); ?></h4>
                            <a href="<?php the_permalink(); ?>" class="link">Read more</a>
                        </div>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
<div class="content-container">
    <div class="container">
        <h3 style='font-weight:bold;color:#000'>Nothing Found</h3>
        <div class="">
          <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
        </div>
    </div>
</div>

<?php
endif;
get_footer(); 
?>