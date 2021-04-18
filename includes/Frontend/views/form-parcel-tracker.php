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
		<form method="post" id="track-form" action="#">
			<input type="text" name="tracking_code" placeholder="<?php esc_attr_e( 'Type your tracking number', 'ecourier-parcel-tracker' ); ?>" class="tracking-code form-control">

			<?php wp_nonce_field( 'ept-search-form' ); ?>
			<input type="hidden" name="action" value="ept_tracking_form">

			<button type="submit" class="common-btn">
				<i class="icon-search"></i>
				<span><?php esc_html_e( 'TRACK PARCEL', 'ecourier-parcel-tracker' ); ?></span>
			</button>
		</form>
	</div>
	<div id="error-container">
		<p class="error-message"><?php esc_html_e( 'Tracking number starts with ECR or BL and minimum 11 characters', 'ecourier-parcel-tracker' ); ?></p>
	</div>
	<div id="track-not-found">
		<img src="<?php echo esc_url( EPT_ASSETS . '/images/not-found.svg' ); ?>" alt="">
		<h3><?php esc_html_e( 'No Result Found', 'ecourier-parcel-tracker' ); ?></h3>
		<h4><?php esc_html_e( 'We can’t find any results based on your search.', 'ecourier-parcel-tracker' ); ?></h4>
	</div>
	<div id="package-information">
		<div class="info-header">
				<h3><?php esc_html_e( 'Package Information', 'ecourier-parcel-tracker' ); ?></h3>
				<h4><?php esc_html_e( 'Tracking Number', 'ecourier-parcel-tracker' ); ?> <strong class="tracking-number"></strong> </h4>
		</div>
		<div class="track-order-info">
			<ul>
				<li><span><?php esc_html_e( 'Ordered Creation', 'ecourier-parcel-tracker' ); ?> </span> <p class="order-date"></p></li>
				<li><span><?php esc_html_e( 'Elapsed After Order', 'ecourier-parcel-tracker' ); ?> </span> <p class="elapse-time"></p></li>
				<li><span><span><?php esc_html_e( 'Delivery Type', 'ecourier-parcel-tracker' ); ?> </span> Standard</li>
			</ul>
		</div>
		<div class="track-delivery-info">
			<ul>
				<li><span class="company-name"></span></li>
				<li><span class="customer-name"></span> <p class="customer-address"></p></li>
			</ul>
		</div>

		<div class="track-shipment-info">
			<h3><?php esc_html_e( 'Where your shipment has been', 'ecourier-parcel-tracker' ); ?></h3>
			<ul>
				<!-- Shipment statuses will be dynamicaly populated -->
			</ul>
		</div>
	</div>
</div>
