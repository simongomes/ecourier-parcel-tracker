<?php

namespace SimonGomes\EPT\Admin;

/**
 * Class Settings
 *
 * @package SimonGomes\EPT\Admin
 */
class Settings {

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

		var_dump( $_REQUEST );
		exit;
	}

}