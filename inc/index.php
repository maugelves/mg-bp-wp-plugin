<?php

/*
*   =================================================================================================
*   CONFIG FUNCTIONS
*   =================================================================================================
*/
include ( RWS_DS_PATH . "/inc/config/config.php" );

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
