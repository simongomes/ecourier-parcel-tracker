<?php

namespace SimonGomes\EPT\Admin;

/**
 * Class Settings
 *
 * @package SimonGomes\EPT\Admin
 */
class Settings {

	/**
	 * Settings form errors.
	 *
	 * @var array
	 */
	public $errors = array();

	public $etp_settings = array();

	/**
	 * Handles the eCourier API configuration page.
	 *
	 * @return void
	 */
	public function load_settings_page() {
		if ( ! file_exists( __DIR__ . '/views/settings-view.php' ) ) {
			return;
		}
		include __DIR__ . '/views/settings-view.php';
	}

	/**
	 * Handle the eCourier API settings form submissions.
	 *
	 * @return void
	 */
	public function form_handler() {
		if ( ! isset( $_POST['submit_ecourier_settings'] ) ) {
			return;
		}

		if ( isset( $_REQUEST['_wpnonce'] ) && ! wp_verify_nonce( sanitize_key( $_REQUEST['_wpnonce'] ), 'ecourier-settings' ) ) {
			wp_die( 'Nope! I can\'t let you do this' );
		}

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( 'I don\'t think you should be doing this! I see no permission!' );
		}

		$user_id         = isset( $_POST['user_id'] ) ? sanitize_text_field( wp_unslash( $_POST['user_id'] ) ) : '';
		$api_key         = isset( $_POST['api_key'] ) ? sanitize_text_field( wp_unslash( $_POST['api_key'] ) ) : '';
		$api_secret      = isset( $_POST['api_secret'] ) ? sanitize_text_field( wp_unslash( $_POST['api_secret'] ) ) : '';
		$api_environment = isset( $_POST['api_environment'] ) ? sanitize_text_field( wp_unslash( $_POST['api_environment'] ) ) : 'staging';

		// Handle required field errors.
		if ( empty( $user_id ) || empty( $api_key ) || empty( $api_secret ) || empty( $api_environment ) ) {
			$this->errors['required-field-missing'] = __( 'All fields are required.', 'ecourier-parcel-tracker' );
		}

		if ( ! empty( $this->errors ) ) {
			return;
		}

		$result = ept_insert_settings(
			array(
				'user_id'         => $user_id,
				'api_key'         => $api_key,
				'api_secret'      => $api_secret,
				'api_environment' => $api_environment,
			)
		);

		if ( is_wp_error( $result ) ) {
			wp_die( wp_kses_post( $result->get_error_message() ) );
		}

		$redirect_to = admin_url( 'admin.php?page=ecourier-parcel-tracker&inserted=true' );

		wp_safe_redirect( $redirect_to );

		exit;
	}

	/**
	 * Get previous EPT settings from database
	 *
	 * @return void
	 */
	public function get_etp_settings() {
		$this->etp_settings = ept_get_settings();
	}

}
