 <?php  
global $post;
$post_slug = $post->post_name;
$id = get_current_user_id();
$user = wp_get_current_user();
$display_name = $user->display_name;
$photo = get_avatar_url($id, array('size' => 450));
?>
 <div class="dashboard-left">

        <!-- new dashboard start -->
        <div class="user-box">
            <div class="user-img">
               <?php  
                if(is_user_logged_in()):
                    echo '<img src="'.$photo.'" alt="'.$display_name.'"/>';
                else:
                    echo '<i class="fas fa-user-alt"></i>';
                endif;
                ?>
                
            </div>
            <?php  
            if(is_user_logged_in()):
                echo '<h3>'.$display_name.'</h3>';
            else:
                echo '<h3>John Deo</h3>';
            endif;
            ?>
            
            <div class="user-logout-btn">
                <a href="<?php echo wp_logout_url(home_url('/')); ?>" class="btn btn-outline btn-lg">Logout</a>
            </div>
        </div>

        <div class="siderbar-menu-box">
            <ul class="sm-list">
                <li <?php if($post_slug =='dashboard'): echo 'class="active"'; endif; ?>>
                    <a href="<?php echo site_url('/dashboard/'); ?>">
                        <i class="far fa-building"></i>
                        <span>Company Info</span>
                    </a>
                </li>
                <li <?php if($post_slug =='company-list'): echo 'class="active"'; endif; ?>>
                    <a href="<?php echo site_url('/dashboard/company-list/'); ?>">
                        <i class="fas fa-paste"></i>
                        <span>Company List</span>
                    </a>
                </li>
                <li <?php if($post_slug =='documents'): echo 'class="active"'; endif; ?>>
                    <a href="<?php echo site_url('/documents/'); ?>/">
                        <i class="fas fa-paste"></i>
                        <span>Documents</span>
                    </a>
                </li>
                <li <?php if($post_slug =='enquiry'): echo 'class="active"'; endif; ?>>
                    <a href="<?php echo site_url('/enquiry/'); ?>">
                        <i class="far fa-question-circle"></i>
                        <span>Enquiry</span>
                    </a>
                </li>
                <li <?php if($post_slug =='raise-a-ticket'): echo 'class="active"'; endif; ?>>
                    <a href="<?php echo site_url('/raise-a-ticket/'); ?>">
                        <i class="fas fa-ticket-alt"></i>
                        <span>Raise a ticket</span>
                    </a>
                </li>
                <li>
                    <a href="#!">
                        <i class="fas fa-ticket-alt"></i>
                        <span>Profile</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- new dashboard end -->



        <!-- <div class="dashboard-head">
        <div class="dashboard-logo">
            <a href="index.html"><img src="https://sharkup.ghoomophiro.com/wp-content/uploads/2021/08/logo-300x64.png" alt="" /></a>
        </div>
        <h3>Draft Company</h3>
    </div>
        <div class="dashboard-menu-box">
            
        
        <ul class="nav flex-column nav-pills dashboard-nav" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <li class="nav-item">
                <a class="nav-link active" id="v-pills-info-tab" data-bs-toggle="pill" data-bs-target="#v-pills-info" role="tab" aria-controls="v-pills-info" aria-selected="true"><i class="far fa-building"></i>Company Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="v-pills-branch-tab" data-bs-toggle="pill" data-bs-target="#v-pills-branch" role="tab" aria-controls="v-pills-branch" aria-selected="true"><i class="fas fa-paste"></i>Branch</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="v-pills-members-tab" data-bs-toggle="pill" data-bs-target="#v-pills-members" role="tab" aria-controls="v-pills-members" aria-selected="true"><i class="fas fa-paste"></i>Members</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="v-pills-documents-tab" data-bs-toggle="pill" data-bs-target="#v-pills-documents" role="tab" aria-controls="v-pills-documents" aria-selected="true"><i class="fas fa-paste"></i>Documents</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="v-pills-enquiry-tab" data-bs-toggle="pill" data-bs-target="#v-pills-enquiry" role="tab" aria-controls="v-pills-enquiry" aria-selected="true"><i class="far fa-question-circle"></i>Enquiry</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="v-pills-raise-tab" data-bs-toggle="pill" data-bs-target="#v-pills-raise" role="tab" aria-controls="v-pills-raise" aria-selected="true"><i class="fas fa-ticket-alt"></i>Raise a ticket</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="v-pills-raise-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true"><i class="fas fa-ticket-alt"></i>Profile</a>
            </li>
            
        </ul>
        
        <div class="dashboard-faq">
            <h4>FAQs</h4>
            <ul class="d-faq-list">
            <?php
            $fl = true;
            while(have_rows('faq_list',19)): the_row();
            if($fl){
                $ccc = 1;
                while(have_rows('faqs')): the_row();
                $question = get_sub_field('question');
                if($ccc < 6){
                ?>
                <li class="d-faq-item">
                    <a href="<?php echo home_url('/faq/'); ?>" class="d-faq-item"><?php echo $question; ?><i class="fas fa-sort-down"></i></a>
                </li>
                <?php
                }
                $ccc++;
                endwhile;
            }
            $fl=false;
            endwhile;
            ?>
            </ul>
        </div>
    </div> -->
        </div>