<?php
/**
 * OnePress JUMP functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package OnePress JUMP
 */

function onepress_jump_setup() 
{
	remove_image_size( 'onepress-blog-small' );
	remove_image_size( 'onepress-small' );
	remove_image_size( 'onepress-medium' );
}
add_action( 'after_setup_theme', 'onepress_jump_setup', 50 );
 
function onepress_jump_enqueue_styles()
{
	$cdnjsPath = 'https://cdnjs.cloudflare.com/ajax/libs/';

	wp_dequeue_style( 'onepress-animate' );
	wp_dequeue_style( 'onepress-fa' );
	wp_dequeue_style( 'onepress-bootstrap' );
	wp_dequeue_style( 'onepress-style' );
	wp_dequeue_style( 'onepress-gallery-lightgallery' );
	wp_dequeue_script( 'onepress-gallery-masonry' );
	wp_dequeue_script( 'onepress-gallery-justified' );
	wp_dequeue_script( 'onepress-gallery-carousel' );
	wp_dequeue_script( 'onepress-js-bootstrap' );

	wp_enqueue_style( 'jump-style', get_stylesheet_directory_uri() . 
		'/style.css', array(), wp_get_theme() -> get( 'Version' ) );
	wp_enqueue_style( 'jump-animate', $cdnjsPath . 
		'animate.css/3.5.2/animate.min.css', array(), null );
	wp_enqueue_style( 'jump-fa', $cdnjsPath . 
		'font-awesome/4.7.0/css/font-awesome.min.css', array(), null );
	wp_enqueue_style( 'jump-lightgallery', $cdnjsPath . 
		'lightgallery/1.4.0/css/lightgallery.min.css', array(), null );
	wp_enqueue_style( 'jump-bootstrap', $cdnjsPath . 
		'twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css', array(), null );
	wp_enqueue_script( 'jump-js-bootstrap', $cdnjsPath . 
		'twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js', array(), null );

	if( function_exists( 'is_woocommerce' ) && is_woocommerce() ) 
	{
		return;
	}

	if( get_theme_mod( 'onepress_gallery_disable' ) ==  1 && 
		!is_customize_preview() ) 
	{
		return;
	}

	if( is_customize_preview() ) 
	{
		wp_enqueue_script( 'jump-masonry', $cdnjsPath . 
			'jquery.isotope/3.0.4/isotope.pkgd.min.js', array(), null );
		wp_enqueue_script( 'jump-justified', $cdnjsPath . 
			'justifiedGallery/3.6.3/js/jquery.justifiedGallery.min.js', 
			array(), null );
		wp_enqueue_script( 'jump-carousel', $cdnjsPath . 
			'OwlCarousel2/2.2.1/owl.carousel.min.js', array(), null );
		 return;
	}
	
	switch( get_theme_mod( 'onepress_gallery_display', 'grid' ) ) 
	{
		case 'masonry':
			wp_enqueue_script( 'jump-masonry', $cdnjsPath . 
				'jquery.isotope/3.0.4/isotope.pkgd.min.js', array(), null );
			break;

		case 'justified':
			wp_enqueue_script( 'jump-justified', $cdnjsPath . 
				'justifiedGallery/3.6.3/js/jquery.justifiedGallery.min.js', 
				array(), null );
			break;

		case 'slider':
		case 'carousel':
			wp_enqueue_script( 'jump-carousel', $cdnjsPath . 
				'OwlCarousel2/2.2.1/owl.carousel.min.js', array(), null );
			break;
	}
}

add_action( 'wp_enqueue_scripts', 'onepress_jump_enqueue_styles', 50 );

function onepressjump_widgets_init() 
{
	register_sidebar( array(
		'name'          => 'Team 4 Column',
		'id'            => 'team-widget-4-col',
		'description'   => '',
		'before_widget' => '<div class="team-member col-lg-4 wow fadeInDownBig">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Team 3 Column',
		'id'            => 'team-widget-3-col',
		'description'   => '',
		'before_widget' => '<div class="team-member col-lg-3 wow fadeInDownBig">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Team 2 Column',
		'id'            => 'team-widget-2-col',
		'description'   => '',
		'before_widget' => '<div class="team-member col-lg-2 wow fadeInUpBig">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'onepress_jump_widgets_init' );


if( !function_exists( 'onepress_site_header' ) )
{
	/**
	* Display site header
	*/
	function onepress_site_header()
	{
?>
	<header id="masthead" class="site-header" role="banner">
		<div class="container">
			<div class="site-branding">
<?php
				onepress_site_logo();
?>
			</div>
			<!-- .site-branding -->
		</div>
	</header><!-- #masthead -->
<?php
	}
}

?>