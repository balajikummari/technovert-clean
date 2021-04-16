<?php 
/**
 * Template Name: White Paper
 *
 * Template for White Papers
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
    'post_type' => 'white-paper'
);

$GLOBALS['wp_query'] = new WP_Query( $args );

$blogquery = $GLOBALS['wp_query']

?>

<section>
<?php get_template_part("template-parts/insights-nav"); ?>

    <div class="container-box">
      <h4 class="text-clay mt-30">White Papers</h4>

      <div class="filters row mx-0 mt-20">
        <!-- <select name="industry" id="industry" class="col-md-3 col-12 px-0 mb-xs-30">
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
        </select> -->
        <div class="col-md-6 col-12 px-0 position-relative">
          <div id="search">
            <input type="text" id="post-search-field" data-post-type="white-paper" placeholder="Search" />
            <span class="icon icon-sm ic-search"></span>
          </div>
          <ul class="dropdown-menu w-100" id="suggestion-container"></ul>
        </div>
      </div>

      <div class="white-paper-wrapper posts-wrapper mt-50 box-2 card-h-100" data-ptype="white-paper">
        <?php while ( $blogquery->have_posts()) : $blogquery->the_post();  ?>
          <a class="box" href="<?php echo the_guid(); ?>">
            <div class="card">
              <div class="h-200 overflow-hidden">
                <img src='<?php the_field("feature_image") ?>' alt="white paper preview">
              </div>
                <div class="card-body">
                  <h5><?php echo substr(get_the_title(), 0, 55); ?></h5>
                  <p class="industry"><?php the_field('industry'); ?></p>
                </div>
            </div>
          </a>
        <?php endwhile; ?>
      </div>
  </div>
</section>

<?php get_footer(); ?>