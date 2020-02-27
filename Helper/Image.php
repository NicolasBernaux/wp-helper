<?php
/*
Plugin Name: Helper\Image
Version: 1.0
Author: @nicolasBernaux
Author URI: http://www.nicolas-bernaux.com
*/
namespace Helper;

/**
 * Helper for format Images
 */
class Image {

	/**
	 * Creates a new Helper\Image object
	 * @example
	 * ```php
	 * // You can pass it an ID number
	 * $myImage = new Helper\Image( 552 );
	 * ```
	 * @param bool|int|string $image_id
	 */
	public function __construct( $image_id ) {
		$this->images_sizes = array_merge( get_intermediate_image_sizes(), array( 'full' ) );
		$this->image_id     = $this->get_image_id( $image_id );
	}

	/**
	 * @internal
	 * @param int|bool|array $size
	 */
	public function get_image_id( $image_id = null ) {
		// Make sure we actually have something to work with
		if ( ! $image_id || '' === $image_id || empty( $image_id ) ) {
			return;
		}

		// If passed ACF image array
		if ( is_array( $image_id ) && isset( $image_id['ID'] ) ) {
			$image_id = $image_id['ID'];
		}

		// If passed ACF image array
		if ( is_string( $image_id ) ) {
			$image_id = (int) $image_id;
		}

		// if passed WP_Post
		if ( $image_id instanceof \WP_Post ) {
			if ( 'Attachment' !== $image_id->post_type ) {
				$featured_image = get_post_thumbnail_id( $image_id );
				if ( $featured_image ) {
					return $featured_image;
				}
			}

			return;
		}

		return $image_id;
	}

	/**
	 * @internal
	 * @param string|array $size (optional) Image size
	 */
	public function get_image( $sizes = null ) {
		if ( ! $this->image_id ) {
			return;
		}

		if ( ! $sizes || empty( $sizes ) ) {
			$sizes = $this->images_sizes;
		}

		if ( is_string( $sizes ) ) {
			return array( $sizes => wp_get_attachment_image_src( $this->image_id, $sizes ) );
		};

		$image = array();
		foreach ( $sizes as $size ) {
			$image[ $size ] = wp_get_attachment_image_src( $this->image_id, $size );
		}

		return $image;
	}
}
