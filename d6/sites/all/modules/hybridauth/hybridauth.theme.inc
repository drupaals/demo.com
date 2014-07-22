<?php

function template_preprocess_hybridauth_widget(&$vars) {
  $element = $vars['element'];
  $providers = array();
  if ($element['#hybridauth_destination']) {
    $query = array('destination' => $element['#hybridauth_destination']);
  }
  else {
    $query = drupal_get_destination();
  }

  if ($element['#hybridauth_widget_type'] == 'list') {
    foreach (hybridauth_get_enabled_providers() as $provider_id => $provider_name) {
      $providers[] = l(
        theme('hybridauth_provider_icon', $element['#hybridauth_widget_icon_pack'], $provider_id, $provider_name),
        'hybridauth/popup/' . $provider_id,
        array(
          'html' => TRUE,
          'query' => $query,
          'attributes' => array(
            'title' => $provider_name,
            'class' => 'hybridauth-widget-provider',
            'rel' => 'nofollow',
          ),
        )
      );
    }
  }
  else {
    $provider_id = 'none';
    if ($element['#hybridauth_widget_use_overlay']) {
      $class = 'ctools-use-modal ctools-modal-hybridauthmodal';
      ctools_include('modal');
      ctools_modal_add_js();
      $settings = array(
        'hybridauthmodal' => array(
          'modalSize' => array(
            'type' => 'scale',
            'width' => '400px',
            'height' => '200px',
            'addWidth' => 0,
            'addHeight' => 0,
            'contentRight' => 25,
            'contentBottom' => 45,
          ),
          'modalTheme' => 'HybridAuthModalDialog',
          //'throbberTheme' => 'HybridAuthModalThrobber',
          'modalOptions' => array(
            'opacity' => 0.55,
            'background' => '#000',
          ),
          'animation' => 'fadeIn',
          'animationSpeed' => 'slow',
          'closeText' => t('Close'),
          'closeImage' => '',
          //'loadingText' => t('Loading...'),
          //'throbber' => theme('image', array(
          //  'path' => ctools_image_path('throbber.gif'),
          //  'title' => t('Loading...'),
          //  'alt' => t('Loading'),
          //)),
        ),
      );
      drupal_add_js($settings, 'setting');
    }

    $providers[] = l(
      ($element['#hybridauth_widget_type'] == 'link') ?
        $element['#hybridauth_widget_link_text'] :
        theme('hybridauth_provider_icon', $element['#hybridauth_widget_icon_pack'], $provider_id, $element['#hybridauth_widget_link_title']),
      'hybridauth/providers/nojs',
      array(
        'html' => TRUE,
        'query' => $query,
        'attributes' => array(
          'title' => $element['#hybridauth_widget_link_title'],
          'class' => $class,
          'rel '=> 'nofollow',
        ),
      )
    );
  }

  _hybridauth_add_icon_pack_files($element['#hybridauth_widget_icon_pack']);
  drupal_add_js(drupal_get_path('module', 'hybridauth') . '/js/hybridauth.js');
  drupal_add_css(drupal_get_path('module', 'hybridauth') . '/css/hybridauth.css');
  
  $vars['providers'] = $providers;
}

function template_preprocess_hybridauth_provider_icon(&$vars) {
  _hybridauth_add_icon_pack_files($vars['icon_pack']);
  if (!isset($vars['provider_name'])) {
    $vars['provider_name'] = hybridauth_get_provider_name($vars['provider_id']);
  }
}
