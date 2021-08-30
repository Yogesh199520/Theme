<?php

/*==============================*/

// @package SketchMesh

// @author SLICEmyPAGE

/*==============================*/

get_header();

$name = $_GET['s'];

global $query_string;

$query_args = explode("&", $query_string);

$search_query = array();

foreach($query_args as $key => $string){

	$query_split = explode("=", $string);

	$search_query[$query_split[0]] = urldecode($query_split[1]);

} // foreach

//echo '<pre>';

// var_dump($query_args);

// var_dump($search_query);

// echo '</pre>';

$the_query = new WP_Query($search_query); ?>

<?php if($the_query->have_posts()): ?>

<div class="content-container min-height">

	<div class="container">

		<div class="row">

			<div class="col-sm-12">

				<h4 class="text-center">Search results for : <strong><?php echo $name; ?></strong></h4>

			</div>

		</div>

		<div class="row">

			<div class="col-md-12">

				<ul class="search-post-list">

					<?php while($the_query->have_posts()) : $the_query->the_post(); ?>

					<li>

						<div class="search-post-box">

							<?php if(has_post_thumbnail()):

							$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>

							<a href="<?php the_permalink(); ?>" class="search-post-img" style="background-image:url(<?php echo $thumb[0]; ?>);"></a>

							<?php endif; ?>

							<div class="search-post-content">

								<a href="<?php the_permalink(); ?>"><h6><strong><?php the_title(); ?></strong></h6></a>

								<p><?php echo substr(get_the_excerpt(), 0,90); ?> ...</p>

								<a href="<?php the_permalink(); ?>" class="more-link"><strong>Read More</strong></a>

							</div>

						</div>

					</li>

					<?php endwhile; wp_reset_postdata(); ?>

				</ul>

				<?php

				$total_pages = $the_query->max_num_pages;

				if ($total_pages > 1){

					$paraUrl = explode('?', get_pagenum_link(1) );

					$base = trailingslashit( $paraUrl[0] ) . '%_%';

					if( count($paraUrl) > 1 ) {

						$base .= '?';

						foreach ($paraUrl as $key => $value) {

							if( $key == 0 ) continue;

							if( $key > 1 ) $base .= '&';

							$base .= $value;

						}

					}

					echo '<div class="search-pagination-container">';

					$current_page = max(1, get_query_var('paged'));

					echo paginate_links(array(

						'base' => $base,//get_pagenum_link(1) . '%_%',

						'format' => 'page/%#%',

						'current' => $current_page,

						'type' => 'list',

						'total' => $total_pages,

						'prev_text'    => '<i class="fa fa-angle-left"></i>',

						'next_text'    => '<i class="fa fa-angle-right"></i>',

					));

					echo '</div>';

				}

				?>

			</div>

		</div>

	</div>

</div>

<?php else : ?>

<div class="content-container no-result-container min-height">

	<div class="container">

		<div class="row">

			<div class="col-sm-12">

				<h4 class="text-center">Search Results For : <strong><?php echo $name; ?></strong></h4>

			</div>

		</div>

		<div class="row">

			<div class="col-sm-12 text-center">

				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

			</div>

		</div>

	</div>

</div>

<?php endif;

do_action('fv_cta');

get_footer();