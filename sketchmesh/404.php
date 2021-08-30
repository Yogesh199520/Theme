<?php

/*==============================*/

// @package SketchMesh

// @author SLICEmyPAGE

/*==============================*/

get_header(); $blog_id = get_option('page_for_posts'); ?>

<?php // =====================  Main Container Start  ===================== ?>

<div class="main-container">

    <?php // =====================  Content Start  ===================== ?>

    <div class="content-container">

        <div class="container">

            <div class="row">

                <div class="col-sm-12 text-center">

	            	<h1>Sorry! Page not found.</h1>

	                <h2><span>404</span></h2>

	                <h6><a href="<?php echo home_url('/'); ?>">Return Home</a></h6>

	            </div>

            </div>

        </div>

    </div>

    <?php // =====================  Content End  ===================== ?>

</div>

<?php // =====================  Main Container End  ===================== ?>

<?php get_footer(); ?>