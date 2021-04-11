<?php

namespace SimonGomes\EPT\Frontend;

/**
 * Class Shortcode.
 *
 * The class handles the shortcode for the frontend.
 *
 * @package SimonGomes\EPT\Frontend
 */
class Shortcode {

	/**
	 * Shortcode constructor.
	 *
	 * @return void
	 */
	public function __construct() {
		add_shortcode( 'ecourier-parcel-tracker', array( $this, 'render_shortcode' ) );
	}

	/**
	 * Renders the front-end view using a shortcode.
	 *
	 * @param  array  $args arguments passed from front-end.
	 * @param  string $content content passed from front-end.
	 *
	 * @return string
	 */
	public function render_shortcode( $args, $content = '' ) {
		return 'eCourier Parcel Tracker';
	}

}