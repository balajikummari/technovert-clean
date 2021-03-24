<?php 
/**
 * Template Name: Case Studies
 *
 * Template for Case Studies 
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
    'post_type' => 'case-studies'
);

$GLOBALS['wp_query'] = new WP_Query( $args );

$blogquery = $GLOBALS['wp_query']

?>

<section class="case-studies mt-30">
    <div class="container-box">
      <h4 class="text-color-clay">Case Studies</h4>

      <div class="filters row mx-0 mt-20">
        <select name="industry" id="industry" class="col-md-3 col-12 px-0 mb-xs-30">
          <option value="0">Industry</option>
          <option value="1">Banking</option>
          <option value="2">Insurance</option>
          <option value="3">RPA</option>
        </select>
        <select name="solution" id="solution" class="col-md-3 col-12 px-0 mb-xs-30">
          <option value="0">Solution</option>
        </select>
        <div class="col-md-6 col-12 px-0 position-relative">
          <div id="search">
            <input type="text" id="post-search-field" placeholder="Search" />
            <span class="icon icon-sm ic-check"></span>
          </div>
          <ul class="dropdown-menu w-100" id="suggestion-container"></ul>
        </div>
      </div>

      <div class="case-study-wrapper mt-50">
        <div class="box-2 card-h-100"> 
          <?php while ( $blogquery->have_posts()) : $blogquery->the_post();  ?>
            <a class="box" href="<?php echo the_guid(); ?>">
              <div class="card">
                  <img src='<?php the_field("feature_image") ?>' alt="case study preview">
                  <div class="card-body">
                    <h5><?php echo substr(get_the_title(), 0, 55); ?></h5>
                    <p class="industry"><?php the_field('industry'); ?></p>
                  </div>
                  <span class="card-badge"><?php the_field('solution_category'); ?></span>
              </div>
            </a>
          <?php endwhile; ?>
        </div>
      </div>
  </div>
</section>

<?php get_footer(); ?>