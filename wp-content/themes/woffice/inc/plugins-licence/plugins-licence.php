<?php
if (!defined('FW')) {
	die('Forbidden');
}

if (!class_exists('WofficePluginsLicence')) :

	class WofficePluginsLicence
	{

		protected static $_instance = null;

		public static function instance()
		{
			if (is_null(self::$_instance)) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		public function __construct()
		{
			add_action('admin_enqueue_scripts', array($this, 'woffice_related_script'));
			add_action('wp_ajax_woffice_plugins_licence_activate', array($this, 'woffice_plugins_licence_activate'));
			add_action('wp_ajax_nopriv_woffice_plugins_licence_activate', array($this, 'woffice_plugins_licence_activate'));
			add_action('wp_ajax_woffice_plugins_licence_deactivate', array($this, 'woffice_plugins_licence_deactivate'));
			add_action('wp_ajax_nopriv_woffice_plugins_licence_deactivate', array($this, 'woffice_plugins_licence_deactivate'));
		}
		public function woffice_related_script($hook)
		{
			wp_enqueue_script('woffice-licence-plugins-js',  get_template_directory_uri() . '/js/licence-plugins.min.js', array('jquery'), WOFFICE_THEME_VERSION);
			wp_localize_script('woffice-licence-plugins-js', 'ajax_url', array('ajax_url' => admin_url('admin-ajax.php')));
		}

		/**
		 * Activate licence Ajax
		 *
		 */
		public function woffice_plugins_licence_activate()
		{
			$plugins_key =	$_POST['plugins_key'];
			$plugins_slug =	$_POST['plugins_slug'];
			if ($plugins_slug) {
				switch ($plugins_slug) {

					case 'woffice_cpt_key':

						$get_db_woffice_cpt_key = fw_get_db_settings_option($plugins_slug);
						if ($plugins_key == $get_db_woffice_cpt_key) {
							$license = trim($get_db_woffice_cpt_key);
							$Woffice_Wo_CPT_License = new Woffice_Wo_CPT_License();
							// data to send in our API request
							$wocpt_licence_deactivate = $Woffice_Wo_CPT_License->wocpt_licence_activate($license);
							echo $wocpt_licence_deactivate;
							exit();
						} else {
							$message = __('New licence key must be save before the activate.', 'woffice');
							$response = array("type" => 'success', 'message' => $message, 'license_data' => $license_data,"plugins_slug" => 'woffice_cpt_key');
							echo json_encode($response);
							exit();
						}
						break;
						
					case 'woffice_woae_key':

						$get_db_woffice_woae_key = fw_get_db_settings_option($plugins_slug);
						if ($plugins_key == $get_db_woffice_woae_key) {
							$license = trim($get_db_woffice_woae_key);
							$Woffice_woae_License = new Woffice_woae_License();
							// data to send in our API request
							$woae_licence_deactivate = $Woffice_woae_License->woae_licence_activate($license);
							$plugin_test_slug = json_encode($woae_licence_deactivate);
							echo $woae_licence_deactivate;
							exit();
						} else {
							$message = __('New licence key must be save before the deactivate.', 'woffice');
							$response = array("type" => 'unsuccessful', 'message' => $message, 'license_data' => '',"plugins_slug" => 'woffice_woae_key');
							echo json_encode($response);
							exit();
						}
						break;
					case 'woffice_wosubscribe_key':

						$get_db_woffice_wosubscribe_key = fw_get_db_settings_option($plugins_slug);
						if ($plugins_key == $get_db_woffice_wosubscribe_key) {
							$license = trim($get_db_woffice_wosubscribe_key);
							$Woffice_wosubscribe_License = new Woffice_Wosubscribe_License();
							// data to send in our API request
							$wosubscribe_licence_deactivate = $Woffice_wosubscribe_License->wowcps_licence_activate($license);
							echo $wosubscribe_licence_deactivate;
							exit();
						} else {
							$message = __('New licence key must be save before the deactivate.', 'woffice');
							$response = array("type" => 'unsuccessful', 'message' => $message, 'license_data' => '');
							echo json_encode($response);
							exit();
						}
						break;
					default:

						$message = __('An error occurred, please try again.', 'woffice');
						break;
				}
			} else {
				$response = array("type" => 'unsuccessful', 'message' => 'Slug Missing', 'license_data' => '',"plugins_slug" => 'woffice_wosubscribe_key');
				echo json_encode($response);
				exit();
			}
		}
		/**
		 * Deactivate licence Ajax
		 *
		 */
		public function woffice_plugins_licence_deactivate()
		{
			$plugins_key =	$_POST['plugins_key'];
			$plugins_slug =	$_POST['plugins_slug'];
			if ($plugins_slug) {
				switch ($plugins_slug) {

					case 'woffice_cpt_key':

						$get_db_woffice_cpt_key = fw_get_db_settings_option($plugins_slug);
						if ($plugins_key == $get_db_woffice_cpt_key) {
							$license = trim($get_db_woffice_cpt_key);
							$Woffice_Wo_CPT_License = new Woffice_Wo_CPT_License();
							// data to send in our API request
							$wocpt_licence_deactivate = $Woffice_Wo_CPT_License->wocpt_licence_deactivate($license);
							echo $wocpt_licence_deactivate;
							exit();
						} else {
							$message = __('New licence key must be save before the deactivate.', 'woffice');
							$response = array("type" => 'unsuccessful', 'message' => $message, 'license_data' => '',"plugins_slug" => 'woffice_cpt_key');
							echo json_encode($response);
							exit();
						}
						break;
					case 'woffice_woae_key':

						$get_db_woffice_woae_key = fw_get_db_settings_option($plugins_slug);
						if ($plugins_key == $get_db_woffice_woae_key) {
							$license = trim($get_db_woffice_woae_key);
							$Woffice_woae_License = new Woffice_woae_License();
							// data to send in our API request
							$woae_licence_deactivate = $Woffice_woae_License->woae_licence_deactivate($license);
							echo $woae_licence_deactivate;
							exit();
						} else {
							$message = __('New licence key must be save before the deactivate.', 'woffice');
							$response = array("type" => 'unsuccessful', 'message' => $message, 'license_data' => '',"plugins_slug" => 'woffice_woae_key');
							echo json_encode($response);
							exit();
						}
						break;
					case 'woffice_wosubscribe_key':

						$get_db_woffice_wosubscribe_key = fw_get_db_settings_option($plugins_slug);
						if ($plugins_key == $get_db_woffice_wosubscribe_key) {
							$license = trim($get_db_woffice_wosubscribe_key);
							$Woffice_wosubscribe_License = new Woffice_Wosubscribe_License();
							// data to send in our API request
							$wosubscribe_licence_deactivate = $Woffice_wosubscribe_License->wowcps_licence_deactivate($license);
							echo $wosubscribe_licence_deactivate;
							exit();
						} else {
							$message = __('New licence key must be save before the deactivate.', 'woffice');
							$response = array("type" => 'unsuccessful', 'message' => $message, 'license_data' => '');
							echo json_encode($response);
							exit();
						}
						break;

					default:

						$message = __('An error occurred, please try again.', 'woffice');
						break;
				}
			} else {
				$response = array("type" => 'unsuccessful', 'message' => 'Slug Missing', 'license_data' => '',"plugins_slug" => 'woffice_wosubscribe_key');
				echo json_encode($response);
				exit();
			}
		}
	}
endif;

function WOFFICERELATED()
{
	return WofficePluginsLicence::instance();
}

WOFFICERELATED();
