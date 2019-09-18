<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package minimalblog
 */


?>
<article id="post-<?php the_ID(); ?>" <?php post_class('minimalblog-single-page'); ?>>
	<?php
$getheaderlayout = get_theme_mod( 'header_layout', 'one' );
$default_header = true;
if (!is_page_template( 'blankpage.php' ) || !is_page_template( 'fullwidth.php' ) || $getheaderlayout == 'four' ) {
	$default_header = false;
}else{
	$default_header = true;
}

	if ($default_header == true) :
	 ?>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<nav>
	        <div class="breadcrumb">
	            <?php
	            if(function_exists('bcn_display') && !is_front_page()) {
	                    bcn_display();
	                }
	            ?>
	        </div>
	    </nav>
	</header><!-- .entry-header -->
	<?php endif;
	$noboxshadow = ' noboxshadow';
	if (!is_page_template( 'blankpage.php' ) && !is_page_template( 'fullwidth.php' )) {
		$noboxshadow = '';
	}
	?>
	<div class="entry-content<?php echo esc_attr( $noboxshadow );?>">
		<?php
		if (!is_page_template( 'blankpage.php' ) && !is_page_template( 'fullwidth.php' )):
			if (has_post_thumbnail()) :
				?>
			<div class="post-thumbnail">
				<?php minimalblog_post_thumbnail(); ?>
			</div>
			<?php
			endif;
		endif;
		the_content();
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'minimalblog' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'minimalblog' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
