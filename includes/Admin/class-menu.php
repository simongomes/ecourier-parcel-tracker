<?php
/**
 * Menu class registers the admin navigation.
 *
 * @package Ecourier_Parcel_Tracker
 */

namespace SimonGomes\EPT\Admin;

/**
 * The Menu Class handles the admin menu bar.
 */
class Menu {

	/**
	 * Menu constructor.
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
	}

	/**
	 * Register the admin menu for the EPT plugin.
	 *
	 * @return void
	 */
	public function admin_menu() {
		add_menu_page( __( 'eCourier Tracker', 'ecourier-parcel-tracker' ), __( 'eCourier Tracker', 'ecourier-parcel-tracker' ), 'manage_options', 'ecourier-parcel-tracker', array( $this, 'plugin_page' ), 'dashicons-cart' );
	}

}