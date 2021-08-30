<?php
/*==============================*/
// @package HYD
// @author SLICEmyPAGE
/*==============================*/
get_header();

$query = $_GET['s'];
echo $query;
?>
<!--============================== Content Start ==============================-->
<div class="content-container pb-0">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            <div class="col-md-12">
                <div class="heading-2 text-blue">
                    <h1>Faq</h1>
                    <h5>youe queries simplified</h5>
                </div>
                 <ul class="sub-nav-list d-flex flex-row justify-content-center">
                    <li class="sub-nav-item active">
                        <a href="javascript:void(0)" class="sub-nav-link">All</a>
                    </li>
                    <?php
                    $parent_cat_arg = array('hide_empty' => false, 'parent' =>0);
                    $parent_categories = get_terms('faqs-category',$parent_cat_arg);
                    foreach($parent_categories as $category): 
                    ?>
                    <li class="sub-nav-item">
                        <a href="<?php echo get_category_link($category->term_id); ?>" class="sub-nav-link"><?php echo $category->name; ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <div class="search-content">
                    <form method="get" action="/">
                    <div class="search-box">
                        <input type="text" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s"/>
                        <input type="hidden" name="post_type" value="faqs" />
                        <input type="submit" value="" />
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content end ==============================-->
<!--============================== Content Start ==============================-->
<div class="content-container pt-0">
    <div class="container container1">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            <div class="col-lg-10 offset-lg-1">
                <div class="accordion" id="accordionExample">
                    <div class="panel-group faqs-list" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default active">
                            <div class="panel-heading" role="tab" id="heading1">
                                <h6 class="panel-title d-flex align-items-center" role="button" data-toggle="collapse" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                    Chronic Kidney Disease ?
                                </h6>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="heading1" data-parent="#accordion">
                                <div class="panel-body">
                                    <div class="faqs-content">
                                        <p>
                                            We at Hyderabad Dialysis comprise a team of nephrologist specialists- Doctors, nutritionists, nurses, and technicians with over years of experience. We are normal life. Our approach is unique. We
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading2">
                                <h6 class="panel-title d-flex align-items-center" role="button" data-toggle="collapse" href="#collapse2" aria-expanded="true" aria-controls="collapse2">
                                    Chronic Kidney Disease ?
                                </h6>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse" role="tabpane1" aria-labelledby="heading2" data-parent="#accordion">
                                <div class="panel-body">
                                    <div class="faqs-content">
                                        <p>
                                            We at Hyderabad Dialysis comprise a team of nephrologist specialists- Doctors, nutritionists, nurses, and technicians with over years of experience. We are normal life. Our approach is unique. We
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading3">
                                <h6 class="panel-title d-flex align-items-center" role="button" data-toggle="collapse" href="#collapse3" aria-expanded="true" aria-controls="collapse3">
                                    Chronic Kidney Disease ?
                                </h6>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse" role="tabpane1" aria-labelledby="heading3" data-parent="#accordion">
                                <div class="panel-body">
                                    <div class="faqs-content">
                                        <p>
                                            We at Hyderabad Dialysis comprise a team of nephrologist specialists- Doctors, nutritionists, nurses, and technicians with over years of experience. We are normal life. Our approach is unique. We
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading4">
                                <h6 class="panel-title d-flex align-items-center" role="button" data-toggle="collapse" href="#collapse4" aria-expanded="true" aria-controls="collapse4">
                                    Chronic Kidney Disease ?
                                </h6>
                            </div>
                            <div id="collapse4" class="panel-collapse collapse" role="tabpane1" aria-labelledby="heading4" data-parent="#accordion">
                                <div class="panel-body">
                                    <div class="faqs-content">
                                        <p>
                                            We at Hyderabad Dialysis comprise a team of nephrologist specialists- Doctors, nutritionists, nurses, and technicians with over years of experience. We are normal life. Our approach is unique. We
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading5">
                                <h6 class="panel-title d-flex align-items-center" role="button" data-toggle="collapse" href="#collapse5" aria-expanded="true" aria-controls="collapse5">
                                    Chronic Kidney Disease ?
                                </h6>
                            </div>
                            <div id="collapse5" class="panel-collapse collapse" role="tabpane1" aria-labelledby="heading5" data-parent="#accordion">
                                <div class="panel-body">
                                    <div class="faqs-content">
                                        <p>
                                            We at Hyderabad Dialysis comprise a team of nephrologist specialists- Doctors, nutritionists, nurses, and technicians with over years of experience. We are normal life. Our approach is unique. We
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading6">
                                <h6 class="panel-title d-flex align-items-center" role="button" data-toggle="collapse" href="#collapse6" aria-expanded="true" aria-controls="collapse6">
                                    Chronic Kidney Disease ?
                                </h6>
                            </div>
                            <div id="collapse6" class="panel-collapse collapse" role="tabpane1" aria-labelledby="heading6" data-parent="#accordion">
                                <div class="panel-body">
                                    <div class="faqs-content">
                                        <p>
                                            We at Hyderabad Dialysis comprise a team of nephrologist specialists- Doctors, nutritionists, nurses, and technicians with over years of experience. We are normal life. Our approach is unique. We
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading7">
                                <h6 class="panel-title d-flex align-items-center" role="button" data-toggle="collapse" href="#collapse7" aria-expanded="true" aria-controls="collapse7">
                                    Chronic Kidney Disease ?
                                </h6>
                            </div>
                            <div id="collapse7" class="panel-collapse collapse" role="tabpane1" aria-labelledby="heading7" data-parent="#accordion">
                                <div class="panel-body">
                                    <div class="faqs-content">
                                        <p>
                                            We at Hyderabad Dialysis comprise a team of nephrologist specialists- Doctors, nutritionists, nurses, and technicians with over years of experience. We are normal life. Our approach is unique. We
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading8">
                                <h6 class="panel-title d-flex align-items-center" role="button" data-toggle="collapse" href="#collapse8" aria-expanded="true" aria-controls="collapse8">
                                    Chronic Kidney Disease ?
                                </h6>
                            </div>
                            <div id="collapse8" class="panel-collapse collapse" role="tabpane1" aria-labelledby="heading8" data-parent="#accordion">
                                <div class="panel-body">
                                    <div class="faqs-content">
                                        <p>
                                            We at Hyderabad Dialysis comprise a team of nephrologist specialists- Doctors, nutritionists, nurses, and technicians with over years of experience. We are normal life. Our approach is unique. We
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading9">
                                <h6 class="panel-title d-flex align-items-center" role="button" data-toggle="collapse" href="#collapse9" aria-expanded="true" aria-controls="collapse9">
                                    Chronic Kidney Disease ?
                                </h6>
                            </div>
                            <div id="collapse9" class="panel-collapse collapse" role="tabpane1" aria-labelledby="heading9" data-parent="#accordion">
                                <div class="panel-body">
                                    <div class="faqs-content">
                                        <p>
                                            We at Hyderabad Dialysis comprise a team of nephrologist specialists- Doctors, nutritionists, nurses, and technicians with over years of experience. We are normal life. Our approach is unique. We
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading10">
                                <h6 class="panel-title d-flex align-items-center" role="button" data-toggle="collapse" href="#collapse10" aria-expanded="true" aria-controls="collapse10">
                                    Chronic Kidney Disease ?
                                </h6>
                            </div>
                            <div id="collapse10" class="panel-collapse collapse" role="tabpane1" aria-labelledby="heading10" data-parent="#accordion">
                                <div class="panel-body">
                                    <div class="faqs-content">
                                        <p>
                                            We at Hyderabad Dialysis comprise a team of nephrologist specialists- Doctors, nutritionists, nurses, and technicians with over years of experience. We are normal life. Our approach is unique. We
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading11">
                                <h6 class="panel-title d-flex align-items-center" role="button" data-toggle="collapse" href="#collapse11" aria-expanded="true" aria-controls="collapse11">
                                    Chronic Kidney Disease ?
                                </h6>
                            </div>
                            <div id="collapse11" class="panel-collapse collapse" role="tabpane1" aria-labelledby="heading11" data-parent="#accordion">
                                <div class="panel-body">
                                    <div class="faqs-content">
                                        <p>
                                            We at Hyderabad Dialysis comprise a team of nephrologist specialists- Doctors, nutritionists, nurses, and technicians with over years of experience. We are normal life. Our approach is unique. We
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading12">
                                <h6 class="panel-title d-flex align-items-center" role="button" data-toggle="collapse" href="#collapse12" aria-expanded="true" aria-controls="collapse12">
                                    Chronic Kidney Disease ?
                                </h6>
                            </div>
                            <div id="collapse12" class="panel-collapse collapse" role="tabpane1" aria-labelledby="heading12" data-parent="#accordion">
                                <div class="panel-body">
                                    <div class="faqs-content">
                                        <p>
                                            We at Hyderabad Dialysis comprise a team of nephrologist specialists- Doctors, nutritionists, nurses, and technicians with over years of experience. We are normal life. Our approach is unique. We
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="page-num d-flex justify-content-end">
                        <li>
                            <span aria-current="page" class="page-numbers current">1</span>
                        </li>
                        <li>
                            <a class="page-numbers" href="#">2</a>
                        </li>
                        <li>
                            <a class="page-numbers" href="#">3</a>
                        </li>
                        <li>
                            <a class="page-numbers" href="#">4</a>
                        </li>
                        <li>
                            <a class="next page-numbers" href="#">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--============================== Content end ==============================-->
</div>

<?php
get_footer();
?>