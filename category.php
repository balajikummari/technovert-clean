<?php
/**
 *
 * Template for showing posts of a particular category 
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<?php get_template_part("template-parts/insights-nav"); ?>

<section>
    <div class="container-box">
        <div class="row mx-0 mt-60">
            <div class="col-md-4 col-sm-12 mb-xs-30 pr-xs-12 pr-md-30 pr-70">
                <h2 class="text-clay mb-20">Insight</h2>
                <div class="p-30 shadow-low rounded">
                    <ul class="post-verticle-nav">
                        <li class="nav-items">
                            <a href="/category/digital-transformation/" class="nav-link active">Digital Transformation</a>
                        </li>
                        <li class="nav-items">
                            <a href="/category/cloud/" class="nav-link">Cloud</a>
                        </li>
                        <li class="nav-items">
                            <a href="/category/product-engineering/" class="nav-link">Product Engineering</a>
                        </li>
                        <li class="nav-items">
                            <a href="/category/quality-engineering/" class="nav-link">Quality Engineering</a>
                        </li>
                        <li class="nav-items">
                            <a href="/category/user-experience/" class="nav-link">User Experience</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8 col-sm-12 ">
                <div class="box-2">
                    <?php while ( have_posts()) : the_post();  ?>
                        <div class="box">
                            <div class="post-tile">
                                <img src="https://www.keka.com//media/2021/03/smart-goals-image-375x250.jpg" alt="Alternate Text" />
                                <div>
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
                        </div>
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
