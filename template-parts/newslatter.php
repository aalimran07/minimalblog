<?php
/**
 * minimalblog News Letter three
 */

?>

 <div class="newsletter-three">
	 <div class="container">
		 <div class="row">
			 <div class="col-md-12 text-center">
				 <div class="news-letter-three-content">
					 <h4><?php echo esc_html( get_theme_mod( 'newsletter_title' ) ); ?></h4>
					 <div class="three-news-letter-form">
						 <?php echo wp_kses_post( do_shortcode( get_theme_mod( 'form_shortcode' ) ) ); ?>
					 </div>
				 </div>
			 </div>
		 </div>
	 </div>
 </div>
