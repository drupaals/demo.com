<?php
$user = user_load($content['comment_body']['#object']->uid);
if(!empty($user->picture)){
$user_img=theme_image_style(array('style_name'=>'48x48', 'path'=>$user->picture->uri, 'width'=>'', 'height'=>'', 'alt'=>$user->name, 'title'=>$user->name, 'attributes' => array('class' => 'img-responsive')));
}else{
  $user_img=theme("image", array('path' => path_to_theme().'/images/user.png',  'title' => "Image",  'width' => 48,    'height' => 48,));
}
//comment rating
if(!empty($content['field_rating']['#object']->field_rating)){
		     if($content['field_rating']['#object']->field_rating['und'][0]['user'] == 20){
			  $rating1='<div class="fivestar-default"><div class="fivestar-widget-static fivestar-widget-static-vote fivestar-widget-static-5 clearfix"><div class="star star-1 star-odd star-first"><span class="on">1</span></div><div class="star star-2 star-even"><span class="off"></span></div><div class="star star-3 star-odd"><span class="off"></span></div><div class="star star-4 star-even"><span class="off"></span></div><div class="star star-5 star-odd star-last"><span class="off"></span></div></div></div>';
		     }elseif($content['field_rating']['#object']->field_rating['und'][0]['user'] == 40){
			  $rating1='<div class="fivestar-default"><div class="fivestar-widget-static fivestar-widget-static-vote fivestar-widget-static-5 clearfix"><div class="star star-1 star-odd star-first"><span class="on">2</span></div><div class="star star-2 star-even"><span class="on"></span></div><div class="star star-3 star-odd"><span class="off"></span></div><div class="star star-4 star-even"><span class="off"></span></div><div class="star star-5 star-odd star-last"><span class="off"></span></div></div></div>';
		     }elseif($content['field_rating']['#object']->field_rating['und'][0]['user'] == 60){
			  $rating1='<div class="fivestar-default"><div class="fivestar-widget-static fivestar-widget-static-vote fivestar-widget-static-5 clearfix"><div class="star star-1 star-odd star-first"><span class="on">3</span></div><div class="star star-2 star-even"><span class="on"></span></div><div class="star star-3 star-odd"><span class="on"></span></div><div class="star star-4 star-even"><span class="off"></span></div><div class="star star-5 star-odd star-last"><span class="off"></span></div></div></div>';
		     }elseif($content['field_rating']['#object']->field_rating['und'][0]['user'] == 80){
			  $rating1='<div class="fivestar-default"><div class="fivestar-widget-static fivestar-widget-static-vote fivestar-widget-static-5 clearfix"><div class="star star-1 star-odd star-first"><span class="on">4</span></div><div class="star star-2 star-even"><span class="on"></span></div><div class="star star-3 star-odd"><span class="on"></span></div><div class="star star-4 star-even"><span class="on"></span></div><div class="star star-5 star-odd star-last"><span class="off"></span></div></div></div>';
		     }
		     elseif($content['field_rating']['#object']->field_rating['und'][0]['user'] == 100){
			 $rating1='<div class="fivestar-default"><div class="fivestar-widget-static fivestar-widget-static-vote fivestar-widget-static-5 clearfix"><div class="star star-1 star-odd star-first"><span class="on">5</span></div><div class="star star-2 star-even"><span class="on"></span></div><div class="star star-3 star-odd"><span class="on"></span></div><div class="star star-4 star-even"><span class="on"></span></div><div class="star star-5 star-odd star-last"><span class="on"></span></div></div></div>'; 
		     }
		     
		     
		}else{$rating1='<div class="fivestar-widget clearfix fivestar-widget-5"><div class="star star-1 odd star-first"><a title="Give it 1/5" href="#20">Give it 1/5</a></div><div class="star star-2 even"><a title="Give it 2/5" href="#40">Give it 2/5</a></div><div class="star star-3 odd"><a title="Give it 3/5" href="#60">Give it 3/5</a></div><div class="star star-4 even"><a title="Give it 4/5" href="#80">Give it 4/5</a></div><div class="star star-5 odd star-last"><a title="Give it 5/5" href="#100">Give it 5/5</a></div></div>';}
		
$comment = '<div id="review-comment">
                <div class="author">'.$user_img.'</div>
                <div class="review-cooment-desc">
                    <span class="author-name"><b>'.ucfirst($content['comment_body']['#object']->name).'</b></span>
                    <div class="featured-review-star-rating">'.$rating1.'</div>
                    '.$content['comment_body']['#object']->comment_body['und'][0]['value'].'
                </div>
            </div>';
print $comment;
