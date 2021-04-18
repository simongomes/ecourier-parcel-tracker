<?php // phpcs:ignore

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
	 * @return string
	 */
	public function render_shortcode() {

		// enqueue all frontend assets.
		wp_enqueue_style( 'ept-style' );
		wp_enqueue_script( 'ept-script' );

		ob_start();

		include __DIR__ . '/views/form-parcel-tracker.php';

		return ob_get_clean();

	}

}
