<?php
/**
 * Elevation functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Elevation
 */

define( 'elevation', wp_get_theme()->get( 'Name' ));

define( 'ELEVATIONCSS', get_template_directory_uri().'/assets/css/');

define( 'ELEVATIONJS', get_template_directory_uri().'/assets/js/');

define( 'ELEVATION_PATH', get_template_directory_uri());

define('AJAX_URL', esc_url_raw( admin_url('admin-ajax.php')));


if ( ! function_exists( 'elevation_setup' ) ) {
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function elevation_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Elevation, use a find and replace
		 * to change 'elevation' to the name of your theme in all the template files.
		 */
		define('ELEVATION_THEME_DIRECTORY', esc_url(trailingslashit( get_template_directory_uri() )));

		load_theme_textdomain( 'elevation', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		add_theme_support('woocommerce');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'elevation-blog-single', '690', '420', true );
		add_image_size( 'elevation-blog-home', '380', '295', true );
		add_image_size( 'elevation-team-thumbs', '400', '350', true );
		add_image_size( 'elevation-home-causes', '350', '230', true );
		add_image_size( 'elevation-portfolio-gallery', '1170', '660', true );
		add_image_size( 'elevation-home-gallery', '650', '480', true );
		add_image_size( 'elevation-events-image', '472', '192', true );



		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'standard' => esc_html__( 'Standard/Blog Menu', 'elevation' ),
			'home-menu' => esc_html__( 'One Page Menu', 'elevation' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption') );

		/*
		 * Enable support for Post Formats.
		 * See https://developer.wordpress.org/themes/functionality/post-formats/
		 */
		add_theme_support( 'post-formats', array('aside','audio','chat','gallery','image','link','video','quote','status') );


		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'elevation_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );


	}
}
add_action( 'after_setup_theme', 'elevation_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function elevation_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'elevation_content_width', 640 );
}
add_action( 'after_setup_theme', 'elevation_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function elevation_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'elevation' ),
		'id'            => 'blog-sidebar',
		'description'   => esc_html__( 'Add widget on Blog Sidebar', 'elevation' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar', 'elevation' ),
		'id'            => 'footer-sidebar',
		'description'   => esc_html__( 'Add widget on Footer Sidebar', 'elevation' ),
		'before_widget' => '<div class="col-sm-4"><div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'WooCommerce Sidebar', 'elevation' ),
		'id'            => 'woo-sidebar',
		'description'   => esc_html__( 'Add widget on WooCommerce Sidebar', 'elevation' ),
		'before_widget' => '<div class="col-sm-4"><div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

}
add_action( 'widgets_init', 'elevation_widgets_init' );



function elevation_google_fonts_url() {
    $font_url = '';
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'elevation' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Montserrat:400,700,800|Open Sans:400,300,600,700,800|Roboto:300,400,500,700' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}


/**
 * Enqueue scripts and styles.
 */
function elevation_scripts() {

	global $elevation_options, $post_id;

  	if ( ! empty( $elevation_options['google_maps_api_key'] ) ) {
  		$elevation_options['google_maps_api_key'] =  $elevation_options['google_maps_api_key'];
  	} else {
  		$elevation_options['google_maps_api_key'] = '';
  	}


	if(is_admin()){
		wp_enqueue_style( 'dashicons' );
	}

	wp_enqueue_style( 'elevation-style', get_stylesheet_uri() );

	if(!is_admin()){

		if ( is_page() && is_front_page() && is_home() ) {

				//CSS
				wp_enqueue_style( 'bootstrap', ELEVATIONCSS . 'bootstrap.min.css');
				wp_enqueue_style( 'font-awesome', ELEVATIONCSS . 'font-awesome.min.css');
				wp_enqueue_style( 'magnific-popup', ELEVATIONCSS . 'magnific-popup.css');
				wp_enqueue_style( 'owl-carousel', ELEVATIONCSS . 'owl.carousel.css');
				wp_enqueue_style( 'elevation-theme', ELEVATIONCSS . 'theme.css');
				wp_enqueue_style( 'elevation-google-fonts', elevation_google_fonts_url(),  array(), '1.0.0' );
				wp_enqueue_style( 'elevation-responsive', ELEVATIONCSS . 'responsive.css');


				//JS
				wp_enqueue_script( 'elevation-plugins', ELEVATIONJS . 'plugins.js', array('jquery'), '', true );
				wp_enqueue_script( 'vgrid', ELEVATIONJS . 'jquery.vgrid.js', array('jquery'), '', true );
				wp_enqueue_script( 'elevation-functions', ELEVATIONJS . 'functions.js', array('jquery'), '', true );
				wp_enqueue_script( 'counterup', ELEVATIONJS . 'counterup.js', array('jquery'), '', true );
				wp_enqueue_script( 'piechart', ELEVATIONJS . 'piechart.js', array('jquery'), '', true );

		} else {

				//BLOG CSS
				wp_enqueue_style( 'bootstrap', ELEVATIONCSS . 'bootstrap.min.css');
				wp_enqueue_style( 'font-awesome', ELEVATIONCSS . 'font-awesome.min.css');
				wp_enqueue_style( 'magnific-popup', ELEVATIONCSS . 'magnific-popup.css');
				wp_enqueue_style( 'owl-carousel', ELEVATIONCSS . 'owl.carousel.css');
				wp_enqueue_style( 'elevation-theme', ELEVATIONCSS . 'theme.css');
				wp_enqueue_style( 'elevation-google-fonts', elevation_google_fonts_url(),  array(), '1.0.0' );
				wp_enqueue_style( 'elevation-responsive', ELEVATIONCSS . 'responsive.css');
				wp_enqueue_style( 'shop', ELEVATIONCSS . 'shop.css');
				wp_enqueue_style( 'shop-details', ELEVATIONCSS . 'shop-details.css');

				if( isset( $elevation_options[ 'enable_fancybox'])){
					wp_enqueue_style( 'jquery-fancybox', ELEVATION_PATH . '/plugins/fancybox/jquery.fancybox.css' );
					wp_enqueue_script( 'jquery-fancybox', ELEVATION_PATH . '/plugins/fancybox/jquery.fancybox.pack.js', array('jquery'), '', true );
					wp_enqueue_script( 'jquery-fancybox-media', ELEVATION_PATH . '/plugins/fancybox/helpers/jquery.fancybox-media.js', array('jquery'), '', true );
				}

				if( is_singular('events') ){
					wp_register_script( 'googlemaps', 'https://maps.googleapis.com/maps/api/js?key='. $google_maps_key . '&signed_in=true&libraries=places,visualization', array('jquery'), '', true);
					wp_enqueue_script('googlemaps');
				}

	        	//BLOG JS
				wp_enqueue_script( 'elevation-plugins', ELEVATIONJS . 'plugins.js', array('jquery'), '', true );
				wp_enqueue_script( 'elevation-functions', ELEVATIONJS . 'functions.js', array('jquery'), '', true );
		}
	}


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'elevation_scripts' );

/* Required Files */
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/theme_functions.php';
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/quick_styles.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/metabox.php';
require get_template_directory() . '/inc/widgets.php';
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';
require get_template_directory() . '/inc/jetpack.php';
require_once( get_template_directory() . '/admin/admin.php');
require_once get_template_directory()  . '/inc/class-tgm-plugin-activation.php';

/**
 * TGMA
 */
add_action( 'tgmpa_register', 'elevation_register_required_plugins' );

function elevation_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name, slug and required.
     * If the source is NOT from the .org repo, then source is also required.
     */


    $plugins = array(

        // This is an example of how to include a plugin pre-packaged with a theme
    	array(
    		 	'name'     			 => esc_html__( 'Candor Framework', 'elevation' ),
    			'slug'     			 => 'candor-framework',
    			'source'   	 		 => get_template_directory_uri() . '/inc/plugins/candor-framework.zip',
    			'required' 			 => true,
    			'version'            => '1.2.5'
    	),
    	array(
	    		'name'     			 => esc_html__( 'Visual Composer', 'elevation' ),
	    		'slug'     			 => 'js_composer',
	    		'source'   			 => get_template_directory_uri() . '/inc/plugins/js_composer.zip',
	    		'required' 			 => true,
	    		'version' 			 => '5.5.5',
    		),
    	array(
    		 	'name'     			 => esc_html__( 'Revolution Slider', 'elevation' ),
    			'slug'     			 => 'revslider',
    			'source'   			 => get_template_directory_uri() . '/inc/plugins/revslider.zip',
    			'required' 			 => true,
    			'version'            => '5.4'
    		),
    	array(
    		 	'name'     			 => esc_html__( 'Envato Toolkit', 'elevation' ),
    			'slug'     			 => 'envato-market',
    			'source'   			 => get_template_directory_uri() . '/inc/plugins/envato-market.zip',
    			'required' 			 => true,
    			'version'            => ''
    		),
        array(
	        	'name'      		 => esc_html__( 'Contact Form 7', 'elevation' ),
	        	'slug'      		 => 'contact-form-7',
	        	'required'  		 => true,
	        	'force_activation'   => false,
	        ),
        array(
	        	'name'      		 => esc_html__( 'Redux Framework', 'elevation' ),
	        	'slug'      		 => 'redux-framework',
	        	'required'  		 => true,
	        	'force_activation'   => false,
	        ),
        array(
	        	'name'      		 => esc_html__( 'MailChimp for WordPress', 'elevation' ),
	        	'slug'      		 => 'mailchimp-for-wp',
	        	'required'  		 => true,
	        	'force_activation'   => false,
	        ),

    );


    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
	'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
        'strings'           => array(
            'page_title'                                => esc_html__( 'Install Required Plugins', 'elevation' ),
            'menu_title'                                => esc_html__( 'Install Plugins', 'elevation' ),
            'installing'                                => esc_html__( 'Installing Plugin: %s', 'elevation' ), // %1$s = plugin name
            'oops'                                      => esc_html__( 'Something went wrong with the plugin API.', 'elevation' ),
            'notice_can_install_required'               => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ,'elevation' ), // %1$s = plugin name(s)
            'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.','elevation' ), // %1$s = plugin name(s)
            'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','elevation' ), // %1$s = plugin name(s)
            'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','elevation' ), // %1$s = plugin name(s)
            'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','elevation' ), // %1$s = plugin name(s)
            'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','elevation' ), // %1$s = plugin name(s)
            'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','elevation' ), // %1$s = plugin name(s)
            'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','elevation' ), // %1$s = plugin name(s)
            'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'elevation' ),
            'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'elevation' ),
            'return'                                    => esc_html__( 'Return to Required Plugins Installer', 'elevation' ),
            'plugin_activated'                          => esc_html__( 'Plugin activated successfully.', 'elevation' ),
            'complete'                                  => esc_html__( 'All plugins installed and activated successfully. %s', 'elevation' ) // %1$s = dashboard link
        )
    );

    tgmpa( $plugins, $config );

}




/**
 * Init theme options
 * Certain theme options need to be written to the database as soon as the theme is installed.
 * This is either for the enqueues in candor-framework, or to override the default image sizes in WooCommerce.
 * Either way this function is only called when the theme is first activated, de-activating and re-activating the theme will result in these options returning to defaults.
 *
 * @since 1.0.0
 * @author Jewel Theme
 */
if(!( function_exists('elevation_init_theme_options') )){
	/**
	 * Hook in on activation
	 */
	global $pagenow;

	/**
	 * Define image sizes
	 */
	function elevation_init_theme_options() {

		//Candor Framework Options

		$framework_args = array(
			'portfolio_post_type'   => '1',
			'team_post_type'        => '1',
			'testimonial_post_type' => '1',
			'causes_post_type' 		=> '1',
			'events_post_type' 		=> '1',
			'cmbmetaboxes'          => '1',
			'rwmbmetabox'           => '1',
			'paypal_donation'       => '1',

			'elevation_widgets'     => '1',
			'elevation_vc_blocks'   => '1',
			'elevation_shortcodes'  => '1',
		);
		update_option('candor_framework_options', $framework_args);

		//Added Demo Importer

		$candor_framework_options = 'candor_framework_options' ;

		$framework_args1 = array(
			'portfolio_post_type'   => '1',
			'team_post_type'        => '1',
			'testimonial_post_type' => '1',
			'causes_post_type' 		=> '1',
			'events_post_type' 		=> '1',
			'cmbmetaboxes'          => '1',
			'rwmbmetabox'           => '1',
			'paypal_donation'       => '1',
			'demo_importer'       	=> '1',

			'elevation_widgets'     => '1',
			'elevation_vc_blocks'   => '1',
			'elevation_shortcodes'  => '1',
		);

		if ( get_option( $candor_framework_options ) !== false ) {
    		// The option already exists, so we just update it.
			update_option( $candor_framework_options, $framework_args1 );
		} else {
		    // The option hasn't been added yet. We'll add it with $autoload set to 'no'.
			$deprecated = null;
			$autoload = 'no';
			add_option( $candor_framework_options, $framework_args1, $deprecated, $autoload );
		}

	}

	/**
	 * Only call this action when we first activate the theme.
	 */
	if (
		is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ||
		is_admin() && isset( $_GET['theme'] ) && $pagenow == 'customize.php'
	){
		add_action( 'init', 'elevation_init_theme_options', 1 );
	}
}




/**
 * Load Theme Support on Init
 */
if(!( function_exists('elevation_add_editor_styles') )){
	function elevation_add_editor_styles() {
		/**
		 * Add WP Editor Styling
		 */
	    add_editor_style( 'inc/editor-style.css' );

		/**
		 * Set the content width in pixels, based on the theme's design and stylesheet.
		 *
		 * Priority 0 to make it available to lower priority callbacks.
		 *
		 * @global int $content_width
		 */
	    global $content_width;
	    if ( ! isset( $content_width ) ) $content_width = 1170;


	    //Remove post types from portfolio posts
	    remove_post_type_support('portfolio','post-formats');
	    remove_post_type_support('portfolio','comments');

	    add_post_type_support('testimonial','thumbnail');

	}
	add_action( 'init', 'elevation_add_editor_styles', 10 );
}



/**
 * If visual composer is installed, grab all required files.
 * Wrapped in an if statement so that we can save parsing this if visual composer is not used.
 * It's a speed boost basically.
 */
if( function_exists('vc_set_as_theme') ){
	require get_template_directory() . '/vc_init.php';
}




/* For adding custom field to gallery popup */
function elevation_add_image_attachment_clients_url_to_edit($form_fields, $post)
{

    $form_fields["partners_url"] = array(
        "label" => esc_html__("Website URL", 'elevation'),
        "input" => "text", // this is default if "input" is omitted
        "value" => get_post_meta($post->ID, "_partners_url", true),
        "helps" => esc_html__("Website Address here", 'elevation'),
    );
    unset($form_fields['post_content']);
    return $form_fields;
}

add_filter("attachment_fields_to_edit", "elevation_add_image_attachment_clients_url_to_edit", null, 2);


//Add Attachment Images Client URL
function elevation_add_image_attachment_clients_url_to_save($post, $attachment){

    if (isset($attachment['partners_url'])) {
        update_post_meta($post['ID'], '_partners_url', $attachment['partners_url']);
    }
    return $post;
}

add_filter("attachment_fields_to_save", "elevation_add_image_attachment_clients_url_to_save", null, 2);






function removeDemoModeLink() { // Be sure to rename this function to something more unique
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );
    }
}
add_action('init', 'removeDemoModeLink');



//----------------------------------------------------------------------
// Remove Redux Framework NewsFlash
//----------------------------------------------------------------------
if ( ! class_exists( 'reduxNewsflash' ) ):
    class reduxNewsflash {
        public function __construct( $parent, $params ) {}
    }
endif;
//----------------------------------------------------------------------
// Remove Redux Framework Ads


//----------------------------------------------------------------------
add_filter( 'redux/elevaiton_options/aURL_filter', '__return_empty_string' );


if(!( function_exists('elevation_wpml_cleaner') )){
	function elevation_wpml_cleaner($items,$args) {

	    if($args->theme_location == 'standard'){

	        if (function_exists('icl_get_languages')) {
	            $items = str_replace('sub-menu', 'dropdown-menu', $items);
	            $items = str_replace('onclick="return false"', 'class="dropdown-toggle js-activated"', $items);
	            $items = str_replace('menu-item-language', 'menu-item-language dropdown', $items);
	        }

	        return $items;
	    }
	    else
	        return $items;
	}
}
add_filter( 'wp_nav_menu_items', 'elevation_wpml_cleaner', 20,2 );




//----------------------------------------------------------------------
// Remove Redux Framework NewsFlash
//----------------------------------------------------------------------
if ( ! class_exists( 'reduxNewsflash' ) ):
    class reduxNewsflash {
        public function __construct( $parent, $params ) {}
    }
endif;
//----------------------------------------------------------------------
// Remove Redux Framework Ads
//----------------------------------------------------------------------
add_filter( 'redux/elevaiton_options/aURL_filter', '__return_empty_string' );



function elevation_custom_unixtimesamp ( $post_id ) {
    if ( get_post_type( $post_id ) == 'events' ) {
    $startdate = get_post_meta($post_id, '_elevation_event_date', true);

        if($startdate) {
            $dateparts = explode('/', $startdate);
            $newdate1 = strtotime(date('d.m.Y H:i:s', strtotime($dateparts[1].'/'.$dateparts[0].'/'.$dateparts[2])));
            update_post_meta($post_id, 'unixstartdate', $newdate1  );
        }
    }
}
add_action( 'save_post', 'elevation_custom_unixtimesamp', 100, 2);