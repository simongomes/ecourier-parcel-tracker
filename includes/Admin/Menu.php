<?php
/**
 * Menu class registers the admin navigation.
 *
 * @package Ecourier_Parcel_Tracker
 */

namespace SimonGomes\EPT\Admin;

/**
 * Class Menu.
 *
 * The Menu Class handles the admin menu bar.
 *
 * @package SimonGomes\EPT\Admin
 */
class Menu {

	/**
	 * Holds the Settings() class instance.
	 *
	 * @var $settings
	 */
	public $settings;

	/**
	 * Menu constructor.
	 *
	 * @param \SimonGomes\EPT\Admin\Settings $settings Settings class instance.
	 */
	public function __construct( Settings $settings ) {
		$this->settings = $settings;

		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
	}

	/**
	 * Register the admin menu for the EPT plugin.
	 *
	 * @return void
	 */
	public function admin_menu() {
		$parant_slug = 'ecourier-parcel-tracker';
		$capability  = 'manage_options';
		add_menu_page( __( 'eCourier Tracker', 'ecourier-parcel-tracker' ), __( 'eCourier Tracker', 'ecourier-parcel-tracker' ), $capability, $parant_slug, null, 'dashicons-cart' );
		add_submenu_page( $parant_slug, __( 'eCourier Tracker', 'ecourier-parcel-tracker' ), __( 'eCourier Tracker', 'ecourier-parcel-tracker' ), $capability, $parant_slug, array( $this->settings, 'load_settings_page' ) );
	}

}
