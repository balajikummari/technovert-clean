<?php
/**
 * Template Name: Event
 *
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();


while ( have_posts() ) : the_post(); 
?>


<section class="hero-section" style="background-image: url(<?php the_field('feature_image') ?>)">
	<div class="container-box">
        <h1>WEBINAR</h1>
		<h2>
            <?php the_field('event_title')  ?>
		</h2>
	</div>
</section>
<section class="container-box mt-5">
	<div class="feature-container image-last pb-5 mb-5">
		<div>
			<img src="<?php the_field('event_logo')  ?>" alt="test">
		</div>
		<div class="feature-content no-underline">
			<h2><?php the_field('event_title')  ?></h2>
			<p class="mt-5">
                <?php the_field('event_description')  ?>
			</p>
		</div>
	</div>
    <div class="py-5">
        <div class="row mx-0">
            <div class="blurb-img-left mb-50 col-6 p-0">
                <div class="blurb-image">
                    <img src="/static/images/events/schedule.svg" width="60" alt="event_date_and_time">
                </div>
                <div class="blurb-container-content">
                    <span class="mb-10">Date & Time</span>
                    <p class="text-gray">
                        <?php echo date("M j, Y", strtotime(get_field("event_date"))) ?>

                        <a href="#" class="ml-3">Add to calendar</a>
                    </p>
                </div>
            </div>
            <div class="blurb-img-left mb-50 col-6">
                <div class="blurb-image">
                    <img src="/static/images/events/location-1.svg" width="60" alt="event_location">
                </div>
                <div class="blurb-container-content">
                    <span class="mb-10">Location</span>
                    <p class="text-gray">
                        <?php the_field('event_location')  ?>
                    </p>
                </div>
            </div>
        </div>
        <button class="button-right-arrow px-60 rounded">Register</button>
    </div>
    <?php the_content(); ?>
</section>


<?php endwhile; // end of the loop. 

get_footer();

?>

