jQuery(function () {
  var woffice_interval = setInterval(function () {
    var woffice_cpt_key = jQuery('#fw-option-woffice_cpt_key_status').val();
    var woffice_woae_key = jQuery('#fw-option-woffice_woae_key_status').val();
    var woffice_wosubscribe_key = jQuery('#fw-option-woffice_wosubscribe_key_status').val();
    if (woffice_cpt_key) {
      clearInterval(woffice_interval);
    }
    if (woffice_woae_key) {
      clearInterval(woffice_interval);
    }
    if (woffice_wosubscribe_key) {
      clearInterval(woffice_interval);
    }
    WocptActDeActButton('woffice_cpt_key');
    WocptActDeActButton('woffice_woae_key');
    WocptActDeActButton('woffice_wosubscribe_key');
  }, 1000);
});
jQuery(document).ajaxStart(function () {
   WocptActDeActButton('woffice_cpt_key'); 
   WocptActDeActButton('woffice_woae_key'); 
   WocptActDeActButton('woffice_wosubscribe_key'); 
});
jQuery(document).ajaxStop(function () {
  WocptActDeActButton('woffice_cpt_key');
  WocptActDeActButton('woffice_woae_key');
  WocptActDeActButton('woffice_wosubscribe_key');
});
function WocptActDeActButton(plugin_slug) {
  var plugin_key = jQuery('#fw-option-' + plugin_slug).val();
  var plugin_key_status = jQuery('#fw-option-' + plugin_slug + '_status').val();
  if (plugin_key) {
    if (plugin_key_status == '' || plugin_key_status == 'deactivated' || plugin_key_status == 'invalid' || plugin_key_status == 'failed' || !plugin_key_status) {
      jQuery('#fw-backend-option-fw-option-' + plugin_slug + '_deactivate').hide();
      jQuery('#fw-backend-option-fw-option-' + plugin_slug + '_activate').show();
    } else {
      jQuery('#fw-backend-option-fw-option-' + plugin_slug + '_deactivate').hide();
      jQuery('#fw-backend-option-fw-option-' + plugin_slug + '_activate').show();
    }
  } else {
    jQuery('#fw-backend-option-fw-option-' + plugin_slug + '_deactivate').hide();
    jQuery('#fw-backend-option-fw-option-' + plugin_slug + '_activate').hide();
  }
  if (plugin_key && plugin_key_status == 'valid') {
    jQuery('#fw-backend-option-fw-option-' + plugin_slug + '_deactivate').show();
    jQuery('#fw-backend-option-fw-option-' + plugin_slug + '_activate').hide();
  }
}
function WocptLicenceActivate(slug) {
  var plugins_slug;
  if(slug){
    plugins_slug = slug;
  }else{
    plugins_slug = '';
  }
  var formSelector = '#fw-settings-form:theme-settings',
    title = jQuery('#fw-backend-option-fw-option-woffice_cpt_key_activate_message .fw-backend-option-desc .fw-inner').text(),
    description = jQuery('#fw-backend-option-fw-option-woffice_cpt_loading_extra_message .fw-backend-option-desc .fw-inner').text(),
    loadingModalId = 'fw-options-ajax-save-loading';

  jQuery(formSelector).addClass('prevent-all-tabs-init');
  fw.soleModal.show(
    loadingModalId,
    '<h2 class="fw-text-muted">' +
    '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAAAAACo4kLRAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAnRSTlMA/1uRIrUAAAACYktHRADdUu+NWwAAAAd0SU1FB+EKCgYABDchIukAAACZelRYdFJhdyBwcm9maWxlIHR5cGUgZ2lmOnhtcCBkYXRheG1wAAAImU2NMQ5CMQxD957iHyGNnaTlNkVtEQMSAwPHJx8WHMleXuxyu+/L+/E85niNzHJ85b1gRwvx6vCrWxCGBkdNF1WVaD5DODkx2H0Fgkmv5I2dxFQ9mRKiy3seMdBZCZ4lnUqjQYj/GRW3LPm95w42VvkACzYml9QYNjwAAACjSURBVBjTfZChDoNAEETfbZpgVqJPXHIO0w+hCZYPxJKUD6mpIzmBPrmmigoQcCSM2eRlszM7buWqxzbSd8Y0NgEAtwJ5WvYd39Y7TKOB7xkW0C6AQB4N6KuqB2zMIDDZ0cQmENJ2b8i/AYAl4db3pwj0fAlzmXJGsBIagl4/kitShFjCiNCUsEEI/sx8QKA9WWkLAnV3oNrVN9VtJZtyKrnUH9vgMmhlXVedAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDE3LTEwLTEwVDA2OjAwOjA0LTA3OjAw4kWx4AAAACV0RVh0ZGF0ZTptb2RpZnkAMjAxNy0xMC0xMFQwNjowMDowNC0wNzowMJMYCVwAAAAASUVORK5CYII=" alt="Loading" class="wp-spinner" /> ' +
    title +
    '</h2>' +
    '<p class="fw-text-muted"><em>' + description + '</em></p>',
    {
      autoHide: 60000,
      allowClose: false
    }
  );
  var ajaxurl_plugins = ajax_url['ajax_url'];
  var plugins_key = jQuery('#fw-option-' + plugins_slug).val();
  
  if (plugins_key) {
    var data = {
      'action': 'woffice_plugins_licence_activate',
      'plugins_key': plugins_key,
      'plugins_slug': plugins_slug
    };
    jQuery.post(ajaxurl_plugins, data, function (response) {
      var response_obj = JSON.parse(response);
      if (response_obj) {
        if (response_obj.type == 'success') {
          var license_data = response_obj.license_data;
          if (license_data) {
            if (license_data.license == 'valid') {
              jQuery('#fw-option-'+ response_obj.plugins_slug +'_status').val('valid');
              jQuery('#fw-backend-option-fw-option-'+ response_obj.plugins_slug +'_activate').hide();
              jQuery('#fw-backend-option-fw-option-'+ response_obj.plugins_slug +'_deactivate').show();
            }
          }
        }
        fw.soleModal.hide(loadingModalId);
        jQuery(formSelector).addClass('prevent-all-tabs-init');
        fw.soleModal.show(
          loadingModalId,
          '<h3 class="fw-text-muted">' + response_obj.message + '</h3>',
          {
            autoHide: 10000,
            allowClose: true
          }
        );
      }
    });
  } else {
    alert("Please enter Licence Key");
  }
}
function WocptDeActivateLicenceKey(slug) {
  var plugins_slug = slug;
  var formSelector = '#fw-settings-form:theme-settings',
    title = jQuery('#fw-backend-option-fw-option-woffice_cpt_key_deactivate_message .fw-backend-option-desc .fw-inner').text(),
    description = jQuery('#fw-backend-option-fw-option-woffice_cpt_loading_extra_message .fw-backend-option-desc .fw-inner').text(),
    loadingModalId = 'fw-options-ajax-save-loading';

  jQuery(formSelector).addClass('prevent-all-tabs-init');
  fw.soleModal.show(
    loadingModalId,
    '<h2 class="fw-text-muted">' +
    '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAAAAACo4kLRAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAnRSTlMA/1uRIrUAAAACYktHRADdUu+NWwAAAAd0SU1FB+EKCgYABDchIukAAACZelRYdFJhdyBwcm9maWxlIHR5cGUgZ2lmOnhtcCBkYXRheG1wAAAImU2NMQ5CMQxD957iHyGNnaTlNkVtEQMSAwPHJx8WHMleXuxyu+/L+/E85niNzHJ85b1gRwvx6vCrWxCGBkdNF1WVaD5DODkx2H0Fgkmv5I2dxFQ9mRKiy3seMdBZCZ4lnUqjQYj/GRW3LPm95w42VvkACzYml9QYNjwAAACjSURBVBjTfZChDoNAEETfbZpgVqJPXHIO0w+hCZYPxJKUD6mpIzmBPrmmigoQcCSM2eRlszM7buWqxzbSd8Y0NgEAtwJ5WvYd39Y7TKOB7xkW0C6AQB4N6KuqB2zMIDDZ0cQmENJ2b8i/AYAl4db3pwj0fAlzmXJGsBIagl4/kitShFjCiNCUsEEI/sx8QKA9WWkLAnV3oNrVN9VtJZtyKrnUH9vgMmhlXVedAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDE3LTEwLTEwVDA2OjAwOjA0LTA3OjAw4kWx4AAAACV0RVh0ZGF0ZTptb2RpZnkAMjAxNy0xMC0xMFQwNjowMDowNC0wNzowMJMYCVwAAAAASUVORK5CYII=" alt="Loading" class="wp-spinner" /> ' +
    title +
    '</h2>' +
    '<p class="fw-text-muted"><em>' + description + '</em></p>',
    {
      autoHide: 60000,
      allowClose: false
    }
  );
  var ajaxurl_plugins = ajax_url['ajax_url'];
  var plugins_key = jQuery('#fw-option-' + plugins_slug).val();
  if (plugins_key) {
    var data = {
      'action': 'woffice_plugins_licence_deactivate',
      'plugins_key': plugins_key,
      'plugins_slug': plugins_slug
    };
    jQuery.post(ajaxurl_plugins, data, function (response) {
      var response_obj = JSON.parse(response);
      if (response_obj) {
        if (response_obj.type == 'success') {
          var license_data = response_obj.license_data;
          if (license_data.license == 'deactivated' || license_data.license == 'failed') {
            jQuery('#fw-option-'+ response_obj.plugins_slug +'_status').val(license_data.license);
            jQuery('#fw-backend-option-fw-option-'+ response_obj.plugins_slug +'_deactivate').hide();
            jQuery('#fw-backend-option-fw-option-'+ response_obj.plugins_slug +'_activate').show();
          }
        }
        fw.soleModal.hide(loadingModalId);
        jQuery(formSelector).addClass('prevent-all-tabs-init');
        fw.soleModal.show(
          loadingModalId,
          '<h3 class="fw-text-muted">' + response_obj.message + '</h3>',
          {
            autoHide: 10000,
            allowClose: true
          }
        );
      }
    });
  } else {
    alert("Please enter Licence Key");
  }
}