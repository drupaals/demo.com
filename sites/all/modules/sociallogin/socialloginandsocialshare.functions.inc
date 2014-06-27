<?php
/**
 * @file
 * User page callbacks for the socialloginandsocialshare module.
 */
/**
 * Menu callback Manage socialloginandsocialshare identities for the specified user.
 */
function socialloginandsocialshare_user_identities_submit($form, $account, $token) {
  $user_title = format_username($account);
  drupal_set_title(check_plain($user_title));
  $obj = new LoginRadius();
  if (user_is_logged_in() && $obj->loginradius_is_valid_guid($token)) {
    $secret = trim(variable_get('socialloginandsocialshare_apisecret'));
    // $userprofile = $obj->loginradius_get_data($secret, $api_handler, $token);
    $userprofile = $obj->loginradius_get_user_profiledata($token);
    if (isset($userprofile->ID) && $userprofile->ID != '' && user_is_logged_in()) {
      $lrdata = socialloginandsocialshare_getuser_data($userprofile);
      $authname_exist = db_query("SELECT authname FROM {authmap} am INNER JOIN {socialloginandsocialshare_mapusers} sm ON am.aid = sm.aid WHERE authname = :lrid", array(
        ':lrid' => $lrdata['id'],
      ))->fetchField();
      $result = db_query("SELECT provider FROM {authmap} am INNER JOIN {socialloginandsocialshare_mapusers} sm ON am.aid = sm.aid WHERE module = :module AND uid = :uid", array(
        ':module' => 'socialloginandsocialshare',
        ':uid' => $account->uid
      ));
      $mapped = '';
      foreach ($result as $identity) {
        if ($identity->provider == $lrdata['provider']) {
          $mapped = 'yes';
        }
      }
      if (empty($authname_exist) && !$authname_exist) {
        if ($mapped != 'yes') {
          $query = db_delete('authmap')
            ->condition('authname', $lrdata['id'])
            ->execute();
          db_insert('authmap')
            ->fields(array(
              'uid' => $account->uid,
              'authname' => $lrdata['id'],
              'module' => 'socialloginandsocialshare',
            ))
            ->execute();
          if (variable_get('socialloginandsocialshare_update_profile') == 1) {
            if (variable_get('user_pictures') == 1 && !empty($lrdata['thumbnail'])) {
              socialloginandsocialshare_insert_picture($lrdata, $account);
            }
          }
          $aid = db_query('SELECT aid FROM {authmap} WHERE authname = :id', array('id' => $lrdata['id']))->fetchField();
          $check_aid = db_query('SELECT aid FROM {socialloginandsocialshare_mapusers} WHERE aid = :id', array('id' => $aid))->fetchField();
          if (!empty($check_aid)) {
            $query2 = db_delete('socialloginandsocialshare_mapusers')
              ->condition('aid', $aid)
              ->execute();
          }
          db_insert('socialloginandsocialshare_mapusers')
            ->fields(array(
              'aid' => $aid,
              'provider' => $lrdata['provider'],
              'provider_id' => $lrdata['id'],
            ))
            ->execute();
          drupal_set_message(t("Your account sucessfully mapped with this account."));
        }
        else {
          drupal_set_message(t("This social ID is already linked with an account. Kindly unmap the current ID before linking new Social ID."), 'warning');
        }
      }
      else {
        drupal_set_message(t("This account is already linked with an account. try to choose another account."), 'warning');
      }
    }
    drupal_redirect_form($form, $redirect = NULL);
  }

}


/**
 * Menu callback Delete the specified socialloginandsocialshare identity from the system.
 */
function socialloginandsocialshare_user_delete_form($form, $form_state, $account, $lrid = 0) {

  $provider = db_query("SELECT provider FROM {authmap} am INNER JOIN {socialloginandsocialshare_mapusers} sm ON am.aid = sm.aid WHERE uid = :uid AND am.authname = :authname AND module = 'socialloginandsocialshare'", array(
    ':uid' => $account->uid,
    ':authname' => $lrid,
  ))
    ->fetchField();
  return confirm_form(array(), t('Are you sure you want to delete the Social Login %provider for %user?', array(
      '%provider' => $provider,
      '%user' => $account->name
    )), 'user/' . $account->uid . '/delete');
}

/**
 * Menu callback Delete form submit for socialloginandsocialshare identity from the system.
 */
function socialloginandsocialshare_user_delete_form_submit($form, &$form_state) {
  $provider = db_query("SELECT provider FROM {authmap} am INNER JOIN {socialloginandsocialshare_mapusers} sm ON am.aid = sm.aid WHERE uid = :uid AND am.authname = :authname AND module = 'socialloginandsocialshare'", array(
    ':uid' => $form_state['build_info']['args'][0]->uid,
    ':authname' => $form_state['build_info']['args'][1],
  ))
    ->fetchField();
  $query = db_delete('authmap')
    ->condition('uid', $form_state['build_info']['args'][0]->uid)
    ->condition('authname', $form_state['build_info']['args'][1])
    ->condition('module', 'socialloginandsocialshare')
    ->execute();
  $query2 = db_delete('socialloginandsocialshare_mapusers')
    ->condition('provider_id', $form_state['build_info']['args'][1])
    ->execute();
  if ($query && $query2) {
    drupal_set_message(t('Your social login identity for %provider sucessfully deleted.', array('%provider' => $provider)));
  }
  else {
    drupal_set_message(t('We were unable to delete the linked %provider account.', array('%provider' => $provider->provider)), 'error');
  }
  $form_state['redirect'] = 'user/' . $form_state['build_info']['args'][0]->uid . '/edit';
}