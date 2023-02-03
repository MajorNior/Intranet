<?php

/**
 * Search 
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<form role="search" method="get" id="bbp-search-form" action="<?php bbp_search_url(); ?>">
	<div>
		<label class="screen-reader-text hidden" for="bbp_search"><?php _e( 'Search for:', 'bbpress' ); ?></label>
		<input type="hidden" name="action" value="bbp-search-request" />
		<input tabindex="<?php bbp_tab_index(); ?>" type="text" value="<?php echo esc_attr( bbp_get_search_terms() ); ?>" name="bbp_search" id="bbp_search" placeholder="<?php esc_html_e('Search..', 'woffice'); ?>" />
		<button tabindex="<?php bbp_tab_index(); ?>" class="button" type="submit" id="bbp_search_submit"><i class="fa fa-search" aria-hidden="true"></i></button>
	</div>
</form>
