<?php
$user_id = get_current_user_id();
$branch_args = array('post_type'=>'member','post_status'=>array('publish','pending'),'author' => $user_id);
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
if($_POST['post_member']=='Sumbit'){ ;
echo "<meta http-equiv='refresh' content='0'>";

 // Sending email to user to ensure that his/her registration request has been send
$current_user = wp_get_current_user();
$email = $current_user->user_email;
$subject = get_bloginfo('name');
$body = 'You are registered';
$headers = array('Content-Type: text/html; charset=UTF-8');
wp_mail($email, $subject, $body, $headers);

// Sending email to admin to notify new registation request
$admin_email = get_bloginfo('admin_email');
$subject = get_bloginfo('name');
$body = 'New Member registered';
$headers = array('Content-Type: text/html; charset=UTF-8');
wp_mail($admin_email, $subject, $body, $headers);

$role = $_POST['role'];
$middle_name = $_POST['middle_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];
$salutation = $_POST['salutation'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$mobile_phone = $_POST['mobile_phone'];
$passport_number = $_POST['passport_number'];
$country_of_birth = $_POST['country_of_birth'];
$date_of_birth = $_POST['date_of_birth'];
$current_nationality = $_POST['current_nationality'];
$previous_nationality_if_applicable = $_POST['previous_nationality_if_applicable'];
$is_resident_of_uae = $_POST['is_resident_of_uae'];
$visited_5year = $_POST['visited_5year'];
$uid_number = $_POST['uid_number'];
$address_line_1 = $_POST['address_line_1'];
$address_line_2 = $_POST['address_line_2'];
$po_box = $_POST['po_box'];
$city = $_POST['city'];
$state_province = $_POST['state_province'];
$country_name = $_POST['country_name'];
$f_first_name = $_POST['f_first_name'];
$f_middle_name = $_POST['f_middle_name'];
$f_last_name = $_POST['f_last_name'];

$id = wp_insert_post(
    array(
        'post_title'=>$_POST['post_title'], 
        'post_type'=>'member', 
        'post_status' => 'pending',
        'comment_status' => 'closed',
        'ping_status' => 'closed',
        )
    );
}

add_post_meta($id, 'role', $role, true);
add_post_meta($id, 'middle_name', $middle_name, true);
add_post_meta($id, 'last_name', $last_name, true);
add_post_meta($id, 'gender', $gender, true);
add_post_meta($id, 'salutation', $salutation, true);
add_post_meta($id, 'email', $email, true);
add_post_meta($id, 'telephone', $telephone, true);
add_post_meta($id, 'mobile_phone', $mobile_phone, true);
add_post_meta($id, 'passport_number', $passport_number, true);
add_post_meta($id, 'country_of_birth', $country_of_birth, true);
add_post_meta($id, 'date_of_birth', $date_of_birth, true);
add_post_meta($id, 'current_nationality', $current_nationality, true);
add_post_meta($id, 'previous_nationality_if_applicable', $previous_nationality_if_applicable, true);
add_post_meta($id, 'is_resident_of_uae', $is_resident_of_uae, true);
add_post_meta($id, 'visited_5year', $visited_5year, true);
add_post_meta($id, 'uid_number', $uid_number, true);
add_post_meta($id, 'address_line_1', $address_line_1, true);
add_post_meta($id, 'address_line_2', $address_line_2, true);
add_post_meta($id, 'po_box', $po_box, true);
add_post_meta($id, 'city', $city, true);
add_post_meta($id, 'state_province', $state_province, true);
add_post_meta($id, 'country_name', $country_name, true);
add_post_meta($id, 'f_first_name', $f_first_name, true);
add_post_meta($id, 'f_middle_name', $f_middle_name, true);
add_post_meta($id, 'f_last_name', $f_last_name, true);


require_once( ABSPATH . 'wp-admin/includes/image.php' );
require_once( ABSPATH . 'wp-admin/includes/file.php' );
require_once( ABSPATH . 'wp-admin/includes/media.php' );

$attach_id = media_handle_upload('passport_copy_clear_color_copy', $id);
$attach_id = media_handle_upload('uae_visa_copy_or_uid_number', $id);
$attach_id = media_handle_upload('emirates_id_copy', $id);
if (is_numeric($attach_id)) {
    update_post_meta($id, 'passport_copy_clear_color_copy', $attach_id);
    update_post_meta($id, 'uae_visa_copy_or_uid_number', $attach_id);
    update_post_meta($id, 'emirates_id_copy', $attach_id);
}
$attachment_id = media_handle_upload('passport_standard_size_photo', $post_id);
if (!is_wp_error($attachment_id)) { 
    set_post_thumbnail($id, $attachment_id);
}

?>
<form id="registration" name="registration" method="post" action="<?php echo get_page_link('/') ?>" enctype="multipart/form-data">
<div class="row">
    <div class="col-12">
        <div class="form-group mt-4">
            <h2>Company Member 1</h2>
            <p>Role</p>
            <div class="radiobuttons d-md-flex pl-0">
                <div class="rdio rdio-primary radio-inline mr-5">
                    <input name="role" class="" value="director" id="radio113" type="radio" checked />
                    <label for="radio113"><strong>Director</strong> </label>
                </div>
                <div class="rdio rdio-primary radio-inline mr-5">
                    <input name="role" class="" value="secretary" id="radio112" type="radio" />
                    <label for="radio112"><strong>Secretary</strong> </label>
                </div>
                <div class="rdio rdio-primary radio-inline mr-5">
                    <input name="role" class="" value="gm" id="radio114" type="radio" />
                    <label for="radio114"><strong>General Manager</strong> </label>
                </div>
                <div class="rdio rdio-primary radio-inline mr-5">
                    <input name="role" class="" value="shareholder" id="radio115" type="radio" />
                    <label for="radio115"><strong>Shareholder</strong> </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" id="post_title" name="post_title" placeholder="FULL NAME" value=""/>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Middle Name</label>
                    <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle Name"value="" />
                </div>
            </div> 
            <div class="col-md-4">
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name"value="" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Gender</label>
                    <select class="form-control" id="gender" name="gender">
                        <option value="">---</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <p>Salutation</p>
                    <div class="d-md-flex pl-0">
                        <div class="rdio rdio-primary radio-inline mr-4">
                            <input name="salutation" class="" value="mr" id="radio_1" type="radio" checked />
                            <label for="radio_1"><strong>Mr.</strong> </label>
                        </div>
                        <div class="rdio rdio-primary radio-inline mr-4">
                            <input name="salutation" class="" value="mrs" id="radio_2" type="radio" />
                            <label for="radio_2"><strong>Mrs.</strong> </label>
                        </div>
                        <div class="rdio rdio-primary radio-inline mr-4">
                            <input name="salutation" class="" value="ms" id="radio_3" type="radio" />
                            <label for="radio_3"><strong>Ms.</strong> </label>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="col-md-4">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" id="Email" name="email" placeholder="Email"value="" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Telephone</label>
                    <input type="number" class="form-control" id="telephone" name="telephone" placeholder="Telephone"value="" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Mobile Phone</label>
                    <input type="number" class="form-control" id="mobile_phone" name="mobile_phone" placeholder="Mobile Phone"/>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Passport Number</label>
                    <input type="number" class="form-control" id="passport_number" name="passport_number" placeholder="Passport Number"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Country of Birth</label>
                    <input type="text" class="form-control" id="country_of_birth" name="country_of_birth" placeholder="Country of Birth"value="" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Date of Birth"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Current Nationality</label>
                    <input type="text" class="form-control" id="current_nationality" name="current_nationality" placeholder="Current Nationality"value="" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Previous Nationality (If Applicable)</label>
                    <input type="text" class="form-control" id="previous_nationality_if_applicable" name="previous_nationality_if_applicable" placeholder="Previous Nationality (If Applicable)"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <p>Is resident of UAE?</p>
                    <div class="d-md-flex pl-0">
                        <div class="rdio rdio-primary radio-inline mr-4">
                            <input name="is_resident_of_uae" class="" value="yes" id="radio_11" type="radio" checked />
                            <label for="radio_11"><strong>Yes</strong> </label>
                        </div>
                        <div class="rdio rdio-primary radio-inline mr-4">
                            <input name="is_resident_of_uae" class="" value="no" id="radio_22" type="radio" />
                            <label for="radio_22"><strong>No</strong> </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <p>If Not, have you visited/resided in the UAE within the last 5 years?</p>
                    <div class="d-md-flex pl-0">
                        <div class="rdio rdio-primary radio-inline mr-4">
                            <input name="visited_5year" class="" value="yes" id="radio_111" type="radio" checked />
                            <label for="radio_111"><strong>Yes</strong> </label>
                        </div>
                        <div class="rdio rdio-primary radio-inline mr-4">
                            <input name="visited_5year" class="" value="no" id="radio_222" type="radio" />
                            <label for="radio_222"><strong>No</strong> </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>If you know your UID Number please Provide :  </label>
                    <input type="number" class="form-control" id="uid_number" name="uid_number" placeholder=""/>
                </div>
            </div>
        </div>
        <div class="row">
            
            <div class="col-md-4">
                <div class="form-group">
                    <label>Address Line 1</label>
                    <input type="text" class="form-control" id="address_line_1" name="address_line_1" placeholder="Address Line 1" value="" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Address line 2</label>
                    <input type="text" class="form-control" id="address_line_2" name="address_line_2" placeholder="Address line 2"/>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>PO Box</label>
                    <input type="text" class="form-control" id="po_box" name="po_box" placeholder="PO Box"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="City"value="" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>State Province</label>
                    <input type="text" class="form-control" id="state_province" name="state_province" placeholder="State Province"/>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Country</label>
                    <input type="text" class="form-control" id="country_name" name="country_name" placeholder="Country"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" id="f_first_name" name="f_first_name" placeholder="First Name"value="" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Middle Name</label>
                    <input type="text" class="form-control" id="f_middle_name" name="f_middle_name" placeholder="Middle Name"/>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" id="f_last_name" name="f_last_name" placeholder="Passport Number"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="checkbox" id="passportCopy" name="passportCopy" value="passportCopy">
                    <label for="passportCopy">Passport Copy</label>
                </div>
            </div>
            <div class="col-md-6 d-none" id="upload-docs1">
				<div class="form-group">
                    <label>Upload1</label>
					<input type="file" class="form-control" name="passport_copy_clear_color_copy">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="checkbox" id="passportSizePhoto" name="passportSizePhoto" value="passportSizePhoto">
                    <label for="passportSizePhoto">Passport Standard Size Photo</label>
                </div>
            </div>
            <div class="col-md-6 d-none" id="upload-docs2">
                <div class="form-group">
                    <label>Upload2</label>
                    <input type="file" class="form-control" name="passport_standard_size_photo">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="checkbox" id="uaeVisa" name="uaeVisa" value="uaeVisa">
                    <label for="uaeVisa">UAE Visa Copy or UID NUMBER</label>
                </div>
            </div>
            <div class="col-md-6 d-none" id="upload-docs3">
				<div class="form-group">
                    <label>Upload3</label>
					<input type="file" class="form-control" name="uae_visa_copy_or_uid_number">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="checkbox" id="emiratesId" name="emiratesId" value="emiratesId">
                    <label for="emiratesId">Emirates ID Copy(Past or Present)</label>
                </div>
            </div>
            <div class="col-md-6 d-none" id="upload-docs4">
				<div class="form-group">
                    <label>Upload4</label>
					<input type="file" class="form-control" name="emirates_id_copy">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <input id="sumbit" class="btn-hover btn-save btn btn-outline btn-lg" type="submit" name="post_member" value="Sumbit" />
            </div>
        </div>
    </div>
</div>
</form>