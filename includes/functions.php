<?php

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

	$delete = $wpdb->query( "TRUNCATE TABLE `$table`" );

	if ( ! $delete ) {
		return new \WP_Error( 'failed-to-remove-old-dara', __( 'Failed to remove old settings data', 'ecourier-parcel-tracker' ) );
	}

	foreach ( $data as $key => $input ) {
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
function ept_get_settings() {
	global $wpdb;

	$table = EPT_TABLE_PREFIX . 'settings';

	$result = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM `$table`"
		)
	);
	$settings_data['user_id'] = array_filter(
		$result,
		function ( $value ) {
			return 'user_id' === $value->setting_key;
		}
	);
	$settings_data['user_id'] = reset( $settings_data['user_id'] );

	$settings_data['api_key'] = array_filter(
		$result,
		function ( $value ) {
			return 'api_key' === $value->setting_key;
		}
	);
	$settings_data['api_key'] = reset( $settings_data['api_key'] );

	$settings_data['api_secret'] = array_filter(
		$result,
		function ( $value ) {
			return 'api_secret' === $value->setting_key;
		}
	);
	$settings_data['api_secret'] = reset( $settings_data['api_secret'] );

	$settings_data['api_environment'] = array_filter(
		$result,
		function ( $value ) {
			return 'api_environment' === $value->setting_key;
		}
	);
	$settings_data['api_environment'] = reset( $settings_data['api_environment'] );

	return $settings_data;
}
