<?php
/***********************************************************************************************/
/* Modules Functions */
/***********************************************************************************************/
function bgl_modules($pageid = false){
    if(have_rows('modules',$pageid)):
        while (have_rows('modules',$pageid)) : the_row();
            if (get_row_layout() == 'simple_header'):
                require(THEMEDIR.'/page-modules/simple_header/simple_header.php');

            elseif (get_row_layout() == 'simple_text_block'):
                require(THEMEDIR.'/page-modules/simple_text_block/simple_text_block.php');

            elseif (get_row_layout() == 'hero_image_header'):
                require(THEMEDIR.'/page-modules/hero_image_header/hero_image_header.php');

            elseif (get_row_layout() == 'contact_methods'):
                require(THEMEDIR.'/page-modules/contact_methods/contact_methods.php');

            elseif (get_row_layout() == 'contact_form'):
                require(THEMEDIR.'/page-modules/contact_form/contact_form.php');

            elseif (get_row_layout() == 'map'):
                require(THEMEDIR.'/page-modules/map/map.php');

            elseif (get_row_layout() == 'grey_accordion_section'):
                require(THEMEDIR.'/page-modules/grey_accordion_section/grey_accordion_section.php');

            elseif (get_row_layout() == 'intro_text_block'):
                require(THEMEDIR.'/page-modules/intro_text_block/intro_text_block.php');

            elseif (get_row_layout() == 'partners'):
                require(THEMEDIR.'/page-modules/partners/partners.php');

            elseif (get_row_layout() == '5050_textimage_block'):
                require(THEMEDIR.'/page-modules/5050_textimage_block/5050_textimage_block.php');

            elseif (get_row_layout() == 'bold_message_block'):
                require(THEMEDIR.'/page-modules/bold_message_block/bold_message_block.php');

            elseif (get_row_layout() == 'page_signpost'):
                require(THEMEDIR.'/page-modules/page_signpost/page_signpost.php');

            elseif (get_row_layout() == 'team_header'):
                require(THEMEDIR.'/page-modules/team_header/team_header.php');

            elseif (get_row_layout() == 'team_profiles'):
                require(THEMEDIR.'/page-modules/team_profiles/team_profiles.php');

            elseif (get_row_layout() == 'single_hero'):
                require(THEMEDIR.'/page-modules/single_hero/single_hero.php');

            elseif (get_row_layout() == 'team_profile_section'):
                require(THEMEDIR.'/page-modules/team_profile_section/team_profile_section.php');

            elseif (get_row_layout() == 'white_accordion_section'):
                require(THEMEDIR.'/page-modules/white_accordion_section/white_accordion_section.php');

            elseif (get_row_layout() == 'get_in_touch_cta'):
                require(THEMEDIR.'/page-modules/get_in_touch_cta/get_in_touch_cta.php');

            elseif (get_row_layout() == 'expertise_signposts'):
                require(THEMEDIR.'/page-modules/expertise_signposts/expertise_signposts.php');

            elseif (get_row_layout() == 'breadcrumb'):
                require(THEMEDIR.'/page-modules/breadcrumb/breadcrumb.php');
            
            elseif (get_row_layout() == 'expertise_category_signpost'):
                require(THEMEDIR.'/page-modules/expertise_category_signpost/expertise_category_signpost.php');

            elseif (get_row_layout() == 'other_expertise_pages'):
                require(THEMEDIR.'/page-modules/other_expertise_pages/other_expertise_pages.php');

            elseif (get_row_layout() == 'testimonial_block'):
                require(THEMEDIR.'/page-modules/testimonial_block/testimonial_block.php');

            elseif (get_row_layout() == 'latest_insights_x3'):
                require(THEMEDIR.'/page-modules/latest_insights_x3/latest_insights_x3.php');

            elseif (get_row_layout() == 'sectors_signpost'):
                require(THEMEDIR.'/page-modules/sectors_signpost/sectors_signpost.php');

            elseif (get_row_layout() == 'other_sector_pages'):
                require(THEMEDIR.'/page-modules/other_sector_pages/other_sector_pages.php');

            elseif (get_row_layout() == 'page_jump_to'):
                require(THEMEDIR.'/page-modules/page_jump_to/page_jump_to.php');

            elseif (get_row_layout() == 'other_expertise_links'):
                require(THEMEDIR.'/page-modules/other_expertise_links/other_expertise_links.php');

            elseif (get_row_layout() == 'our_specialist_team'):
                require(THEMEDIR.'/page-modules/our_specialist_team/our_specialist_team.php');

            elseif (get_row_layout() == 'homepage_hero'):
                require(THEMEDIR.'/page-modules/homepage_hero/homepage_hero.php');

            elseif (get_row_layout() == 'expertise_carousel'):
                require(THEMEDIR.'/page-modules/expertise_carousel/expertise_carousel.php');

            elseif (get_row_layout() == 'newsletter_sign_up'):
                require(THEMEDIR.'/page-modules/newsletter_sign_up/newsletter_sign_up.php');

            elseif (get_row_layout() == 'latest_deals_x3'):
                require(THEMEDIR.'/page-modules/latest_deals_x3/latest_deals_x3.php');

            elseif (get_row_layout() == 'we_work_with_block'):
                require(THEMEDIR.'/page-modules/we_work_with_block/we_work_with_block.php');

           

                
            endif;
        endwhile;
    else:
        require(THEMEDIR.'/page-modules/default.php');
    endif;
}
add_action('modules','bgl_modules');