<?php
/**
 * Technovert Clean functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Technovert_Clean
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'technovert_clean_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function technovert_clean_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Technovert Clean, use a find and replace
		 * to change 'technovert-clean' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'technovert-clean', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'technovert-clean' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'technovert_clean_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'technovert_clean_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function technovert_clean_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'technovert_clean_content_width', 640 );
}
add_action( 'after_setup_theme', 'technovert_clean_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function technovert_clean_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'technovert-clean' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'technovert-clean' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'technovert_clean_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function technovert_clean_scripts() {
	wp_enqueue_style( 'technovert-clean-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'technovert-clean-style', 'rtl', 'replace' );

	wp_enqueue_script( 'technovert-clean-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'technovert_clean_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function tvstyles_enqueue_styles() {
	wp_enqueue_style( 'tvstyles', get_template_directory_uri() . '/public/assets/css/style.css',false,'1.1','all');
	wp_enqueue_script('custom', get_stylesheet_directory_uri().'/public/assets/js/all.js', array(), false, true);
}
add_action( 'wp_enqueue_scripts', 'tvstyles_enqueue_styles' );




add_filter('use_block_editor_for_post_type', '__return_false', 10);
// Don't load Gutenberg-related stylesheets.
add_action( 'wp_enqueue_scripts', 'remove_block_css', 100 );
function remove_block_css() {
wp_dequeue_style( 'wp-block-library' ); // WordPress core
wp_dequeue_style( 'wp-block-library-theme' ); // WordPress core
wp_dequeue_style( 'wc-block-style' ); // WooCommerce
wp_dequeue_style( 'storefront-gutenberg-blocks' ); // Storefront theme
}

add_action( 'init', function() {

    // Remove the REST API endpoint.
    remove_action('rest_api_init', 'wp_oembed_register_route');

    // Turn off oEmbed auto discovery.
    // Don't filter oEmbed results.
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

    // Remove oEmbed discovery links.
    remove_action('wp_head', 'wp_oembed_add_discovery_links');

    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action('wp_head', 'wp_oembed_add_host_js');
}, PHP_INT_MAX - 1 );


/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
   }
   add_action( 'init', 'disable_emojis' );
   
   /**
	* Filter function used to remove the tinymce emoji plugin.
	* 
	* @param array $plugins 
	* @return array Difference betwen the two arrays
	*/
   function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
	return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
	return array();
	}
   }

   /**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
	if ( 'dns-prefetch' == $relation_type ) {
	/** This filter is documented in wp-includes/formatting.php */
	$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
   
   $urls = array_diff( $urls, array( $emoji_svg_url ) );
	}
   
   return $urls;
   }


// Code for sub navigation menu
function generate_sub_nav_html($post) {
	$menus = wp_get_nav_menus();
	$selection = get_post_meta($post->ID, 'subnav_choice', true);

	echo "<p>Please select the menu you want for sub navigation on this page</p><br/>";
	echo "<select name='sub_nav_select' id='sub_nav_select' class='postbox'>";
	echo "<option value='None'>None</option>";

	foreach ($menus as $menu) {
		$s = selected($selection, $menu->name);
		echo "<option value='$menu->name' $s>$menu->name</option>";
	}

	echo "</select>";
}

function sub_nav_meta_box() {
		$screens = ['post', 'page'];
    foreach ( $screens as $screen ) {
        add_meta_box(
            'sub_nav_meta_box_id',
            'Sub navigation Menu', 
            'generate_sub_nav_html', 
            $screen, 
						'side',
						'default'
        );
    }
}

function save_sub_nav_menu_value($post_id) {
	$meta_value = get_post_meta($post_id, "subnav_choice", true);
	global $post;
	if(isset($_POST["sub_nav_select"])) {
			$sub_nav_choice = $_POST['sub_nav_select'];

			update_post_meta($post->ID, 'subnav_choice', $sub_nav_choice);
	}
}

add_action( 'add_meta_boxes', 'sub_nav_meta_box' );
add_action( 'save_post', 'save_sub_nav_menu_value', 10, 1);

function sub_nav_shortcode() {
	global $post;
	$menu_name = get_post_meta($post->ID, "subnav_choice", true);

	$options = array(
		'menu' => $menu_name,
		'menu_class' => 'subnav',
		'echo' => false,
	);

	return wp_nav_menu($options);
}

add_shortcode('sub_nav', 'sub_nav_shortcode');