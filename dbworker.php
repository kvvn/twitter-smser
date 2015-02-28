<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dbworker
 *
 * @author kvvn
 */
class dbworker {
    
    function SelectQuery($sql, $db){
        
        $query = mysql_query($sql, $db);
        if (!$query) {
            echo "Could not successfully run query ($sql) from DB: " . mysql_error();
            exit;
        }
        if (mysql_num_rows($query) == 0) {
            echo "nothing found";
            exit;
        }
        $resolt = array();
        
        while ($row = mysql_fetch_array($query)){
            array_push($resolt, $row);
        }
        return $resolt;
    }
    
    function IsertQuery($sql, $db){
        $query = mysql_query($sql, $db);
        if (!$query) {
            echo "Could not successfully run query ($sql) from DB: " . mysql_error();
            exit;
        }
        
        return $query;
    }
    
    function UpdateQuery($sql, $db){
        $query = mysql_query($sql, $db);
        if (!$query) {
            echo "Could not successfully run query ($sql) from DB: " . mysql_error();
            exit;
        }
        
        return $query;
    }
    
}

?>
