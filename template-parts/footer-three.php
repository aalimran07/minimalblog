<?php if (is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' )) : ?>
    <div class="footer-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                   <?php dynamic_sidebar( 'footer-1' ) ?>
                </div>
                <div class="col-md-4">
                    <?php dynamic_sidebar( 'footer-2' ) ?>
                </div>
                <div class="col-md-4">
                    <?php dynamic_sidebar( 'footer-3' ) ?>
                </div>
                
            </div>
        </div>
    </div>
<?php endif; ?>