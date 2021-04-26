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
<section class="container-box">
	<div class="feature-content mb-50">
		<h2>Related posts</h2>
	</div>
	<div class="col-custom col-custom-3">

		<div class="box">
			<a href="http://w3.technovert.com/data-and-analytics-workloads/" class="card clear-padding">
				<img src="http://w3.technovert.com/wp-content/uploads/2021/03/data-applications-scaled-1-768x513.jpg">
				<div class="card-body">
					<h5 class="mb-10">Data and analytics workloads: How to choose the right technology &amp; tool</h5>
					<p class="text-gray">A framework which can aid in the decision-making process for data and analytics workloads </p>
				</div>

			</a>
		</div>
		<div class="box">
			<div class="card clear-padding">
				<a href="http://w3.technovert.com/etl-automation-approach-using-snaplogic/">
					<img src="http://w3.technovert.com/wp-content/uploads/2021/03/ETL-automation-approach-1.jpg" alt="ETL Automation approach" class="">
				</a>
				<div class="card-body">
					<h5 class="mb-10">ETL Automation approach using SnapLogic</h5>
					<p class="text-gray">Learn how to leverage the ETL automation approach using SnapLogic and decrease the development time in data loading. Talk to our experts.</p>
				</div>

			</div>
		</div>
		<div class="box">
			<div class="card clear-padding">
				<a href="http://w3.technovert.com/data-integration-approach/">
					<img src="/wp-content/uploads/2021/03/Data-Integration-Approach-1-1024x531.png" alt="Data integration approach" class="">
				</a>
				<div class="card-body">
					<h5 class="mb-10">Data Integration Approach to Maximize your RoI</h5>
					<p class="text-gray">Why opt for premium tools when we have a data integration approach that completely relies on open source tech yet delivers much better RoI.</p>
				</div>

			</div>
		</div>

	</div>
</section>
<?php
get_footer();
