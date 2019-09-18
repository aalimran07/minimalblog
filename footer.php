<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package minimalblog
 */
?>

</div><!-- #content -->

<?php
if (!is_page_template( 'blankpage.php' ) && !is_page_template( 'fullwidth.php' )) :
	$footernewsletter = get_theme_mod('footer_news_letter_on_off', false);
	if (true == $footernewsletter) :
		get_template_part( 'template-parts/newslatter' );
	endif;
endif;
dynamic_sidebar( 'footer-top' );
$getfooter_column = get_theme_mod( 'footer_column', 3 );
$footerlayout = 'three';
if (4 == $getfooter_column) {
	$footerlayout = 'four';
}elseif (2 == $getfooter_column) {
	$footerlayout = 'two';
}else{
	$footerlayout = 'three';
}
get_template_part( 'template-parts/footer', $footerlayout );

?>
	<footer id="colophon" class="site-footer">
		<?php
		$get_footer_credit = get_theme_mod( 'footer_credit_on_off', true );
		if (true == $get_footer_credit) :
			minimalblog_footer_credit();
		endif; ?>
		<div class="container">
			<div class="row">
				<div class="col-md-6 text-left">
					<div class="site-info">
						<?php
						$getcopyrighttext = get_theme_mod('copyright_text');
						if (!empty($getcopyrighttext)) {
							echo wp_kses_post($getcopyrighttext);
						}else{
						esc_html_e( 'Copyright © 2019 theimran.com All Rights Reserved.', 'minimalblog' );
					} ?>
					</div><!-- .site-info -->
				</div>
				<div class="col-md-6 text-right">
					<div class="social-link-top">
						<?php 
						$facebook = get_theme_mod( 'facebook' );
						$twitter = get_theme_mod('twitter');
						$googleplus = get_theme_mod('googleplus');
						$pinterest = get_theme_mod('pinterest');
						$youtube = get_theme_mod('youtube');
						$instagram = get_theme_mod('instagram');
						$github = get_theme_mod('github');
						$stumbleupon = get_theme_mod('stumbleupon');
						$tumblr = get_theme_mod('tumblr');
						$wordpress = get_theme_mod('wordpress');
						$weixin = get_theme_mod('weixin');
						$snapchat = get_theme_mod('snapchat');
						$qq = get_theme_mod('qq');
						$reddit = get_theme_mod('reddit');
						$linkedin = get_theme_mod('linkedin');
							if(!empty($facebook)) : ?>
							<a href="<?php echo esc_url( $facebook ); ?>" class="fa fa-facebook"></a>
							<?php endif; if(!empty($twitter)): ?>
							<a href="<?php echo esc_url( $twitter ); ?>" class="fa fa-twitter"></a>
							<?php endif; if(!empty($googleplus)) :?>
							<a href="<?php echo esc_url( $googleplus ); ?>" class="fa fa-google-plus"></a>
							<?php endif; if(!empty($pinterest)) : ?>
							<a href="<?php echo esc_url( $pinterest ); ?>" class="fa fa-pinterest"></a>
							<?php endif; if(!empty($youtube)) :?>
							<a href="<?php echo esc_url( $youtube ); ?>" class="fa fa-youtube"></a>
							<?php endif; if(!empty($linkedin)) :?>
							<a href="<?php echo esc_url( $linkedin ); ?>" class="fa fa-linkedin"></a>
							<?php endif; if(!empty($instagram)) :?>
							<a href="<?php echo esc_url( $instagram ); ?>" class="fa fa-instagram"></a>
							<?php endif; if(!empty($github)) :?>
							<a href="<?php echo esc_url( $github ); ?>" class="fa fa-github"></a>
							<?php endif; if(!empty($stumbleupon)) :?>
							<a href="<?php echo esc_url( $stumbleupon ); ?>" class="fa fa-stumbleupon"></a>
							<?php endif; if(!empty($tumblr)) :?>
							<a href="<?php echo esc_url( $tumblr ); ?>" class="fa fa-tumblr"></a>
							<?php endif; if(!empty($wordpress)) :?>
							<a href="<?php echo esc_url( $wordpress ); ?>" class="fa fa-wordpress"></a>
							<?php endif; if(!empty($weixin)) :?>
							<a href="<?php echo esc_url( $weixin ); ?>" class="fa fa-weixin"></a>
							<?php endif; if(!empty($snapchat)) :?>
							<a href="<?php echo esc_url( $snapchat ); ?>" class="fa fa-snapchat"></a>
							<?php endif; if(!empty($qq)) :?>
							<a href="<?php echo esc_url( $qq ); ?>" class="fa fa-qq"></a>
							<?php endif; if(!empty($reddit)) :?>
							<a href="<?php echo esc_url( $reddit ); ?>" class="fa fa-reddit"></a>
							<?php endif;?>
					</div><!-- .site-info -->
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
	<div class="scrooltotop">
		<a href="#" class="fa fa-angle-up"></a>
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
