<?php 
/**
 * Template Name: Brochure List Template
 *
 * Template for showing all Brochures
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
    'post_type' => 'brochure'
);

$GLOBALS['wp_query'] = new WP_Query( $args );

$blogquery = $GLOBALS['wp_query']

?>

<section>
<?php get_template_part("template-parts/insights-nav"); ?>

    <div class="container-box">
      <h4 class="text-clay mt-30">Brochures</h4>
      <div class="filters row mx-0 mt-20">
        <div class="col-md-6 col-12 px-0 position-relative">
          <div id="search">
            <input type="text" id="post-search-field" data-post-type="brochure" placeholder="Search" />
            <span class="icon icon-sm ic-search"></span>
          </div>
          <ul class="dropdown-menu w-100" id="suggestion-container"></ul>
        </div>
      </div>

      <div class="white-paper-wrapper posts-wrapper mt-50 box-2 card-h-100" data-ptype="brochure">
        <?php while ( $blogquery->have_posts()) : $blogquery->the_post();  ?>
          <a class="box" href="<?php echo the_guid(); ?>">
            <div class="card">
              <div class="max-h-200 overflow-hidden">
                <img src='<?php the_field("feature_image") ?>' alt="brochure preview">
              </div>
                <div class="card-body">
                  <h5><?php echo substr(get_the_title(), 0, 55); ?></h5>
                  <p class="industry"><?php echo substr(get_field('subtitle'), 0, 25); ?>..</p>
                </div>
            </div>
          </a>
        <?php endwhile; ?>
      </div>
  </div>
</section>

<?php get_footer(); ?>