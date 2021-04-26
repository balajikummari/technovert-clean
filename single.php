<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Technovert_Clean
 */

get_header();
?>

<section class="container-box mt-80">
		<div class="row">
			<div class="col-md-8 col-12">
				<h1 class="mb-20"><?php the_title(); ?></h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-12">


				<?php while ( have_posts() ) : the_post(); ?>

				<div class="blog">
					<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
					<div class="share">
						<?php social_share(); ?>
						<label>5 min read</label>
					</div>
					<section>
						<div editable="rich">
							<div>
								<?php the_content(); ?>
							</div>
						</div>
					</section>
				</div>

				<?php endwhile; // end of the loop. ?>
			</div>
			<div class="col-md-4 col-12">
				<div class="subscribe">
					<h5 class="mb-10 font-weight-extra-bold">Join your technology peers and stay relevant on latest trends</h5>
					<p class="text-sm text-gray-200 mb-20">Don’t miss out on the latest tips, tools, and tactics at the forefront of HR and Employee</p>
					
					<div id="email-subscribe">
						<?php echo do_shortcode( '[contact-form-7 id="279" title="Blog Email Subscription"]' ); ?>
					</div>
				</div>
				<div class="p-30 border border-slate-40 rounded">
					<p class="text-xs text-uppercase font-weight-extra-bold letter-spacing-07 mb-10">Topics</p>
					<?php get_template_part("template-parts/vertical-nav"); ?>
                </div>

			</div>

		</div>
</section>

<?php 
	$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$categories = get_the_category();
	$category_id = $categories[0]->cat_ID;
	$args = array(
		'posts_per_page'   => 3,
		'post_status'      => 'publish',
		'order'            => 'DESC',
		'orderby'          => 'date',
		'paged'            => $page,
		'suppress_filters' => true,
		'post_type' => 'post',
		'cat' => $category_id,
		'post__not_in' => array( $post->ID )
	);
	
	$GLOBALS['wp_query'] = new WP_Query( $args );
	
	$blogquery = $GLOBALS['wp_query']
?>
<section class="container-box">
	<div class="feature-content mb-50">
		<h2>Related posts</h2>
	</div>
	<div class="col-custom col-custom-3">
		<?php while ( $blogquery->have_posts()) : $blogquery->the_post(); ?>
		<div class="box" >
		<a class="box" href="<?php the_permalink() ?>">
                            <div class="post-tile">
                                <div class="h-200 overflow-hidden <?php if(!get_the_post_thumbnail() ) { echo 'bg-gray-light'; } ?>">
                                    <?php the_post_thumbnail('thumbnail') ?>
                                </div> 
                                <div class="post-body">
                                    <h5>
                                        <?php 
                                            $truncate_title = substr(get_the_title(),0,75);
                                            echo (strlen(get_the_title()) > 75)  ?  $truncate_title. "..." :  get_the_title();
                                        ?>    
                                    </h5>
                                    <p><?php echo substr(get_the_excerpt(),0,300). "..." ?></p>
                                    <span>5 min Read</span>
                                </div>
                            </div>
                        </a>
		</div>
		<?php endwhile; ?>
	</div>
</section>
<?php
get_footer();
