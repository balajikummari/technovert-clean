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

		<link rel="icon" href="/static/images/favicon/favicon.png" sizes="192x192">

    <!--Nunito Sans Font Family-->
		<link
			href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;500;600;700;800;900&family=Mulish&display=swap"
			rel="stylesheet"
		/> 

		<!-- All Technovert Styles -->
    <link rel="stylesheet" href="/static/css/style.css?2" />

     <!-- Technovert Icons -->
		<link rel="stylesheet" href="/static/css/technovert-icons.css">

		<link rel="profile" href="https://gmpg.org/xfn/11">
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

    <header id="masthead" class="site-header fixed-header">
        <!-- Main Header -->
        <nav class="navbar main-navbar  navbar-expand-lg main-navbar bg-transparen">
            <div class="container-box clear-margin-b g-0">
                <div class="d-flex  nav-header justify-content-between align-items-center">
                    <a class="navbar-brand p-0" href="/">
                        <img src="https://w3.technovert.com/static/images/common/technovert_logo_white.svg" alt="Technovert Logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <svg class="icon  text-secondary" width="19" height="22" viewBox="0 0 280 178" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="menu-icon" opacity="0.66">
                                <path id="first-line" d="M0 0H280V23H0V0Z" fill="#ffffff" />
                                <rect id="third-line" y="150" width="280" height="23" fill="#ffffff" />
                                <rect id="middle-line" y="76" width="280" height="23" fill="#ffffff" />
                            </g>
                        </svg>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        
                        <li class="nav-item dropdown small-dropdown">
                            <a class="nav-link dropdown-toggle" id="customers" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span>Services</span><span class="icon icon-xs text-white ic-chevron-down"></span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="customers">
                              <li><a class="dropdown-item" href="/cloud">Cloud</a></li>
                              <li><a class="dropdown-item" href="/modern-data-analytics">Modern Data Analytics</a></li>
                              <li><a class="dropdown-item" href="/product-engineering">Product Engineering</a></li>
                              <li><a class="dropdown-item" href="/digital-transformation">Digital Transformation</a></li>
                              <li><a class="dropdown-item" href="/quality-engineering">Quality Engineering</a></li>
                              <li><a class="dropdown-item" href="/ux-design">UX Design</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown small-dropdown">
                            <a class="nav-link dropdown-toggle" id="solutions" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span>Solutions</span><span class="icon icon-xs text-white ic-chevron-down"></span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="solutions">
                              <li><a class="dropdown-item" href="/insurance">Insurance</a></li>
                              <li><a class="dropdown-item" href="#">Banking</a></li>
                              <li><a class="dropdown-item" href="#">HR & People</a></li>
                              <li><a class="dropdown-item" href="#">Digital Workplace</a></li>
                              <li><a class="dropdown-item" href="#">Office 365 Apps</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/labs">Labs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/#">Insights</a>
                        </li>
                        <li class="nav-item dropdown small-dropdown">
                            <a class="nav-link dropdown-toggle" id="about" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span>About</span><span class="icon icon-xs text-white ic-chevron-down"></span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="about">
                              <li><a class="dropdown-item" href="/core-values">Core Values</a></li>
                              <li><a class="dropdown-item" href="/our-quality">Our Quality</a></li>
                              <li><a class="dropdown-item" href="/contact">Contact</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/careers">Careers</a>
                        </li>
                    </ul>
                   
                </div>
            </div>
        </nav>

        <!-- End of Main Header -->

    </header>