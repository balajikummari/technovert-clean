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
    <meta charset="utf-8" />
    <?php Tv_Meta_Tags(); ?>
    <title><?php echo(META_TITLE); ?></title>

    <?php if (is_user_logged_in()) wp_head(); ?>

    <meta name="description" content="<?php echo(META_DESC); ?>" />
    <meta name="keywords" content="<?php echo(META_KEYWORDS); ?>" />
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    
    <?php if ( is_singular() ) echo '<link rel="canonical" href="' . get_permalink() . '" />'; ?>

    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo(META_TITLE); ?>" />
    <meta property="og:description" content="<?php echo(META_DESC); ?>" />
    <meta property="og:url" content="<?php echo get_permalink(); ?>" />
    <meta property="og:site_name" content="Technovert" />
    <!-- <meta property="article:publisher" content="https://www.facebook.com/kekadotcom/" /> -->
    <meta property="og:image" content="<?php echo(META_IMAGE); ?>" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="628" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:creator" content="@Technovertinc" />
    <meta name="twitter:site" content="@Technovertinc" />
    <meta name="twitter:title" content="<?php echo(META_TITLE); ?>" />
    <meta name="twitter:description" content="<?php echo(META_DESC); ?>" />

		<link rel="icon" href="/static/images/favicons/favicon.png" sizes="192x192">

    <!--Nunito Sans Font Family-->
		<link
			href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&family=Mulish&display=swap"
			rel="stylesheet"
		/> 

		<!-- All Technovert Styles -->
    <link rel="stylesheet" href="/static/css/style.css" />

     <!-- Technovert Icons -->
		<link rel="stylesheet" href="static/css/technovert-icons.css">

		<link rel="profile" href="https://gmpg.org/xfn/11">
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header id="masthead" class="site-header">
	<nav class="navbar navbar-expand-lg bg-transparent">
  <div class="container-box">
		<a class="navbar-brand" href="/">
			<img src="/static/images/common/technovert_logo_white.svg" alt="Technovert Logo">
		</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Services
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Cloud</a></li>
              <li><a class="dropdown-item" href="#">Modern Data Analytics</a></li>
              <li><a class="dropdown-item" href="#">Product Engineering</a></li>
              <li><a class="dropdown-item" href="#">Digital Transformation</a></li>
              <li><a class="dropdown-item" href="#">Quality Engineering</a></li>
              <li><a class="dropdown-item" href="#">UX Design</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Solutions
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Insurance</a></li>
              <li><a class="dropdown-item" href="#">Banking</a></li>
              <li><a class="dropdown-item" href="#">HR & People</a></li>
              <li><a class="dropdown-item" href="#">Digital Workplace</a></li>
              <li><a class="dropdown-item" href="#">Office 365 Apps</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Labs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Insights</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              About
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Core Values</a></li>
              <li><a class="dropdown-item" href="#">Our Quality</a></li>
              <li><a class="dropdown-item" href="#">Contact</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
    </div>
  </div>
</nav>
</header><!-- #masthead -->
