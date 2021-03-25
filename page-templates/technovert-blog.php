<?php
/**
 * Template Name: Technovert Blog 
 *
 * Template for showing Blog home 
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'posts_per_page'   => 1,
    'post_status'      => 'publish',
    'order'            => 'DESC',
    'orderby'          => 'date',
    'paged'            => $page,
    'suppress_filters' => true,
    'post_type' => 'post'
);

$GLOBALS['wp_query'] = new WP_Query( $args );

$blogquery = $GLOBALS['wp_query']
?>

<?php get_template_part("template-parts/insights-nav"); ?>

<section>
    <div class="container-box">
        <div class="row mx-0 mt-60">
            <div class="col-md-4 col-sm-12 mb-xs-30 pr-xs-12 pr-md-30 pr-70">
                <h2 class="text-clay mb-20">Insight</h2>
                <?php get_template_part("template-parts/vertical-nav"); ?>
            </div>
            <div class="col-md-8 col-sm-12 ">
                <div class="box-2">
                    <?php while ( $blogquery->have_posts()) : $blogquery->the_post();  ?>
                        <a class="box" href="<?php echo the_permalink() ?>">
                            <div class="post-tile">
                                <div class="h-200 overflow-hidden">
                                        <?php echo the_post_thumbnail('thumbnail') ?>
                                </div>
                                <div class="post-body">
                                    <h5>
                                        <?php 
                                            $truncate_title = substr(get_the_title(),0,75);
                                            echo (strlen(get_the_title()) > 75)  ?  $truncate_title. "..." :  get_the_title();
                                        ?>    
                                    </h5>
                                    <p><?php echo substr(get_the_excerpt(),0,300). "..." ?></p>
                                    <span>5 min Read</span>
                                </div>
                            </div>
                        </a>
                    <?php endwhile; ?>
                </div>
                <div>
                    <?php understrap_pagination(); ?>
                </div>
            </div>

        </div>
    </div>
</section>

<?php

get_footer();





