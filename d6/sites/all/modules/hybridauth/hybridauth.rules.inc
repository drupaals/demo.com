<?php
/**
 * @file
 * Functions for integrating the Rules module with HybridAuth.
 */

/**
 * Implements hook_rules_data_type_info().
 * @ingroup rules
 */
function hybridauth_rules_data_type_info() {
  return array(
    'hybridauth' => array(
      'label' => 'HybridAuth identity data',
      'class' => 'rules_data_type_hybridauth',
      'identifiable' => TRUE,
      'savable' => FALSE,
      'uses_input_form' => FALSE,
      //'token type' => 'hybridauth',
      'module' => 'hybridauth',
    ),
  );
}

/**
 * Defines the rules hybridauth data type.
 */
class rules_data_type_hybridauth extends rules_data_type {

  function load($id) {
    return _hybridauth_identity_load_by_id($id);
  }

  function get_identifier() {
    $hybridauth = &$this->get();
    return $hybridauth['id'];
  }
}

/**
 * Implements hook_rules_event_info().
 * @ingroup rules
 */
function hybridauth_rules_event_info() {
  $events = array();

  $events['hybridauth_identity_added'] = array(
    'label' => t('User added HybridAuth identity'),
    'module' => t('HybridAuth'),
    'arguments' => array(
      'hybridauth_user' => array(
        'label' => t('User adding the identity'),
        'type' => 'user',
      ),
      'hybridauth' => array(
        'label' => t('HybridAuth identity data'),
        'type' => 'hybridauth',
      ),
    ),
    //'help' => '',
  );
  $events['hybridauth_identity_deleted'] = array(
    'label' => t('User deleted HybridAuth identity'),
    'module' => t('HybridAuth'),
    'arguments' => array(
      'hybridauth_user' => array(
        'label' => t('User deleting the identity'),
        'type' => 'user',
      ),
      'hybridauth' => array(
        'label' => t('HybridAuth identity data'),
        'type' => 'hybridauth',
      ),
    ),
    //'help' => '',
  );
  $events['hybridauth_user_insert'] = array(
    'label' => t('User registered through HybridAuth'),
    'module' => t('HybridAuth'),
    'arguments' => array(
      'hybridauth_user' => array(
        'label' => t('registered user'),
        'type' => 'user',
      ),
      'hybridauth' => array(
        'label' => t('HybridAuth identity data'),
        'type' => 'hybridauth',
      ),
    ),
    //'help' => '',
  );
  $events['hybridauth_user_login'] = array(
    'label' => t('User logged in through HybridAuth'),
    'module' => t('HybridAuth'),
    'arguments' => array(
      'hybridauth_user' => array(
        'label' => t('logged in user'),
        'type' => 'user',
      ),
      'hybridauth' => array(
        'label' => t('HybridAuth identity data'),
        'type' => 'hybridauth',
      ),
    ),
    //'help' => '',
  );

  return $events;
}

/**
 * Implements hook_rules_condition_info().
 * @ingroup rules
 */
function hybridauth_rules_condition_info() {
  $conditions = array();
  
  $conditions['hybridauth_user_created_hybridauth'] = array(
    'label' => t('User created by HybridAuth'),
    'module' => t('HybridAuth'),
    'arguments' => array(
      'account' => array('label' => t('User'), 'type' => 'user'),
    ),
    'help' => t('TRUE is returned if user account was created by HybridAuth.'),
  );
  
  return $conditions;
}

function hybridauth_user_created_hybridauth($account) {
  global $hybridauth_data;
  return (!empty($hybridauth_data) || !empty($account->hybridauth));
}
