<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Technovert_Clean
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="icon" href="/static/images/favicons/favicon.png" sizes="192x192">
	<link
    href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&family=Mulish&display=swap"
    rel="stylesheet"
  /> 
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header id="masthead" class="site-header">
	<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
  <div class="container-box">
		<a class="navbar-brand" href="/">
			<img src="/static/images/common/technovert_logo_white.svg" alt="Technovert Logo">
		</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'menu_class' => 'navbar-nav ml-auto mb-2 mb-lg-0',
				)
			);
			?>
    </div>
  </div>
</nav>
</header><!-- #masthead -->
