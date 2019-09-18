<header class="site-header header-four">
	<nav class="header-four-menu-area sticky-top">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="site-branding-area">
					<?php
						if ( has_custom_logo() ) :
							the_custom_logo();
						endif;
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
					
						$minimalblog_description = get_bloginfo( 'description', 'display' );
						if ( $minimalblog_description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo esc_html( $minimalblog_description ); /* WPCS: xss ok. */ ?></p>
							<?php
						endif;
						?>
					</div>
				</div>
				<div class="col-md-8 text-center">
					<div class="stellarnav">
						<?php
						wp_nav_menu(
							array(
								'theme_location'  => 'main-menu',
								'container' => 'ul',
							)
						);
						?>
					</div>
				</div>
				<div class="col-md-1 text-right">
					<div class="search-popup">
						<a href="#"><i class="fa fa-search"></i></a>
					</div>
				</div>
			</div>
		</div>
	</nav>

<?php 
$page_main_title = wp_title( '', false );
if (is_search()) {
	$page_main_title = sprintf( esc_html__( 'Search Results for: %s', 'minimalblog' ), '<span>' . get_search_query() . '</span>' );
}
?>
<div class="header-four-banner-area" style="background-image: url(<?php echo esc_url( get_header_image() );?>);">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="page-main-title">
					<h1><?php echo wp_kses_post( $page_main_title ); ?></h1>
				</div>
			</div>
		</div>
	</div>
</div>
</header>


 <div class="searchform-area">
 	<div class="search-close">
 		<i class="fa fa-times"></i>
 	</div>
 	<div class="search-form-inner">
 	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
	</div>
 </div>