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
 * @package           Rand_Name
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

// If this file is called directly, abort!
defined( 'ABSPATH' ) || exit;


class Rand_Name {

    // Object instance
    public static $instance;

    /**
     * Make an instance of the class
     *
     * @since 1.0
     */
    public function rn_get_instance() {

        if( null == self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;

    }

    /**
     * Setup actions, filters and required files
     *
     * @since 1.0
     */
    public function rn_activate_components() {
        require_once dirname( __FILE__ ) . '/inc/class-rn-list.php';
        add_action( 'wp_enqueue_scripts'        , array( $this, 'rn_add_style' ) );
        add_action( 'plugins_loaded'            , array( $this, 'rn_load_textdomain' ) );
        add_action( 'wp_before_admin_bar_render', array( $this, 'admin_bar_menu' ) );
    }

    /**
     * Enqueue css style and javascript
     *
     * @since 1.0
     */
    public function rn_add_style() {
        wp_enqueue_style( 'wpb-nombres', plugin_dir_url( __FILE__ ) . '/css/style.css' );
        wp_enqueue_script( 'wpb-nombres', plugin_dir_url( __FILE__ ) . '/js/close.js' );
    }

    /**
     * Load text domain of th plugin
     *
     * @since 1.0
     */
    public function rn_load_textdomain() {
        load_plugin_textdomain( 'wpb-nombres', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
    }

    /**
     * Randomize names
     *
     * @since 1.0
     */
    public function rn_random_name() {

        $names = RN_List::rn_get_instance()->rn_set_names();
        $means = array_keys( $names );
        shuffle( $means );
        
        foreach( $means as $mean ) {
            $list_names[$mean] = $names[$mean];
        }

        global $is_chrome;
        if( $is_chrome ) {
            $background = 'yellow';
        } else {
            $background = 'pink';
        }

        global $wp_version;
        if( $wp_version >= 4 ) {
           foreach( $list_names as $name => $meaning ) {
                $get_name = "<p style='color:" . $this->rn_rand_color() . "'><b>{$name} : </b>{$meaning}</p>";
            }
        }
        return $get_name;

    }

    /**
     * Add hide button to admin bar
     *
     * @since 1.0
     */
    public function admin_bar_menu() {
        
        if( is_front_page() || is_page() || is_single() ) {
            global $wp_admin_bar;
            $args = array(
                'id'     => 'wpb-names',
                'patent' => false,
                'title'  => $this->rn_limit_string(),
                'href'   => '#',
                'meta'   => array(
                    'class'    => 'wpb-hide-names',
                    'onclick'  => "hide(\"wpadminbar\")",
                    'title'    => 'Click to hide names',
                ),
            );
            $wp_admin_bar->add_node( $args );
        }

    }

    /**
     * Random text color
     *
     * @since 1.0
     */
    public function rn_rand_color() {

        $colors = array( 'pink', 'yellow', 'red', 'brown', 'azure', 'orange', 'white' );
        $color  = array_values( $colors );
        shuffle( $color );
        foreach( $color as $col ) {
            $get_col = $col;
        }
        return $get_col;

    }

    public function rn_limit_string() {

        $name = '<h1>Hello!</h1>';
        // strip tags to avoid breaking any html
        $view_name = strip_tags( $this->rn_random_name() . ' ' . $name );

        if ( strlen( $view_name ) > 100 ) {
            // truncate string
            $stringCut = substr( $view_name, 0, 100 );

            // make sure it ends in a word so assassinate doesn't become ass...
            $view_name = substr( $stringCut, 0, strrpos( $stringCut, ' ' ) ) . '...'; 
        }
        return $view_name;
    
    }

}

$wpbn_nombres = Rand_Name::rn_get_instance();
$wpbn_nombres->rn_activate_components();
