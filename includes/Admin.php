<?php // phpcs:ignore

namespace SimonGomes\EPT;

use SimonGomes\EPT\Admin\Settings;

/**
 * Class Admin.
 *
 * Initializes all admin-end related classes.
 *
 * @package SimonGomes\EPT
 */
class Admin {

	/**
	 * Admin constructor.
	 *
	 * @return void
	 */
	public function __construct() {
		$settings = new Admin\Settings();

		$this->dispatch_actions( $settings );

		new Admin\Menu( $settings );
	}

	/**
	 * Dispatch necessary actions for the plugin.
	 *
	 * @param \SimonGomes\EPT\Admin\Settings $settings Settings class instance.
	 *
	 * @return void
	 */
	public function dispatch_actions( Settings $settings ) {
		add_action( 'admin_init', array( $settings, 'get_etp_settings' ) );
		add_action( 'admin_init', array( $settings, 'form_handler' ) );
	}

}
