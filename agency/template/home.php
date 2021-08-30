<?php
/*==============================*/
// @package agency
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Homepage */

get_header();

if(have_rows('hero_slider')):
?>	
<!--============================== Hero Slider Start ==============================-->
<div class="hero-outer">
    <div class="owl-carousel owl-theme hero-slider">
        <?php 
        while(have_rows('hero_slider')): the_row();
        $bg_image = wp_get_attachment_image_url(get_sub_field('bg_image',),'full');
        $sub_heading = get_sub_field('sub_heading');
        $heading = get_sub_field('heading');
        $data_animation = get_sub_field('data_animation');
        $text = get_sub_field('text');
        $button_text = get_sub_field('button_text');
        $button_link = get_sub_field('button_link');
        ?>
        <div class="hero-container" style="background-image: url(<?php echo esc_html($bg_image); ?>)">
            <div class="middle-container">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <?php 
                            if(!empty($sub_heading)): echo '<h6 class="animated delay-1" data-animate="'.$data_animation .'">'.$sub_heading.'</h6>'; endif; 
                            if(!empty($heading)): echo '<h1 class="animated delay-2" data-animate="'.$data_animation .'">'.$heading.'</h1>'; endif; 
                            if(!empty($text)): echo '<p class="animated delay-3" data-animate="'.$data_animation .'">'.$text.'</p>'; endif;
                            if(!empty($button_text)): echo '<div class="animated delay-4" data-animate="'.$data_animation .'"><a class="btn btn-default" href="'.$button_link.'">'.$button_text.'</a></div>'; endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
<!--============================== Hero Slider End ==============================-->
<?php 
endif;
$about_colored_heading = get_field('about_colored_heading');
$about_heading = get_field('about_heading');
$about_paragraph = get_field('about_paragraph');
?>
<!--============================== Content Section Start ==============================-->
<div class="content-container">
    <div class="container">
        <?php if(!empty($about_colored_heading ||$about_heading || $about_paragraph)): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="heading os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.1s">
                    <?php 
                    if(!empty($about_colored_heading)): echo '<h6>'.$about_colored_heading.'</h6>'; endif; 
                    if(!empty($about_heading)): echo '<h3>'.$about_heading.'</h3>'; endif; 
                    if(!empty($about_paragraph)): echo '<p>'.$about_paragraph.'</p>'; endif; 
                    ?>
                </div>
            </div>
        </div>
        <?php 
        endif; 
        if(have_rows('about_us')):
        ?>
        <div class="row">
            <div class="col-md-12">
                <?php
                while(have_rows('about_us') ): the_row();
                $image = wp_get_attachment_image(get_sub_field('image'),'large');
                $heading = get_sub_field('heading');
                $body_text = get_sub_field('body_text');
                $button_text = get_sub_field('button_text');
                $button_link = get_sub_field('button_link');
                $index = get_row_index();
                if($index % 2 ==0):
                    $cls = "feature-box reverse";
                else:
                    $cls = "feature-box";
                endif;
                ?>
                <div class="<?php echo esc_html($cls); ?>">
                    <?php if(!empty($image)): ?>
                    <div class="feature-left os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.1s">
                        <div>
                            <?php echo html_entity_decode(esc_html($image)); ?>
                        </div>
                    </div>
                    <?php 
                    endif;
                    if(!empty($heading ||$body_text || $button_text)):
                    ?>
                    <div class="feature-right os-animation" data-os-animation="fadeInRight" data-os-animation-delay="0.3s">
                        <div>
                            <?php 
                            if(!empty($heading)): echo '<h4>'.$heading.'</h4>'; endif; 
                            echo html_entity_decode(esc_html($body_text));
                            if(!empty($button_text)): echo '<a href="'.$button_link.'" class="link">'.$button_text.'</a>'; endif; 
                            ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <?php 
                endwhile; 
                ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<!--============================== Content Section End ==============================-->
<?php 
if(have_rows('stats','option')):
get_template_part('template-part/stats');
endif; 
$why_colored_heading = get_field('why_colored_heading');
$why_heading = get_field('why_heading');
$why_paragraph = get_field('why_paragraph');
if(have_rows('why_us')):
?>
<!--============================== Content Section Start ==============================-->
<div class="content-container color-bg">
    <div class="container">
        <?php if(!empty($why_colored_heading ||$why_heading || $why_paragraph)): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="heading os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.1s">
                    <?php 
                    if(!empty($why_colored_heading)): echo '<h6>'.$why_colored_heading.'</h6>'; endif; 
                    if(!empty($why_heading)): echo '<h3>'.$why_heading.'</h3>'; endif; 
                    if(!empty($why_paragraph)): echo '<p>'.$why_paragraph.'</p>'; endif; 
                    ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.1s">
            <?php
            while(have_rows('why_us') ): the_row();
            $heading = get_sub_field('heading');
            $body_text = get_sub_field('body_text');
            $icon = get_sub_field('icon');
            ?>
            <div class="col-md-4">
                <div class="why-box">
                    <div class="why-inside">
                        <?php 
                        if(!empty($icon)): echo '<div class="icon">'.$icon.'</div>'; endif; 
                        if(!empty($heading)): echo '<h5>'.$heading.'</h5>'; endif; 
                        if(!empty($body_text)): echo '<p>'.$body_text.'</p>'; endif; 
                        ?>
                    </div>
                </div>
            </div>
            <?php 
            endwhile; 
            ?>
        </div>
    </div>
</div>
<!--============================== Content Section End ==============================-->
<?php
endif;
$show_recent_projects = get_field('recent_projects');
$select_projects = get_field('select_projects');
$project_colored_heading = get_field('project_colored_heading');
$project_heading = get_field('project_heading');
$project_paragraph = get_field('project_paragraph');
if($show_recent_projects):
?>
<!--============================== Content Section Start ==============================-->
<div class="content-container">
    <div class="container">
        <?php if(!empty($project_colored_heading ||$project_heading || $project_paragraph)): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="heading os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.1s">
                    <?php 
                    if(!empty($project_colored_heading)): echo '<h6>'.$project_colored_heading.'</h6>'; endif; 
                    if(!empty($project_heading)): echo '<h3>'.$project_heading.'</h3>'; endif; 
                    if(!empty($project_paragraph)): echo '<p>'.$project_paragraph.'</p>'; endif; 
                    ?>
                </div>
            </div>
        </div>
        <?php 
        endif; 
        if($select_projects):
        ?>
        <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.1s">
            <div class="owl-carousel owl-theme case-slider">
                <?php foreach($select_projects as $project): 
                $title = get_the_title($project->ID);
                $excerpt = get_the_excerpt($project->ID);
                $featured_img_url = get_the_post_thumbnail_url($project->ID,'large');
                $link = get_the_permalink($project->ID); 
                ?>
                <div class="recent-project-box">
                    <div class="recent-project-image" style="background-image: url(<?php echo esc_html($featured_img_url); ?>)"></div>
                    <div class="recent-project-content animated" data-animate="fadeInUp">
                        <h5><?php echo esc_html($title); ?></h5>
                        <?php echo html_entity_decode(esc_html($excerpt)); ?>
                        <a href="<?php echo esc_html($link); ?>" class="link">Read more</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php 
        else:
        $service_args = array('post_type'=> 'projects','post_status'=> 'publish',);
        $service_query = new WP_Query($service_args); 
        ?>
        <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.1s">
            <div class="owl-carousel owl-theme case-slider">
                <?php 
                while($service_query->have_posts()) : $service_query->the_post();
                
                ?>
                <div class="recent-project-box">
                    <div class="recent-project-image" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)"></div>
                    <div class="recent-project-content animated" data-animate="fadeInUp">
                        <h5><?php the_title(); ?></h5>
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>" class="link">Read more</a>
                    </div>
                </div>
                <?php 
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>    
        <?php endif; ?>
    </div>
</div>
<!--============================== Content Section End ==============================-->
<?php
endif;
$show_recent_blog = get_field('recent_blog'); 
$blog_colored_heading = get_field('blog_colored_heading');
$blog_heading = get_field('blog_heading');
$blog_paragraph = get_field('blog_paragraph');
$select_blog = get_field('select_blog');
$args = array('post_type'=>'post','post_status'=>'publish','posts_per_page'=>3);
$query = new WP_Query($args);
if($show_recent_blog):
?>
<!--============================== Content Section Start ==============================-->
<div class="content-container color-bg">
    <div class="container">
        <?php if(!empty($blog_colored_heading ||$blog_heading || $blog_paragraph)):?>
        <div class="row">
            <div class="col-md-12">
                <div class="heading os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.1s">
                    <?php 
                    if(!empty($blog_colored_heading)): echo '<h6>'.$blog_colored_heading.'</h6>'; endif; 
                    if(!empty($blog_heading)): echo '<h3>'.$blog_heading.'</h3>'; endif; 
                    if(!empty($blog_paragraph)): echo '<p>'.$blog_paragraph.'</p>'; endif; 
                    ?>
                </div>
            </div>
        </div>
        <?php 
        endif;
        if($select_blog):
        ?>
        <div class="row">
            <div class="col-md-12">
                <ul class="post-list os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.1s">
                    <?php foreach($select_blog as $blog): 
                    $title = get_the_title($blog->ID);
                    $excerpt = get_the_excerpt($blog->ID);
                    $featured_img = get_the_post_thumbnail($blog->ID);
                    $link = get_the_permalink($blog->ID);
                    $post_date = get_the_date('M d, Y',$blog->ID); 
                    ?>
                    <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="post-box">
                            <?php if(!empty($featured_img)): echo '<div class="post-box-img"><a href="'.$link.'">'.$featured_img.'</a></div>'; endif; ?>
                            <div class="post-box-content">
                                <h6><?php echo esc_html($post_date); ?></h6>
                                <h5><a href="<?php echo esc_html($link); ?>"><?php echo esc_html($title); ?></a></h5>
                                <a href="<?php echo esc_html($link); ?>" class="link">Read more</a>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <?php else: ?>
            <div class="row">
                <div class="col-md-12">
                    <ul class="post-list os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.1s">
                        <?php 
                        while($query->have_posts()) : $query->the_post();
                        ?>
                        <li>
                            <div class="post-box">
                                <?php 
                                if(has_post_thumbnail()) : 
                                    echo '<div class="post-box-img"><a href="'.get_the_permalink().'">'.get_the_post_thumbnail().'</a></div>'; 
                                endif; 
                                ?>
                                <div class="post-box-content">
                                    <h6><?php echo get_the_date('M d, Y'); ?></h6>
                                    <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                    <a href="<?php the_permalink(); ?>" class="link">Read more</a>
                                </div>
                            </div>
                        </li>
                        <?php 
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<!--============================== Content Section End ==============================-->
<?php
endif;  
$select_testimonials = get_field('select_testimonials');
$testimonials_colored_heading = get_field('testimonials_colored_heading');
$testimonials_heading = get_field('testimonials_heading');
$testimonials_paragraph = get_field('testimonials_paragraph');
$show_testimonials = get_field('show_testimonials');
if($show_testimonials):
?>
<!--============================== Content Section Start ==============================-->
<div class="content-container">
    <div class="container">
        <?php if(!empty($testimonials_colored_heading || $testimonials_heading || $testimonials_paragraph)): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="heading os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.1s">
                    <?php 
                    if(!empty($testimonials_colored_heading)): echo '<h6>'.$testimonials_colored_heading.'</h6>'; endif; 
                    if(!empty($testimonials_heading)): echo '<h3>'.$testimonials_heading.'</h3>'; endif; 
                    if(!empty($testimonials_paragraph)): echo '<p>'.$testimonials_paragraph.'</p>'; endif; 
                    ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-10 offset-md-1 os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.1s">
                <div class="testimonial-slider owl-carousel owl-theme">
                    <?php foreach($select_testimonials as $testimonial): 
                    $content = get_post_field('post_content', $testimonial->ID);
                    $title = get_the_title($testimonial->ID);
                    $organization_name = get_field('organization_name', $testimonial->ID);
                    ?>
                    <div class="testimonials">
                        <blockquote><?php echo esc_html($content); ?></blockquote>
                        <p class="quote-by"><strong><?php echo esc_html($title); ?></strong> - <?php echo esc_html($organization_name); ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content Section End ==============================-->
<?php
endif;
if(have_rows('client_lists')): 
?>
<!--============================== Client Section Start ==============================-->
<div class="client-container">
    <ul class="client-list owl-carousel owl-theme logo-slider">
        <?php 
        while(have_rows('client_lists')): the_row();
        $logo = wp_get_attachment_image(get_sub_field('logo',),'medium');
        echo '<li><div>'.$logo.'</div></li>';
        endwhile;
        ?>
    </ul>
</div>
<!--============================== Client Section End ==============================-->
<?php
endif;
get_footer();
?>