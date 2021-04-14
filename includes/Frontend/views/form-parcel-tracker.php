<?php
/**
 * This file contains the markup for eCourier frontend form and tracking results.
 *
 * @package SimonGomes\EPT
 */

?>

<div id="ept-wrap">
	<h2 class="ept-title"><?php esc_html_e( 'Shipment Tracker', 'ecourier-parcel-tracker' ); ?></h2>
	<h4 class="ept-subtitle"><?php esc_html_e( 'Track your parcel', 'ecourier-parcel-tracker' ); ?></h4>
	<div class="ept-tracker-input-container">
		<form method="post" id="trackForm" action="#">
			<input type="text" name="tracking_code" placeholder="Type your tracking number" class="form-control">

			<?php wp_nonce_field( 'ept-search-form' ); ?>
			<input type="hidden" name="action" value="ept_tracking_form">

			<button type="submit" class="common-btn">
				<i class="icon-search"></i>
				<span><?php esc_html_e( 'TRACK PARCEL', 'ecourier-parcel-tracker' ); ?></span>
			</button>
		</form>
	</div>
</div>
