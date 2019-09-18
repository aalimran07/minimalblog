<?php
/**
 * Template Name: Full Width
 *
 * @package minimalblog
 */
get_header();
$headerimage = (has_header_image() ? get_header_image() : '');
?>
<div class="page-banner-area" style="background-image: url(<?php echo esc_url($headerimage);?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="page-banner-text">
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
                </div>
            </div>
        </div>
    </div>
</div>
<div id="primary" class="content-area section-padding">
        <main id="main" class="site-main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        while (have_posts()) :
                            the_post();
                            get_template_part('template-parts/content', 'page');
                            // If comments are open or we have at least one comment, load up the comment template.
                            if (comments_open() || get_comments_number()) :
                                comments_template();
                            endif;
                        endwhile; // End of the loop.
                      ?>
                    </div>
                   
                </div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_footer(); ?>