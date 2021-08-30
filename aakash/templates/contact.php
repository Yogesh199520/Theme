<?php /* Template Name: Contact Template */ 
get_header();
$pid = get_the_ID();
$contact_title = get_field('contact_title',$pid);
$address_icon = get_field('address_icon',$pid);
$address = get_field('address',$pid);
$email_icon = get_field('email_icon',$pid);
$email = get_field('email',$pid);
$phone_icon = get_field('phone_icon',$pid);
$phone = get_field('phone',$pid);
$phone_strip = preg_replace('/\s+/', '', $phone);
$longitude = get_field('longitude',$pid);
$latitude = get_field('latitude',$pid);
$contact_form_title = get_field('contact_form_title',$pid);
$contact_form_content = get_field('contact_form_content',$pid);
?>
<div class="contact-content">
  <div class="map-container">
    <div id="map-canvas"></div>
  </div>
  <div class="content-box">
    <div class="contact-details">
      <?php if(!empty($contact_title)){ ?><h5 class="heading"><span><?php echo $contact_title; ?></span></h5><?php } ?>
      <?php if(!empty($address)){ ?><p><?php echo $address_icon; ?> <?php echo $address; ?></p><?php } ?>
      <?php if(!empty($email)){ ?><p><?php echo $email_icon; ?> <b>Email : </b> <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p><?php } ?>
      <?php if(!empty($phone)){ ?><p><?php echo $phone_icon; ?> <b>Phone : </b> <a href="tel:<?php echo $phone_strip; ?>"><?php echo $phone; ?></a></p><?php } ?>
      <?php if(have_rows('social','option')): ?>
      <ul class="socialLinks">
        <?php while(have_rows('social','option')): the_row(); $icon = get_sub_field('social_icon'); $link = get_sub_field('social_link'); ?>
        <li><a href="<?php echo esc_url($link); ?>" target="_blank"><?php echo $icon; ?></a></li>
        <?php endwhile; ?>
      </ul>
      <?php endif; ?>
    </div>
    <?php if(!empty($contact_form_title)){ ?><h4 class="heading"><span><?php echo $contact_form_title; ?></span></h4><?php } ?>
    <?php echo $contact_form_content; ?>
    <?php echo do_shortcode('[contact-form-7 id="107" title="Contact form 1"]'); ?>
  </div>
</div>
<?php get_footer(); ?>