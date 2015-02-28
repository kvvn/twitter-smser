<?php

class htmlparser{
    
	function __construct(){
		require_once('simple_html_dom.php');
	}
	
    function getResoult($url){
        
        //include('simple_html_dom.php');
    
        $sourse = file_get_html($url);
        $mess = '';        
        
        foreach ($sourse->find('a[class=t1]') as $t1){
            $mess =  $mess.$t1->innertext;
        }
        foreach ($sourse->find('span[class=scoreData]') as $score){
            //echo $score->innertext.  chr(10);
            $mess =  $mess.' '.$score->innertext;
        }
        foreach ($sourse->find('a[class=t2]') as $t2){
            $mess =  $mess.' '.$t2->innertext;
            //echo $t2->innertext. chr(10);
        }
        
        //$mess = $title.' '.$score;
        return $mess;
  }
        
  
}

?>
