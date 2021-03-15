<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Technovert_Clean
 */

get_header();
?>

	<main id="primary" class="site-main">
		<header class="bg-blue py-30"></header>
		<section class="error-404 not-found container-box mt-80">
			<div class="max-w-650">
				<h1 class="font-72 mb-30">Oops!</h1>
				<h3 class="mb-10">Page not found</h3>
				<h5 class="text-clay">The page you are looking for might have been removed, had its name changed or is temporarily unavailable</h5>
			</div>
		</section>

	</main><!-- #main -->

<?php
get_footer();
