<?php
/**
 * Plugin Name:     eCourier Parcel Tracker
 * Plugin URI:      https://simongomes.dev
 * Description:     eCourier Parcel Tracker gives you an interface to track eCourier parcel from WordPress website.
 * Author:          Simon Gomes
 * Author URI:      https://simongomes.dev
 * Text Domain:     ecourier-parcel-tracker
 * Domain Path:     /languages
 * Version:         1.0.0
 * License:         GPL2 or later
 *
 * @package         Ecourier_Parcel_Tracker
 */

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * The main plugin class.
 *
 * Class Ecourier_Parcel_Tracker.
 */
final class Ecourier_Parcel_Tracker {
	/**
	 * Ecourier_Parcel_Tracker constructor.
	 */
	private function __construct() {
		$this->define_constants();

		register_activation_hook( __FILE__, array( $this, 'activate' ) );

		add_action( 'plugins_loaded', array( $this, 'init_plugin' ) );
	}

	/**
	 * Initialize a singleton instance.
	 *
	 * @return \Ecourier_Parcel_Tracker
	 */
	public static function init() {
		static $instance = false;

		if ( ! $instance ) {
			$instance = new self();
		}

		return $instance;
	}

	/**
	 * Defines all necessary constants.
	 *
	 * @return void
	 */
	public function define_constants() {
		define( 'EPT_VERSION', '1.0.0' );
		define( 'EPT_FILE', __FILE__ );
		define( 'EPT_PATH', __DIR__ );
		define( 'EPT_URL', plugins_url( '', EPT_FILE ) );
		define( 'EPT_ASSETS', EPT_URL . '/assets' );
	}

	/**
	 * Initialize plugin assets
	 *
	 * @return void
	 */
	public function init_plugin() {

	}

	/**
	 * Necessary setup on plugin activation.
	 *
	 * @return void
	 */
	public function activate() {
		update_option( 'ept_version', EPT_VERSION );

		$installed = get_option( 'ept_installed' );
		if ( ! $installed ) {
			update_option( 'ept_installed', time() );
		}
	}

}

/**
 * Initializes the main plugin.
 *
 * @return \Ecourier_Parcel_Tracker
 */
function ecourier_parcel_tracker() {
	return Ecourier_Parcel_Tracker::init();
}

// kick-off the plugin.
ecourier_parcel_tracker();
