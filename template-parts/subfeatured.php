<?php
/**
 * minimalblog Popular Post Section
 *
 * @package minimalblog
 */

$get_featured_categories = get_theme_mod( 'sub_featured_categories' );
$featured_categories = '';
if (!empty($get_featured_categories)) {
	$featured_categories = implode(',', $get_featured_categories);
}
$getpostcount = get_theme_mod( 'sub_featured_post_per_page', 3 );
$get_read_more_text = get_theme_mod( 'sub_featured_read_more_text', __( 'Read More', 'minimalblog' ) );


$post_args = array(
	'posts_per_page' => $getpostcount,
	'post_type'      => 'post',
	'cat' => $featured_categories,
	'order'          => 'DESC',
	'ignore_sticky_posts' => 1,
);
$postquery = new WP_Query( $post_args );
if ($postquery->have_posts()):
?>

<div class="minimalblog_popular_post_area">
	<div class="container">
		<div class="active-subfeatured-slider owl-carousel">
			<?php		
			while ( $postquery->have_posts() ) :
					$postquery->the_post();
				?>
			
				<div class="single-popular-post">
					<a href="<?php the_permalink(); ?>">
						<?php 
						if (has_post_thumbnail()):
							the_post_thumbnail( 'full' );
						else:
							echo '<div class="no-post-thumbnail"></div>';
						endif;
						?>
					</a>
					<div class="popular-post-content">
						<a href="<?php the_permalink();?>" class="btn btn-warning"><?php echo esc_html( $get_read_more_text ); ?></a>
					</div>
				</div>
			
		<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</div>
<?php endif; ?>