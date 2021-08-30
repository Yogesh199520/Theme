<?php /* Template Name: Resume Template */ 
get_header(); ?>
<?php //========= row start ========= ?>
<div class="container-fluid">
<div class="row">
<?php //========= col start ========= ?>
<?php if(have_rows('experience',$pid)): ?>
<div class="col-md-4">
  <div class="row">
    <div class="col-md-12">
      <div class="content-box no-side-pad">
      <h4 class="heading"><span><?php echo get_field('experience_heading',$pid); ?></span></h4>
      <ul class="resume-list">
      <?php while(have_rows('experience',$pid)): the_row();
      $heading = get_sub_field('heading',$pid); 
      $sub_heading = get_sub_field('sub_heading',$pid);
      $icon = get_sub_field('icon',$pid);
      $tenure = get_sub_field('tenure',$pid);
      $content = get_sub_field('content',$pid); ?>
        <li>
          <div class="resume-title">
            <div class="resume-icon">
              <?php echo $icon; ?>
            </div>
            <h5><?php echo $heading; ?></h5>
            <span><?php echo $sub_heading; ?></span>
          </div>
          <div class="resume-content">
            <b><?php echo $tenure; ?></b>   
            <p><?php echo $content; ?></p>
            <div class="grid-icon small"><?php echo $icon; ?></div>
          </div>
        </li>
        <?php endwhile; ?>
      </ul>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
<?php //========= col end ========= ?>
<?php //========= col start ========= ?>
<?php if(have_rows('education',$pid)): ?>
<div class="col-md-4">
  <div class="row">
    <div class="col-md-12">
      <div class="content-box no-side-pad">
      <h4 class="heading"><span><?php echo get_field('education_heading',$pid); ?></span></h4>
      <ul class="resume-list">
      <?php while(have_rows('education',$pid)): the_row();
      $heading = get_sub_field('heading',$pid); 
      $sub_heading = get_sub_field('sub_heading',$pid);
      $icon = get_sub_field('icon',$pid);
      $tenure = get_sub_field('tenure',$pid);
      $content = get_sub_field('content',$pid); ?>
        <li>
          <div class="resume-title">
            <div class="resume-icon">
              <?php echo $icon; ?>
            </div>
            <h5><?php echo $heading; ?></h5>
            <span><?php echo $sub_heading; ?></span>
          </div>
          <div class="resume-content">
            <b><?php echo $tenure; ?></b>   
            <p><?php echo $content; ?></p>
            <div class="grid-icon small"><?php echo $icon; ?></div>
          </div>
        </li>
        <?php endwhile; ?>
      </ul>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
<?php //========= col end ========= ?>
<?php //========= col start ========= ?>
<?php if(have_rows('skill',$pid)): ?>
<div class="col-md-4">
  <div class="row">
    <div class="col-md-12">
      <div class="content-box no-side-pad">
      <h4 class="heading"><span><?php echo get_field('skill_heading',$pid); ?></span></h4>
      <ul class="resume-list">
      <?php while(have_rows('skill',$pid)): the_row();
      $heading = get_sub_field('heading',$pid); 
      $icon = get_sub_field('icon',$pid); ?>
        <li>
          <div class="resume-title">
            <div class="resume-icon">
              <?php echo $icon; ?>
            </div>
            <h5 class="one-line"><?php echo $heading; ?></h5> 
          </div>
          <?php if(have_rows('my_skill',$pid)): ?>
          <div class="resume-content">
          <?php while(have_rows('my_skill',$pid)): the_row();
          $skill_name = get_sub_field('skill_name',$pid); 
          $skill_percentage = get_sub_field('skill_percentage',$pid); ?>
            <div class="progress-box">
              <p><?php echo $skill_name; ?></p>
              <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $skill_percentage; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $skill_percentage; ?>%"><span class="sr-only"><?php echo $skill_percentage; ?>%</span></div>
              </div>
            </div>
          <?php endwhile; ?>
          </div>
          <?php endif; ?>
          <div class="grid-icon small"><?php echo $icon; ?></div>   
        </li>
      <?php endwhile; ?>
      </ul>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
<?php //========= col end ========= ?>
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
    <h1><?php echo $heading; ?></h1>
    <h5><?php echo $sub_heading; ?></h5>
  </div>
  <?php endwhile; ?>
</div>
<?php endif; ?>
<?php //========= row end ========= ?>
        
<?php get_footer(); ?>