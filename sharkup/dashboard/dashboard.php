<?php
/*==============================*/
// @package Sharkup
// @author Abu Omama
/*==============================*/
/* Template Name: Dashboard */
get_header();
?>
<div class="dashboard-container d-md-flex flex-wrap justify-content-between">

    <button class="navbar-toggler collapsed d-block d-xl-none" type="button" id="toggleMenu" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <img src="<?php echo IMG.'sidebar-circle-element.png';?>" class="top-image" />

    <?php get_template_part('/dashboard/sidebar');  ?>

    <?php get_template_part('dashboard/company-info'); ?>

    <div class="overlay"></div>

    <div class="close-side-menu d-block d-xl-none"><i class="fas fa-times"></i></div>
    
</div>
<?php get_footer(); ?>