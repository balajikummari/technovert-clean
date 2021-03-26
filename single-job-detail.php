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
<section class="container-box">
	<div class="row m-0 banner-container">
		<div class="col-md-9 col-sm-12">
			<div class="mb-160 mb-xs-80">
				<div class="feature-content mb-50">
					<h2><?php the_title();  ?></h2>
					<?php the_field('job_introduction') ?>
				</div>
			</div>
		</div>
	</div>
</section>


<?php endwhile; // end of the loop. 

// get_footer();

?>

