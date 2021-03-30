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
                    <div class="data-bar mb-50">
                        <p>Engaged in</p>
                        <p><?php the_field('engaged_in')  ?></p>
                    </div>
                    <?php if(get_field('case_study_pdf')) {?>
                        <div>
                            <button class="btn btn-x-lg btn-primary-outline d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#downloadPdf">
                                <span class="icon ic-download text-blue icon-lg mr-12"></span>
                                Download PDF
                            </button>
                        </div>
                    <?php } ?>
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

<?php if(get_field('case_study_pdf')) {?>
    <div class="modal fade" id="downloadPdf" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog max-w-650">
        <div class="modal-content">
        
        <div class="modal-body p-40">
            <h1 class="mb-30">Get Instant Access</h1>
            <div id="case-study-pdf-form">
                <?php echo do_shortcode( '[contact-form-7 id="308" title="Case Study Subscription"]' ); ?>
            </div>
            
            <a id="pdf-download-btn" class="btn btn-primary btn-x-lg d-none mt-30" href=<?php the_field('case_study_pdf'); ?> download>
                    <span class="icon ic-download icon-lg mr-12 text-white"></span>
                    Download
            </a>   
            
        </div>
        
        </div>
    </div>
    </div>
<?php } ?>

<?php endwhile; // end of the loop. 

get_footer();

?>

