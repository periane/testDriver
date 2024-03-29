<?php 
/**
 * SKT Startup functions and definitions
 *
 * @package SKT Startup
 */

// Set the word limit of post content 
function skt_startup_content($limit) {
$content = explode(' ', get_the_excerpt(), $limit);
if (count($content)>=$limit) {
array_pop($content);
$content = implode(" ",$content).'...';
} else {
$content = implode(" ",$content);
}	
$content = preg_replace('/\[.+\]/','', $content);
$content = apply_filters('skt_startup_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
return $content;
}


function new_excerpt_length($length) {
    return 80;
}
add_filter('excerpt_length', 'new_excerpt_length'); 

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'skt_startup_setup' ) ) : 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function skt_startup_setup() {
	if ( ! isset( $content_width ) )
		$content_width = 640; /* pixels */

	load_theme_textdomain( 'skt-startup', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'title-tag' );
	add_image_size( 'skt-startup-logo', 350, 100 );
	add_theme_support( 'custom-logo', array( 'size' => 'skt-startup-logo' ) );
	add_image_size('homepage-thumb',570,570,true);		
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'skt-startup' ),
		'footer' => __( 'Footer Menu', 'subr_menu' ),		
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_editor_style( 'editor-style.css' );
} 
endif; // skt_startup_setup
add_action( 'after_setup_theme', 'skt_startup_setup' );


function skt_startup_widgets_init() { 	
	
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'skt-startup' ),
		'description'   => __( 'Appears on blog page sidebar', 'skt-startup' ),
		'id'            => 'sidebar-1',
		'before_widget' => '',		
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Contact Form On Slider', 'skt-startup' ),
		'description'   => __( 'Appears on header slider', 'skt-startup' ),
		'id'            => 'header-contact-form',
		'before_widget' => '<aside id="quick-contactform" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="section_title">',
		'after_title'   => '</h2>',
	) );		
	
}
add_action( 'widgets_init', 'skt_startup_widgets_init' );


function skt_startup_font_url(){
		$font_url = '';		
		
		/* Translators: If there are any character that are not
		* supported by Roboto, trsnalate this to off, do not
		* translate into your own language.
		*/
		$roboto = _x('on','roboto:on or off','skt-startup');		
		
		
		/* Translators: If there has any character that are not supported 
		*  by Scada, translate this to off, do not translate
		*  into your own language.
		*/
		$scada = _x('on','Scada:on or off','skt-startup');	
		
		if('off' !== $roboto ){
			$font_family = array();
			
			if('off' !== $roboto){
				$font_family[] = 'Roboto:300,400,600,700,800,900';
			}
					
						
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
		
	return $font_url;
	}


function skt_startup_scripts() {
	wp_enqueue_style('skt-startup-font', skt_startup_font_url(), array());
	wp_enqueue_style( 'skt-startup-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'skt-startup-editor-style', get_template_directory_uri()."/editor-style.css" );
	wp_enqueue_style( 'nivo-slider', get_template_directory_uri()."/css/nivo-slider.css" );
	wp_enqueue_style( 'skt-startup-main-style', get_template_directory_uri()."/css/responsive.css" );		
	wp_enqueue_style( 'skt-startup-base-style', get_template_directory_uri()."/css/style_base.css" );
	wp_enqueue_script( 'jquery-nivo', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'skt-startup-custom-js', get_template_directory_uri() . '/js/custom.js' );	
		

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'skt_startup_scripts' );

function skt_startup_ie_stylesheet(){
	global $wp_styles;
	
	/** Load our IE-only stylesheet for all versions of IE.
	*   <!--[if lt IE 9]> ... <![endif]-->
	*
	*  Note: It is also possible to just check and see if the $is_IE global in WordPress is set to true before
	*  calling the wp_enqueue_style() function. If you are trying to load a stylesheet for all browsers
	*  EXCEPT for IE, then you would HAVE to check the $is_IE global since WordPress doesn't have a way to
	*  properly handle non-IE conditional comments.
	*/
	wp_enqueue_style('skt_startup_ie', get_template_directory_uri().'/css/ie.css', array('skt_startup_style'));
	$wp_styles->add_data('skt_startup_ie','conditional','IE');
	}
add_action('wp_enqueue_scripts','skt_startup_ie_stylesheet');


define('SKT_CREDIT','https://www.sktthemes.org/product-category/free-wordpress-themes/','skt-startup');
define('SKT_URL','https://www.sktthemes.org','skt-startup');
define('SKT_PRO_THEME_URL','https://www.sktthemes.org/shop/startup-wordpress-theme/','skt-startup');
define('SKT_THEME_DOC','http://sktthemesdemo.net/documentation/startup-doc/','skt-startup');
define('SKT_LIVE_DEMO','http://sktthemesdemo.net/startup/','skt-startup');
define('SKT_THEMES','https://www.sktthemes.org/themes/','skt-startup');

if ( ! function_exists( 'skt_startup_credit' ) ) {
function skt_startup_credit(){
		return "SKT Startup Lite";
}
}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template for about theme.
 */
require get_template_directory() . '/inc/about-themes.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

 if ( ! function_exists( 'skt_startup_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since  SKT Startup 1.0
 */
function skt_startup_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

// get slug by id
function skt_startup_get_slug_by_id($id) {
	$post_data = get_post($id, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug; 
}