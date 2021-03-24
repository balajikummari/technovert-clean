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


<section class="hero-section">
	<div class="container-box">
        <span>WEBINAR</span>
		<h1>
            <?php the_field('event_title')  ?>
		</h1>
	</div>
</section>
<section class="container-box mt-5">
	<div class="feature-container image-last">
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
</section>
<section class="container-box ">
    <div class="row mx-0">
        <div class="blurb-img-left mb-50 col-6">
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
</section>
<section class="container-box mt-80">
	<div class="feature-content no-underline">
		<h2 class="">Who is this for</h2>
		<p class="">
            <?php the_field('vision')  ?>
		</p>
	</div>
</section>
<section class="container-box mt-80">
	<div class="feature-content no-underline">
		<h2 class="">What you’ll learn</h2>
		<p class="">
            <?php the_field('mission')  ?>
		</p>
	</div>
</section>
<section class="container-box mt-80">
	<div class="feature-content no-underline">
		<h2 class="">Speakers</h2>
		<p class="">
            <?php the_field('about_speakers')  ?>
		</p>
	</div>
</section>
<!-- <section class="container-box mt-60 mt-xs-40">
    <div class="case-study">
        <div class="case-study-left">
            <h5 class="text-clay font-weight-default">
            <?php the_field('intro_text')  ?>
            </h5>
        </div>
        <div class="case-study-right">
            <div class="w-100">
                <div class="card">
                    <div class="mb-30">
                        <img src="<?php the_field('logo')  ?>" class="max-w-360 max-h-100px" />
                    </div>
                    <div class="mb-50">
                        <h5>World’s leading datacenter real estate organization</h5>
                    </div>
                    <div class="data-bar">
                        <p>Industry</p>
                        <p>Banking</p>
                    </div>
                    <div class="data-bar">
                        <p>Location</p>
                        <p><?php the_field('location')  ?></p>
                    </div>
                    <div class="data-bar">
                        <p>Engaged in</p>
                        <p>March 2014</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="customer-feedback">
        <div class="d-flex ">
            <div class="d-none d-md-block mr-20">
                <img src="https://www.keka.com/static/images/misc/quotes.svg" width="105" height="80" />
            </div>
            <div>
                <p class="mb-20"><?php the_field('testimonial')  ?></p>
                <div class="d-flex">
                    <img src="<?php the_field('testimonial_pic')  ?>" width="60" height="60" class="img-circle mr-20" />
                    <div>
                        <h5 class="text-clay"><?php the_field('testimonial_name')  ?></h5>
                        <p class="text-gray"><?php the_field('testimonial_title')  ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="customer-content">
        <?php the_content(); ?>
    </div>
</section> -->

<?php endwhile; // end of the loop. 

get_footer();

?>

