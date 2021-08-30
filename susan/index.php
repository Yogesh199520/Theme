<?php
/*==============================*/
// @package SusanCalman
// @author ThinkEQ
/*==============================*/
get_header(); 
?>
<!--============================== Content Start ==============================-->
<div class="content-container pt-0">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="main-content">
                    <?php while(have_posts()): the_post(); the_title(); the_content(); endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->  
<?php 
get_footer(); 
?>