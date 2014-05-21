<?php
drupal_add_css(drupal_get_path('module','fivestar').'/css/fivestar.css');
$db_query=db_query("SELECT DISTINCT node.title AS node_title, node.nid AS nid, node.created AS node_created
                    FROM 
                    {node} node
                    INNER JOIN (SELECT td.*, tn.nid AS nid
                    FROM 
                    {taxonomy_term_data} td
                    INNER JOIN {taxonomy_vocabulary} tv ON td.vid = tv.vid
                    INNER JOIN {taxonomy_index} tn ON tn.tid = td.tid
                    WHERE  (tv.machine_name IN  ('module_category')) ) taxonomy_term_data_node ON node.nid = taxonomy_term_data_node.nid
                    WHERE (( (node.status = '1') AND (node.type IN  ('module_review')) AND (taxonomy_term_data_node.tid = ".$tid.") ))
                    ORDER BY node_created DESC
                    LIMIT 30 OFFSET 0");
$output="";

foreach($db_query as $key=>$result){
    $node=node_load($result->nid);
    //module catagory
    $tid_name="";
    foreach($node->field_module_category['und'] as $tid){
	$tid_name.= taxonomy_term_load($tid['tid'])->name.', ';
    }
    $num = explode(',',$tid_name); $j=2; $tgs='';
    foreach($num as $nums){if($j<count($num)) $comma = ', '; else $comma = '';  $tgs .= $nums.$comma; $j++;}
    //fivestar rating
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
    //Available version
    $version_results="";
    if(!empty($node->field_module_version)){
	       foreach($node->field_module_version['und'] as $key=>$module_version){
		    $version=taxonomy_term_load($module_version['tid']);
		    $tid_name=substr($version->name, 0 , 1);
		    $version_results.=$tid_name.',';  
	       }
	  }

	  $nums= explode(',',$version_results);
          $num_filter=array_filter($nums);$r=1; $tgss='';          
	  foreach($num_filter as $numss){if($r<count($num_filter)) $commas= ', '; else $commas= '';  $tgss.= 'D'.$numss.$commas; $r++;}
	  
    $output.='<span id="grid">
                <h3>'.l($node->title, 'node/'.$node->nid).'</h3>
                <div class="user-name">By <b>'.ucfirst(user_load($node->uid)->name).'</b>  -  '.date("F j,  Y",$node->created).'</div>
                <div class="available-version"><b>Available version: </b>'.$tgss.'</div>
                <div class="module-catagory"><b>Module Category: </b><span>'.$tgs.'</span></div>
                <div class="rating-star">'.$rating.'</div>
            </span>';
}
print $output;