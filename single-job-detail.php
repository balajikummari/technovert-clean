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
    background-size: 35rem, auto;" >
	<div class="container-box">
        <span>We are hiring</span>
		<h1>
        <?php the_title();  ?>
		</h1>
	</div>
</section>
<section class="container-box mt-80">
	<div class="row m-0 banner-container">
		<div class="col-md-9 col-sm-12">
			<div class="mb-160 mb-xs-80">
				<div class="feature-content mb-50 no-underline">
					<h2 class="pb-2"><?php the_title();  ?></h2>
					<p><?php the_field('job_introduction') ?></p>
				</div>
				<div class="feature-content mb-50 no-underline">
					<h2 class="pb-2">Skills matter some, Attitude matters most</h2>
					<p>Skills can be learnt and unlearnt any time. But the attitude you bring to the table makes all the difference and gives purpose to those skills. That’s what matters to us most. </p>
				</div>
				<div class="feature-content mb-50 no-underline">
					<h5 class="pb-2 font-weight-bold">Craftsman or a code coolie?</h5>
					<p>Clean code is a craft. There’s beauty in good code. Only craftsmen get it, while the code coolies are comfortably clueless, swirling in their own soup. Craftsmen spend hours iterating and refactoring until their code reaches a S.O.L.I.D state.  They are extremely curious, always honing their skills and laser focused on solving the same problem with better approaches. Are you such craftsman? </p>
				</div>
				<div class="feature-content mb-50">
					<img src="" width="100" />
					<p>“A good programmer looks both ways before crossing a one-way street”</p>
				</div>
			</div>
		</div>
	</div>
</section>


<?php endwhile; // end of the loop. 

// get_footer();

?>

