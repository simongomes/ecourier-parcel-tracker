<?php // phpcs:ignore

namespace SimonGomes\EPT;

use Appsero\Client;

/**
 * This will register and initialize Appsero to analytics for the plugin.
 *
 * Class Appsero
 *
 * @package SimonGomes\EPT
 */
class Appsero_Tracker {

	/**
	 * Initialize the Appsero tracker for the plugin.
	 *
	 * @return void
	 */
	public static function init_tracker() {
		if ( ! class_exists( 'Appsero\Client' ) ) {
			require_once __DIR__ . '/appsero/src/Client.php';
		}

		$client = new Client( 'b915a21e-b749-4d95-b04e-b4f83eec8ec8', 'Parcel Tracker eCourier', EPT_FILE );

		// Active insights.
		$client->insights()->init();
	}
}
