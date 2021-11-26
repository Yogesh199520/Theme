<?php
/***********************************************************************************************/
/* Modules Functions */
/***********************************************************************************************/
function bgl_modules($pageid = false){
    if(have_rows('modules',$pageid)):
        while (have_rows('modules',$pageid)) : the_row();

            if (get_row_layout() == '3rd_level_title_block'):
                require(THEMEDIR.'/page-modules/3rd_level_title_block/3rd_level_title_block.php');

            elseif (get_row_layout() == 'full_width_text'):
            	require(THEMEDIR.'/page-modules/full_width_text/full_width_text.php');

            elseif (get_row_layout() == 'cta'):
                require(THEMEDIR.'/page-modules/cta/cta.php');

            elseif (get_row_layout() == 'full_width_cta'):
                require(THEMEDIR.'/page-modules/full_width_cta/full_width_cta.php');

            elseif (get_row_layout() == 'page_title_and_intro'):
                require(THEMEDIR.'/page-modules/page_title_and_intro/page_title_and_intro.php');

            elseif (get_row_layout() == '2_3_image_and_text'):
                require(THEMEDIR.'/page-modules/2_3_image_and_text/2_3_image_and_text.php');

            elseif (get_row_layout() == 'faqs'):
                require(THEMEDIR.'/page-modules/faqs/faqs.php');

            elseif (get_row_layout() == 'graphic_counter'):
                require(THEMEDIR.'/page-modules/graphic_counter/graphic_counter.php');

            elseif (get_row_layout() == '2nd_level_title_block'):
                require(THEMEDIR.'/page-modules/2nd_level_title_block/2nd_level_title_block.php');
            
            elseif (get_row_layout() == 'news'):
                require(THEMEDIR.'/page-modules/news/news.php');

            elseif (get_row_layout() == 'page_intro'):
                require(THEMEDIR.'/page-modules/page_intro/page_intro.php');

            elseif (get_row_layout() == 'team'):
                require(THEMEDIR.'/page-modules/team/team.php');

            elseif (get_row_layout() == 'affiliates'):
                require(THEMEDIR.'/page-modules/affiliates/affiliates.php');

            elseif (get_row_layout() == 'contact'):
                require(THEMEDIR.'/page-modules/contact/contact.php');

            elseif (get_row_layout() == 'contact_team'):
                require(THEMEDIR.'/page-modules/contact_team/contact_team.php');

            elseif (get_row_layout() == 'our_group'):
                require(THEMEDIR.'/page-modules/our_group/our_group.php');

            elseif (get_row_layout() == 'page_hero'):
                require(THEMEDIR.'/page-modules/page_hero/page_hero.php');

            elseif (get_row_layout() == 'about_image_and_text'):
                require(THEMEDIR.'/page-modules/about_image_and_text/about_image_and_text.php');

            elseif (get_row_layout() == 'our_work'):
                require(THEMEDIR.'/page-modules/our_work/our_work.php');

            elseif (get_row_layout() == 'work_intro'):
                require(THEMEDIR.'/page-modules/work_intro/work_intro.php');


            elseif (get_row_layout() == 'image_carousel'):
                require(THEMEDIR.'/page-modules/image_carousel/image_carousel.php');

            elseif (get_row_layout() == 'text_and_image'):
                require(THEMEDIR.'/page-modules/text_and_image/text_and_image.php');

            elseif (get_row_layout() == 'testimonials'):
                require(THEMEDIR.'/page-modules/testimonials/testimonials.php');
                
                
            endif;
        endwhile;
    else:
        require(THEMEDIR.'/page-modules/default.php');
    endif;
}
add_action('modules','bgl_modules');