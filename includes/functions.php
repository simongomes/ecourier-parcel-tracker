<?php // phpcs:ignore

/**
 * Handles the database insertion for api credentials.
 *
 * @param array $args array of api credentials.
 *
 * @return \WP_Error|bool
 */
function ept_insert_settings( $args = array() ) {

	if ( empty( $args['user_id'] ) || empty( $args['api_key'] ) || empty( $args['api_secret'] ) || empty( $args['api_environment'] ) ) {
		return new \WP_Error( 'required-field-missing', __( 'All fields are required.', 'ecourier-parcel-tracker' ) );
	}

	global $wpdb;

	$table = EPT_TABLE_PREFIX . 'settings';

	$defaults = array(
		'user_id'         => '',
		'api_key'         => '',
		'api_secret'      => '',
		'api_environment' => '',
	);

	$data     = wp_parse_args( $args, $defaults );
	$inserted = false;

	$delete = $wpdb->query( "TRUNCATE TABLE `$table`" ); // phpcs:ignore

	if ( ! $delete ) {
		return new \WP_Error( 'failed-to-remove-old-data', __( 'Failed to remove old settings data', 'ecourier-parcel-tracker' ) );
	}

	foreach ( $data as $key => $input ) {
		// phpcs:ignore
		$inserted = $wpdb->replace(
			$table,
			array(
				'setting_key' => $key,
				'value'       => $input,
				'created_by'  => get_current_user_id(),
				'created_at'  => current_time( 'mysql' ),
			),
			array( '%s', '%s', '%d', '%s' )
		);
		if ( ! $inserted ) {
			break;
		}
	}

	if ( ! $inserted ) {
		return new \WP_Error( 'failed-to-insert', __( 'Failed to insert settings data', 'ecourier-parcel-tracker' ) );
	}

	return true;
}

/**
 * Fetch ETP credentials from database.
 *
 * @return array
 */
function ept_get_settings() : array {
	global $wpdb;

	$table         = EPT_TABLE_PREFIX . 'settings';
	$settings_data = array();

	// phpcs:ignore
	$settings = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT `setting_key`, `value` FROM `$table`" // phpcs:ignore
		)
	);

	foreach ( $settings as $setting ) {
		$settings_data[ $setting->setting_key ] = $setting->value;
	}

	return $settings_data;
}
