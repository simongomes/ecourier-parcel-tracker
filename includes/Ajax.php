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

	/**
	 * Handle the tracking form submission. Get parcel status from eCourier and return back to front end.
	 *
	 * @return void
	 */
	public function handle_form_submission() {

		if ( isset( $_POST['ept-search-form'] ) && ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['ept-search-form'] ) ), 'ept_tracking_form' ) ) {
			wp_send_json_error(
				array(
					'message' => 'You are not allowed to do this',
				)
			);
			exit;
		}

		$settings = ept_get_settings();

		if ( isset( $_POST['tracking_code'] ) ) {
			$tracking_code = sanitize_text_field( wp_unslash( $_POST['tracking_code'] ) );
		}

		$response = wp_remote_post(
			EPT_API_BASE_URL_LIVE . '/track',
			array(
				'method'  => 'POST',
				'headers' => array(
					'USER-ID'    => $settings['user_id'],
					'API-KEY'    => $settings['api_key'],
					'API-SECRET' => $settings['api_secret'],
				),
				'body'    => array(
					'ecr' => $tracking_code,
				),
			)
		);

		wp_send_json_success(
			array(
				'message' => $response['body'],
			)
		);
	}

}
