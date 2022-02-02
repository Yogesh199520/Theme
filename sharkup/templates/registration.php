<?php
/*==============================*/
// @package Sharkup
// @author Medical Darpan
/*==============================*/
/* Template Name: Registration */
get_header();
?>
<div class="container py-4">
    <?php 
    global $current_user; 
    $user_id = get_current_user_ID();
    $user_meta = get_user_meta($user_id);
    //echo '<pre>';
    //print_r($user_meta);
    //echo '</pre>';
    /*if($_POST['post_submit']=='Sumbit'){
        $current_user_id = get_current_user_id();
        $user = wp_insert_user($current_user_id);
    }*/

    if($_POST['post_submit']=='Update'){
        //echo "<meta http-equiv='refresh' content='0'>";
        

        $en_option_one              = $user_meta['en_option_one'][0];
        $en_option_two              = $user_meta['en_option_two'][0];
        $en_option_three            = $user_meta['en_option_three'][0];
        $ar_option_one              = $user_meta['ar_option_one'][0];
        $ar_option_two              = $user_meta['ar_option_two'][0];
        $ar_option_three            = $user_meta['ar_option_three'][0];
        $franchisee_data            = $user_meta['franchisee_data'][0];
        $licence_type               = $user_meta['licence_type'][0];
        $visa_packge                = $user_meta['visa_packge'][0];
        $activity_one               = $user_meta['activity_one'][0];
        $activity_two               = $user_meta['activity_two'][0];
        $activity_three             = $user_meta['activity_three'][0];
        $business_desc              = $user_meta['business_desc'][0];
        $shareholding_type          = $user_meta['shareholding_type'][0];
        $proposed_share_capital     = $user_meta['proposed_share_capital'][0];
        $share_value                = $user_meta['share_value'][0];
        $total_number_of_shares     = $user_meta['total_number_of_shares'][0];

        $en_option_one = $_POST['en_option_one'];
        $en_option_two = $_POST['en_option_two'];
        $en_option_three = $_POST['en_option_three'];
        $ar_option_one = $_POST['ar_option_one'];
        $ar_option_two = $_POST['ar_option_two'];
        $ar_option_three = $_POST['ar_option_three'];
        $franchisee_data = $_POST['franchisee_data'];
        $licence_type = $_POST['licence_type'];
        $visa_packge = $_POST['visa_packge'];
        $activity_one = $_POST['activity_one'];
        $activity_two = $_POST['activity_two'];
        $activity_three = $_POST['activity_three'];
        $business_desc = $_POST['business_desc'];
        $shareholding_type = $_POST['shareholding_type'];
        $proposed_share_capital = $_POST['proposed_share_capital'];
        $share_value = $_POST['share_value'];
        $total_number_of_shares = $_POST['total_number_of_shares'];
        $document = $_POST['document'];

       
        $metas = array(
            'en_option_one'          => $en_option_one,
            'en_option_two'          => $en_option_two,
            'en_option_three'        => $en_option_three,
            'ar_option_one'          => $ar_option_one,
            'ar_option_two'          => $ar_option_two,
            'ar_option_three'        => $ar_option_three,
            'franchisee_data'        => $franchisee_data,
            'licence_type'           => $licence_type,
            'visa_packge'            => $visa_packge,
            'activity_one'           => $activity_one,
            'activity_two'           => $activity_two,
            'activity_three'         => $activity_three,
            'business_desc'          => $business_desc,
            'shareholding_type'      => $shareholding_type,
            'proposed_share_capital' => $proposed_share_capital,
            'share_value'            => $share_value,
            'total_number_of_shares' => $total_number_of_shares,
            'document'               => $document,
        );
        foreach($metas as $key => $value) {
            update_user_meta( $user_id, $key, $value );
        }
    }
    ?>
	<form id="registration" name="registration" method="post" action="<?php echo get_page_link('/') ?>" enctype="multipart/form-data">
        <!-- <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" id="user_login" name="user_login" placeholder="Username" value="" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Nickname</label>
                    <input type="text" class="form-control" id="nickname" name="nickname" placeholder="Nickname" value="" />
                </div>
            </div>
        </div>
	   
        <div class="row my-3">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Url</label>
                    <input type="url" class="form-control" id="url" name="url" placeholder="Url" value="" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Biographical Info</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Biographical Info" value="" />
                </div>
            </div>
           
        </div> -->
        
        <div class="row my-3">
            <div class="col-md-12">
                <h3>English Company Name</h3>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Option 1</label>
                    <input type="text" class="form-control" id="en_option_one" name="en_option_one" placeholder="Option 1" <?php if(!empty($en_option_one)): echo 'value="'.$en_option_one.'"'; endif; ?> />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Option 2</label>
                    <input type="text" class="form-control" id="en_option_two" name="en_option_two" placeholder="Option 2" <?php if(!empty($en_option_two)): echo 'value="'.$en_option_two.'"'; endif; ?>/>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Option 3</label>
                    <input type="text" class="form-control" id="en_option_three" name="en_option_three" placeholder="Option 3" <?php if(!empty($en_option_three)): echo 'value="'.$en_option_three.'"'; endif; ?>/>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-12">
                <h3>Arabic Company Name</h3>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Option 1</label>
                    <input type="text" class="form-control" id="ar_option_1" name="ar_option_one" placeholder="Option 1" <?php if(!empty($ar_option_one)): echo 'value="'.$ar_option_one.'"'; endif; ?> />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Option 2</label>
                    <input type="text" class="form-control" id="ar_option_2" name="ar_option_two" placeholder="Option 2" <?php if(!empty($ar_option_two)): echo 'value="'.$ar_option_two.'"'; endif; ?>/>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Option 3</label>
                    <input type="text" class="form-control" id="ar_option_3" name="ar_option_three" placeholder="Option 3" <?php if(!empty($ar_option_three)): echo 'value="'.$ar_option_three.'"'; endif; ?> />
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-12">
                <div class="form-group">
                    <p>Are you going to operate as a franchisee?</p>
                    <div class="d-md-flex pl-0">
                        <div class="rdio rdio-primary radio-inline mr-4">
                            <input name="franchisee_data" class="" value="yes" id="radio_1" type="radio" <?php if($franchisee_data == 'yes'): echo 'checked'; endif; ?> />
                            <label for="radio_1">Yes </label>
                        </div>
                        <div class="rdio rdio-primary radio-inline mr-4">
                            <input name="franchisee_data" class="" value="no" id="radio_2" type="radio" <?php if($franchisee_data == 'no'): echo 'checked'; endif; ?> />
                            <label for="radio_2">No</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row my-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Licence Type</label>
                    <select class="form-control" id="licence_type" name="licence_type">
                        <option value="">---</option>
                        <option value="globalEntrepreneur" <?php if($licence_type == 'globalEntrepreneur'): echo 'selected'; endif; ?>>Global Entrepreneur </option>
                        <option value="theUnstoppable" <?php if($licence_type == 'theUnstoppable'): echo 'selected'; endif; ?>>The Unstoppable </option>
                        <option value="theSkilledEntrepreneur" <?php if($licence_type == 'theSkilledEntrepreneur'): echo 'selected'; endif; ?>>The Skilled Entrepreneur </option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Visa Package</label>
                    <select class="form-control" id="visa_package" name="visa_packge">
                        <option value="">---</option>
                        <option value="0" <?php if($visa_packge == '0'): echo 'selected'; endif; ?>>0 Visa </option>
                        <option value="1" <?php if($visa_packge == '1'): echo 'selected'; endif; ?>>1 </option>
                        <option value="2" <?php if($visa_packge == '2'): echo 'selected'; endif; ?>>2 </option>
                        <option value="3" <?php if($visa_packge == '3'): echo 'selected'; endif; ?>>3 </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-12">
                <h3>Please select up to 3 business activities.</h3>
                <p>Activity Name</p>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Option 1</label>
                    <input type="text" class="form-control" id="activities_option_one" name="activity_one" placeholder="Option 1" <?php if(!empty($activity_one)): echo 'value="'.$activity_one.'"'; endif; ?> />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Option 2</label>
                    <input type="text" class="form-control" id="activities_option_two" name="activity_two" placeholder="Option 2" <?php if(!empty($activity_two)): echo 'value="'.$activity_two.'"'; endif; ?>/>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Option 3</label>
                    <input type="text" class="form-control" id="activities_option_three" name="activity_three" placeholder="Option 3" <?php if(!empty($activity_three)): echo 'value="'.$activity_three.'"'; endif; ?>/>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Bussiness Description</label>
                    <textarea name="business_desc"><?php if(!empty($business_desc)): echo $business_desc; endif; ?></textarea>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Shareholding Type</label>
                    <select class="form-control" id="shareholding_type" name="shareholding_type">
                        <option value="">---</option>
                        <option value="mix" <?php if($shareholding_type == 'mix'): echo 'selected'; endif; ?>>Mix </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Proposed share capital</label>
                    <input type="text" class="form-control" id="proposed_share_capital" name="proposed_share_capital" placeholder="Proposed share capital" <?php if(!empty($proposed_share_capital)): echo 'value="'.$proposed_share_capital.'"'; endif; ?> />
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
                    <input type="text" class="form-control" id="total_number_of_shares" name="total_number_of_shares" placeholder="Total Number of Shares" <?php if(!empty($total_number_of_shares)): echo 'value="'.$total_number_of_shares.'"'; endif; ?>/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Upload Documents</label>
                    <input type="file" name="document">
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-12">
                <input id="sumbit" class="btn-hover btn-save" type="submit" name="post_submit" value="Update" />
            </div>
        </div>
	        
	</form>
</div>
<?php

get_template_part('template-part/signup','cta');

get_footer();
?>