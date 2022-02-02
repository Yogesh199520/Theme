<?php
/*==============================*/
// @package Sharkup
// @author Medical Darpan
/*==============================*/

get_header();
?>
<!--============================== Content container Start ==============================-->
<div class="content-container overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
		<div class="member-box">
                <h1><?php the_title(); ?></h1>
                <?php while(have_posts()): the_post(); the_content(); endwhile; ?>
            </div>
	</div>
        </div>
    </div>
</div>
<!--============================== Content container End ==============================-->
<?php

get_template_part('template-part/signup','cta');

get_footer();

?>