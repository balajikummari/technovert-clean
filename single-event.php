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
    <div class="">
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
    <div class="feature-content no-underline col-9">
		<h2 class="">Who is this for</h2>
		<p class="">
            NPCA embarked on a digital transformation journey in adapting a cloud-first strategy with a rollout of Office 365, Microsoft Teams and Power Platform. NPCA began looking for modern solutions that could automate and streamline many of their processes and turned to Technovert for help.
		</p>
	</div>
    <div class="feature-content no-underline col-9">
		<h2 class="">What you’ll learn</h2>
		<p class="">
        NPCA embarked on a digital transformation journey in adapting a cloud-first strategy with a rollout of Office 365, Microsoft Teams and Power Platform.
		</p>
        <div>
            <div>
                <div class="rounded-list-icon mt-3 mx-3"></div>
                <p class="d-inline-block">The performance management system got set-up in literally 1 week</p>
            </div>
            <div>
                <div class="rounded-list-icon mt-3 mx-3"></div>
                <p class="d-inline-block">The performance management system got set-up in literally 1 week</p>
            </div>
            <div>
                <div class="rounded-list-icon mt-3 mx-3"></div>
                <p class="d-inline-block">The performance management system got set-up in literally 1 week</p>
            </div>
        </div>
	</div>
    <div class="no-underline">
		<h2 class="">Speakers</h2>
		<p class="">
            We have some distinguished speakers on the event
		</p>
        <div class="col-md-6 col-12 mb-xs-30">
			<div class="row mt-5">
				<div class="col-6 text-center">
					<img class="mb-20" src="/static/images/events/rama_krishna_ch.PNG" alt="Expert 1" width="240">
					<h5 class="font-weight-extra-bold text-clay">Rama Krishna Ch</h5>
					<p class="text-sm text-gray">Architect</p>
				</div>
				<div class="col-6 text-center">
					<img class="mb-20" src="/static/images/events/mitra_d.PNG" alt="Expert 2" width="240">
					<h5 class="font-weight-extra-bold text-clay">BK Saka</h5>
					<p class="text-sm text-gray">UX Architect</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- <?php the_content(); ?> -->

<?php endwhile; // end of the loop. 

get_footer();

?>

