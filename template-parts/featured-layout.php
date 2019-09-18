<?php
/**
 * minimalblog Featured Layout One
 *
 * @package minimalblog
 */

$get_featured_categories = get_theme_mod( 'featured_categories' );
$featured_categories = '';
if (!empty($get_featured_categories)) {
	$featured_categories = implode(',', $get_featured_categories);
}
$getpostcount = get_theme_mod( 'featured_post_per_page', 4 );
$fulid = get_theme_mod( 'featured_section_fulid', false );
$container_class = ($fulid == true ? 'container-fuild' : 'container');
$get_read_more_text = get_theme_mod( 'featured_read_more_text', __( 'Read More', 'minimalblog' ) );

?>

<div class="featured-area">
	<div class="<?php echo esc_attr( $container_class );?>">
		<div class="featured-main-slider owl-carousel">
			<?php
				$featuredblocks = new WP_Query(
					array(
						'post_type' => array( 'post' ),
						'posts_per_page'    => $getpostcount,
						'cat' => $featured_categories,
						'ignore_sticky_posts' => 1
					)
				);
				while ( $featuredblocks->have_posts() ) :
					$featuredblocks->the_post();
					?>
					<div class="featured-slider-item">
						<div class="blog-single-featured-block">
							<a href="<?php the_permalink(); ?>">
								<?php if (has_post_thumbnail()): ?>
								<div class="post-thumnail" style="background-image: url(<?php the_post_thumbnail_url( 'minimalblog-blog-thumb' ); ?>);">						
								</div>
								<?php else: 
									echo '<div class="no-post-thumbnail"></div>';
								endif;
								 ?>
							</a>
							<div class="post-description">
								<div class="post-date">
									<?php minimalblog_time(); ?>
									
								</div>
								<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
								<a href="<?php the_permalink(); ?>" class="btn btn-warning"><?php echo esc_html( $get_read_more_text ); ?> <span class="fa fa-long-arrow-right"></span> </a>
							</div>
						</div>
					</div>
			<?php endwhile; ?>
		</div>
	</div>
</div>
