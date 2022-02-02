<?php
/*==============================*/
// @package Sharkup
// @author Medical Darpan
/*==============================*/
/* Template Name: Documents */
get_header();
?>
<div class="dashboard-container d-md-flex flex-wrap justify-content-between">
    <img src="<?php echo IMG.'sidebar-circle-element.png';?>" class="top-image" />
    <!-- <img src="<?php echo IMG.'sidebar-bottom.png'; ?>" class="bottom-image" /> -->
    <?php get_template_part('/template-part/sidebar');  ?>
    <div class="dashboard-right">
        <div class="container">
            <div class="tab-content" id="v-pills-tabContent">
               
                <?php 
                $user_id = get_current_user_id();
                $args = array('post_type'=>'documents','post_status'=>'publish','author' => $user_id);
                $query = new WP_Query($args);
                if($query->have_posts()):
                ?>
                <div class="tab-pane fade" id="v-pills-documents" role="tabpanel" aria-labelledby="v-pills-documents-tab">
                    <h1>Download Documents</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Documents names</th>
                                <th scope="col">Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while($query->have_posts()) : $query->the_post();
                            while(have_rows('documents')): the_row();
                            $document = get_sub_field('document');
                            $url = $document['url'];
                            $title = $document['title'];
                            print_r($document);
                            ?>
                            <tr>
                                <td><?php echo ucfirst($title); ?></td>
                                <td><a href="<?php echo $url; ?>" download>Download</a></td>
                            </tr>
                            <?php
                            endwhile;  
                            endwhile;
                            wp_reset_postdata(); 
                            ?>
                        </tbody>
                    </table>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>


<?php

get_footer();
?>