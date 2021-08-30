<div class="content-container <?php if(is_page(15)): echo 'color-bg'; endif;?>">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="stat-container">
                    <ul class="stat-list">
                        <?php
                        while(have_rows('stats','option')): the_row();
                        $heading = get_sub_field('heading');
                        $number = get_sub_field('number');
                        echo '<li>';
                        if(!empty($number)): echo '<h3><span class="timer" data-to="'.preg_replace('/[^a-zA-Z0-9_ -]/s','',$number).'" data-speed="2000">'.$number.'</span></h3>'; endif;
                        if(!empty($heading)): echo '<h6>'.$heading.'</h6>'; endif; 
                        echo '</li>';
                        endwhile;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>