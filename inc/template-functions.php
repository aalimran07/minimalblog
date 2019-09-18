<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package minimalblog
 */
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function minimalblog_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	$classes[] = 'preloader-wrapper';
	$get_border_box_shadow = get_theme_mod( 'border_box_shadow_show_hide', true );

	if (false == $get_border_box_shadow) {
		$classes[] = 'border_and_box_shadow_hide';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}
	return $classes;
}
add_filter( 'body_class', 'minimalblog_body_classes' );
/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function minimalblog_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'minimalblog_pingback_header' );


if ( ! function_exists( 'minimalblog_comment_list' ) ) :
	/**
	 * Template for comments and pingbacks.
	 *
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 *
	 * @since Shape 1.0
	 */
	function minimalblog_comment_list( $comment, $args, $depth ) {

		extract( $args, EXTR_SKIP );

		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
		?>
  <<?php echo esc_attr( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID(); ?>">
		<?php if ( 'div' == $args['style'] ) : ?>
  <div id="div-comment-<?php comment_ID(); ?>" class="comment-body review-list">
	<?php endif; ?>
	<div class="single-comment">
		<div class="commenter-image">
			<?php
			if ( 0 != $args['avatar_size'] ) {
				echo get_avatar( $comment, $args['avatar_size'] );}
			?>
		</div>
		<div class="commnenter-details">
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php esc_html_e( 'Your comment is awaiting moderation.', 'minimalblog' ); ?></em>
			<br />
		<?php endif; ?>
			<h4><?php printf( wp_kses_post( '%s', 'minimalblog' ), sprintf( '%s', get_comment_author_link() ) ); ?></h4>
			<div class="comment-time">
				<p><time datetime="<?php comment_time( 'c' ); ?>">
								<?php
									/* translators: 1: comment date, 2: comment time */
									printf( wp_kses_post( '%1$s at %2$s', 'minimalblog' ), get_comment_date( '', $comment ), get_comment_time() );
								?>
							</time></p>
			</div>
				<?php comment_text(); ?>
				<?php
				comment_reply_link(
					array_merge(
						$args,
						array(
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'before'    => '<div class="reply">',
							'after'     => '</div>',
						)
					)
				);
				?>
		</div>
	</div>
		<?php if ( 'div' == $args['style'] ) : ?>
  </div>
			<?php
  endif;

	}
endif; // ends check for minimalblog_comment_list()



function minimalblog_get_excerpt($limit, $source = null){
    if($source == "content" ? ($excerpt = get_the_content()) : ($excerpt = get_the_excerpt()));
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    return $excerpt;
}


if (!function_exists('minimalblog_footer_credit')) {
	function minimalblog_footer_credit(){
		?>
		<div class="minimalblog-credit">
			<a href="<?php echo esc_url('https://theimran.com/themes/wordpress-theme/best-free-wordpress-theme-for-blogging-minimalblog-pro-version/');?>" class="fa fa-check-circle"><span> <?php esc_html_e( 'Best free WordPress theme for blogging', 'minimalblog' ); ?></span></a>
		</div>
		<?php
	}
}