<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package minimalblog
 */

get_header();
?>
<?php
$featuredsection = get_theme_mod('featured_section_on_off', false);
$popularpostsection = get_theme_mod('sub_featured_gallery', false);
if (true == $featuredsection) :
	get_template_part( 'template-parts/featured', 'layout' );
endif;
if (true == $popularpostsection):
	get_template_part( 'template-parts/subfeatured' );
endif;
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="blog-post-section">
            <div class="container">
                <div class="row">
                    <?php
                    $getblogsidebar = get_theme_mod( 'blog_page_sidebar', 'right' );
                    $blogsidebar = 'right';
                    if ($getblogsidebar == 'right') {
                        $blogsidebar = 'right';
                    }elseif ($getblogsidebar == 'left') {
                        $blogsidebar = 'left';
                    }elseif ($getblogsidebar == 'no') {
                        $blogsidebar = 'no';
                    }else{
                        $blogsidebar = 'rightsidebar';
                    }
                    get_template_part( 'template-parts/sidebar', $blogsidebar );
                    ?>
                </div>
            </div>
        </div>
    </main><!-- #main -->
</div>
<?php
get_footer();
