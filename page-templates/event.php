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

get_template_part("template-parts/insights-nav");

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

      <div class="filters row mx-0 mt-20">
        <select name="industry" id="industry" class="col-md-3 col-12 px-0 mb-xs-30">
          <option value="Industry">Industry</option>
          <option value="Banking">Banking</option>
          <option value="Insurance">Insurance</option>
          <option value="RPA">RPA</option>
        </select>
        <select name="solution" id="solution" class="col-md-3 col-12 px-0 mb-xs-30">
          <option value="Solution">Solution</option>
          <option value="Digital Transformation">Digital Transformation</option>
          <option value="Product Engineering">Product Engineering</option>
          <option value="Quality Engineering">Quality Engineering</option>
          <option value="User Experience">User Experience</option>
        </select>
        <div class="col-md-6 col-12 px-0 position-relative">
          <div id="search">
            <input type="text" id="post-search-field" data-post-type="event" placeholder="Search" />
            <span class="icon icon-sm ic-search"></span>
          </div>
          <ul class="dropdown-menu w-100" id="suggestion-container"></ul>
        </div>
      </div>

      <div class="posts-wrapper" data-ptype="event">
      <?php while ( $blogquery->have_posts()) : $blogquery->the_post();  ?>
        <div class="col-9 event-card-circular mt-5 border-0 p-0 row mx-0 rounded">
      <!-- <img src="https://staging3.technovert.com/wp-content/uploads/Artificial-Intelligence.svg"> -->
          <div class="col-8 py-5 px-4">
            
              <h5 title=<?php echo substr(get_field('event_title'), 0, 50); ?>><?php echo substr(get_field('event_title'), 0, 50); ?></h5>
              <span class="badge badge-secondary">WEBINAR</span>
              <br />
              <div class="my-4"><span><?php echo date("M j l, Y", strtotime(get_field("event_date"))) ?></span></div>
              <br />
              <a class="learn-more" href="<?php echo the_guid(); ?>">More info</a>
          </div>
          <div class="col-4 p-0">
              <img class="event-logo rounded-right" src='<?php the_field("event_logo") ?>' alt="event preview" />
          </div>
        </div>
      <?php endwhile; ?>
      </div>
  </div>
</section>

<?php get_footer(); ?>