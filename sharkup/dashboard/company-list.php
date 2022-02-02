<?php
/*==============================*/
// @package Sharkup
// @author Medical Darpan
/*==============================*/
/* Template Name: Company List */
get_header();

?>
<div class="dashboard-container d-md-flex flex-wrap justify-content-between">

    <button class="navbar-toggler collapsed d-block d-xl-none" type="button" id="toggleMenu" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <img src="<?php echo IMG.'sidebar-circle-element.png';?>" class="top-image" />
    <!-- <img src="<?php echo IMG.'sidebar-bottom.png'; ?>" class="bottom-image" /> -->
    <?php 
    get_template_part('/template-part/sidebar');
    $user_id = get_current_user_id();
    $args = array( 'post_type'=>'company-registration', 'post_status'=>array('publish'), 'posts_per_page'=>-1, 'author'=>$user_id );        
    $wp_query = new WP_Query($args);
    if($wp_query->have_posts()):  
    ?>
    <div class="dashboard-right">
        <div class="container-fluid">
            <div class="row">
	            <div class="col-md-12">
					<h1>Company List</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Company Name</th>
                                <th scope="col">Publish Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while($wp_query->have_posts()): $wp_query->the_post();
                            ?>
                            <tr>
                                <td><?php the_title(); ?></td>
                                <td><?php echo get_the_date('d-m-Y'); ?></td>
                            </tr>
                            <?php 
                            endwhile; 
                            ?>
                        </tbody>
                    </table>
				</div>
			</div>
        </div>
    </div>
    <div class="overlay"></div>
    <?php endif; ?>
    <div class="close-side-menu d-block d-xl-none"><i class="fas fa-times"></i></div>
</div>
<?php 
get_footer();
?>



