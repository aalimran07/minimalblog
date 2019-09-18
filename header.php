<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package minimalblog
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'minimalblog' ); ?></a>
	<?php 
	if (get_theme_mod('prealoader_on_off', 'false') == true) {
		?>
			<div id="preloader" style="background-image: url(<?php echo esc_url(get_theme_mod('prealoader_image'));?>);"></div>
		<?php
	}
	$getlayout = get_theme_mod( 'minimalblog_body_layout', 'fulid' );
	$class = '';
	if ('box' == $getlayout) {
		$class = ' boxlayout';
	}
	 ?>
<div id="page" class="site<?php echo esc_attr( $class );?>">
	
<?php
$getheaderlayout = get_theme_mod( 'header_layout', 'one' );
get_template_part( 'template-parts/header', $getheaderlayout );
 ?>



	<div id="content" class="site-content">