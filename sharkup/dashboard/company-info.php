<?php 
// if(is_user_logged_in()):

$step = 0;

$price = $_POST['price'];
$plan = $_POST['plan'];
setcookie("price", $price, time() + (86400 * 30), "/");
setcookie("plan", $plan, time() + (86400 * 30), "/");
if(empty($price)){
	$price = $_COOKIE['price'];
}
if(empty($plan)){
	$plan = $_COOKIE['plan'];
}
?>
<div class="dashboard-right">
    <div class="container-fluid">
        <?php 
        
        $user_id = get_current_user_id();
        $args = array( 'post_type'=>'company-registration', 'post_status'=>array('pending'), 'posts_per_page'=>1, 'author'=>$user_id );  
        $wp_query = new WP_Query($args);
        
        if($wp_query->have_posts()):

        while($wp_query->have_posts()): $wp_query->the_post();
            $current_id = $post->ID;
        
            if(isset($_POST['update_info']) && $_POST['update_info'] === 'Next'){

                $ecn_option_one = $_POST['ecn_option_one'];
                $ecn_option_two = $_POST['ecn_option_two'];
                $ecn_option_three = $_POST['ecn_option_three'];
                $step = 2;
                if(!empty($_POST['ecn_option_one']))
                    {
                      $new_slug = sanitize_title($_POST['ecn_option_one']);
                        wp_update_post(
                            array (
                                'ID'        =>$current_id,
                                'post_title'=>$_POST['ecn_option_one'], 
                                'post_name' => $new_slug,
                                'post_status' => 'pending',
                            )
                        );
                    }
                update_post_meta($current_id, 'Company Info', json_encode(array('Company Name 1'=>$ecn_option_one,'Company Name 2'=>$ecn_option_two,'Company Name 3'=>$ecn_option_three)));
                update_post_meta($current_id, 'Package', json_encode(array('Price'=>$price, 'Plan'=>$plan)));
                update_post_meta($current_id, 'Step', $step, true);
                ?>
                <script>
                    window.location = "<?php echo get_permalink('/dashboard/'); ?>";
                </script>
                <?php
            }
            $step = get_post_meta($current_id, 'Step', true);
            $package = json_decode(get_post_meta($current_id, 'Package', true), true);
            if(empty($price)){
				$price = $package['price'];
			}
			if(empty($plan)){
				$plan = $package['plan'];
			}
            ?>
            <!-- progressbar start-->
	        <div id="msform" class="mt-5">
	            <ul class="progressbar d-flex">
	                <li class="<?php echo ($step<2?'active':'complete'); ?>"><a class="d-flex align-items-center justify-content-center flex-column">Trade name</a></li>
	                <li class="<?php echo ($step==2?'active':''); echo ($step>2?'complete':''); ?>"><a class="d-flex align-items-center justify-content-center flex-column">Business activity</a></li>
	                <li class="<?php echo ($step==3?'active':''); echo ($step>3?'complete':''); ?>"><a class="d-flex align-items-center justify-content-center flex-column">shareholder details</a></li>
	                <!-- <li><a class="d-flex align-items-center justify-content-center flex-column">uploading docs of each shareholders</a></li> -->
	                <li class="<?php echo ($step==4?'active':''); echo ($step>4?'complete':''); ?>"><a class="d-flex align-items-center justify-content-center flex-column">Add Member</a></li>
	                <li class="<?php echo ($step==5?'active':''); echo ($step>5?'complete':''); ?>"><a class="d-flex align-items-center justify-content-center flex-column">Review</a></li>
	                <li><a class="d-flex align-items-center justify-content-center flex-column">pay and Submit</a></li>
	            </ul>
	        </div>
        	<!-- progressbar end-->

        	<!-- Login plans details -->
        	<div class="choose-plan-details d-flex align-items-center justify-content-between">
        		<div class="cpd-text-box text-center">
        			<h4 class="cpd-title"><?php echo $plan; ?> <span class="price">Total AED <?php echo $price; ?>/Yr</span></h4>
        			
        		</div>
        		<a href="<?php echo site_url('/pricing/'); ?>" class="btn btn-outline">Change package</a>
        	</div>
        	<!-- Login plans details -->

            <div class="basic-info">
            	<div class="<?php echo ($step < 2?'d-block':'d-none'); ?>">
	                <h1>Trade name</h1>
	                <form id="company-info" method="post" action="<?php echo home_url('/dashboard/') ?>" enctype="multipart/form-data">
	                    <input type="hidden" value="<?php echo $plan; ?>" name="plan" />
	                    <input type="hidden" value="<?php echo $price; ?>"  name="price" />
	                    <fieldset id="english-company-info">
	                        <legend>Company Name</legend>
	                        <div class="form-section">
	                            <div class="row">
	                                <div class="col-md-12">
	                                    <p>provide 3 company names - 1st one as the highest priority</p>
	                                </div>
	                            </div>
	                            <div class="row">
	                                <div class="col-md-4">
	                                    <div class="form-group">
	                                        <label>Option 1</label>
	                                        <input type="text" class="form-control" id="ecn_option_one" name="ecn_option_one" placeholder="option 1"  <?php if(!empty($ecn_option_one)): echo 'value="'.$ecn_option_one.'"'; endif; ?> required />
	                                    </div>
	                                </div>
	                                <div class="col-md-4">
	                                    <div class="form-group">
	                                        <label>Option 2</label>
	                                        <input type="text" class="form-control" id="ecn_option_two" name="ecn_option_two" placeholder="option 2"  <?php if(!empty($ecn_option_two)): echo 'value="'.$ecn_option_two.'"'; endif; ?>/>
	                                    </div>
	                                </div>
	                                <div class="col-md-4">
	                                    <div class="form-group">
	                                        <label>Option 3</label>
	                                        <input type="text" class="form-control" id="ecn_option_three" name="ecn_option_three" placeholder="option 3"  <?php if(!empty($ecn_option_three)): echo 'value="'.$ecn_option_three.'"'; endif; ?>/>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="row">
	                                <div class="col-md-12">
	                                    <div class="form-note">
	                                        <p><a href="#" target="_blank">Click here</a> to Learn more about selecting a company</p>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="row">
	                                <div class="col-md-12 text-md-right">
	                                    <span class="ajax-loader"></span>
	                                    <input type="submit" value="Next" class="btn btn-outline btn-lg btn-dash-next" id="company_name" name="update_info">
	                                </div>
	                            </div>
	                        </div>
	                    </fieldset>
	                </form>
	            </div>
	            <div class="<?php echo ($step == 2?'d-block':'d-none'); echo ($step > 2?' d-none':''); ?>">
		            <?php 
		            if(isset($_POST['Business_Activity']) && $_POST['Business_Activity'] === 'Next'){

		                $activity_one = $_POST['activity_one'];
		                $activity_two = $_POST['activity_two'];
		                $activity_three = $_POST['activity_three'];
		                $activity_four = $_POST['activity_four'];
		                $activity_five = $_POST['activity_five'];
		                $activity_six = $_POST['activity_six'];


		                $step = 3;
		                if(!empty($_POST['ecn_option_one']))
		                    {
		                      $new_slug = sanitize_title($_POST['ecn_option_one']);
		                        wp_update_post(
		                            array (
		                                'ID'        =>$current_id,
		                                'post_title'=>$_POST['ecn_option_one'], 
		                                'post_name' => $new_slug,
		                                'post_status' => 'pending',
		                            )
		                        );
		                    }
		                update_post_meta($current_id, 'Business Activity', json_encode(array('Activity One'=>$activity_one,'Activity Two'=>$activity_two,'Activity Three'=>$activity_three,'Activity Four'=>$activity_four,'Activity Five'=>$activity_five,'Activity Siv'=>$activity_six)));
		                update_post_meta($current_id, 'Package', json_encode(array('price'=>$price, 'plan'=>$plan)));
		                update_post_meta($current_id, 'Step', $step, false);
		                ?>
		                <script>
		                    window.location = "<?php echo get_permalink('/dashboard/'); ?>";
		                </script>
		                <?php
		            }
		            $step = get_post_meta($current_id, 'Step', true);
		            
		            ?>
	            
	                <form id="company-info" name="registration" method="post" enctype="multipart/form-data">
	                	<input type="hidden" value="<?php echo $plan; ?>" name="plan" />
		                <input type="hidden" value="<?php echo $price; ?>"  name="price" />
	                    <fieldset id="business-activity" class="">
	                       
	                        <legend>Select your Business Activity</legend>
	                        <div class="form-section">
	                            <div class="row">
	                                <div class="col-md-4">
	                                    <div class="form-group">
	                                        <label>Option 1</label>
	                                        <input type="text" class="form-control" id="activities_option_one" name="activity_one" placeholder="Option 1" value="" required />
	                                    </div>
	                                </div>
	                                <div class="col-md-4">
	                                    <div class="form-group">
	                                        <label>Option 2</label>
	                                        <input type="text" class="form-control" id="activities_option_two" name="activity_two" placeholder="Option 2" value="" />
	                                    </div>
	                                </div>
	                                <div class="col-md-4">
	                                    <div class="form-group">
	                                        <label>Option 3</label>
	                                        <input type="text" class="form-control" id="activities_option_three" name="activity_three" placeholder="Option 3" value="" />
	                                    </div>
	                                </div>
	                                <div class="col-md-4 d-none" id="four">
	                                    <div class="form-group">
	                                        <label>Option 4</label>
	                                        <input type="text" class="form-control" id="activities_option_four" name="activity_four" placeholder="Option 4" value="" />
	                                    </div>
	                                </div>
	                                <div class="col-md-4 d-none" id="five">
	                                    <div class="form-group">
	                                        <label>Option 5</label>
	                                        <input type="text" class="form-control" id="activities_option_five" name="activity_five" placeholder="Option 5" value="" />
	                                    </div>
	                                </div>
	                                <div class="col-md-4 d-none" id="six">
	                                    <div class="form-group">
	                                        <label>Option 6</label>
	                                        <input type="text" class="form-control" id="activities_option_six" name="activity_six" placeholder="Option 6" value="" />
	                                    </div>
	                                </div>
	                                <a href="javascript:void(0)" class="btn add-more">Add More</a>
	                            </div>
	                            <div class="row">
	                                <div class="col-md-12">
	                                    <div class="form-note">
	                                        <p><a href="#" target="_blank">Browse activity here</a></p>
	                                        <p>
	                                            Certain activities are subject to third party approvals -<br />
	                                            General Trading Activity has an additional License Fee of AED 10000/-
	                                        </p>
	                                        <p>If you aren't able to decide on an activity, Don't worry our support team can help you. Our startup experts are online.</p>
	                                        <a href="javascript:void(Tawk_API.toggle())" class="btn-chat">I need help with activity</a>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="row">
	                                <div class="col-md-12 text-md-right">
	                                    <span class="ajax-loader"></span>
	                                    <input type="submit" value="Next" name="Business_Activity" class="btn btn-outline btn-lg btn-dash-next" id="company_name">
	                                </div>
	                            </div>
	                        </div>
	                    </fieldset>
	                </form>
	            </div>
	            <div class="<?php echo ($step == 3?'d-block':'d-none'); echo ($step > 3?' d-none':''); ?>">
	                <?php 
		            if(isset($_POST['share_share_capital']) && $_POST['share_share_capital'] === 'Next'){

		                $proposed_share_capital = $_POST['proposed_share_capital'];
		                $total_number_of_shares = $_POST['total_number_of_shares'];
		                $share_value = $_POST['share_value'];
		               
		                $step = 4;
		                if(!empty($_POST['ecn_option_one']))
		                    {
		                      $new_slug = sanitize_title($_POST['ecn_option_one']);
		                        wp_update_post(
		                            array (
		                                'ID'        =>$current_id,
		                                'post_title'=>$_POST['ecn_option_one'], 
		                                'post_name' => $new_slug,
		                                'post_status' => 'pending',
		                            )
		                        );
		                    }
		                update_post_meta($current_id, 'Share Details', json_encode(array('Proposed Share Capital in AED'=>$proposed_share_capital,'Total Number of Shares'=>$total_number_of_shares,'Share Value'=>$share_value)));
		                update_post_meta($current_id, 'Package', json_encode(array('price'=>$price, 'plan'=>$plan)));
		                update_post_meta($current_id, 'Step', $step, false);
		                ?>
		                <script>
		                    window.location = "<?php echo get_permalink('/dashboard/'); ?>";
		                </script>
		                <?php
		            }
		            $step = get_post_meta($current_id, 'Step',true);
		           
		            ?>
	            
	                <form id="company-info" name="registration" method="post" enctype="multipart/form-data">
	                	<input type="hidden" value="<?php echo $plan; ?>" name="plan" />
		                <input type="hidden" value="<?php echo $price; ?>"  name="price" />
	                    <fieldset id="share-capital-details" class="">
	                        
	                        <legend>Share Capital Details</legend>
	                        <div class="form-section">
	                            <div class="row">
	                                <div class="col-md-4">
	                                    <div class="form-group">
	                                        <label>Proposed Share Capital in AED</label>
	                                        <input type="text" class="form-control" id="proposed_share_capital" name="proposed_share_capital" placeholder="Proposed Share Capital in AED" value="" required />
	                                    </div>
	                                </div>
	                                <div class="col-md-4">
	                                    <div class="form-group">
	                                        <label>Total Number of Shares</label>
	                                        <input type="text" class="form-control" id="total_number_of_shares" name="total_number_of_shares" placeholder="Total Number of Shares" value="" required />
	                                    </div>
	                                </div>
	                                <div class="col-md-4">
	                                    <div class="form-group">
	                                        <label>Share Value</label>
	                                        <input type="text" class="form-control" id="share_value" name="share_value" placeholder="Share Value" value="" required />
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="row">
	                                <div class="col-md-12 text-md-right">
	                                    <span class="ajax-loader"></span>
	                                    <input type="submit" value="Next" class="btn btn-outline btn-lg btn-dash-next" name="share_share_capital" id="company_name">
	                                </div>
	                            </div>
	                        </div>
	                    </fieldset>
	                </form>
	            </div>
	            <div class="<?php echo ($step == 4?'d-block':'d-none'); echo ($step > 4?' d-none':''); ?>">
	            	<?php 
		            if(isset($_POST['post_member']) && $_POST['post_member'] === 'Next'){

		                $role = $_POST['role'];
		                $first_name = $_POST['first_name'];
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
		                $address_line_1 = $_POST['address_line_1'];
		                $address_line_2 = $_POST['address_line_2'];
		                $po_box = $_POST['po_box'];
		                $city = $_POST['city'];
		                $state_province = $_POST['state_province'];
		                $country_name = $_POST['country_name'];
		                $f_first_name = $_POST['f_first_name'];
		                $f_middle_name = $_POST['f_middle_name'];
		                $f_last_name = $_POST['f_last_name'];
		                $upload1 = $_POST['passport_copy_clear_color_copy'];
		                $upload2 = $_POST['passport_standard_size_photo'];
		                $upload3 = $_POST['uae_visa_copy_or_uid_number'];
		                $upload4 = $_POST['emirates_id_copy'];
		               
		                $step = 5;
		                if(!empty($_POST['ecn_option_one']))
		                    {
		                      $new_slug = sanitize_title($_POST['ecn_option_one']);
		                        wp_update_post(
		                            array (
		                                'ID'        =>$current_id,
		                                'post_title'=>$_POST['ecn_option_one'], 
		                                'post_name' => $new_slug,
		                                'post_status' => 'pending',
		                            )
		                        );
		                    }
		                update_post_meta($current_id, 'Member Details', json_encode(array('Role'=>$role,'First Name'=>$first_name,'Middle Name'=>$middle_name,'Last Name'=>$last_name,'Gender'=>$gender, 'Salutation'=>$Salutation,'Email'=>$email,'Telephone'=>$telephone,'Mobile Phone'=>$mobile_phone,'Passport Number'=>$passport_number,'Country of Birth'=>$country_of_birth,'Date of Birth'=>$date_of_birth,'Current Nationality'=>$current_nationality,'Previous Nationality'=>$previous_nationality_if_applicable,'Is resident of UAE'=>$is_resident_of_uae,'Visited 5 year'=>$visited_5year,'Address Line 1'=>$address_line_1,'Address line 2'=>$address_line_2,'PO Box'=>$po_box,'City'=>$city,'State Province'=>$state_province,'Country name'=>$country_name,'Father First Name'=>$f_first_name,'Father Middle Name'=>$f_middle_name,'Father Last Name'=>$f_last_name)));
		                update_post_meta($current_id, 'Package', json_encode(array('price'=>$price, 'plan'=>$plan)));
		                update_post_meta($current_id, 'Step', $step, false);

		                require_once( ABSPATH . 'wp-admin/includes/image.php' );
						require_once( ABSPATH . 'wp-admin/includes/file.php' );
						require_once( ABSPATH . 'wp-admin/includes/media.php' );

						$attach_id = media_handle_upload('passport_copy_clear_color_copy', $current_id);
						$attach_id = media_handle_upload('uae_visa_copy_or_uid_number', $current_id);
						$attach_id = media_handle_upload('emirates_id_copy', $current_id);
						$attach_id = media_handle_upload('passport_standard_size_photo', $current_id);
						if (is_numeric($attach_id)) {
						    update_post_meta($current_id, 'Upload1', $attach_id);
						    update_post_meta($current_id, 'Upload2', $attach_id);
						    update_post_meta($current_id, 'Upload3', $attach_id);
						    update_post_meta($current_id, 'Upload4', $attach_id);

						}
						?>
		                <script>
		                    window.location = "<?php echo get_permalink('/dashboard/'); ?>";
		                </script>
		                <?php
		            }
		            $step = get_post_meta($current_id, 'Step',true);
		           
		            ?>
	                <form id="company-info" name="registration" method="post" enctype="multipart/form-data">
	                    <fieldset id="shareholder-details" class="">
	                       
	                        <div class="add-members">
	                            <legend>Add member</legend>
	                            <div class="form-section">
	                                <table class="mb-5 table table-cyan table-hover table-striped">
	                                    <thead>
	                                        <tr>
	                                            <th scope="col">Member Name</th>
	                                            <th scope="col">Post Date</th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
	                                        <tr>
	                                            <td>Title</td>
	                                            <td>27-11-2021</td> 
	                                        </tr>
	                                    </tbody>
	                                </table>
	                                <div class="form-group mt-4">
	                                    <p>Role</p>
	                                    <div class="radiobuttons d-md-flex pl-0">
	                                        <div class="rdio rdio-primary radio-inline mr-5">
	                                            <input name="role[]" class="" value="director" id="radio113" type="checkbox" />
	                                            <label for="radio113"><strong>Director</strong> </label>
	                                        </div>
	                                        <div class="rdio rdio-primary radio-inline mr-5">
	                                            <input name="role[]" class="" value="secretary" id="radio112" type="checkbox" />
	                                            <label for="radio112"><strong>Secretary</strong> </label>
	                                        </div>
	                                        <div class="rdio rdio-primary radio-inline mr-5">
	                                            <input name="role[]" class="" value="general-manager" id="radio114" type="checkbox" />
	                                            <label for="radio114"><strong>General Manager</strong> </label>
	                                        </div>
	                                        <div class="rdio rdio-primary radio-inline mr-5">
	                                            <input name="role[]" class="" value="shareholder" id="radio115" type="checkbox" />
	                                            <label for="radio115"><strong>Shareholder</strong> </label>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="row">
	                                    <div class="col-md-4">
	                                        <div class="form-group">
	                                            <label>First Name</label>
	                                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First NAME" value="" required="" />
	                                        </div>
	                                    </div>
	                                    <div class="col-md-4">
	                                        <div class="form-group">
	                                            <label>Middle Name</label>
	                                            <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle Name" value="" />
	                                        </div>
	                                    </div>
	                                    <div class="col-md-4">
	                                        <div class="form-group">
	                                            <label>Last Name</label>
	                                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="" required="" />
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="row">
	                                    <div class="col-md-4">
	                                        <div class="form-group">
	                                            <label>Gender</label>
	                                            <select class="form-control" id="gender" name="gender" required="">
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
	                                                    <input name="salutation" class="" value="mr" id="radio_1" type="radio" checked="" />
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
	                                            <input type="email" class="form-control" id="Email" name="email" placeholder="Email" value="" required="" />
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="row">
	                                    <div class="col-md-4">
	                                        <div class="form-group">
	                                            <label>Telephone</label>
	                                            <input type="number" class="form-control" id="telephone" name="telephone" placeholder="Telephone" value="" required="" />
	                                        </div>
	                                    </div>
	                                    <div class="col-md-4">
	                                        <div class="form-group">
	                                            <label>Mobile Phone</label>
	                                            <input type="number" class="form-control" id="mobile_phone" name="mobile_phone" placeholder="Mobile Phone" />
	                                        </div>
	                                    </div>
	                                    <div class="col-md-4">
	                                        <div class="form-group">
	                                            <label>Passport Number</label>
	                                            <input type="number" class="form-control" id="passport_number" name="passport_number" placeholder="Passport Number" />
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="row">
	                                    <div class="col-md-6">
	                                        <div class="form-group">
	                                            <label>Country of Birth</label>
	                                            <input type="text" class="form-control" id="country_of_birth" name="country_of_birth" placeholder="Country of Birth" value="" />
	                                        </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                        <div class="form-group">
	                                            <label>Date of Birth</label>
	                                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Date of Birth" required="" />
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="row">
	                                    <div class="col-md-6">
	                                        <div class="form-group">
	                                            <label>Current Nationality</label>
	                                            <input type="text" class="form-control" id="current_nationality" name="current_nationality" placeholder="Current Nationality" value="" required="" />
	                                        </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                        <div class="form-group">
	                                            <label>Previous Nationality (If Applicable)</label>
	                                            <input type="text" class="form-control" id="previous_nationality_if_applicable" name="previous_nationality_if_applicable" placeholder="Previous Nationality (If Applicable)" />
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="row">
	                                    <div class="col-md-6">
	                                        <div class="form-group">
	                                            <p>Is resident of UAE?</p>
	                                            <div class="d-md-flex pl-0">
	                                                <div class="rdio rdio-primary radio-inline mr-4" id="resident-uae-yes">
	                                                    <input name="is_resident_of_uae" class="" value="yes" id="radio_11" type="radio" checked="" />
	                                                    <label for="radio_11"><strong>Yes</strong> </label>
	                                                </div>
	                                                <div class="rdio rdio-primary radio-inline mr-4" id="resident-uae-no">
	                                                    <input name="is_resident_of_uae" class="" value="no" id="radio_22" type="radio" />
	                                                    <label for="radio_22"><strong>No</strong> </label>
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>
	                                    <div class="col-md-6 hide-on-no">
	                                        <div class="form-group">
	                                            <p>If Not, have you visited/resided in the UAE within the last 5 years?</p>
	                                            <div class="d-md-flex pl-0">
	                                                <div class="rdio rdio-primary radio-inline mr-4">
	                                                    <input name="visited_5year" class="" value="yes" id="radio_111" type="radio" checked="" />
	                                                    <label for="radio_111"><strong>Yes</strong> </label>
	                                                </div>
	                                                <div class="rdio rdio-primary radio-inline mr-4">
	                                                    <input name="visited_5year" class="" value="no" id="radio_222" type="radio" />
	                                                    <label for="radio_222"><strong>No</strong> </label>
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>
	                                   
	                                </div>
	                                <div class="hide-on-no">
	                                    <div class="row">
	                                        <div class="col-md-4">
	                                            <div class="form-group">
	                                                <label>Address Line 1</label>
	                                                <input type="text" class="form-control" id="address_line_1" name="address_line_1" placeholder="Address Line 1" value="" required="" />
	                                            </div>
	                                        </div>
	                                        <div class="col-md-4">
	                                            <div class="form-group">
	                                                <label>Address line 2</label>
	                                                <input type="text" class="form-control" id="address_line_2" name="address_line_2" placeholder="Address line 2" />
	                                            </div>
	                                        </div>
	                                        <div class="col-md-4">
	                                            <div class="form-group">
	                                                <label>PO Box</label>
	                                                <input type="text" class="form-control" id="po_box" name="po_box" placeholder="PO Box" required="" />
	                                            </div>
	                                        </div>
	                                    </div>
	                                    <div class="row">
	                                        <div class="col-md-4">
	                                            <div class="form-group">
	                                                <label>City</label>
	                                                <input type="text" class="form-control" id="city" name="city" placeholder="City" value="" />
	                                            </div>
	                                        </div>
	                                        <div class="col-md-4">
	                                            <div class="form-group">
	                                                <label>State Province</label>
	                                                <input type="text" class="form-control" id="state_province" name="state_province" placeholder="State Province" />
	                                            </div>
	                                        </div>
	                                        <div class="col-md-4">
	                                            <div class="form-group">
	                                                <label>Country</label>
	                                                <input type="text" class="form-control" id="country_name" name="country_name" placeholder="Country" />
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="row">
	                                    <div class="col-md-4">
	                                        <div class="form-group">
	                                            <label>Father First Name</label>
	                                            <input type="text" class="form-control" id="f_first_name" name="f_first_name" placeholder="Father First Name" value="" />
	                                        </div>
	                                    </div>
	                                    <div class="col-md-4">
	                                        <div class="form-group">
	                                            <label>Father Middle Name</label>
	                                            <input type="text" class="form-control" id="f_middle_name" name="f_middle_name" placeholder="Father Middle Name" />
	                                        </div>
	                                    </div>
	                                    <div class="col-md-4">
	                                        <div class="form-group">
	                                            <label>Father Last Name</label>
	                                            <input type="text" class="form-control" id="f_last_name" name="f_last_name" placeholder="Father Last Number" />
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="row">
	                                    <div class="col-md-6">
	                                        <div class="form-group">
	                                            <input type="checkbox" id="passportCopy" name="passportCopy" value="passportCopy" />
	                                            <label for="passportCopy">Passport Copy</label>
	                                        </div>
	                                    </div>
	                                    <div class="col-md-6 d-none" id="upload-docs1">
	                                        <div class="form-group">
	                                            <label>Upload1</label>
	                                            <input type="file" class="form-control" name="passport_copy_clear_color_copy" />
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="row">
	                                    <div class="col-md-6">
	                                        <div class="form-group">
	                                            <input type="checkbox" id="passportSizePhoto" name="passportSizePhoto" value="passportSizePhoto" />
	                                            <label for="passportSizePhoto">Passport Standard Size Photo</label>
	                                        </div>
	                                    </div>
	                                    <div class="col-md-6 d-none" id="upload-docs2">
	                                        <div class="form-group">
	                                            <label>Upload2</label>
	                                            <input type="file" class="form-control" name="passport_standard_size_photo" />
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="row">
	                                    <div class="col-md-6">
	                                        <div class="form-group">
	                                            <input type="checkbox" id="uaeVisa" name="uaeVisa" value="uaeVisa" />
	                                            <label for="uaeVisa">UAE Visa Copy or UID NUMBER</label>
	                                        </div>
	                                    </div>
	                                    <div class="col-md-6 d-none" id="upload-docs3">
	                                        <div class="form-group">
	                                            <label>Upload3</label>
	                                            <input type="file" class="form-control" name="uae_visa_copy_or_uid_number" />
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="row">
	                                    <div class="col-md-6">
	                                        <div class="form-group">
	                                            <input type="checkbox" id="emiratesId" name="emiratesId" value="emiratesId" />
	                                            <label for="emiratesId">Emirates ID Copy(Past or Present)</label>
	                                        </div>
	                                    </div>
	                                    <div class="col-md-6 d-none" id="upload-docs4">
	                                        <div class="form-group">
	                                            <label>Upload4</label>
	                                            <input type="file" class="form-control" name="emirates_id_copy" />
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="row">
	                                    <div class="col-md-12">
	                                        <input id="sumbit" class="btn-hover btn-save btn btn-outline btn-lg" type="submit" name="post_member" value="Next" />
	                                    </div>
	                                </div>
	                                
	                            </div>
	                        </div>
	                    </fieldset>
	                </form>
            	</div>
            	<div class="<?php echo ($step == 5?'d-block':'d-none'); echo ($step > 5?' d-none':''); ?>">
            		<?php 

		            if(isset($_POST['bankTransferSubmit'])){
	                    wp_update_post(array('ID' =>$current_id,'post_status' => 'publish',));
	                    

		            	$refrence_num = time() . rand(10*45, 100*98);
		                $step = 6;
		                update_post_meta($current_id, 'Payment Method', json_encode(array('method'=>'bank transfer','Refrence Number'=>$refrence_num)));
		                update_post_meta($current_id, 'Step', $step, false);
		                ?>
		                <script>
		                    window.location = "<?php echo get_permalink('/dashboard/'); ?>";
		                </script>
		                <?php
		            }
		            $step = get_post_meta($current_id, 'Step',true);
		           
		            ?>
	                    <fieldset>
	                        <legend>Review</legend>
	                        <div class="form-section">
	                            <table class="table table-responsive">
	                                <tbody>
	                                    <tr>
	                                        <td><i class="fas fa-chevron-right" aria-hidden="true"></i>Step 1 - Trade name</td>
	                                        <td><i class="fas fa-check" aria-hidden="true"></i> <span>Confirmed</span></td>
	                                        <td>
	                                            <div class="table-action-btn">
	                                                <a href="#!" class="edit-icon" data-step="1"><i class="fas fa-pencil-alt" aria-hidden="true"></i></a>
	                                            </div>
	                                        </td>
	                                    </tr>
	                                    <tr>
	                                        <td><i class="fas fa-chevron-right" aria-hidden="true"></i>Step 2 - Business activity</td>
	                                        <td><i class="fas fa-check" aria-hidden="true"></i> <span>Confirmed</span></td>
	                                        <td>
	                                            <div class="table-action-btn">
	                                                <a href="#!" class="edit-icon" data-step="2"><i class="fas fa-pencil-alt" aria-hidden="true"></i></a>
	                                            </div>
	                                        </td>
	                                    </tr>
	                                    <tr>
	                                        <td><i class="fas fa-chevron-right" aria-hidden="true"></i>Step 3 - Shareholder details</td>
	                                        <td><i class="fas fa-check" aria-hidden="true"></i> <span>Confirmed</span></td>
	                                        <td>
	                                            <div class="table-action-btn">
	                                                <a href="#!" class="edit-icon" data-step="3"><i class="fas fa-pencil-alt" aria-hidden="true"></i></a>
	                                            </div>
	                                        </td>
	                                    </tr>
	                                    <tr>
	                                        <td><i class="fas fa-chevron-right" aria-hidden="true"></i>Step 4 - Add Member</td>
	                                        <td><i class="fas fa-check" aria-hidden="true"></i> <span>Confirmed</span></td>
	                                        <td>
	                                            <div class="table-action-btn">
	                                                <a href="#!" class="edit-icon" data-step="4"><i class="fas fa-pencil-alt" aria-hidden="true"></i></a>
	                                            </div>
	                                        </td>
	                                    </tr>
	                                </tbody>
	                            </table>

	                            <div class="payment-method form-group">
                                    <p>Select Payment Method:</p>
                                    <div class="d-md-flex pl-0">
                                        <div class="rdio rdio-primary radio-inline mr-4">
                                            <input name="payment_method" class="" value="Card" id="payment_method_card" type="radio" checked="">
                                            <label for="payment_method_card"><strong>Card</strong> </label>
                                        </div>
                                        <div class="rdio rdio-primary radio-inline mr-4">
                                            <input name="payment_method" class="" value="Direct Bank Transfer" id="payment_method_bank" type="radio">
                                            <label for="payment_method_bank"><strong>Direct Bank Transfer</strong> </label>
                                        </div>
                                    </div>
	                            </div>
	                            <div class="payment-method-box" id="card">
		                            <form id="myForm" action="//httpbin.org/post" method="POST">
										<input type="hidden" id="amountInDollars" value="<?php echo $price; ?>" disabled />
										<input type="hidden" id="stripeToken" name="stripeToken" />
										<input type="hidden" id="stripeEmail" name="stripeEmail" />
										<input type="hidden" id="amountInCents" name="amountInCents" />
									</form>
									<input type="button" id="customButton" class="btn btn-outline btn-lg" value="Confirm and submit" />
								</div>
								<div class="payment-method-box" id="bank-transfer" style="display:none;">
									<p>
		                            	<strong>Account Name -</strong> Sharkup Document Clearing Services<br/>
		                            	<strong>Account number -</strong> 3708434376101<br/>
		                            	<strong>IBAN number -</strong> AE060340003708434376101<br/>
		                            	<strong>Branch Address -</strong> EI Al Barsha Mall
		                            </p>
									<form id="company-info" name="registrationBank" method="post">
										<input type="submit" id="bankTransferSubmit" name="bankTransferSubmit" class="btn btn-outline btn-lg" value="Confirm and submit" />
									</form>
								</div>

	                        </div>
	                    </fieldset>
	            </div>
	            <div class="<?php echo ($step == 6?'d-block':'d-none'); echo ($step > 6?' d-none':''); ?>">
	                <fieldset>
	                	<p>
	                	<?php 
						$refrence_num = json_decode(get_post_meta($current_id, 'Payment Method', true), true);
						echo '<strong> Refrence Number</strong>: '.$refrence_num['Refrence Number'];
						
	                	?>
	                	</p>
	                </fieldset>
	            </div>
            </div>
            <?php
            endwhile;

        else:

            $price = $_POST['price'];
            $plan = $_POST['plan'];
            setcookie("price", $price, time() + (86400 * 30), "/");
			setcookie("plan", $plan, time() + (86400 * 30), "/");

            if(isset($_POST['Company_Name']) && $_POST['Company_Name'] === 'Next'){
                $ecn_option_one = $_POST['ecn_option_one'];
                $ecn_option_two = $_POST['ecn_option_two'];
                $ecn_option_three = $_POST['ecn_option_three'];
                $step = 2;
                $id = wp_insert_post(
                    array(
                        'post_title'=>$_POST['ecn_option_one'], 
                        'post_type'=>'company-registration', 
                        'post_status' => 'pending',
                        'comment_status' => 'closed',
                        'ping_status' => 'closed',
                    )
                );
                add_post_meta($id, 'Company Info', json_encode(array('Company Name 1'=>$ecn_option_one,'Company Name 2'=>$ecn_option_two,'Company Name 3'=>$ecn_option_three)), true);
                add_post_meta($id, 'Package', json_encode(array('price'=>$price, 'plan'=>$plan)), true);
                add_post_meta($id, 'Step', $step, true);

                ?>
                <script>
                    window.location = "<?php echo get_permalink('/dashboard/'); ?>";
                </script>
                <?php
            }

        ?>

    	<!-- progressbar start-->
        <div id="msform" class="mt-5">
            <ul class="progressbar d-flex">
                <li class="<?php echo ($step<2?'active':'complete'); ?>"><a class="d-flex align-items-center justify-content-center flex-column">Trade name</a></li>
                <li class="<?php echo ($step==2?'active':''); echo ($step>2?'complete':''); ?>"><a class="d-flex align-items-center justify-content-center flex-column">Business activity</a></li>
                <li class="<?php echo ($step==3?'active':''); echo ($step>3?'complete':''); ?>"><a class="d-flex align-items-center justify-content-center flex-column">shareholder details</a></li>
                <!-- <li><a class="d-flex align-items-center justify-content-center flex-column">uploading docs of each shareholders</a></li> -->
                <li class="<?php echo ($step==4?'active':''); echo ($step>4?'complete':''); ?>"><a class="d-flex align-items-center justify-content-center flex-column">Add Member</a></li>
                <li class="<?php echo ($step==5?'active':''); echo ($step>5?'complete':''); ?>"><a class="d-flex align-items-center justify-content-center flex-column">Review</a></li>
                <li><a class="d-flex align-items-center justify-content-center flex-column">pay and Submit</a></li>
            </ul>
        </div>
    	<!-- progressbar end-->

    	<!-- Login plans details -->
    	<div class="choose-plan-details d-flex align-items-center justify-content-between">
    		<div class="cpd-text-box text-center">
    			<h4 class="cpd-title"><?php echo $plan; ?> <span class="price">Total AED <?php echo $price; ?>/Yr</span></h4>
    			
    		</div>
    		<a href="<?php echo site_url('/pricing/'); ?>" class="btn btn-outline">Change package</a>
    	</div>
    	<!-- Login plans details -->

        <div class="basic-info">
            <h1>Company Info</h1>
            <form id="company-info" method="post" action="<?php echo home_url('/dashboard/') ?>" enctype="multipart/form-data">
            	<input type="hidden" name="plan" value="<?php echo $plan; ?>">
            	<input type="hidden" name="price" value="<?php echo $price; ?>">
                <fieldset id="english-company-info">
                    <legend>Company Name</legend>
                    <div class="form-section">
                        <div class="row">
                            <div class="col-md-12">
                                <p>provide 3 company names - 1st one as the highest priority</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Option 1</label>
                                    <input type="text" class="form-control" id="ecn_option_one" name="ecn_option_one" placeholder="option 1" required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Option 2</label>
                                    <input type="text" class="form-control" id="ecn_option_two" name="ecn_option_two" placeholder="option 2"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Option 3</label>
                                    <input type="text" class="form-control" id="ecn_option_three" name="ecn_option_three" placeholder="option 3"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-note">
                                    <p><a href="#" target="_blank">Click here</a> to Learn more about selecting a company</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-md-right">
                                <span class="ajax-loader"></span>
                                <input type="submit" value="Next" class="btn btn-outline btn-lg btn-dash-next" id="company_name" name="Company_Name">
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <?php 
        endif; 
        ?>
    </div>
</div>
<?php // endif; ?>
<script>
$('form').on('submit', function(){
    
    let fieldset = $(this).find('fieldset');
    fieldset.addClass('loading');

});

$('.edit-icon').on('click', function(){
    const step = $(this).data('step');
    $('.basic-info > div').removeClass('d-block').addClass('d-none');
    $('.basic-info > div:nth-child('+step+')').removeClass('d-none').addClass('d-block');
});

$('[name="payment_method"]').on('change', function(){
	$('.payment-method-box').hide();
	if($(this).val() == 'Card'){
		$('#card').show();
	}else{
		$('#bank-transfer').show();
	}
});
</script>