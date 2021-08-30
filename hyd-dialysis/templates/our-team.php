<?php
/*==============================*/
// @package HYD
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Our Team */
get_header();
 
if(have_rows('team_members')):
$team_heading = get_field('team_heading');
$team_sub_heading = get_field('team_sub_heading');
?>
<!--============================== Content Start ==============================-->
<div class="content-container">
    <div class="container container1">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-lg-10 offset-lg-1">
                <div class="heading-2 text-blue">
                    <?php 
                    if(!empty($team_heading)): echo '<h1>'.$team_heading.'</h1>'; endif;
                    if(!empty($team_sub_heading)): echo '<h5>'.$team_sub_heading.'</h5>'; endif;
                    ?>
                </div>
                <ul class="team-list d-flex flex-wrap justify-content-between">
                    <?php
                    while(have_rows('team_members')): the_row();
                    $thumbnail = wp_get_attachment_image(get_sub_field('thumbnail'),'large');
                    $name = get_sub_field('name');
                    $designation = get_sub_field('designation');  
                    ?>
                    <li class="team-item">
                        <div class="team-box">
                        	<?php if(!empty($thumbnail)): echo '<div class="team-img">'.$thumbnail.'</div>'; endif; ?>
                            <div class="team-info">
                                <?php 
                                if(!empty($name)): echo '<h6>'.$name.'</h6>'; endif;
                                if(!empty($designation)): echo '<span>'.$designation.'</span>'; endif;
                               	?>
                            </div>
                        </div>
                    </li>
                    <?php 
                    endwhile; 
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--============================== Content end ==============================-->
<?php 
endif;
?>
<?php 
get_footer();
?>