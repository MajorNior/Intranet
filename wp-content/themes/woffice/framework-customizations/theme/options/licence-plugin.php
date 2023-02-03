<?php if (!defined('FW')) {
    die('Forbidden');
}

$woffice_wo_cpt = false;
$isinstalled_woffice_cpt = WP_PLUGIN_DIR . '/custom-post-type-support-for-woocommerce/custom-post-type-support-for-woocommerce.php';
$get_db_woffice_cpt_key = fw_get_db_settings_option('woffice_cpt_key');
$woffice_cpt_key = 'woffice_cpt_key';

if (class_exists('WofficeCustomPostTypesupportforWooCommerce')) {
    
    $status  = get_option('Woffice_Wo_CPT_license_status');

    $woffice_wo_cpt['woffice_cpt_key'] = array(
        'label' => __('Licence Key', 'woffice'),
        'attr'  => array('class' => 'woffice_plugin_license woffice-wo-cpt-active', 'autocomplete' => 'false'),
        'type'         => 'text',
        'value' => '',
        'desc' =>   __('Enter Licence Key', 'woffice'),
    );
    $woffice_wo_cpt['woffice_cpt_key_activate'] = array(
        'type'  => 'html',
        'attr'  => array('class' => 'woffice-wo-cpt-activate-button'),
        'label' => __('', 'woffice'),
        'desc' =>   __('Click to activate licence', 'woffice'),
        'html'  =>  '<button type="button" onclick="WocptLicenceActivate(\'woffice_cpt_key\');" class="button-large submit-button-save woffice_licence_activate_btn">Activate</button>',
    );
    $woffice_wo_cpt['woffice_cpt_key_deactivate'] = array(
        'type'  => 'html',
        'attr'  => array('class' => 'woffice-wo-cpt-deactivate-button'),
        'label' => __('', 'woffice'),
        'desc' =>   __('Click to deactivate licence', 'woffice'),
        'html'  =>  '<button type="button" onclick="WocptDeActivateLicenceKey(\'woffice_cpt_key\');" class="button-large submit-button-save woffice_licence_deactivate_btn">Deactivate</button>',
    );
    $woffice_wo_cpt['woffice_cpt_key_status'] = array(
        'type'  => 'hidden',
        'attr'  => array('class' => 'woffice-wo-cpt-status'),
        'value' => $status,
    );
} elseif (file_exists($isinstalled_woffice_cpt)) {

    $woffice_wo_cpt['woffice_cpt_message_key'] = array(
        'type'  => 'html',
        'attr'  => array('class' => 'woffice-wo-cpt-not-active'),
        'label' => __('Woffice Woo Custom Post Type', 'woffice'),
        'html'  =>  'Please active <span class="highlight"> Woffice Woocommerce Custom Post Type</span> to create post product. <a href="../wp-admin/plugins.php">Click Here</a>',
    );
} else {
    $woffice_wo_cpt['woffice_cpt_message_key'] = array(
        'type'  => 'html',
        'attr'  => array('class' => 'woffice-wo-cpt-not-active'),
        'label' => __('Woffice Woo Custom Post Type', 'woffice'),
        'html'  =>  'Please download <span class="highlight"> Woffice Woocommerce Custom Post Type</span> to create post product. <a href="https://woffice.io/downloads/custom-post-type-support-for-woocommerce/" target="_blank">Click Here</a>',
    );
}

$woffice_wo_cpt['woffice_cpt_key_activate_message'] = array(
    'type'  => 'hidden',
    'attr'  => array('class' => 'woffice-wo-cpt-activate-message'),
    'value' => '',
    'desc'  => __('Activating..', 'woffice'),
);
$woffice_wo_cpt['woffice_cpt_key_deactivate_message'] = array(
    'type'  => 'hidden',
    'attr'  => array('class' => 'woffice-wo-cpt-deactivate-message'),
    'value' => '',
    'desc'  => __('Deactivating..', 'woffice'),
);
$woffice_wo_cpt['woffice_cpt_loading_extra_message'] = array(
    'type'  => 'hidden',
    'attr'  => array('class' => 'woffice-wo-cpt-activate-message'),
    'value' => '',
    'desc'  => __('This may take a few moments.', 'woffice'),
);

// woofice advaned email
$woffice_advanced_email = false;
$isinstalled_woffice_woae = WP_PLUGIN_DIR . '/woffice-advanced-email/woffice-advanced-email.php';
$get_db_woffice_woae = fw_get_db_settings_option('woffice_woae_key');
$woffice_wpae_key = 'woffice_woae_key';

if (class_exists('WOAE')) {
    
    $woffice_woae_status  = get_option('Woffice_woae_license_status');

    $woffice_advanced_email['woffice_woae_key'] = array(
        'label' => __('Licence Key', 'woffice'),
        'attr'  => array('class' => 'woffice-plugin-license woffice-woae-active', 'autocomplete' => 'false'),
        'type'         => 'text',
        'value' => '',
        'desc' =>   __('Enter Licence Key', 'woffice'),
    );
    $woffice_advanced_email['woffice_woae_key_activate'] = array(
        'type'  => 'html',
        'attr'  => array('class' => 'woffice-woae-activate-button'),
        'label' => __('', 'woffice'),
        'desc' =>   __('Click to activate licence', 'woffice'),
        'html'  =>  '<button type="button" onclick="WocptLicenceActivate(\'woffice_woae_key\');" class="button-large submit-button-save woffice_licence_activate_btn">Activate</button>',
    );
    $woffice_advanced_email['woffice_woae_key_deactivate'] = array(
        'type'  => 'html',
        'attr'  => array('class' => 'woffice-woae-deactivate-button'),
        'label' => __('', 'woffice'),
        'desc' =>   __('Click to deactivate licence', 'woffice'),
        'html'  =>  '<button type="button" onclick="WocptDeActivateLicenceKey(\'woffice_woae_key\');" class="button-large submit-button-save woffice_licence_deactivate_btn">Deactivate</button>',
    );
    $woffice_advanced_email['woffice_woae_key_status'] = array(
        'type'  => 'hidden',
        'attr'  => array('class' => 'woffice-woae-status'),
        'value' => $woffice_woae_status,
    );
} elseif (file_exists($isinstalled_woffice_woae)) {

    $woffice_advanced_email['woffice_woae_message_key'] = array(
        'type'  => 'html',
        'attr'  => array('class' => 'woffice-woae-not-active'),
        'label' => __('Woffice Advanced email', 'woffice'),
        'html'  =>  'Please active <span class="highlight"> Woffice Advanced Email</span> to create post product. <a href="../wp-admin/plugins.php">Click Here</a>',
    );
} else {
    $woffice_advanced_email['woffice_woae_message_key'] = array(
        'type'  => 'html',
        'attr'  => array('class' => 'woffice-woae-not-active'),
        'label' => __('Woffice Advanced email;', 'woffice'),
        'html'  =>  'Please download <span class="highlight"> Woffice Advanced Email</span> to create email template. <a href="https://woffice.io/downloads/woffice-advanced-email/" target="_blank">Click Here</a>',
    );
}

// woofice subscription
$woffice_subscription = false;
$isinstalled_woffice_wosubscription = WP_PLUGIN_DIR . '/woffice-subscription/woffice-subscription.php';
$get_db_woffice_woae = fw_get_db_settings_option('woffice_wosubscribe_key');
$woffice_wosubscribe_key = 'woffice_wosubscribe_key';

if (class_exists('WOFFICE_SUBSCRIPTION')) {
    
    $woffice_wosubscribe_status  = get_option('Woffice_wosubscribe_license_status');

    $woffice_subscription['woffice_wosubscribe_key'] = array(
        'label' => __('Licence Key', 'woffice'),
        'attr'  => array('class' => 'woffice-plugin-license woffice-wosubscribe-active', 'autocomplete' => 'false'),
        'type'         => 'text',
        'value' => '',
        'desc' =>   __('Enter Licence Key', 'woffice'),
    );
    $woffice_subscription['woffice_wosubscribe_key_activate'] = array(
        'type'  => 'html',
        'attr'  => array('class' => 'woffice-wosubscribe-activate-button'),
        'label' => __('', 'woffice'),
        'desc' =>   __('Click to activate licence', 'woffice'),
        'html'  =>  '<button type="button" onclick="WocptLicenceActivate(\'woffice_wosubscribe_key\');" class="button-large submit-button-save woffice_licence_activate_btn">Activate</button>',
    );
    $woffice_subscription['woffice_wosubscribe_key_deactivate'] = array(
        'type'  => 'html',
        'attr'  => array('class' => 'woffice-wosubscribe-deactivate-button'),
        'label' => __('', 'woffice'),
        'desc' =>   __('Click to deactivate licence', 'woffice'),
        'html'  =>  '<button type="button" onclick="WocptDeActivateLicenceKey(\'woffice_wosubscribe_key\');" class="button-large submit-button-save woffice_licence_deactivate_btn">Deactivate</button>',
    );
    $woffice_subscription['woffice_wosubscribe_key_status'] = array(
        'type'  => 'hidden',
        'attr'  => array('class' => 'woffice-wosubscribe-status'),
        'value' => $woffice_wosubscribe_status,
    );
} elseif (file_exists($isinstalled_woffice_wosubscription)) {

    $woffice_subscription['woffice_wosubscribe_message_key'] = array(
        'type'  => 'html',
        'attr'  => array('class' => 'woffice-wosubscribe-not-active'),
        'label' => __('Woffice Advanced email', 'woffice'),
        'html'  =>  'Please active <span class="highlight"> Subscriptions for WooCommerce & Woffice </span> to create post product. <a href="../wp-admin/plugins.php">Click Here</a>',
    );
} else {
    $woffice_subscription['woffice_wosubscribe_message_key'] = array(
        'type'  => 'html',
        'attr'  => array('class' => 'woffice-wosubscribe-not-active'),
        'label' => __('Woffice Subscription;', 'woffice'),
        'html'  =>  'Please download <span class="highlight"> Subscriptions for WooCommerce & Woffice </span> to create email template. <a href="https://woffice.io/downloads/woffice-subscription/" target="_blank">Click Here</a>',
    );
}

$options = array(
    'plugin-licence' => array(
        'title'   => __('Plugins', 'woffice'),
        'type'    => 'tab',
        'options' => array(
            'woffice-plugins-box' => array(
                'title'   => __('Woo Custom Post Type Manager', 'woffice'),
                'type'    => 'box',
                'options' => array(
                    $woffice_wo_cpt,
                )
            ),
            'woffice-woae-box' => array(
                'title'   => __('Woffice Advanced Email', 'woffice'),
                'type'    => 'box',
                'options' => array(
                    $woffice_advanced_email,
                )
            ),
            'woffice-wosubscribe-box' => array(
                'title'   => __('Subscriptions for WooCommerce & Woffice', 'woffice'),
                'type'    => 'box',
                'options' => array(
                    $woffice_subscription,
                )
            ),
        )
    )
);
