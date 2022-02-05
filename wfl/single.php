<?php
/*==============================*/
// @package Booth Golf and Leisure
// @author Think EQ
/*==============================*/
get_header();
?>
<!--============================== 3rd level title block Start ============================-->
<div class="news-single-hero add-bg-graphic dark-pattern d-flex flex-column align-items-center justify-content-center">
    <div class="container os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <?php if(function_exists('bcn_display_list')){ ?>
                <div class="breadcrumbs-container mb-0">
                    <ol class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                        <?php bcn_display_list(); ?>
                    </ol>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!--==============================  3rd level title block End ==============================-->

<div class="content-container overflow-hidden">
    <div class="container os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
        <div class="row">
            <div class="col-md-12 offset-md-0 col-lg-10 offset-lg-1">
                <h1 class="post-title"><?php the_title(); ?></h1>
                <div class="news-single-meta d-lg-flex justify-content-between">
                    <div class="d-flex justify-content-between">
                        <span class="post-minutes-read"><?php echo ao_post_read_time(); ?></span>
                        <span class="post-date"><?php the_time('d/m/Y'); ?></span>
                    </div>
                    <div>
                        <span class="post-cat"><?php the_category(); ?></span>
                    </div>
                </div>
                <div class="news-single-content">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$bg_color = get_field('bg_color');
$quote_text = get_field('quote_text');
$quote_author = get_field('quote_author');
$quote_author_position = get_field('quote_author_position');
$quote_after_paragraph = get_field('quote_after_paragraph');
if(!empty($quote_text)):
?>
<div class="content-container fwq-container add-bg-graphic <?php echo $bg_color; ?>-bg add-inner-shadow" id="news-quote">
    <div class="fwq-box">
        <blockquote><?php echo $quote_text; ?></blockquote>
        <div class="fwq-by">
            <span><?php echo $quote_author; ?></span>
            <small><em>- </em><?php echo $quote_author_position; ?></small>
        </div>
    </div>
</div>
<script>
    function insertAfter(referenceNode, newNode) {
        referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
    }

    const blockquote = document.getElementById('news-quote');
    const selectingPara = document.getElementsByClassName('news-single-content')[0].children[<?php echo $quote_after_paragraph - 1; ?>];

    insertAfter(selectingPara, blockquote);
</script>
<?php
endif;

$sharing_disabled = get_post_meta($post->ID,'sharing_disabled',true);
if($sharing_disabled != 1){ ?>
<!--============================== Share This Start ============================-->
<div class="content-container p-0">
    <div class="container os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 d-flex justify-content-center">
                <div class="single-post-share">
                    <p>Share this</p>
                    <?php echo do_shortcode('[addtoany]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Share This End ============================-->
<?php
}

$prv_post = get_previous_post();
$next_post = get_next_post();
if($prv_post || $next_post):
?>
<!--============================== Buttons Start ============================-->
<div class="content-container">
    <div class="container os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
        <div class="row">
            <div class="col-lg-12">
                <div class="post-nav d-flex flex-wrap justify-content-center flex-column flex-md-row">
                    <a <?php if($next_post): echo 'href="'.get_permalink($next_post->ID).'"'; endif; ?> class="btn btn-primary2">Previous Article</a>
                    <a href="<?php echo get_post_type_archive_link('post'); ?>" class="btn btn-primary">Back to News</a>
                    <a <?php if($prv_post): echo 'href="'.get_permalink($prv_post->ID).'"'; endif; ?> class="btn btn-primary2">Next Article</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Buttons End ============================-->
<?php
endif;

$pid = get_option('page_for_posts');

if(have_rows('modules',$pid)):
    while (have_rows('modules',$pid)) : the_row();
        if (get_row_layout() == 'cta'):
            require(THEMEDIR.'/page-modules/cta/cta.php');

        elseif (get_row_layout() == 'full_width_cta'):
            require(THEMEDIR.'/page-modules/full_width_cta/full_width_cta.php');

        endif;
    endwhile;
endif;

get_footer();
?>