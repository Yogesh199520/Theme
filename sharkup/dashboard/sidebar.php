 <?php  
global $post;
$post_slug = $post->post_name;
$id = get_current_user_id();
$user = wp_get_current_user();
$display_name = $user->display_name;
$photo = get_avatar_url($id, array('size' => 450));
?>
 <div class="dashboard-left">

   
    <div class="user-box">
        <div class="user-img">
           <?php  
            if(is_user_logged_in()):
                echo '<img src="'.$photo.'" alt="'.$display_name.'"/>';
            endif;
            ?>
            
        </div>
        <?php  
        if(is_user_logged_in()):
            echo '<h3>Hello, '.$display_name.'</h3>';
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
                <a href="<?php echo site_url('/dashboard/documents/'); ?>">
                    <i class="fas fa-paste"></i>
                    <span>Documents</span>
                </a>
            </li>
            <li <?php if($post_slug =='enquiry'): echo 'class="active"'; endif; ?>>
                <a href="<?php echo site_url('/dashboard/enquiry/'); ?>">
                    <i class="far fa-question-circle"></i>
                    <span>Enquiry</span>
                </a>
            </li>
            <li <?php if($post_slug =='raise-a-ticket'): echo 'class="active"'; endif; ?>>
                <a href="<?php echo site_url('/dashboard/raise-a-ticket/'); ?>">
                    <i class="fas fa-ticket-alt"></i>
                    <span>Raise a ticket</span>
                </a>
            </li>
            <li <?php if($post_slug =='profile'): echo 'class="active"'; endif; ?>>
                <a href="<?php echo site_url('/profile/'); ?>">
                    <i class="fas fa-ticket-alt"></i>
                    <span>Profile</span>
                </a>
            </li>
        </ul>
    </div>
</div>