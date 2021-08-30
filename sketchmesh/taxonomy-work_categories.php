<?php
/*==============================*/
// @package SketchMesh
// @author SLICEmyPAGE
/*==============================*/
get_header();
$obj_id = get_queried_object_id();
$obj = get_queried_object(); ?>
<div class="work-branding-container">
  <div class="work-branding-head">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <?php $terms = get_terms('work_categories',array('hide_empty'=>false));
		if(!empty($terms) && !is_wp_error($terms)): ?>
          <ul class="work-exp-list">
          	<?php foreach($terms as $term): ?>
            <li class="list-item"><a href="<?php echo esc_url(get_term_link($term)); ?>" <?php if($term->term_id == $obj_id){ echo 'class="active"'; } ?>><?php echo $term->name; ?></a></li>
        	<?php endforeach; ?>
          </ul>
      	<?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="work-branding-body">
    <div class="sr-only text-center" style="padding:40px 0 20px;">
      <h1><?php echo $obj->name; ?></h1>
    </div>
    <?php $query = new WP_Query(array('post_type'=>'works','posts_per_page'=>-1,'tax_query'=>array(array('taxonomy'=>'work_categories','field'=>'id','terms'=>$obj_id))));
    if($query->have_posts()): while($query->have_posts()): $query->the_post(); ?>
    <?php if($obj->slug == 'branding'){ ?>
    <div class="work-branding-list" id="<?php the_ID(); ?>" style="background-color:<?php echo get_field('w_bg_color'); ?>; color:<?php echo get_field('w_text_color'); ?>;">
      <div class="container">
        <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
          <div class="col-md-12 text-center">
            <div class="work-branding-header">
              <h3><?php echo get_the_title(); ?></h3>
              <?php the_field('body_text'); ?>
            </div>
            <div class="work-branding-img os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.4s">
              <?php echo wp_get_attachment_image(get_field('image'),'full','',array('alt'=>get_the_title())); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php }elseif($obj->slug == 'packaging'){ ?>
    <div class="work-packaging-list" id="<?php the_ID(); ?>" style="background-color:<?php echo get_field('w_bg_color'); ?>; color:<?php echo get_field('w_text_color'); ?>;">
      <div class="container">
        <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.4s">
          <div class="col-md-12">
            <div class="packaging-box">
              <h3><?php echo get_the_title(); ?></h3>
              <?php the_field('body_text'); ?>
            </div>
          </div>
        </div>
        <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.5s">
          <div class="col-md-10 offset-md-1">
            <div class="packaging-img">
              <?php echo wp_get_attachment_image(get_field('image'),'full','',array('alt'=>get_the_title())); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php }elseif($obj->slug == 'video'){
    $video = get_field('video_url'); ?>
    <div class="work-video-list" id="<?php the_ID(); ?>" style="background-color:<?php echo get_field('w_bg_color'); ?>; color:<?php echo get_field('w_text_color'); ?>;">
      <div class="container">
        <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.4s">
          <div class="col-md-12">
            <div class="video-box">
              <h3><?php echo get_the_title(); ?></h3>
              <?php the_field('body_text'); ?>
              <div class="video-img os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.5s">
                <img src="<?php echo IMG; ?>ipad.png" alt="" />
                <div class="video-img-content">
                  <?php echo wp_get_attachment_image(get_field('video_thumb'),'full','',array('alt'=>get_the_title())); ?>
                </div>
                <a href="<?php echo $video; ?>" class="play-btn">
                  <img src="<?php echo IMG; ?>play-btn.png" alt="" />
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php }elseif($obj->slug == 'websites'){
    $url = get_field('website_url'); ?>
    <div class="work-website-list" id="<?php the_ID(); ?>" style="background-color:<?php echo get_field('w_bg_color'); ?>; color:<?php echo get_field('w_text_color'); ?>;">
      <div class="container">
        <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.4s">
          <div class="col-md-12">
            <div class="websites-box">
              <div class="website-left">
      			<div class="d-md-block d-lg-none">
                <h3><?php echo get_the_title(); ?></h3>
                <?php the_field('body_text'); ?>
      			</div>
                <div class="website-img os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.5s">
                    <?php echo wp_get_attachment_image(get_field('image'),'full','',array('alt'=>get_the_title())); ?>
                </div>
                <div class="website-btn">
                  <a href="<?php echo $url; ?>" target="_blank" rel="noopener" class="btn btn-default">Visit Website</a>
                  <a href="<?php echo home_url('/?sec=contact'); ?>" class="btn btn-default">Contact Us</a>
                </div>
              </div>
              <div class="website-right">
      			<div class="d-none d-md-none d-lg-block">
                <h3><?php echo get_the_title(); ?></h3>
                <?php the_field('body_text'); ?>
      			</div>
                <?php if(have_rows('feature_list')): ?>
                <ul class="website-feature-list">
                  <?php while(have_rows('feature_list')): the_row();
                  $icon = get_sub_field('icon');
                  $title = get_sub_field('title'); ?>
                  <li>
                    <div class="website-feature-box">
                      <?php if(!empty($icon)): echo '<img src="'.$icon.'" alt="'.$title.'" />'; endif; ?>
                      <?php if(!empty($title)): echo '<h5>'.$title.'</h5>'; endif; ?>
                    </div>
                  </li>
                  <?php endwhile; ?>
                </ul>
                <?php endif; ?>
      			<?php if(have_rows('feature_icon_list')): ?>
                <div class="developer-mode">
                  <?php while(have_rows('feature_icon_list')): the_row();
                  $icon = get_sub_field('icon'); ?>
                      <?php if(!empty($icon)): echo '<img src="'.$icon.'" alt="'.$title.'" />'; endif; ?>
                  <?php endwhile; ?>
                </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php }elseif($obj->slug == 'social-media'){ ?>
      <div class="work-social-media-list" id="<?php the_ID(); ?>" style="background-color:<?php echo get_field('w_bg_color'); ?>; color:<?php echo get_field('w_text_color'); ?>;">
        <div class="container">
          <div class="social-media-upper ">
            <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.4s">
              <div class="col-md-4 offset-md-1">
                <div class="social-media-left text-md-right">
                  <div class="social-media-img">
      				<h3><?php echo get_the_title(); ?></h3>	
                    <?php echo wp_get_attachment_image(get_field('image'),'full','',array('alt'=>get_the_title())); ?>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="social-media-right">
                  <h3><?php echo get_the_title(); ?></h3>
                  <?php the_field('body_text'); ?>
                </div>
              </div>
            </div>
          </div>
          <?php if(have_rows('concepts')): ?>
          <div class="social-media-lower ">
            <div class="row">
              <div class="col-md-12">
                <?php while(have_rows('concepts')): the_row();
                $heading = get_sub_field('heading');
                $sub_heading = get_sub_field('sub_heading'); ?>
                <?php
                $img_count = count(get_sub_field('images'));
                if(have_rows('images')):
                ?>
                <ul class="grid-list <?php if($img_count==2){ echo 'two-column-grid'; } ?>">
                  <?php if(!empty($heading) || !empty($sub_heading)): ?>
                  <li>
                    <div class="grid-info">
                      <?php if(!empty($heading)): echo '<h4>'.$heading.'</h4>'; endif; ?>
                      <?php if(!empty($sub_heading)): echo '<h5>'.$sub_heading.'</h5>'; endif; ?>
                    </div>
                  </li>
                  <?php endif; ?>
                  <?php while(have_rows('images')): the_row(); ?>
                  <li>
                    <div class="grid-box">
                      <div class="grid-img">
                        <?php echo wp_get_attachment_image(get_sub_field('image'),'full'); ?>
                      </div>
                    </div>
                  </li>
                  <?php endwhile; ?>
                </ul>
                <?php endif; ?>
                <?php endwhile; ?>
              </div>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>
    <?php } ?>
    <?php endwhile; endif; ?>
  </div>
</div>
<?php get_footer(); ?>