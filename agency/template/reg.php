<?php
/*==============================*/
// @package agency
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Reg */

get_header(); 

global $wpdb, $user_ID;  

if (isset($_POST['user_registeration']))
{
    //registration_validation($_POST['username'], $_POST['useremail']);
    global $reg_errors;
    $reg_errors = new WP_Error;
    $username=$_POST['username'];
    $useremail=$_POST['useremail'];
    $password=$_POST['password'];
    
    
    if(empty( $username ) || empty( $useremail ) || empty($password))
    {
        $reg_errors->add('field', 'Required form field is missing');
    }    
    if ( 6 > strlen( $username ) )
    {
        $reg_errors->add('username_length', 'Username too short. At least 6 characters is required' );
    }
    if ( username_exists( $username ) )
    {
        $reg_errors->add('user_name', 'The username you entered already exists!');
    }
    if ( ! validate_username( $username ) )
    {
        $reg_errors->add( 'username_invalid', 'The username you entered is not valid!' );
    }
    if ( !is_email( $useremail ) )
    {
        $reg_errors->add( 'email_invalid', 'Email id is not valid!' );
    }
    
    if ( email_exists( $useremail ) )
    {
        $reg_errors->add( 'email', 'Email Already exist!' );
    }
    if ( 5 > strlen( $password ) ) {
        $reg_errors->add( 'password', 'Password length must be greater than 5!' );
    }
    
    if (is_wp_error( $reg_errors ))
    { 
        foreach ( $reg_errors->get_error_messages() as $error )
        {
             $signUpError='<p style="color:#FF0000; text-aling:left;"><strong>ERROR</strong>: '.$error . '<br /></p>';
        } 
    }
    
    
    if ( 1 > count( $reg_errors->get_error_messages() ) )
    {
        // sanitize user form input
        global $username, $useremail;
        $username   =   sanitize_user( $_POST['username'] );
        $useremail  =   sanitize_email( $_POST['useremail'] );
        $password   =   esc_attr( $_POST['password'] );

        $field_1   =   $_POST['field_1'];
        $field_2  =    $_POST['field_2'] ;
        $field_3   =   $_POST['field_3'];
        $field_4   =   $_POST['field_4'];
        
        $userdata = array(
            'user_login'    =>   $username,
            'user_email'    =>   $useremail,
            'user_pass'     =>   $password,
            'field_1'    	=>   $field_1,
            'field_2'     	=>   $field_2,
            'field_3'    	=>   $field_3,
            'field_4'     	=>   $field_4,
            );
        $user = wp_insert_user( $userdata, 'street', $_POST['street'], false);
    }

}

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
<?php 
if (!$user_ID) { ?>
<h3>Create your account</h3>
    <form action="" method="post" name="user_registeration">
        <label>Username <span class="error">*</span></label>  
        <input type="text" name="username" placeholder="Enter Your Username" class="text" required /><br />
        <label>Email address <span class="error">*</span></label>
        <input type="text" name="useremail" class="text" placeholder="Enter Your Email" required /> <br />

        <label>Field 1 <span class="error">*</span></label>
        <input type="text" name="street" class="text" placeholder="Enter field_1" required /> <br />

        <label>Field 2 <span class="error">*</span></label>
        <input type="text" name="field_2" class="text" placeholder="Enter field_2" required /> <br />

        <label>Field 3 <span class="error">*</span></label>
        <input type="text" name="field_3" class="text" placeholder="Enter field_3" required /> <br />

        <label>Field 4 <span class="error">*</span></label>
        <input type="text" name="field_4" class="text" placeholder="Enter field_4" required /> <br />

        <label>Password <span class="error">*</span></label>
        <input type="password" name="password" class="text" placeholder="Enter Your password" required /> <br />
        <input type="submit" name="user_registeration" value="SignUp" />
    </form>
    <?php if(isset($signUpError)){echo '<div>'.$signUpError.'</div>';}?>

<?php    
}  
else {  
   wp_redirect( home_url() ); exit;  
}
?>

<?php 
get_footer(); 
?>