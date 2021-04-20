<?php // phpcs:ignore
/**
 * Plugin Name: Parcel Tracker eCourier
 * Plugin URI: https://github.com/simongomes/ecourier-parcel-tracker
 * Description: Parcel Tracker eCourier gives you an interface to track eCourier parcel from WordPress website.
 * Author: Simon Gomes
 * Author URI: https://simongomes.dev
 * Text Domain: ecourier-parcel-tracker
 * Domain Path: /languages
 * Version: 1.0.0
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package Ecourier_Parcel_Tracker
 */

/**
 * Copyright (c) 2021 Simon Gomes (email: busy.s.simon@gmail.com). All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * **********************************************************************
 */

use SimonGomes\EPT\Admin;
use SimonGomes\EPT\Ajax;
use SimonGomes\EPT\Appsero_Tracker;
use SimonGomes\EPT\Assets;
use SimonGomes\EPT\Frontend;

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

/**
 * The main plugin class.
 *
 * Class Ecourier_Parcel_Tracker.
 */
final class Ecourier_Parcel_Tracker {

	/**
	 * Plugin version
	 *
	 * @var string
	 */
	const VERSION = '1.0.0';

	/*
	 * EPT table prefix
	 *
	 * @var string
	 */
	const TABLE_PREFIX = 'ept_';

	/**
	 * Ecourier_Parcel_Tracker constructor.
	 */
	private function __construct() {
		$this->define_constants();

		// Plugin registration hook.
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
	 * Defines all necessary constants for the plugin.
	 *
	 * @return void
	 */
	public function define_constants() {
		define( 'EPT_VERSION', self::VERSION );
		define( 'EPT_FILE', __FILE__ );
		define( 'EPT_PATH', __DIR__ );
		define( 'EPT_URL', plugins_url( '', EPT_FILE ) );
		define( 'EPT_ASSETS', EPT_URL . '/assets' );
		define( 'EPT_TABLE_PREFIX', self::TABLE_PREFIX );
		define( 'EPT_API_BASE_URL_STAGING', 'https://staging.ecourier.com.bd/api' );
		define( 'EPT_API_BASE_URL_LIVE', 'https://backoffice.ecourier.com.bd/api' );
	}

	/**
	 * Initialize plugin assets
	 *
	 * @return void
	 */
	public function init_plugin() {
		// Initialize the Appsero tracker for plugin analytics.
		Appsero_Tracker::init_tracker();

		// Load frontend ajax request handler.
		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
			new Ajax();
		}

		if ( is_admin() ) {
			// Load Admin classes.
			new Admin();
		} else {
			// Load assets for the plugin.
			new Assets();

			// Load Frontend classes.
			new Frontend();
		}

	}

	/**
	 * Necessary setup on plugin activation.
	 *
	 * @return void
	 */
	public function activate() {
		$installer = new SimonGomes\EPT\Installer();
		$installer->run();
	}

}

/**
 * Initializes the main plugin.
 *
 * @return \Ecourier_Parcel_Tracker|bool
 */
function ecourier_parcel_tracker() {
	return Ecourier_Parcel_Tracker::init();
}

// kick-off the plugin.
ecourier_parcel_tracker();
