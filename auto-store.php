<?php
/*
Plugin Name: Auto Store
Plugin URI: https://github.com/juanmacivico87/auto-store
Description: Manage your store of vehicles
Version: 1.0.0
Author: Juan Manuel Civico Cabrera
Author URI: https://www.juanmacivico87.com
License: GPLv2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  auto-store
Domain Path:  /languages
*/

if ( false === defined( 'ABSPATH' ) ) {
    exit;
}

require_once 'vendor/autoload.php';

use AutoStore\App\App;

$auto_store = new App();

define( 'AUTO_STORE_LANG_DIR', plugin_dir_path( __FILE__ ) . '/languages' );
define( 'AUTO_STORE_FILE', __FILE__ );
define( 'AUTO_STORE_DIR', plugin_dir_path( __FILE__ ) );
define( 'AUTO_STORE_URL', plugin_dir_url( __FILE__ ) );

define( 'AUTO_STORE_VERSION', '1.0.0' );
define( 'AUTO_STORE_TEXTDOMAIN', 'auto-store' );
define( 'AUTO_STORE_NAME', 'Auto Store' );
