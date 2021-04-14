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
	 * @param  array  $args arguments passed from front-end.
	 * @param  string $content content passed from front-end.
	 *
	 * @return string
	 */
	public function render_shortcode( $args, $content = '' ) {

		wp_enqueue_style( 'ept-style' );
		wp_enqueue_script( 'ept-script' );
		?>
		<div id="ept-wrap">
			<h2 class="ept-title">Shipment Tracker</h2>
			<h4 class="ept-subtitle">Track your parcel</h4>
			<div class="ept-tracker-input-container">
				<form method="post" id="trackForm" onsubmit="return false;">
					<input type="text" name="tracking_item" placeholder="Type your tracking number" class="form-control">
					<button type="submit" class="common-btn">
						<i class="icon-search"></i>
						<span>TRACK PARCEL</span>
					</button>
				</form>
			</div>
		</div>
		<?php
	}

}