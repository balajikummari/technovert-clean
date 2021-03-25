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

      <?php while ( $blogquery->have_posts()) : $blogquery->the_post();  ?>
        <div class="col-9 event-card-circular mt-5 border-0 p-0 row mx-0">
      <!-- <img src="https://staging3.technovert.com/wp-content/uploads/Artificial-Intelligence.svg"> -->
          <div class="col-8 py-5 px-4">
            
              <h5 class="" title=<?php echo substr(get_field('event_title'), 0, 50); ?>><?php echo substr(get_field('event_title'), 0, 50); ?></h5>
              <span class="badge badge-secondary">WEBINAR</span>
              <br />
              <div class="my-4"><span><?php echo date("M j l, Y", strtotime(get_field("event_date"))) ?></span></div>
              <br />
              <a class="learn-more" href="<?php echo the_guid(); ?>">More info</a>
          </div>
          <div class="col-4 p-0">
              <img class="event-logo" src='<?php the_field("event_logo") ?>' alt="event preview" />
          </div>
        </div>
      <?php endwhile; ?>
  </div>
</section>

<?php get_footer(); ?>