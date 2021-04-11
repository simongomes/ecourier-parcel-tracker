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
		new Admin\Menu();
	}

}