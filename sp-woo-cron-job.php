<?php
/**
 * Plugin Name: SP Woo Cron Job
 * Plugin URI: https://storepress.com/
 * Description: WooCommerce Cron Job
 * Author: StorePress, voboghure
 * Author URI: https://storepress.com/
 * Version: 1.0.0
 * License: GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: sp-woo-cron-job
 */

defined( 'ABSPATH' ) || exit;

class SP_Woo_Cron_Job {

    protected $sp_process;

    public function __construct() {
        add_action( 'plugins_loaded', array( $this, 'init' ) );
        add_action( 'init', array( $this, 'handle_process' ) );
    }

    public function init() {
        // error_log('Init');
        require_once plugin_dir_path( __FILE__ ) . 'sp-woo-process.php';
        $this->sp_process = new SP_Woo_Process();
    }

    public function handle_process() {
        if ( ! isset( $_GET['process'] ) ) {
            return;
        }

        if ( 'spall' === $_GET['process'] ) {
            // error_log('Get');
            $names = $this->get_names();

            foreach ( $names as $name ) {
                $this->sp_process->push_to_queue( $name );
                // error_log($name);
            }

            $this->sp_process->save()->dispatch();
        }
    }

    protected function get_names() {
        return array(
            'Grant Buel',
            'Bryon Pennywell',
            'Jarred Mccuiston',
            'Reynaldo Azcona',
            'Jarrett Pelc',
            'Blake Terrill',
            'Romeo Tiernan',
            'Marion Buckle',
            'Theodore Barley',
            'Carmine Hopple',
            'Suzi Rodrique',
            'Fran Velez',
            'Sherly Bolten',
            'Rossana Ohalloran',
            'Sonya Water',
            'Marget Bejarano',
            'Leslee Mans',
            'Fernanda Eldred',
            'Terina Calvo',
            'Dawn Partridge',
        );
    }

}

new SP_Woo_Cron_Job();