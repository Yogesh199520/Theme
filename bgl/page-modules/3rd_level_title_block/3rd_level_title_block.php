<?php
$po_breadcrumb = get_field('po_breadcrumb');
$page_title = get_sub_field('page_title');
$page_title = $page_title?$page_title:get_the_title();
?>
<!--============================== 3rd level title block Start ============================-->
<div class="level3-hero add-bg-graphic dark-pattern d-flex flex-column align-items-center justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <?php if($po_breadcrumb && function_exists('bcn_display_list')){ ?>
                <div class="breadcrumbs-container">
                    <ol class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                        <?php bcn_display_list(); ?>
                    </ol>
                </div>
                <?php } ?>
                <h1><?php echo $page_title; ?></h1>
            </div>
        </div>
    </div>
</div>
<!--==============================  3rd level title block End ==============================-->