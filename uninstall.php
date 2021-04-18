<?php
/**
 * Trigger on plugin uninstall.
 *
 * @package Ecourier_Parcel_Tracker
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die();
}

if ( ! defined( 'EPT_TABLE_PREFIX' ) ) {
	define( 'EPT_TABLE_PREFIX', 'ept_' );
}
// Remove plugin setting table from database.
$table = EPT_TABLE_PREFIX . 'settings';

global $wpdb;
$wpdb->query( "DROP TABLE IF EXISTS `$table`" ); // phpcs:ignore
