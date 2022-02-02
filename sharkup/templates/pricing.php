<?php
/*==============================*/
// @package Sharkup
// @author Medical Darpan
/*==============================*/
/* Template Name: Pricing */
get_header();
?>
<!--============================== Content container Start ==============================-->
<div class="content-container overflow-hidden">
    <div class="container container2">
        <div class="row">
            <div class="col-lg-3">
                <div class="sidebar-box">
                    <div class="sidebar-head">
                        <h4>Start Your Business</h4>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 5%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="text-muted">0% Complete</div>
                    </div>
                    <div class="sidebar-body">
                        <ul class="progress-list">
                            <li>
                                <div class="progress-box">
                                    <div class="progress-icon">
                                        <img src="<?php echo IMG; ?>check-icon.png" alt="" />
                                    </div>
                                    <div class="progress-text">Choose a plan</div>
                                </div>
                            </li>
                            <li>
                                <div class="progress-box">
                                    <div class="progress-icon">
                                        <img src="<?php echo IMG; ?>pending.png" alt="" />
                                    </div>
                                    <div class="progress-text">Basic information</div>
                                </div>
                            </li>
                            <li>
                                <div class="progress-box">
                                    <div class="progress-icon">
                                        <img src="<?php echo IMG; ?>pending.png" alt="" />
                                    </div>
                                    <div class="progress-text">Review details</div>
                                </div>
                            </li>
                            <li>
                                <div class="progress-box">
                                    <div class="progress-icon">
                                        <img src="<?php echo IMG; ?>pending.png" alt="" />
                                    </div>
                                    <div class="progress-text">Payment</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="sidebar-footer">
                        <a href="javascript:void(Tawk_API.toggle())" class="btn btn-outline btn-lg">Chat for support </a>
                    </div>
                </div>
            </div>
            <?php 
            $pricing_heading = get_field('pricing_heading');
            $pricing_sub_heading = get_field('pricing_sub_heading');
            $pricing_body_text = get_field('pricing_body_text');
            $rpricing_heading = get_field('rpricing_heading');
            if(have_rows('pricing')):
            ?>
                <div class="col-lg-9">
                    <div class="pricing-content-box">
                        <?php 
                        if(!empty($pricing_sub_heading)): echo '<h6>'.$pricing_sub_heading.'</h6>'; endif;
                        if(!empty($pricing_heading)): echo '<h4>'.$pricing_heading.'</h4>'; endif;
                        echo $pricing_body_text; 
                        if(!empty($rpricing_heading)): echo '<h3>'.$rpricing_heading.'</h3>'; endif;
                        ?>
                        
                      
                        <ul class="pricing-list d-flex flex-wrap price-slider">
                            <?php 
                            while(have_rows('pricing')): the_row(); 
                            $package_name = get_sub_field('package_name');
                            $price = get_sub_field('price');
                            $note = get_sub_field('note');
                            ?>
                            <li class="pricing-item">
                                <div class="pricing-box d-flex flex-column">
                                    <div class="price-head">
                                        <div class="purple-text"><?php echo $package_name; ?> </div>
                                        <?php if(have_rows('packages')): ?>
                                        <ul class="check-list">
                                            <?php 
                                            while(have_rows('packages')): the_row(); 
                                            $package = get_sub_field('package');
                                            echo '<li>'.$package.'</li>';
                                            endwhile;
                                            ?>
                                        </ul>
                                        <?php endif; ?>
                                    </div>
                                    <div class="price-body">
                                        <div class="pb-upper">
                                            <h4>Total AED <?php echo $price; ?>/yr</h4>
                                            <small><?php echo $note; ?></small>
                                        </div>
                                        <div class="pb-lower">
                                            <div class="pb-heading"><img src="<?php echo IMG; ?>topfeatures.svg" alt="" /></div>
                                            <?php if(have_rows('top_features')): ?>
                                            <ul class="check-list add-outline-icon">
                                                <?php 
                                                while(have_rows('top_features')): the_row(); 
                                                $feature = get_sub_field('feature');
                                                echo '<li>'.$feature.'</li>';
                                                endwhile;
                                                ?>
                                            </ul>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="price-footer">
                                    <?php 
                                    if(is_user_logged_in()):
                                    ?>
                                    <form method="post" action="<?php echo home_url('/dashboard/') ?>">
                                        <input type="hidden" value="<?php echo $package_name; ?>" name="plan" />
                                        <input type="hidden" value="<?php echo $price; ?>"  name="price" />
                                        <input type="submit" value="Choose Plan" class="btn btn-purple btn-block btn-lg" />
                                    </form>
                                    <?php 
                                    else:
                                    echo '<a href="https://www.sharkup.com/register/" class="btn btn-purple btn-block btn-lg">Choose Plan</a>';
                                    endif;
                                    ?>
                                    </div>
                                </div>
                            </li>
                           <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            <?php 
            endif;
            ?>
        </div>
        <div class="row d-none">
            <div class="col-md-12">
                <div class="pricing-btn pt-5 text-right d-flex align-items-center justify-content-end">
                    <a href="!!" class="btn btn-primary btn-lg pag-btn">prev</a>
                    <a href="!!" class="btn btn-primary btn-lg pag-btn">next</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content container End ==============================-->
<?php
get_footer();
?>