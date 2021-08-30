<?php /* Template Name: Portfolio Template */ 
get_header();
$pid = get_the_ID();
?>
<?php //========= row start ========= ?>
<div class="row">
<div class="col-sm-12">
	<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array( 'post_type' => 'project','posts_per_page'=> 12,'paged' => $paged);
	query_posts( $args );
	if(have_posts()): ?>
	<div class="content-box">
	<?php $terms = get_terms( 'project_categories'/* , array('hide_empty' => false) */);
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){ ?>
    	<ul class="project-category">
    		<li><a href="#" data-filter="" class="active">All</a></li>
    	<?php foreach ( $terms as $term ) { ?>
            <li><a href="#" data-filter="<?php echo $term->slug; ?>" class=""><?php echo $term->name; ?></a></li>
        <?php } ?>
        </ul>
    <?php } ?>
	 <div  id="masonry"  class="grid">
          <div class="grid-sizer"></div>
          <div class="gutter-sizer"></div>
          <?php while(have_posts()): the_post();
          $project_url = get_field('project_url'); ?>
          <div data-filter="<?php project_the_terms(); ?>" class="grid-item">
			<?php if(has_post_thumbnail()){
				the_post_thumbnail();
			} ?>
            <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                    <a href="#" class="zoom" data-toggle="modal" data-target="#<?php the_ID(); ?>"><i class="fa fa-search"></i></a>
                    <?php if(!empty($project_url)){ ?>
                    <a href="<?php echo esc_url($project_url); ?>" class="link" target="_blank"><i class="fa fa-link"></i></a>
                    <?php } ?>
                </div>
            </div>
          </div>
          <?php endwhile; ?>
     </div>
	<?php endif; wp_reset_query(); ?>
	<?php if( have_rows('client_list') ): ?>
	<div class="content-box text-center">
	    <h4 class="heading"><span><?php echo get_field('client_heading'); ?></span></h4>
	    <div class="flexslider2">
	    <ul class="clients-list slides">
	    <?php  while( have_rows('client_list') ): the_row(); ?>
	        <li><img src="<?php echo get_sub_field('client_logo'); ?>" alt=""></li>
	    <?php endwhile; ?>
	    </ul>
	    </div>
	</div>
	<?php endif; ?>
	<?php if( have_rows('testimonials','option') ): ?>
    <div class="content-box text-center">
    	<h4 class="heading"><span><?php echo get_field('testimonial_heading','option'); ?></span></h4>
        <div class="testimonial-container">
    		<div class="flexslider">
         	<ul class="slides">
         	<?php while( have_rows('testimonials','option') ): the_row();
         	$name = get_sub_field('client_name'); $company = get_sub_field('company_name'); ?>
			 	<li>
                	<?php echo get_sub_field('client_says'); ?>
                    <div class="testimonial-by">
                        <h6> <?php echo $name; ?><span><?php echo $company; ?></span></h6>
                    </div>
            	</li>
            <?php endwhile; ?>
        	</ul>
      		</div>
    	</div>
    </div>
	<?php endif; ?>
</div>
</div>
<?php //========= row end ========= ?>
<?php get_footer(); ?>
<?php //========= Modal  ========= ?>
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array( 'post_type' => 'project','posts_per_page'=> 12,'paged' => $paged);
query_posts( $args );
if(have_posts()): 
while(have_posts()): the_post(); ?>
<div class="modal fade" id="<?php the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       <a class="page-close" href="#" data-dismiss="modal" aria-label="Close"></a>
        <h4 class="modal-title" id="myModalLabel"><?php the_title(); ?></h4>
      </div>
      <div class="modal-body">
      <?php if(have_rows('project_images')): ?>
       	<div class="flexslider">
            <ul class="slides">
            <?php while(have_rows('project_images')): the_row(); ?>
               <li><img src="<?php echo get_sub_field('project_slide_image'); ?>" alt="" /></li>
            <?php endwhile; ?>
            </ul>
       </div>
       <?php endif; ?>
       <div class="content-box">
            <?php the_content(); ?>
	        <?php $client = get_field('project_client');
            if($client) {?>
             <h6 class="no-mar">Client</h6>
             <p><?php echo $client; ?></p>
            <?php } ?>
	        <?php $project_url = get_field('project_url');
             if($project_url) {?>
             <h6 class="no-mar">Website</h6>
             <p><a href="<?php echo $project_url; ?>"><?php echo $project_url; ?></a></p>
            <?php } ?>
       </div>
       
      </div>
      <div class="modal-footer">
        <a class="page-close" href="#" data-dismiss="modal" aria-label="Close"></a>
      </div>
    </div>
  </div>
</div>
<?php endwhile; endif; ?>