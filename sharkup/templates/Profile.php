<?php
/*==============================*/
// @package Sharkup
// @author Medical Darpan
/*==============================*/
/* Template Name: Profile */
get_header();

?>
<div class="dashboard-container d-md-flex flex-wrap justify-content-between">

    <button class="navbar-toggler collapsed d-block d-xl-none" type="button" id="toggleMenu" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <img src="<?php echo IMG.'sidebar-circle-element.png';?>" class="top-image" />
    <!-- <img src="<?php echo IMG.'sidebar-bottom.png'; ?>" class="bottom-image" /> -->
    <?php get_template_part('/dashboard/sidebar');  ?>
    <div class="dashboard-right">
        <div class="container-fluid">
            <div class="row">
	            <div class="col-md-12">
					<h1>Profile</h1>
	                <p>What can we help with?</p>
	                <iframe src="https://www.sharkup.com/account/?cprofile=true" title="description" height="1000px" width="100%"></iframe>
				</div>
			</div>
        </div>
    </div>
    <div class="overlay"></div>
    <div class="close-side-menu d-block d-xl-none"><i class="fas fa-times"></i></div>
</div>
<?php

get_footer();

?>