<?php


class MGWPBP_Config {

	/**
	 * Constructor.
	 */
	public function __construct() {

		// Load TextDomain
		add_action('plugins_loaded', array( $this, 'mgwpbp_after_theme_setup' ) );

		// Load ACF Translations
		add_filter('acf/settings/l10n', array( $this, 'custom_acf_settings_localization' ) );
		add_filter('acf/settings/l10n_textdomain', array( $this, 'custom_acf_settings_textdomain' ) );

		// Load Plugin Dependencies
		add_action( 'tgmpa_register', array( $this, 'check_plugin_dependencies' ) );
	}

	/**
	*	Load the TextDomain for the plugin in the '/languages' folder
	*	
	*	Remember the files should be <plugin-slu>-<locale>.mo
	*	e.g. my-books-en_US.mo
	*/
	public function mgwpbp_after_theme_setup(){
		load_plugin_textdomain(MGBPWPPLUGIN_TEXTDOMAIN, false, MGBPWPPLUGIN_FOLDER . '/languages');
	}



	/**
	* In order to make the ACF labels translatable we must
	* set this filters.
	*/
	public function custom_acf_settings_localization($localization){
		return true;
	}
	public function custom_acf_settings_textdomain($domain){
		return MGBPWPPLUGIN_TEXTDOMAIN;
	}




	/**
	 * Check the plugin dependencies
	 * For more information on how works this plugins check the official documentation or
	 * visit my website:
	 * http://tgmpluginactivation.com/configuration/
	 * https://maugelves.com/dependencias-de-plugins-y-opciones/
	 */
	public function check_plugin_dependencies() {
		/**
		 * Array of plugin arrays. Required keys are name and slug.
		 * If the source is NOT from the .org repo, then source is also required.
		 */
		$plugins = array(

			// This is an example of how to include a plugin from an arbitrary external source in your theme.
			array(
				'name'         => 'Advanced Custom Fields PRO', // The plugin name.
				'slug'         => 'advanced-custom-fields-pro', // The plugin slug (typically the folder name).
				'required'     => true, // If false, the plugin is only 'recommended' instead of required.
				'external_url' => 'https://www.advancedcustomfields.com/pro/', // If set, overrides default API URL and points to an external URL.
			),
		);

		tgmpa( $plugins );

	}

}

$mgbpwpplugin_config = new MGWPBP_Config();