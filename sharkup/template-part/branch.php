<?php
$user_id = get_current_user_id();
$branch_args = array('post_type'=>'branch','post_status'=>array('publish','pending'),'author' => $user_id);
$branch_query = new WP_Query($branch_args);
if($branch_query->have_posts()):
?>
    <table class="mb-5 table table-cyan table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">Branch Name</th>
                <th scope="col">Post Date</th>
                <!-- <th scope="col">Edit</th>
                <th scope="col">Delete</th> -->
            </tr>
        </thead>
        <tbody>
            <?php 
            while($branch_query->have_posts()) : $branch_query->the_post();
            $id = get_the_ID();
            ?>
            <tr>
                <td><?php the_title(); ?></td>
                <td><?php echo get_the_date('d-m-Y'); ?></td>
                <!-- <td><a href="<?php echo get_edit_post_link($id);?>">Edit</a></td> -->
               <!--  <?php if( current_user_can( 'delete_post' ) ) : ?>
                <?php $nonce = wp_create_nonce('my_delete_post_nonce') ?>
                    <td><a href="<?php echo admin_url('admin-ajax.php?action=my_delete_post&id=' . get_the_ID() . '&nonce=' . $nonce ) ?>" data-id="<?php the_ID() ?>" data-nonce="<?php echo $nonce ?>" class="delete-post">delete</a></td>
                <?php endif ?> -->
            </tr>
            <?php
            endwhile;
            wp_reset_postdata(); 
            ?>
        </tbody>
    </table>
<?php 
endif;
if($_POST['post_branch']=='Sumbit'){ ;
    echo "<meta http-equiv='refresh' content='0'>";

     // Sending email to user to ensure that his/her registration request has been send
    $current_user = wp_get_current_user();
    $email = $current_user->user_email;
    $subject = get_bloginfo('name');
    $body = 'Your branch has been saved';
    $headers = array('Content-Type: text/html; charset=UTF-8');
    wp_mail($email, $subject, $body, $headers);

    // Sending email to admin to notify new registation request
    $admin_email = get_bloginfo('admin_email');
    $subject = get_bloginfo('name');
    $body = 'New branch has been saved';
    $headers = array('Content-Type: text/html; charset=UTF-8');
    wp_mail($admin_email, $subject, $body, $headers);

    $prcompany = $_POST['prcompany'];
    $parent_company = $_POST['parent_company'];
    $en_option_one = $_POST['en_option_one'];
    $en_option_two = $_POST['en_option_two'];
    $en_option_three = $_POST['en_option_three'];
    $ar_option_one = $_POST['ar_option_one'];
    $ar_option_two = $_POST['ar_option_two'];
    $ar_option_three = $_POST['ar_option_three'];
    $franchisee_option = $_POST['franchisee_option'];
    $trade_name = $_POST['trade_name'];
    $licence_type = $_POST['licence_type'];
    $visa_package = $_POST['visa_package'];
    $activities_option_one = $_POST['activities_option_one'];
    $activities_option_two = $_POST['activities_option_two'];
    $activities_option_three = $_POST['activities_option_three'];
    $bussiness_description = $_POST['bussiness_description'];
    $shareholding_type = $_POST['shareholding_type'];
    $proposed_share_capital = $_POST['proposed_share_capital'];
    $share_value = $_POST['share_value'];
    $total_number_of_shares = $_POST['total_number_of_shares'];
   
   
    $id = wp_insert_post(
        array(
            'post_title'=>$_POST['post_title'], 
            'post_type'=>'branch', 
            'post_status' => 'pending',
            'comment_status' => 'closed',
            'ping_status' => 'closed',
            )
        );
    }

    add_post_meta($id, 'prcompany', $prcompany, true);
    add_post_meta($id, 'parent_company', $parent_company, true);
    add_post_meta($id, 'en_option_one', $en_option_one, true);
    add_post_meta($id, 'en_option_two', $en_option_two, true);
    add_post_meta($id, 'en_option_three', $en_option_three, true);
    add_post_meta($id, 'ar_option_one', $ar_option_one, true);
    add_post_meta($id, 'ar_option_two', $ar_option_two, true);
    add_post_meta($id, 'ar_option_three', $ar_option_three, true);
    add_post_meta($id, 'franchisee_option', $franchisee_option, true);
    add_post_meta($id, 'trade_name', $trade_name, true);
    add_post_meta($id, 'licence_type', $licence_type, true);
    add_post_meta($id, 'visa_package', $visa_package, true);
    add_post_meta($id, 'activities_option_one', $activities_option_one, true);
    add_post_meta($id, 'activities_option_two', $activities_option_two, true);
    add_post_meta($id, 'activities_option_three', $activities_option_three, true);
    add_post_meta($id, 'bussiness_description', $bussiness_description, true);
    add_post_meta($id, 'shareholding_type', $shareholding_type, true);
    add_post_meta($id, 'proposed_share_capital', $proposed_share_capital, true);
    add_post_meta($id, 'share_value', $share_value, true);
    add_post_meta($id, 'total_number_of_shares', $total_number_of_shares, true);

    require_once( ABSPATH . 'wp-admin/includes/image.php' );
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
    require_once( ABSPATH . 'wp-admin/includes/media.php' );

    $attach_id = media_handle_upload('documents', $id);
    if (is_numeric($attach_id)) {
        update_post_meta($id, 'documents', $attach_id);
    }
    
    
?>
<form id="registration" name="registration" method="post" action="<?php echo get_page_link('/') ?>" enctype="multipart/form-data">
   
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>COMPANY NAME(IN CASE OF BRANCH)</label>
                <input type="text" class="form-control" id="post_title" name="post_title" placeholder="COMPANY NAME(IN CASE OF BRANCH)" value="" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>COUNTRY OF REGISTRATION OF THE PARENT COMPANY</label>
                <input type="text" class="form-control" id="prcompany" name="prcompany" placeholder="COUNTRY OF REGISTRATION OF THE PARENT COMPANY" value="" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>ADDRESS OF THE PARENT COMPANY</label>
                <input type="text" class="form-control" id="parent_company" name="parent_company" placeholder="ADDRESS OF THE PARENT COMPANY" value="" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>English Company Name</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Option 1</label>
                <input type="text" class="form-control" id="en_option_one" name="en_option_one" placeholder="Option 1" value="" />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Option 2</label>
                <input type="text" class="form-control" id="en_option_two" name="en_option_two" placeholder="Option 2" />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Option 3</label>
                <input type="text" class="form-control" id="en_option_three" name="en_option_three" placeholder="Option 3" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Arabic Company Name</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Option 1</label>
                <input type="text" class="form-control" id="ar_option_one" name="ar_option_one" placeholder="Option 1" value="" />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Option 2</label>
                <input type="text" class="form-control" id="ar_option_two" name="ar_option_two" placeholder="Option 2" />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Option 3</label>
                <input type="text" class="form-control" id="ar_option_three" name="ar_option_three" placeholder="Option 3" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <p>Are you going to operate as a franchisee?</p>
                <div class="d-md-flex pl-0">
                    <div class="rdio rdio-primary radio-inline mr-4">
                        <input name="franchisee_option" class="franchisee-option" value="yes" id="label1" type="radio" />
                        <label for="label1">Yes </label>
                    </div>
                    <div class="rdio rdio-primary radio-inline mr-4">
                        <input name="franchisee_option" class="franchisee-option" value="no" id="label2" type="radio" checked/>
                        <label for="label2">No</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-none " id="trading-input">
        <div class="col-md-12">
			<div class="form-group">
			<input type="text" class="form-control" id="trade_name" name="trade_name" placeholder="If Yes' Please Input Trade Name" /></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Licence Type</label>
                <select class="form-control" id="licence_type" name="licence_type">
                    <option value="">---</option>
                    <option value="ge">Global Entrepreneur </option>
                    <option value="theUn">The Unstoppable </option>
                    <option value="theskilled">The Skilled Entrepreneur </option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Visa Package</label>
                <select class="form-control" id="visa_package" name="visa_package">
                    <option value="">---</option>
                    <option value="0">0 Visa </option>
                    <option value="1">1 </option>
                    <option value="2">2 </option>
                    <option value="3">3 </option>
                </select>
            </div>
        </div>
    </div>
    <h3>Please select up to 3 business activities.</h3>
    <p>Activity Name</p>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Option 1</label>
                <input type="text" class="form-control" id="activities_option_one" name="activities_option_one" placeholder="Option 1" />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Option 2</label>
                <input type="text" class="form-control" id="activities_option_two" name="activities_option_two" placeholder="Option 2" />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Option 3</label>
                <input type="text" class="form-control" id="activities_option_three" name="activities_option_three" placeholder="Option 3" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Bussiness Description</label>
                <textarea name="bussiness_description" class="form-control"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Shareholding Type</label>
                <select class="form-control" id="shareholding_type" name="shareholding_type">
                    <option value="">---</option>
                    <option value="mix">Mix </option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Proposed share capital</label>
                <input type="text" class="form-control" id="proposed_share_capital" name="proposed_share_capital" placeholder="Proposed share capital" value="" />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Share Value</label>
                <input type="text" class="form-control" id="share_value" name="share_value" placeholder="Share Value" />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Total Number of Shares</label>
                <input type="text" class="form-control" id="total_number_of_shares" name="total_number_of_shares" placeholder="Total Number of Shares" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Upload Documents</label>
                <input type="file" name="documents">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <input id="sumbit" class="btn-hover btn-save btn btn-outline btn-lg" type="submit" name="post_branch" value="Sumbit" />
        </div>
    </div>
        
</form>