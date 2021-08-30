<?php /* Template Name: About Template */ 
get_header();
$pid = get_the_ID();
$my_image = get_field('my_image',$pid);
$heading = get_field('heading',$pid);
$content = get_field('content',$pid);
$my_resume = get_field('my_resume',$pid);
?>
<?php //========= row start ========= ?>
<div class="row table-row">
  <?php if($my_image){ ?><div class="col-sm-4 my-img hidden-xs" style="background-image:url(<?php echo $my_image; ?>);"></div><?php } ?>
  <div class="col-sm-8">
    <div class="content-box">
    <h2 class="no-mar"><?php echo $heading; ?></h2>
    <?php if(have_rows('subheading',$pid)): ?>
    <h5 class="cd-headline clip is-full-width">
      <span class="cd-words-wrapper">
      <?php while(have_rows('subheading',$pid)): the_row(); $subheading_text = get_sub_field('subheading_text',$pid); ?>
        <b><?php echo $subheading_text; ?></b>
      <?php endwhile; ?>
      </span>
    </h5>
    <?php endif; ?>
    <?php echo $content; ?>
    <?php if($my_resume){ ?><p><a href="<?php echo $my_resume; ?>" class="btn btn-primary">Download Resume</a></p><?php } ?>
    </div>
  </div>
</div>
<?php //========= row end ========= ?>
<?php //========= row start ========= ?>
<?php if(have_rows('overview',$pid)): ?>
<div class="overview-container">
  <?php while(have_rows('overview',$pid)): the_row();
  $heading = get_sub_field('heading',$pid); 
  $sub_heading = get_sub_field('sub_heading',$pid);
  $icon = get_sub_field('icon',$pid);
  $color = get_sub_field('color',$pid); ?>
  <div class="overview-box color2" style="background-color:<?php echo $color; ?>;">
    <div class="grid-icon small"><?php echo $icon; ?></div>
    <h3><?php echo $heading; ?></h3>
    <h5><?php echo $sub_heading; ?></h5>
  </div>
  <?php endwhile; ?>
</div>
<?php endif; ?>
<?php //========= row end ========= ?>
<?php //========= row start ========= ?>
<?php $main_heading = get_field('main_heading',$pid); ?>
<?php if(have_rows('service_box',$pid)): ?>
<div class="row">
  <div class="col-sm-12">
    <div class="content-box">
      <div class="row mar-50">
        <div class="col-md-12">
          <h4 class="heading text-center"><span><?php echo $main_heading; ?></span></h4>
        </div>
      </div>
      <div class="row">
      <?php while(have_rows('service_box',$pid)): the_row();
      $service_icon = get_sub_field('service_icon',$pid); 
      $service_heading = get_sub_field('service_heading',$pid);
      $service_content = get_sub_field('service_content',$pid); ?>
        <div class="col-md-4 col-sm-6">
          <div class="service-box">
            <?php echo $service_icon; ?>
            <h5><?php echo $service_heading; ?></h5>
            <p><?php echo $service_content; ?></p>
            <div class="grid-icon small"><?php echo $service_icon; ?></div>
          </div>
        </div>
      <?php endwhile; ?>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
<?php //========= row end ========= ?>
<?php get_footer(); ?>