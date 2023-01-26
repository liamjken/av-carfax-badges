<?php
/**
 * Plugin Name:       AV Carfax Badges
 * Plugin URI:        https://autoverify.com
 * Description:       This plugin is intended to integartate the Carfax badging API with the inventory.
 * Version:           1.0.0
 * Requires at least: 5.9
 * Requires PHP:      7.2
 * Author:            Liam Kennedy
 * Author URI:        https://autoverify.com
 * Text Domain:       av-carfax-badges
 * Domain Path:       /languages
 */

 include( plugin_dir_path( __FILE__ ) . 'includes/carfax-auth.php');
 include( plugin_dir_path( __FILE__ ) . 'includes/av-carfax-admin.php');
 include( plugin_dir_path( __FILE__ ) . 'includes/carfax-badges.php');