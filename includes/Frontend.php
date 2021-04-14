<?php // phpcs:ignore

namespace SimonGomes\EPT;

/**
 * Class Frontend
 *
 * Initializes all front-end related classes.
 *
 * @package SimonGomes\EPT
 */
class Frontend {

	/**
	 * Frontend constructor.
	 *
	 * @return void
	 */
	public function __construct() {
		new Frontend\Shortcode();
	}

}
