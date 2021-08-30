<?php
$pid = get_option('page_for_posts');
if(is_home()):
$page_bg_image = wp_get_attachment_image_url(get_field('page_bg_image',$pid),'full');
$page_heading = get_field('page_heading',$pid);
$page_button_text = get_field('page_button_text',$pid);
$page_button_link = get_field('page_button_link',$pid);
else:
$page_bg_image = wp_get_attachment_image_url(get_field('page_bg_image'),'full');
$page_heading = get_field('page_heading');
$page_button_text = get_field('page_button_text');
$page_button_link = get_field('page_button_link');
endif;
$black_logo = get_theme_mod('black_logo');
$short_text = get_field('short_text','option');
$copyrights = get_field('copyrights','option');
if(!empty($page_bg_image)):
?>
<!--============================== Content Section Start ==============================-->
<div class="cta-container" style="background-image: url(<?php echo esc_html($page_bg_image); ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php 
                if(!empty($page_heading)): echo '<h3>'.$page_heading.'</h3>'; endif; 
                if(!empty($page_button_text)): echo '<a href="'.$page_button_link.'" class="btn btn-default">'.$page_button_text.'</a>'; endif; 
                ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<!--============================== Content Section End ==============================-->
<!--============================== Footer Start ==============================-->
<footer>
    <div class="footer-upper">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mar-30">
                    <?php 
                    echo do_shortcode('[smp_popular_posts]');
                    echo '<a class="footer-logo" href="'.home_url('/').'"><img src="'.$black_logo.'" alt="'.get_bloginfo('name').'" /></a>';
                    if(!empty($short_text)): echo '<p>'.$short_text.'</p>'; endif;
                    if(have_rows('social_links','option')):
                    ?>
                    <ul class="social-links">
                        <?php
                        while(have_rows('social_links','option')): the_row();
                        $icon = get_sub_field('icon');
                        $url = get_sub_field('url');
                        echo '<li><a href="'.$url.'" target="_blank" rel="nofollow">'.$icon.'</a></li>';
                        endwhile; 
                        ?>
                    </ul>
                    <?php endif; ?>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-4 mar-30">
                            <h5>Sitemap</h5>
                            <?php
                            wp_nav_menu( array(
                                'theme_location'    => 'sitemap',
                                'depth'             => 1,
                                'container'         => false,
                                'menu_class'        => 'footer-nav',
                                'menu_id'           => 'footer-sitemap',
                                'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            ));
                            ?>
                        </div>
                        <div class="col-md-4 mar-30">
                            <h5>Services</h5>
                            <?php
                            wp_nav_menu( array(
                                'theme_location'    => 'services',
                                'depth'             => 1,
                                'container'         => false,
                                'menu_class'        => 'footer-nav',
                                'menu_id'           => 'footer-services',
                                'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            ));
                            ?>
                        </div>
                        <div class="col-md-4">
                            <h5>Subscribe</h5>
                            <p>Quisque egestas eros sed tristique laoreet.</p>
                            <?php echo do_shortcode('[contact-form-7 id="382" title="Subscribe"]');?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if(!empty($copyrights)):?>
    <div class="footer-lower">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p><?php echo esc_html($copyrights); ?> </p>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="d-none">
        <?php
        $args = array (
            'before'            => '<div class="page-links-XXX"><span class="page-link-text">' . __( 'More pages: ', 'agency') . '</span>',
            'after'             => '</div>',
            'link_before'       => '<span class="page-link">',
            'link_after'        => '</span>',
            'next_or_number'    => 'next',
            'separator'         => ' | ',
            'nextpagelink'      => __( 'Next &raquo', 'agency'),
            'previouspagelink'  => __( '&laquo Previous', 'agency'),
        );
        wp_link_pages( $args );
        the_tags();
        dynamic_sidebar('sidebar-1');
        ?>
    </div>
</footer>

<!--============================== Footer End ==============================-->

<?php 
if(is_user_logged_in()):
global $current_user; 
$user_id = get_current_user_ID();
$user_meta = get_user_meta($user_id);
$user_login = $user_meta['user_login'][0];
$first_name = $user_meta['first_name'][0];
$last_name = $user_meta['last_name'][0];
$nickname = $user_meta['nickname'][0];
$email = $user_meta['email'][0];
$url = $user_meta['url'][0];
$description = $user_meta['description'][0];
$address = $user_meta['address'][0];
$city = $user_meta['city'][0];
$test1 = $user_meta['test1'][0];
$test2 = $user_meta['test2'][0];
$test3 = $user_meta['test3'][0];
$test4 = $user_meta['test4'][0];
$test5 = $user_meta['test5'][0];
$test6 = $user_meta['test6'][0];
$test7 = $user_meta['test7'][0];
$test8 = $user_meta['test8'][0];
$test9 = $user_meta['test9'][0];
$user_name = $current_user->user_login;
$dis_name =  $current_user->display_name;
if($_POST['user_update']=='Update'){

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $url = $_POST['url'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $postalcode = $_POST['postalcode'];
    $test1 = $_POST['test1'];
    $test2 = $_POST['test2'];
    $test3 = $_POST['test3'];
    $test4 = $_POST['test4'];
    $test5 = $_POST['test5'];
    $test6 = $_POST['test6'];
    $test7 = $_POST['test7'];
    $test8 = $_POST['test8'];
    $test9 = $_POST['test9'];
    $metas = array( 
        'first_name'    =>  $first_name, 
        'last_name'     =>  $last_name ,
        'nickname'      =>  $nickname,
        'email'         =>  $email ,
        'url'           =>  $url,
        'address'       =>  $address,
        'city'          =>  $city, 
        'postalcode'    =>  $postalcode,
        'test1'         =>  $test1,
        'test2'         =>  $test2 ,
        'test3'         =>  $test3,
        'test4'         =>  $test4,
        'test5'         =>  $test5,
        'test6'         =>  $test6 ,
        'test7'         =>  $test7,
        'test8'         =>  $test8,
        'test9'         =>  $test9,
    );
    foreach($metas as $key => $value) {
        update_user_meta( $user_id, $key, $value );
    }
}
?>
<!-- <form class="mx-5 py-3" method="post" action="<?php echo home_url('/') ?>">
    <input class="form-control" type="text" name="user_login" placeholder="Username" <?php if(isset($user_name)): echo 'value="'.$user_name.'"'; endif; ?> disabled><br>
    <input class="form-control" type="text" name="first_name" placeholder="First Name" <?php if(isset($first_name)): echo 'value="'.$first_name.'"'; endif; ?>><br>
    <input class="form-control" type="text" name="last_name" placeholder="Last Name" <?php if(isset($last_name)): echo 'value="'.$last_name.'"'; endif; ?>><br>
    <input class="form-control" type="text" name="nickname" placeholder="Nickname" <?php if(isset($nickname)): echo 'value="'.$nickname.'"'; endif; ?>><br>
    <input class="form-control" type="text" name="email" placeholder="Email" <?php if(isset($email)): echo 'value="'.$email.'"'; endif; ?>><br>
    <input class="form-control" type="text" name="url" placeholder="Website" <?php if(isset($url)): echo 'value="'.$url.'"'; endif; ?>><br>
    <input class="form-control" type="text" name="description" placeholder="Biographical Info" <?php if(isset($description)): echo 'value="'.$description.'"'; endif; ?>><br>
    <input class="form-control" type="text" name="address" placeholder="Address" <?php if(isset($address)): echo 'value="'.$address.'"'; endif; ?>><br>
    <input class="form-control" type="text" name="city" placeholder="City" <?php if(isset($city)): echo 'value="'.$city.'"'; endif; ?>><br>
    <input class="form-control" type="text" name="postalcode" placeholder="Postal Code" <?php if(isset($postalcode)): echo 'value="'.$postalcode.'"'; endif; ?>><br>
    <input class="form-control" type="text" name="test1" placeholder="Test One" <?php if(isset($test1)): echo 'value="'.$test1.'"'; endif; ?>><br>
    <input class="form-control" type="text" name="test2" placeholder="Test Two" <?php if(isset($test2)): echo 'value="'.$test2.'"'; endif; ?>><br>
    <input class="form-control" type="text" name="test3" placeholder="Test Three" <?php if(isset($test3)): echo 'value="'.$test3.'"'; endif; ?>><br>
    <input class="form-control" type="text" name="test4" placeholder="Test Four" <?php if(isset($test4)): echo 'value="'.$test4.'"'; endif; ?>><br>
    <input class="form-control" type="text" name="test5" placeholder="Test Five" <?php if(isset($test5)): echo 'value="'.$test5.'"'; endif; ?>><br>
    <input class="form-control" type="text" name="test6" placeholder="Test Six" <?php if(isset($test6)): echo 'value="'.$test6.'"'; endif; ?>><br>
    <input class="form-control" type="text" name="test7" placeholder="Test Seven" <?php if(isset($test7)): echo 'value="'.$test7.'"'; endif; ?>><br>
    <input class="form-control" type="text" name="test8" placeholder="Test Eight" <?php if(isset($test8)): echo 'value="'.$test8.'"'; endif; ?>><br>
    <input class="form-control" type="text" name="test9" placeholder="Test Nine" <?php if(isset($test9)): echo 'value="'.$test9.'"'; endif; ?>><br>
    <input id="sumbit" class="btn-block btn-lg" type="submit" name="user_update" value="Update" />
</form> -->
<?php 
else:
?>
<?php 
if($_POST['post_submit']=='Sumbit'){

    $user_login = $_POST['user_login'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $url = $_POST['url'];
    $description = $_POST['description'];
    $userdata = array(
    'user_login'    =>  $user_login,
    'user_email'    =>  $email,
    'first_name'    =>  $first_name,
    'last_name'     =>  $last_name,
    'nickname'      =>  $nickname,
    'last_name'     =>  $last_name,
    'nickname'      =>  $nickname,
    'url'           =>  $url,
    'description'   =>  $description,
    'role' => 'subscriber'
    );
    $user = wp_insert_user($userdata);
}
?>
<!-- <form class="mx-5 py-3" method="post" action="<?php echo home_url('/') ?>">
    <input class="form-control" type="text" name="user_login" placeholder="Username"><br>
    <input class="form-control" type="text" name="first_name" placeholder="First Name"><br>
    <input class="form-control" type="text" name="last_name" placeholder="Last Name"><br>
    <input class="form-control" type="text" name="nickname" placeholder="Nickname"><br>
    <input class="form-control" type="text" name="email" placeholder="Email"><br>
    <input class="form-control" type="text" name="url" placeholder="Website"><br>
    <input class="form-control" type="text" name="description" placeholder="Biographical Info"><br>
    <input class="form-control" type="text" name="address" placeholder="Address"><br>
    <input class="form-control" type="text" name="city" placeholder="City"><br>
    <input class="form-control" type="text" name="postalcode" placeholder="Postal Code"><br>
    <input class="form-control" type="text" name="test1" placeholder="Test One"><br>
    <input class="form-control" type="text" name="test2" placeholder="Test Two"><br>
    <input class="form-control" type="text" name="test3" placeholder="Test Three"><br>
    <input class="form-control" type="text" name="test4" placeholder="Test Four"><br>
    <input class="form-control" type="text" name="test5" placeholder="Test Five"><br>
    <input class="form-control" type="text" name="test6" placeholder="Test Six"><br>
    <input class="form-control" type="text" name="test7" placeholder="Test Seven"><br>
    <input class="form-control" type="text" name="test8" placeholder="Test Eight"><br>
    <input class="form-control" type="text" name="test9" placeholder="Test Nine"><br>
    <input id="sumbit" class="btn-block btn-lg" type="submit" name="post_submit" value="Sumbit" />
</form> -->

<?php 
endif;
wp_footer(); 
?>
</body>
</html>