<?php
/**
 * Template Name: Hero and Subnav Template 
 *
 * Template for displaying a page with Technovert's Hero and sub navigation components.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="hero-template-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">
          <section class="hero-section">
            <div class="hero-prefix"><?php the_field('hero_label') ?></div>
            <h1 class="hero-white max-w-900"><?php the_field('hero_title') ?></h1>
          </section>
					<div class="subnav-container">
								<?php global $post;
								$menu_name = get_post_meta($post->ID, "subnav_choice", true);
	
								$options = array(
									'menu' => $menu_name,
									'menu_class' => 'subnav',
									'echo' => false,
								);

								echo wp_nav_menu($options); ?>
					</div>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'page' ); ?>

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>


<!-- Feature content
Feature container
Banner container
Ciruclar avatar -->
