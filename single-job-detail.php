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

<section class="hero-section" style=";background-position: right 2% bottom 5%;
    background-size: 35rem, auto;background-image:  url(<?php the_field('feature_image_2'), url(<?php the_field('feature_image') ?>)" >
	<div class="container-box">
        <span>We are hiring</span>
		<h1>
        <?php the_title();  ?>
		</h1>
	</div>
</section>



<?php endwhile; // end of the loop. 

// get_footer();

?>

