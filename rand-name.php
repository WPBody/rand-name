<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://wpdoby.com
 * @since             1.0
 * @package           Rand_Name_Settings
 * 
 * @wordpress-plugin
 * Plugin Name:       Rand Name
 * Plugin URI:        http://wpbody.com
 * Description:       A simple plugin that gives you the meaning of the names of people, as simple as that! Learn about people :)
 * Version:           1.0 (beta)
 * Author:            WPBody.com
 * Author URI:        http://wpbody.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       rand-name
 * Domain Path:       /languages
 */

/**
 * If called directly, then exit.
 */
defined( 'ABSPATH' ) || exit;


require_once dirname( __FILE__ ) . '/inc/class-rn-list.php';
require_once dirname( __FILE__ ) . '/inc/class-rn-settings.php';

Rand_Name_Settings::factory();
Rand_Name_List::factory();