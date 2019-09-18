<?php
/**
 * Search Form
 *
 * @package minimalblog
 */

?>
<div class="sidebarsearch">
<form class="search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="form-group">
	<input type="text" class="form-control" id="search" placeholder="<?php esc_attr_e( 'Search Here.....', 'minimalblog' ); ?>" value="<?php echo the_search_query(); ?>" name="s">
	<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
	</div>
</form>
</div>
