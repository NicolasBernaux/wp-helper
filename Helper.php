<?php
/*
Plugin Name: Helper
Version: 1.0
Author: @nicolasBernaux
Author URI: http://www.nicolas-bernaux.com
*/
namespace Helper;

use Helper\Transient;
use Helper\Image;

require_once __DIR__ . '/vendor/autoload.php';

/**
 * List of Helper for WordPress
 */
class Helper {

	/**
	 * A utility for Transients
	 * @api
	 * @example
	 * ```php
	 * $posts = Helper::transient('post-' .$post->ID, function() use ($post) {
	 *  //some expensive query here that's doing something you want to store to a transient
	 *  return $favorites;
	 * }, 600);
	 * ```
	 *
	 * @param string   $slug           Unique identifier for transient
	 * @param callable $callback       Callback that generates the data that's to be cached
	 * @param int      $transient_time (optional) Expiration of transients in seconds
	 * @return mixed
	 */
	public static function transiant( $slug, $callback, $transient_time = 0 ) {
		return Transient::transient( $slug, $callback, $transient_time );
	}

	/**
	 * A utility for Image
	 * @api
	 * @example
	 * ```php
	 * $image = Helper::image( 522, array( 'medium', 'full' ) );
	 * ```
	 *
	 * @param int        $id   Id of the image
	 * @param int|array  $size (optional) Image size
	 * @return mixed
	 */
	public static function image( $id, $size = null ) {
		$image = new Image( $id );
		return $image->get_image( $size );
	}
}
