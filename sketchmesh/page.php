<?php
/*==============================*/
// @package SketchMesh
// @author SLICEmyPAGE
/*==============================*/
get_header(); ?>
<?php // =====================  Content Start  ===================== ?>
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">  
                <h1><?php the_title(); ?></h1>
                <?php if(have_posts()): while(have_posts()): the_post(); the_content(); endwhile; endif; ?>
            </div>
        </div>
    </div>
</div>
<?php // =====================  Content End  ===================== ?>
<?php get_footer(); ?>