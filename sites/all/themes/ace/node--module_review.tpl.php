<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "ur-dd988ab-74af-dc9b-7657-3556c57fea64", doNotHash: false, doNotCopy: true, hashAddressBar: false, minorServices:false});</script>
<?php
if(arg(0) ==  "node"){
    global $base_url; $themepath = $base_url.'/'.path_to_theme();
if(!empty($node->field_drupal_module_link)){
	//Recommended releases
	$str = file_get_contents($node->field_drupal_module_link['und'][0]['value'].'/release/feed');
	echo "<pre>";
	print_r($str);
	echo "</pre>";
	//$substr=substr(explode("view-project-release-files",$str)[1], 173);
	////Other releases
	//$substr1=substr(explode("view-project-release-files",$str)[2], 173);
	//$drupal_download='<div class="drupal-download"><h4>Recommended releases</h4>'.htmlspecialchars_decode(substr($substr, 0,2515)).'</div>
	//
	//		 </ br></ br><div class="drupal-dev-download" style="margin-top: 25px;"><h4>Other releases</h4>'.htmlspecialchars_decode(substr($substr1, 0,2515)).'
	//		 <div class="see-all-releases"><h4 style="text-decoration: underline; color: rgb(66, 139, 202);">'.l('See all releases', $node->field_drupal_module_link['und'][0]['value'].'/release', array('attributes'=>array('target'=>'_blank'))).'</h4></div><hr>';
	//}
}
    print $str;
	
}