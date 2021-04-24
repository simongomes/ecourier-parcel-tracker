=== Parcel Tracker eCourier ===
Contributors: simongomes02
Donate link: https://simongomes.dev/
Tags: parcel-tracker, parcel, ecourier-parcel, ecourier-parcel-tracker, package-tracker, ecourier-package-tracker, bangladesh, bangladesh-parcel, bangladesh-parcel-tracker, woocommerce, wc, woocommerce-parcel-tracker
Requires at least: 4.0
Tested up to: 5.7
Requires PHP: 5.6
Stable tag: 1.0.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Parcel Tracker eCourier gives you a simple interface for eCourier parcel tracking

== Description ==

A simple WordPress plugin to give your customer an user friendly and simple interface to track their parcel status from your WordPress website.

== Installation ==

Follow the following steps to install the plugin and get it working.

1. Install the plugin from WordPress plugin library using the Plugins section from the WordPress dashboard, or download the zip file unzip and upload it inside `/wp-content/plugins/` directory of your WordPress installation.
2. Activate the plugin through the 'Plugins' menu
3. Once installed eCourier Tracker menu will be available. Go to the eCourier Tracker and provide your eCourier API Credentials.
4. Select the Environment you would like to use (Staging or Live)
5. Place the shortcode inside any page to make the interface available. (e.g.: `[ecourier-parcel-tracker]`,`<?php echo do_shortcode('ecourier-parcel-tracker'); ?>` )

== Screenshot ==

1. eCourier API settings screen.
2. eCourier parcel tracking form.
3. eCourier parcel package information.
4. eCourier parcel shipment statuses.

== Frequently Asked Questions ==

= Do I need eCourier account to use the plugin? =

Yes you will need an eCourier account and API credentials to use this plugin.

= Do I need any configuration from eCourier? =

Yes, you will need API credentials for your eCourier account. You can get it from eCourier.

= What credentials do I need to setup the plugin? =

You will need your API credentials which includes `USER-ID`, `API-KEY` and `API-SECRET`.

= How do I get the API credentials? =

You can contact eCourier for the API credentials for your account.

= Do I need WooCommerce for this plugin? =

No, you will not. Parcel Tracker eCourier is not dependent on any other plugin.

== Changelog ==

= 1.0.0 =
* 1.0.0 is the latest release of Parcel Tracker eCourier plugin.

= 1.0.1 =
* Security measures added for Ajax form submission, this will block unauthorized form submissions for Parcel Tracking Form.

== Privacy Policy ==

Parcel Tracker eCourier uses [Appsero](https://appsero.com) SDK to collect some telemetry data upon user's confirmation. This helps us to troubleshoot problems faster & make product improvements.

Appsero SDK **does not gather any data by default.** The SDK only starts gathering basic telemetry data **when a user allows it via the admin notice**. We collect the data to ensure a great user experience for all our users.

Integrating Appsero SDK **DOES NOT IMMEDIATELY** start gathering data, **without confirmation from users in any case.**

Learn more about how [Appsero collects and uses this data](https://appsero.com/privacy-policy/).