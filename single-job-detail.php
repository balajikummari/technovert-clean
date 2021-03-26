<?php
/**
 * Template Name: Case Study
 *
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();


while ( have_posts() ) : the_post(); 
?>

<section class="hero-section" style="background-image:  url(<?php the_field('feature_image_2') ?>), url(<?php the_field('feature_image')?>);background-position: right 2% bottom 5%;
    background-size: 35%, auto;" >
	<div class="container-box">
        <span>We are hiring</span>
		<h1>
        <?php the_title();  ?>
		</h1>
	</div>
</section>
<section class="container-box mt-80">
	<div class="row">
    	<div class="col-md-3"></div>
		<div class="col-md-9 col-sm-12">
			<div class="feature-content mb-50 no-underline">
				<h2 class="pb-2"><?php the_title();  ?></h2>
				<p><?php the_field('job_introduction') ?></p>
			</div>
		</div>
    </div>
	<div class="row m-0 banner-container">
		<div class="col-md-9 col-sm-12">
			<div class="mb-40 mb-xs-80">
				<div class="feature-content mb-50 no-underline">
					<h2 class="pb-2">Skills matter some, Attitude matters most</h2>
					<p>Skills can be learnt and unlearnt any time. But the attitude you bring to the table makes all the difference and gives purpose to those skills. That’s what matters to us most. </p>
				</div>
				
				<div class="feature-content mb-3 no-underline">
					<h5 class="pb-2 font-weight-bold">Craftsman or a code coolie?</h5>
					<p>Clean code is a craft. There’s beauty in good code. Only craftsmen get it, while the code coolies are comfortably clueless, swirling in their own soup. Craftsmen spend hours iterating and refactoring until their code reaches a S.O.L.I.D state.  They are extremely curious, always honing their skills and laser focused on solving the same problem with better approaches. Are you such craftsman? </p>
				</div>
				<div class="feature-content row mb-50 pb-50 mx-0">
					<div class="col-2">
						<img src="/static/images/jd/VJoker.png" width="100">
					</div>
					<div class="col-10 align-self-center">
						<p class="py-3" style="font-size: 28px;">“A good programmer looks both ways before crossing a one-way street”</p>
						<span>- Unknown</span>
					</div>
				</div>

				<div class="feature-content mb-3 no-underline">
					<h5 class="pb-2 font-weight-bold">Naming and Readability matters</h5>
					<p>Good coders respect and care for fellow coders’ time, so they always write code that is simple to read and understandable. They avoid convoluted and complex logic and keep it simple, stupid. And yes they are extremely careful about naming.  </p>
				</div>
				<div class="feature-content row mb-50 pb-50 mx-0">
					<div class="col-2">
						<img src="/static/images/jd/RobertMartin.png" width="100">
					</div>
					<div class="col-10 align-self-center">
						<p class="py-3" style="font-size: 28px;">“You should name a variable using the same care with which you name a first-born child”</p>
						<span>- Robert C. Martin</span>
					</div>
				</div>

				<div class="feature-content mb-3 no-underline">
					<h5 class="pb-2 font-weight-bold">Skills matter less. Problem solving matters most</h5>
					<p>At Keka, we are problem solvers first and programmers next. Skills are secondary - mere tools to solve real world problems. Tech is only a means to make an impact on the world. So the reason for you to join us shouldn’t be just some cool tech stack you get to work on, but the impact you are going to make on this world!</p>
				</div>
				<div class="feature-content row mb-50 pb-50 mx-0">
					<div class="col-2">
						<img src="/static/images/jd/VJoker.png" width="100">
					</div>
					<div class="col-10 align-self-center">
						<p class="py-3" style="font-size: 28px;">First, solve the problem. Then write the code.</p>
						<span>- John Johnson</span>
					</div>
				</div>
				<div class="feature-content mb-3 no-underline">
					<h5 class="pb-2 font-weight-bold">Can you model the world?</h5>
					<p>No matter how great algorithms and code you write, if you can’t get your data and object modeling right, it demonstrates your lack of experience building real world scalable products. Before writing the first line of the code, you should understand what it will be doing, how it will be used, what it will use, how modules, services will work with each other, what structure will it have, how it will be tested and debugged, and how it will be updated. And you ask enough questions to get these answers.</p>
				</div>
				<div class="feature-content row mb-50 pb-50 mx-0">
					<div class="col-2">
						<img src="/static/images/jd/LinusTorvalds.png" width="100">
					</div>
					<div class="col-10 align-self-center">
						<p class="py-3" style="font-size: 28px;">“Bad programmers worry about the code. Good programmers worry about data structures and their relationships”</p>
						<span>-Linus Torvalds</span>
					</div>
				</div>
				<div class="feature-content mb-50 no-underline">
					<h2 class="pb-2">Responsibilities</h2>
				 	<p>You would be working on full stack Azure to Angular tech stack that covers - SQL, Cosmos, Azure Tables, Redis, Service Fabric, C#, Azure Functions, Type Script, Angular 7, Node, SASS, Build Automation and many more.</p>
					<p>We have roles that heavily focus on pure background architecture/middle tier C# or primarily Angular driven too.</p>
					<p>Mentoring is part of our culture and you are expected to mentor junior team members and make them better than you!</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
    	<div class="col-md-3"></div>
		<div class="col-md-9 col-sm-12">
			<a class="button-right-arrow px-60 rounded" href="<?php the_field('apply_url') ?>">Apply now</a>
		<div>
    </div>
</section>


<?php endwhile; // end of the loop. 

// get_footer();

?>

