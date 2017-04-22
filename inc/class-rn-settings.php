<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Rand_Name_Settings' ) ) {
    
    class Rand_Name_Settings
    {

        /**
         * Class instance property
         * 
         * @var object
         */
        protected static $_instance;

        /**
         * Constructor to setup
         */
        public function __construct() {

            $this->components();
        }

        /**
         * Make an instance of the class
         *
         * @since 1.0
         */
        public function factory() {

            if( null == self::$_instance ) {
                self::$_instance = new self();
            }
            return self::$_instance;

        }

        /**
         * Setup actions, filters and required files
         *
         * @since 1.0
         */
        public function components() {

            require_once dirname( __FILE__ ) . '/inc/class-rn-list.php';
            add_action( 'admin_enqueue_scripts'     , array( $this, 'add_style' ) );
            add_action( 'wp_before_admin_bar_render', array( $this, 'admin_bar_menu' ) );
            add_action( 'plugins_loaded'            , array( $this, 'load_textdomain' ) );
        }

        /**
         * Enqueue css style and javascript
         *
         * @since 1.0
         */
        public function add_style() {
            
            if ( is_admin() ) {

                wp_enqueue_style( 'wpb-names' , plugin_dir_url( __FILE__ ) . '/css/style.css' );
                wp_enqueue_script( 'wpb-names', plugin_dir_url( __FILE__ ) . '/js/close.js' );

            }
        }

        /**
         * Load text domain of th plugin
         *
         * @since 1.0
         */
        public function load_textdomain() {

            load_plugin_textdomain( 'wpb-nombres', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
        }

        /**
         * Randomize names
         *
         * @since 1.0
         */
        public function random_name() {

            $names = RN_List::rn_get_instance()->rn_set_names();
            $means = array_keys( $names );
            shuffle( $means );
            
            foreach( $means as $mean ) {
                $list_names[$mean] = $names[$mean];
            }

            foreach( $list_names as $name => $meaning ) {
                $get_name = "<p style='color:" . $this->rn_rand_color() . "'><b>{$name} : </b>{$meaning}</p>";
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
                    'title'  => $this->limit_string(),
                    'href'   => '#',
                    'meta'   => array(
                        'class'    => 'wpb-hide-names',
                        'onclick'  => "hide(\"wp-admin-bar-wpb-names\")",
                        'title'    => __( 'Click to hide names', 'rand-name' ),
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
        public function rand_color() {

            $colors = array( 'pink', 'yellow', 'red', 'brown', 'azure', 'orange', 'white' );
            $color  = array_values( $colors );
            shuffle( $color );
            foreach( $color as $col ) {
                $get_col = $col;
            }
            return $get_col;

        }

        public function limit_string() {

            // strip tags to avoid breaking any html
            $view_name = strip_tags( $this->rn_random_name() );

            if ( strlen( $view_name ) > 100 ) {
                // truncate string
                $string_cut = substr( $view_name, 0, 100 );

                // make sure it ends in a word so assassinate doesn't become ass...
                $view_name = substr( $string_cut, 0, strrpos( $string_cut, ' ' ) ) . '...'; 
            }
            return $view_name;
        
        }

    }

}