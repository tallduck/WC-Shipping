<?php
/**
 *
 * WC-Shipping is a plugin for WooCommerce that enables smart shipping rates.
 *
 * @package   WC_Shipping
 * @author    Mike George <mike@tallduck.com>
 * @license   GPL-2.0+
 * @link      http://tallduck.com
 * @copyright 2014 Tall Duck, LLC.
 *
 * @wordpress-plugin
 * Plugin Name:       WC-Shipping
 * Plugin URI:        http://tallduck.com
 * Description:       WC-Shipping is a plugin for WooCommerce that enables smart shipping rates.
 * Version:           0.1.0
 * Author:            Tall Duck, LLC.
 * Author URI:        http://tallduck.com
 * Text Domain:       wc-shipping-en
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/TallDuck/WC-Shipping
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

require_once( plugin_dir_path( __FILE__ ) . 'public/class-wc-shipping.php' );

register_activation_hook( __FILE__, array( 'WC_Shipping', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'WC_Shipping', 'deactivate' ) );

add_action( 'plugins_loaded', array( 'WC_Shipping', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

/*
 * If you want to include Ajax within the dashboard, change the following
 * conditional to:
 *
 * if ( is_admin() ) {
 *   ...
 * }
 *
 * The code below is intended to to give the lightest footprint possible.
 */
if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-wc-shipping-admin.php' );
	add_action( 'plugins_loaded', array( 'WC_Shipping_Admin', 'get_instance' ) );

}
