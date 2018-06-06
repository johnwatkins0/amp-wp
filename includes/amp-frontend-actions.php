<?php
/**
 * Callbacks for adding AMP-related things to the main theme.
 *
 * @package AMP
 */

add_action( 'wp_head', 'amp_frontend_add_canonical' );

/**
 * Add amphtml link to frontend.
 *
 * @todo This function's name is incorrect. It's not about adding a canonical link but adding the amphtml link.
 *
 * @since 0.2
 */
function amp_frontend_add_canonical() {

	/**
	 * Filters whether to show the amphtml link on the frontend.
	 *
	 * @todo This filter's name is incorrect. It's not about adding a canonical link but adding the amphtml link.
	 * @since 0.2
	 */
	if ( false === apply_filters( 'amp_frontend_show_canonical', true ) ) {
		return;
	}

	$amp_url = null;
	if ( is_singular() ) {
		$amp_url = amp_get_permalink( get_queried_object_id() );
	} else {
		$amp_url = add_query_arg( amp_get_slug(), '', amp_get_current_url() );
	}
	if ( $amp_url ) {
		printf( '<link rel="amphtml" href="%s">', esc_url( $amp_url ) );
	}
}
