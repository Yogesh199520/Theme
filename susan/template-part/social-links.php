<?php if(have_rows('social_links','option')): ?>
<div class="social-cta-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="social-cta-box d-md-flex align-items-center justify-content-between">
                    <div class="social-cta-head"><img src="<?php echo IMG.'follow-social-text.svg'; ?>" alt="Follow my social" /></div>
                    <ul class="social-links">
                        <?php 
                        while(have_rows('social_links','option')): the_row();
                            $icon = get_sub_field('icon');
                            $url = get_sub_field('url');
                            echo '<li><a href="'.$url.'" target="_blank">'.$icon.'</a></li>'; 
                        endwhile;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
