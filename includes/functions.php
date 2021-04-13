<?php

/**
 * Handles the database insertion for api credentials.
 *
 * @param array $args array of api credentials.
 */
function ept_insert_settings( $args = array() ) {

	if ( empty( $args['user_id'] ) || empty( $args['api_key'] ) || empty( $args['api_secret'] ) || empty( $args['api_environment'] ) ) {
		return new \WP_Error( 'required-field-missing', __( 'All fields are required.', 'ecourier-parcel-tracker' ) );
	}
	global $wpdb;
	$table_prefix = EPT_TABLE_PREFIX;
	$table = "{$table_prefix}settings";

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
