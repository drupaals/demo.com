<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "ur-dd988ab-74af-dc9b-7657-3556c57fea64", doNotHash: false, doNotCopy: true, hashAddressBar: false, minorServices:false});</script>
<?php
global $base_url; $themepath = $base_url.'/'.path_to_theme();
drupal_add_css(drupal_get_path('theme', 'ace') .'/css/innerpage.css', 'file');
drupal_add_css(drupal_get_path('theme', 'ace') .'/css/slider.css', 'file');
drupal_add_css(drupal_get_path('module','fivestar').'/css/fivestar.css');
$page_url = drupal_lookup_path('alias',"node/".$node->nid);
if($node->field_module_rating['und'][0]['user'] > 0){
    if($node->field_module_rating['und'][0]['user'] == 20){
         $rating='<div class="fivestar-default"><div class="fivestar-widget-static fivestar-widget-static-vote fivestar-widget-static-5 clearfix"><div class="star star-1 star-odd star-first"><span class="on">1</span></div><div class="star star-2 star-even"><span class="off"></span></div><div class="star star-3 star-odd"><span class="off"></span></div><div class="star star-4 star-even"><span class="off"></span></div><div class="star star-5 star-odd star-last"><span class="off"></span></div></div></div>';
    }elseif($node->field_module_rating['und'][0]['user'] == 40){
         $rating='<div class="fivestar-default"><div class="fivestar-widget-static fivestar-widget-static-vote fivestar-widget-static-5 clearfix"><div class="star star-1 star-odd star-first"><span class="on">2</span></div><div class="star star-2 star-even"><span class="on"></span></div><div class="star star-3 star-odd"><span class="off"></span></div><div class="star star-4 star-even"><span class="off"></span></div><div class="star star-5 star-odd star-last"><span class="off"></span></div></div></div>';
    }elseif($node->field_module_rating['und'][0]['user'] == 60){
         $rating='<div class="fivestar-default"><div class="fivestar-widget-static fivestar-widget-static-vote fivestar-widget-static-5 clearfix"><div class="star star-1 star-odd star-first"><span class="on">3</span></div><div class="star star-2 star-even"><span class="on"></span></div><div class="star star-3 star-odd"><span class="on"></span></div><div class="star star-4 star-even"><span class="off"></span></div><div class="star star-5 star-odd star-last"><span class="off"></span></div></div></div>';
    }elseif($node->field_module_rating['und'][0]['user'] == 80){
         $rating='<div class="fivestar-default"><div class="fivestar-widget-static fivestar-widget-static-vote fivestar-widget-static-5 clearfix"><div class="star star-1 star-odd star-first"><span class="on">4</span></div><div class="star star-2 star-even"><span class="on"></span></div><div class="star star-3 star-odd"><span class="on"></span></div><div class="star star-4 star-even"><span class="on"></span></div><div class="star star-5 star-odd star-last"><span class="off"></span></div></div></div>';
    }
    elseif($node->field_module_rating['und'][0]['user'] == 100){
        $rating='<div class="fivestar-default"><div class="fivestar-widget-static fivestar-widget-static-vote fivestar-widget-static-5 clearfix"><div class="star star-1 star-odd star-first"><span class="on">5</span></div><div class="star star-2 star-even"><span class="on"></span></div><div class="star star-3 star-odd"><span class="on"></span></div><div class="star star-4 star-even"><span class="on"></span></div><div class="star star-5 star-odd star-last"><span class="on"></span></div></div></div>'; 
    }
}else{$rating='<div class="fivestar-widget clearfix fivestar-widget-5"><div class="star star-1 odd star-first"><a title="Give it 1/5" href="#20">Give it 1/5</a></div><div class="star star-2 even"><a title="Give it 2/5" href="#40">Give it 2/5</a></div><div class="star star-3 odd"><a title="Give it 3/5" href="#60">Give it 3/5</a></div><div class="star star-4 even"><a title="Give it 4/5" href="#80">Give it 4/5</a></div><div class="star star-5 odd star-last"><a title="Give it 5/5" href="#100">Give it 5/5</a></div></div>';}
	  
$output='<div class="details-info">
            <div class="cover-container">
                <img height="150" width="200" src="'.$themepath.'/images/project.png" class="cover-image">
            </div>
            <span class="info-container">
                <div itemprop="name" class="document-title"> <h3>'.$node->title.'</h3> </div>
                <span>Author name: '.ucfirst(user_load($node->uid)->name).'</span>
                <div class="module-download">Download: Download link</div>
                <div>Demo version available:
                    <div>
                        <span>D6: '.l($node->field_demo_link_d6['und'][0]['title'], $node->field_demo_link_d6['und'][0]['url'], array('html' => TRUE,'attributes'=> array('target' => '_blank'))).'</span>
                        <span>D7: '.l($node->field_demo_link_d7['und'][0]['title'], $node->field_demo_link_d7['und'][0]['url'], array('html' => TRUE,'attributes'=> array('target' => '_blank'))).'</span>
                        <span>D8: '.l($node->field_demo_link_d8['und'][0]['title'], $node->field_demo_link_d8['und'][0]['url'], array('html' => TRUE,'attributes'=> array('target' => '_blank'))).'</span>
                    </div>
                </div>
                <div>Module Category: '.taxonomy_term_load($node->field_module_category['und'][0]['tid'])->name.'</div>
                <hr>
                <div style="width: 50%;">
                    '.$rating.'
                    <div class="stars-count"> (<span class="reviewers-small"></span>  '.$node->comment.') </div>
                     <span style="float: right;" class="st_sharethis" displayText="Share this"  st_image= "'.$themepath.'/images/project.png"></span> 
                </div><br><br>
            </span>
        </div>';
    //screenshots image slider for d6
    if(!empty($node->field_screenshots_d6)){
	$outputd6='<div id="ca-containerd6" class="ca-container"><h3>Screenshot for d6</h3><div class="ca-wrapper">';
	$i=1;
	foreach($node->field_screenshots_d6['und'] as $key=>$value){
    
		$outputd6.='<div class="ca-item ca-item-'.$i.'">
				<div class="ca-item-main">
				<a href="'.$base_url.'/sites/default/files/d6/'.$value['filename'].'" rel="lightbox">
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
	$outputd7='<div id="ca-containerd7" class="ca-container screenshotsD7"><h3>Screenshot for d7</h3><div class="ca-wrapper">';
	$d=1;
	foreach($node->field_screenshots_d7['und'] as $key=>$value_d7){
    
		$outputd7.='<div class="ca-item ca-item-'.$d.'">
				<div class="ca-item-main">
				<a href="'.$base_url.'/sites/default/files/d7/'.$value_d7['filename'].'" rel="lightbox">
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
	$outputd8='<div id="ca-containerd8" class="ca-container screenshotsD8"><h3>Screenshot for d8</h3><div class="ca-wrapper">';
	$d8=1;
	foreach($node->field_screenshots_d8['und'] as $key=>$value_d8){
    
		$outputd8.='<div class="ca-item ca-item-'.$d8.'">
				<div class="ca-item-main">
				<a href="'.$base_url.'/sites/default/files/d8/'.$value_d8['filename'].'" rel="lightbox">
				    '.theme_image_style(array('style_name'=>'slider', 'path'=>$value_d8['uri'], 'width'=>'', 'height'=>'')).'
				</a>
				</div>   
			    </div>';                                 
	    $d8++;  
	}
	$outputd8.='</div></div>';
    }else{$outputd8="";}
    $output_description='<div class="details-section description simple contains-text-link"><hr><h3>Description</h3><div>'.$node->body['und'][0]['value'].'</div></div>';
    
print $output.''.$outputd6.''.$outputd7.''.$outputd8.$output_description;

drupal_add_js(drupal_get_path('theme', 'ace') .'/js/jquery.contentcarousel.js', 'file');
drupal_add_js(drupal_get_path('theme', 'ace') .'/js/jquery.easing.1.3.js', 'file');
drupal_add_js(drupal_get_path('theme', 'ace') .'/js/jquery.mousewheel.js', 'file');
drupal_add_js("jQuery(document).ready(function(){jQuery('#ca-containerd6').contentcarousel(); });",'inline');
drupal_add_js("jQuery(document).ready(function(){jQuery('#ca-containerd7').contentcarousel(); });",'inline');
drupal_add_js("jQuery(document).ready(function(){jQuery('#ca-containerd8').contentcarousel(); });",'inline');
