<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package minimalblog
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
	$getheaderlayout = get_theme_mod( 'header_layout', 'one' );
	if ($getheaderlayout != 'four') :
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
	<?php endif; ?>
	<div class="entry-content">
		<?php if (has_post_thumbnail()) :?>
		<div class="post-thumbnail">
			<?php minimalblog_post_thumbnail(); ?>
		</div>
		<?php endif; ?>
		<div class="blog-meta">
			<ul>
				<li><span class="fa fa-calendar"></span> <?php minimalblog_posted_on(); ?></li>
				<li><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>"><span class="fa fa-user"></span> <?php echo esc_html( get_the_author() ); ?></a></li>
				<li><span class="fa fa-comment"></span> <?php minimalblog_comment_popuplink(); ?></li>
				<li><span class="fa fa-list"></span> 
				<?php
				$categories_list = get_the_category_list( esc_html__( ', ', 'minimalblog' ) );
				if ( $categories_list ) {
					/* translators: 1: list of categories. */
					printf( '<span class="cat-links">' . __( 'Posted in %1$s', 'minimalblog' ) . '</span>', $categories_list ); // WPCS: XSS OK.
				}
				?>
				</li>
			</ul>
		</div>
		<?php
		the_content();
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'minimalblog' ),
				'after'  => '</div>',
			)
		);
		if (class_exists('A2A_SHARE_SAVE_Widget')):
		?>
		<div class="social-sharea">
			<?php echo wp_kses_post(do_shortcode( '[addtoany]' )); ?>
		</div>
		<?php endif; ?>
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

<div class="post-author">
	<div class="author-image">
		<?php
		echo get_avatar( get_the_author_meta( 'ID' ), 96, '', '', null );
		?>
	</div>
	<div class="author-about">
		<h4><?php echo get_the_author_meta( 'nickname' ); ?></h4>
		<p><?php echo get_the_author_meta( 'description' ); ?></p>
		<div class="author-social-link">
		
		</div>
	</div>
</div>
