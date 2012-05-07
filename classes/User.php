<?php

/*
 * created by arcady.1254@gmail.com 7/3/2012
 */

class User{
    
    var $data;
    var $id;
    
    function User(){
        $this->data = array();
    }
    
    function setUser($id){  
        
        $query = "SELECT u.id,
                         u.surname, 
                         u.name, 
                         u.email, 
                         u.phone, 
                         u.key_code
                 FROM users AS u   
                 WHERE u.id = $id AND u.activ = 1";
        
//        echo "$query<br/>";
        
        $result = mysql_query($query) or die ($query);
        
        $row = mysql_fetch_assoc($result);
        
        $this->id = $row[id];
                
        $this->data = $row;
        
        unset($row); 
        
        mysql_free_result($result);
    }
    function setUserKey($array){
        
        $this->data = $array;
        
    }
    function _createCode($num_cnt, $str_cnt){
    
        $cod = '';

        $simbol_array = array('A','S','D','F','G','H','J','K','L','Q','W','E','R','T','Y','U','I','O','P','Z','X','C','V','B','N','M');

        for($i = 0;$i<$str_cnt;$i++){
            
            $cod .= $simbol_array[rand(0, count($simbol_array))];
            
        }

        for($i = 0;$i<$num_cnt;$i++){
            $cod .= rand(0, 9);
        }

        return $cod;
    }

}
?>
