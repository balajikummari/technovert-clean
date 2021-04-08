<?php
/**
 * Template Name: Hero Page Template 
 *
 * Template for displaying a page with Technovert's Hero and sub navigation component.
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
			<div class="content-area" id="primary">
				<?php
					$bg = get_field('hero_background');
					if(strlen($bg) > 0) {
						echo "<section class='hero-section' style='background-image: url($bg);'>";
					} else {
						echo "<section class='hero-section'>";
					}
					?>
					<div class="container-box">
            <span><?php the_field('hero_label') ?></span>
            <h1><?php the_field('hero_title') ?></h1>
					</div>
          </section>
					<div class="subnav-container">
								<?php 
								$menu_name = get_post_meta($post->ID, "subnav_choice", true);
								if($menu_name != 'None') {
									$options = array(
										'menu' => $menu_name,
										'menu_class' => 'subnav container-box clear-margin-b',
										'echo' => true,
									);
									wp_nav_menu($options); } ?>
					</div>
					<div class="entry-content">
						<?php the_content(); ?>
						<?php
						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
								'after'  => '</div>',
							)
						);
						?>
					</div><!-- .entry-content -->
			</div>
	</div>
</div>

<?php get_footer(); ?>
