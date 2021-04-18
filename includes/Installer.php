<?php // phpcs:ignore

namespace SimonGomes\EPT;

/**
 * Class Installer
 *
 * Sets up necessary configuration for the plugin. Takes care of database related configurations as well,
 * like creating or updating the settings table.
 *
 * @package SimonGomes\EPT
 */
class Installer {

	/**
	 * Run the Installer and initiate the class methods.
	 *
	 * @return void
	 */
	public function run() {
		$this->manage_version();
		$this->create_tables();
	}

	/**
	 * Manages plugin version.
	 *
	 * @return void
	 */
	private function manage_version() {
		$installed = get_option( 'ept_installed' );

		if ( ! $installed ) {
			update_option( 'ept_installed', time() );
		}

		update_option( 'ept_version', EPT_VERSION );
	}

	/**
	 * Creates the settings table.
	 *
	 * This table contains the api credentials for the eCourier account.
	 *
	 * @return void
	 */
	private function create_tables() {
		global $wpdb;

		$charset_collate = $wpdb->get_charset_collate();
		$table           = EPT_TABLE_PREFIX . 'settings';

		$schema = "CREATE TABLE IF NOT EXISTS `{$table}` (
		  `id` int(11) NOT NULL,
		  `setting_key` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
		  `value` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
		  `created_by` int(20) UNSIGNED NOT NULL,
		  `created_at` datetime NOT NULL
		) $charset_collate;";

		if ( ! function_exists( 'dbDelta' ) ) {
			require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		}

		dbDelta( $schema );
	}
}
