<?php 
$heading = get_sub_field('heading');
$telephone = $GLOBALS['theme_options']['telephone'];
$telephone_strip = str_replace(' ','',$telephone);
$email = $GLOBALS['theme_options']['email'];
if(!empty($email || $telephone)):
?>
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="contact-cta-text text-center">
                    <?php 
                    if(!empty($heading)): echo '<h5>'.$heading.'</h5>'; endif; 
                    if(!empty($telephone)): echo '<h3 class="d-block d-md-none"><a href="tel:'.$telephone_strip.'">'.$telephone.'</a></h3>'; endif; 
                    if(!empty($telephone)): echo '<h3 class="d-none d-md-block"><a href="tel:'.$telephone_strip.'">'.$telephone.'</a></h3>'; endif; 
                    if(!empty($email)): echo '<h5><a href="mailto:'.$email.'">'.$email.'</a></h5>'; endif; 
                    ?>
                </div>
            </div>
        </div>
    </div>
</div> 
<?php endif; ?>