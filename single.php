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
						<div class="social-media">
							<span>Share article</span>
							<div class="d-flex">
								<a href="#" class="dot dot-sm bg-blue-400 mr-12">
									<span class="icon icon-xs ic-facebook text-white"></span>
								</a>
								<a href="#" class="dot dot-sm bg-blue-300 mr-12">
									<span class="icon icon-xs ic-twitter text-white"></span>
								</a>
								<a href="#" class="dot dot-sm bg-blue-200 mr-12">
									<span class="icon icon-xs ic-linkedin text-white"></span>
								</a>
							</div>
						</div>
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
					<h5 class="mb-10 font-weight-extra-bold">Join 3500 of your HR peers and stay relevant on latest trends</h5>
					<p class="text-sm text-gray-200 mb-20">Don’t miss out on the latest tips, tools, and tactics at the forefront of HR and Employee</p>
					<form id="email-subscribe">
						<div class="input-group input-group-lg">
							<input type="text" class="form-control form-control-sm" placeholder="Enter email address" aria-label="Enter email address" aria-describedby="basic-addon2">
							<button class="btn btn-primary btn-input " type="button" id="button-addon2">Subscribe</button>
						</div>
					</form>
				</div>
				<div class="p-30 border border-slate-40 rounded">
                    <ul class="vertical-nav">
                        <li class="nav-items">
                            <a href="#" class="nav-link active">Digital Transformation</a>
                        </li>
                        <li class="nav-items">
                            <a href="#" class="nav-link">Cloud</a>
                        </li>
                        <li class="nav-items">
                            <a href="#" class="nav-link">Product Engineering</a>
                        </li>
                        <li class="nav-items">
                            <a href="#" class="nav-link">Quality Engineering</a>
                        </li>
                        <li class="nav-items">
                            <a href="#" class="nav-link">User Experience</a>
                        </li>
                    </ul>
                </div>

			</div>

		</div>
</section>

<?php
get_footer();
