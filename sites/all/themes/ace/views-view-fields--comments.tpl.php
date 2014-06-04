<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */

     drupal_add_css(drupal_get_path('module','fivestar').'/css/fivestar.css');
        $comment_load=comment_load($row->comment_node_cid);
	  $user_profile=user_load($comment_load->uid);
	  //$created_date=date('j F Y h:i:s',$comment_load->created);
	  //echo time_elapsed_string($created_date);
	  if(!empty($user_profile->picture)){
	       $user_img=theme_image_style(array('style_name'=>'48x48', 'path'=>$user_profile->picture->uri, 'width'=>'', 'height'=>'', 'alt'=>$user_profile->name, 'title'=>$user_profile->name));
	  }else{
	       $user_img=theme("image", array('path' => path_to_theme().'/images/user.png',  'alt'=>$user_profile->name, 'title'=>$user_profile->name,  'width' => 48,    'height' => 48));
	  }
          if(!empty($comment_load->field_rating)){
	       if($comment_load->field_rating['und'][0]['rating'] == 20){
		    $rating='<div class="fivestar-default"><div class="fivestar-widget-static fivestar-widget-static-vote fivestar-widget-static-5 clearfix"><div class="star star-1 star-odd star-first"><span class="on">1</span></div><div class="star star-2 star-even"><span class="off"></span></div><div class="star star-3 star-odd"><span class="off"></span></div><div class="star star-4 star-even"><span class="off"></span></div><div class="star star-5 star-odd star-last"><span class="off"></span></div></div></div>';
	       }elseif($comment_load->field_rating['und'][0]['rating'] == 40){
		    $rating='<div class="fivestar-default"><div class="fivestar-widget-static fivestar-widget-static-vote fivestar-widget-static-5 clearfix"><div class="star star-1 star-odd star-first"><span class="on">2</span></div><div class="star star-2 star-even"><span class="on"></span></div><div class="star star-3 star-odd"><span class="off"></span></div><div class="star star-4 star-even"><span class="off"></span></div><div class="star star-5 star-odd star-last"><span class="off"></span></div></div></div>';
	       }elseif($comment_load->field_rating['und'][0]['rating'] == 60){
		    $rating='<div class="fivestar-default"><div class="fivestar-widget-static fivestar-widget-static-vote fivestar-widget-static-5 clearfix"><div class="star star-1 star-odd star-first"><span class="on">3</span></div><div class="star star-2 star-even"><span class="on"></span></div><div class="star star-3 star-odd"><span class="on"></span></div><div class="star star-4 star-even"><span class="off"></span></div><div class="star star-5 star-odd star-last"><span class="off"></span></div></div></div>';
	       }elseif($comment_load->field_rating['und'][0]['rating'] == 80){
		    $rating='<div class="fivestar-default"><div class="fivestar-widget-static fivestar-widget-static-vote fivestar-widget-static-5 clearfix"><div class="star star-1 star-odd star-first"><span class="on">4</span></div><div class="star star-2 star-even"><span class="on"></span></div><div class="star star-3 star-odd"><span class="on"></span></div><div class="star star-4 star-even"><span class="on"></span></div><div class="star star-5 star-odd star-last"><span class="off"></span></div></div></div>';
	       }
	       elseif($comment_load->field_rating['und'][0]['rating'] == 100){
		   $rating='<div class="fivestar-default"><div class="fivestar-widget-static fivestar-widget-static-vote fivestar-widget-static-5 clearfix"><div class="star star-1 star-odd star-first"><span class="on">5</span></div><div class="star star-2 star-even"><span class="on"></span></div><div class="star star-3 star-odd"><span class="on"></span></div><div class="star star-4 star-even"><span class="on"></span></div><div class="star star-5 star-odd star-last"><span class="on"></span></div></div></div>'; 
	       }
	       
	  }else{$rating='<div class="fivestar-widget clearfix fivestar-widget-5"><div class="star star-1 odd star-first"><a title="Give it 1/5" href="#20">Give it 1/5</a></div><div class="star star-2 even"><a title="Give it 2/5" href="#40">Give it 2/5</a></div><div class="star star-3 odd"><a title="Give it 3/5" href="#60">Give it 3/5</a></div><div class="star star-4 even"><a title="Give it 4/5" href="#80">Give it 4/5</a></div><div class="star star-5 odd star-last"><a title="Give it 5/5" href="#100">Give it 5/5</a></div></div>';}
	  
        $allcomments='<div class="itemdiv dialogdiv">
                  <div class="user">
                       '.$user_img.'
                  </div>
   
                  <div class="body">
                          <div class="time">
                                  <i class="icon-time"></i>
                                  <span class="green">'.humanTiming($comment_load->created).'  ago</span>
                          </div>
                            <div class="rating">
				   '.$rating.'
			    </div>
                          <div class="name">
                                 '.ucfirst($comment_load->name).$row->comment_node_cid'
                          </div>
                          <div class="text">'.$comment_load->comment_body['und'][0]['value'].'</div>
                  </div>
          </div>';
  echo $allcomments;
?>
<?php foreach ($fields as $id => $field): ?>
  <?php if (!empty($field->separator)): ?>
    <?php print $field->separator; ?>
  <?php endif; ?>

  <?php print $field->wrapper_prefix; ?>

  <?php print $field->wrapper_suffix; ?>
<?php endforeach; ?>