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
	<div class="row mx-0">
    	<div class="col-md-3"></div>
		<div class="col-md-9 col-sm-12">
			<div class="feature-content mb-50 no-underline">
				<h2 class="pb-2"><?php the_title();  ?></h2>
				<p><?php the_field('job_introduction') ?></p>
			</div>
		</div>
    </div>
	<?php the_content(); ?>
	
	<div class="row mx-0">
    	<div class="col-md-3"></div>
		<div class="col-md-9 col-sm-12">
			<a class="button-right-arrow px-60 rounded" href="<?php the_field('apply_url') ?>">Apply now</a>
		<div>
    </div>
</section>


<?php endwhile; // end of the loop. 

// get_footer();

?>

