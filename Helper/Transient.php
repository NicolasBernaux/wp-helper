<?php
/*
Plugin Name: Helper\Transient
Version: 1.0
Author: @nicolasBernaux
Author URI: http://www.nicolas-bernaux.com
*/
namespace Helper;

/**
 * Helper for easy using Transient
 */
class Transient {

	const SLUG_PREFIX = 'helper_';

	/**
	 * A utility for Transients
	 * @api
	 * @example
	 * ```php
	 * $posts = Helper\Transient::transient('post-' .$post->ID, function() use ($post) {
	 *  //some expensive query here that's doing something you want to store to a transient
	 *  return $favorites;
	 * }, 600);
	 * ```
	 *
	 * @param string   $slug           Unique identifier for transient
	 * @param callable $callback       Callback that generates the data that's to be cached
	 * @param integer  $transient_time (optional) Expiration of transients in seconds
	 * @return mixed
	 */
	public static function transient( $slug, $callback, $transient_time = 0 ) {
		$enable_transients = ( false === $transient_time || ( defined( 'WP_DISABLE_TRANSIENTS' ) && WP_DISABLE_TRANSIENTS ) ) ? false : true;
		$data              = $enable_transients ? get_transient( $slug ) : false;

		if ( false === $data ) {
			$data = $callback();
			set_transient( self::SLUG_PREFIX . $slug, $data, $transient_time );
		}

		return $data;
	}
}
