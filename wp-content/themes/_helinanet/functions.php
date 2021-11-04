<?php
/**
 * HelinaNet functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package HelinaNet
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( '_helinanet_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function _helinanet_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on HelinaNet, use a find and replace
		 * to change '_helinanet' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( '_helinanet', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', '_helinanet' ),
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
				'_helinanet_custom_background_args',
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
add_action( 'after_setup_theme', '_helinanet_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _helinanet_content_width() {
	$GLOBALS['content_width'] = apply_filters( '_helinanet_content_width', 640 );
}
add_action( 'after_setup_theme', '_helinanet_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _helinanet_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', '_helinanet' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', '_helinanet' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', '_helinanet_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function _helinanet_scripts() {
	wp_enqueue_style( '_helinanet-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( '_helinanet-style', 'rtl', 'replace' );

	//wp_enqueue_script( '_helinanet-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', '_helinanet_scripts' );

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

add_filter('show_admin_bar', '__return_false');

add_action( 'after_setup_theme', '_nnsup_setup' );
function _nnsup_setup() {
    add_image_size( 'generic',825, 350, true );
    add_image_size( 'blog',1170, 780, true );
	add_image_size( 'event',980, 550, true );
	add_image_size( 'gallery',401, 300, true );
	add_image_size( 'square',451, 451, true );
	add_image_size( 'thumb',261, 261, true );

}


function custom_loginlogo() {
    echo '<style type="text/css">
h1 a {background-image: url('.get_bloginfo('template_directory').'/img/logo.png) !important;
padding-bottom: 0px;
width: 310px !important;
height: 195px !important;
-webkit-background-size: 310px !important;
background-size: 310px !important;
background-position: left !important;
}

</style>';
}
add_action('login_head', 'custom_loginlogo');

function add_site_favicon() {
    echo '<link rel="shortcut icon"
href="' . get_bloginfo('template_directory') . '/assets/favicons/favicon.ico" />';
}
   
add_action('login_head', 'add_site_favicon');
add_action('admin_head', 'add_site_favicon');



function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'News';
    $submenu['edit.php'][5][0] = 'News';
    $submenu['edit.php'][10][0] = 'Add News';
    $submenu['edit.php'][16][0] = 'News Tags';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'News';
    $labels->singular_name = 'News';
    $labels->add_new = 'Add News';
    $labels->add_new_item = 'Add News';
    $labels->edit_item = 'Edit News';
    $labels->new_item = 'News';
    $labels->view_item = 'View News';
    $labels->search_items = 'Search News';
    $labels->not_found = 'No News found';
    $labels->not_found_in_trash = 'No News found in Trash';
    $labels->all_items = 'All News';
    $labels->menu_name = 'News';
    $labels->name_admin_bar = 'News';
}



function get_client_ip_server() {
  $ipaddress = '';
if (isset($_SERVER['HTTP_CLIENT_IP']))
  $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
  $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
else if(isset($_SERVER['HTTP_X_FORWARDED']))
  $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
  $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
else if(isset($_SERVER['HTTP_FORWARDED']))
  $ipaddress = $_SERVER['HTTP_FORWARDED'];
else if(isset($_SERVER['REMOTE_ADDR']))
  $ipaddress = $_SERVER['REMOTE_ADDR'];
else
  $ipaddress = 'UNKNOWN';

  return $ipaddress;
}

$ipaddress = get_client_ip_server();

function getCountry($ip){
    $curlSession = curl_init();
    curl_setopt($curlSession, CURLOPT_URL, 'http://www.geoplugin.net/json.gp?ip='.$ip);
    curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
    curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

    $jsonData = json_decode(curl_exec($curlSession));
    curl_close($curlSession);

    return $jsonData->geoplugin_countryCode;
}

function getCountryName($ip){
    $curlSession = curl_init();
    curl_setopt($curlSession, CURLOPT_URL, 'http://www.geoplugin.net/json.gp?ip='.$ip);
    curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
    curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

    $jsonData = json_decode(curl_exec($curlSession));
    curl_close($curlSession);

    return $jsonData->geoplugin_countryName;
}

function getCurrency($ip){
    $curlSession = curl_init();
    curl_setopt($curlSession, CURLOPT_URL, 'http://www.geoplugin.net/json.gp?ip='.$ip);
    curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
    curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

    $jsonData = json_decode(curl_exec($curlSession));
    curl_close($curlSession);

    return $jsonData->geoplugin_currencyCode;
}

function getCity($ip){
    $curlSession = curl_init();
    curl_setopt($curlSession, CURLOPT_URL, 'http://www.geoplugin.net/json.gp?ip='.$ip);
    curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
    curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

    $jsonData = json_decode(curl_exec($curlSession));
    curl_close($curlSession);

    return $jsonData->geoplugin_city;
}
//http://api.hostip.info/flag.php?ip=105.162.5.17
 
add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );

function wpb_set_post_views($postID) {
    $count_key = 'wpb_get_post_views';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function clean_value($str) {
    $str = trim($str);
    $str = preg_replace("@<script[^>]*>.+</script[^>]*>@i", "", $str);
    $str = preg_replace("@<style[^>]*>.+</style[^>]*>@i", "", $str);
    $str = strip_tags($str);
    //$str=mysql_real_escape_string($str);
    //return addslashes($str);
	return $str;
}

function bigSummary($string){
    $string = strip_tags($string);
    if (strlen($string) > 620) {
        // truncate string
        $stringCut = substr($string, 0, 620);
        // make sure it ends in a word so assassinate doesn't become ass...
        $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';

    }
    echo $string;
}

function summary($string){
    $string = strip_tags($string);
    if (strlen($string) > 320) {
        // truncate string
        $stringCut = substr($string, 0, 120);
        // make sure it ends in a word so assassinate doesn't become ass...
        $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';

    }
    echo $string;
}

function ogsummary($string){
    $string = strip_tags($string);
    if (strlen($string) > 200) {
        // truncate string
        $stringCut = substr($string, 0, 200);
        // make sure it ends in a word so assassinate doesn't become ass...
        $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';

    }
    echo $string;
}

function is_phone($phone){
	$phone = str_replace("+","",$phone);
	$phone = str_replace(" ","",$phone);
	$phone = str_replace("(","",$phone);
	$phone = str_replace(")","",$phone);
	return (is_numeric($phone) && strlen($phone)>5);
}

function getToken($length){ 
	$random= "";
	srand((double)microtime()*1000000);
	
	$data = "AbcDE123IJKLMN67QRSTUVWXYZ"; 
	$data .= "aBCdefghijklmn123opq45rs67tuv89wxyz"; 
	$data .= "0FGH45OP89";
	
	for($i = 0; $i < $length; $i++) 
	{ 
	$random .= substr($data, (rand()%(strlen($data))), 1); 
	}
	
	return $random; 
}

function first_paragraph($content){
	return preg_replace('/<p([^>]+)?>/', '<p$1 class="lead">', $content, 1);
}
add_filter('the_content', 'first_paragraph');

function split_name($name) {
    $name = trim($name);
    $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
    $first_name = trim( preg_replace('#'.preg_quote($last_name,'#').'#', '', $name ) );
    return array($first_name, $last_name);
}

function export_posts_in_json() {
    $args = array(
        'post_type' => 'event',
        'post_status' => 'publish',
        'posts_per_page' => -1,
    );

    $query = new WP_Query($args);
    $posts = array();

    while ($query->have_posts()): $query->the_post();
		$post_id = $post->ID;
		$event_name = get_post_meta( $post_id, 'event_name', true );
		$start_date = get_post_meta( $post_id, 'start_date', true );
		$end_date = get_post_meta( $post_id, 'end_date', true );
        $posts[] = array(
            'title' => get_the_title(),
            'description' => get_the_excerpt(),
            'url' => get_the_permalink(),
			'start' =>  get_field('start_date'),
			'end' => get_field('end_date'),
            // any extra field you might need
        );
    endwhile;

    wp_reset_query();
    $data = json_encode($posts);
    $upload_dir = wp_get_upload_dir(); // set to save in the /wp-content/uploads folder
    //$file_name = date('Y-m-d') . '.json';
	$file_name = 'events.json';
    $save_path = $upload_dir['basedir'] . '/' . $file_name;

    $f = fopen($save_path, "w"); //if json file doesn't gets saved, comment this and uncomment the one below
    //$f = @fopen( $save_path , "w" ) or die(print_r(error_get_last(),true)); //if json file doesn't gets saved, uncomment this to check for errors
    fwrite($f, $data);
    fclose($f);
}

add_action('save_post', 'export_posts_in_json');

function pagination($pages = '', $range = 4)
{
    $showitems = ($range * 2)+1;

    global $paged;
    if(empty($paged)) $paged = 1;

    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }

    if(1 != $pages)
    {
        echo "<ul class=\"pagination float-end\">";
        //echo "<ul class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
        //if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
        if($paged > 1 && $showitems < $pages) echo "<li class='page-item'><a href='".get_pagenum_link($paged - 1)."' class='page-link'><i class='fas fa-angle-left'></i></a></li>";

        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<li class='page-item active'><a class='page-link'>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."' class='page-link'>".$i."</a></li>";
            }
        }

        if ($paged < $pages && $showitems < $pages) echo "<li class='page-item'><a href=\"".get_pagenum_link($paged + 1)."\" class='page-link'><i class='fas fa-angle-right'></i></a></li>";
        //if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
        echo "</ul>\n";
    }
}

function st_ajaxurl(){ ?>
<script>

var ajaxurl = '<?php echo admin_url('admin-ajax.php') ?>';

</script>

<?php }
add_action('wp_head','st_ajaxurl');

include_once('inc/custom-ajax-auth.php');
include_once('inc/registration.php');
include_once('customposts.php');
include_once('custom-columns.php');

?>