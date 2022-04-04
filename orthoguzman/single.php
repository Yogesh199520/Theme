<?php
/*==============================*/
// @package Orthoguzman
// @author SLICEmyPAGE
/*==============================*/
if(!defined('ABSPATH')){
    exit; // Exit if accessed directly
} 
get_header();

$author_id = $post->post_author;
?>
<section class="banner-sec">
    <div class="container">
        <h1><?php the_title(); ?></h1>
    </div>
</section>
<div id="content">
    <section class="blog_sec">
        <div class="container">
            <div class="row">
                <div class="col-65 blog_leftbar single_left">
                    <div class="oxy-posts">
                        <div class="oxy-post">
                            <?php the_post_thumbnail('medium_lagre'); ?>
                            <div class="oxy-post-content">
                                <div class="oxy-post-meta">
                                    <div class="oxy-post-meta-author oxy-post-meta-item">
                                        <img src="<?php echo IMG.'avtar.png'; ?>" class="user-profile" alt="avtar" /><?php echo get_the_author_meta('display_name', $author_id); ?>
                                    </div>
                                    <div class="oxy-post-meta-date oxy-post-meta-item"><?php echo get_the_date('F m, Y'); ?></div>
                                </div>
                                <h3><a class="oxy-post-title" href="javascript:void(0)"><?php the_title(); ?></a></h3>
                                <?php 
                                the_content(); 
                                $tags = get_tags(array('hide_empty' => false));
                                $x = 1;
                                $length = count($tags);
                                if(!empty($tags)):
                                ?>
                                <div class="tag-bar">
                                    Tags: 
                                    <?php 
                                    foreach ($tags as $tag):
                                    $tag_link = get_tag_link($tag->term_id);
                                    ?>
                                    <a href="<?php echo $tag_link; ?>" rel="tag"><?php echo $tag->name; ?></a><?php if($x !== $length):echo ','; endif; ?>
                                    <?php
                                    $x++; 
                                    endforeach;
                                    ?> 
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php get_sidebar('sidebar'); ?>
            </div>
        </div>
    </section>

</div>

<?php
get_footer(); 
?>