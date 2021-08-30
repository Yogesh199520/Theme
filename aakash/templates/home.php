<?php /* Template Name: Home Template */ 
get_header();
$pid = get_the_ID();
$my_image = get_field('my_image',$pid);
$my_name = get_field('my_name',$pid); ?>
<ul class="grid-nav">
  <li class="animsition" data-animsition-in-class="fade-in-down-lg" data-animsition-in-duration="300" data-animsition-out-class="zoom-out-lg" data-animsition-out-duration="500" style="background-image:url(<?php echo $my_image; ?>);">
  	<div class="head"><?php echo $my_name; ?></div>
  </li>
  <?php if(have_rows('home_menu')):
  while(have_rows('home_menu')): the_row();
  $heading = get_sub_field('heading',$pid);
  $page_link = get_sub_field('page_link',$pid);
  $page_icon = get_sub_field('page_icon',$pid); ?>
  <li class="animsition" data-animsition-in-class="fade-in-down-lg" data-animsition-in-duration="300" data-animsition-out-class="zoom-out-lg" data-animsition-out-duration="500" style="background-color:<?php the_sub_field('menu_color'); ?>">
    <a href="<?php echo $page_link; ?>" class="animsition-link">
    <div>
    	<div class="grid-icon"><?php echo $page_icon; ?></div>
      <h2><?php echo $heading; ?></h2>
      <?php if(have_rows('subheading',$pid)): ?>
      <p class="cd-headline clip is-full-width">
        <span class="cd-words-wrapper">
        <?php while(have_rows('subheading',$pid)): the_row(); $subheading_text = get_sub_field('subheading_text',$pid); ?>
          <b><?php echo $subheading_text; ?></b>
        <?php endwhile; ?>
        </span>
      </p>
      <?php endif; ?>
      <em>view</em>
    </div>
    </a>
  </li>
  <?php endwhile; endif; ?>
</ul>

<?php get_footer(); ?>