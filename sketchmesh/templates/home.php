<?php
/*==============================*/
// @package SketchMesh
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Home */
get_header(); ?>
<?php //============================== Hero Start ============================== ?>
<?php
$home_bg = get_field('home_bg_image');
$home_heading = get_field('home_heading');
$home_sub_heading = get_field('home_sub_heading');
$home_paragraph = get_field('home_paragraph');
?>
<div class="hero-container flash-animation" style="background-image:url(<?php echo $home_bg; ?>)" id="flash-animation">
  <canvas id="demo-canvas"></canvas>
  <div class="hero-middle">
    <div class="container">
      <div class="row">
        <div class="col-md-10 offset-md-1">
          <div class="hero-content">
            <?php if(!empty($home_heading)): echo '<h1 class="os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">'.$home_heading.'</h1>'; endif; ?>
            <?php if(!empty($home_sub_heading)): echo '<h6 class="os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.4s">'.$home_sub_heading.'</h6>'; endif; ?>
            <?php if(!empty($home_paragraph)): echo '<p class="os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.5s">'.$home_paragraph.'</p>'; endif; ?>
            <a href="#contact" class="btn btn-outline-white js-scroll-trigger">Let's Get Started</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="intro-scroll-down" data-section="about">
    <div class="scroll-down"> <span class="mouse"> <span class="mouse-dot"></span> </span> </div>
  </div>
</div>
<?php //============================== Hero End ============================== ?>
<?php //============================== Content Container Start ============================== ?>
<?php
$about_heading = get_field('about_heading');
$about_sub_heading = get_field('about_sub_heading');
?>
<div class="content-container about-container color-bg" id="about">
<div class="container">
  <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
    <div class=" col-sm-12">
      <div class="heading">
        <?php if(!empty($about_heading)): echo '<h3>'.$about_heading.'</h3>'; endif; ?>
        <?php if(!empty($about_sub_heading)): echo '<h6>'.$about_sub_heading.'</h6>'; endif; ?>
      </div>
    </div>
  </div>
  <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.4s">
    <div class="col-md-12 text-center">
      <?php echo get_field('about_content'); ?>
    </div>
  </div>
  <?php if(have_rows('feature_list')): ?>
  <div class="row">
    <div class="col-md-12 text-center">
      <ul class="feature-list">
        <?php $i=3; while(have_rows('feature_list')): the_row();
        $img = get_sub_field('image');
        $title = get_sub_field('title'); ?>
        <li class="feature-item os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.<?php echo $i; ?>s">
          <div class="feature-box">
            <div class="feature-img">
              <?php echo wp_get_attachment_image($img['id'],'full','',array('alt'=>strip_tags($title))); ?>
            </div>
            <p><?php echo $title; ?></p>
          </div>
        </li>
        <?php $i++; endwhile; ?>
      </ul>
    </div>
  </div>
  <?php endif; ?>
</div>
</div>
<?php //============================== Content Container End ============================== ?>
<?php
$cta_text = get_field('cta_text');
$cta_button_text = get_field('cta_button_text');
if(!empty($cta_text)):
?>
<!--============================== cta start ==============================-->
<div class="cta-container">      
  <div class="container">
     <div class="row">
        <div class="col-sm-12 text-center os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
          <h4><?php echo $cta_text; ?></h4>
          <?php if(!empty($cta_button_text)): echo '<a href="#contact" class="btn btn-third js-scroll-trigger">'.$cta_button_text.'</a>'; endif; ?>
        </div>
     </div>
  </div>
</div>
<!--============================== cta end ==============================-->
<?php endif; ?>
<?php //============================== Content Container Start ============================== ?>
<?php
$service_heading = get_field('service_heading');
$service_sub_heading = get_field('service_sub_heading');
if(have_rows('service_list')): ?>
<div class="content-container service-container" id="services">
  <div class="container">
    <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
      <div class="col-sm-12">
        <div class="heading">
          <?php if(!empty($service_heading)): echo '<h3>'.$service_heading.'</h3>'; endif; ?>
          <?php if(!empty($service_sub_heading)): echo '<h6>'.$service_sub_heading.'</h6>'; endif; ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <ul class="our-service-list">
          <?php $i=1; while(have_rows('service_list')): the_row();
          $icon = get_sub_field('icon');
          $initial = get_sub_field('initial');
          $heading = get_sub_field('heading');
          if($i%2==0){ $ad = '0.4s'; }else{ $ad = '0.3s'; } ?>
          <li class="our-service-item os-animation" data-os-animation="fadeInUp" data-os-animation-delay="<?php echo $ad; ?>">
            <div class="service-box">
              <?php if(!empty($heading)): echo '<h4>'.$heading.'</h4>'; endif; ?>
              <div class="service-box-body">
                <div class="service-box-icon" data-title="<?php echo $initial; ?>"><?php echo wp_get_attachment_image($icon['id'],'full','',array('alt'=>strip_tags($heading))); ?></div>
                <?php if(have_rows('list_items')): ?>
                <ul class="service-list">
                  <?php while(have_rows('list_items')): the_row(); ?>
                  <li><?php the_sub_field('text'); ?></li>
                  <?php endwhile; ?>
                </ul>
                <?php endif; ?>
              </div>
            </div>
          </li>
          <?php $i++; endwhile; ?>
          <?php
          $last_service_item = get_field('last_service_item');
          $text = $last_service_item['text'];
          $button_text = $last_service_item['button_text'];
          if($text):
          ?>
          <li class="our-service-item service-item-with-bg os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.4s">
              <div class="service-box">
                  <h4><?php echo $text; ?></h4>
                  <?php if(!empty($button_text)): echo '<a href="#contact" class="btn btn-third js-scroll-trigger">'.$button_text.'</a>'; endif; ?>
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
<?php endif; ?>
<?php //============================== Content Container End ============================== ?>
<?php //============================== Content Container Start ============================== ?>
<?php
$work_heading = get_field('work_heading');
$work_sub_heading = get_field('work_sub_heading');
$query = new WP_Query(array('post_type'=>'works','posts_per_page'=>-1,'meta_key'=>'featured','meta_value'=>1,'meta_compare'=>'='));
if($query->have_posts()): ?>
<div class="content-container works-container color-bg" id="works">
  <div class="container">
    <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
      <div class="col-sm-12">
        <div class="heading">
          <?php if(!empty($work_heading)): echo '<h3>'.$work_heading.'</h3>'; endif; ?>
          <?php if(!empty($work_sub_heading)): echo '<h6>'.$work_sub_heading.'</h6>'; endif; ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <?php $terms = get_terms('work_categories',array('hide_empty'=>false));
        if(!empty($terms) && !is_wp_error($terms)): ?>
        <div class="grid-filters os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
          <ul class="work-exp-list filter-work-exp">
            <li class="list-item"><span  class="is-checked" data-filter="*">All</span></li>
            <?php foreach($terms as $term): ?>
            <li class="list-item"><span data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></span></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php endif; ?>
        <div class="grid os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.4s">
        <?php while($query->have_posts()): $query->the_post(); $terms = get_the_terms($post->ID,'work_categories'); ?>
          <?php if(!empty($terms)){ $term = array_shift($terms); $img = get_field('thumbnail_image'); ?>
			<?php $wh_heading = get_field('wh_heading'); ?>
          <?php $wh_sub_heading = get_field('wh_sub_heading'); ?>
          <?php
          $RGB_color = hex2rgb(get_field('bg_color'));
          $Final_Rgb_color = implode(", ", $RGB_color);
          ?>
          <div class="grid-item <?php echo $term->slug; ?>">
            <a href="<?php echo esc_url(get_term_link($term)).'?sec='.get_the_id(); ?>" class="grid-box">
              <?php echo wp_get_attachment_image($img,'full','',array('alt'=>$wh_heading,'class'=>'grid-img')); ?>
              <div class="grid-overlay" style="background : rgba(<?php echo $Final_Rgb_color; ?>,0.9);">
				  <?php if(!empty($wh_heading)): echo '<h4>'.$wh_heading.'</h4>'; endif; ?>
                <?php if(!empty($wh_sub_heading)): echo '<p>'.$wh_sub_heading.'</p>'; endif; ?>
              </div>
            </a>
          </div>
          <?php } ?>
        <?php endwhile; wp_reset_query(); ?>

        <div class="grid-item"><a href="/work-category/branding/" class="portfolio-view-all"><span class="viewall-text">VIEW <br> ALL</span></a></div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
<?php //============================== Content Container End ============================== ?>
<?php //============================== Content Container End ============================== ?>
<?php
$client_heading = get_field('client_heading');
$client_sub_heading = get_field('client_sub_heading');
?>
<div class="content-container our-clients" id="clients">
  <div class="container">
    <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
      <div class="col-sm-12">
        <div class="heading">
          <?php if(!empty($client_heading)): echo '<h3>'.$client_heading.'</h3>'; endif; ?>
          <?php if(!empty($client_sub_heading)): echo '<h6>'.$client_sub_heading.'</h6>'; endif; ?>
        </div>
      </div>
    </div>
    <?php if(have_rows('client_list')): ?>
    <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
      <div class="col-md-12">
        <ul class="clients-list logo-slider">
          <?php while(have_rows('client_list')): the_row();
          $logo = get_sub_field('logo'); ?>
          <li>
            <div class="list-img-item"><?php echo wp_get_attachment_image($logo['id'],'full','',array('alt'=>$logo['title'])); ?></div>
          </li>
          <?php endwhile; ?>
        </ul>
      </div>
    </div>
    <?php endif; ?>
  </div>
</div>
<?php //============================== Content Container End ============================== ?>
<script>
/*$('.work-slider').slick({
  dots: true,
  arrows: true
});*/
</script>
<?php get_footer(); ?>