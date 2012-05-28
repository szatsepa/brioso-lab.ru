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
        
        if($_SESSION[auth] == 1){
            
            $who = 'admin';
        
            $query = "SELECT u.id,
                            u.surname, 
                            u.name, 
                            u.email, 
                            u.phone, 
                            u.status
                    FROM users AS u   
                    WHERE u.id = $id AND u.activ = 1";
            
        }  else if ($_SESSION[auth]==2) {
            
             $query = "SELECT u.id,
                         u.surname, 
                         u.name, 
                         u.email, 
                         u.phone
                 FROM customers AS u   
                 WHERE u.id = $id AND u.activ = 1";
            
            $result = mysql_query($query) or die ($query);
            
            $who = 'customer';
            
        }
        
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
