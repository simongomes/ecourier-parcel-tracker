<?php // phpcs:ignore

namespace SimonGomes\EPT;

/**
 * Class Assets
 *
 * Loads necessary assets like js, css for the plugin
 */
class Assets {

	/**
	 * Assets constructor.
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
	}

	/**
	 * Get an array of necessary css styles for the plugin.
	 *
	 * @return array[]
	 */
	public function get_styles() {
		return array(
			'ept-style' => array(
				'src'     => EPT_ASSETS . '/css/frontend.css',
				'deps'    => false,
				'version' => filemtime( EPT_PATH . '/assets/css/frontend.css' ),
			),
		);
	}

	/**
	 * Get an array of necessary scripts for the plugin.
	 *
	 * @return array[]
	 */
	public function get_scripts() {
		return array(
			'ept-script' => array(
				'src'       => EPT_ASSETS . '/js/frontend.js',
				'deps'      => array( 'jquery' ),
				'version'   => filemtime( EPT_PATH . '/assets/js/frontend.js' ),
				'in_footer' => true,
			),
		);
	}

	/**
	 * Register all necessary CSS and JavaScript for the plugin.
	 *
	 * @return void
	 */
	public function enqueue_assets() {
		$styles = $this->get_styles();

		foreach ( $styles as $handle => $style ) {
			wp_register_style( $handle, $style['src'], $style['deps'], $style['version'] );
		}

		$scripts = $this->get_scripts();

		foreach ( $scripts as $handle => $script ) {
			wp_register_script( $handle, $script['src'], $script['deps'], $script['version'], $script['in_footer'] );
		}

		wp_localize_script(
			'ept-script',
			'EPT',
			array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'error'   => __( 'Something went wrong!', 'ecourier-parcel-tracker' ),
			)
		);
	}
}
