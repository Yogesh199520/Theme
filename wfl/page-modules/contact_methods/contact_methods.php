<?php 
$address = $GLOBALS['theme_options']['address'];
$telephone = $GLOBALS['theme_options']['telephone'];
$telephone_strip = str_replace(' ','',$telephone);
$email = $GLOBALS['theme_options']['email'];
if(!empty($address || $email || $telephone)):
?>
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="contact-list d-flex flex-wrap text-center">
                    <?php if(!empty($address)): ?>
                    <li>
                        <div class="contact-list-box d-flex flex-column justify-content-center">
                            <div class="contact-list-icon"><i class="fas fa-map-marker-alt"></i></div>
                            <h3><?php echo $address; ?></h3>
                        </div>
                     </li>
                    <?php 
                    endif;
                    if(!empty($telephone)):
                    ?>
                    <li>
                        <div class="contact-list-box d-flex flex-column justify-content-center">
                            <div class="contact-list-icon"><i class="fas fa-phone"></i></div>
                            <h3>Phone<br/><a href="tel:+<?php echo $telephone_strip; ?>"><?php echo $telephone; ?></a></h3>
                        </div>
                    </li>
                    <?php 
                    endif;
                    if(!empty($email)): 
                    ?>
                    <li>
                        <div class="contact-list-box d-flex flex-column justify-content-center">
                            <div class="contact-list-icon"><i class="fas fa-envelope"></i></div>
                            <h3>Email<br/><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></h3>
                        </div>
                    </li>
                    <?php 
                    endif;
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div> 
<?php 
endif;
?>