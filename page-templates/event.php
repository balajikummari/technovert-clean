<?php 
/**
 * Template Name: Event
 *
 * Template for Events 
 *
 * @package understrap
 */

 // Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'posts_per_page'   => 12,
    'post_status'      => 'publish',
    'order'            => 'DESC',
    'orderby'          => 'date',
    'paged'            => $page,
    'suppress_filters' => true,
    'post_type' => 'event'
);

$GLOBALS['wp_query'] = new WP_Query( $args );

$blogquery = $GLOBALS['wp_query']

?>
<section class="events">
  <div class="min-h-100 bg-gray-dark"></div>
    <div class="container-box">
      <h4 class="text-gray">Events</h4>

      <div class="filters d-flex mt-20">
        <select name="industry" id="industry">
          <option value="0">Industry</option>
          <option value="1">Banking</option>
          <option value="2">Insurance</option>
          <option value="3">RPA</option>
        </select>
        <select name="solution" id="solution">
          <option value="0">Solution</option>
        </select>
        <input type="text" id="search" placeholder="Search" onkeyup="searchFilter('.case-study-card', 'h2');" />
      </div>

      
    <div class="col-9 card-circular card mt-5 border-0 p-0 row mx-0">
		<!-- <img src="https://staging3.technovert.com/wp-content/uploads/Artificial-Intelligence.svg"> -->
        <div class="col-8 py-5 px-4">
            <h5 class="">Cloud Transformation</h5>
            <h5>Example heading <span class="badge badge-secondary">WEBINAR</span></h5>
            <span>Jan 24 Wednesday, 2021</span>
            <a class="learn-more" href="#">More info</a>
        </div>
		<div class="col-4">
            <img class="event-log" src="https://staging3.technovert.com/wp-content/uploads/Artificial-Intelligence.svg">
        </div>
	</div>
  </div>
</section>

<?php get_footer(); ?>