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

// We don't want hackers in our plugin.
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// CONSTANTS
define( 'MGBPWPPLUGIN_PATH', dirname( __FILE__ ) );
define( 'MGBPWPPLUGIN_FILE', __FILE__ );
define( 'MGBPWPPLUGIN_FOLDER', basename( MGBPWPPLUGIN_PATH ) );
define( 'MGBPWPPLUGIN_URL', plugins_url() . '/' . MGBPWPPLUGIN_FOLDER );

/*
[MODIFY] <SetTheTextDomain>
Set the Text Domain that will be used in the plugin
*/
define( 'MGBPWPPLUGIN_TEXTDOMAIN', "<SetTheTextDomain>" );


/*
*   =================================================================================================
*   PLUGIN DEPENDENCIES
*   =================================================================================================
*/
include ( MGBPWPPLUGIN_PATH . "/inc/libs/class-tgm-plugin-activation.php" );



/*
*   =================================================================================================
*   CONFIG FUNCTIONS
*   =================================================================================================
*/
include ( MGBPWPPLUGIN_PATH . "/inc/config.php" );





/*
*   =================================================================================================
*   CUSTOM POST TYPES
*   Include all the Custom Post Types you need in the 'includes/cpts/' folder and they will be loaded
*   automatically.
*   =================================================================================================
*/
foreach (glob(MGBPWPPLUGIN_PATH . "/inc/cpts/*.php") as $filename)
	include $filename;




/*
*   =================================================================================================
*   ADVANCED CUSTOM FIELDS
*   Include all the Advanced Custom Fields you need in the 'includes/acfs/' folder and they will be loaded
*   automatically.
*   =================================================================================================
*/
foreach (glob(MGBPWPPLUGIN_PATH . "/inc/acfs/*.php") as $filename)
	include $filename;