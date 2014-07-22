<?php

/**
 * @file
 * Builds placeholder replacement tokens for HybridAuth-related data.
 */

/**
 * Implements hook_token_list().
 */
function hybridauth_token_list($type = 'all') {
  $tokens = array();

  if ($type == 'user' || $type == 'all') {
    foreach (hybridauth_fields_list() as $key => $value) {
      $tokens['user']['hybridauth_' . $key] = $value . ' ' . t('provided by HybridAuth.');
    }
  }
  if ($type == 'hybridauth' || $type == 'all') {
    foreach (hybridauth_fields_list() as $key => $value) {
      $tokens['hybridauth'][$key] = $value . ' ' . t('provided by HybridAuth.');
    }
  }

  return $tokens;
}

/**
 * Implements hook_token_values().
 */
function hybridauth_token_values($type, $object = NULL, $options = array()) {
  global $hybridauth_data;
  $values = array();

  if ($type == 'user') {
    if (!empty($hybridauth_data)) { //for just created user
      $data = $hybridauth_data;
    }
    elseif (!empty($object->hybridauth)) { //for existing user
      $data = $object->hybridauth;
    }

    if (!empty($data)) {
      foreach (hybridauth_fields_list() as $key => $value) {
        $values['hybridauth_' . $key] = $data[$key];
      }
    }
  }
  if ($type == 'hybridauth') {
    $data = $object;
    if (!empty($data)) {
      foreach (hybridauth_fields_list() as $key => $value) {
        $values[$key] = $data[$key];
      }
    }
  }

  return $values;
}
