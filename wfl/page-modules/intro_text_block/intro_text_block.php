<?php 
$padding_option = get_sub_field('padding_option');
$first_paragraph = get_sub_field('first_paragraph');
$body_text = get_sub_field('body_text');
$button_text = get_sub_field('button_text');
if(have_rows('button_link')):
while(have_rows('button_link')): the_row();
    if(get_row_layout() == 'internal_link'):
        $url = get_sub_field('page_link');
        $target = "_self";
    elseif(get_row_layout() == 'external_link'):
        $url = get_sub_field('url');
        $target = "_blank";
    else:
        $url = '';
        $target = "_self";
    endif;
endwhile;
endif;
?>

<div class="content-container intro-text-container <?php echo implode(' ', $padding_option); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="intro-text-content">
                    <?php 
                    if(!empty($first_paragraph)): echo '<h2>'.$first_paragraph.'</h2>';endif; 
                    echo $body_text;
                    if(!empty($button_text)): echo '<a href="'.$url.'" target="'.$target.'" class="btn btn-default">'.$button_text.'</a>'; endif; 
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>