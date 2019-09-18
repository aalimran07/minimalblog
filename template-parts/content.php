<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package minimalblog
 */

$getalignment = get_theme_mod( 'article_alignment', 'left' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'minimalblog-standard-post' ); ?>>
	<div class="row text-<?php echo esc_attr( $getalignment );?>">
		<div class="col-md-12">
			<?php if (has_post_thumbnail()):?>
			<div class="minimalblog-post-thumbnail">
				<?php minimalblog_post_thumbnail(); ?>
			</div>
			<?php
			else: 
				echo '<div class="no-post-thumbnail"></div>';
			endif;
			 ?>
		</div>
		<div class="col-md-12">
			<div class="minimalblog-entry-content">
				<div class="post-title">
					<?php
					$get_blog_layout = get_theme_mod('blog_layout');
					$titletag = 'h2';
					if ('grid' == $get_blog_layout){
						$titletag = 'h3';
					} ?>
					<a href="<?php the_permalink(); ?>"><<?php echo esc_attr($titletag);?>><?php the_title(); ?></<?php echo esc_attr($titletag);?>></a>
				</div>
				<div class="blog-meta">
					<ul>
						<li><span class="fa fa-calendar"></span> <?php minimalblog_posted_on(); ?></li>
						<li><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>"><span class="fa fa-user"></span> <?php echo esc_html( get_the_author() ); ?></a></li>
						<?php  if ('list' == $get_blog_layout): ?>
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
					<?php endif; ?>
					</ul>
				</div>
				<div class="minimalblog-excerpt">
					<?php
					$getexerpt = get_theme_mod( 'excerpt_length', 200 );
					echo esc_html(minimalblog_get_excerpt($getexerpt));
					?>
				</div>
				<div class="readmore">
					<?php 
					$get_read_more_text = get_theme_mod( 'readmore_text', __( 'Read More', 'minimalblog' ) );
					 ?>
					<a href="<?php the_permalink(); ?>"><span class="fa fa-angle-right"></span><?php echo esc_html($get_read_more_text); ?></a>
				</div>
			</div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
