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


<section>
    <div class="card-circular">
		<img src="https://staging3.technovert.com/wp-content/uploads/Artificial-Intelligence.svg">
		<h5 class="">Cloud Transformation</h5>
		<p class="">From an Idea into a product,accelerate your product development</p>
		<a class="learn-more" href="#">Learn More</a>
	</div>
</section>
<?php get_footer(); ?>