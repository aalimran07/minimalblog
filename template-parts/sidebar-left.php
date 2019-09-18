<div class="col-md-5 col-lg-4">
    <?php get_sidebar(); ?>
</div>
<div class="col-md-7 col-lg-8">
    <?php
    if ( have_posts() ) :
        
        
        $get_blog_layout = get_theme_mod('blog_layout');
    
        if (is_home() && ! is_front_page()) :
            ?>
            <header>
                <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
            </header>
            <?php
        endif;
        if ('grid' == $get_blog_layout) {
                echo '<div class="row masonaryactive">';
            }
        /* Start the Loop */
        while (have_posts()) :
            the_post();
            /*
             * Include the Post-Type-specific template for the content.
             * If you want to override this in a child theme, then include a file
             * called content-___.php (where ___ is the Post Type name) and that will be used instead.
             */
            
            if ('grid' == $get_blog_layout) {
                echo '<div class="col-sm-6 blog-grid-layout">';
            }
            get_template_part('template-parts/content', get_post_type());
            if ('grid' == $get_blog_layout) {
                echo '</div>';
            }
        endwhile;
        if ('grid' == $get_blog_layout) {
                echo '</div>';
            }
        the_posts_pagination();
    else :
        get_template_part('template-parts/content', 'none');
    endif;
    ?>
</div>
