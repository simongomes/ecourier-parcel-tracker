<?php

namespace SimonGomes\EPT;

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
		$this->dispatch_actions();

		new Admin\Menu();
	}

	/**
	 * Dispatch necessary actions for the plugin.
	 *
	 * @return void
	 */
	public function dispatch_actions() {
		$settings = new Admin\Settings();
		add_action( 'admin_init', array( $settings, 'form_handler' ) );
	}

}