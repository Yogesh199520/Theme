<?php
/**
 * Template Name: Episode
 *
 * @package American-narratives - American narative podcast
 * @author SLILEmyPAGE
 */
 ?>
<?php get_header(); ?>
<div class="episode-banner">
	<img class="episode" src="<?php echo IMG.'episode-banner.png'; ?>" alt=""/>
</div>
<div class="episode">
<?php if(have_posts()):
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    	$args = array ( 
        	'posts_per_page' => 2,
        	'paged'          => $paged
        );
        $query = new WP_Query( $args ); 
    	while($query->have_posts()) : $query->the_post(); ?>
            <a href="<?php the_permalink(); ?>" >
            	<div><?php the_title(); ?></div>
                <?php if(has_post_thumbnail()) : ?>
                	<img class="icon" src="<?php echo IMG.'mic.png'; ?>" alt=""/>
            		<div class="post-img">
                        <?php the_post_thumbnail(); ?>
                    </div>
                <?php endif; ?>
            </a>
            <?php the_content(); ?>
        </li>
    <?php endwhile; ?>
<?php endif; ?>
<?php ao_pagination($query); ?>
 <?php the_powerpress_content(); 
     if (!function_exists('is_ajax')) {
        function is_ajax() {
            return defined( 'DOING_AJAX' );
        }
    } 
?>
</div>

        
<style>
	.episode-banner img {
	    width: 100%;
	}
	.post-img img {
		height: 150px;
		width: 150px;
	}
	
	img.icon {
	    position: absolute;
	    left: 15px;
	    height: 25px;
	}

</style>
<?php get_footer(); ?>
