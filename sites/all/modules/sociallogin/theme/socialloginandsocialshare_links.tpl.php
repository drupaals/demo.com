<?php
/**
 * Theme social links.
 **/
$api_key = trim(variable_get('socialloginandsocialshare_apikey'));
$my_settings = array(
  'interfacesize' => $interfaceiconsize,
  'lrinterfacebackground' => $interfacebackgroundcolor,
  'noofcolumns' => $interfacerow,
  'apikey' => $api_key,
  'location' => $loc,
);
if (!empty($api_key)) {
  drupal_add_js(array('lrsociallogin' => $my_settings), 'setting');
  /* drupal_add_js(url(drupal_get_path('module', 'socialloginandsocialshare')) . '/js/sociallogin_interface.js', array(
       'type' => 'external',
       'scope' => 'footer',
       'weight' => 7
     ));*/
}
if (!empty($api_key)) {
  ?>
  <script type="text/javascript"
          src="<?php print $GLOBALS['base_url'] ?>/<?php echo drupal_get_path('module', 'socialloginandsocialshare') ?>/js/sociallogin_interface.js">
  </script>
<?php
}
?>
<div class="interfacecontainerdiv"></div>
