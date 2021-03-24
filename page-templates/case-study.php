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

<section class="case-studies">
  <div class="min-h-100 bg-gray-dark"></div>
    <div class="container-box">
      <h4 class="text-gray">Case Studies</h4>

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

      <div class="case-study-wrapper container-fluid mt-50">
        <div class="box-2"> 
          <?php while ( $blogquery->have_posts()) : $blogquery->the_post();  ?>
            <a class="box case-study-card" href="<?php echo the_guid(); ?>">
              <span class="label">Digital Transformation</span>
              <div class="preview-img">
                <img src='<?php the_field("feature_image") ?>' alt="case study preview">
              </div>
              <h2><?php echo substr(get_field('intro_text'), 0, 25); ?></h2>
              <span class="industry"><?php the_field("industry") ?></span>
            </a>
          <?php endwhile; ?>
        </div>
      </div>
  </div>
</section>

<?php get_footer(); ?>