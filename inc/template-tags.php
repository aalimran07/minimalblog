<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package minimalblog
 */
if ( ! function_exists( 'minimalblog_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function minimalblog_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'posted on %s', 'post date', 'minimalblog' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'minimalblog_time' ) ) {
	function minimalblog_time() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}
		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);
		echo '<i class="blog-time">' . $time_string . '</i>';
	}
}
if ( ! function_exists( 'minimalblog_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function minimalblog_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'minimalblog' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);
		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
	}
endif;

if ( ! function_exists( 'minimalblog_comment_popuplink' ) ) {
	function minimalblog_comment_popuplink() {
		comments_popup_link( esc_html__( 'No Comment', 'minimalblog' ), esc_html__( '1 Comment', 'minimalblog' ), esc_html__( '% Comments', 'minimalblog' ) );
	}
}

if ( ! function_exists( 'minimalblog_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function minimalblog_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'minimalblog' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'minimalblog' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( 'tags:', 'list item separator', 'minimalblog' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'minimalblog' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'minimalblog' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}
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
			' <span class="edit-link">',
			'</span>'
		);
	}
endif;
if ( ! function_exists( 'minimalblog_post_tag' ) ) {
	function minimalblog_post_tag() {
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'minimalblog' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'minimalblog' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'minimalblog' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'minimalblog' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}
		return;
	}
}


if ( ! function_exists( 'minimalblog_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function minimalblog_post_thumbnail() {

		$post_thumnail = wp_get_attachment_image_url( get_post_thumbnail_id( get_the_ID() ), 'minimalblog-thumbnail' );
		if ( has_post_thumbnail() ) :
			?>
			<a href="<?php the_permalink();?>">
				<?php the_post_thumbnail( 'minimalblog-thumbnail' ); ?>
			</a>
			<?php
		elseif ( $post_thumnail ) :
			echo '<a href="'.the_permalink().'"><img src="' . esc_url( $post_thumnail ) . '" alt=""></a>';
		endif;
	}
endif;


function minimalblog_cats_related_post() {

    $post_id = get_the_ID();
    $cat_ids = array();
    $categories = get_the_category( $post_id );

    if(!empty($categories) && is_wp_error($categories)):
        foreach ($categories as $category):
            array_push($cat_ids, $category->term_id);
        endforeach;
    endif;

    $current_post_type = get_post_type($post_id);
    $query_args = array( 

        'category__in'   => $cat_ids,
        'post_type'      => $current_post_type,
        'post_not_in'    => array($post_id),
        'posts_per_page'  => '4'


     );

    $related_cats_post = new WP_Query( $query_args );

    if($related_cats_post->have_posts()):
    	?>
			<h4 class="related-post-title"><?php esc_html_e( 'Related Post', 'minimalblog' ); ?></h4>
    	<?php
    	echo '<div class="related-post-sldider owl-carousel">';
         while($related_cats_post->have_posts()): $related_cats_post->the_post(); ?>
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
						<a href="<?php the_permalink();?>" class="btn btn-warning"><?php esc_html_e( 'Read More', 'minimalblog' ); ?></a>
					</div>
				</div>
        <?php endwhile;
        echo '</div>';
        // Restore original Post Data
        wp_reset_postdata();
     endif;

}