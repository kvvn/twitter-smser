<?php

class LiveScore{
    
    function Process(){
        require_once 'dbworker.php';
        require_once 'htmlparser.php';
        require_once 'twitter.php';
        
        $dbw = new dbworker();
        $parser = new htmlparser();
        $twitter = new twitter();
        
        $sql = 'SELECT *
                FROM `scores`
                WHERE FROM_UNIXTIME( `intTimeStart` ) <= NOW( ) AND intStatus=0;';
        
        $db = mysql_connect('host', 'user', 'pass');
        if($db){            
            mysql_select_db("soccerad_dev", $db);
            $todayMatches = $dbw->SelectQuery($sql, $db);
            foreach ($todayMatches as $key => $value) {
                //echo $value['intId'];
                $mess = $parser->getResoult($value['varUrl']);
                if($value['varResoult']!=$mess){
                    $twitter->SendStatus($mess);
                    $update = 'UPDATE scores SET varResoult="'.iconv('CP1252', 'UTF-8', $mess).'" WHERE intId='.$value['intId'].';';
                    $dbw->UpdateQuery($update, $db);
                    echo $mess;
                }
                
            }
        } else {
            echo 'there is no connection';
        }
    }
    
}


try {
    $robot = new LiveScore();
    $robot->Process();
} catch (Exception $ex) {
    echo 'Error: '.$ex->getMessage()."\r\m";
}

?>
