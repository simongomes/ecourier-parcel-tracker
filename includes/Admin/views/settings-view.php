<?php
/**
 * This file contains the markup and functionalities for eCourier API settings view.
 *
 * @package Ecourier_Parcel_Tracker
 */
?>

<div class="wrap">
	<h1 class="wp-heading-inline"><?php esc_html_e( 'eCourier API Credentials', 'ecourier-parcel-tracker' ); ?></h1>

	<form action="" method="post">
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row">
						<label for="user_id">USER-ID:</label>
					</th>
					<td>
						<input type="text" name="user_id" id="user_id" class="regular-text" value="">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="api_key">API-KEY:</label>
					</th>
					<td>
						<input type="text" name="api_key" id="api_key" class="regular-text" value="">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="api_secret">API-SECRET:</label>
					</th>
					<td>
						<input type="text" name="api_secret" id="api_secret" class="regular-text" value="">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="api_environment">Environment:</label>
					</th>
					<td>
						<select name="api_environment" id="api_environment" class="regular-text">
							<option value="staging">Staging</option>
							<option value="live">Live</option>
						</select>
					</td>
				</tr>
			</tbody>
		</table>
		<?php wp_nonce_field( 'ecourier-settings' ); ?>
		<?php submit_button( __( 'Save Settings', 'ecourier-parcel-tracker' ), 'primary', 'submit_ecourier_settings', true, null ); ?>
	</form>
</div>
