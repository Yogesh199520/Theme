<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Register */

get_header();

if(is_user_logged_in()):
?>
<div class="contact-container registration-form-container">
    <?php 
    $user_id = get_current_user_id();
    $args =array(
        'post_type'  =>'alumni_record', 
        'post_status' => array('pending','draft'),
        'posts_per_page' => 1,
        'author' => $user_id
    );  
    $wp_query = new WP_Query($args);
    if($wp_query->found_posts > 0 ):
        while($wp_query->have_posts()): $wp_query->the_post();
        $current_id = $post->ID;
    ?>
    <div class="container">
        <div class="row">
            <div class="col-12 m-auto mb-30 text-right">
                <a class="btn btn-hover color-1" href="<?php echo wp_logout_url(home_url('/')); ?>">Logout</a>
            </div>
        </div>
        <?php
            if($_POST['post-update']=='Submit'){
            header("Refresh: 0");
            

             // Sending email to user to ensure that his/her registration request has been send
            $current_user = wp_get_current_user();
            $email = $current_user->user_email;
            $subject = get_bloginfo('name');
            $body = 'Your registration request send';
            $headers = array('Content-Type: text/html; charset=UTF-8');
            wp_mail($email, $subject, $body, $headers);

            // Sending email to admin to notify new registation request
            $admin_email = get_bloginfo('admin_email');
            $subject = get_bloginfo('name');
            $body = 'New registration request';
            $headers = array('Content-Type: text/html; charset=UTF-8');
            wp_mail($admin_email, $subject, $body, $headers);

            if(!empty($_POST['post_title']))
            {
              $new_slug = sanitize_title($_POST['post_title']);
                wp_update_post(
                    array (
                        'ID'        =>$current_id,
                        'post_title'=>$_POST['post_title'], 
                        'post_name' => $new_slug,
                        'post_status' => 'pending',
                    )
                );
            }
            update_post_meta($current_id, 'email', sanitize_text_field( $_POST['email']));
            update_post_meta($current_id, 'father_name', sanitize_text_field( $_POST['father_name']));
            update_post_meta($current_id, 'dob', sanitize_text_field( $_POST['dob']));
            update_post_meta($current_id, 'blood_group', sanitize_text_field( $_POST['blood_group']));
            update_post_meta($current_id, 'marital_status', sanitize_text_field( $_POST['marital_status']));
            update_post_meta($current_id, 'caste', sanitize_text_field( $_POST['caste']));
            update_post_meta($current_id, 'nationality', sanitize_text_field( $_POST['nationality']));
            update_post_meta($current_id, 'gender', sanitize_text_field( $_POST['gender']));
            update_post_meta($current_id, 'contact_number', sanitize_text_field( $_POST['contact_number']));
            update_post_meta($current_id, 'alternate_number', sanitize_text_field( $_POST['alternate_number']));
            update_post_meta($current_id, 'college_apswreis', sanitize_text_field( $_POST['college_apswreis']));
            update_post_meta($current_id, 'college_tswreis', sanitize_text_field( $_POST['college_tswreis']));
            update_post_meta($current_id, 'school_name_with_address', sanitize_text_field( $_POST['school_name_with_address']));
            update_post_meta($current_id, 'joining_date', sanitize_text_field( $_POST['joining_date']));

            update_post_meta($current_id, 'passout_date', sanitize_text_field( $_POST['passout_date']));
            update_post_meta($current_id, 'degree_college_tswreis', sanitize_text_field( $_POST['degree_college_tswreis']));
            update_post_meta($current_id, 'degree_joining_date', sanitize_text_field( $_POST['degree_joining_date']));
            update_post_meta($current_id, 'degree_passout_date', sanitize_text_field( $_POST['degree_passout_date']));
            update_post_meta($current_id, 'highest_qualification', sanitize_text_field( $_POST['highest_qualification']));
            update_post_meta($current_id, 'profession', sanitize_text_field( $_POST['profession']));
            update_post_meta($current_id, 'disable-from', sanitize_text_field( $_POST['working']));
            update_post_meta($current_id, 'job_type', sanitize_text_field( $_POST['job_type']));
            update_post_meta($current_id, 'government', sanitize_text_field( $_POST['government']));
            update_post_meta($current_id, 'central', sanitize_text_field( $_POST['central']));
            update_post_meta($current_id, 'companyorganisation', sanitize_text_field( $_POST['companyorganisation']));
            update_post_meta($current_id, 'designation', sanitize_text_field( $_POST['designation']));
            update_post_meta($current_id, 'self_companyorganisation', sanitize_text_field( $_POST['self_companyorganisation']));
            update_post_meta($current_id, 'self_designation', sanitize_text_field( $_POST['self_designation']));
            update_post_meta($current_id, 'for_what', sanitize_text_field( $_POST['for_what']));
            update_post_meta($current_id, 'h_qualification', sanitize_text_field( $_POST['h_qualification']));
            update_post_meta($current_id, 'academic_percentage', sanitize_text_field( $_POST['academic_percentage']));
            update_post_meta($current_id, 'pass_out_year', sanitize_text_field( $_POST['pass_out_year']));
            update_post_meta($current_id, 'previous_job_exp', sanitize_text_field( $_POST['previous_job_exp']));
            update_post_meta($current_id, 'specify_experience', sanitize_text_field( $_POST['specify_experience']));
            update_post_meta($current_id, 'institutionorganization', sanitize_text_field( $_POST['institutionorganization']));
            update_post_meta($current_id, 'currently_pursing_course', sanitize_text_field( $_POST['currently_pursing_course']));
            update_post_meta($current_id, 'pin_code', sanitize_text_field( $_POST['pin_code']));
            update_post_meta($current_id, 'address', sanitize_text_field( $_POST['address']));
            update_post_meta($current_id, 'region', sanitize_text_field( $_POST['region']));
            update_post_meta($current_id, 'city', sanitize_text_field( $_POST['city']));
            update_post_meta($current_id, 'district', sanitize_text_field( $_POST['district']));
            update_post_meta($current_id, 'state', sanitize_text_field( $_POST['state']));
            update_post_meta($current_id, 'home_pin_code', sanitize_text_field( $_POST['home_pin_code']));
            update_post_meta($current_id, 'home_region', sanitize_text_field( $_POST['home_region']));
            update_post_meta($current_id, 'home_district', sanitize_text_field( $_POST['home_district']));
            update_post_meta($current_id, 'home_address', sanitize_text_field( $_POST['home_address']));
            update_post_meta($current_id, 'home_city', sanitize_text_field( $_POST['home_city']));
            update_post_meta($current_id, 'home_state', sanitize_text_field( $_POST['home_state']));
            update_post_meta($current_id, 'want_to_contribute', sanitize_text_field( $_POST['want_to_contribute']));
            update_post_meta($current_id, 'about_you', sanitize_text_field( $_POST['about_you']));
            update_post_meta($current_id, 'd_school_name_with_address', sanitize_text_field( $_POST['d_school_name_with_address']));

            update_post_meta($current_id, 'residential_welfare', sanitize_text_field( $_POST['residential_welfare']));
            update_post_meta($current_id, 'technical_training', sanitize_text_field( $_POST['technical_training']));
            update_post_meta($current_id, 'department', sanitize_text_field( $_POST['department']));
            update_post_meta($current_id, 'residential_degree_cls_add', sanitize_text_field( $_POST['residential_degree_cls_add']));
            update_post_meta($current_id, 'telangana_address', sanitize_text_field( $_POST['telangana_address']));


            update_post_meta($current_id, 'school_apswreis', sanitize_text_field( $_POST['school_apswreis']));
            update_post_meta($current_id, 'school_apswreis_address', sanitize_text_field( $_POST['school_apswreis_address']));
            update_post_meta($current_id, 'school_tswreis', sanitize_text_field( $_POST['school_tswreis']));
            update_post_meta($current_id, 'school_tswreis_address', sanitize_text_field( $_POST['school_tswreis_address']));
            update_post_meta($current_id, 'school_joining_date', sanitize_text_field( $_POST['school_joining_date']));
            update_post_meta($current_id, 'school_passout_date', sanitize_text_field( $_POST['school_passout_date']));


            update_post_meta($current_id, 'degree_cls_name', sanitize_text_field( $_POST['degree_cls_name']));
            update_post_meta($current_id, 'studies_group', sanitize_text_field( $_POST['studies_group']));
            update_post_meta($current_id, 'school_add', sanitize_text_field( $_POST['school_add']));

            update_post_meta($current_id, 'andhra_passout_year', sanitize_text_field( $_POST['andhra_passout_year']));
            update_post_meta($current_id, 'andhra_joining_year', sanitize_text_field( $_POST['andhra_joining_year']));
            update_post_meta($current_id, 'joining_date_andhra', sanitize_text_field( $_POST['joining_date_andhra']));
            update_post_meta($current_id, 'passout_date_andhra', sanitize_text_field( $_POST['passout_date_andhra']));

            }


            if($_POST['update-save']=='Save'){
            header("Refresh: 0");   
            if(!empty($_POST['post_title']))
            {
              $new_slug = sanitize_title($_POST['post_title']);
                wp_update_post(
                    array (
                        'ID'        =>$current_id,
                        'post_title'=>$_POST['post_title'], 
                        'post_name' => $new_slug,
                        'post_status' => 'draft',
                    )
                );
            }

            update_post_meta($current_id, 'degree_cls_name', sanitize_text_field( $_POST['degree_cls_name']));
            update_post_meta($current_id, 'studies_group', sanitize_text_field( $_POST['studies_group']));
            update_post_meta($current_id, 'school_add', sanitize_text_field( $_POST['school_add']));

            update_post_meta($current_id, 'email', sanitize_text_field( $_POST['email']));
            update_post_meta($current_id, 'father_name', sanitize_text_field( $_POST['father_name']));
            update_post_meta($current_id, 'dob', sanitize_text_field( $_POST['dob']));
            update_post_meta($current_id, 'blood_group', sanitize_text_field( $_POST['blood_group']));
            update_post_meta($current_id, 'marital_status', sanitize_text_field( $_POST['marital_status']));
            update_post_meta($current_id, 'caste', sanitize_text_field( $_POST['caste']));
            update_post_meta($current_id, 'nationality', sanitize_text_field( $_POST['nationality']));
            update_post_meta($current_id, 'gender', sanitize_text_field( $_POST['gender']));
            update_post_meta($current_id, 'contact_number', sanitize_text_field( $_POST['contact_number']));
            update_post_meta($current_id, 'alternate_number', sanitize_text_field( $_POST['alternate_number']));
            update_post_meta($current_id, 'college_apswreis', sanitize_text_field( $_POST['college_apswreis']));
            update_post_meta($current_id, 'college_tswreis', sanitize_text_field( $_POST['college_tswreis']));
            update_post_meta($current_id, 'school_name_with_address', sanitize_text_field( $_POST['school_name_with_address']));
            update_post_meta($current_id, 'joining_date', sanitize_text_field( $_POST['joining_date']));

            update_post_meta($current_id, 'passout_date', sanitize_text_field( $_POST['passout_date']));
            update_post_meta($current_id, 'degree_college_tswreis', sanitize_text_field( $_POST['degree_college_tswreis']));
            update_post_meta($current_id, 'degree_joining_date', sanitize_text_field( $_POST['degree_joining_date']));
            update_post_meta($current_id, 'degree_passout_date', sanitize_text_field( $_POST['degree_passout_date']));
            update_post_meta($current_id, 'highest_qualification', sanitize_text_field( $_POST['highest_qualification']));
            update_post_meta($current_id, 'profession', sanitize_text_field( $_POST['profession']));
            update_post_meta($current_id, 'working', sanitize_text_field( $_POST['working']));
            update_post_meta($current_id, 'job_type', sanitize_text_field( $_POST['job_type']));
            update_post_meta($current_id, 'government', sanitize_text_field( $_POST['government']));
            update_post_meta($current_id, 'central', sanitize_text_field( $_POST['central']));
            update_post_meta($current_id, 'companyorganisation', sanitize_text_field( $_POST['companyorganisation']));
            update_post_meta($current_id, 'designation', sanitize_text_field( $_POST['designation']));
            update_post_meta($current_id, 'self_companyorganisation', sanitize_text_field( $_POST['self_companyorganisation']));
            update_post_meta($current_id, 'self_designation', sanitize_text_field( $_POST['self_designation']));
            update_post_meta($current_id, 'for_what', sanitize_text_field( $_POST['for_what']));
            update_post_meta($current_id, 'h_qualification', sanitize_text_field( $_POST['h_qualification']));
            update_post_meta($current_id, 'academic_percentage', sanitize_text_field( $_POST['academic_percentage']));
            update_post_meta($current_id, 'pass_out_year', sanitize_text_field( $_POST['pass_out_year']));
            update_post_meta($current_id, 'previous_job_exp', sanitize_text_field( $_POST['previous_job_exp']));
            update_post_meta($current_id, 'specify_experience', sanitize_text_field( $_POST['specify_experience']));
            update_post_meta($current_id, 'institutionorganization', sanitize_text_field( $_POST['institutionorganization']));
            update_post_meta($current_id, 'currently_pursing_course', sanitize_text_field( $_POST['currently_pursing_course']));
            update_post_meta($current_id, 'pin_code', sanitize_text_field( $_POST['pin_code']));
            update_post_meta($current_id, 'address', sanitize_text_field( $_POST['address']));
            update_post_meta($current_id, 'region', sanitize_text_field( $_POST['region']));
            update_post_meta($current_id, 'city', sanitize_text_field( $_POST['city']));
            update_post_meta($current_id, 'district', sanitize_text_field( $_POST['district']));
            update_post_meta($current_id, 'state', sanitize_text_field( $_POST['state']));
            update_post_meta($current_id, 'home_pin_code', sanitize_text_field( $_POST['home_pin_code']));
            update_post_meta($current_id, 'home_region', sanitize_text_field( $_POST['home_region']));
            update_post_meta($current_id, 'home_district', sanitize_text_field( $_POST['home_district']));
            update_post_meta($current_id, 'home_address', sanitize_text_field( $_POST['home_address']));
            update_post_meta($current_id, 'home_city', sanitize_text_field( $_POST['home_city']));
            update_post_meta($current_id, 'home_state', sanitize_text_field( $_POST['home_state']));
            update_post_meta($current_id, 'want_to_contribute', sanitize_text_field( $_POST['want_to_contribute']));
            update_post_meta($current_id, 'about_you', sanitize_text_field( $_POST['about_you']));
            update_post_meta($current_id, 'd_school_name_with_address', sanitize_text_field( $_POST['d_school_name_with_address']));

            update_post_meta($current_id, 'residential_welfare', sanitize_text_field( $_POST['residential_welfare']));
            update_post_meta($current_id, 'technical_training', sanitize_text_field( $_POST['technical_training']));
            update_post_meta($current_id, 'department', sanitize_text_field( $_POST['department']));
            update_post_meta($current_id, 'residential_degree_cls_add', sanitize_text_field( $_POST['residential_degree_cls_add']));
            update_post_meta($current_id, 'telangana_address', sanitize_text_field( $_POST['telangana_address']));


            update_post_meta($current_id, 'school_apswreis', sanitize_text_field( $_POST['school_apswreis']));
            update_post_meta($current_id, 'school_apswreis_address', sanitize_text_field( $_POST['school_apswreis_address']));
            update_post_meta($current_id, 'school_tswreis', sanitize_text_field( $_POST['school_tswreis']));
            update_post_meta($current_id, 'school_tswreis_address', sanitize_text_field( $_POST['school_tswreis_address']));
            update_post_meta($current_id, 'school_joining_date', sanitize_text_field( $_POST['school_joining_date']));
            update_post_meta($current_id, 'school_passout_date', sanitize_text_field( $_POST['school_passout_date']));

            update_post_meta($current_id, 'andhra_passout_year', sanitize_text_field( $_POST['andhra_passout_year']));
            update_post_meta($current_id, 'andhra_joining_year', sanitize_text_field( $_POST['andhra_joining_year']));
            update_post_meta($current_id, 'joining_date_andhra', sanitize_text_field( $_POST['joining_date_andhra']));
            update_post_meta($current_id, 'passout_date_andhra', sanitize_text_field( $_POST['passout_date_andhra']));

            }
            
           
            $school_apswreis = get_the_title($current_id,'school_apswreis');

            $school_apswreis_address = get_post_meta($current_id, 'school_apswreis_address');
            $school_tswreis = get_post_meta($current_id, 'school_tswreis');
            $school_joining_date = get_post_meta($current_id, 'school_joining_date');
            $school_passout_date = get_post_meta($current_id, 'school_passout_date');

            $full_name = get_the_title($current_id);
            $email = get_post_meta($current_id, 'email');
            $father_name = get_post_meta($current_id, 'father_name');
            $residential_degree_cls_add = get_post_meta($current_id, 'residential_degree_cls_add');
            $telangana_address = get_post_meta($current_id, 'telangana_address');
            $dob = get_post_meta($current_id, 'dob');
            $blood_group = get_post_meta($current_id, 'blood_group');
            $marital_status = get_post_meta($current_id, 'marital_status');
            $caste = get_post_meta($current_id, 'caste');
            $nationality = get_post_meta($current_id, 'nationality');
            $gender = get_post_meta($current_id, 'gender');
            $college_tsw = get_post_meta($current_id, 'college_tswreis');
            $college_aps = get_post_meta($current_id, 'college_apswreis');
            $degree_tsw = get_post_meta($current_id, 'degree_college_tswreis');
            $contact_number = get_post_meta($current_id, 'contact_number');
            $alternate_number = get_post_meta($current_id, 'alternate_number');
            $district_name = get_post_meta($current_id, 'district_name');
            $school_name_with_address = get_post_meta($current_id, 'school_name_with_address');
            $joining_date = get_post_meta($current_id, 'joining_date');
            $passout_date = get_post_meta($current_id, 'passout_date');
            $degree_joining_date = get_post_meta($current_id, 'degree_joining_date');
            $degree_passout_date = get_post_meta($current_id, 'degree_passout_date');
            $pin_code = get_post_meta($current_id, 'pin_code');
            $address = get_post_meta($current_id, 'address');
            $region = get_post_meta($current_id, 'region');
            $city = get_post_meta($current_id, 'city');
            $district = get_post_meta($current_id, 'district');
            $state = get_post_meta($current_id, 'state');
            $marital_status = get_post_meta($current_id, 'marital_status');
            $home_pin_code = get_post_meta($current_id, 'home_pin_code');
            $home_address = get_post_meta($current_id, 'home_address');
            $home_region = get_post_meta($current_id, 'home_region');
            $home_city = get_post_meta($current_id, 'home_city');
            $home_district = get_post_meta($current_id, 'home_district');
            $home_state = get_post_meta($current_id, 'home_state');
            $about_you = get_post_meta($current_id, 'about_you');
            $highest_qualification = get_post_meta($current_id, 'highest_qualification');
            $profession = get_post_meta($current_id, 'profession');
            $working = get_post_meta($current_id, 'working');
            $job_type = get_post_meta($current_id, 'job_type');
            $central = get_post_meta($current_id, 'central');
            $government = get_post_meta($current_id, 'government');
            $companyorganisation = get_post_meta($current_id, 'companyorganisation');
            $designation = get_post_meta($current_id, 'designation');
            $self_companyorganisation = get_post_meta($current_id, 'self_companyorganisation');
            $self_designation = get_post_meta($current_id, 'self_designation');
            $for_what = get_post_meta($current_id, 'for_what');
            $h_qualification = get_post_meta($current_id, 'h_qualification');
            $academic_percentage = get_post_meta($current_id, 'academic_percentage');
            $pass_out_year = get_post_meta($current_id, 'pass_out_year');
            $previous_job_exp = get_post_meta($current_id, 'previous_job_exp');
            $specify_experience = get_post_meta($current_id, 'specify_experience');
            $institutionorganization = get_post_meta($current_id, 'institutionorganization');
            $currently_pursing_course = get_post_meta($current_id, 'currently_pursing_course');
            $want_to_contribute= get_post_meta($current_id, 'want_to_contribute');
            $job_exp = get_post_meta($current_id, 'previous_job_exp');
            $d_school_name_with_address = get_post_meta($current_id, 'd_school_name_with_address');
            $residential_welfare = get_post_meta($current_id, 'residential_welfare');
            $technical_training = get_post_meta($current_id, 'technical_training');
            $department = get_post_meta($current_id, 'department');
            $feat_image = wp_get_attachment_url( get_post_thumbnail_id($current_id));
            $date_of_birth = get_field('dob');
            $work_add = get_field('address');
            $school_aps = get_field('school_apswreis');
            $school_tsw = get_field('school_tswreis');

            $school_add = get_field('school_add');
            $studies_group = get_field('studies_group');
            $degree_cls_name = get_field('degree_cls_name');

            $andhra_passout_year = get_field('andhra_passout_year');
            $andhra_joining_year = get_field('andhra_joining_year');
            $joining_date_andhra = get_field('joining_date_andhra');
            $passout_date_andhra = get_field('passout_date_andhra');

            $latitude = get_field('latitude');
            $longitude = get_field('longitude');

        require_once(ABSPATH . "wp-admin" . '/includes/image.php');
        require_once(ABSPATH . "wp-admin" . '/includes/file.php');
        require_once(ABSPATH . "wp-admin" . '/includes/media.php');
        $attachment_id = media_handle_upload('file', $post_id);
        if (!is_wp_error($attachment_id)) { 
            set_post_thumbnail($id, $attachment_id);
        }

        ?>
        <form id="registration" name="registration" method="post" action="<?php echo home_url('/registration/') ?>" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12">
                <fieldset>
                    <div class="form-heading text-center">
                        <h4>Basic Information</h4>
                    </div>
                    <div class="form-box">
                        <div class="form-content d-flex flex-wrap flex-md-row-reverse">
                            <div class="form-content-right">
                                <?php if(!empty($feat_image)): ?>
                                <div class="avatar-upload">
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url(<?php echo $feat_image; ?>);"></div>
                                        <div class="avatar-edit">
                                            <input type="file" name="file" value="<?php echo $feat_image; ?>" class="sr-only" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload">upload photo</label>
                                        </div>
                                    </div>
                                </div>
                                <?php else : ?>
                                <div class="avatar-upload">
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url(<?php echo IMG.'default-pic.jpg'; ?>);"></div>
                                        <div class="avatar-edit">
                                            <input type="file" name="file"  value="<?php echo $feat_image; ?>" class="sr-only" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload">upload photo</label>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-content-left">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>FULL NAME</label>
                                            <input type="text" class="form-control" id="post_title" name="post_title" placeholder="FULL NAME" value="<?php echo $full_name; ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>EMAIL</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="EMAIL"value="<?php echo $email[0]; ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>FATHER NAME</label>
                                            <input type="text" class="form-control" id="father_name" name="father_name" placeholder="FATHER NAME" value="<?php echo $father_name[0]; ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>GENDER</label>
                                            <select class="form-control" id="gender" name="gender">
                                                <option value="">GENDER</option>
                                                 <option value="male" <?php if($gender[0] =='male'): echo 'selected'; endif; ?>>Male</option>
                                                  <option value="female" <?php if($gender[0] =='female'): echo 'selected'; endif; ?>>Female</option>
                                                  <option value="others" <?php if($gender[0] =='others'): echo 'selected'; endif; ?>>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-content">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>DATE OF BIRTH</label>
                                        <input type="date" id="dob" name="dob" class="form-control" value="<?php echo $date_of_birth; ?>" min="1984-01-01" max="2014-12-31" placeholder="DATE OF BIRTH"/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>BLOOD GROUP</label>
                                        <select class="form-control" id="blood_group" name="blood_group">
                                          <option value="">BLOOD GROUP</option>
                                           <option value="a+" <?php if($blood_group[0] =='a+'): echo 'selected'; endif; ?>>A Positive (A+)</option>
                                              <option value="a-" <?php if($blood_group[0] =='a-'): echo 'selected'; endif; ?>>A  Negative (A-)</option>
                                              <option value="b+" <?php if($blood_group[0] =='b+'): echo 'selected'; endif; ?>>B Positive (B+)</option>
                                              <option value="b-" <?php if($blood_group[0] =='b-'): echo 'selected'; endif; ?>>B Negative (B-)</option>
                                              <option value="o+" <?php if($blood_group[0] =='o+'): echo 'selected'; endif; ?>>O Positive (O+)</option>
                                              <option value="o-" <?php if($blood_group[0] =='o-'): echo 'selected'; endif; ?>>O Negative (O-)</option>
                                              <option value="ab+" <?php if($blood_group[0] =='ab+'): echo 'selected'; endif; ?>>AB Positive (AB+)</option>
                                              <option value="ab-" <?php if($blood_group[0] =='ab-'): echo 'selected'; endif; ?>>AB Negative (AB-)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>MARITAL STATUS</label>
                                        <select class="form-control" id="marital_status" name="marital_status">
                                            <option value="">MARITAL STATUS</option>
                                            <option value="single" <?php if($marital_status[0] =='single'): echo 'selected'; endif; ?>>Single</option>
                                            <option value="married" <?php if($marital_status[0] =='married'): echo 'selected'; endif; ?>>Married</option>
                                            <option value="other" <?php if($marital_status[0] =='other'): echo 'selected'; endif; ?>>Other</option>  
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Caste</label>
                                        <select class="form-control" id="caste" name="caste">
                                        <option value="">Caste</option>
                                         <option value="sc" <?php if($caste[0] =='sc'): echo 'selected'; endif; ?>>SC</option>
                                          <option value="st" <?php if($caste[0] =='st'): echo 'selected'; endif; ?>>ST</option>
                                          <option value="ob" <?php if($caste[0] =='ob'): echo 'selected'; endif; ?>>BC</option>
                                          <option value="bc" <?php if($caste[0] =='bc'): echo 'selected'; endif; ?>>OC</option>
                                          <option value="others" <?php if($caste[0] =='others'): echo 'selected'; endif; ?>>Others</option> 
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>NATIONALITY</label>
                                        <select class="form-control" id="nationality" name="nationality">
                                           <option value="">NATIONALITY</option>
                                            <option value="indian" <?php if($nationality[0] =='indian'): echo 'selected'; endif; ?>>Indian</option>
                                            <option value="nri" <?php if($nationality[0] =='nri'): echo 'selected'; endif; ?>>NRI</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>CONTACT NUMBER</label>
                                         <input type="tel" class="form-control" id="contact_number" name="contact_number" placeholder="CONTACT NUMBER" value="<?php echo $contact_number[0]; ?>"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>ALTERNATE WHATSAPP NUMBER</label>
                                        <input type="text" class="form-control"  id="alternate_number" name="alternate_number" placeholder="ALTERNATE WHATSAPP NUMBER" value="<?php echo $alternate_number[0]; ?>"/>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-heading text-center">
                        <h4>Education Information</h4>
                    </div>
                    <div class="form-box">
                        <div class="form-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="radio-box d-flex align-itemsl-g-center ">
                                            <p>School (TSWREIS)</p>
                                            <div class="radiobuttons d-flex">
                                                <div class="rdio rdio-primary radio-inline">
                                                    <input name="school_add" value="yes" id="radio111" type="radio" <?php if($school_add =='yes'): echo 'checked'; endif; ?>>
                                                    <label for="radio111">YES</label>
                                                </div>
                                                <div class="rdio rdio-primary radio-inline">
                                                    <input name="school_add" value="no" id="radio2222" type="radio" <?php if($school_add =='no'): echo 'checked'; endif; ?>>
                                                    <label for="radio2222">NO</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="school-name">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="radio-box d-flex custom-radio-box align-items-lg--center ">
                                                <div class="radiobuttons d-flex custom-radio-buttons">
                                                    <div class="rdio rdio-primary radio-inline custom-radio-list text-center">
                                                        <input name="school_location" value="telangana_school" id="radio444" type="radio"checked>
                                                        <label for="radio444">STUDIED IN TELANGANA SOCIAL WELFARE RESIDENTIAL EDUCATION institution SOCITY TSWREIS</label>
                                                    </div>
                                                    <div class="rdio rdio-primary radio-inline custom-radio-list text-center">
                                                        <input name="school_location" value="andhara_school" id="radio333" type="radio" >
                                                        <label for="radio333">STUDIED IN Andhra Pradesh SOCIAL WELFARE RESIDENTIAL EDUCATION institution SOCITY APSWREIS</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group dist-default">
                                            <label>DISTRICT NAME</label>
                                            <select class="form-control" name="school_apswreis">
                                               <option value="">DISTRICT NAME</option>
                                                <option value="anathapur" <?php if($school_aps =='anathapur'): echo 'selected'; endif; ?>>Anathapur</option>
                                                <option value="chittor" <?php if($school_aps =='chittor'): echo 'selected'; endif; ?>>Chittor</option>
                                                <option value="eastgodavari" <?php if($school_aps =='eastgodavari'): echo 'selected'; endif; ?>>EastGodavari</option>
                                                <option value="guntur" <?php if($school_aps =='guntur'): echo 'selected'; endif; ?>>Guntur</option>
                                                <option value="kadapa" <?php if($school_aps =='kadapa'): echo 'selected'; endif; ?>>Kadapa</option>
                                                <option value="krishna" <?php if($school_aps =='krishna'): echo 'selected'; endif; ?>>Krishna</option>
                                                <option value="kurnool" <?php if($school_aps =='kurnool'): echo 'selected'; endif; ?>>Kurnool</option>
                                                <option value="nellore" <?php if($school_aps =='nellore'): echo 'selected'; endif; ?>>Nellore</option>
                                                <option value="srikakulam" <?php if($school_aps =='srikakulam'): echo 'selected'; endif; ?>>Srikakulam</option>
                                                <option value="visakhapatnam" <?php if($school_aps =='visakhapatnam'): echo 'selected'; endif; ?>>Visakhapatnam</option>
                                                <option value="vizianagram" <?php if($school_aps =='vizianagram'): echo 'selected'; endif; ?>>Vizianagram</option>
                                                <option value="west-godavari" <?php if($school_aps =='west-godavari'): echo 'selected'; endif; ?>>West Godavari</option>
                                            </select>
                                        </div>
                                        <?php
                                        $data_json = file_get_contents(THEMEDIR.'/include/json/tswr-institutions-addresses.json');
                                        if($data_json !== false AND !empty($data_json)):
                                        ?>
                                        <div class="form-group dist-hidden d-none">
                                            <label>DISTRICT NAME</label>
                                            <select class="form-control school-dist" name="school_tswreis">
                                               <option value="">DISTRICT NAME</option>
                                                <?php
                                                $array = json_decode($data_json);
                                                $res = array();
                                               foreach ($array as $each) {
                                                    if (isset($res[$each->District]))
                                                        array_push($res[$each->District], $each->task);
                                                    else
                                                        $res[$each->District] = array($each->task);
                                                }
                                                foreach ($res as $District => $tasks):
                                                $dist =  sanitize_title($District);
                                                ?>
                                                <option value="<?php  echo sanitize_title($District); ?>" data-dist="<?php echo sanitize_title($District); ?>" <?php if($school_tsw == $dist): echo 'selected'; endif; ?>>
                                                    <?php echo $District; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group add-default">
                                            <label>SCHOOL NAME WITH ADDRESS</label>
                                            <select class="form-control" name="school_apswreis_address">
                                                <option value="">SCHOOL NAME WITH ADDRESS</option>
                                                <option value="test"> TSWRS/JC(G) COE,AdilabadOpp. SP Camp Office Adilabad, PIN : 504001</option>
                                            </select>
                                        </div>
                                        <div class="form-group d-none add-hidden">
                                            <?php
                                            $data_json = file_get_contents(THEMEDIR.'/include/json/tswr-institutions-addresses.json');
                                            if($data_json !== false AND !empty($data_json)):
                                            
                                            ?>
                                            <label>SCHOOL NAME WITH ADDRESS</label>
                                            <select class="form-control school-address" name="school_tswreis_address">
                                                <option value="">SCHOOL NAME WITH ADDRESS</option>
                                                <?php 
                                                $data_arr = json_decode($data_json, true);
                                                foreach ($data_arr as $key => $value): 
                                                ?>
                                                <option value="<?php echo $value['InstitutionWithFullAddress']; ?>" data-dist="<?php echo sanitize_title($value['District']); ?>">
                                                    <?php echo $value['InstitutionWithFullAddress']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3 telangana-join-year-school">
                                        <div class="form-group">
                                            <label>JOINING YEAR</label>
                                            <select class="form-control" name="school_joining_date">
                                                <option value="">JOINING YEAR</option>
                                                <?php
                                                $start =  2014;
                                                $now   = new DateTime;
                                                $now->modify('+1 years');
                                                $end = $now->format('Y');
                                                for( $year= $start; $year < $end; $year++ ){ ?>
                                                    <option value="<?php echo $year; ?>" <?php if($school_joining_date[0] ==$year): echo 'selected'; endif; ?>><?php echo $year; ?></option>
                                               <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 telangana-passout-year-school">
                                        <div class="form-group">
                                            <label>PASSED OUT YEAR</label>
                                            <select class="form-control" name="school_passout_date">
                                            <option value="">PASSED OUT YEAR</option>
                                                <?php
                                                $start =  2016;
                                                $now = new DateTime;
                                                $now->modify('+3 years');
                                                $end = $now->format('Y');
                                                for( $year= $start; $year < $end; $year++ ){ ?>
                                                    <option value="<?php echo $year; ?>" <?php if($school_passout_date[0] ==$year): echo 'selected'; endif; ?>><?php echo $year;?></option>
                                               <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 andhra-join-year-school d-none">
                                        <div class="form-group">
                                            <label>JOINING YEAR</label>
                                            <select class="form-control" name="andhra_joining_year">
                                                <option value="">JOINING YEAR</option>
                                                <?php
                                                $start =  1984;
                                                $end = 2015;
                                                for( $year= $start; $year < $end; $year++ ){ ?>
                                                    <option value="<?php echo $year; ?>" <?php if($andhra_joining_year ==$year): echo 'selected'; endif; ?>><?php echo $year; ?></option>
                                               <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 andhra-passout-year-school d-none">
                                        <div class="form-group">
                                            <label>PASSED OUT YEAR</label>
                                            <select class="form-control" name="andhra_passout_year">
                                            <option value="">PASSED OUT YEAR</option>
                                                <?php
                                                $start =  1986;
                                                $end = 2016;
                                                for( $year= $start; $year < $end; $year++ ){ ?>
                                                    <option value="<?php echo $year; ?>" <?php if($andhra_passout_year ==$year): echo 'selected'; endif; ?>><?php echo $year;?></option>
                                               <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-box">
                        <div class="form-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="radio-box d-flex align-itemsl-g-center">
                                            <p>College (TSWREIS) </p>
                                            <div class="radiobuttons d-flex">
                                                <div class="rdio rdio-primary radio-inline">
                                                    <input name="studies_group" value="yes" id="radio1" type="radio" <?php if($studies_group =='yes'): echo 'checked'; endif; ?> />
                                                    <label for="radio1">YES</label>
                                                </div>
                                                <div class="rdio rdio-primary radio-inline">
                                                    <input name="studies_group" value="no" id="radio2" type="radio" <?php if($studies_group =='no'): echo 'checked'; endif; ?>/>
                                                    <label for="radio2">NO</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="studies-option">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="radio-box d-flex custom-radio-box align-items-lg--center">
                                            <div class="radiobuttons d-flex custom-radio-buttons">
                                                <div class="rdio rdio-primary radio-inline custom-radio-list text-center">
                                                    <input name="cls_group" value="telangana_welfare" id="radio4" type="radio" checked/>
                                                    <label for="radio4">STUDIED IN TELANGANA SOCIAL WELFARE RESIDENTIAL EDUCATION institution SOCITY TSWREIS</label>
                                                </div>
                                                <div class="rdio rdio-primary radio-inline custom-radio-list text-center">
                                                    <input name="cls_group" value="andhara_welfare" id="radio3" type="radio"  />
                                                    <label for="radio3">STUDIED IN Andhra Pradesh SOCIAL WELFARE RESIDENTIAL EDUCATION institution SOCITY APSWREIS</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 apswreis">
                                    <div class="form-group">
                                        <label>DISTRICT NAME</label>
                                        <select class="form-control college_apswreis" name="college_apswreis">
                                             <option value="">DISTRICT NAME</option>
                                            <option value="anathapur" <?php if($college_aps[0] =='anathapur'): echo 'selected'; endif; ?>>Anathapur</option>
                                            <option value="chittor" <?php if($college_aps[0] =='chittor'): echo 'selected'; endif; ?>>Chittor</option>
                                            <option value="eastgodavari" <?php if($college_aps[0] =='eastgodavari'): echo 'selected'; endif; ?>>EastGodavari</option>
                                            <option value="guntur" <?php if($college_aps[0] =='guntur'): echo 'selected'; endif; ?>>Guntur</option>
                                            <option value="kadapa" <?php if($college_aps[0] =='kadapa'): echo 'selected'; endif; ?>>Kadapa</option>
                                            <option value="krishna" <?php if($college_aps[0] =='krishna'): echo 'selected'; endif; ?>>Krishna</option>
                                            <option value="kurnool" <?php if($college_aps[0] =='kurnool'): echo 'selected'; endif; ?>>Kurnool</option>
                                            <option value="nellore" <?php if($college_aps[0] =='nellore'): echo 'selected'; endif; ?>>Nellore</option>
                                            <option value="srikakulam" <?php if($college_aps[0] =='srikakulam'): echo 'selected'; endif; ?>>Srikakulam</option>
                                            <option value="visakhapatnam" <?php if($college_aps[0] =='visakhapatnam'): echo 'selected'; endif; ?>>Visakhapatnam</option>
                                            <option value="vizianagram" <?php if($college_aps[0] =='vizianagram'): echo 'selected'; endif; ?>>Vizianagram</option>
                                            <option value="west-godavari" <?php if($college_aps[0] =='west-godavari'): echo 'selected'; endif; ?>>West Godavari</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 d-none tswreis">
                                    <div class="form-group">
                                         <?php
                                        $data_json = file_get_contents(THEMEDIR.'/include/json/tswr-institutions-addresses.json');
                                        if($data_json !== false AND !empty($data_json)):
                                         $slug = $college_tsw[0];
                                        ?>
                                        <label>DISTRICT NAME</label>
                                        <select class="form-control tswreis-cls" name="college_tswreis">
                                           <option value="">DISTRICT NAME</option>
                                            <?php
                                            $array = json_decode($data_json);
                                            $res = array();
                                           foreach ($array as $each) {
                                                if (isset($res[$each->District]))
                                                    array_push($res[$each->District], $each->task);
                                                else
                                                    $res[$each->District] = array($each->task);
                                            }
                                            foreach ($res as $District => $tasks):
                                            $dist =  sanitize_title($District);
                                            ?>
                                            <option value="<?php echo sanitize_title($District); ?>" data-dist="<?php echo sanitize_title($District); ?>" <?php if($college_tsw[0] == $dist): echo 'selected'; endif; ?>><?php echo $District; ?></option>
                                            <?php endforeach; ?>
                                            
                                        </select>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group apswreis">
                                        <label>SCHOOL NAME WITH ADDRESS</label>
                                        <select class="form-control" name="telangana_address">
                                            <option value="">SCHOOL NAME WITH ADDRESS</option>
                                            <option value="test"> TSWRS/JC(G) COE,AdilabadOpp. SP Camp Office Adilabad, PIN : 504001</option>
                                        </select>
                                    </div>
                                    <div class="form-group d-none tswreis">
                                        <?php
                                        $data_json = file_get_contents(THEMEDIR.'/include/json/tswr-institutions-addresses.json');
                                        if($data_json !== false AND !empty($data_json)):
                                        ?>
                                        <label>SCHOOL NAME WITH ADDRESS</label>
                                        <select class="form-control address" name ="school_name_with_address" id="">
                                             <option value="">SCHOOL NAME WITH ADDRESS</option>
                                            <?php 
                                            $data_arr = json_decode($data_json, true);
                                            foreach ($data_arr as $key => $value):
                                            $address = value['InstitutionWithFullAddress'];
                                            ?>
                                            <option value="<?php echo $value['InstitutionWithFullAddress']; ?>" data-dist="<?php echo sanitize_title($value['District']); ?>"><?php echo $value['InstitutionWithFullAddress']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-3 telangana-join-year-cls">
                                    <div class="form-group">
                                        <label>JOINING YEAR</label>
                                        <select class="form-control" name="joining_date">
                                             <option value="">JOINING YEAR</option>
                                           <?php
                                            $start =  2014;
                                            $now   = new DateTime;
                                            $now->modify('+1 years');
                                            $end = $now->format('Y');
                                            for($year= $start; $year < $end; $year++ ){ 
                                                ?>
                                                 <option value="<?php echo $year; ?>" <?php if($joining_date[0] ==$year): echo 'selected'; endif; ?>><?php echo $year; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 telangana-passout-year-cls">
                                    <div class="form-group">
                                        <label>Passout YEAR</label>
                                        <select class="form-control" name="passout_date">
                                            <option value="">Passout YEAR</option>
                                            <?php
                                            $start =  2016;
                                            $now   = new DateTime;
                                            $now->modify('+3 years');
                                            $end = $now->format('Y');
                                            for($year= $start; $year < $end; $year++ ){ 
                                                ?>
                                                 <option value="<?php echo $year; ?>" <?php if($passout_date[0] ==$year): echo 'selected'; endif; ?>><?php echo $year; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 andhra-join-year-cls d-none">
                                    <div class="form-group">
                                        <label>JOINING YEAR</label>
                                        <select class="form-control" name="joining_date_andhra">
                                             <option value="">JOINING YEAR</option>
                                           <?php
                                            $start =  1984;
                                            $end = 2015;
                                            for($year= $start; $year < $end; $year++ ){ 
                                                ?>
                                                 <option value="<?php echo $year; ?>" <?php if($joining_date_andhra ==$year): echo 'selected'; endif; ?>><?php echo $year; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 andhra-passout-year-cls d-none">
                                    <div class="form-group">
                                        <label>Passout YEAR</label>
                                        <select class="form-control" name="passout_date_andhra">
                                            <option value="">Passout YEAR</option>
                                            <?php
                                            $start =  1986;
                                            $end = 2016;
                                            for($year= $start; $year < $end; $year++ ){ 
                                                ?>
                                                 <option value="<?php echo $year; ?>" <?php if($passout_date_andhra ==$year): echo 'selected'; endif; ?>><?php echo $year; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-box">
                        <div class="form-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="radio-box d-flex align-itemsl-g-center">
                                            <p>Degree college (TSWRDC) </p>
                                            <div class="radiobuttons d-flex">
                                                <div class="rdio rdio-primary radio-inline">
                                                    <input name="degree_cls_name" value="yes" id="radio5" type="radio" <?php if($degree_cls_name =='yes'): echo 'checked'; endif; ?> />
                                                    <label for="radio5">YES</label>
                                                </div>
                                                <div class="rdio rdio-primary radio-inline">
                                                    <input name="degree_cls_name" value="no" id="radio6" type="radio" <?php if($degree_cls_name =='no'): echo 'checked'; endif; ?>/>
                                                    <label for="radio6">NO</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="degree-option">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="radio-box d-flex custom-radio-box align-items-lg--center">
                                            <div class="radiobuttons d-flex custom-radio-buttons">
                                               
                                                <div class="rdio rdio-primary radio-inline custom-radio-list text-center">
                                                    <input name="d_cls_group" value="degree_cls_welfare" id="radio8" type="radio" checked />
                                                    <label for="radio8">Studied in social welfare DEGREE COLLEGE</label>
                                                </div>
                                                <!--  <div class="rdio rdio-primary radio-inline custom-radio-list text-center">
                                                    <input name="d_cls_group" value="residential_cls_welfare" id="radio9" type="radio"  />
                                                    <label for="radio9">Studied in social welfare Residential ScHool</label>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 degree_cls_option" id="">
                                    <div class="form-group">
                                        <?php
                                        $data_json = file_get_contents(THEMEDIR.'/include/json/degree-colleges-address.json');
                                        if($data_json !== false AND !empty($data_json)):
                                        
                                        ?>
                                         <label>DISTRICT NAME</label>
                                        <select class="form-control" id="degree_college_tswreis" name="degree_college_tswreis">
                                            <option value="">DISTRICT NAME</option>
                                            <?php 
                                            $data_arr = json_decode($data_json, true);
                                            foreach ($data_arr as $key => $value):
                                            $d_dist = sanitize_title($value['TSWRD_College']);

                                            ?>
                                            <option value="<?php  echo sanitize_title($value['TSWRD_College']); ?>" data-dist="<?php echo sanitize_title($value['TSWRD_College']); ?>" <?php if($degree_tsw[0] == $d_dist): echo ' selected'; endif;?>><?php echo $value['TSWRD_College']; ?></option>
                                            <?php endforeach; ?>
                                            
                                        </select>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-4 d-none residential_cls_otption" id="">
                                    <div class="form-group">
                                        <label>DISTRICT NAME</label>
                                        <select class="form-control" id="residential_welfare" name="residential_welfare">
                                             <option value="">DISTRICT NAME</option>
                                            <option value="a" <?php if($residential_welfare[0] =='a'): echo 'selected'; endif; ?>>A</option>
                                            <option value="b" <?php if($residential_welfare[0] =='b'): echo 'selected'; endif; ?>>B</option>
                                            <option value="c" <?php if($residential_welfare[0] =='c'): echo 'selected'; endif; ?>>C</option>
                                            <option value="c" <?php if($residential_welfare[0] =='d'): echo 'selected'; endif; ?>>D</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group degree_cls_option">
                                        <?php
                                            $data_json = file_get_contents(THEMEDIR.'/include/json/degree-colleges-address.json');
                                            if($data_json !== false AND !empty($data_json)):
                                            ?>
                                            <label>SCHOOL NAME WITH ADDRESS</label>
                                            <select class="form-control" name="d_school_name_with_address" id="d-address">
                                                 <option value="">SCHOOL NAME WITH ADDRESS</option>
                                                <?php 
                                                $data_arr = json_decode($data_json, true);
                                                foreach ($data_arr as $key => $value): 
                                                ?>
                                               <option value="<?php echo $value['TSWRD_College_Address']; ?>" data-dist="<?php echo sanitize_title($value['TSWRD_College']); ?>">
                                                    <?php echo $value['TSWRD_College_Address']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group d-none residential_cls_otption">
                                        <label>SCHOOL NAME WITH ADDRESS</label>
                                        <select class="form-control" name="residential_degree_cls_add">
                                            <option value="">SCHOOL NAME WITH ADDRESS</option>
                                            <option value="testing">
                                                H.No.23-6-140/1/2,Beside Prisoners Petrol Pump, Hunter Road, Warangal - 506 001</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>JOINING YEAR</label>
                                        <select class="form-control" name="degree_joining_date">
                                            <option value="">JOINING YEAR</option>
                                            <?php
                                            $start =  2016;
                                            $now   = new DateTime;
                                            $now->modify('+1 years');
                                            $end = $now->format('Y');
                                            for($year= $start; $year < $end; $year++ ){ 
                                                ?>
                                                 <option value="<?php echo $year; ?>" <?php if($degree_joining_date[0] ==$year): echo 'selected'; endif; ?>><?php echo $year; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>PASSED OUT YEAR</label>
                                        <select class="form-control" name="degree_passout_date">
                                            <option value="">PASSED OUT YEAR</option>
                                            <?php
                                            $start =  2018;
                                            $now   = new DateTime;
                                            $now->modify('+3 years');
                                            $end = $now->format('Y');
                                            for($year= $start; $year < $end; $year++ ){ 
                                                ?>
                                                 <option value="<?php echo $year; ?>" <?php if($degree_passout_date[0] ==$year): echo 'selected'; endif; ?>><?php echo $year; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Highest Qualification</label>
                                        <select class="form-control" name="highest_qualification" id="highest_qualification">
                                         <option value="">Highest Qualification</option>
                                        <option value="matriculation" <?php if($highest_qualification[0] =='matriculation'): echo 'selected'; endif; ?>>Matriculation</option>
                                        <option value="intermediate" <?php if($highest_qualification[0] =='intermediate'): echo 'selected'; endif; ?>>Intermediate</option>
                                        <option value="graduate" <?php if($highest_qualification[0] =='graduate'): echo 'selected'; endif; ?>>Graduate</option>
                                        <option value="post-graduate" <?php if($highest_qualification[0] =='post-graduate'): echo 'selected'; endif; ?>>Post Graduate</option>
                                        <option value="phd" <?php if($highest_qualification[0] =='phd'): echo 'selected'; endif; ?>>Ph.D</option>  
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="profession-container d-flex flex-column">
                    <fieldset>
                        <div class="form-heading text-center">
                            <h4>Profession</h4>
                        </div>
                        <div class="form-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="radiobuttons d-md-flex pl-0">
                                            <div class="rdio rdio-primary radio-inline">
                                                <input name="profession" value="working" id="radio113" type="radio"  <?php if($profession[0] =='working'): echo 'checked'; endif; ?> />
                                                <label for="radio113"><strong>Working</strong> </label>
                                            </div>
                                            <div class="rdio rdio-primary radio-inline">
                                                <input name="profession" value="student" id="radio112" type="radio"  <?php if($profession[0] =='student'): echo 'checked'; endif; ?>/>
                                                <label for="radio112"><strong>STUDENT</strong> </label>
                                            </div>
                                            <div class="rdio rdio-primary radio-inline">
                                                <input name="profession" value="job-seeker" id="radio114" type="radio"  <?php if($profession[0] =='job-seeker'): echo 'checked'; endif; ?>/>
                                                <label for="radio114"><strong>JOB SEEKER</strong> </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-type-working">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label>Working AS</label>
                                            <select class="form-control" name="working" id="working">
                                                 <option value="">Working AS</option>
                                                <option value="doctor"<?php if($working[0] =='doctor'): echo 'selected'; endif; ?>>Doctor</option>
                                                <option value="engineer"<?php if($working[0] =='engineer'): echo 'selected'; endif; ?>>Engineer</option>
                                                <option value="management"<?php if($working[0] =='management'): echo 'selected'; endif; ?>>Management</option>
                                                <option value="rawyer"<?php if($working[0] =='rawyer'): echo 'selected'; endif; ?>>Lawyer</option>
                                                <option value="public-service"<?php if($working[0] =='public-service'): echo 'selected'; endif; ?>>Public Service</option>
                                                <option value="chartered-accountant"<?php if($working[0] =='chartered-accountant'): echo 'selected'; endif; ?>>Chartered Accountant</option>
                                                <option value="entrepreneur"<?php if($working[0] =='entrepreneur'): echo 'selected'; endif; ?>>Entrepreneur</option>
                                                <option value="business"<?php if($working[0] =='business'): echo 'selected'; endif; ?>>Business</option>
                                                <option value="social-service"<?php if($working[0] =='social-service'): echo 'selected'; endif; ?>>Social Service</option>
                                                <option value="Others" <?php if($working[0] =='Others'): echo 'selected'; endif; ?>>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="radiobuttons d-md-flex pl-0">
                                                <div class="rdio rdio-primary radio-inline">
                                                    <input name="job_type" value="govt" id="radio15" type="radio" checked <?php if($job_type[0] =='govt'): echo 'checked'; endif; ?>/>
                                                    <label for="radio15"><strong>GOVERMENT</strong> </label>
                                                </div>
                                                <div class="rdio rdio-primary radio-inline">
                                                    <input name="job_type" value="private" id="radio16" type="radio" <?php if($job_type[0] =='private'): echo 'checked'; endif; ?>/>
                                                    <label for="radio16"><strong>PRIVATE</strong> </label>
                                                </div>
                                                <div class="rdio rdio-primary radio-inline">
                                                    <input name="job_type" value="self-emp" id="radio17" type="radio" <?php if($job_type[0] =='self-emp'): echo 'checked'; endif; ?> />
                                                    <label for="radio17"><strong>SELF EMPLOYED</strong> </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="govt-emp">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="radiobuttons d-md-flex pl-0">
                                                    <div class="rdio rdio-primary radio-inline">
                                                        <input name="government" value="central" id="radio11" type="radio" <?php if($government[0] =='central'): echo 'checked'; endif; ?> />
                                                        <label for="radio11"><strong>CENTRAL</strong> </label>
                                                    </div>
                                                    <div class="rdio rdio-primary radio-inline">
                                                        <input name="government" value="state" id="radio12" type="radio" <?php if($government[0] =='state'): echo 'checked'; endif; ?>/>
                                                        <label for="radio12"><strong>STATE</strong> </label>
                                                    </div>
                                                    <div class="rdio rdio-primary radio-inline">
                                                        <input name="government" value="public" id="radio13" type="radio" <?php if($government[0] =='public'): echo 'checked'; endif; ?>/>
                                                        <label for="radio13"><strong>PUBLIC</strong> </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>SELECT DEPARTMENT</label>
                                                <select class="form-control" name="department">
                                                      <option value="">SELECT DEPARTMENT</option>
                                                    <option value="agriculture" <?php if($department[0] =='agriculture'): echo 'selected'; endif; ?>>Agriculture</option>
                                                    <option value="animal" <?php if($department[0] =='animal'): echo 'selected'; endif; ?>>Animal  Husbandry & Fisheries </option>
                                                    <option value="food-con" <?php if($department[0] =='food-con'): echo 'selected'; endif; ?>>Food &Consumer Protection</option> 
                                                    <option value="forest" <?php if($department[0] =='forest'): echo 'selected'; endif; ?>>Forest</option>
                                                    <option value="ga" <?php if($department[0] =='ga'): echo 'selected'; endif; ?>>General Administration</option> 
                                                    <option value="id" <?php if($department[0] =='animal'): echo 'selected'; endif; ?>>id/option>
                                                    <option value="handloom" <?php if($department[0] =='handloom'): echo 'selected'; endif; ?>>Handloom &Sericulture</option>
                                                    <option value="hrd" <?php if($department[0] =='hrd'): echo 'selected'; endif; ?>>Human Resources Development</option>
                                                    <option value="ipr" <?php if($department[0] =='ipr'): echo 'selected'; endif; ?>>Information & Public Relations</option> 
                                                    <option value="labour" <?php if($department[0] =='labour'): echo 'selected'; endif; ?>>Labour </option>
                                                    <option value="et" <?php if($department[0] =='et'): echo 'selected'; endif; ?>>Employment and Training</option>
                                                    <option value="training" <?php if($department[0] =='training'): echo 'selected'; endif; ?>>Training</option>
                                                    <option value="fisheries" <?php if($department[0] =='fisheries'): echo 'selected'; endif; ?>>Fisheries</option>
                                                    <option value="ms" <?php if($department[0] =='ms'): echo 'selected'; endif; ?>>Medical Services</option>
                                                    <option value="ss" <?php if($department[0] =='ss'): echo 'selected'; endif; ?>>Social Securities</option>
                                                    <option value="mg" <?php if($department[0] =='mg'): echo 'selected'; endif; ?>>Mines and Geology</option>
                                                    <option value="mi" <?php if($department[0] =='mi'): echo 'selected'; endif; ?>>Minor Irrigation </option>
                                                    <option value="mw" <?php if($department[0] =='mw'): echo 'selected'; endif; ?>>Minority Welfare</option>
                                                    <option value="ns" <?php if($department[0] =='ns'): echo 'selected'; endif; ?>>National Savings</option>
                                                    <option value="ef" <?php if($department[0] =='ef'): echo 'selected'; endif; ?>>Office of the chief Election Officer</option>
                                                    <option value="pr" <?php if($department[0] =='pr'): echo 'selected'; endif; ?>>Panchayat Raj</option>
                                                    <option value="pa" <?php if($department[0] =='pa'): echo 'selected'; endif; ?>>Parliamentary Affairs</option>
                                                    <option value="planning" <?php if($department[0] =='planning'): echo 'selected'; endif; ?>>Planning</option>
                                                    <option value="dairies" <?php if($department[0] =='dairies'): echo 'selected'; endif; ?>>Dairies</option>
                                                    <option value="phed" <?php if($department[0] =='phed'): echo 'selected'; endif; ?>>Public Health Engineering dept</option> 
                                                    <option value="rc" <?php if($department[0] =='rc'): echo 'selected'; endif; ?>>Road Construction</option>
                                                    <option value="sw" <?php if($department[0] =='sw'): echo 'selected'; endif; ?>>Social Welfare</option>
                                                    <option value="coal" <?php if($department[0] =='coal'): echo 'selected'; endif; ?>>coal</option>
                                                    <option value="transport" <?php if($department[0] =='transport'): echo 'selected'; endif; ?>>Transport</option>
                                                    <option value="wr" <?php if($department[0] =='wr'): echo 'selected'; endif; ?>>Water Resources</option>
                                                    <option value="cs" <?php if($department[0] =='cs'): echo 'selected'; endif; ?>>Cabinet Secretariat and co-ordination</option> 
                                                    <option value="dm" <?php if($department[0] =='dm'): echo 'selected'; endif; ?>>Disaster Management</option>
                                                    <option value="ed" <?php if($department[0] =='ed'): echo 'selected'; endif; ?>>Excise Department </option>
                                                    <option value="finance" <?php if($department[0] =='finance'): echo 'selected'; endif; ?>>Finance</option>

                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="private-emp d-none">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Company/Organisation</label>
                                                <input type="text" class="form-control" name="companyorganisation"placeholder="Company/Organisation" value="<?php echo $companyorganisation[0]; ?>"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Designation</label>
                                                <input type="text" class="form-control" name="designation" placeholder="Designation" value="<?php echo $designation[0]; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="self-emp d-none">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Company/Organisation</label>
                                                <input type="text" class="form-control"  name="self_companyorganisation" placeholder="Company/Organisation" value="<?php echo $self_companyorganisation[0]; ?>"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Designation</label>
                                                <input type="text" class="form-control" name="self_designation" placeholder="Designation" value="<?php echo $self_designation[0]; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-type-student d-none">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Institution/Organization</label>
                                            <input type="text" class="form-control" name="institutionorganization"placeholder="Institution/Organization" value="<?php echo $institutionorganization[0]; ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Currently Pursing course</label>
                                            <input type="text" class="form-control" name="currently_pursing_course" placeholder="Currently Pursing course" value="<?php echo $currently_pursing_course[0]; ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-type-job d-none">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>For what job you are searching for</label>
                                            <input type="text" class="form-control" name="for_what" placeholder="For what job you are searching for" value="<?php echo $for_what[0]; ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Your highest qualification</label>
                                            <input type="text" class="form-control" name="h_qualification"placeholder="Your highest qualification" value="<?php echo $h_qualification[0]; ?>" />
                                        </div>
                                    </div>
                                  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                             <label>Academic Percentage</label>
                                            <input type="text" class="form-control" name="academic_percentage" placeholder="Academic Percentage" value="<?php echo $academic_percentage[0]; ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Technical  Training /Diploma /cer</label>
                                            <input type="text" class="form-control" name="technical_training" placeholder="Technical  Training /Diploma /cer" value="<?php echo $technical_training[0]; ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pass out year</label>
                                            <input type="text" class="form-control" name="pass_out_year" placeholder="Pass out year" value="<?php echo $pass_out_year[0]; ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Previous job experience</label>
                                            <select class="form-control job-exp" name="previous_job_exp">
                                                <option value="yes"<?php if($job_exp[0] =='yes'): echo 'selected'; endif; ?>>Yes</option>
                                                <option value="no"<?php if($job_exp[0] =='no'): echo 'selected'; endif; ?>>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                               
                                <div class="form-group" id="pre-job-exp">
                                    <label>Previous job experience</label>
                                    <textarea class="form-control" name="specify_experience" placeholder="Previous job experience"><?php echo $specify_experience[0]; ?></textarea>
                                </div>
                                
                            </div>

                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="profession-container d-flex flex-column">
                    <fieldset>
                        <div class="form-heading text-center">
                            <h4>ADDRESS</h4>
                        </div>
                        <div class="form-box">
                            <div class="address-box-upper">
                                <p>WORK</p>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>PINCODE</label>
                                            <input type="text" class="form-control" name="pin_code" placeholder="PINCODE" value="<?php echo $pin_code[0]; ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label>ADDRESS</label>
                                            <input type="text" class="form-control" name="address" placeholder="ADDRESS" value="<?php echo $work_add; ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>CITY</label>
                                            <input type="text" class="form-control" name="city" placeholder="CITY" value="<?php echo $city[0]; ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>REGION</label>
                                            <input type="text" class="form-control" name="region" placeholder="REGION" value="<?php echo $region[0]; ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>DISTRICT</label>
                                            <input type="text" class="form-control" name="district" placeholder="DISTRICT" name="district" value="<?php echo $district[0]; ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>STATE</label>
                                            <input type="text" class="form-control" placeholder="STATE" name="state"value="<?php echo $state[0]; ?>"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="address-box-lower">
                                <p>HOME</p>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>PINCODE</label>
                                            <input type="text" class="form-control" name="home_pin_code" placeholder="PINCODE" value="<?php echo $home_pin_code[0]; ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>ADDRESS</label>
                                                <input type="text" class="form-control" placeholder="ADDRESS" name="home_address" id="home_add" value="<?php echo $home_address[0]; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>CITY</label>
                                            <input type="text" class="form-control" placeholder="CITY" name="home_city" value="<?php echo $home_city[0]; ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>REGION</label>
                                            <input type="text" class="form-control" placeholder="REGION" name="home_region" value="<?php echo $home_region[0]; ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>DISTRICT</label>
                                            <input type="text" class="form-control" placeholder="DISTRICT" name="home_district" value="<?php echo $home_district[0]; ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>STATE</label>
                                            <input type="text" class="form-control" placeholder="STATE" name="home_state" value="<?php echo $home_state[0]; ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Latitude</label>
                                            <input type="text" class="form-control remove-attr" id=""placeholder="Latitude" name="latitude" <?php if(!empty($latitude)): echo 'value="'.$latitude.'"'; endif; ?>/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Longitude</label>
                                            <input type="text" class="form-control remove-attr" id="longitude" placeholder="Longitude" name="longitude" <?php if(!empty($longitude)): echo 'value="'.$longitude.'"'; endif; ?>/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group  mt-5">
                                            <a href="javascript:void(0)" class="btn-hover color-2 fetch-address">Fetch Address</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <p class="append-message"></p>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <fieldset>
                    <div class="form-box">
                        <div class="form-group">
                            <label>HOW DO YOU WANT TO CONTRIBUTE</label>
                            <select class="form-control contribute" name="want_to_contribute">
                                  <option value="">HOW DO YOU WANT TO CONTRIBUTE</option>
                                <option value="time" <?php if($want_to_contribute[0] =='time'): echo 'selected'; endif; ?>>Time: -Alumni can contribute time to educate, support and participate in empowering communities.</option>
                                <option value="treasure" <?php if($want_to_contribute[0] =='treasure'): echo 'selected'; endif; ?>>Treasure: - Alumni can contribute on regular basis/event basis/annuanlly/ to sweroes international org. which has 80g (all donation is tax exemption).</option>
                                <option value ="talent" <?php if($want_to_contribute[0] =='talent'): echo 'selected'; endif; ?>>Talent:-Alumni can mentor or organize ideological meetings throughout the year to pass on professional and intellectual skills</option>
                            </select>
                        </div>
                        <div class="form-group describe-about-you">
                            <label>ABOUT YOU (IN 100 WORDS)</label>
                            <textarea class="form-control" name="about_you" placeholder="ABOUT YOU (IN 100 WORDS)"><?php echo $about_you[0]; ?></textarea>
                        </div>
                        <div class="form-group mb-0">
                            <div class="submit-btn text-center">
                                <input class="btn-hover color-1" type="submit" name="update-save" value="Save" />
                                <input id="sumbit" class="btn-hover color-1" type="submit" name="post-update" value="Submit" />
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
        </form>
    </div>
    <?php endwhile; else : ?>
    <div class="container">
        <div class="row">
            <div class="col-12 m-auto mb-30 text-right">
                <a class="btn btn-hover color-1" href="<?php echo wp_logout_url(home_url('/')); ?>">Logout</a>
            </div>
        </div>
        <?php 
        if($_POST['post_save']=='Save'){ ;
        $email = $_POST['email'];
        header("Refresh: 0");
        $father_name = $_POST['father_name'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $blood_group = $_POST['blood_group'];
        $marital_status = $_POST['marital_status'];
        $caste = $_POST['caste'];
        $nationality = $_POST['nationality'];
        $contact_number = $_POST['contact_number'];
        $alternate_number = $_POST['alternate_number'];

        $college_tswreis = $_POST['college_tswreis'];
        $college_apswreis = $_POST['college_apswreis'];
        $district_name = $_POST['district_name'];
        $school_name_with_address = $_POST['school_name_with_address'];
        $joining_date = $_POST['joining_date'];
        $passout_date = $_POST['passout_date'];
        $degree_college_tswreis = $_POST['degree_college_tswreis'];
        $degree_joining_date = $_POST['degree_joining_date'];
        $degree_passout_date = $_POST['degree_passout_date'];
        $highest_qualification = $_POST['highest_qualification'];

        $profession = $_POST['profession'];
        $working = $_POST['working'];
        $doctor = $_POST['doctor'];
        $government = $_POST['government'];
        $department = $_POST['department'];

        $companyorganisation = $_POST['companyorganisation'];
        $designation = $_POST['designation'];
        $self_designation = $_POST['self_designation'];
        $self_companyorganisation = $_POST['self_companyorganisation'];
        $for_what = $_POST['for_what'];
        $h_qualification = $_POST['h_qualification'];
        $academic_percentage = $_POST['academic_percentage'];
        $pass_out_year = $_POST['pass_out_year'];
        $previous_job_exp = $_POST['previous_job_exp'];
        $specify_experience = $_POST['specify_experience'];
        $institutionorganization = $_POST['institutionorganization'];
        $currently_pursing_course = $_POST['currently_pursing_course'];
        $technical_training = $_POST['technical_training'];
        $telangana_address = $_POST['telangana_address'];
        $residential_degree_cls_add = $_POST['residential_degree_cls_add'];

        

        $pin_code = $_POST['pin_code'];
        $address = $_POST['address'];
        $region = $_POST['region'];
        $city = $_POST['city'];
        $district = $_POST['district'];
        $state = $_POST['state'];

        $home_pin_code = $_POST['home_pin_code'];
        $home_address = $_POST['home_address'];
        $home_region = $_POST['home_region'];
        $home_city = $_POST['home_city'];
        $home_district = $_POST['home_district'];
        $home_state = $_POST['home_state'];

        $want_to_contribute = $_POST['want_to_contribute'];
        $about_you =$_POST['about_you'];
        $d_school_name_with_address =$_POST['d_school_name_with_address'];


        $school_apswreis = $_POST['school_apswreis'];
        $school_apswreis_address = $_POST['school_apswreis_address'];
        $school_tswreis = $_POST['school_tswreis'];
        $school_tswreis_address = $_POST['school_tswreis_address'];
        $school_joining_date = $_POST['school_joining_date'];
        $school_passout_date = $_POST['school_passout_date'];

        $school_add = $_POST['school_add'];
        $studies_group = $_POST['studies_group'];
        $degree_cls_name = $_POST['degree_cls_name'];

        $andhra_passout_year = $_POST['andhra_passout_year'];
        $andhra_joining_year = $_POST['andhra_joining_year'];
        $joining_date_andhra = $_POST['joining_date_andhra'];
        $passout_date_andhra = $_POST['passout_date_andhra'];

        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
       


        $id = wp_insert_post(
            array(
                'post_title'=>$_POST['post_title'], 
                'post_type'=>'alumni_record', 
                'post_status' => 'draft',
                'comment_status' => 'closed',
                'ping_status' => 'closed',
                )
            );
        }

        if($_POST['post_submit']=='Sumbit'){ ;
        header("Refresh: 0");

        // Sending email to user to ensure that his/her registration request has been send
        $current_user = wp_get_current_user();
        $email = $current_user->user_email;
        $subject = get_bloginfo('name');
        $body = 'Your registration request send';
        $headers = array('Content-Type: text/html; charset=UTF-8');
        wp_mail($email, $subject, $body, $headers);

        // Sending email to admin to notify new registation request
        $admin_email = get_bloginfo('admin_email');
        $subject = get_bloginfo('name');
        $body = 'New registration request';
        $headers = array('Content-Type: text/html; charset=UTF-8');
        wp_mail($admin_email, $subject, $body, $headers);


        $father_name = $_POST['father_name'];
        $gender = $_POST['gender'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $dob = $_POST['dob'];
        $blood_group = $_POST['blood_group'];
        $marital_status = $_POST['marital_status'];
        $caste = $_POST['caste'];
        $nationality = $_POST['nationality'];
        $contact_number = $_POST['contact_number'];
        $alternate_number = $_POST['alternate_number'];

        $college_tswreis = $_POST['college_tswreis'];
        $college_apswreis = $_POST['college_apswreis'];
        $district_name = $_POST['district_name'];
        $school_name_with_address = $_POST['school_name_with_address'];
        $joining_date = $_POST['joining_date'];
        $passout_date = $_POST['passout_date'];
        $degree_college_tswreis = $_POST['degree_college_tswreis'];
        $degree_joining_date = $_POST['degree_joining_date'];
        $degree_passout_date = $_POST['degree_passout_date'];
        $highest_qualification = $_POST['highest_qualification'];

        $profession = $_POST['profession'];
        $working = $_POST['working'];
        $doctor = $_POST['doctor'];
        $government = $_POST['government'];
        $department = $_POST['department'];

        $companyorganisation = $_POST['companyorganisation'];
        $designation = $_POST['designation'];
        $self_designation = $_POST['self_designation'];
        $self_companyorganisation = $_POST['self_companyorganisation'];
        $for_what = $_POST['for_what'];
        $h_qualification = $_POST['h_qualification'];
        $academic_percentage = $_POST['academic_percentage'];
        $pass_out_year = $_POST['pass_out_year'];
        $previous_job_exp = $_POST['previous_job_exp'];
        $specify_experience = $_POST['specify_experience'];
        $institutionorganization = $_POST['institutionorganization'];
        $currently_pursing_course = $_POST['currently_pursing_course'];
        $technical_training = $_POST['technical_training'];
        $telangana_address = $_POST['telangana_address'];
        $residential_degree_cls_add = $_POST['residential_degree_cls_add'];

        

        $pin_code = $_POST['pin_code'];
        $address = $_POST['address'];
        $region = $_POST['region'];
        $city = $_POST['city'];
        $district = $_POST['district'];
        $state = $_POST['state'];

        $home_pin_code = $_POST['home_pin_code'];
        $home_address = $_POST['home_address'];
        $home_region = $_POST['home_region'];
        $home_city = $_POST['home_city'];
        $home_district = $_POST['home_district'];
        $home_state = $_POST['home_state'];

        $want_to_contribute = $_POST['want_to_contribute'];
        $about_you =$_POST['about_you'];
        $d_school_name_with_address =$_POST['d_school_name_with_address'];


        $school_apswreis = $_POST['school_apswreis'];
        $school_apswreis_address = $_POST['school_apswreis_address'];
        $school_tswreis = $_POST['school_tswreis'];
        $school_tswreis_address = $_POST['school_tswreis_address'];
        $school_joining_date = $_POST['school_joining_date'];
        $school_passout_date = $_POST['school_passout_date'];

        $school_add = $_POST['school_add'];
        $studies_group = $_POST['studies_group'];
        $degree_cls_name = $_POST['degree_cls_name'];


        $andhra_passout_year = $_POST['andhra_passout_year'];
        $andhra_joining_year = $_POST['andhra_joining_year'];
        $joining_date_andhra = $_POST['joining_date_andhra'];
        $passout_date_andhra = $_POST['passout_date_andhra'];
       


        $id = wp_insert_post(
            array(
                'post_title'=>$_POST['post_title'], 
                'post_type'=>'alumni_record', 
                'post_status' => 'pending',
                'comment_status' => 'closed',
                'ping_status' => 'closed',
                )
            );
        }

        add_post_meta($id, 'school_add', $school_add, true);
        add_post_meta($id, 'studies_group', $studies_group, true);
        add_post_meta($id, 'degree_cls_name', $degree_cls_name, true);


        add_post_meta($id, 'school_apswreis', $school_apswreis, true);
        add_post_meta($id, 'school_apswreis_address', $school_apswreis_address, true);
        add_post_meta($id, 'school_tswreis', $school_tswreis, true);
        add_post_meta($id, 'school_tswreis_address', $school_tswreis_address, true);
        add_post_meta($id, 'school_joining_date', $school_joining_date, true);
        add_post_meta($id, 'school_passout_date', $school_passout_date, true);

        add_post_meta($id, 'email', $email, true);
        add_post_meta($id, 'father_name', $father_name, true);
        add_post_meta($id, 'gender', $gender, true);
        add_post_meta($id, 'dob', $dob, true);
        add_post_meta($id, 'blood_group', $blood_group, true);
        add_post_meta($id, 'marital_status', $marital_status, true);

        add_post_meta($id, 'caste', $caste, true);
        add_post_meta($id, 'nationality', $nationality, true);
        add_post_meta($id, 'contact_number', $contact_number, true);
        add_post_meta($id, 'alternate_number', $alternate_number, true);
        add_post_meta($id, 'college_tswreis', $college_tswreis, true);
        add_post_meta($id, 'college_apswreis', $college_apswreis, true);
        add_post_meta($id, 'district_name', $district_name, true);
        add_post_meta($id, 'school_name_with_address', $school_name_with_address, true);
        add_post_meta($id, 'joining_date', $joining_date, true);
        add_post_meta($id, 'passout_date', $passout_date, true);
        add_post_meta($id, 'degree_college_tswreis', $degree_college_tswreis, true);
        add_post_meta($id, 'degree_joining_date', $degree_joining_date, true);
        add_post_meta($id, 'degree_passout_date', $degree_passout_date, true);
        add_post_meta($id, 'highest_qualification', $highest_qualification, true);


        add_post_meta($id, 'profession', $profession, true);
        add_post_meta($id, 'working', $working, true);
        add_post_meta($id, 'job_type', $job_type, true);
        add_post_meta($id, 'government', $government, true);
        add_post_meta($id, 'department', $department, true);



        add_post_meta($id, 'companyorganisation', $companyorganisation, true);
        add_post_meta($id, 'designation', $designation, true);
        add_post_meta($id, 'self_designation', $self_designation, true);
        add_post_meta($id, 'self_companyorganisation', $self_companyorganisation, true);
        add_post_meta($id, 'for_what', $for_what, true);
        add_post_meta($id, 'h_qualification', $h_qualification, true);

        add_post_meta($id, 'academic_percentage', $academic_percentage, true);
        add_post_meta($id, 'pass_out_year', $pass_out_year, true);
        add_post_meta($id, 'previous_job_exp', $previous_job_exp, true);
        add_post_meta($id, 'specify_experience', $specify_experience, true);
        add_post_meta($id, 'institutionorganization', $institutionorganization, true);
        add_post_meta($id, 'currently_pursing_course', $currently_pursing_course, true);
        add_post_meta($id, 'technical_training', $technical_training, true);
        add_post_meta($id, 'telangana_address', $telangana_address, true);
        add_post_meta($id, 'residential_degree_cls_add', $residential_degree_cls_add, true);

        add_post_meta($id, 'pin_code', $pin_code, true);
        add_post_meta($id, 'address', $address, true);
        add_post_meta($id, 'region', $region, true);
        add_post_meta($id, 'city', $city, true);
        add_post_meta($id, 'district', $district, true);
        add_post_meta($id, 'state', $state, true);

        add_post_meta($id, 'home_pin_code', $home_pin_code, true);
        add_post_meta($id, 'home_address', $home_address, true);
        add_post_meta($id, 'home_region', $home_region, true);
        add_post_meta($id, 'home_city', $home_city, true);
        add_post_meta($id, 'home_district', $home_district, true);
        add_post_meta($id, 'home_state', $home_state, true);

        add_post_meta($id, 'want_to_contribute', $want_to_contribute, true);
        add_post_meta($id, 'about_you', $about_you, true);
        add_post_meta($id, 'residential_welfare', $residential_welfare, true);
        add_post_meta($id, 'd_school_name_with_address', $d_school_name_with_address, true);

        add_post_meta($id, 'andhra_passout_year', $andhra_passout_year, true);
        add_post_meta($id, 'andhra_joining_year', $andhra_joining_year, true);
        add_post_meta($id, 'joining_date_andhra', $joining_date_andhra, true);
        add_post_meta($id, 'passout_date_andhra', $passout_date_andhra, true);
        add_post_meta($id, 'latitude', $latitude, true);
        add_post_meta($id, 'longitude', $longitude, true);
       
        

        require_once(ABSPATH . "wp-admin" . '/includes/image.php');
        require_once(ABSPATH . "wp-admin" . '/includes/file.php');
        require_once(ABSPATH . "wp-admin" . '/includes/media.php');
        $attachment_id = media_handle_upload('file', $post_id);
        if (!is_wp_error($attachment_id)) { 
            set_post_thumbnail($id, $attachment_id);
        }

        ?>
        <form id="registration" name="registration" method="post" action="<?php echo get_page_link('/') ?>" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12">
                <fieldset>
                    <div class="form-heading text-center">
                        <h4>Basic Information</h4>
                    </div>
                    <div class="form-box">
                        <div class="form-content d-flex flex-wrap flex-md-row-reverse">
                            <div class="form-content-right">
                               <div class="avatar-upload">
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url(<?php echo IMG.'default-pic.jpg'; ?>);"></div>
                                        <div class="avatar-edit">
                                            <input type="file" name="file" class="sr-only" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload">upload photo</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-content-left">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="post_title" name="post_title" placeholder="FULL NAME"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="EMAIL"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="father_name" name="father_name" placeholder="FATHER NAME"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="form-control" id="gender" name="gender">
                                                <option value="">GENDER</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-content">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="date" id="dob" name="dob" min="1984-01-01" max="2014-12-31" class="form-control" placeholder="DATE OF BIRTH"/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control" id="blood_group" name="blood_group">
                                          <option value="">BLOOD GROUP</option>
                                          <option value="a+">A Positive (A+)</option>
                                          <option value="a-">A  Negative (A-)</option>
                                          <option value="b+">B Positive (B+)</option>
                                          <option value="b-">B Negative (B-)</option>
                                          <option value="o+">O Positive (O+)</option>
                                          <option value="o-">O Negative (O-)</option>
                                          <option value="ab+">AB Positive (AB+)</option>
                                          <option value="ab-">AB Negative (AB-)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control" id="marital_status" name="marital_status">
                                            <option value="">MARITAL STATUS</option>
                                            <option value="single">Single</option>
                                            <option value="married">Married</option>
                                            <option value="other">Other</option>    
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control" id="caste" name="caste">
                                        <option value="">Caste</option>
                                        <option value="sc">SC</option> 
                                        <option value="st">ST</option>
                                        <option value="ob">BC</option>
                                        <option value="bc">OC</option>
                                        <option value="others">Others</option>  
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control" id="nationality" name="nationality">
                                            <option value="">NATIONALITY</option>
                                            <option value="indian">Indian</option>
                                            <option value="nri">NRI</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                         <input type="tel" class="form-control" id="contact_number" name="contact_number" placeholder="CONTACT NUMBER"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control"  id="alternate_number" name="alternate_number" placeholder="ALTERNATE WHATSAPP NUMBER" />
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-heading text-center">
                        <h4>Education Information</h4>
                    </div>
                    <div class="form-box">
                        <div class="form-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="radio-box d-flex align-itemsl-g-center ">
                                            <p>School (TSWREIS)</p>
                                            <div class="radiobuttons d-flex">
                                                <div class="rdio rdio-primary radio-inline">
                                                    <input name="school_add" value="yes" id="radio111" type="radio" checked>
                                                    <label for="radio111">YES</label>
                                                </div>
                                                <div class="rdio rdio-primary radio-inline">
                                                    <input name="school_add" value="no" id="radio2222" type="radio">
                                                    <label for="radio2222">NO</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="school-name">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="radio-box d-flex custom-radio-box align-items-lg--center ">
                                                <div class="radiobuttons d-flex custom-radio-buttons">
                                                    <div class="rdio rdio-primary radio-inline custom-radio-list text-center">
                                                        <input name="school_location" value="telangana_school" id="radio444" type="radio" checked>
                                                        <label for="radio444">STUDIED IN TELANGANA SOCIAL WELFARE RESIDENTIAL EDUCATION institution SOCITY TSWREIS</label>
                                                    </div>
                                                    <div class="rdio rdio-primary radio-inline custom-radio-list text-center">
                                                        <input name="school_location" value="andhara_school" id="radio333" type="radio" >
                                                        <label for="radio333">STUDIED IN Andhra Pradesh SOCIAL WELFARE RESIDENTIAL EDUCATION institution SOCITY APSWREIS</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group dist-default">
                                            <select class="form-control" name="school_apswreis">
                                                <option value="">DISTRICT NAME</option>
                                                <option value="anathapur" data-dist="anathapur">Anathapur</option>
                                                <option value="chittor" data-dist="chittor">Chittor</option>
                                                <option value="eastgodavari" data-dist="eastgodavari">EastGodavari</option>
                                                <option value="guntur" data-dist="guntur">Guntur</option>
                                                <option value="kadapa" data-dist="kadapa">Kadapa</option>
                                                <option value="krishna" data-dist="krishna">Krishna</option>
                                                <option value="kurnool" data-dist="kurnool">Kurnool</option>
                                                <option value="nellore" data-dist="nellore">Nellore</option>
                                                <option value="srikakulam" data-dist="srikakulam">Srikakulam</option>
                                                <option value="visakhapatnam" data-dist="visakhapatnam">Visakhapatnam</option>
                                                <option value="vizianagram" data-dist="vizianagram">Vizianagram</option>
                                                <option value="west-godavari" data-dist="west-godavari">West Godavari</option>
                                            </select>
                                        </div>
                                        <?php
                                        $data_json = file_get_contents(THEMEDIR.'/include/json/tswr-institutions-addresses.json');
                                        if($data_json !== false AND !empty($data_json)):
                                        ?>
                                        <div class="form-group dist-hidden d-none">
                                            <select class="form-control school-dist" name="school_tswreis">

                                                <option value="">DISTRICT NAME</option>
                                                <?php
                                                $array = json_decode($data_json);
                                                $res = array();
                                               foreach ($array as $each) {
                                                    if (isset($res[$each->District]))
                                                        array_push($res[$each->District], $each->task);
                                                    else
                                                        $res[$each->District] = array($each->task);
                                                }
                                                foreach ($res as $District => $tasks):
                                                ?>
                                                <option value="<?php  echo sanitize_title($District); ?>" data-dist="<?php echo sanitize_title($District); ?>">
                                                    <?php echo $District; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group add-default">
                                            <select class="form-control" name="school_apswreis_address">
                                                <option value="">SCHOOL NAME WITH ADDRESS</option>
                                                <option value="test"> TSWRS/JC(G) COE,AdilabadOpp. SP Camp Office Adilabad, PIN : 504001</option>
                                            </select>
                                        </div>
                                        <div class="form-group d-none add-hidden">
                                            <?php
                                            $data_json = file_get_contents(THEMEDIR.'/include/json/tswr-institutions-addresses.json');
                                            if($data_json !== false AND !empty($data_json)):
                                            
                                            ?>
                                            <select class="form-control school-address" name="school_tswreis_address">
                                                <option value="">SCHOOL NAME WITH ADDRESS</option>
                                                <?php 
                                                $data_arr = json_decode($data_json, true);
                                                foreach ($data_arr as $key => $value): 
                                                ?>
                                                <option value="<?php echo $value['InstitutionWithFullAddress']; ?>" data-dist="<?php echo sanitize_title($value['District']); ?>">
                                                    <?php echo $value['InstitutionWithFullAddress']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                   <div class="col-md-3 telangana-join-year-school">
                                        <div class="form-group">
                                            <label>JOINING YEAR</label>
                                            <select class="form-control" name="school_joining_date">
                                                <option value="">JOINING YEAR</option>
                                                <?php
                                                $start =  2014;
                                                $now   = new DateTime;
                                                $now->modify('+1 years');
                                                $end = $now->format('Y');
                                                for( $year= $start; $year < $end; $year++ ){ ?>
                                                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                               <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 telangana-passout-year-school">
                                        <div class="form-group">
                                            <label>PASSED OUT YEAR</label>
                                            <select class="form-control" name="school_passout_date">
                                            <option value="">PASSED OUT YEAR</option>
                                                <?php
                                                $start =  2016;
                                                $now = new DateTime;
                                                $now->modify('+3 years');
                                                $end = $now->format('Y');
                                                for( $year= $start; $year < $end; $year++ ){ ?>
                                                    <option value="<?php echo $year; ?>"><?php echo $year;?></option>
                                               <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 andhra-join-year-school d-none">
                                        <div class="form-group">
                                            <label>JOINING YEAR</label>
                                            <select class="form-control" name="andhra_joining_year">
                                                <option value="">JOINING YEAR</option>
                                                <?php
                                                $start =  1984;
                                                $end = 2014;
                                                for( $year= $start; $year < $end; $year++ ){ ?>
                                                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                               <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 andhra-passout-year-school d-none">
                                        <div class="form-group">
                                            <label>PASSED OUT YEAR</label>
                                            <select class="form-control" name="andhra_passout_year">
                                            <option value="">PASSED OUT YEAR</option>
                                                <?php
                                                $start =  1986;
                                                $end = 2016;
                                                for( $year= $start; $year < $end; $year++ ){ ?>
                                                    <option value="<?php echo $year; ?>"><?php echo $year;?></option>
                                               <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-box">
                        <div class="form-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="radio-box d-flex align-itemsl-g-center">
                                            <p>College (TSWREIS) </p>
                                            <div class="radiobuttons d-flex">
                                                <div class="rdio rdio-primary radio-inline">
                                                    <input name="studies_group" value="yes" id="radio1" type="radio" checked />
                                                    <label for="radio1">YES</label>
                                                </div>
                                                <div class="rdio rdio-primary radio-inline">
                                                    <input name="studies_group" value="no" id="radio2" type="radio" />
                                                    <label for="radio2">NO</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="studies-option">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="radio-box d-flex custom-radio-box align-items-lg--center">
                                            <div class="radiobuttons d-flex custom-radio-buttons">
                                                <div class="rdio rdio-primary radio-inline custom-radio-list text-center">
                                                    <input name="cls_group" value="telangana_welfare" id="radio4" type="radio" checked/>
                                                    <label for="radio4">STUDIED IN TELANGANA SOCIAL WELFARE RESIDENTIAL EDUCATION institution SOCITY TSWREIS</label>
                                                </div>
                                                <div class="rdio rdio-primary radio-inline custom-radio-list text-center">
                                                    <input name="cls_group" value="andhara_welfare" id="radio3" type="radio" />
                                                    <label for="radio3">STUDIED IN Andhra Pradesh SOCIAL WELFARE RESIDENTIAL EDUCATION institution SOCITY APSWREIS</label>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 apswreis">
                                    <div class="form-group">
                                        <select class="form-control college_apswreis" name="college_apswreis">
                                            <option value="">DISTRICT NAME</option>
                                            <option value="anathapur" data-dist="anathapur">Anathapur</option>
                                            <option value="chittor" data-dist="chittor">Chittor</option>
                                            <option value="eastgodavari" data-dist="eastgodavari">EastGodavari</option>
                                            <option value="guntur" data-dist="guntur">Guntur</option>
                                            <option value="kadapa" data-dist="kadapa">Kadapa</option>
                                            <option value="krishna" data-dist="krishna">Krishna</option>
                                            <option value="kurnool" data-dist="kurnool">Kurnool</option>
                                            <option value="nellore" data-dist="nellore">Nellore</option>
                                            <option value="srikakulam" data-dist="srikakulam">Srikakulam</option>
                                            <option value="visakhapatnam" data-dist="visakhapatnam">Visakhapatnam</option>
                                            <option value="vizianagram" data-dist="vizianagram">Vizianagram</option>
                                            <option value="west-godavari" data-dist="west-godavari">West Godavari</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 d-none tswreis">
                                    <div class="form-group">
                                        <?php
                                        $data_json = file_get_contents(THEMEDIR.'/include/json/tswr-institutions-addresses.json');
                                        if($data_json !== false AND !empty($data_json)):
                                        
                                        ?>
                                        <select class="form-control tswreis-cls" name="college_tswreis" >
                                            <option value="">DISTRICT NAME</option>
                                            <?php
                                            $array = json_decode($data_json);
                                            $res = array();
                                           foreach ($array as $each) {
                                                if (isset($res[$each->District]))
                                                    array_push($res[$each->District], $each->task);
                                                else
                                                    $res[$each->District] = array($each->task);
                                            }
                                            foreach ($res as $District => $tasks):
                                            ?>
                                            <option value="<?php  echo sanitize_title($District); ?>" data-dist="<?php echo sanitize_title($District); ?>">
                                                <?php echo $District; ?></option>
                                            <?php endforeach; ?>
                                            
                                        </select>
                                       <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group apswreis">
                                        <select class="form-control" name="telangana_address">
                                            <option value="">SCHOOL NAME WITH ADDRESS</option>
                                            <option value="test"> TSWRS/JC(G) COE,AdilabadOpp. SP Camp Office Adilabad, PIN : 504001</option>
                                        </select>
                                    </div>
                                    <div class="form-group d-none tswreis">
                                        <?php
                                        $data_json = file_get_contents(THEMEDIR.'/include/json/tswr-institutions-addresses.json');
                                        if($data_json !== false AND !empty($data_json)):
                                        
                                        ?>
                                        <select class="form-control address" name="school_name_with_address">
                                            <option >SCHOOL NAME WITH ADDRESS</option>
                                            <?php 
                                            $data_arr = json_decode($data_json, true);
                                            foreach ($data_arr as $key => $value): 
                                            ?>
                                            <option value="<?php echo $value['InstitutionWithFullAddress']; ?>" data-dist="<?php  echo sanitize_title($value['District']); ?>">
                                                <?php echo $value['InstitutionWithFullAddress']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-3 telangana-join-year-cls">
                                    <div class="form-group">
                                        <label>JOINING YEAR</label>
                                        <select class="form-control" name="joining_date">
                                             <option value="">JOINING YEAR</option>
                                           <?php
                                            $start =  2014;
                                            $now   = new DateTime;
                                            $now->modify('+1 years');
                                            $end = $now->format('Y');
                                            for($year= $start; $year < $end; $year++ ){ 
                                                ?>
                                                 <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 telangana-passout-year-cls">
                                    <div class="form-group">
                                        <label>Passout YEAR</label>
                                        <select class="form-control" name="passout_date">
                                            <option value="">Passout YEAR</option>
                                            <?php
                                            $start =  2016;
                                            $now   = new DateTime;
                                            $now->modify('+3 years');
                                            $end = $now->format('Y');
                                            for($year= $start; $year < $end; $year++ ){ 
                                                ?>
                                                 <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 andhra-join-year-cls d-none">
                                    <div class="form-group">
                                        <label>JOINING YEAR</label>
                                        <select class="form-control" name="joining_date_andhra">
                                             <option value="">JOINING YEAR</option>
                                           <?php
                                            $start =  1984;
                                            $end = 2016;
                                            for($year= $start; $year < $end; $year++ ){ 
                                                ?>
                                                 <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 andhra-passout-year-cls d-none">
                                    <div class="form-group">
                                        <label>Passout YEAR</label>
                                        <select class="form-control" name="passout_date_andhra">
                                            <option value="">Passout YEAR</option>
                                            <?php
                                            $start =  1986;
                                            $end = 2016;
                                            for($year= $start; $year < $end; $year++ ){ 
                                                ?>
                                                 <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-box">
                        <div class="form-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="radio-box d-flex align-itemsl-g-center">
                                            <p>Degree college (TSWRDC) </p>
                                            <div class="radiobuttons d-flex">
                                                <div class="rdio rdio-primary radio-inline">
                                                    <input name="degree_cls_name" value="yes" id="radio5" type="radio" checked />
                                                    <label for="radio5">YES</label>
                                                </div>
                                                <div class="rdio rdio-primary radio-inline">
                                                    <input name="degree_cls_name" value="no" id="radio6" type="radio" />
                                                    <label for="radio6">NO</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="degree-option">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="radio-box d-flex custom-radio-box align-items-lg--center">
                                            <div class="radiobuttons d-flex custom-radio-buttons">
                                               
                                                <div class="rdio rdio-primary radio-inline custom-radio-list text-center">
                                                    <input name="d_cls_group" value="degree_cls_welfare" id="radio8" type="radio" checked />
                                                    <label for="radio8">Studied in social welfare DEGREE COLLEGE</label>
                                                </div>
                                                <!--  <div class="rdio rdio-primary radio-inline custom-radio-list text-center">
                                                    <input name="d_cls_group" value="residential_cls_welfare" id="radio9" type="radio"  />
                                                    <label for="radio9">Studied in social welfare Residential ScHool</label>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 degree_cls_option">
                                    <div class="form-group">
                                        <?php
                                        $data_json = file_get_contents(THEMEDIR.'/include/json/degree-colleges-address.json');
                                        if($data_json !== false AND !empty($data_json)):
                                        
                                        ?>
                                        <select class="form-control" id="degree_college_tswreis" name="degree_college_tswreis">
                                            <option value="">DISTRICT NAME</option>
                                            <?php 
                                            $data_arr = json_decode($data_json, true);
                                            foreach ($data_arr as $key => $value): 
                                            ?>
                                            <option value="<?php  echo sanitize_title($value['TSWRD_College']); ?>" data-dist="<?php echo sanitize_title($value['TSWRD_College']); ?>">
                                                <?php echo $value['TSWRD_College']; ?></option>
                                            <?php endforeach; ?>
                                            
                                        </select>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-4 d-none residential_cls_otption">
                                    <div class="form-group">
                                        <select class="form-control" id="residential_welfare" name="residential_welfare">
                                              <option value="">DISTRICT NAME</option>
                                              <option value="a">A</option>
                                              <option value="b">B</option>
                                              <option value="c">C</option>
                                              <option value="d">D</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group degree_cls_option">
                                         <?php
                                        $data_json = file_get_contents(THEMEDIR.'/include/json/degree-colleges-address.json');
                                        if($data_json !== false AND !empty($data_json)):
                                        
                                        ?>
                                        <select class="form-control" name="d_school_name_with_address" id="d-address">
                                            <option value="">SCHOOL NAME WITH ADDRESS</option>
                                            <?php 
                                            $data_arr = json_decode($data_json, true);
                                            foreach ($data_arr as $key => $value): 
                                            ?>
                                           <option value="<?php echo $value['TSWRD_College_Address']; ?>" data-dist="<?php echo sanitize_title($value['TSWRD_College']); ?>">
                                                <?php echo $value['TSWRD_College_Address']; ?></option>
                                            <?php endforeach; ?>
                                            
                                        </select>
                                    <?php endif; ?>
                                    </div>
                                    <div class="form-group d-none residential_cls_otption">
                                        <select class="form-control" name="residential_degree_cls_add">
                                            <option value="">SCHOOL NAME WITH ADDRESS</option>
                                            <option value="testing">
                                                H.No.23-6-140/1/2,Beside Prisoners Petrol Pump, Hunter Road, Warangal - 506 001</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control" name="degree_joining_date">
                                            <option value="">JOINING YEAR</option>
                                           <?php
                                            $start =  2016;
                                            $now   = new DateTime;
                                            $now->modify('+1 years');
                                            $end = $now->format('Y');
                                            for( $year= $start; $year < $end; $year++ ){ ?>
                                                <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                           <?php } ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control" name="degree_passout_date">
                                            <option value="">PASSED OUT YEAR</option>
                                            <?php
                                            $start = 2018;
                                            $now = new DateTime;
                                            $now->modify('+3 years');
                                            $end = $now->format('Y');
                                            for( $year= $start; $year < $end; $year++ ){ ?>
                                                <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                           <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control" name="highest_qualification" id="highest_qualification">
                                            <option value="">Highest Qualification</option>
                                            <option value="matriculation">Matriculation</option>
                                            <option value="intermediate">Intermediate</option>
                                            <option value="graduate">Graduate</option>
                                            <option value="post-graduate">Post Graduate</option>
                                            <option value="phd">Ph.D</option>   
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="profession-container d-flex flex-column">
                    <fieldset>
                        <div class="form-heading text-center">
                            <h4>Profession</h4>
                        </div>
                        <div class="form-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="radiobuttons d-md-flex pl-0">
                                            <div class="rdio rdio-primary radio-inline">
                                                <input name="profession" value="working" id="radio113" type="radio" checked />
                                                <label for="radio113"><strong>Working</strong> </label>
                                            </div>
                                            <div class="rdio rdio-primary radio-inline">
                                                <input name="profession" value="student" id="radio112" type="radio" />
                                                <label for="radio112"><strong>STUDENT</strong> </label>
                                            </div>
                                            <div class="rdio rdio-primary radio-inline">
                                                <input name="profession" value="job-seeker" id="radio114" type="radio" />
                                                <label for="radio114"><strong>JOB SEEKER</strong> </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-type-working">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <select class="form-control" name="working" id="working">
                                                <option value="doctor">Doctor</option>
                                                <option value="engineer">Engineer</option>
                                                <option value="management">Management</option>
                                                <option value="rawyer">Lawyer</option>
                                                <option value="public-service">Public Service</option>
                                                <option value="chartered-accountant">Chartered Accountant</option>
                                                <option value="entrepreneur">Entrepreneur</option>
                                                <option value="business">Business</option>
                                                <option value="social-service">Social Service</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="radiobuttons d-md-flex pl-0">
                                                <div class="rdio rdio-primary radio-inline">
                                                    <input name="job_type" value="govt" id="radio15" type="radio" checked />
                                                    <label for="radio15"><strong>GOVERMENT</strong> </label>
                                                </div>
                                                <div class="rdio rdio-primary radio-inline">
                                                    <input name="job_type" value="private" id="radio16" type="radio" />
                                                    <label for="radio16"><strong>PRIVATE</strong> </label>
                                                </div>
                                                <div class="rdio rdio-primary radio-inline">
                                                    <input name="job_type" value="self-emp" id="radio17" type="radio" />
                                                    <label for="radio17"><strong>SELF EMPLOYED</strong> </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="govt-emp">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="radiobuttons d-md-flex pl-0">
                                                    <div class="rdio rdio-primary radio-inline">
                                                        <input name="radio11" value="11" id="radio11" type="radio" checked />
                                                        <label for="radio11"><strong>CENTRAL</strong> </label>
                                                    </div>
                                                    <div class="rdio rdio-primary radio-inline">
                                                        <input name="radio11" value="12" id="radio12" type="radio" />
                                                        <label for="radio12"><strong>STATE</strong> </label>
                                                    </div>
                                                    <div class="rdio rdio-primary radio-inline">
                                                        <input name="radio11" value="13" id="radio13" type="radio" />
                                                        <label for="radio13"><strong>PUBLIC</strong> </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <select class="form-control" name="department">
                                                    <option value="">SELECT DEPARTMENT</option>
                                                    <option value="agriculture">Agriculture</option>
                                                    <option value="animal">Animal  Husbandry & Fisheries </option>
                                                    <option value="food-con">Food &Consumer Protection</option> 
                                                    <option value="forest">Forest</option>
                                                    <option value="ga">General Administration</option> 
                                                    <option value="id">Industries Dept</option>
                                                    <option value="handloom">Handloom &Sericulture</option>
                                                    <option value="hrd">Human Resources Development</option>
                                                    <option value="ipr">Information & Public Relations</option> 
                                                    <option value="labour">Labour </option>
                                                    <option value="et">Employment and Training</option>
                                                    <option value="training">Training</option>
                                                    <option value="fisheries">Fisheries</option>
                                                    <option value="ms">Medical Services</option>
                                                    <option value="ss">Social Securities</option>
                                                    <option value="mg">Mines and Geology</option>
                                                    <option value="mi">Minor Irrigation </option>
                                                    <option value="mw">Minority Welfare</option>
                                                    <option value="ns">National Savings</option>
                                                    <option value="ef">Office of the chief Election Officer</option>
                                                    <option value="pr">Panchayat Raj</option>
                                                    <option value="pa">Parliamentary Affairs</option>
                                                    <option value="planning">Planning</option>
                                                    <option value="dairies">Dairies</option>
                                                    <option value="phed">Public Health Engineering dept</option> 
                                                    <option value="rc">Road Construction</option>
                                                    <option value="sw">Social Welfare</option>
                                                    <option value="coal">coal</option>
                                                    <option value="transport">Transport</option>
                                                    <option value="wr">Water Resources</option>
                                                    <option value="cs">Cabinet Secretariat and co-ordination</option> 
                                                    <option value="dm">Disaster Management</option>
                                                    <option value="ed">Excise Department </option>
                                                    <option value="finance">Finance</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="private-emp d-none">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="companyorganisation"placeholder="Company/Organisation "/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="designation" placeholder="Designation "/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="self-emp d-none">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control"  name="self_companyorganisation" placeholder="Company/Organisation " />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="self_designation" placeholder="Designation " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-type-student d-none">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="institutionorganization"placeholder="Institution/Organization" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="currently_pursing_course" placeholder="Currently Pursing course "/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-type-job d-none">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="for_what" placeholder="For what job you are searching for"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="h_qualification"placeholder="Your highest qualification"/>
                                        </div>
                                    </div>
                                  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="academic_percentage" placeholder="Academic Percentage"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="technical_training" placeholder="Technical  Training /Diploma /cer"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="pass_out_year" placeholder="Pass out year" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="form-control job-exp" name="previous_job_exp">
                                                <option value="">Previous job experience</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">no</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                               
                                <div class="form-group d-none" id="pre-job-exp">
                                    <textarea class="form-control" name="specify_experience" placeholder="Previous job experience"></textarea>
                                </div>
                                
                            </div>

                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="profession-container d-flex flex-column">
                    <fieldset>
                        <div class="form-heading text-center">
                            <h4>ADDRESS</h4>
                        </div>
                        <div class="form-box">
                            <div class="address-box-upper">
                                <p>WORK</p>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="pin_code" placeholder="PINCODE"/>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="address" placeholder="ADDRESS"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="city" placeholder="CITY"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="region" placeholder="REGION"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="district" placeholder="DISTRICT" name="district"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="STATE" name="state"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="address-box-lower">
                                <p>HOME</p>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="home_pin_code" placeholder="PINCODE"/>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="ADDRESS" name="home_address" id="home_add"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="CITY" name="home_city" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="REGION" name="home_region"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="DISTRICT" name="home_district" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="STATE" name="home_state" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Latitude</label>
                                            <input type="text" class="form-control remove-attr" id="latitude" placeholder="Latitude" name="latitude" disabled/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Longitude</label>
                                            <input type="text" class="form-control remove-attr" id="longitude" placeholder="Longitude" name="longitude" disabled/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mt-5">
                                            <a href="javascript:void(0)" class="btn-hover color-2 fetch-address">Fetch Address</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <p class="append-message"></p>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <fieldset>
                    <div class="form-box">
                        <div class="form-group">
                            <select class="form-control" name="want_to_contribute" id="want_to_contribute">
                                <option value="">HOW DO YOU WANT TO CONTRIBUTE</option>
                                <option value="time">Time: -Alumni can contribute time to educate, support and participate in empowering communities.</option>
                                <option value="treasure">Treasure: - Alumni can contribute on regular basis/event basis/annuanlly/ to sweroes international org. which has 80g (all donation is tax exemption).</option>
                                <option value ="talent">Talent:-Alumni can mentor or organize ideological meetings throughout the year to pass on professional and intellectual skills</option>
                            </select>
                        </div>
                        <div class="form-group describe-about-you">
                            <textarea class="form-control" name="about_you" placeholder="ABOUT YOU  (IN 100 WORDS)"></textarea>
                        </div>
                        <div class="form-group mb-0">
                            <div class="submit-btn text-center">
                                <input id="save" class="btn-hover color-1 btn-save" type="submit" name="post_save" value="Save" />
                                <input id="sumbit" class="btn-hover color-1 btn-save" type="submit" name="post_submit" value="Sumbit" />
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
        </form>
    </div>
    <?php endif; ?>
</div>
<?php
else:

echo '<script>document.location = "'.home_url('/login/').'";</script>';

endif; 
if(is_user_logged_in()) :
$args =array(
    'post_type'  =>'alumni_record', 
    'post_status' =>'pending',
    'author' => $user_id
);  
$query = new WP_Query($args);
if($query->found_posts > 0 ):
?>
<style>
    .disable-from{pointer-events: none;opacity: 0.5;}
</style>

<?php endif; endif; ?>
<style>
 .avatar-upload {
     position: relative;
     width: 100%;
     height: 100%;

}
 .avatar-upload .avatar-preview {
     width: 100%;
     height: 100%;
     position: relative;
    
     padding-bottom: 38px;
}
 .avatar-upload .avatar-preview > div {
     width: 100%;
     height: 100%;
     background-size: contain;
     background-repeat: no-repeat;
     background-position: center;
}
 .avatar-upload .avatar-preview .avatar-edit {
     position: absolute;
     bottom: 0;
     left: 0;
     z-index: 1;
     height: 38px;
}
 .avatar-upload .avatar-preview .avatar-edit input {
     opacity: 0;
}
 .avatar-upload .avatar-preview .avatar-edit input + label {
     display: inline-block;
     vertical-align: top;
     width: 100%;
     height: 38px;
     background: #848484;
     cursor: pointer;
     display: flex;
     align-items: center;
     justify-content: center;
     text-align: center;
     text-transform: uppercase;
}
label {
    text-transform: uppercase;
    font-size: 16px;
}
.error {
    color: red;
    font-size: 12px;
}
 
</style>
<?php get_footer(); ?>
<script>
    $('input:radio[name="school_add"]').change(
    function(){
        if($(this).is(':checked') && $(this).val() == 'yes') {
          $('#school-name').removeClass('d-none');    
        }else if($(this).is(':checked') && $(this).val() == 'no'){
            $('#school-name').addClass('d-none'); 
        }
    });


    $('input:radio[name="studies_group"]').change(
    function(){
        if($(this).is(':checked') && $(this).val() == 'yes') {
          $('#studies-option').removeClass('d-none');    
        }else if($(this).is(':checked') && $(this).val() == 'no'){
            $('#studies-option').addClass('d-none'); 
        }
    });


    $('input:radio[name="school_location"]').change(
    function(){
        if($(this).is(':checked') && $(this).val() == 'andhara_school') {
            $('.dist-default').removeClass('d-none');
            $('.add-default').removeClass('d-none');
            $('.dist-hidden').addClass('d-none');  
            $('.add-hidden').addClass('d-none');  
            $('.telangana-join-year-school').addClass('d-none');  
            $('.telangana-passout-year-school').addClass('d-none'); 
            $('.andhra-join-year-school').removeClass('d-none');  
            $('.andhra-passout-year-school').removeClass('d-none'); 
        }else if($(this).is(':checked') && $(this).val() == 'telangana_school'){
            $('.dist-hidden').removeClass('d-none');
            $('.add-hidden').removeClass('d-none'); 
            $('.dist-default').addClass('d-none'); 
            $('.add-default').addClass('d-none');
            $('.telangana-join-year-school').removeClass('d-none');  
            $('.telangana-passout-year-school').removeClass('d-none'); 
            $('.andhra-join-year-school').addClass('d-none');  
            $('.andhra-passout-year-school').addClass('d-none'); 
        }
    });

    $('input:radio[name="cls_group"]').change(
    function(){
        if($(this).is(':checked') && $(this).val() == 'andhara_welfare') {
            $('.tswreis').addClass('d-none');
            $('.apswreis').removeClass('d-none'); 
            $('.telangana-join-year-cls').addClass('d-none');  
            $('.telangana-passout-year-cls').addClass('d-none'); 
            $('.andhra-join-year-cls').removeClass('d-none');  
            $('.andhra-passout-year-cls').removeClass('d-none');    
        }else if($(this).is(':checked') && $(this).val() == 'telangana_welfare'){
            $('.tswreis').removeClass('d-none');
            $('.apswreis').addClass('d-none'); 
            $('.telangana-join-year-cls').removeClass('d-none');  
            $('.telangana-passout-year-cls').removeClass('d-none'); 
            $('.andhra-join-year-cls').addClass('d-none');  
            $('.andhra-passout-year-cls').addClass('d-none');
        }
    });

    $('input:radio[name="degree_cls_name"]').change(
    function(){
        if($(this).is(':checked') && $(this).val() == 'yes') {
          $('#degree-option').removeClass('d-none');    
        }else if($(this).is(':checked') && $(this).val() == 'no'){
            $('#degree-option').addClass('d-none'); 
        }
    });


    $('input:radio[name="d_cls_group"]').change(
    function(){
        if($(this).is(':checked') && $(this).val() == 'degree_cls_welfare') {
          $('.degree_cls_option').removeClass('d-none');
          $('.residential_cls_otption').addClass('d-none');    
        }else if($(this).is(':checked') && $(this).val() == 'residential_cls_welfare'){
            $('.degree_cls_option').addClass('d-none');
            $('.residential_cls_otption').removeClass('d-none'); 
        }
    });


    $('input:radio[name="profession"]').change(
    function(){
        if($(this).is(':checked') && $(this).val() == 'working') {
            $('.pro-type-working').removeClass('d-none');
            $('.pro-type-student').addClass('d-none');
            $('.pro-type-job').addClass('d-none');    
        }else if($(this).is(':checked') && $(this).val() == 'student'){
            $('.pro-type-working').addClass('d-none');
            $('.pro-type-student').removeClass('d-none');
            $('.pro-type-job').addClass('d-none'); 
        }else if($(this).is(':checked') && $(this).val() == 'job-seeker'){
            $('.pro-type-working').addClass('d-none');
            $('.pro-type-student').addClass('d-none');
            $('.pro-type-job').removeClass('d-none'); 
        }
    });


     $('input:radio[name="job_type"]').change(
    function(){
        if($(this).is(':checked') && $(this).val() == 'govt') {
          $('.govt-emp').removeClass('d-none');
          $('.private-emp').addClass('d-none');
          $('.self-emp').addClass('d-none'); 
        }else if($(this).is(':checked') && $(this).val() == 'private'){
            $('.govt-emp').addClass('d-none');
            $('.private-emp').removeClass('d-none');
            $('.self-emp').addClass('d-none'); 
        }else if($(this).is(':checked') && $(this).val() == 'self-emp'){
            $('.govt-emp').addClass('d-none');
            $('.private-emp').addClass('d-none');
            $('.self-emp').removeClass('d-none'); 
        }
    });


    $('.job-exp').change(function() {
    var val = $(this).val();
    console.log(val);
    if(val =='yes'){
        $('#pre-job-exp').removeClass('d-none');
    }else if(val =='no'){
         $('#pre-job-exp').addClass('d-none');
    }
    });
    $exp = $(".job-exp" ).val();
   if($exp =='no'){
        $('#pre-job-exp').addClass('d-none');
    }


    var pro_type = $("input[name='profession']:checked").val();
    if(pro_type =='working'){
        $('.pro-type-working').removeClass('d-none');
        $('.pro-type-student').addClass('d-none');
        $('.pro-type-job').addClass('d-none');    
    }else if(pro_type =='student'){
        $('.pro-type-working').addClass('d-none');
        $('.pro-type-student').removeClass('d-none');
        $('.pro-type-job').addClass('d-none');
    }else if(pro_type =='job-seeker'){
        $('.pro-type-working').addClass('d-none');
        $('.pro-type-student').addClass('d-none');
        $('.pro-type-job').removeClass('d-none');
    }

    var job_type = $("input[name='job_type']:checked").val();
    if(job_type =='govt'){
        $('.govt-emp').removeClass('d-none');
        $('.private-emp').addClass('d-none');
        $('.self-emp').addClass('d-none');    
    }else if(job_type =='private'){
        $('.govt-emp').addClass('d-none');
        $('.private-emp').removeClass('d-none');
        $('.self-emp').addClass('d-none');  
    }else if(job_type =='self-emp'){
        $('.govt-emp').addClass('d-none');
        $('.private-emp').addClass('d-none');
        $('.self-emp').removeClass('d-none');  
    }



   function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#imagePreview").css("background-image", "url(" + e.target.result + ")");
                console.log(e);
                $("#imagePreview").hide();
                $("#imagePreview").fadeIn(650);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function () {
        readURL(this);
        let fileName = $(this)
            .val()
            .replace(/.*(\/|\\)/, "");
        if (fileName == "") {
            $(this).next("label").text("upload photo");
        } else {
            $(this).next("label").text(fileName);
        }
    });


   /* $("#sumbit").click(function(){
        $(this).addClass("disable-from");
        localStorage.ClassName = "disable-from";
    });*/
    $(document).ready(function() {
        SetClass();
    });
    function SetClass() {
        $("#registration").addClass(localStorage.ClassName);
    }

    $('#sumbit').click(function() {
         $("#registration").validate({
           rules: {
                post_title: "required",
                email: "required",
                contact_number: "required",
                file: "required",
                father_name: "required",
                gender: "required",
                dob: "required",
                blood_group: "required",
                marital_status: "required",
                caste: "required",
                nationality: "required",
                alternate_number: "required",
                school_apswreis: "required",
                school_tswreis: "required",
                school_apswreis_address: "required",
                school_tswreis_address: "required",
                school_joining_date: "required",
                school_passout_date: "required",
                college_apswreis: "required",
                college_tswreis: "required",
                telangana_address: "required",
                school_name_with_address: "required",
                joining_date: "required",
                passout_date: "required",
                degree_college_tswreis: "required",
                residential_welfare: "required",
                d_school_name_with_address: "required",
                residential_degree_cls_add: "required",
                degree_joining_date: "required",
                degree_passout_date: "required",
                highest_qualification: "required",
                profession: "required",
                working: "required",
                job_type: "required",
                department: "required",
                companyorganisation: "required",
                designation: "required",
                self_companyorganisation: "required",
                self_designation: "required",
                institutionorganization: "required",
                currently_pursing_course: "required",
                for_what: "required",
                h_qualification: "required",
                academic_percentage: "required",
                technical_training: "required",
                pass_out_year: "required",
                previous_job_exp: "required",
                specify_experience: "required",
                pin_code: "required",
                address: "required",
                city: "required",
                region: "required",
                district: "required",
                state: "required",
                home_pin_code: "required",
                home_address: "required",
                home_city: "required",
                home_region: "required",
                home_district: "required",
                home_state: "required",
                want_to_contribute: "required",
                about_you: "required",
                Latitude: "latitude",
                Longitude: "longitude",
            },
            submitHandler: function(form) {
            if (this.valid()){
                  $('#registration').addClass('next');
                  localStorage.ClassName = "disable-from";
                  form.submit();
            } 
          }  
        })
    }); 

    $('#save').click(function() {
         $("#registration").validate({
           rules: {
             post_title: "required",
             email: "required",
             contact_number: "required"
           },
        })
    }); 


    var $dist = $('.tswreis-cls'),
    $address = $('.address'),
    $options = $address.find('option');
    $dist.on('change', function() {
        $address.html($options.filter('[data-dist="'+this.value+'"]'));
    }).trigger('change');


    var $dist_name = $('#degree_college_tswreis'),
    $cls_address = $('#d-address'),
    $d_options = $cls_address.find('option');
    $dist_name.on('change', function() {
        $cls_address.html($d_options.filter('[data-dist="'+this.value+'"]'));
    }).trigger('change');

    var $s_dist = $('.school-dist'),
    $s_address = $('.school-address'),
    $s_options = $s_address.find('option');
    $s_dist.on('change', function() {
        $s_address.html($s_options.filter('[data-dist="'+this.value+'"]'));
    }).trigger('change');


    var school = $("input[name='school_add']:checked").val();
    if(school =='no'){
        $('#school-name').addClass('d-none');
    }else if(school =='yes'){
        $('#school-name').removeClass('d-none');
    }

    var studies = $("input[name='studies_group']:checked").val();
    if(studies =='no'){
        $('#studies-option').addClass('d-none');
    }else if(studies =='yes'){
        $('#studies-option').removeClass('d-none');
    }
    var degree = $("input[name='degree_cls_name']:checked").val();
    //console.log(degree);
    if(degree =='no'){
        $('#degree-option').addClass('d-none');
    }else if(degree =='yes'){
        $('#degree-option').removeClass('d-none');
    }
  
    $(".fetch-address").click(function(){
        const get_address = $('#home_add').val();
        $.ajax({
            url: "https://nominatim.openstreetmap.org/search?q="+get_address+"&format=json",
            type: 'GET',
            cache: false,
            success: function(result) {
                if (result) {
                    //console.log(result);
                    var res = jQuery.isEmptyObject(result);
                    if(res == true){
                        //console.log('empty');
                        $('.remove-attr').prop("disabled", false);
                        $('#longitude').val('');
                        $('#latitude').val('');
                        $(".append-message").empty().append("You can find out your address latitude and longitude from <a href='https://www.latlong.net/convert-address-to-lat-long.html' target='_blank'><u>here</u></a>");
                    }else{
                        //console.log('not empty');
                        var size = Object.keys(result).length;
                        if(size === 1){
                            //console.log('auto fill');
                            var lat = result[0].lat;
                            var long = result[0].lon;
                            $("#longitude").val(long);
                            $("#latitude").val(lat);
                            $('.remove-attr').prop("disabled", false);
                            $('.append-message').empty();
                        }else{
                            //console.log('manually fill');
                            $('.remove-attr').prop("disabled", false);
                            $('#longitude').val('');
                            $('#latitude').val('');
                            $(".append-message").empty().append("You can find out your address latitude and longitude from <a href='https://www.latlong.net/convert-address-to-lat-long.html' target='_blank'><u>here</u></a>");
                        }
                    }
                }
            },
            error: function() {
                console.log("No");
            }
        });
    });
</script>