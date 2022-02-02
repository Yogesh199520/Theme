<?php get_header();  the_post(); ?> 
<?php if(!wp_is_mobile()){ ?>
<div class="page-title" style="background:url(https://www.ricciortho.com/wp-content/uploads/2022/01/ricci-orthodontics_banner_desktop.jpg) no-repeat center 0;">
  <div class="container">
    <div class="page-title-breadcrumbs">
      <ol class="breadcrumbs">
        <li><a itemprop="item" href="/">Home</a></li>
          <?php $category = get_the_category();
                $firstCategory = $category[0]->cat_name; 
          $cat_link = get_category_link($category[0]->cat_ID); ?>
        <li><a href="<?php echo $cat_link; ?>"><span><?php echo $firstCategory; ?></span></a></li>
        <li class="current"><strong><?php the_title(); ?></strong></li>
      </ol>
    </div>
  </div>
</div> <!--close page-title-->
<?php } ?>
<?php if(wp_is_mobile()){ ?>
<div class="page-title" style="background:url(https://www.ricciortho.com/wp-content/uploads/2022/01/ricci-orthodontics_banner_mobile.jpg) no-repeat center 0;">
  <div class="container">
    <div class="page-title-breadcrumbs">
      <ol class="breadcrumbs">
        <li><a itemprop="item" href="/">Home</a></li>
          <?php $category = get_the_category();
                $firstCategory = $category[0]->cat_name; 
          $cat_link = get_category_link($category[0]->cat_ID); ?>
        <li><a href="<?php echo $cat_link; ?>"><span><?php echo $firstCategory; ?></span></a></li>
        <li class="current"><strong><?php the_title(); ?></strong></li>
      </ol>
    </div>
  </div>
</div> <!--close page-title-->
<?php } ?>

  
  <div id="content">
    <section class="page-sec">
        <div class="container">
            <div class="leftbar">
               <h1><?php the_title(); ?></h1>
                <div class="blog_post">
                	<div class="post_thumb"><?php the_post_thumbnail(); ?></div>
                    <div class="post_text">
                    	<?php the_content(); ?>
                        <?php the_tags(); ?>
                    </div>
                </div>
                
               
            </div> <!-- leftbar -->
            
           <?php if(wp_is_mobile()){ ?>
            <?php } if(!wp_is_mobile()){?>
            <div class="sidebar">
            	<?php dynamic_sidebar('page-sidebar'); ?>
            </div> <!-- sidebar -->
            <?php } ?>
        </div>
    </section>
    <!-- home-sec -->
  
    
  </div>
  <!--content-->
<?php get_footer(); ?>