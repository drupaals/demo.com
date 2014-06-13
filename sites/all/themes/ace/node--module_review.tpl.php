<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "ur-dd988ab-74af-dc9b-7657-3556c57fea64", doNotHash: false, doNotCopy: true, hashAddressBar: false, minorServices:false});</script>
<?php
if(arg(0) ==  "node"){
    global $base_url; $themepath = $base_url.'/'.path_to_theme();
    drupal_add_css(drupal_get_path('theme', 'ace') .'/css/innerpage.css', 'file');
    drupal_add_css(drupal_get_path('theme', 'ace') .'/css/slider.css', 'file');
    drupal_add_css(drupal_get_path('module','fivestar').'/css/fivestar.css');
    $page_url = drupal_lookup_path('alias',"node/".$node->nid);
    $result = db_select('comment')
		->fields('comment', array('cid'))
		->condition('nid', $node->nid, '=')
		->countQuery()->execute()->fetchField();
		
    if($node->field_module_rating['und'][0]['user'] > 0){
	if($node->field_module_rating['und'][0]['user'] == 20){
	     $rating='<div class="fivestar-default"><div class="fivestar-widget-static fivestar-widget-static-vote fivestar-widget-static-5 clearfix"><div class="star star-1 star-odd star-first"><span class="on">1</span></div><div class="star star-2 star-even"><span class="off"></span></div><div class="star star-3 star-odd"><span class="off"></span></div><div class="star star-4 star-even"><span class="off"></span></div><div class="star star-5 star-odd star-last"><span class="off"></span></div></div></div>';
	     $rating_count= 1;
	}elseif($node->field_module_rating['und'][0]['user'] == 40){
	     $rating='<div class="fivestar-default"><div class="fivestar-widget-static fivestar-widget-static-vote fivestar-widget-static-5 clearfix"><div class="star star-1 star-odd star-first"><span class="on">2</span></div><div class="star star-2 star-even"><span class="on"></span></div><div class="star star-3 star-odd"><span class="off"></span></div><div class="star star-4 star-even"><span class="off"></span></div><div class="star star-5 star-odd star-last"><span class="off"></span></div></div></div>';
	    $rating_count= 2;
	}elseif($node->field_module_rating['und'][0]['user'] == 60){
	     $rating='<div class="fivestar-default"><div class="fivestar-widget-static fivestar-widget-static-vote fivestar-widget-static-5 clearfix"><div class="star star-1 star-odd star-first"><span class="on">3</span></div><div class="star star-2 star-even"><span class="on"></span></div><div class="star star-3 star-odd"><span class="on"></span></div><div class="star star-4 star-even"><span class="off"></span></div><div class="star star-5 star-odd star-last"><span class="off"></span></div></div></div>';
	    $rating_count= 3;
	}elseif($node->field_module_rating['und'][0]['user'] == 80){
	     $rating='<div class="fivestar-default"><div class="fivestar-widget-static fivestar-widget-static-vote fivestar-widget-static-5 clearfix"><div class="star star-1 star-odd star-first"><span class="on">4</span></div><div class="star star-2 star-even"><span class="on"></span></div><div class="star star-3 star-odd"><span class="on"></span></div><div class="star star-4 star-even"><span class="on"></span></div><div class="star star-5 star-odd star-last"><span class="off"></span></div></div></div>';
	    $rating_count= 4;
	}elseif($node->field_module_rating['und'][0]['user'] == 100){
	    $rating='<div class="fivestar-default"><div class="fivestar-widget-static fivestar-widget-static-vote fivestar-widget-static-5 clearfix"><div class="star star-1 star-odd star-first"><span class="on">5</span></div><div class="star star-2 star-even"><span class="on"></span></div><div class="star star-3 star-odd"><span class="on"></span></div><div class="star star-4 star-even"><span class="on"></span></div><div class="star star-5 star-odd star-last"><span class="on"></span></div></div></div>'; 
	    $rating_count= 5;
	}
    }else{$rating='<div class="fivestar-widget clearfix fivestar-widget-5"><div class="star star-1 odd star-first"><a title="Give it 1/5" href="#20">Give it 1/5</a></div><div class="star star-2 even"><a title="Give it 2/5" href="#40">Give it 2/5</a></div><div class="star star-3 odd"><a title="Give it 3/5" href="#60">Give it 3/5</a></div><div class="star star-4 even"><a title="Give it 4/5" href="#80">Give it 4/5</a></div><div class="star star-5 odd star-last"><a title="Give it 5/5" href="#100">Give it 5/5</a></div></div>';
	    $rating_count= 0;
    }
	$tid_name="";
	foreach($node->field_module_category['und'] as $tid){
	    $tid_name.= taxonomy_term_load($tid['tid'])->name.', ';
	}
	$num = explode(',',$tid_name); $j=2; $tgs='';
	foreach($num as $nums){if($j<count($num)) $comma = ', '; else $comma = '';  $tgs .= $nums.$comma; $j++;}
	//D6 link condition
	if($node->field_demo_link_d6['und'][0]['url']){
	    $d6_link=l($node->field_demo_link_d6['und'][0]['title'], $node->field_demo_link_d6['und'][0]['url'], array('html' => TRUE,'attributes'=> array('target' => '_blank')));
	}else{$d6_link=$node->field_demo_link_d6['und'][0]['title'];}
	//D7 link condition
	if($node->field_demo_link_d7['und'][0]['url']){
	    $d7_link=l($node->field_demo_link_d7['und'][0]['title'], $node->field_demo_link_d7['und'][0]['url'], array('html' => TRUE,'attributes'=> array('target' => '_blank')));
	}else{$d7_link=$node->field_demo_link_d7['und'][0]['title'];}
	//D8 link condition
	if($node->field_demo_link_d8['und'][0]['url']){
	    $d8_link=l($node->field_demo_link_d8['und'][0]['title'], $node->field_demo_link_d8['und'][0]['url'], array('html' => TRUE,'attributes'=> array('target' => '_blank')));
	}else{$d8_link=$node->field_demo_link_d8['und'][0]['title'];}
    $output='<div class="details-info">
		<div class="cover-container">
		    <img height="150" width="200" src="'.$themepath.'/images/project.png" class="cover-image">
		</div>
		<span class="info-container">
		    <div itemprop="name" class="document-title"> <h3>'.$node->title.'</h3> </div>
		    <span><b>'.ucfirst(user_load($node->uid)->name).'</b>  -  '.date("F j,  Y",$node->created).'</span>
		    <div><b>Available version:</b>
			<div>
			    <div><b>D6: </b>'.$d6_link.'</div>
			    <div><b>D7: </b>'.$d7_link.'</div>
			    <div><b>D8: </b>'.$d8_link.'</div>
			</div>
		    </div>
		    <div><b>Module Category: </b>'.$tgs.'</div>
		    <hr>
		    <div style="width: 50%;">
			'.$rating.'
			<div class="stars-count"> (<span class="reviewers-small"></span>  '.$result.') </div>
			 <span style="float: right;" class="st_sharethis" displayText="Share this"  st_image= "'.$themepath.'/images/project.png"></span> 
		    </div><br><br>
		</span>
	    </div>';
	//screenshots image slider for d6
	if(!empty($node->field_screenshots_d6)){
	    $outputd6='<div id="ca-containerd6" class="ca-container"><h4 class="screenshots-title">Screenshots for D6</h4><div class="ca-wrapper">';
	    $i=1;
	    foreach($node->field_screenshots_d6['und'] as $key=>$value){
	
		    $outputd6.='<div class="ca-item ca-item-'.$i.'">
				    <div class="ca-item-main">
				    <a href="'.image_style_url("1000", $value['uri']).'" rel="lightbox[roadtrip]">
					'.theme_image_style(array('style_name'=>'slider', 'path'=>$value['uri'], 'width'=>'', 'height'=>'')).'
				    </a>
				    </div>   
				</div>';                                 
		$i++;  
	    }
	    $outputd6.='</div></div>';
	}else{$outputd6="";}
	//screenshots image slider for d7
	if(!empty($node->field_screenshots_d7)){
	    $outputd7='<div id="ca-containerd7" class="ca-container screenshotsD7"><h4 class="screenshots-title">Screenshots for D7</h4><div class="ca-wrapper">';
	    $d=1;
	    foreach($node->field_screenshots_d7['und'] as $key=>$value_d7){
		    $outputd7.='<div class="ca-item ca-item-'.$d.'">
				    <div class="ca-item-main">
				    <a href="'.image_style_url("1000", $value_d7['uri']).'" rel="lightbox[roadtrip1]">
					'.theme_image_style(array('style_name'=>'slider', 'path'=>$value_d7['uri'], 'width'=>'', 'height'=>'')).'
				    </a>
				    </div>   
				</div>';                                 
		$d++;  
	    }
	$outputd7.='</div></div>';
	}else{$outputd7="";}
	//screenshots image slider for d8
	if(!empty($node->field_screenshots_d8)){
	    $outputd8='<div id="ca-containerd8" class="ca-container screenshotsD8"><h4 class="screenshots-title">Screenshots for D8</h4><div class="ca-wrapper">';
	    $d8=1;
	    foreach($node->field_screenshots_d8['und'] as $key=>$value_d8){
	
		    $outputd8.='<div class="ca-item ca-item-'.$d8.'">
				    <div class="ca-item-main">
				    <a href="'.image_style_url("1000", $value_d8['uri']).'" rel="lightbox[roadtrip2]">
					'.theme_image_style(array('style_name'=>'slider', 'path'=>$value_d8['uri'], 'width'=>'', 'height'=>'')).'
				    </a>
				    </div>   
				</div>';                                 
		$d8++;  
	    }
	    $outputd8.='</div></div>';
	}else{$outputd8="";}
	//Description condition
	if(!empty($node->body)){$body=$node->body['und'][0]['value'];}else{$body="No description";}
	//Rating condition in review section
	if($node->cid){
	    $review_comm_description="";
	    $comment_result = db_select('comment')
		->fields('comment', array('cid'))
		->condition('nid', $node->nid, '=')
		->execute();
	    foreach($comment_result as $key=>$cid){
		$comment_load=comment_load($cid->cid);
		$comment_description=$comment_load->comment_body['und'][0]['value'];
		$user_profile=user_load($comment_load->uid);
		if(!empty($user_profile->picture)){
		     $user_img=theme_image_style(array('style_name'=>'48x48', 'path'=>$user_profile->picture->uri, 'width'=>'', 'height'=>'', 'alt'=>$user_profile->name, 'title'=>$user_profile->name));
		}else{
		     $user_img=theme("image", array('path' => path_to_theme().'/images/user.png',  'alt'=>$user_profile->name, 'title'=>$user_profile->name,  'width' => 48,    'height' => 48));
		}
		if(!empty($comment_load->field_rating)){
		     if($comment_load->field_rating['und'][0]['rating'] == 20){
			  $rating1='<div class="fivestar-default"><div class="fivestar-widget-static fivestar-widget-static-vote fivestar-widget-static-5 clearfix"><div class="star star-1 star-odd star-first"><span class="on">1</span></div><div class="star star-2 star-even"><span class="off"></span></div><div class="star star-3 star-odd"><span class="off"></span></div><div class="star star-4 star-even"><span class="off"></span></div><div class="star star-5 star-odd star-last"><span class="off"></span></div></div></div>';
		     }elseif($comment_load->field_rating['und'][0]['rating'] == 40){
			  $rating1='<div class="fivestar-default"><div class="fivestar-widget-static fivestar-widget-static-vote fivestar-widget-static-5 clearfix"><div class="star star-1 star-odd star-first"><span class="on">2</span></div><div class="star star-2 star-even"><span class="on"></span></div><div class="star star-3 star-odd"><span class="off"></span></div><div class="star star-4 star-even"><span class="off"></span></div><div class="star star-5 star-odd star-last"><span class="off"></span></div></div></div>';
		     }elseif($comment_load->field_rating['und'][0]['rating'] == 60){
			  $rating1='<div class="fivestar-default"><div class="fivestar-widget-static fivestar-widget-static-vote fivestar-widget-static-5 clearfix"><div class="star star-1 star-odd star-first"><span class="on">3</span></div><div class="star star-2 star-even"><span class="on"></span></div><div class="star star-3 star-odd"><span class="on"></span></div><div class="star star-4 star-even"><span class="off"></span></div><div class="star star-5 star-odd star-last"><span class="off"></span></div></div></div>';
		     }elseif($comment_load->field_rating['und'][0]['rating'] == 80){
			  $rating1='<div class="fivestar-default"><div class="fivestar-widget-static fivestar-widget-static-vote fivestar-widget-static-5 clearfix"><div class="star star-1 star-odd star-first"><span class="on">4</span></div><div class="star star-2 star-even"><span class="on"></span></div><div class="star star-3 star-odd"><span class="on"></span></div><div class="star star-4 star-even"><span class="on"></span></div><div class="star star-5 star-odd star-last"><span class="off"></span></div></div></div>';
		     }
		     elseif($comment_load->field_rating['und'][0]['rating'] == 100){
			 $rating1='<div class="fivestar-default"><div class="fivestar-widget-static fivestar-widget-static-vote fivestar-widget-static-5 clearfix"><div class="star star-1 star-odd star-first"><span class="on">5</span></div><div class="star star-2 star-even"><span class="on"></span></div><div class="star star-3 star-odd"><span class="on"></span></div><div class="star star-4 star-even"><span class="on"></span></div><div class="star star-5 star-odd star-last"><span class="on"></span></div></div></div>'; 
		     }
		     
		     
		}else{$rating1='<div class="fivestar-widget clearfix fivestar-widget-5"><div class="star star-1 odd star-first"><a title="Give it 1/5" href="#20">Give it 1/5</a></div><div class="star star-2 even"><a title="Give it 2/5" href="#40">Give it 2/5</a></div><div class="star star-3 odd"><a title="Give it 3/5" href="#60">Give it 3/5</a></div><div class="star star-4 even"><a title="Give it 4/5" href="#80">Give it 4/5</a></div><div class="star star-5 odd star-last"><a title="Give it 5/5" href="#100">Give it 5/5</a></div></div>';}
		$review_comm_description.='<div id="review-comment">
					    <div class="author">'.$user_img.'</div>
					    <div class="review-cooment-desc"> <span class="author-name"><b>'.ucfirst($user_profile->name).'</b></span> <div class="featured-review-star-rating">'.$rating1.'</div>'.$comment_description.'</div>
					</div>';
	    }
	}else{$review_comm_description="";}
	//user login or not condition
	if(user_is_logged_in()){
	    $comment_link=' <p class="big-link" data-reveal-id="myModal" data-animation="none"> Write a Review </p>';
	}else{
		$node_url=drupal_get_destination();
		$output_url=$node_url['destination'];
		$comment_link=' <a href="#" class="big-link" data-reveal-id="myModal" data-animation="none">Write a Review </a>
				<div id="myModal" class="reveal-modal">
				    <div id="anno-user" style="text-align: center;">'.l('Login', 'user' , array('query' => array('destination' => $output_url))).'  |  '.l('Register', 'user/register' , array('query' => array('destination' => $output_url))).'</div>
				<a class="close-reveal-modal">&#215;</a>
				</div>';
	    }
	$output_description='<div class="details-section description simple contains-text-link"><hr><h4>Description</h4><div>'.$body.'</div></div><hr></div>';
	if(!empty($node->field_drupal_module_link)){
	//Recommended releases
	$str = file_get_contents($node->field_drupal_module_link['und'][0]['value'].'/release/feed');
	    if($str){
		$substr=explode("view-project-release-files",$str);
		echo "<pre>";
		print_r(substr($substr[1],173));
		echo "</pre>";
		echo htmlspecialchars_decode(substr(substr($substr[1],173)), 0,2515);
		//Other releases
	//	$substr1=explode("view-project-release-files",$str);
	//	$drupal_download='<div class="drupal-download"><h4>Recommended releases</h4>'.htmlspecialchars_decode(substr($substr, 0,2515)).'</div>
	//    
	//		 </ br></ br><div class="drupal-dev-download" style="margin-top: 25px;"><h4>Other releases</h4>'.htmlspecialchars_decode(substr($substr1, 0,2515)).'
	//		 <div class="see-all-releases"><h4 style="text-decoration: underline; color: rgb(66, 139, 202);">'.l('See all releases', $node->field_drupal_module_link['und'][0]['value'].'/release', array('attributes'=>array('target'=>'_blank'))).'</h4></div><hr>';
	    }else{$drupal_download="";}
	}
	$output_review='<div class="details-section description simple contains-text-link"><h4>Reviews '.$comment_link.'</h4>
				 <div id="module-comment">
				'.render($content['comments']).'
			    </div>
			    <div id="review-inner">
				<div id="review-rating">
				    <h1 style="text-align: center;">'.$rating_count.'</h1>
				    '.$rating.'
				    <div class="stars-count"> (<span class="reviewers-small"></span>  '.$result.' total) </div>
				</div>
				<div id="review-comment-section">
				'.$review_comm_description.'
				</div>
			    </div>';
    print $output.''.$outputd6.''.$outputd7.''.$outputd8.$output_description.$drupal_download.$output_review;
    drupal_add_js(drupal_get_path('theme', 'ace') .'/js/jquery.contentcarousel.js', 'file');
    drupal_add_js(drupal_get_path('theme', 'ace') .'/js/jquery.easing.1.3.js', 'file');
    drupal_add_js(drupal_get_path('theme', 'ace') .'/js/jquery.reveal.js', 'file');
    drupal_add_css(drupal_get_path('theme', 'ace') .'/css/reveal.css', 'file');
    drupal_add_js("jQuery(document).ready(function(){jQuery('#ca-containerd6').contentcarousel(); });",'inline');
    drupal_add_js("jQuery(document).ready(function(){jQuery('#ca-containerd7').contentcarousel(); });",'inline');
    drupal_add_js("jQuery(document).ready(function(){jQuery('#ca-containerd8').contentcarousel(); });",'inline');
}