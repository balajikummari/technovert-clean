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

$understrap_includes = array(
	'/pagination.php',                      // Custom pagination for this theme.
);

foreach ( $understrap_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
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

// Technovert Clean up styles & scripts
function Tv_Cleanup() {
	//Remove block styles
	wp_dequeue_style( 'wp-block-library' ); // WordPress core
	wp_dequeue_style( 'wp-block-library-theme' ); // WordPress core
	wp_dequeue_style( 'wc-block-style' ); // WooCommerce
	wp_dequeue_style( 'storefront-gutenberg-blocks' ); // Storefront theme

	//remove older version of jQuery
	wp_deregister_script('jquery'); //remove WP jquery
    wp_register_script('jquery', false);

	/*DISABLE EMOJIS */   
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'customstrap_disable_emojis_tinymce' );
	remove_action('wp_head', 'wp_resource_hints', 2);
	remove_action( 'wp_head', '_wp_render_title_tag', 1 );
	
	//add_filter( 'wp_resource_hints', 'customstrap_disable_emojis_remove_dns_prefetch', 10, 2 );
	
	/* Disable embed script from WP */

	// Remove the REST API endpoint.
	remove_action( 'rest_api_init', 'wp_oembed_register_route' );
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
	remove_action( 'wp_head', 'wlwmanifest_link');
	remove_action( 'wp_head', 'feed_links', 2 );
	remove_action ('wp_head', 'rsd_link');
	
	// Turn off oEmbed auto discovery.
	add_filter( 'embed_oembed_discover', '__return_false' );
	
	// Don't filter oEmbed results.
	remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
	
	// Remove oEmbed discovery links.
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	
	// Remove oEmbed-specific JavaScript from the front-end and back-end.
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );
	
	// Remove all embeds rewrite rules.
	add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );


	// Remove Customize page menu item on page when admin is logged in
	add_action( 'admin_bar_menu', 'Tv_cleanup_admin_top_bar_menu', 999 );
	
	remove_action('wp_head', 'wp_generator');
}

function Tv_Admin_Page_Columns($columns) {
	unset($columns['comments']);
	$columns['template'] = 'Template';
	$columns['categories'] = 'Categories';
	return $columns;
}

// Fully Disable Gutenberg editor.
add_filter('use_block_editor_for_post_type', '__return_false', 10);
add_action( 'wp_enqueue_scripts', 'Tv_Cleanup', 15 );
add_filter('manage_page_posts_columns', 'Tv_Admin_Page_Columns');

// Customize messess up and adds inline styling. Remove it.
function Tv_cleanup_admin_top_bar_menu( $wp_admin_bar ) {
	$wp_admin_bar->remove_menu( 'customize' );
}

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

function Tv_Meta_Tags() {
	global $page, $paged, $post;
	$default_keywords = 'Technovert, Product Engineering, Digital Transformation, Insurance, Quality Engineering, MVP Development'; // customize
	$output = '';
	$description = 'Technovert - We create your digital future';

	if (!is_object($post))
	return;

	// description
	$seo_desc = get_post_meta($post->ID, 'meta_description', true);
	$post_desc = get_bloginfo('description', 'display');
	$pagedata = get_post($post->ID);
	if (is_singular()) {
		if (!empty($seo_desc)) {
			$description = $seo_desc;
		} else if (!empty($pagedata)) {
			$description = apply_filters('the_excerpt_rss', $pagedata->post_content);
			$description = substr(trim(strip_tags($description)), 0, 155);
			$description = preg_replace('#\n#', ' ', $description);
			$description = preg_replace('#\s{2,}#', ' ', $description);
			$description = trim($description);
		} 
	} else {
		$description = $post_desc;	
	}

	define('META_DESC', esc_attr($description));
	
	// keywords
	$keys = get_post_meta($post->ID, 'meta_keywords', true);
	$cats = get_the_category();
	$tags = get_the_tags();
	if (empty($keys)) {
		if (!empty($cats)) foreach($cats as $cat) $keys .= $cat->name . ', ';
		if (!empty($tags)) foreach($tags as $tag) $keys .= $tag->name . ', ';
		$keys .= $default_keywords;
	}
	define('META_KEYWORDS', $keys);
    
	// Title
	$title_custom = get_post_meta($post->ID, 'title', true);
	$url = ltrim(esc_url($_SERVER['REQUEST_URI']), '/');
	$name = get_bloginfo('name', 'display');
	$title = trim(wp_title('', false));
	$cat = single_cat_title('', false);
	$tag = single_tag_title('', false);
	$search = get_search_query();

	if (!empty($title_custom)) $title = $title_custom;
	if ($paged >= 2 || $page >= 2) $page_number = ' | ' . sprintf('Page %s', max($paged, $page));
	else $page_number = '';

	if (is_home() || is_front_page()) $seo_title = 'Technovert | We create your digital future';
	elseif (is_singular())            $seo_title = $title . ' | ' . $name;
	elseif (is_tag())                 $seo_title = 'Tag Archive: ' . $tag . ' | ' . $name;
	elseif (is_category())            $seo_title = '' . $cat . ' | ' . $name;
	elseif (is_archive())             $seo_title = '' . $title . ' | ' . $name;
	elseif (is_search())              $seo_title = 'Search: ' . $search . ' | ' . $name;
	elseif (is_404())                 $seo_title = '404 - Not Found: ' . $url . ' | ' . $name;
	else                              $seo_title = $name . ' | ' . $description;

	$seo_title = esc_attr($seo_title . $page_number); 
	
	define('META_TITLE', $seo_title);

	//og:image
	$image = get_the_post_thumbnail_url( $post->ID, 'large' );

	if (empty($image)) {
		$image = esc_url('https://' . $_SERVER['HTTP_HOST']. '/static/common/technovert_og_image.png');
	}

	define('META_IMAGE', $image);
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

// Hide Preview Changes button on LiveCanvas enabled page to prevent conflict with custom templates
add_action('admin_head', 'hidePreviewButtonSaAdmin');

function hidePreviewButtonSaAdmin() {
	global $post;
	$lc_enabled = get_post_meta($post->ID, '_lc_livecanvas_enabled', true);

	if($lc_enabled > 0) {
		echo "<style>
					#post-preview {
							display:none !important;  
					} 
				</style>";
	}
}

// function tvstyles_enqueue_styles() {
//     wp_enqueue_style( 'tvstyles', get_template_directory_uri() . '/public/assets/css/style.css',false,'1.1','all');
//     wp_enqueue_script('custom', get_stylesheet_directory_uri().'/public/assets/js/all.js', array(), false, true);
// }
// add_action( 'wp_enqueue_scripts', 'tvstyles_enqueue_styles' );

// function to get filtered post by title
function filter_post_by_title() {
	$search_query = $_POST['inputValue'];
	$post_type = $_POST['postType'];
	  
	  global $wpdb;
	  $response="";
	  $filtered_post="";
	  
	  if(strlen($search_query) > 0) {
		  $query = "SELECT post_title,post_name FROM yud_posts WHERE post_type='$post_type' and post_status='publish' and post_title LIKE '%$search_query%' LIMIT 10";
		  $filtered_post = (array)($wpdb->get_results($query));
	  }
	  
	  if($filtered_post) {
		  foreach($filtered_post as $key => $row) {
			  $row_array = (array)$row;
			  $response.='<li><a class="dropdown-item text-primary text-truncate py-8" href="/'.($row_array['post_name']).'" title="'.($row_array['post_title']).'">'.  ($row_array['post_title']).'</a></li>';
			  
		  }
	  } else if(strlen($search_query) > 0 ) {
		  $response = '<li class="p-8 text-center">No result</li>';
	  } else {
		  $response = "empty";
	  }
	  
	  echo $response;
	  exit;
	}

	add_action('wp_ajax_filter_post_by_title', 'filter_post_by_title');
	add_action('wp_ajax_nopriv_filter_post_by_title', 'filter_post_by_title'); 


// function to get filtered post by select element
function filter_post_by_select() {
	$filterBy = $_POST['filterBy'];
	$searchVal = $_POST['searchVal'];
	  
	global $wpdb;
	$filtered_post = array();
	$response = "";
	
	$query1 = "select post_id from yud_postmeta where meta_key='$filterBy' and meta_value='$searchVal';";
	$idArr = $wpdb->get_results($query1);

	foreach($idArr as $id) {
		// feature_image, solution_category, industry, post_title
		$query = "SELECT x.id, x.post_title, y.meta_key, y.meta_value from yud_posts x inner join yud_postmeta y on x.id = y.post_id where x.id = $id->post_id and (y.meta_key = 'industry' or y.meta_key = 'solution_category' or y.meta_key = 'feature_image') order by y.meta_key desc;";
		$filtered_post = $wpdb->get_results($query, ARRAY_A);
	}

	$count = 1;
	foreach($filtered_post as $post) {
		$count++;
		$id = $post["id"];
		$url = get_permalink($id);
		$title = substr($post["post_title"], 0, 55);
		$img = get_field("feature_image", $id);

		if($post["meta_key"] == "industry") {
			$ind = $post["meta_value"];
		}
		
		if ($post["meta_key"] == "solution_category") {
			$sol = $post["meta_value"];
		}

		if($count % 3 == 0) {
			$response .= "<a class='box' href='$url'>
            <div class='card'>
              <div class='max-h-200 overflow-hidden'>
                <img src='$img' alt='case study preview'>
              </div>
                <div class='card-body'>
                  <h5>$title</h5>
                  <p class='industry'>$ind</p>
                </div>
                <span class='card-badge'>$sol</span>
            </div>
          </a>";
		}
	}
	
	echo $response;
	exit;
}

add_action('wp_ajax_filter_post_by_select', 'filter_post_by_select');
add_action('wp_ajax_nopriv_filter_post_by_select', 'filter_post_by_select');

// Fetch all posts by post type
function fetch_all_by_post_type() {
	$postType = $_POST['postType'];
	$res = "";

	$args = array(
        'post_type' => $postType,
        'posts_per_page' => -1
	);

	$query = new WP_Query($args);

	if($query->have_posts()) {
		while($query->have_posts()) {
			$res .= "<a class='box' href='" . get_permalink() . "'>
            <div class='card'>
              <div class='max-h-200 overflow-hidden'>
                <img src='" . get_field("feature_image") ."' alt='case study preview'>
              </div>
                <div class='card-body'>
                  <h5>" . get_the_title() "</h5>
                  <p class='industry'>" . get_field("industry") . "</p>
                </div>
                <span class='card-badge'>" . get_field("solution_category") . "</span></div></a>";
		}
	}

	echo $res;
	exit;
}