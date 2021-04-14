<?php // phpcs:ignore

namespace SimonGomes\EPT;

/**
 * Class Ajax
 *
 * Handles frontend ajax form submission and returns the eCourier Parcel data.
 *
 * @package SimonGomes\EPT
 */
class Ajax {

	/**
	 * Ajax constructor, registers the action.
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'wp_ajax_ept_tracking_form', array( $this, 'handle_form_submission' ) );
		add_action( 'wp_ajax_nopriv_ept_tracking_form', array( $this, 'handle_form_submission' ) );
	}

	public function handle_form_submission() {
		$ecoururier_settings = ept_get_settings();
		wp_send_json_success([
			'message'  => "success",
			'settings' => $ecoururier_settings,
		]);

		wp_send_json_error([
			'message' => "error",
		]);
	}

}
