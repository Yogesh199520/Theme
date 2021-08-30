<?php
/*==============================*/
// @package agency
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Member */
get_header();
?>
<div class="inner-banner" style="background-image: url(<?php echo IMG.'search.jpg'; ?>)">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <?php if(function_exists('bcn_display')){bcn_display();} ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <?php 
    $user_id = get_current_user_id();
    $args =array(
        'post_type'  =>'member', 
        'post_status' => array('pending','draft'),
        'posts_per_page' => 1,
        'author' => $user_id
    );  
    $wp_query = new WP_Query($args);
    if($wp_query->found_posts > 0 ):
        while($wp_query->have_posts()): $wp_query->the_post();
        $current_id = $post->ID;
        if($_POST['post-update']=='Update'){
           echo "<meta http-equiv='refresh' content='0'>";
            if(!empty($_POST['post_title'])) {
                $new_slug = sanitize_title($_POST['post_title']);
                wp_update_post(
                    array (
                        'ID'        =>$current_id,
                        'post_title'=>$_POST['post_title'], 
                        'post_name' => $new_slug,
                        'post_status' => 'pending',
                    )
                );
                require_once(ABSPATH . "wp-admin" . '/includes/image.php');
                require_once(ABSPATH . "wp-admin" . '/includes/file.php');
                require_once(ABSPATH . "wp-admin" . '/includes/media.php');
                $img_id = media_handle_upload( 'passport_copy_clear_color_copy', $current_id);
                // $img_id = media_handle_upload( 'passport_standard_size_photo', 0 );
                // $img_id = media_handle_upload( 'uae_visa_copy_or_uid_number', 0 );
                // $img_id = media_handle_upload( 'emirates_id_copy', 0 );
                // update_field( 'field_6119ee1ab2869', $img_id, $current_id );
                update_user_meta( $current_user->ID, 'passport_copy_clear_color_copy', $img_id );

                // update_user_meta( $current_user->ID, 'passport_standard_size_photo', $img_id );
                // update_user_meta( $current_user->ID, 'uae_visa_copy_or_uid_number', $img_id );
                // update_user_meta( $current_user->ID, 'emirates_id_copy', $img_id );
            }
            update_post_meta($current_id, 'role', sanitize_text_field( $_POST['role']));
            update_post_meta($current_id, 'middle_name', sanitize_text_field( $_POST['middle_name']));
            update_post_meta($current_id, 'last_name', sanitize_text_field( $_POST['last_name']));
            update_post_meta($current_id, 'gender', sanitize_text_field( $_POST['gender']));
            update_post_meta($current_id, 'salutation', sanitize_text_field( $_POST['salutation']));
            update_post_meta($current_id, 'email', sanitize_text_field( $_POST['email']));
            update_post_meta($current_id, 'telephone', sanitize_text_field( $_POST['telephone']));
            update_post_meta($current_id, 'mobile_phone', sanitize_text_field( $_POST['mobile_phone']));
            update_post_meta($current_id, 'passport_number', sanitize_text_field( $_POST['passport_number']));
            update_post_meta($current_id, 'country_of_birth', sanitize_text_field( $_POST['country_of_birth']));
            update_post_meta($current_id, 'date_of_birth', sanitize_text_field( $_POST['date_of_birth']));
            update_post_meta($current_id, 'current_nationality', sanitize_text_field( $_POST['current_nationality']));
            update_post_meta($current_id, 'previous_nationality_if_applicable', sanitize_text_field( $_POST['previous_nationality_if_applicable']));
            update_post_meta($current_id, 'is_resident_of_uae', sanitize_text_field( $_POST['is_resident_of_uae']));
            update_post_meta($current_id, 'visited_5year', sanitize_text_field( $_POST['visited_5year']));
            update_post_meta($current_id, 'uid_number', sanitize_text_field( $_POST['uid_number']));
            update_post_meta($current_id, 'address_line_1', sanitize_text_field( $_POST['address_line_1']));
            update_post_meta($current_id, 'address_line_2', sanitize_text_field( $_POST['address_line_2']));
            update_post_meta($current_id, 'po_box', sanitize_text_field( $_POST['po_box']));
            update_post_meta($current_id, 'city', sanitize_text_field( $_POST['city']));
            update_post_meta($current_id, 'state_province', sanitize_text_field( $_POST['state_province']));
            update_post_meta($current_id, 'country_name', sanitize_text_field( $_POST['country_name']));
            update_post_meta($current_id, 'f_first_name', sanitize_text_field( $_POST['f_first_name']));
            update_post_meta($current_id, 'f_middle_name', sanitize_text_field( $_POST['f_middle_name']));
            update_post_meta($current_id, 'f_last_name', sanitize_text_field( $_POST['f_last_name']));
        }
        $title = get_the_title();
        $role = get_field('role');
        $middle_name = get_field('middle_name');
        $last_name = get_field('last_name');
        $gender = get_field('gender');
        $salutation = get_field('salutation');
        $email = get_field('email');
        $telephone = get_field('telephone');
        $mobile_phone = get_field('mobile_phone');
        $passport_number = get_field('passport_number');
        $country_of_birth = get_field('country_of_birth');
        $date_of_birth = get_field('date_of_birth');
        $current_nationality = get_field('current_nationality');
        $previous_nationality_if_applicable = get_field('previous_nationality_if_applicable');
        $is_resident_of_uae = get_field('is_resident_of_uae');
        $visited_5year = get_field('visited_5year');
        $uid_number = get_field('uid_number');
        $address_line_1 = get_field('address_line_1');
        $address_line_2 = get_field('address_line_2');
        $po_box = get_field('po_box');
        $city = get_field('city');
        $state_province = get_field('state_province');
        $country_name = get_field('country_name');
        $f_first_name = get_field('f_first_name');
        $f_middle_name = get_field('f_middle_name');
        $f_last_name = get_field('f_last_name');
    ?>
    <form id="registration" name="registration" method="post" action="<?php echo home_url('/member/'); ?>" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12">
                <div class="form-group mt-4">
                    <h2>Company Member 1</h2>
                    <p>Role</p>
                    <div class="radiobuttons d-md-flex pl-0">
                        <div class="rdio rdio-primary radio-inline mr-5">
                            <input name="role" class="form-control" value="director" id="radio113" type="radio" <?php if($role =='director'): echo 'checked'; endif; ?> />
                            <label for="radio113"><strong>Director</strong> </label>
                        </div>
                        <div class="rdio rdio-primary radio-inline mr-5">
                            <input name="role" class="form-control" value="secretary" id="radio112" type="radio" <?php if($role =='secretary'): echo 'checked'; endif; ?>/>
                            <label for="radio112"><strong>Secretary</strong> </label>
                        </div>
                        <div class="rdio rdio-primary radio-inline mr-5">
                            <input name="role" class="form-control" value="gm" id="radio114" type="radio" <?php if($role =='gm'): echo 'checked'; endif; ?>/>
                            <label for="radio114"><strong>General Manager</strong> </label>
                        </div>
                        <div class="rdio rdio-primary radio-inline mr-5">
                            <input name="role" class="form-control" value="shareholder" id="radio114" type="radio" <?php if($role =='shareholder'): echo 'checked'; endif; ?>/>
                            <label for="radio114"><strong>Shareholder</strong> </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" id="post_title" name="post_title" placeholder="FULL NAME" value="<?php echo $title; ?>"/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Middle Name</label>
                            <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle Name" value="<?php echo $middle_name; ?>" />
                        </div>
                    </div> 
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo $last_name; ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Gender</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="">---</option>
                                <option value="male" <?php if($gender =='male'): echo 'selected'; endif; ?>>Male</option>
                                <option value="female" <?php if($gender =='female'): echo 'selected'; endif; ?>>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <p>Salutation</p>
                            <div class="d-md-flex pl-0">
                                <div class="rdio rdio-primary radio-inline mr-4">
                                    <input name="salutation" class="form-control" value="mr" id="radio_1" type="radio" <?php if($salutation =='mr'): echo 'checked'; endif; ?> />
                                    <label for="radio_1"><strong>Mr.</strong> </label>
                                </div>
                                <div class="rdio rdio-primary radio-inline mr-4">
                                    <input name="salutation" class="form-control" value="mrs" id="radio_2" type="radio" <?php if($salutation =='mrs'): echo 'checked'; endif; ?>/>
                                    <label for="radio_2"><strong>Mrs.</strong> </label>
                                </div>
                                <div class="rdio rdio-primary radio-inline mr-4">
                                    <input name="salutation" class="form-control" value="ms" id="radio_3" type="radio" <?php if($salutation =='ms'): echo 'checked'; endif; ?>/>
                                    <label for="radio_3"><strong>Ms.</strong> </label>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" id="Email" name="email" placeholder="Email" value="<?php echo $email; ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Telephone</label>
                            <input type="number" class="form-control" id="telephone" name="telephone" placeholder="Telephone" value="<?php echo $telephone; ?>" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Mobile Phone</label>
                            <input type="number" class="form-control" id="mobile_phone" name="mobile_phone" placeholder="Mobile Phone" value="<?php echo $mobile_phone; ?>" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Passport Number</label>
                            <input type="number" class="form-control" id="passport_number" name="passport_number" placeholder="Passport Number" value="<?php echo $passport_number; ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Country of Birth</label>
                            <input type="text" class="form-control" id="country_of_birth" name="country_of_birth" placeholder="Country of Birth" value="<?php echo $country_of_birth; ?>" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Date of Birth" value="<?php echo $date_of_birth; ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Current Nationality</label>
                            <input type="text" class="form-control" id="current_nationality" name="current_nationality" placeholder="Current Nationality"value="<?php echo $current_nationality; ?>" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Previous Nationality (If Applicable)</label>
                            <input type="text" class="form-control" id="previous_nationality_if_applicable" name="previous_nationality_if_applicable" placeholder="Previous Nationality (If Applicable)" value="<?php echo $previous_nationality_if_applicable; ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <p>Is resident of UAE?</p>
                            <div class="d-md-flex pl-0">
                                <div class="rdio rdio-primary radio-inline mr-4">
                                    <input name="is_resident_of_uae" class="form-control" value="yes" id="radio_11" type="radio" <?php if($is_resident_of_uae =='yes'): echo 'checked'; endif; ?> />
                                    <label for="radio_11"><strong>Yes</strong> </label>
                                </div>
                                <div class="rdio rdio-primary radio-inline mr-4">
                                    <input name="is_resident_of_uae" class="form-control" value="no" id="radio_22" type="radio" <?php if($is_resident_of_uae =='no'): echo 'checked'; endif; ?>/>
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
                                    <input name="visited_5year" class="form-control" value="yes" id="radio_111" type="radio" <?php if($visited_5year =='yes'): echo 'checked'; endif; ?> />
                                    <label for="radio_111"><strong>Yes</strong> </label>
                                </div>
                                <div class="rdio rdio-primary radio-inline mr-4">
                                    <input name="visited_5year" class="form-control" value="no" id="radio_222" type="radio" <?php if($visited_5year =='no'): echo 'checked'; endif; ?> />
                                    <label for="radio_222"><strong>No</strong> </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>If you know your UID Number please Provide :  </label>
                            <input type="number" class="form-control" id="uid_number" name="uid_number" placeholder="" value="<?php echo $uid_number; ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Address Line 1</label>
                            <input type="text" class="form-control" id="address_line_1" name="address_line_1" placeholder="Address Line 1" value="<?php echo $address_line_1; ?>" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Address line 2</label>
                            <input type="text" class="form-control" id="address_line_2" name="address_line_2" placeholder="Address line 2" value="<?php echo $address_line_2; ?>" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>PO Box</label>
                            <input type="text" class="form-control" id="po_box" name="po_box" placeholder="PO Box" value="<?php echo $po_box; ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?php echo $city; ?>" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>State Province</label>
                            <input type="text" class="form-control" id="state_province" name="state_province" placeholder="State Province" value="<?php echo $state_province; ?>" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" class="form-control" id="country_name" name="country_name" placeholder="Country" value="<?php echo $country_name; ?>"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" id="f_first_name" name="f_first_name" placeholder="First Name" value="<?php echo $f_first_name; ?>" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Middle Name</label>
                            <input type="text" class="form-control" id="f_middle_name" name="f_middle_name" placeholder="Middle Name" value="<?php echo $f_middle_name; ?>"/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" id="f_last_name" name="f_last_name" placeholder="Passport Number" value="<?php echo $f_last_name; ?>"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Upload1</label>
                        <input type="file" name="passport_copy_clear_color_copy">
                    </div>
                    <div class="col-md-6">
                        <label>Upload2</label>
                        <input type="file" name="passport_standard_size_photo">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Upload3</label>
                        <input type="file" name="uae_visa_copy_or_uid_number">
                    </div>
                    <div class="col-md-6">
                        <label>Upload4</label>
                        <input type="file" name="emirates_id_copy">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input id="sumbit" class="btn-hover btn-save" type="submit" name="post-update" value="Update" />
                    </div>
                </div>
            </div>
        </div>
    </form>


    <?php
    endwhile; else : 
    if($_POST['post_submit']=='Sumbit'){ ;
        echo "<meta http-equiv='refresh' content='0'>";
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
                            <input name="role" class="form-control" value="director" id="radio113" type="radio" checked />
                            <label for="radio113"><strong>Director</strong> </label>
                        </div>
                        <div class="rdio rdio-primary radio-inline mr-5">
                            <input name="role" class="form-control" value="secretary" id="radio112" type="radio" />
                            <label for="radio112"><strong>Secretary</strong> </label>
                        </div>
                        <div class="rdio rdio-primary radio-inline mr-5">
                            <input name="role" class="form-control" value="gm" id="radio114" type="radio" />
                            <label for="radio114"><strong>General Manager</strong> </label>
                        </div>
                        <div class="rdio rdio-primary radio-inline mr-5">
                            <input name="role" class="form-control" value="shareholder" id="radio114" type="radio" />
                            <label for="radio114"><strong>Shareholder</strong> </label>
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
		                            <input name="salutation" class="form-control" value="mr" id="radio_1" type="radio" checked />
		                            <label for="radio_1"><strong>Mr.</strong> </label>
		                        </div>
		                        <div class="rdio rdio-primary radio-inline mr-4">
		                            <input name="salutation" class="form-control" value="mrs" id="radio_2" type="radio" />
		                            <label for="radio_2"><strong>Mrs.</strong> </label>
		                        </div>
		                        <div class="rdio rdio-primary radio-inline mr-4">
		                            <input name="salutation" class="form-control" value="ms" id="radio_3" type="radio" />
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
		                            <input name="is_resident_of_uae" class="form-control" value="Yes" id="radio_11" type="radio" checked />
		                            <label for="radio_11"><strong>Yes</strong> </label>
		                        </div>
		                        <div class="rdio rdio-primary radio-inline mr-4">
		                            <input name="is_resident_of_uae" class="form-control" value="no" id="radio_22" type="radio" />
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
		                            <input name="visited_5year" class="form-control" value="yes" id="radio_111" type="radio" checked />
		                            <label for="radio_111"><strong>Yes</strong> </label>
		                        </div>
		                        <div class="rdio rdio-primary radio-inline mr-4">
		                            <input name="visited_5year" class="form-control" value="no" id="radio_222" type="radio" />
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
                        <label>Upload1</label>
                        <input type="file" name="passport_copy_clear_color_copy">
                    </div>
                    <div class="col-md-6">
                        <label>Upload2</label>
                        <input type="file" name="passport_standard_size_photo">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Upload3</label>
                        <input type="file" name="uae_visa_copy_or_uid_number">
                    </div>
                    <div class="col-md-6">
                        <label>Upload4</label>
                        <input type="file" name="emirates_id_copy">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input id="sumbit" class="btn-hover btn-save" type="submit" name="post_submit" value="Sumbit" />
                    </div>
                </div>
            </div>
        </div>
	</form>
    <?php endif; ?>
</div>
<?php
get_footer();
?>