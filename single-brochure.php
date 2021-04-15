<?php
/**
 * Template Name: Brochure
 *
 *
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

while (have_posts()):
    the_post();
?>

<?php $feature_image = get_field('feature_image') ?>
<section class="hero-section" style="background-image: url(<?php echo $feature_image ?>)" >
	<div class="container-box">
        <h1>Brochure</h1>
		<h2>
        <?php the_title(); ?>
		</h2>
	</div>
</section>

<section class="container-box mt-60 mt-xs-40">
    <div class="white-paper">
        <div class="white-paper-left">
            <h5 class="text-clay font-weight-default">
            <?php the_field('intro_text') ?>
            </h5>
        </div>
        <div class="white-paper-right">
            <div class="w-100">
                <div class="card p-30">
                    <div class="mb-50">
                        <h5><?php the_field('subtitle') ?></h5>
                    </div>
                    <div class="data-bar">
                        <p>Industry</p>
                        <p><?php the_field('category') ?></p>
                    </div>
                    <?php if (get_field('brochure_pdf'))
    { ?>
                        <div>
                            <button class="btn btn-x-lg btn-outline btn-primary-outline d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#downloadPdf">
                                <span class="icon ic-download text-blue icon-lg mr-12"></span>
                                Download PDF
                            </button>
                        </div>
                    <?php
    } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="customer-content">
        <?php the_content(); ?>
    </div>
</section>

<?php if (get_field('whitepaper_pdf'))
    { ?>
    <div class="modal fade" id="downloadPdf" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog max-w-650">
        <div class="modal-content">
          <div class="modal-body p-40">
              <h1 class="mb-30">Get Instant Access</h1>
              <div id="white-paper-pdf-form">
                  <?php echo do_shortcode('[contact-form-7 id="854" title="White Paper Subscription"]'); ?>
              </div>
              
              <a id="pdf-download-btn" class="btn btn-primary btn-x-lg d-none mt-30" href=<?php the_field('whitepaper_pdf'); ?> download>
                      <span class="icon ic-download icon-lg mr-12 text-white"></span>
                      Download
              </a>   
          </div>
        </div>
      </div>
    </div>
<?php
    } ?>

<?php
endwhile; // end of the loop.
get_footer();
?>
