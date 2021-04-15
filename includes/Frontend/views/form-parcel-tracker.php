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
			<input type="text" name="tracking_code" placeholder="Type your tracking number" class="tracking-code form-control">

			<?php wp_nonce_field( 'ept-search-form' ); ?>
			<input type="hidden" name="action" value="ept_tracking_form">

			<button type="submit" class="common-btn">
				<i class="icon-search"></i>
				<span><?php esc_html_e( 'TRACK PARCEL', 'ecourier-parcel-tracker' ); ?></span>
			</button>
		</form>
	</div>
    <div id="error-container">
        <p class="error-message">Tracking number starts with ECR or BL and minimum 11 characters</p>
    </div>
    <div id="track-not-found">
        <img src="<?php echo EPT_ASSETS . '/images/not-found.svg'; ?>" alt="">
        <h3>No Result Found</h3>
        <h4>We can’t find any results based on your search.</h4>
    </div>
</div>
