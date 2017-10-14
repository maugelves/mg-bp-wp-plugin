<?php
/*
Plugin Name: <Plugin Name>
Plugin URI:  <Plugin URL>
Description: <Plugin Descripcion>
Version:     1.0
Author:      Mauricio Gelves
Author URI:  https://maugelves.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: <Text Domain>
Domain Path: /languages
*/

// CONSTANTS
define( '<constant-domainname>', '<Text Domain>');
define( 'MGT_PATH', dirname( __FILE__ ) );
define( 'MGT_FOLDER', basename( MGSP_PATH ) );
define( 'MGT_URL', plugins_url() . '/' . MGSP_FOLDER );


/*
*   =================================================================================================
*   PLUGIN DEPENDENCIES
*   =================================================================================================
*/
include ( MGT_PATH . "/inc/libs/class-tgm-plugin-activation.php" );



/*
*   =================================================================================================
*   CONFIG FUNCTIONS
*   =================================================================================================
*/
include ( MGT_PATH . "/inc/config.php" );





/*
*   =================================================================================================
*   CUSTOM POST TYPES
*   Include all the Custom Post Types you need in the 'includes/cpts/' folder and they will be loaded
*   automatically.
*   =================================================================================================
*/
foreach (glob(MGT_PATH . "/inc/cpts/*.php") as $filename)
	include $filename;




/*
*   =================================================================================================
*   ADVANCED CUSTOM FIELDS
*   Include all the Advanced Custom Fields you need in the 'includes/acfs/' folder and they will be loaded
*   automatically.
*   =================================================================================================
*/
foreach (glob(MGT_PATH . "/inc/acfs/*.php") as $filename)
	include $filename;