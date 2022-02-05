<?php
$padding_option = get_sub_field('padding_option');

$obj = get_queried_object();
/*
 * The WordPress Query class.
 *
 * @link http://codex.wordpress.org/Function_Reference/WP_Query
 */
$args = array(
    
    // Type & Status Parameters
    'post_type'   => 'expertise',

    // Pagination Parameters
    'nopaging'               => true,

    // Taxonomy Parameters
    'tax_query' => array(
        array(
            'taxonomy'          => 'expertise_categories',
            'field'             => 'slug',
            'terms'             => $obj->slug
        )
    ),

);

$query = new WP_Query( $args );

if($query->have_posts()):
?>
<!--============================== content Start ============================-->
<div class="content-container expertise-category-container <?php echo implode(' ', $padding_option); ?>">
    <div class="container">
        <div class="row ">
            <div class="col-lg-10 offset-lg-1">
                <ul class="ec-list ">
                    <?php while($query->have_posts()): $query->the_post(); ?>
                    <li class="ec-item">
                        <a href="<?php the_permalink(); ?>" class="ec-box read-more-btn-parent">
                            <div class="ec-content">
                                <h3><?php the_title(); ?></h3>
                                <?php the_excerpt(); ?>
                            </div>
                            <div class="ec-cta">
                                <span class="read-more-btn">READ MORE <img src="<?php echo IMG.'arrow-right.svg'; ?>" alt=""></span>
                            </div>
                        </a>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--==============================  content End ==============================-->
<?php endif; ?>