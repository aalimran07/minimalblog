<?php
/**
 * minimalblog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package minimalblog
 */

if ( ! function_exists( 'minimalblog_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function minimalblog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on minimalblog, use a find and replace
		 * to change 'minimalblog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'minimalblog', get_template_directory() . '/languages' );
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
		add_image_size( 'minimalblog-blog-thumb', 600, 800, true );
		add_image_size( 'minimalblog-popular-post', 270, 215, true );
		add_image_size( 'minimalblog-slider-image', 238, 238, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main-menu' => esc_html__( 'Primary', 'minimalblog' ),
				'footer-menu' => esc_html__( 'Footer Menu', 'minimalblog' ),
			)
		);
		add_theme_support( 'woocommerce' );
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
			)
		);
		add_theme_support( 
			'post-formats',
			array( 
				'aside',
				'chat',
				'gallery',
				'image',
				'link',
				'quote',
				'status',
				'video',
				'audio'
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters(
				'minimalblog_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		// Add theme support for selective refresh for widgets.
		add_editor_style( 'css/bootstrap.css' );
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
add_action( 'after_setup_theme', 'minimalblog_setup' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function minimalblog_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'minimalblog_content_width', 640 );
}
add_action( 'after_setup_theme', 'minimalblog_content_width', 0 );
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function minimalblog_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'minimalblog' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'minimalblog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="title-parent"><h5 class="widget-title">',
			'after_title'   => '</h2></div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'minimalblog' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'minimalblog' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h5>',
			'after_title'   => '</h4></div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'minimalblog' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'minimalblog' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h5>',
			'after_title'   => '</h4></div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3', 'minimalblog' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'minimalblog' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h5>',
			'after_title'   => '</h4></div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 4', 'minimalblog' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add widgets here.', 'minimalblog' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h5>',
			'after_title'   => '</h4></div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'WooComerce Sidebar', 'minimalblog' ),
			'id'            => 'woocommerce-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'minimalblog' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h5>',
			'after_title'   => '</h4></div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Top', 'minimalblog' ),
			'id'            => 'footer-top',
			'description'   => esc_html__( 'Add widgets here.', 'minimalblog' ),
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h5>',
			'after_title'   => '</h4></div>',
		)
	);
}
add_action( 'widgets_init', 'minimalblog_widgets_init' );

if ( ! function_exists( 'minimalblog_fonts_url' ) ) :
	/**
	 * Register Google fonts for Twenty Sixteen.
	 *
	 * Create your own minimalblog_fonts_url() function to override in a child theme.
	 *
	 * @since Twenty Sixteen 1.0
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function minimalblog_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Lato: on or off', 'minimalblog' ) ) {
			$fonts[] = 'Lato:300,400,700,900';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg(
				array(
					'family' => urlencode( implode( '|', $fonts ) ),
					'subset' => urlencode( $subsets ),
				),
				'https://fonts.googleapis.com/css'
			);
		}

		return $fonts_url;
	}
endif;

/**
 * Enqueue scripts and styles.
 */
function minimalblog_scripts() {

	wp_enqueue_style( 'minimalblog_fonts', minimalblog_fonts_url() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css' );
	wp_enqueue_style( 'minimalblog-style', get_stylesheet_uri() );
	wp_enqueue_style( 'stellarnav', get_template_directory_uri() . '/css/stellarnav.css' );
	wp_enqueue_style( 'minimalblog-responsive', get_template_directory_uri() . '/css/responsive.css' );
	//Fonts
	$headings_font = esc_html(get_theme_mod('minimalblog_headings_fonts'));
	$body_font = esc_html(get_theme_mod('minimalblog_body_fonts'));
	$body_font_size = esc_html(get_theme_mod('minimalblog_body_fonts_size'));
	$body_font_weight = esc_html(get_theme_mod('minimalblog_body_fonts_weight'));
	$body_font_line_height = esc_html(get_theme_mod('minimalblog_body_fonts_line_height'));
	$heading_font_pieces = '0';
	$body_font_pieces = '0';
	if ( $headings_font ) {
		$heading_font_pieces = explode(":", $headings_font);
	}
	if ( $body_font ) {
		$body_font_pieces = explode(":", $body_font);
	}
	//Output all the style
	$getprimarycolor = get_theme_mod( 'base_color' );
	$primarycolor = (!empty($getprimarycolor) ? $getprimarycolor : '#ff9000');
	$marginbottom = '50px';
	$paddingbototm = '20px';
	$contentarea_padding = '50px';
	$minimalblog_single_mb = '20px';
	$menucolor = get_theme_mod( 'menu_color_main', '#000000' );
	$menucolorhover = get_theme_mod( 'menu_color_hover', '#ff9000' );
	if (is_page_template( 'blankpage.php' ) || is_page_template( 'fullwidth.php' )) {
		$marginbottom = 0;
		$paddingbototm = 0;
		$contentarea_padding = 0;
		$minimalblog_single_mb = 0;
	}
	$data = '

	@media only screen and (min-width: 768px) {
		.stellarnav>ul>li>a, .stellarnav>ul>li>a:after, .stellarnav>ul>li.current-menu-item>a:after, .stellarnav>ul>li.current_page_item>a:after{
	    	color: '.$menucolor.' !important;
		}
		.stellarnav>ul>li>a:hover, .stellarnav>ul>li>a:hover:after, .stellarnav>ul>li.current-menu-item>a:hover:after, .stellarnav>ul>li.current_page_item>a:hover:after{
	    	color: '.$menucolorhover.' !important;
		}
	}
	
	.minimalblog-credit {
	    position: absolute !important;
	    left: 50% !important;
	    visibility: visible !important;
	    width: 15px !important;
	    height: 15px !important;
	    opacity: 1 !important;
	    z-index: 1 !important;
	}
	.minimalblog-credit span {
	    font-size: 0;
	}
	.minimalblog-credit a, .minimalblog-credit a:hover {
	    color: #ff9000 ;
	    cursor: pointer ;
	    opacity: 1 ;

	}
	body.border_and_box_shadow_hide .footer-area.section-padding, body.border_and_box_shadow_hide footer#colophon, body.border_and_box_shadow_hide .widget, body.border_and_box_shadow_hide .blog-post-section article, body.border_and_box_shadow_hide .archive-page-section article, body.border_and_box_shadow_hide .menu-area, body.border_and_box_shadow_hide .site-topbar-area {
	    border: 0 !important;
	    box-shadow: none !important;
	}
	.readmore a,.btn.btn-warning, input[type="submit"], button[type="submit"], span.edit-link a, .comment-form button.btn.btn-primary, .banner-button a, .tagcloud a:hover, table#wp-calendar #today, ul.pagination li .page-numbers, .woocommerce ul.products li.product .button, .woocommerce div.product .woocommerce-tabs ul.tabs li.active, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span, .woocommerce span.onsale{
		background-color: '.esc_attr( $primarycolor ).';
	}
	.blog-meta ul li span.fa, .static_icon a, .site-info a, .scrooltotop a, .stellarnav.light ul li a:hover, .social-link-top a:hover, .footer-menu ul li a:hover, .stellarnav.light ul li a:hover:after, a:hover, a:focus, a:active, .post-title a:hover h2, .post-title a:hover h4, .stellarnav.light li.current_page_item a, li.current_page_item a, .author-social-link a, .post-title a:hover h3, .woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price{
		color: '.esc_attr( $primarycolor ).';
	}
	input[type="submit"], button[type="submit"], .title-parent, blockquote{
		border-color: '.esc_attr( $primarycolor ).';
	}
	body, button, input, select, textarea { 
		font-family: ' . $body_font_pieces[0] .'; 
		font-size: '.$body_font_size.'px;
		font-weight: '.$body_font_weight.';
		line-height: '.$body_font_line_height.'px;
	}
	h1, h2, h3, h4, h5, h6 { font-family: '.$heading_font_pieces[0].';}
	header.site-header{
		margin-bottom: '.$marginbottom.';
		padding-bottom: '.$paddingbototm.';
	}
	.content-area{
		padding-bottom: '.$contentarea_padding.';
	}
	.minimalblog-single-page{
		margin-bottom: '.$minimalblog_single_mb.';
	}
	
	';

	$stickyheader = get_theme_mod( 'sticky_header', false );

	if (true == $stickyheader) {
		$data .= '
			.menu-area.sticky-menu {
			    background: #fff;
			    position: fixed;
			    width: 100%;
			    left: 0;
			    top: 0;
			    z-index: 55;
			    transition: .6s;
			}
			.site.boxlayout .menu-area.sticky-menu {
			    width: calc(100% - 200px);
			    left: 100px;
			}
		';
	}

	wp_add_inline_style( 'minimalblog-style', $data );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ), '4.0.1', true );
	wp_enqueue_script( 'stellarnav', get_template_directory_uri() . '/js/stellarnav.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'masonry-pkgd', get_template_directory_uri() . '/js/masonry.pkgd.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'minimalblog-active', get_template_directory_uri() . '/js/active.js', array( 'jquery' ), '1.0', true );

	$slideritem = get_theme_mod( 'sub_featured_slide_item', 3 );
	$mainslideritem = get_theme_mod( 'featured_slider_item', 4 );
	$mainauto_play = get_theme_mod( 'featured_slider_auto_play', false );
	$subauto_play = get_theme_mod( 'sub_featured_slider_auto_play', false );
	$main_slider_auto_play_true = 'false';
	$sub_slider_auto_play_true = 'false';
	if ($mainauto_play == true) {
		$main_slider_auto_play_true = 'true';
	}
	if ($subauto_play == true) {
		$sub_slider_auto_play_true = 'true';
	}
	$customscript = '
	(function($) {
    "use strict";
	$(\'.active-subfeatured-slider\').owlCarousel({
        items: '.$slideritem.',
        nav: true,
        autoplay: '.$sub_slider_auto_play_true.',
        navText: ["<i class=\'fa fa-angle-left\'></i>", "<i class=\'fa fa-angle-right\'></i>"],
        smartSpeed: 1000,
        margin: 30,
        rewind: true,
        dots: false,
        responsive : {
                
                0 : {
                    items: 1,
                },
                // breakpoint from 480 up
                480 : {
                   items: 1,
                   margin: 15
                },
                // breakpoint from 768 up
                768 : {
                   items: 1,
                },
                992 : {
                   items: '.$slideritem.',
                }
            }

    });
    $(\'.featured-main-slider\').owlCarousel({
        items: '.$mainslideritem.',
        nav: true,
        autoplay: '.$main_slider_auto_play_true.',
        navText: ["<i class=\'fa fa-angle-left\'></i>", "<i class=\'fa fa-angle-right\'></i>"],
        smartSpeed: 1000,
        margin: 30,
        rewind: true,
        dots: false,
        responsive : {
                
                0 : {
                    items: 1,
                },
                // breakpoint from 480 up
                480 : {
                   items: 1,
                   margin: 15
                },
                // breakpoint from 768 up
                768 : {
                   items: 2,
                },
                992 : {
                   items: '.$mainslideritem.',
                }
            }

    });
    })(jQuery);
	';

	wp_add_inline_script( 'minimalblog-active', $customscript, 'after' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'customize_controls_enqueue_scripts', 'minimalblog_admin_enqueue_scripts' );

function minimalblog_admin_enqueue_scripts(){
	wp_enqueue_style( 'minimalblog-admin', get_theme_file_uri( 'css/admin.css' ) );
	wp_enqueue_script( 'minimalblog-admin', get_theme_file_uri( 'js/admin.js' ), array('jquery'), time(), true);
}

add_action( 'wp_enqueue_scripts', 'minimalblog_scripts' );
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
 * minimalblog Comment Template.
 */
require get_template_directory() . '/inc/minimalblog-comment-template.php';

function minimalblog_sanitize_checkbox( $checked ) {
		// returns true if checkbox is checked
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
function minimalblog_sanitize_radio( $input, $setting ) {
	$input = sanitize_key( $input );
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
function minimalblog_sanitize_select( $input, $setting ) {
	
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function minimalblog_get_categories(){
	$terms_array = array();
	$categories = get_terms(array(
		'taxonomy' => 'category',
	));

	foreach ($categories as $category) {
		$terms_array[$category->term_id] = $category->name;
	}
	return $terms_array;
}


function minimalblog_category_sanitize( $input ) {
	$valid = minimalblog_get_categories();

	foreach ( $input as $value ) {
		if ( ! array_key_exists( $value, $valid ) ) {
			return array();
		}
	}

	return $input;
}


function minimalblog_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );
	
	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

function minimalblog_sanitize_image( $image, $setting ) {
	/*
	 * Array of valid image file types.
	 *
	 * The array includes image mime types that are included in wp_get_mime_types()
	 */
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
	// Return an array with file extension and mime_type.
    $file = wp_check_filetype( $image, $mimes );
	// If $image has a valid mime_type, return it; otherwise, return the default.
    return ( $file['ext'] ? $image : $setting->default );
}


//Sanitizes Fonts
function minimalblog_sanitize_fonts( $input ) {
	$valid = array(
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
	);
	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

function minimalblog_fonts() {
	$headings_font = esc_html(get_theme_mod('minimalblog_headings_fonts'));
	$body_font = esc_html(get_theme_mod('minimalblog_body_fonts'));
	if( $headings_font ) {
		wp_enqueue_style( 'minimalblog-headings-fonts', '//fonts.googleapis.com/css?family='. $headings_font );
	} else {
		wp_enqueue_style( 'minimalblog-source-sans', '//fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
	}
	if( $body_font ) {
		wp_enqueue_style( 'minimalblog-body-fonts', '//fonts.googleapis.com/css?family='. $body_font );
	} else {
		wp_enqueue_style( 'minimalblog-source-body', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,400italic,700,600');
	}
}
add_action( 'wp_enqueue_scripts', 'minimalblog_fonts' );

/**
 * Checkout Fields
 */
require get_template_directory() . '/inc/checkout-fields.php';


/**
 * Checkout Fields
 */
require get_template_directory() . '/inc/recent-post.php';



/*update to pro link*/
require_once( trailingslashit( get_template_directory() ) . 'minimalblog-pro/class-customize.php' );

