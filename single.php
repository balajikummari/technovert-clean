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
get_footer();
