<?php
/**
 * Template Name: Case Study
 *
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();


while ( have_posts() ) : the_post(); 
?>

<?php  $feature_image = get_field('feature_image')?>
<section class="hero-section" style="background-image: url(<?php echo $feature_image ?>)" >
	<div class="container-box">
        <span>Case Study</span>
		<h1>
        <?php the_title();  ?>
		</h1>
	</div>
</section>

<section class="container-box mt-60 mt-xs-40">
    <div class="case-study">
        <div class="case-study-left">
            <h5 class="text-clay font-weight-default">
            <?php the_field('intro_text')  ?>
            </h5>
        </div>
        <div class="case-study-right">
            <div class="w-100">
                <div class="card p-30">
                    <?php if(get_field('logo')) {?>
                        <div class="mb-30">
                            <img src="<?php the_field('logo')  ?>" class="max-w-360 max-h-100px" />
                        </div>
                    <?php } ?>
                    <div class="mb-50">
                        <h5><?php the_field('subtitle')  ?></h5>
                    </div>
                    <div class="data-bar">
                        <p>Industry</p>
                        <p><?php the_field('industry')  ?></p>
                    </div>
                    <div class="data-bar">
                        <p>Location</p>
                        <p><?php the_field('location')  ?></p>
                    </div>
                    <div class="data-bar">
                        <p>Engaged in</p>
                        <p><?php the_field('engaged_in')  ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if(get_field('testimonial')) {?>
        <div class="customer-feedback">
            <div class="d-flex ">
                <div class="d-none d-md-block mr-20">
                    <img src="https://www.keka.com/static/images/misc/quotes.svg" width="105" height="80" />
                </div>
                <div>
                    <p class="mb-20"><?php the_field('testimonial')  ?></p>
                    <div class="d-flex">
                        <img src="<?php the_field('testimonial_pic')  ?>" width="60" height="60" class="img-circle mr-20" />
                        <div>
                            <h5 class="text-clay"><?php the_field('testimonial_name')  ?></h5>
                            <p class="text-gray"><?php the_field('testimonial_title')  ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="customer-content">
        <?php the_content(); ?>
    </div>
</section>

<?php endwhile; // end of the loop. 

get_footer();

?>

